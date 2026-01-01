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
                'barang_id' => 'required',
                'periode' => 'required|in:3,6,9,12'
            ]);

            $user = auth()->user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $periode_bulan = intval($validated['periode']);

            // Periode data: 12 bulan terakhir
            $data_end = Carbon::now();
            $data_start = Carbon::now()->subMonths(12);

            // Periode forecast: dari sekarang sampai periode_bulan ke depan
            $forecast_start = Carbon::now();
            $forecast_end = Carbon::now()->addMonths($periode_bulan);

            // Tentukan list barang yang akan diproses
            if ($request->barang_id === 'all' || $validated['barang_id'] === 'all') {
                $barangsToProcess = Barang::all();
            } else {
                $barangsToProcess = Barang::where('id', $validated['barang_id'])->get();
            }

            $created = 0;
            $updated = 0;

            foreach ($barangsToProcess as $barang) {
                // Ambil data barang masuk dan keluar dalam periode data (12 bulan terakhir)
                $barangMasuk = BarangMasuk::where('nama_barang', $barang->nama_barang)
                    ->whereBetween('tanggal_masuk', [$data_start, $data_end])
                    ->sum('jumlah_masuk');

                $barangKeluar = BarangKeluar::where('nama_barang', $barang->nama_barang)
                    ->whereBetween('tanggal_keluar', [$data_start, $data_end])
                    ->sum('jumlah_keluar');

                // Hitung rata-rata penjualan per bulan dari data 12 bulan
                $total_bulan_data = 12;
                $rata_rata_keluar = $total_bulan_data > 0 ? $barangKeluar / $total_bulan_data : 0;

                // Prediksi stok untuk periode ke depan (sesuai periode yang dipilih)
                $prediksi_stok = $barang->stok - ($rata_rata_keluar * $periode_bulan);

                // Rekomendasi pembelian (jika prediksi kurang dari stok minimum)
                $rekomendasi_pembelian = 0;
                if ($prediksi_stok < $barang->stok_minimum) {
                    $rekomendasi_pembelian = (int)(($rata_rata_keluar * $periode_bulan) - $prediksi_stok + $barang->stok_minimum);
                }

                // Cek apakah forecast sudah ada untuk periode ini
                $existingForecast = Forecast::where('barang_id', $barang->id)
                    ->where('periode_bulan', $periode_bulan)
                    ->first();

                if ($existingForecast) {
                    // Update forecast yang sudah ada
                    $existingForecast->update([
                        'periode_awal' => $forecast_start->format('Y-m-d'),
                        'periode_akhir' => $forecast_end->format('Y-m-d'),
                        'periode_bulan' => $periode_bulan,
                        'rata_rata_penjualan' => round($rata_rata_keluar, 2),
                        'prediksi_stok' => (int)$prediksi_stok,
                        'rekomendasi_pembelian' => $rekomendasi_pembelian,
                        'user_id' => $user->id
                    ]);
                    $updated++;
                } else {
                    // Buat forecast baru
                    Forecast::create([
                        'barang_id' => $barang->id,
                        'periode_awal' => $forecast_start->format('Y-m-d'),
                        'periode_akhir' => $forecast_end->format('Y-m-d'),
                        'periode_bulan' => $periode_bulan,
                        'rata_rata_penjualan' => round($rata_rata_keluar, 2),
                        'prediksi_stok' => (int)$prediksi_stok,
                        'rekomendasi_pembelian' => $rekomendasi_pembelian,
                        'user_id' => $user->id
                    ]);
                    $created++;
                }
            }

            $total = $created + $updated;
            if ($total > 1) {
                $message = "Forecast berhasil diproses untuk {$total} barang (dibuat: {$created}, diperbarui: {$updated})!";
            } elseif ($created === 1) {
                $message = 'Forecast berhasil dibuat!';
            } else {
                $message = 'Forecast berhasil diperbarui!';
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
    public function getData(Request $request)
    {
        $query = Forecast::with('barang', 'user')
            ->orderBy('periode_awal', 'desc')
            ->whereIn('periode_bulan', [3, 6, 9, 12]);

        // Optional periode filter (3,6,9,12 months)
        if ($request->has('periode') && in_array($request->periode, ['3','6','9','12'])) {
            $query->where('periode_bulan', intval($request->periode));
        }

        $forecasts = $query->get()->map(function ($forecast) {
            return [
                'id' => $forecast->id,
                'nama_barang' => $forecast->barang->nama_barang,
                'periode_bulan' => $forecast->periode_bulan,
                'periode' => \Carbon\Carbon::parse($forecast->periode_awal)->format('d-m-Y') . ' s/d ' . \Carbon\Carbon::parse($forecast->periode_akhir)->format('d-m-Y'),
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
    public function analytics(Request $request)
    {
        $query = Forecast::query()->whereIn('periode_bulan', [3, 6, 9, 12]);

        if ($request->has('periode') && in_array($request->periode, ['3','6','9','12'])) {
            $query->where('periode_bulan', intval($request->periode));
        }

        $totalForecast = $query->count();
        $forecastWithBuyRecommendation = (clone $query)->where('rekomendasi_pembelian', '>', 0)->count();
        $avgPrediksiStok = (clone $query)->avg('prediksi_stok');
        $totalRekomendasi = (clone $query)->sum('rekomendasi_pembelian');

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

    /**
     * Delete all forecasts
     */
    public function deleteAll()
    {
        try {
            $count = Forecast::count();
            Forecast::truncate(); // Delete all records

            return response()->json([
                'success' => true,
                'message' => "Semua forecast ({$count} data) berhasil dihapus!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
