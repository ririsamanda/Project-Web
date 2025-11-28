<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Sistem Produksi')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* ringkasan styling untuk mendekati mockup figma: toolbar atas, kanan tombol setting */
    .topbar { background:#0d6efd; color:white; padding:10px 15px; }
    .card-custom { border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,.08);}
    .sidebar { min-width:220px; }
  </style>
</head>
<body>
  <div class="topbar d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <h5 class="mb-0 me-3">PT Apple Keroak</h5>
      <small class="text-white-50">Sistem Produksi & Pengiriman</small>
    </div>
    <div>
      <a href="{{ route('dashboard') }}" class="btn btn-sm btn-light">Dashboard</a>
      <a href="{{ route('produk.index') }}" class="btn btn-sm btn-light">Produk</a>
      <a href="{{ route('produksi.index') }}" class="btn btn-sm btn-light">Produksi</a>
      <a href="{{ route('pengiriman.index') }}" class="btn btn-sm btn-light">Pengiriman</a>
      <a href="#" class="btn btn-sm btn-light">Setting</a>
    </div>
  </div>

  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-2 sidebar">
        <div class="list-group">
          <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
          <a href="{{ route('produk.index') }}" class="list-group-item list-group-item-action">Produk</a>
          <a href="{{ route('produksi.index') }}" class="list-group-item list-group-item-action">Produksi</a>
          <a href="{{ route('pengiriman.index') }}" class="list-group-item list-group-item-action">Pengiriman</a>
          <a href="{{ route('rekap.index') }}" class="list-group-item list-group-item-action">Rekap</a>
          <a href="{{ route('karyawan.index') }}" class="list-group-item list-group-item-action">Karyawan</a>
        </div>
      </div>
      <div class="col-md-10">
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
