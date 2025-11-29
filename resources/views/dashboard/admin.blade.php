@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
<!-- Pastikan link Bootstrap Icons ada di layouts.app -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<style>
    /* Custom Styling untuk Tombol Master Data */
    .master-data-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        transition: all 0.2s ease;
        border-radius: 10px;
        padding: 15px 20px;
        border: 1px solid #dee2e6; /* Border default */
    }
    .master-data-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-color: #0d6efd; /* Highlight border on hover */
    }
    .master-data-btn .icon {
        font-size: 1.5rem;
    }
    
    /* Styling Tabs */
    .nav-tabs .nav-link.active {
        background-color: #0d6efd;
        color: white !important;
        border-color: #0d6efd !important;
        border-bottom: none !important;
    }
    .nav-tabs .nav-link {
        color: #0d6efd;
        border: 1px solid #ccc;
        margin-right: 5px;
        border-radius: 8px 8px 0 0 !important;
    }

    /* Style for Statistic Card */
    .stat-card {
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
</style>

<div class="container-fluid px-4">
    
    <!-- Header Admin -->
    <div class="d-flex justify-content-between align-items-center my-4">
        <div>
            <h2 class="fw-bold text-dark">Executive Dashboard</h2>
            <p class="text-muted mb-0">Overview performa pabrik.</p>
        </div>
        <div>
            <button class="btn btn-primary rounded-pill px-3 shadow-sm">
                <i class="bi bi-download me-2"></i> Unduh Laporan
            </button>
        </div>
    </div>

    <!-- Nav Tabs (Harian, Bulanan, Tahunan) - KASUS 6 Requirement -->
    <ul class="nav nav-tabs border-0" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold rounded-top-4" id="daily-tab" data-bs-toggle="tab" data-bs-target="#daily" type="button" role="tab" aria-controls="daily" aria-selected="true">
                <i class="bi bi-calendar-day me-1"></i> Hari Ini
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold rounded-top-4" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" type="button" role="tab" aria-controls="monthly" aria-selected="false">
                <i class="bi bi-calendar-month me-1"></i> Bulan Ini
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold rounded-top-4" id="yearly-tab" data-bs-toggle="tab" data-bs-target="#yearly" type="button" role="tab" aria-controls="yearly" aria-selected="false">
                <i class="bi bi-calendar-range me-1"></i> Tahun Ini
            </button>
        </li>
    </ul>

    <!-- Konten Tab -->
    <div class="tab-content border-top pt-4" id="dashboardTabsContent">
        
        <!-- Fungsi untuk menampilkan Card Statistik (Mencegah pengulangan kode) -->
        @php
            function renderStatCard($title, $value, $subtitle, $icon, $color, $link = '#', $linkText = 'Lihat Detail') {
                return '
                    <div class="col-xl-4 col-md-6">
                        <div class="card border-0 shadow-sm overflow-hidden h-100 stat-card">
                            <div class="card-body p-4 position-relative">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <p class="text-uppercase fw-bold text-muted small mb-1">' . $title . '</p>
                                        <h2 class="fw-bold text-' . $color . ' mb-0">' . number_format($value) . '</h2>
                                        <span class="badge bg-' . $color . ' bg-opacity-10 text-' . $color . ' mt-2">' . $subtitle . '</span>
                                    </div>
                                    <div class="p-3 bg-' . $color . ' bg-opacity-10 rounded-circle text-' . $color . '">
                                        <i class="bi ' . $icon . ' fs-3"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light border-0 py-2">
                                <a href="' . $link . '" class="text-decoration-none small text-muted d-flex align-items-center justify-content-between">
                                    ' . $linkText . ' <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                ';
            }
        @endphp

        <!-- Tab Hari Ini (Data yang sudah ada) -->
        <div class="tab-pane fade show active" id="daily" role="tabpanel" aria-labelledby="daily-tab">
            <div class="row g-4 mb-4">
                {!! renderStatCard('Total SKU Produk', $total_produk, 'Item Terdaftar', 'bi-box-seam-fill', 'primary', route('produk.index'), 'Kelola Produk') !!}
                {!! renderStatCard('Output Produksi Hari Ini', $produksi_today, 'Unit Selesai', 'bi-gear-wide-connected', 'success') !!}
                {!! renderStatCard('Pengiriman Hari Ini', $pengiriman_today, 'Unit Dikirim', 'bi-truck-flatbed', 'warning', route('pengiriman.index'), 'Lihat Jadwal') !!}
            </div>
        </div>
        
        <!-- Tab Bulan Ini (Menggunakan data dari Controller) -->
        <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
            <div class="row g-4 mb-4">
                {!! renderStatCard('Total SKU Produk', $total_produk, 'Item Terdaftar', 'bi-box-seam-fill', 'primary', route('produk.index'), 'Kelola Produk') !!}
                {!! renderStatCard('Output Produksi Bulan Ini', $produksi_month, 'Unit Selesai', 'bi-bar-chart-fill', 'success') !!}
                {!! renderStatCard('Pengiriman Bulan Ini', $pengiriman_month, 'Unit Dikirim', 'bi-geo-alt-fill', 'warning', route('pengiriman.index'), 'Lihat Laporan') !!}
            </div>
        </div>

        <!-- Tab Tahun Ini (Menggunakan data dari Controller) -->
        <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
             <div class="row g-4 mb-4">
                {!! renderStatCard('Total SKU Produk', $total_produk, 'Item Terdaftar', 'bi-box-seam-fill', 'primary', route('produk.index'), 'Kelola Produk') !!}
                {!! renderStatCard('Output Produksi Tahun Ini', $produksi_year, 'Unit Selesai', 'bi-graph-up', 'success') !!}
                {!! renderStatCard('Pengiriman Tahun Ini', $pengiriman_year, 'Unit Dikirim', 'bi-globe-americas', 'warning', route('pengiriman.index'), 'Lihat Laporan') !!}
            </div>
        </div>
    </div>

    <!-- Menu Cepat Admin (Manajemen Master Data) -->
    <h5 class="fw-bold mt-4 mb-3"><i class="bi bi-grid-fill me-2"></i> Manajemen Master Data</h5>
    <div class="row g-4">
        <div class="col-md-3">
            <a href="{{ route('karyawan.index') }}" class="btn master-data-btn w-100 btn-outline-primary">
                Data Karyawan <i class="bi bi-people-fill icon"></i>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('pelanggan.index') }}" class="btn master-data-btn w-100 btn-outline-success">
                Data Pelanggan <i class="bi bi-building icon"></i>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('rekap.index') }}" class="btn master-data-btn w-100 btn-outline-warning">
                Laporan Rekap <i class="bi bi-file-earmark-text-fill icon"></i>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn master-data-btn w-100 btn-outline-secondary">
                Pengaturan Sistem <i class="bi bi-sliders icon"></i>
            </a>
        </div>
    </div>
</div>

<!-- Tambahkan script Bootstrap Bundle agar tab berfungsi -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection