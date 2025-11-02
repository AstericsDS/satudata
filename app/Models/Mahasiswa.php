<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nama',
        'nipd',
        'id_prodi',
        'status',
        'program_studi',
        'jenjang',
        'fakultas',
        'periode_masuk',
        'tanggal_keluar',
    ];

    protected $casts = [
        'tanggal_keluar' => 'date',
    ];
}
