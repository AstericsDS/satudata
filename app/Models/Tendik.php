<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    protected $table = 'tendik';
    protected $fillable = [
        'nama',
        'nip',
        'unit_kerja',
        'gelar_depan',
        'gelar_belakang',
        'status_kepegawaian',
        'golongan'
    ];
}
