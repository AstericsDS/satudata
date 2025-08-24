<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = [
        'kode_prodi',
        'kode_prodi_dikti',
        'nama_prodi',
        'jenjang_prodi',
        'kode_asal_fakultas'
    ];

    protected $casts = [
        'kode_prodi' => 'string',
        'kode_prodi_dikti' => 'string'
    ];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'kode_fakultas', 'kode_fakultas');
    }
}