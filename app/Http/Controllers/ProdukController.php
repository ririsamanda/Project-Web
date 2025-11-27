<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('nama_produk')->paginate(10);
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_produk' => 'nullable|string|max:50',
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'satuan' => 'nullable|string|max:50',
            'harga' => 'nullable|numeric'
        ]);

        Produk::create($data);

        return redirect()->route('produk.index')->with('success','Produk berhasil ditambah.');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kode_produk' => 'nullable|string|max:50',
            'nama_produk' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'satuan' => 'nullable|string|max:50',
            'harga' => 'nullable|numeric'
        ]);

        $produk->update($data);

        return redirect()->route('produk.index')->with('success','Produk berhasil diupdate.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return back()->with('success','Produk dihapus.');
    }
}
