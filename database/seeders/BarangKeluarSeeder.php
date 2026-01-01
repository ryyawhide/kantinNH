<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarangKeluar;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangKeluar::insert([
            [
                'id' => 1,
                'kode_transaksi' => 'TRX-OUT-2025-4-30-6168',
                'tanggal_keluar' => '2025-04-30',
                'nama_barang' => '1 Set Komputer Gaming ++',
                'jumlah_keluar' => 3,
                'customer_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:02:06',
                'updated_at' => '2025-05-30 21:02:06'
            ]
        ]);
    }
}