<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BarangMasuk;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangMasuk::insert([
            [
                'id' => 1,
                'kode_transaksi' => 'TRX-IN-2025-4-30-0707',
                'tanggal_masuk' => '2025-04-30',
                'nama_barang' => 'CPU Gaming 1',
                'jumlah_masuk' => 3,
                'supplier_id' => 1,
                'user_id' => 1,
                'created_at' => '2025-05-30 20:54:42',
                'updated_at' => '2025-05-30 20:54:42'
            ],
            [
                'id' => 2,
                'kode_transaksi' => 'TRX-IN-2025-4-30-1927',
                'tanggal_masuk' => '2025-04-30',
                'nama_barang' => 'CPU Gaming Pink Hard',
                'jumlah_masuk' => 5,
                'supplier_id' => 2,
                'user_id' => 1,
                'created_at' => '2025-05-30 20:55:16',
                'updated_at' => '2025-05-30 20:55:16'
            ],
            [
                'id' => 3,
                'kode_transaksi' => 'TRX-IN-2025-5-31-8412',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => '1 Set Komputer Gaming ++',
                'jumlah_masuk' => 6,
                'supplier_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-05-30 20:59:11',
                'updated_at' => '2025-05-30 20:59:11'
            ],
            [
                'id' => 4,
                'kode_transaksi' => 'TRX-IN-2025-5-31-4686',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Komputer Gaming Medium',
                'jumlah_masuk' => 7,
                'supplier_id' => 2,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:02:45',
                'updated_at' => '2025-05-30 21:02:45'
            ],
            [
                'id' => 5,
                'kode_transaksi' => 'TRX-IN-2025-4-30-7075',
                'tanggal_masuk' => '2025-04-30',
                'nama_barang' => 'Maouse Rexus 3434 GAS',
                'jumlah_masuk' => 87,
                'supplier_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:02:54',
                'updated_at' => '2025-05-30 21:02:54'
            ],
            [
                'id' => 6,
                'kode_transaksi' => 'TRX-IN-2025-5-31-2906',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Mouse Gaming Medium 1233',
                'jumlah_masuk' => 107,
                'supplier_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:03:11',
                'updated_at' => '2025-05-30 21:03:11'
            ],
            [
                'id' => 7,
                'kode_transaksi' => 'TRX-IN-2025-5-31-9719',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Mouse Gaming Logitech Hard1212',
                'jumlah_masuk' => 87,
                'supplier_id' => 3,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:03:20',
                'updated_at' => '2025-05-30 21:03:20'
            ],
            [
                'id' => 8,
                'kode_transaksi' => 'TRX-IN-2025-5-31-4844',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Printer Canon MP22323XX',
                'jumlah_masuk' => 33,
                'supplier_id' => 2,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:07:33',
                'updated_at' => '2025-05-30 21:07:33'
            ],
            [
                'id' => 9,
                'kode_transaksi' => 'TRX-IN-2025-5-31-0355',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Printer Brother BR5656PP',
                'jumlah_masuk' => 24,
                'supplier_id' => 2,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:07:47',
                'updated_at' => '2025-05-30 21:07:47'
            ],
            [
                'id' => 10,
                'kode_transaksi' => 'TRX-IN-2025-5-31-0625',
                'tanggal_masuk' => '2025-05-31',
                'nama_barang' => 'Printer Epson',
                'jumlah_masuk' => 17,
                'supplier_id' => 2,
                'user_id' => 3,
                'created_at' => '2025-05-30 21:08:13',
                'updated_at' => '2025-05-30 21:08:13'
            ]
        ]);
    }
}