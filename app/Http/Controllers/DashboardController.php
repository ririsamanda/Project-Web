<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Produksi;
use App\Models\DetailPengiriman;

class DashboardController extends Controller
{
    public function index()
    {
        // --- PERBAIKAN DI SINI ---
        // Sebelumnya: $total_produk = Produk::sum('stok'); (Error karena tidak ada kolom stok)
        // Sekarang: Menghitung total jumlah jenis produk yang ada di database.
        $total_produk = Produk::count();

        // Produksi selesai hari ini
        $produksi_today = Produksi::whereDate('tanggal_produksi', date('Y-m-d'))
                                  ->sum('jumlah_selesai');

        // Pengiriman hari ini
        $pengiriman_today = DetailPengiriman::whereHas('pengiriman', function($q){
                $q->whereDate('tanggal_kirim', date('Y-m-d'));
            })
            ->sum('jumlah_kirim');

        return view('dashboard', compact('total_produk', 'produksi_today', 'pengiriman_today'));
    }
}