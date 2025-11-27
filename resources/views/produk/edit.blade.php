@extends('layouts.app')
@section('title','Edit Produk')

@section('content')

<div class="card card-custom p-4">
    <h4>Edit Produk</h4>

    <form action="{{ route('produk.update',$produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kode Produk</label>
            <input name="kode_produk" class="form-control" value="{{ $produk->kode_produk }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Kategori</label>
                <input name="kategori" class="form-control" value="{{ $produk->kategori }}">
            </div>
            <div class="col">
                <label class="form-label">Satuan</label>
                <input name="satuan" class="form-control" value="{{ $produk->satuan }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input name="harga" type="number" class="form-control" value="{{ $produk->harga }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>

@endsection
