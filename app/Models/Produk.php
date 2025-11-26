<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['kode_produk','nama_produk','kategori','satuan','harga'];

    public function produksis()
    {
        return $this->hasMany(Produksi::class, 'id_produk');
    }

    public function detailPengiriman()
    {
        return $this->hasMany(DetailPengiriman::class, 'id_produk');
    }
}
