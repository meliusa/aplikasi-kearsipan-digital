<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar data pengguna
        $users = [
            [
                'name' => 'Ahmad Hidayat',
                'email' => 'ahmad.hidayat@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
                'photo' => 'images/portraits/men/1.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'photo' => 'images/portraits/women/1.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'photo' => 'images/portraits/men/2.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => false,
                'photo' => 'images/portraits/women/2.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'name' => 'Rizki Firmansyah',
                'email' => 'rizki.firmansyah@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'photo' => 'images/portraits/men/3.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
            [
                'name' => 'Lina Mariani',
                'email' => 'lina.mariani@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'photo' => 'images/portraits/women/3.jpg',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 30)),
            ],
        ];

        // Insert data ke database
        DB::table('users')->insert($users);
    }
}
