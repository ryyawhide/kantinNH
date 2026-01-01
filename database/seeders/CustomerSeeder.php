<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([
            [
                'id' => 1,
                'customer' => 'CV be Internt',
                'alamat' => 'Konoha, Wakanda Timur',
                'user_id' => 1,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 20:53:26'
            ],
            [
                'id' => 2,
                'customer' => 'CV Harapan ink',
                'alamat' => 'Wakanda Tengah',
                'user_id' => 1,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 20:53:48'
            ],
            [
                'id' => 3,
                'customer' => 'Kucuy Tech',
                'alamat' => 'Wakanda Barat Daya',
                'user_id' => 1,
                'created_at' => '2025-05-30 20:54:16',
                'updated_at' => '2025-05-30 20:54:16'
            ]
        ]);
    }
}