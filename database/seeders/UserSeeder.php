<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Rina Setiawati',
                'email' => 'rina.setiawati@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Andi Santoso',
                'email' => 'andi.santoso@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),   
            ],
            [
                'name' => 'Dewi Anggraini',
                'email' => 'dewi.anggraini@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Budi Hartono',
                'email' => 'budi.hartono@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Siti Nurhasanah',
                'email' => 'siti.nurhasanah@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Arief Hidayat',
                'email' => 'arief.hidayat@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Maya Pratiwi',
                'email' => 'maya.pratiwi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Rizky Firmansyah',
                'email' => 'rizky.firmansyah@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Lina Setiani',
                'email' => 'lina.setiani@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
            [
                'name' => 'Taufik Rahman',
                'email' => 'taufik.rahman@example.com',
                'password' => Hash::make('password123'),
                'role' => 'staf',
                'is_active' => true,
                'created_at' => Carbon::now()->subDays(rand(1, 365))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
                'updated_at' => Carbon::now()->subDays(rand(0, 364))->subHours(rand(0, 23))->subMinutes(rand(0, 59)),
            ],
        ]);
    }
}
