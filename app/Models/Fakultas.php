<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas',
        'singkatan_fakultas'
    ];

    public function prodi() {
        return $this->hasMany(Prodi::class, 'id', 'fakultas_id');
    }

    public function dosen() {
        return $this->hasMany(Dosen::class, 'id', 'kode_fakultas');
    }
}