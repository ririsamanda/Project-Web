@extends('layouts.app')

@section('content')
<!-- Tambahkan Link Bootstrap Icons jika belum ada di layout utama -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<style>
    /* Custom CSS untuk mempercantik Dashboard */
    .card-hover:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .icon-box {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 1.8rem;
    }
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    .bg-gradient-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }
</style>

<div class="container-fluid px-4 mt-4">

    <!-- Header Selamat Datang -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Dashboard Ringkasan</h2>
            <p class="text-muted mb-0">Selamat datang kembali di Sistem Produksi & Pengiriman.</p>
        </div>
        <div class="bg-white p-2 px-3 rounded shadow-sm text-muted small">
            <i class="bi bi-calendar-event me-2"></i> {{ date('d F Y') }}
        </div>
    </div>

    <!-- Baris Kartu Statistik -->
    <div class="row g-4">

        <!-- Card 1: Total Produk (Biru) -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-hover overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-bold text-uppercase mb-1 small">Total Produk</p>
                            <h2 class="fw-bold text-dark mb-0">{{ number_format($total_produk) }}</h2>
                            <small class="text-success fw-bold"><i class="bi bi-arrow-up-short"></i> Item Aktif</small>
                        </div>
                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Garis hiasan di bawah -->
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Card 2: Produksi Hari Ini (Hijau) -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-hover overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-bold text-uppercase mb-1 small">Produksi Hari Ini</p>
                            <h2 class="fw-bold text-dark mb-0">{{ number_format($produksi_today) }}</h2>
                            <small class="text-muted">Unit Selesai</small>
                        </div>
                        <div class="icon-box bg-success bg-opacity-10 text-success">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Card 3: Pengiriman Hari Ini (Kuning/Oranye) -->
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-hover overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted fw-bold text-uppercase mb-1 small">Pengiriman Hari Ini</p>
                            <h2 class="fw-bold text-dark mb-0">{{ number_format($pengiriman_today) }}</h2>
                            <small class="text-muted">Dalam Perjalanan</small>
                        </div>
                        <div class="icon-box bg-warning bg-opacity-10 text-warning">
                            <i class="bi bi-truck-front-fill"></i>
                        </div>
                    </div>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Informasi Tambahan -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-light border-start border-4 border-info shadow-sm rounded-3 d-flex align-items-center p-4">
                <i class="bi bi-info-circle-fill text-info fs-3 me-3"></i>
                <div>
                    <h6 class="fw-bold mb-1">Status Sistem Real-time</h6>
                    <p class="mb-0 text-muted small">Data di atas diperbarui secara otomatis setiap kali ada input produksi atau pengiriman baru hari ini.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection