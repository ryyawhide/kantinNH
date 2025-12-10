<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Forecast;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ForecastController extends Controller
{
    /**
     * Display forecasting list
     */
    public function index()
    {
        $forecasts = Forecast::with('barang', 'user')->orderBy('periode_awal', 'desc')->get();
        $barangs = Barang::all();

        return view('forecast.index', [
            'forecasts' => $forecasts,
            'barangs' => $barangs
        ]);
    }

    /**
     * Generate forecast for specific barang
     */
    public function generate(Request $request)
    {
        try {
            $validated = $request->validate([
                'barang_id' => 'required|exists:barangs,id',
                'periode' => 'required|in:3,6,9,12'
            ]);

            $barang = Barang::findOrFail($validated['barang_id']);
            $periode_bulan = intval($validated['periode']);

            // Hitung periode awal dan akhir
            $periode_akhir = Carbon::now();
            $periode_awal = Carbon::now()->subMonths($periode_bulan);

            // Ambil data barang masuk dan keluar dalam periode tersebut
            $barangMasuk = BarangMasuk::where('nama_barang', $barang->nama_barang)
                ->whereBetween('tanggal_masuk', [$periode_awal, $periode_akhir])
                ->sum('jumlah_masuk');

            $barangKeluar = BarangKeluar::where('nama_barang', $barang->nama_barang)
                ->whereBetween('tanggal_keluar', [$periode_awal, $periode_akhir])
                ->sum('jumlah_keluar');

            // Hitung rata-rata penjualan per bulan
            $rata_rata_keluar = $periode_bulan > 0 ? $barangKeluar / $periode_bulan : 0;

            // Prediksi stok untuk 3 bulan ke depan
            $prediksi_3_bulan = $barang->stok - ($rata_rata_keluar * 3);
            
            // Rekomendasi pembelian (jika prediksi kurang dari stok minimum)
            $rekomendasi_pembelian = 0;
            if ($prediksi_3_bulan < $barang->stok_minimum) {
                // Hitung berapa banyak yang perlu dibeli untuk mencapai 3 bulan penjualan
                $rekomendasi_pembelian = (int)(($rata_rata_keluar * 3) - $prediksi_3_bulan + $barang->stok_minimum);
            }

            // Cek apakah forecast sudah ada untuk periode ini
            $existingForecast = Forecast::where('barang_id', $barang->id)
                ->where('periode_awal', $periode_awal->format('Y-m-d'))
                ->first();

            if ($existingForecast) {
                // Update forecast yang sudah ada
                $existingForecast->update([
                    'periode_akhir' => $periode_akhir->format('Y-m-d'),
                    'rata_rata_penjualan' => round($rata_rata_keluar, 2),
                    'prediksi_stok' => (int)$prediksi_3_bulan,
                    'rekomendasi_pembelian' => $rekomendasi_pembelian,
                    'user_id' => auth()->user()->id
                ]);
                $message = 'Forecast berhasil diperbarui!';
            } else {
                // Buat forecast baru
                Forecast::create([
                    'barang_id' => $barang->id,
                    'periode_awal' => $periode_awal->format('Y-m-d'),
                    'periode_akhir' => $periode_akhir->format('Y-m-d'),
                    'rata_rata_penjualan' => round($rata_rata_keluar, 2),
                    'prediksi_stok' => (int)$prediksi_3_bulan,
                    'rekomendasi_pembelian' => $rekomendasi_pembelian,
                    'user_id' => auth()->user()->id
                ]);
                $message = 'Forecast berhasil dibuat!';
            }

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get forecast data via AJAX
     */
    public function getData()
    {
        $forecasts = Forecast::with('barang', 'user')
            ->orderBy('periode_awal', 'desc')
            ->get()
            ->map(function ($forecast) {
                return [
                    'id' => $forecast->id,
                    'nama_barang' => $forecast->barang->nama_barang,
                    'periode' => $forecast->periode_awal . ' s/d ' . $forecast->periode_akhir,
                    'rata_rata_penjualan' => number_format($forecast->rata_rata_penjualan, 2),
                    'prediksi_stok' => $forecast->prediksi_stok,
                    'rekomendasi_pembelian' => $forecast->rekomendasi_pembelian,
                    'user' => $forecast->user->name
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $forecasts
        ]);
    }

    /**
     * Delete forecast
     */
    public function destroy(Forecast $forecast)
    {
        try {
            $forecast->delete();

            return response()->json([
                'success' => true,
                'message' => 'Forecast berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get analytics summary
     */
    public function analytics()
    {
        $totalForecast = Forecast::count();
        $forecastWithBuyRecommendation = Forecast::where('rekomendasi_pembelian', '>', 0)->count();
        $avgPrediksiStok = Forecast::avg('prediksi_stok');
        $totalRekomendasi = Forecast::sum('rekomendasi_pembelian');

        return response()->json([
            'success' => true,
            'data' => [
                'total_forecast' => $totalForecast,
                'forecast_perlu_beli' => $forecastWithBuyRecommendation,
                'rata_rata_prediksi_stok' => (int)$avgPrediksiStok,
                'total_rekomendasi_pembelian' => $totalRekomendasi
            ]
        ]);
    }
}
