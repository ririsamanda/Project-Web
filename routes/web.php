<?php

use Illuminate\Support\Facades\Route;
// Import Controller yang sudah ada
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RekapController;

// Tambahkan route sementara untuk melihat tampilan login
Route::get('/login/admin', function () {
    return view('auth.login-admin');
})->name('login.admin');

Route::get('/login/karyawan', function () {
    return view('auth.login-karyawan');
})->name('login.karyawan');

// Import Controller baru untuk Dashboard
use App\Http\Controllers\DashboardController; 

// Halaman utama redirect ke dashboard
Route::get('/', function(){ 
    return redirect()->route('dashboard'); 
});

// Dashboard - Sekarang memanggil Controller
// BARIS INI MENGGANTIKAN SEMUA LOGIKA YANG ERROR DI CLOSURE SEBELUMNYA
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource routes
Route::resource('produk', ProdukController::class);
Route::resource('produksi', ProduksiController::class)->except(['edit','update','destroy']);
Route::resource('pengiriman', PengirimanController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('rekap', RekapController::class)->only(['index','show']);