@extends('layouts.app')
@section('title', 'Portal Karyawan')

@section('content')
<div class="container px-4">
    
    <!-- Welcome Header -->
    <div class="text-center my-5">
        <div class="mb-3">
            <span class="badge rounded-pill bg-success px-3 py-2">PORTAL OPERASIONAL</span>
        </div>
        <h2 class="fw-bold display-6">Halo, {{ Auth::user()->nama_karyawan }}!</h2>
        <p class="text-muted lead">Selamat bekerja, utamakan keselamatan kerja (K3).</p>
    </div>

    <!-- Status Kerja Hari Ini -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow rounded-4 bg-gradient-primary text-white text-center p-4">
                <h5 class="fw-normal opacity-75 text-uppercase ls-1 small">Output Anda Hari Ini</h5>
                <h1 class="fw-bold display-3 my-2">{{ number_format($my_produksi_today ?? 0) }}</h1>
                <p class="mb-0 small opacity-75">Unit Produk Selesai</p>
            </div>
        </div>
    </div>

    <!-- Menu Aksi Utama (Grid Besar) -->
    <div class="row g-4 justify-content-center">
        
        <!-- Tombol Input Produksi -->
        <div class="col-md-5 col-lg-4">
            <a href="{{ route('produksi.create') }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm rounded-4 card-hover text-center p-4">
                    <div class="icon-box bg-success bg-opacity-10 text-success mx-auto mb-3" style="width: 80px; height: 80px; display:flex; align-items:center; justify-content:center; border-radius:50%; font-size: 2rem;">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Input Produksi</h4>
                    <p class="text-muted small">Laporkan hasil produksi yang telah Anda selesaikan.</p>
                    <span class="btn btn-outline-success rounded-pill px-4">Mulai Input</span>
                </div>
            </a>
        </div>

        <!-- Tombol Cek Jadwal/Pengiriman -->
        <div class="col-md-5 col-lg-4">
            <a href="{{ route('pengiriman.index') }}" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm rounded-4 card-hover text-center p-4">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning mx-auto mb-3" style="width: 80px; height: 80px; display:flex; align-items:center; justify-content:center; border-radius:50%; font-size: 2rem;">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <h4 class="fw-bold text-dark">Status Pengiriman</h4>
                    <p class="text-muted small">Cek daftar barang yang harus dikirim hari ini.</p>
                    <span class="btn btn-outline-warning rounded-pill px-4">Lihat Daftar</span>
                </div>
            </a>
        </div>

    </div>

    <!-- Footer Quote -->
    <div class="text-center mt-5 text-muted small">
        <p>"Kualitas adalah pekerjaan pertama kita."</p>
    </div>

</div>

<style>
    .card-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
    }
</style>
@endsection