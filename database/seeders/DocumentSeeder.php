<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\User;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua pengguna
        $users = User::all();

        // Contoh data dokumen
        $documents = [
            [
                'title' => 'Proposal Pengembangan Sistem',
                'description' => 'Dokumen proposal untuk pengembangan sistem baru di perusahaan.',
                'file_path' => 'files/proposal_pengembangan_sistem.pdf',
                'status' => 'public',
            ],
            [
                'title' => 'Laporan Keuangan Tahunan 2023',
                'description' => 'Laporan keuangan tahunan yang mencakup semua transaksi dan laporan audit.',
                'file_path' => 'files/laporan_keuangan_tahunan_2023.pdf',
                'status' => 'public',
            ],
            [
                'title' => 'Rencana Strategis 2024-2026',
                'description' => 'Dokumen yang menjelaskan rencana strategis perusahaan untuk tiga tahun ke depan.',
                'file_path' => 'files/rencana_strategis_2024_2026.pdf',
                'status' => 'private',
            ],
            [
                'title' => 'Panduan Penggunaan Aplikasi',
                'description' => 'Dokumen panduan untuk pengguna baru aplikasi yang dikembangkan oleh tim IT.',
                'file_path' => 'files/panduan_penggunaan_aplikasi.pdf',
                'status' => 'public',
            ],
            [
                'title' => 'Notulen Rapat Bulanan',
                'description' => 'Catatan dari rapat bulanan yang mencakup agenda dan hasil diskusi.',
                'file_path' => 'files/notulen_rapat_bulanan.pdf',
                'status' => 'private',
            ],
        ];

        // Buat dokumen untuk setiap pengguna
        foreach ($users as $user) {
            foreach ($documents as $doc) {
                Document::create([
                    'title' => $doc['title'],
                    'description' => $doc['description'],
                    'file_path' => $doc['file_path'],
                    'status' => $doc['status'],
                    'user_id' => $user->id,
                    'created_at' => now()->subDays(rand(1, 30)), // tanggal dibuat acak
                    'updated_at' => now()->subDays(rand(1, 30)), // tanggal diperbarui acak
                ]);
            }
        }
    }
}
