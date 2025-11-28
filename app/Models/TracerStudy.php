<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'fakultas',
        'prodi',
        'tahun_lulus',
        'status_pekerjaan'
    ];
}
