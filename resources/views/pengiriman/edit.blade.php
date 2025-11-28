@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengiriman</h2>

    <form method="POST" action="{{ route('pengiriman.update', $pengiriman->id) }}">
        @csrf
        @method('PUT')

        {{-- DATA UTAMA --}}
        <div class="card mb-4 p-3">
            <div class="mb-3">
                <label class="form-label">Tanggal Pengiriman</label>
                <input type="date" name="tanggal" class="form-control"
                       value="{{ $pengiriman->tanggal }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text" name="pelanggan" class="form-control"
                       value="{{ $pengiriman->pelanggan }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $pengiriman->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Catatan (opsional)</label>
                <textarea name="catatan" class="form-control">{{ $pengiriman->catatan }}</textarea>
            </div>
        </div>

        {{-- DETAIL PRODUK --}}
        <h4>Detail Produk</h4>

        <table class="table" id="produkTable">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th width="150px">Jumlah</th>
                    <th width="80px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengiriman->detailPengiriman as $detail)
                <tr>
                    <td>
                        <select name="produk_id[]" class="form-select" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id }}"
                                    {{ $detail->produk_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input type="number" name="jumlah[]" class="form-control"
                               value="{{ $detail->jumlah }}" min="1" required>
                    </td>

                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" id="addRow" class="btn btn-primary mb-3">+ Tambah Produk</button>

        <br>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengiriman.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- SCRIPT DINAMIS --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('addRow').addEventListener('click', function () {

        let row = `
        <tr>
            <td>
                <select name="produk_id[]" class="form-select" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </td>

            <td>
                <input type="number" name="jumlah[]" class="form-control" min="1" required>
            </td>

            <td>
                <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
            </td>
        </tr>
        `;

        document.querySelector('#produkTable tbody').insertAdjacentHTML('beforeend', row);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>
@endsection
