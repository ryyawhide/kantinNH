<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            JenisSeeder::class,
            SatuanSeeder::class,
            SupplierSeeder::class,
            CustomerSeeder::class,
            BarangSeeder::class,
            BarangMasukSeeder::class,
            BarangKeluarSeeder::class,
            // ActivityLogSeeder::class, // Uncomment after filling with all data
        ]);
    }
}
