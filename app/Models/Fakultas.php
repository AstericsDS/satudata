<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas',
        'singkatan_fakultas'
    ];

    public function prodi() {
        return $this->hasMany(Prodi::class, 'kode_fakultas', 'kode_fakultas');
    }
}