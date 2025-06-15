<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',     // ID toko
        'nama',           // Nama produk/menu
        'deskripsi',      // Deskripsi produk
        'harga',          // Harga produk
        'gambar',         // Path gambar
    ];

    // Relasi ke model Product (Toko)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
