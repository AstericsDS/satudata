<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'unj_dalam_angka',
        'mahasiswa_berdasarkan_angkatan',
        'mahasiswa_berdasarkan_jenjang_pendidikan',
        'dosen_berdasarkan_pendidikan',
        'dosen_berdasarkan_jabatan_fungsional',
        'dosen_berdasarkan_status_kepegawaian',
        'dosen_berdasarkan_fakultas'
    ];
    protected $casts = [
        'unj_dalam_angka' => 'array',
        'mahasiswa_berdasarkan_angkatan' => 'array',
        'mahasiswa_berdasarkan_jenjang_pendidikan' => 'array',
        'dosen_berdasarkan_pendidikan' => 'array',
        'dosen_berdasarkan_jabatan_fungsional' => 'array',
        'dosen_berdasarkan_status_kepegawaian' => 'array',
        'dosen_berdasarkan_fakultas' => 'array'
    ];
}