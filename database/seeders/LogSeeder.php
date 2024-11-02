<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create(); 
        }

        // Contoh data log aktivitas
        $logs = [
            [
                'user_id' => $user->id,
                'activity_type' => 'create',
                'description' => 'Created a new document',
                'created_at' => now()->subDays(3),
            ],
            [
                'user_id' => $user->id,
                'activity_type' => 'update',
                'description' => 'Updated document details',
                'created_at' => now()->subDays(2),
            ],
            [
                'user_id' => $user->id,
                'activity_type' => 'delete',
                'description' => 'Deleted a document',
                'created_at' => now()->subDay(),
            ],
            [
                'user_id' => $user->id,
                'activity_type' => 'view',
                'description' => 'Viewed document details',
                'created_at' => now()->subHours(12),
            ],
            [
                'user_id' => $user->id,
                'activity_type' => 'download',
                'description' => 'Downloaded a document',
                'created_at' => now(),
            ],
        ];

        DB::table('logs')->insert($logs);
    }
}
