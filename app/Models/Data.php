<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['unj_dalam_angka', 'mahasiswa_berdasarkan_angkatan'];
    protected $casts = [
        'unj_dalam_angka' => 'array',
        'mahasiswa_berdasarkan_angkatan' => 'array'
    ];
}
