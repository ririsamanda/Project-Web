<form action="{{ route('pengiriman.store') }}" method="POST">
    @csrf

    <div>
        <label>Tanggal Kirim</label>
        <input type="date" name="tanggal" required>
    </div>

    <div>
        <label>Pelanggan</label>
        <input type="text" name="pelanggan" required>
    </div>

    <div>
        <label>Alamat</label>
        <textarea name="alamat"></textarea>
    </div>

    <div>
        <label>Catatan</label>
        <textarea name="catatan"></textarea>
    </div>

    <!-- Nanti kita buat bagian produk di sini -->

    <button type="submit">Simpan Pengiriman</button>
</form>

<!-- Input Produk -->

<h3>Produk yang Dikirim</h3>

<table id="produk-table" border="1">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody id="produk-body">
        <tr>
            <td>
                <select name="produk_id[]" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
            </td>

            <td>
                <input type="number" name="jumlah[]" min="1" required>
            </td>

            <td>
                <button type="button" class="hapus-baris">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>

<button type="button" id="tambah">Tambah Produk</button>


<!-- js dynamic -->

<script>
    document.getElementById('tambah').addEventListener('click', function () {
        let tbody = document.getElementById('produk-body');

        // duplikasi baris pertama
        let row = tbody.children[0].cloneNode(true);

        // kosongkan input jumlah
        row.querySelector('input[name="jumlah[]"]').value = "";

        // reset select produk
        row.querySelector('select[name="produk_id[]"]').selectedIndex = 0;

        tbody.appendChild(row);
    });

    // event hapus baris
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('hapus-baris')) {
            let tbody = document.getElementById('produk-body');

            // minimal harus tersisa 1 baris
            if (tbody.children.length > 1) {
                e.target.closest('tr').remove();
            }
        }
    });
</script>
