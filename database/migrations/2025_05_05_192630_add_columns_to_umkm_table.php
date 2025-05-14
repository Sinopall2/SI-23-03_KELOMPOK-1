<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUmkmTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            // Add columns only if they do not exist
            if (!Schema::hasColumn('umkm', 'nama_toko')) {
                $table->string('nama_toko');
            }
            if (!Schema::hasColumn('umkm', 'deskripsi_toko')) {
                $table->string('deskripsi_toko');
            }
            if (!Schema::hasColumn('umkm', 'kategori_toko')) {
                $table->string('kategori_toko');
            }
            if (!Schema::hasColumn('umkm', 'alamat_toko')) {
                $table->string('alamat_toko');
            }
            if (!Schema::hasColumn('umkm', 'email')) {
                $table->string('email')->unique();
            }
            if (!Schema::hasColumn('umkm', 'no_telepon')) {
                $table->string('no_telepon');
            }
            if (!Schema::hasColumn('umkm', 'password')) {
                $table->string('password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm', function (Blueprint $table) {
            $table->dropColumn([
                'nama_toko', 
                'deskripsi_toko', 
                'kategori_toko', 
                'alamat_toko', 
                'email', 
                'no_telepon', 
                'password'
            ]);
        });
    }
}


