<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = 'anggaran';
    protected $fillable = [
        'satker',
        'tahun',
        'data_scope',
        'nama',
        'pagu_total',
        'pagu_realisasi',
        'pagu_sisa'
    ];
}
