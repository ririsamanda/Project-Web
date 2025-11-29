@extends('layouts.app')
@section('title','Tambah Produk')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<div class="container-fluid px-4">
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">
            <i class="bi bi-box-fill me-2 text-success"></i> Tambah Produk Baru
        </h2>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary rounded-pill shadow-sm py-2 px-3 fw-bold">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <!-- Card Form -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            
            <form action="{{ route('produk.store') }}" method="POST">
                @csrf

                <h5 class="mb-3 text-muted border-bottom pb-2">Detail Produk</h5>

                <!-- Kode Produk -->
                <div class="mb-3">
                    <label for="kode_produk" class="form-label fw-bold small text-muted">KODE PRODUK</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-upc-scan"></i></span>
                        <input name="kode_produk" id="kode_produk" class="form-control" value="{{ old('kode_produk') }}" placeholder="Contoh: APK-001">
                    </div>
                    @error('kode_produk') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Nama Produk -->
                <div class="mb-3">
                    <label for="nama_produk" class="form-label fw-bold small text-muted">NAMA PRODUK</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-box"></i></span>
                        <input name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required placeholder="Contoh: Apel Keroak Premium">
                    </div>
                    @error('nama_produk') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <!-- Kategori -->
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label fw-bold small text-muted">KATEGORI</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                            <input name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" placeholder="Contoh: Buah Olahan">
                        </div>
                        @error('kategori') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    
                    <!-- Satuan -->
                    <div class="col-md-6 mb-3">
                        <label for="satuan" class="form-label fw-bold small text-muted">SATUAN UNIT</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-rulers"></i></span>
                            <input name="satuan" id="satuan" class="form-control" value="{{ old('satuan') }}" placeholder="Contoh: Pcs / Kg">
                        </div>
                        @error('satuan') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Harga -->
                <div class="mb-4">
                    <label for="harga" class="form-label fw-bold small text-muted">HARGA JUAL (Rp)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light fw-bold">Rp</span>
                        <input name="harga" id="harga" type="number" class="form-control" value="{{ old('harga') }}" placeholder="Contoh: 15000">
                    </div>
                    @error('harga') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 border-top pt-3">
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary rounded-pill px-4 fw-bold">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4 fw-bold">
                        <i class="bi bi-check-circle me-1"></i> Simpan Produk
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection