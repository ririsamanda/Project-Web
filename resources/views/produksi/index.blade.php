@extends('layouts.app')
@section('title','Data Produksi')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Data Produksi</h4>
    <a href="{{ route('produksi.create') }}" class="btn btn-primary">Input Produksi</a>
</div>

<div class="card card-custom p-3">

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Petugas</th>
            </tr>
        </thead>

        <tbody>
            @foreach($produks as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->produk->nama_produk }}</td>
                    <td>{{ $p->jumlah_selesai }}</td>
                    <td>{{ $p->tanggal_produksi }}</td>
                    <td>{{ $p->karyawan->nama_karyawan }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $produks->links() }}

</div>

@endsection
