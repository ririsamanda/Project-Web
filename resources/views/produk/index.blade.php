@extends('layouts.app')
@section('title','Produk')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Produk</h4>
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
</div>

<div class="card card-custom p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($produks as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->kode_produk }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->satuan }}</td>
                    <td>{{ number_format($p->harga,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('produk.edit',$p->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form method="POST" action="{{ route('produk.destroy',$p->id_produk) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus produk ini?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $produks->links() }}
</div>

@endsection
