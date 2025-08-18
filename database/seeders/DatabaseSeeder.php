<?php

namespace Database\Seeders;

use App\Models\Data;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $years = range(now()->year - 7, now()->year);

        $angkatan = [];
        foreach ($years as $year) {
            $angkatan[$year] = [
                'jumlah_mahasiswa_diterima' => null,
                'jumlah_mahasiswa' => null,
            ];
        }

        $angkatan['updated_at'] = null;

        Data::create([
            'unj_dalam_angka' => [
                'jumlah_dosen' => null,
                'jumlah_dosen_tahun_sebelum' => null,
                'jumlah_mahasiswa' => null,
                'jumlah_mahasiswa_tahun_sebelum' => null,
                'wisuda_2025' => null,
                'wisuda_tahun_sebelum' => null,
                'peminat_2025' => null,
                'peminat_tahun_sebelum' => null,
                'updated_at' => null,
            ],
            'mahasiswa_berdasarkan_angkatan' => $angkatan,
            'dosen_berdasarkan_pendidikan' => [
                'jumlah_dosen_s2' => 0,
                'jumlah_dosen_s3' => 0,
                'updated_at' => null 
            ]
        ]);

    }
}