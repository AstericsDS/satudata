<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    protected $table = 'kerjasama';
    protected $fillable = [
        'id',
        'tahun',
        'nama_kerjasama',
        'nama_partner',
        'klasifikasi',
        'negara',
        'tanggal_awal',
        'tanggal_akhir',
        'status',
        'jenis_dokumen',
        'unit'
    ];
}
