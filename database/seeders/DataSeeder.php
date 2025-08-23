<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            ],
            'mahasiswa_berdasarkan_jenjang_pendidikan' => [
                'jumlah_mahasiswa_d4' => 0,
                'jumlah_mahasiswa_s1' => 0,
                'jumlah_mahasiswa_s2' => 0,
                'jumlah_mahasiswa_s3' => 0,
                'updated_at' => null
            ],
            'dosen_berdasarkan_jabatan_fungsional' => [
                'jumlah_dosen_plp' => 0,
                'jumlah_dosen_asisten' => 0,
                'jumlah_dosen_lektor' => 0,
                'jumlah_dosen_lektor_kepala' => 0,
                'jumlah_dosen_profesor' => 0,
                'updated_at' => null
            ],
            'dosen_berdasarkan_status_kepegawaian' => [
                'jumlah_dosen_pns' => 0,
                'jumlah_dosen_pppk' => 0,
                'jumlah_dosen_tetap' => 0,
                'jumlah_dosen_tidak_tetap' => 0,
                'updated_at' => null
            ],
            'dosen_berdasarkan_fakultas' => [
                'jumlah_dosen_pascasarjana' => 0,
                'jumlah_dosen_fip' => 0,
                'jumlah_dosen_fbs' => 0,
                'jumlah_dosen_fmipa' => 0,
                'jumlah_dosen_fish' => 0,
                'jumlah_dosen_ft' => 0,
                'jumlah_dosen_fikk' => 0,
                'jumlah_dosen_feb' => 0,
                'jumlah_dosen_fpsi' => 0,
                'jumlah_dosen_ppg' => 0,
                'updated_at' => null
            ]
        ]);
    }
}