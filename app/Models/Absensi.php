<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'nama',
        'unit_kerja',
        'cabang',
        'checktime'
    ];
    protected $table = 'absensi';
}
