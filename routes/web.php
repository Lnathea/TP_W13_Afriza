<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\StokController;
use App\Http\Middleware\AuthCheck;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Stok;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Login & Register)
|--------------------------------------------------------------------------
*/

// ========== LOGIN ==========
Route::get('/login', function () {
    return view('login');
})->name('login');

// LOGIN PAKAI EMAIL
Route::post('/login', function (Request $request) {

    // Validasi
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan');
    }

    // Cek password hash
    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Password salah');
    }

    // Simpan sesi login
    $request->session()->put('user_id', $user->id);

    return redirect('/');
});

// ========== REGISTER ==========
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);


// ========== LOGOUT ==========
Route::post('/logout', function (Request $request) {
    $request->session()->forget('user_id');
    return redirect('/login');
})->name('logout');



/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Harus Login)
|--------------------------------------------------------------------------
*/

Route::middleware([AuthCheck::class])->group(function () {

    // DASHBOARD
    Route::get('/', function () {

        $totalProducts = Product::count();
        $totalTokos = Toko::count();
        $totalStokUnit = Stok::sum('jumlah');
        $stokRendah = Stok::where('jumlah', '<', 5)->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalTokos',
            'totalStokUnit',
            'stokRendah'
        ));
    })->name('dashboard');

    // STATIC PAGES
    Route::view('/home', 'home')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::view('/contact', 'contact')->name('contact');

    // TOKO PAGE
    Route::get('/toko', function () {
        return view('toko');
    })->name('toko');

    // STOK INDEX
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');

    // RESOURCE ROUTES
    Route::resource('products', ProductController::class);
    Route::resource('toko', TokoController::class);
    Route::resource('stok', StokController::class);
});
