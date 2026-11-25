<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

// 1. Landing Page (Public) - Mengambil data produk dari database
Route::get('/', function () {
    $produks = Produk::all();
    return view('welcome', compact('produks'));
});

// 2. Simulasi Payment Dummy (Public / bisa diakses langsung saat test)
Route::get('/checkout/{produk}', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/{produk}/bayar', [CheckoutController::class, 'process'])->name('checkout.process');

// 3. Area Terproteksi (Middleware Auth)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Produk
    Route::resource('produk', ProdukController::class);

    // Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';