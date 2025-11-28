@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <a href="{{ route('rekap.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <h4 class="mb-3">Detail Rekap Produksi & Pengiriman</h4>

            <div class="row">
                <div class="col-md-4">
                    <p><strong>User:</strong> {{ $rekap->user->nama_user }}</p>
                    <p><strong>Tanggal:</strong> {{ $rekap->tanggal }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Periode:</strong>
                        <span class="badge bg-info">{{ $rekap->periode }}</span>
                    </p>
                    <p><strong>Total Produksi:</strong> {{ $rekap->total_produksi }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Total Pengiriman:</strong> {{ $rekap->total_pengiriman }}</p>
                    <p><strong>Keterangan:</strong> {{ $rekap->keterangan ?? '-' }}</p>
                </div>
            </div>

        </div>
    </div>

    <!-- PRODUKSI -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">Data Produksi</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-custom-head">
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Jumlah Selesai</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produksi as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->produk->nama_produk }}</td>
                        <td>{{ $p->jumlah_selesai }}</td>
                        <td>{{ $p->tanggal_produksi }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Tidak ada data produksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- PENGIRIMAN -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-success text-white">Data Pengiriman</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-custom-head">
                    <tr>
                        <th>#</th>
                        <th>Pelanggan</th>
                        <th>Produk</th>
                        <th>Jumlah Kirim</th>
                        <th>Tanggal Kirim</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengiriman as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->pengiriman->pelanggan->nama_pelanggan }}</td>
                        <td>{{ $k->produk->nama_produk }}</td>
                        <td>{{ $k->jumlah_kirim }}</td>
                        <td>{{ $k->pengiriman->tanggal_kirim }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            Tidak ada data pengiriman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
