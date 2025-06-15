<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('shop_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('jam_buka')->nullable();
            $table->string('telepon')->nullable();
            $table->string('platform')->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}; 