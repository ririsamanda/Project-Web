<h2>Daftar Pengiriman</h2>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal Kirim</th>
            <th>Pelanggan</th>
            <th>Jumlah Item</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pengiriman as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->tanggal }}</td>
            <td>{{ $p->pelanggan }}</td>
            <td>{{ $p->detail->sum('jumlah') }}</td>

            <td>
                <a href="{{ route('pengiriman.show', $p->id) }}">Detail</a>
                <a href="{{ route('pengiriman.edit', $p->id) }}">Edit</a>

                <form action="{{ route('pengiriman.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
