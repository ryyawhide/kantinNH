<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis::insert([
            [
                'id' => 1,
                'jenis_barang' => 'Komputer',
                'user_id' => 1,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:13:40'
            ],
            [
                'id' => 2,
                'jenis_barang' => 'CPU',
                'user_id' => 3,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:15:20'
            ],
            [
                'id' => 3,
                'jenis_barang' => 'Mouse',
                'user_id' => 3,
                'created_at' => '2025-05-30 17:49:12',
                'updated_at' => '2025-05-30 17:49:12'
            ],
            [
                'id' => 4,
                'jenis_barang' => 'Printer',
                'user_id' => 3,
                'created_at' => '2025-05-30 17:49:32',
                'updated_at' => '2025-05-30 17:49:32'
            ],
            [
                'id' => 5,
                'jenis_barang' => 'Flashdisk',
                'user_id' => 3,
                'created_at' => '2025-05-30 17:49:51',
                'updated_at' => '2025-05-30 17:49:51'
            ]
        ]);
    }
}