<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'batas_daftar',
        'tgl_mulai',
        'tgl_akhir',
        'kuota',
        'biaya',
        'foto',
        'id_kategori',
        'visible',
        'id_rek'
    ];
}
