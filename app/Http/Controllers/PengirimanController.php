<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Pelanggan;
use App\Models\Karyawan;
use App\Models\Produk;
use App\Models\DetailPengiriman;
use Illuminate\Http\Request;
use DB;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengirimans = Pengiriman::with(['pelanggan','karyawan','details.produk'])->orderByDesc('tanggal_kirim')->paginate(15);
        return view('pengiriman.index', compact('pengirimans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $karyawans = Karyawan::all();
        $produks = Produk::all();
        return view('pengiriman.create', compact('pelanggans','karyawans','produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'tanggal_kirim' => 'required|date',
            'id_karyawan' => 'required|exists:karyawan,id_karyawan',
            'items' => 'required|array',
            'items.*.id_produk' => 'required|exists:produk,id_produk',
            'items.*.jumlah_kirim' => 'required|integer|min:1'
        ]);

        DB::transaction(function() use($request) {
            $pengiriman = Pengiriman::create([
                'id_pelanggan' => $request->id_pelanggan,
                'tanggal_kirim' => $request->tanggal_kirim,
                'id_karyawan' => $request->id_karyawan,
                'status_pengiriman' => 'Dikirim'
            ]);

            foreach($request->items as $it) {
                DetailPengiriman::create([
                    'id_pengiriman' => $pengiriman->id_pengiriman,
                    'id_produk' => $it['id_produk'],
                    'jumlah_kirim' => $it['jumlah_kirim'],
                    'keterangan' => $it['keterangan'] ?? null
                ]);
            }
        });

        return redirect()->route('pengiriman.index')->with('success','Pengiriman berhasil disimpan.');
    }

    public function show(Pengiriman $pengiriman)
    {
        $pengiriman->load('details.produk','pelanggan','karyawan');
        return view('pengiriman.show', compact('pengiriman'));
    }
}


public function update(Request $request, $id)
{
    // VALIDASI
    $request->validate([
        'tanggal'       => 'required|date',
        'pelanggan'     => 'required|string',
        'alamat'        => 'required|string',
        'produk_id'     => 'required|array|min:1',
        'produk_id.*'   => 'required|integer|exists:produk,id',
        'jumlah.*'      => 'required|integer|min:1',
    ]);

    // 1. Update data utama
    $pengiriman = Pengiriman::findOrFail($id);
    $pengiriman->update([
        'tanggal'   => $request->tanggal,
        'pelanggan' => $request->pelanggan,
        'alamat'    => $request->alamat,
        'catatan'   => $request->catatan,
    ]);

    // 2. Hapus semua detail lama
    DetailPengiriman::where('pengiriman_id', $id)->delete();

    // 3. Simpan ulang detail baru
    foreach ($request->produk_id as $i => $produk) {
        DetailPengiriman::create([
            'pengiriman_id' => $id,
            'produk_id'     => $produk,
            'jumlah'        => $request->jumlah[$i],
        ]);
    }

    return redirect()->route('pengiriman.index');
}

