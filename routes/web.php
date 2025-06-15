<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\ReviewController;
use App\Models\Product;

// ===============================
// 1. Halaman Utama (Public)
// ===============================
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// ✅ Detail produk publik (gunakan view 'products.show')
Route::get('/produk/{product}', function (Product $product) {
    $product->load('menus'); // load daftar menu
    return view('products.show', compact('product'));
})->name('produk.detail');

// ===============================
// Review Routes
// ===============================
Route::middleware('auth')->group(function () {
    // Route to add a review for a product
    Route::post('/product/{productId}/review', [ReviewController::class, 'store'])->name('reviews.store');

    // Route to display reviews (this could be used on the product detail page)
    Route::get('/product/{productId}/reviews', [ReviewController::class, 'show'])->name('reviews.show');

    // Tambah route hapus review (admin only)
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// ===============================
// 2. Autentikasi
// ===============================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('register-page');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/lupa_password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/lupa_password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Cegah akses GET langsung ke /logout
Route::get('/logout', function () {
    return redirect()->route('login')->with('warning', 'Silakan gunakan tombol logout.');
});

// ===============================
// 3. Halaman Admin (auth middleware)
// ===============================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminProductController::class, 'index'])->name('dashboard');

    // Produk (Toko)
    Route::resource('products', AdminProductController::class);

    // Menu Produk
    Route::get('/menus/create/{product}', [AdminMenuController::class, 'create'])->name('menus.create');
    Route::post('/menus/store', [AdminMenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{menu}/edit', [AdminMenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{menu}', [AdminMenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('menus.destroy');
});

// 4. Review Routes (outside of admin)
Route::post('/product/{productId}/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/product/{productId}', [ReviewController::class, 'show'])->name('product.show');

Route::get('/menus/{menu}/edit', [AdminMenuController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{menu}', [AdminMenuController::class, 'update'])->name('menus.update');


Route::prefix('admin')->middleware('auth')->group(function () {
Route::resource('/highlight', App\Http\Controllers\AdminHighlightController::class)->names('admin.highlight');
});

