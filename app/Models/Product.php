<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'jam_buka',     // ✅ Tambahkan ini
        'telepon',      // (jika field ini juga digunakan)
        'platform',     // (jika digunakan di form & tampilan)
        'shop_description',
        'view_count',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function incrementView()
    {
        $this->increment('view_count');
    }
}
