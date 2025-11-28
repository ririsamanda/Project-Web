@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="row g-3">
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h6>Total Produk</h6>
      <h3>{{ $total_produk }}</h3>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h6>Produksi hari ini</h6>
      <h3>{{ $produksi_today }}</h3>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-custom p-3">
      <h6>Pengiriman hari ini</h6>
      <h3>{{ $pengiriman_today }}</h3>
    </div>
  </div>

  <div class="col-12 mt-3">
    <div class="card card-custom p-3">
      <h5>Ringkasan</h5>
      <p>Dashboard ringkasan singkat. Anda bisa menambahkan chart/visual dari data produksi dan pengiriman sesuai desain figma.</p>
    </div>
  </div>
</div>
@endsection
