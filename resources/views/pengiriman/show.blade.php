<h2>Detail Pengiriman</h2>

<h3>Informasi Utama</h3>
<p><strong>Tanggal Kirim:</strong> {{ $pengiriman->tanggal }}</p>
<p><strong>Pelanggan:</strong> {{ $pengiriman->pelanggan }}</p>
<p><strong>Alamat:</strong> {{ $pengiriman->alamat }}</p>
<p><strong>Catatan:</strong> {{ $pengiriman->catatan }}</p>

<h3>Daftar Produk</h3>
<table border="1">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengiriman->detail as $d)
        <tr>
            <td>{{ $d->produk->nama_produk }}</td>
            <td>{{ $d->jumlah }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total Item:</strong> {{ $pengiriman->detail->sum('jumlah') }}</p>

<br>
<a href="{{ route('pengiriman.index') }}">Kembali</a>
