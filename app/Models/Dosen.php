<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'gelar_depan',
        'gelar_belakang',
        'unit',
        'status',
        'jabatan'
    ];
    protected $casts = [
        'jabatan' => 'array',
    ];

}
