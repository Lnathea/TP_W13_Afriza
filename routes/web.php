<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\StokController;
use App\Models\Product; // Pastikan ini ada
use App\Models\Toko;    // Pastikan ini ada
use App\Models\Stok;    // Pastikan ini ada

// 🔹 Route LOGIN berada di luar AuthCheck
Route::get('/login', function () {
    return view('login');   // pastikan kamu buat file login.blade.php
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    // Contoh login sederhana
    if ($request->username === 'admin' && $request->password === '123') {
        $request->session()->put('user_id', 1);
        return redirect('/');
    }
    return back()->with('error', 'Login gagal');
});

// 🔹 Logout
// UBAH DARI Route::get MENJADI Route::post
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    $request->session()->forget('user_id');
    return redirect('/login');
})->name('logout');

// 🔹 Semua yang perlu login masuk ke middleware
Route::middleware([AuthCheck::class])->group(function () {

   Route::get('/', function () {
        // 1. Ambil data statistik dari database
        $totalProducts = Product::count(); 
        $totalTokos = Toko::count();
        
        // Asumsi: Total stok adalah jumlah kolom 'jumlah' dari semua record Stok
        $totalStokUnit = Stok::sum('jumlah'); 
        
        // Contoh logika stok rendah (misal, stok yang jumlahnya kurang dari 5)
        $stokRendah = Stok::where('jumlah', '<', 5)->count();

        // 2. Kirim data ke view
        return view('dashboard', compact('totalProducts', 'totalTokos', 'totalStokUnit', 'stokRendah'));
    })->name('dashboard');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/toko', function () {
        return view('toko');
    })->name('toko');

    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');

    Route::resource('products', ProductController::class);
    Route::resource('toko', TokoController::class);
    Route::resource('stok', StokController::class);
});
