<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Produk;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class ProduksiController extends Controller
{
    public function index()
    {
        $produks = Produksi::with(['produk','karyawan'])
            ->orderByDesc('tanggal_produksi')
            ->paginate(15);

        return view('produksi.index', compact('produks'));
    }

    public function create()
    {
        $produkList = Produk::all();
        $karyawanList = Karyawan::all();

        return view('produksi.create', compact('produkList','karyawanList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_produk'        => 'required|exists:produk,id_produk',
            'jumlah_selesai'   => 'required|integer|min:1',
            'tanggal_produksi' => 'required|date',
            'id_karyawan'      => 'required|exists:karyawan,id_karyawan',
            'keterangan'       => 'nullable|string',
        ]);

        Produksi::create($data);

        return redirect()->route('produksi.index')->with('success','Data produksi tersimpan.');
    }
}
