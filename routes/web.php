<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RekapController;

Route::get('/', function(){ return redirect()->route('dashboard'); });

Route::get('/dashboard', function(){
    // Ringkasan singkat: total produk, produksi hari ini, pengiriman hari ini
    $total_produk = \App\Models\Produk::count();
    $produksi_today = \App\Models\Produksi::whereDate('tanggal_produksi', date('Y-m-d'))->sum('jumlah_selesai');
    $pengiriman_today = \App\Models\DetailPengiriman::whereHas('pengiriman', function($q){
        $q->whereDate('tanggal_kirim', date('Y-m-d'));
    })->sum('jumlah_kirim');

    return view('dashboard', compact('total_produk','produksi_today','pengiriman_today'));
})->name('dashboard');

// Resource routes
Route::resource('produk', ProdukController::class);
Route::resource('produksi', ProduksiController::class)->except(['edit','update','destroy']);
Route::resource('pengiriman', PengirimanController::class);
Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
Route::resource('karyawan', App\Http\Controllers\KaryawanController::class);
Route::resource('rekap', App\Http\Controllers\RekapController::class)->only(['index','show']);


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::resource('karyawan', KaryawanController::class);
});

Route::middleware(['auth', 'karyawan'])->group(function () {
    Route::resource('produksi', ProduksiController::class);
});

Route::middleware(['auth', 'role:Admin,Karyawan'])->group(function () {
    Route::resource('pengiriman', PengirimanController::class);
});
