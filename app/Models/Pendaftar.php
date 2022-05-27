<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'jenis_pendaftar',
        'nama',
        'nim_nips',
        'bid_pekerjaan',
        'fakultas',
        'prodi',
        'agama',
        'jk',
        'tpt_lahir',
        'alamat',
        'email',
        'telepon',
        'foto',
        'id_pelatihan',
        'status',
    ];

    public $timestamps = false;
}
