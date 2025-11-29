<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'nidn',
        'gelar_depan',
        'gelar_belakang',
        'jenjang',
        'unit',
        'prodi',
        'status',
        'jabatan'
    ];
    protected $casts = [
        'jabatan' => 'array',
    ];

}
