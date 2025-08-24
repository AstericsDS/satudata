<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultas = [
            ['kode_fakultas' => 99, 'nama_fakultas' => 'Sekolah Pascasarjana', 'singkatan_fakultas' => 'Pascasarjana'],
            ['kode_fakultas' => 11, 'nama_fakultas' => 'Fakultas Ilmu Pendidikan', 'singkatan_fakultas' => 'FIP'],
            ['kode_fakultas' => 12, 'nama_fakultas' => 'Fakultas Bahasa dan Seni', 'singkatan_fakultas' => 'FBS'],
            ['kode_fakultas' => 13, 'nama_fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'singkatan_fakultas' => 'FMIPA'],
            ['kode_fakultas' => 14, 'nama_fakultas' => 'Fakultas Ilmu Sosial dan Hukum', 'singkatan_fakultas' => 'FISH'],
            ['kode_fakultas' => 15, 'nama_fakultas' => 'Fakultas Teknik', 'singkatan_fakultas' => 'FT'],
            ['kode_fakultas' => 16, 'nama_fakultas' => 'Fakultas Ilmu Keolahragaan dan Kesehatan', 'singkatan_fakultas' => 'FIKK'],
            ['kode_fakultas' => 17, 'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis', 'singkatan_fakultas' => 'FEB'],
            ['kode_fakultas' => 18, 'nama_fakultas' => 'Fakultas Psikologi', 'singkatan_fakultas' => 'FPsi'],
            ['kode_fakultas' => 20, 'nama_fakultas' => 'Program Profesi Guru', 'singkatan_fakultas' => 'PPG']
        ];

        Fakultas::insert($fakultas);
    }
}