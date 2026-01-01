<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$o735mOVo/lEnMkFn/UY/8eNBA9PJuD8b8T9N73Dsmva5evRzX1hwC',
                'role_id' => 1,
                'remember_token' => null,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ],
            [
                'id' => 2,
                'name' => 'Kepala Gudang',
                'email' => 'kepalagudang@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$D6FYNJbK5MtHSgLt1Wt4w.qj6Sl2UqKKdGFSi5K6R3Vtjy2To04eC',
                'role_id' => 2,
                'remember_token' => null,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ],
            [
                'id' => 3,
                'name' => 'Admin Gudang',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$QD1VCR5jT0sp/YFbUKwfr.IKmPkx371mdr6Gx3Gj..7Ywl4ZEKtD2',
                'role_id' => 3,
                'remember_token' => null,
                'created_at' => '2025-05-30 06:09:55',
                'updated_at' => '2025-05-30 06:09:55'
            ]
        ]);
    }
}
