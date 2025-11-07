<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'nip',
        'nidn',
        'nuptk',
        'cabang_dosen',
        'kode_prodi',
        'kode_fakultas',
        'id_prodi',
        'id_fakultas',
        'status_kepegawaian',
        'jenjang_pendidikan',
        'jabatan_fungsional',
    ];

    public function fakultas() {
        $this->belongsTo(Fakultas::class, 'kode_fakultas');
    }

    public function prodi() {
        $this->belongsTo(Prodi::class, 'kode_prodi');
    }
}
