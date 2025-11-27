@extends('layouts.app')
@section('title','Tambah Produk')

@section('content')

<div class="card card-custom p-4">
    <h4>Tambah Produk</h4>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Kode Produk</label>
            <input name="kode_produk" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input name="nama_produk" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Kategori</label>
                <input name="kategori" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Satuan</label>
                <input name="satuan" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>

@endsection
