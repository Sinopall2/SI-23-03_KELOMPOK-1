<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('highlight_products', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul produk unggulan
            $table->text('description')->nullable(); // Deskripsi
            $table->string('image')->nullable(); // Path gambar
            $table->unsignedBigInteger('product_id')->nullable(); // Relasi ke produk (optional)
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('highlight_products');
    }
};
