@extends('layouts.app')
@section('title','Daftar Produk')

@section('content')

<!-- Pastikan Bootstrap Icons terlink di layouts.app, atau tambahkan di sini jika belum ada -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<div class="container-fluid px-4">
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">
            <i class="bi bi-box-seam-fill me-2 text-primary"></i> Daftar Produk
        </h2>
        
        <a href="{{ route('produk.create') }}" class="btn btn-primary rounded-pill shadow-sm py-2 px-3 fw-bold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
        </a>
    </div>

    <!-- Kotak Tabel (Card) -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">
            
            <!-- Filter dan Pencarian -->
            <div class="d-flex justify-content-between mb-4">
                <div class="w-100 me-3" style="max-width: 350px;">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Cari Kode atau Nama Produk..." id="searchInput">
                    </div>
                </div>
            </div>

            <!-- Tabel Produk -->
            <div class="table-responsive">
                <table class="table table-hover table-striped table-borderless align-middle" id="produkTable">
                    <thead class="bg-light">
                        <tr class="text-muted small text-uppercase">
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Satuan</th>
                            <th scope="col" class="text-end">Harga Jual</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @forelse($produks as $p)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-bold text-primary">{{ $p->kode_produk }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td><span class="badge bg-secondary text-uppercase">{{ $p->kategori }}</span></td>
                                <td>{{ $p->satuan }}</td>
                                <td class="text-end">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Tombol Edit (Ikon Pensil) --}}
                                        <a href="{{ route('produk.edit',$p->id_produk) }}" class="btn btn-sm btn-warning rounded-pill" title="Edit Data">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- Tombol Hapus (Ikon Sampah) --}}
                                        <form method="POST" action="{{ route('produk.destroy',$p->id_produk) }}" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            
                                            {{-- Ganti confirm() dengan konfirmasi yang lebih baik jika Anda menggunakan SweetAlert --}}
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk {{ $p->nama_produk }}? Tindakan ini tidak dapat dibatalkan.')" 
                                                    class="btn btn-sm btn-danger rounded-pill" title="Hapus Data">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle me-2"></i> Belum ada data produk yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginasi -->
            <div class="mt-4 d-flex justify-content-end">
                {{ $produks->links() }}
            </div>

        </div>
    </div>

</div>

<script>
    // Fungsi JavaScript untuk Pencarian Cepat (Client-Side)
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        const rows = document.querySelectorAll('#produkTable tbody tr');

        rows.forEach(row => {
            let found = false;
            // Cek di kolom Kode (index 1) dan Nama Produk (index 2)
            const kode = row.cells[1].textContent.toLowerCase();
            const nama = row.cells[2].textContent.toLowerCase();
            
            if (kode.includes(value) || nama.includes(value)) {
                found = true;
            }

            row.style.display = found ? '' : 'none';
        });
    });
</script>
@endsection