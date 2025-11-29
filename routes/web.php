<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Import Controller yang sudah ada
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\LoginController;

// =========================================================
// 1. RUTE PUBLIK & AUTENTIKASI
// =========================================================

// Rute Default: Redirect ke halaman pilihan login
Route::get('/', function(){ 
    return redirect()->route('login');
});

// Halaman Seleksi Login (Lobi Utama)
Route::get('/login', function(){
    return view('auth.select-login');
})->name('login');

// Login GET/POST Routes
Route::get('/login/admin', function () { return view('auth.login-admin'); })->name('login.admin');
Route::post('/login/admin', [LoginController::class, 'processAdmin'])->name('login.admin.process');
Route::get('/login/karyawan', function () { return view('auth.login-karyawan'); })->name('login.karyawan');
Route::post('/login/karyawan', [LoginController::class, 'processKaryawan'])->name('login.karyawan.process');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// =========================================================
// 2. RUTE TERLINDUNG (MENGGUNAKAN INLINE CHECK)
// =========================================================

// Group Middleware 'auth' memastikan user harus login dulu
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- KHUSUS ADMIN (id_hakakses = 1) ---
    Route::group(['middleware' => function (Request $request, Closure $next) {
        if (Auth::user()->id_hakakses != 1) { // Jika BUKAN Admin
            return redirect('/dashboard')->with('error', 'Akses Admin Ditolak!');
        }
        return $next($request);
    }], function () {
        // Resource Routes untuk Manajemen Master Data
        Route::resource('produk', ProdukController::class);
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('rekap', RekapController::class)->only(['index','show']);
    });

    // --- KHUSUS KARYAWAN (id_hakakses = 2) ---
    Route::group(['middleware' => function (Request $request, Closure $next) {
        if (Auth::user()->id_hakakses != 2) { // Jika BUKAN Karyawan
            return redirect('/dashboard')->with('error', 'Akses Karyawan Ditolak!');
        }
        return $next($request);
    }], function () {
        // Karyawan fokus ke Input Produksi
        Route::resource('produksi', ProduksiController::class)->except(['edit','update','destroy']);
    });
    
    // --- AKSES BERSAMA (Admin & Karyawan) ---
    Route::group(['middleware' => function (Request $request, Closure $next) {
        $role = Auth::user()->id_hakakses;
        // Jika BUKAN Admin (1) dan BUKAN Karyawan (2)
        if ($role != 1 && $role != 2) { 
            return redirect('/dashboard')->with('error', 'Akses Ditolak.');
        }
        return $next($request);
    }], function () {
        Route::resource('pengiriman', PengirimanController::class);
    });

});