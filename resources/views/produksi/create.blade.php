@extends('layouts.app')
@section('title','Input Produksi')

@section('content')

<div class="card card-custom p-4">

    <h4>Input Data Produksi</h4>

    <form action="{{ route('produksi.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Produk</label>
                <select name="id_produk" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produkList as $p)
                        <option value="{{ $p->id_produk }}">{{ $p->nama_produk }} ({{ $p->satuan }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Jumlah Selesai</label>
                <input type="number" name="jumlah_selesai" class="form-control" min="1" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal Produksi</label>
                <input type="date" name="tanggal_produksi" value="{{ date('Y-m-d') }}" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Diinput Oleh</label>
                <select name="id_karyawan" class="form-select" required>
                    @foreach($karyawanList as $k)
                        <option value="{{ $k->id_karyawan }}">{{ $k->nama_karyawan }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>

@endsection
