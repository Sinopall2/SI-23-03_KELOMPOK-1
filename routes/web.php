<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteMessageController;
use App\Http\Controllers\EditMessageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Umkm;

// Halaman utama

// Login dan Logout
Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Registrasi
Route::get('/register', [PendaftaranController::class, 'showPendaftaranForm'])->name('pendaftaran.form'); // Show registration form
Route::post('/registerumkm', [PendaftaranController::class, 'pendaftaran'])->name('pendaftaran.store'); // Store registration data

// Edit & Hapus Pesan
Route::get('/message/{id}/edit', [EditMessageController::class, 'edit'])->name('message.edit');
Route::put('/message/{id}', [EditMessageController::class, 'update'])->name('message.update');
Route::delete('/message/{id}', [DeleteMessageController::class, 'destroy'])->name('message.destroy');

Route::get('/produk/tape-cikasungka', [ProductController::class, 'show']);