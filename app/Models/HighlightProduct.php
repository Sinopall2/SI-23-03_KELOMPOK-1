<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighlightProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'product_id',
    ];

    // Relasi ke produk (optional)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
