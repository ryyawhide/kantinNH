<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::insert([
            [
                'id' => 1,
                'supplier' => 'PT Pitrok Ink',
                'alamat' => 'Konoha, Wakanda Timur',
                'user_id' => 3,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:22:47'
            ],
            [
                'id' => 2,
                'supplier' => 'PT Power Konoha',
                'alamat' => 'Konoha',
                'user_id' => 3,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:23:19'
            ],
            [
                'id' => 3,
                'supplier' => 'Kasep Tech',
                'alamat' => 'Konoha Selatan',
                'user_id' => 3,
                'created_at' => '2025-05-30 17:55:57',
                'updated_at' => '2025-05-30 17:55:57'
            ]
        ]);
    }
}