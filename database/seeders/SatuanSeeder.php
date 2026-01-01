<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Satuan;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satuan::insert([
            [
                'id' => 1,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:15:34',
                'satuan' => 'PCS',
                'user_id' => 3
            ],
            [
                'id' => 2,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:15:42',
                'satuan' => 'Meter',
                'user_id' => 3
            ],
            [
                'id' => 3,
                'created_at' => '2025-05-30 06:22:23',
                'updated_at' => '2025-05-30 06:22:23',
                'satuan' => 'Set',
                'user_id' => 3
            ]
        ]);
    }
}