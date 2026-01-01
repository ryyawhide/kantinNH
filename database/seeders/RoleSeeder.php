<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'id' => 1,
                'role' => 'superadmin',
                'deskripsi' => 'Superadmin memiliki kendali penuh pada aplikasi termasuk manajemen User',
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ],
            [
                'id' => 2,
                'role' => 'kepala gudang',
                'deskripsi' => 'Kepala gudang memilki akses untuk mengelola dan mencetak laporan stok, barang masuk, dan barang keluar',
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ],
            [
                'id' => 3,
                'role' => 'admin gudang',
                'deskripsi' => 'Admin gudang memilki akses untuk mengelola stok,  barang masuk, barang keluar dan laporannya',
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ]
        ]);
    }
}
