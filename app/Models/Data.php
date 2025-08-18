<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'unj_dalam_angka',
        'mahasiswa_berdasarkan_angkatan',
        'dosen_berdasarkan_pendidikan'
    ];
    protected $casts = [
        'unj_dalam_angka' => 'array',
        'mahasiswa_berdasarkan_angkatan' => 'array',
        'dosen_berdasarkan_pendidikan' => 'array'
    ];
}