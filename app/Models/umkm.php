<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'kategori_toko',
        'alamat_toko',
        'email',
        'no_telepon',
        'password',
    ];
}