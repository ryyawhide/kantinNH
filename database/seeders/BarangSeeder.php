<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::insert([
            [
                'id' => 1,
                'created_at' => '2025-05-30 20:40:00',
                'updated_at' => '2025-05-30 21:00:43',
                'kode_barang' => 'BRG-35993',
                'nama_barang' => 'CPU Gaming 1',
                'deskripsi' => 'CPU Gaming 1, Full set cooling 5',
                'gambar' => 'gambar-barang/56.png',
                'stok_minimum' => 0,
                'stok' => 3,
                'user_id' => 3,
                'jenis_id' => 2,
                'satuan_id' => 1
            ],
            [
                'id' => 2,
                'created_at' => '2025-05-30 20:42:07',
                'updated_at' => '2025-05-30 20:55:16',
                'kode_barang' => 'BRG-12236',
                'nama_barang' => 'CPU Gaming Pink Hard',
                'deskripsi' => 'CPU Gaming Pink Hard asekkk',
                'gambar' => 'gambar-barang/34.png',
                'stok_minimum' => 2,
                'stok' => 5,
                'user_id' => 1,
                'jenis_id' => 2,
                'satuan_id' => 1
            ],
            [
                'id' => 3,
                'created_at' => '2025-05-30 20:43:19',
                'updated_at' => '2025-05-30 21:02:06',
                'kode_barang' => 'BRG-19088',
                'nama_barang' => '1 Set Komputer Gaming ++',
                'deskripsi' => '1 Set Komputer Gaming hard ryzen 9 ++',
                'gambar' => 'gambar-barang/78.jpg',
                'stok_minimum' => 2,
                'stok' => 3,
                'user_id' => 1,
                'jenis_id' => 1,
                'satuan_id' => 3
            ],
            [
                'id' => 4,
                'created_at' => '2025-05-30 20:44:55',
                'updated_at' => '2025-05-30 21:02:45',
                'kode_barang' => 'BRG-02405',
                'nama_barang' => 'Komputer Gaming Medium',
                'deskripsi' => 'Komputer Gaming Medium Core I7 Sikatt',
                'gambar' => 'gambar-barang/67.png',
                'stok_minimum' => 2,
                'stok' => 7,
                'user_id' => 1,
                'jenis_id' => 1,
                'satuan_id' => 3
            ],
            [
                'id' => 5,
                'created_at' => '2025-05-30 20:48:58',
                'updated_at' => '2025-05-30 21:08:13',
                'kode_barang' => 'BRG-08051',
                'nama_barang' => 'Printer Epson',
                'deskripsi' => 'Printer Epson 1212XXX',
                'gambar' => 'gambar-barang/55.jpg',
                'stok_minimum' => 2,
                'stok' => 17,
                'user_id' => 1,
                'jenis_id' => 4,
                'satuan_id' => 1
            ],
            [
                'id' => 6,
                'created_at' => '2025-05-30 20:49:27',
                'updated_at' => '2025-05-30 21:07:33',
                'kode_barang' => 'BRG-12487',
                'nama_barang' => 'Printer Canon MP22323XX',
                'deskripsi' => 'Printer Canon MP22323XX',
                'gambar' => 'gambar-barang/77.png',
                'stok_minimum' => 2,
                'stok' => 33,
                'user_id' => 1,
                'jenis_id' => 4,
                'satuan_id' => 1
            ],
            [
                'id' => 7,
                'created_at' => '2025-05-30 20:50:05',
                'updated_at' => '2025-05-30 21:07:47',
                'kode_barang' => 'BRG-30170',
                'nama_barang' => 'Printer Brother BR5656PP',
                'deskripsi' => 'Printer Brother BR5656PP Cihuy Mantep',
                'gambar' => 'gambar-barang/99.png',
                'stok_minimum' => 3,
                'stok' => 24,
                'user_id' => 1,
                'jenis_id' => 4,
                'satuan_id' => 1
            ],
            [
                'id' => 8,
                'created_at' => '2025-05-30 20:50:46',
                'updated_at' => '2025-05-30 21:03:20',
                'kode_barang' => 'BRG-18604',
                'nama_barang' => 'Mouse Gaming Logitech Hard1212',
                'deskripsi' => 'Mouse Gaming Logitech Hard1212 Mantep',
                'gambar' => 'gambar-barang/44.jpg',
                'stok_minimum' => 4,
                'stok' => 87,
                'user_id' => 1,
                'jenis_id' => 3,
                'satuan_id' => 1
            ],
            [
                'id' => 9,
                'created_at' => '2025-05-30 20:51:23',
                'updated_at' => '2025-05-30 21:02:54',
                'kode_barang' => 'BRG-79766',
                'nama_barang' => 'Maouse Rexus 3434 GAS',
                'deskripsi' => 'Maouse Rexus 3434 GAS ++',
                'gambar' => 'gambar-barang/33.jpg',
                'stok_minimum' => 3,
                'stok' => 87,
                'user_id' => 1,
                'jenis_id' => 3,
                'satuan_id' => 1
            ],
            [
                'id' => 10,
                'created_at' => '2025-05-30 20:52:42',
                'updated_at' => '2025-05-30 21:03:11',
                'kode_barang' => 'BRG-38130',
                'nama_barang' => 'Mouse Gaming Medium 1233',
                'deskripsi' => 'Mouse Gaming Medium 1233',
                'gambar' => 'gambar-barang/63.jpg',
                'stok_minimum' => 2,
                'stok' => 107,
                'user_id' => 1,
                'jenis_id' => 3,
                'satuan_id' => 1
            ]
        ]);
    }
}