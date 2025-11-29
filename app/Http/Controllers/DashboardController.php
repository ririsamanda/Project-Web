<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Produksi;
use App\Models\DetailPengiriman;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan instance user yang sedang login (Model Karyawan)
        $user = Auth::user();

        // -----------------------------------------------------
        // Pengecekan Kualitas: Pastikan user login dan memiliki hak akses
        // Jika tidak, kembalikan ke login (Ini mencegah error 500)
        // -----------------------------------------------------
        if (!$user) {
            return redirect()->route('login');
        }

        // ASUMSI: id_hakakses 1 = Admin, Lainnya = Karyawan
        
        // =========================================================
        // 1. DASHBOARD ADMIN (id_hakakses = 1)
        // =========================================================
        if ($user->id_hakakses == 1) { 
            
            // --- DATA HARIAN (Hari Ini) ---
            $total_produk = Produk::count(); // Total SKU Produk
            $produksi_today = Produksi::whereDate('tanggal_produksi', date('Y-m-d'))->sum('jumlah_selesai');
            $pengiriman_today = DetailPengiriman::whereHas('pengiriman', function($q){
                $q->whereDate('tanggal_kirim', date('Y-m-d'));
            })->sum('jumlah_kirim');

            // --- DATA BULANAN (Bulan Ini) ---
            // Produksi Bulanan: Lengkap
            $produksi_month = Produksi::whereMonth('tanggal_produksi', date('m'))
                                      ->whereYear('tanggal_produksi', date('Y'))
                                      ->sum('jumlah_selesai');
            // Pengiriman Bulanan: Query ditambahkan
            $pengiriman_month = DetailPengiriman::whereHas('pengiriman', function($q){
                $q->whereMonth('tanggal_kirim', date('m'))
                  ->whereYear('tanggal_kirim', date('Y'));
            })->sum('jumlah_kirim');

            // --- DATA TAHUNAN (Tahun Ini) ---
            // Produksi Tahunan: Query ditambahkan
            $produksi_year = Produksi::whereYear('tanggal_produksi', date('Y'))->sum('jumlah_selesai');
            // Pengiriman Tahunan: Query ditambahkan
            $pengiriman_year = DetailPengiriman::whereHas('pengiriman', function($q){
                $q->whereYear('tanggal_kirim', date('Y'));
            })->sum('jumlah_kirim');


            // Return ke View Khusus Admin dengan semua data periode
            return view('dashboard.admin', compact(
                'total_produk', 
                'produksi_today', 'pengiriman_today',
                'produksi_month', 'pengiriman_month', // Variabel Bulanan
                'produksi_year', 'pengiriman_year'   // Variabel Tahunan
            ));
        }

        // =========================================================
        // 2. DASHBOARD KARYAWAN (id_hakakses != 1)
        // =========================================================
        else {
            $karyawan_id = $user->id_karyawan; 
            
            // Statistik Personal/Operasional (Karyawan)
            $my_produksi_today = Produksi::where('id_karyawan', $karyawan_id) 
                                         ->whereDate('tanggal_produksi', date('Y-m-d'))
                                         ->sum('jumlah_selesai');

            // Data Rekap (Sesuai instruksi KASUS 6)
            $rekap_input_today = Produksi::where('id_karyawan', $karyawan_id)
                                         ->whereDate('tanggal_produksi', date('Y-m-d'))
                                         ->count(); // Contoh: Hitung jumlah input

            // Mengirim data ke View Karyawan
            return view('dashboard.karyawan', compact('my_produksi_today', 'rekap_input_today'));
        }
    }
}