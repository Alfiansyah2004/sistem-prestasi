<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kelas;
use App\Models\JenisPrestasi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Admin User
        User::firstOrCreate(
            ['email' => 'admin@sekolah.com'],
            [
                'nama'     => 'Administrator',
                'password' => Hash::make('admin123'),
            ]
        );

        // Seed Kelas
        $kelas = [
            ['nama_kelas' => 'X IPA 1',  'tingkat' => 'X',   'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'X IPA 2',  'tingkat' => 'X',   'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI IPA 1', 'tingkat' => 'XI',  'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XI IPS 1', 'tingkat' => 'XI',  'tahun_ajaran' => '2024/2025'],
            ['nama_kelas' => 'XII IPA 1','tingkat' => 'XII', 'tahun_ajaran' => '2024/2025'],
        ];
        foreach ($kelas as $k) {
            Kelas::firstOrCreate(['nama_kelas' => $k['nama_kelas'], 'tahun_ajaran' => $k['tahun_ajaran']], $k);
        }

        // Seed Jenis Prestasi
        $jenisItems = ['Akademik', 'Non-Akademik', 'Olahraga', 'Seni & Budaya', 'Teknologi'];
        foreach ($jenisItems as $nama) {
            JenisPrestasi::firstOrCreate(['nama_jenis' => $nama]);
        }
    }
}
