@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="page-title mb-3">Rekap Produk</h3>

    <!-- FILTER -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('rekap.index') }}" method="GET" class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Periode</label>
                    <select name="periode" class="form-select">
                        <option value="">-- Semua --</option>
                        <option value="Hari" {{ request('periode')=='Hari'?'selected':'' }}>Harian</option>
                        <option value="Bulan" {{ request('periode')=='Bulan'?'selected':'' }}>Bulanan</option>
                        <option value="Tahun" {{ request('periode')=='Tahun'?'selected':'' }}>Tahunan</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="form-control"
                        value="{{ request('tanggal') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Cari</label>
                    <input type="text" name="search"
                        class="form-control"
                        placeholder="Nama user / catatan"
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>

            </form>
        </div>
    </div>

    <!-- TABEL -->
    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover align-middle datatable-custom">
                <thead class="table-custom-head">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Periode</th>
                        <th>Total Produksi</th>
                        <th>Total Pengiriman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($rekap as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $r->user->nama_user }}</td>
                        <td>{{ $r->tanggal }}</td>
                        <td><span class="badge bg-info">{{ $r->periode }}</span></td>
                        <td>{{ $r->total_produksi }}</td>
                        <td>{{ $r->total_pengiriman }}</td>
                        <td>
                            <a href="{{ route('rekap.show', $r->id_rekap) }}"
                                class="btn btn-sm btn-outline-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            Belum ada data rekap.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
