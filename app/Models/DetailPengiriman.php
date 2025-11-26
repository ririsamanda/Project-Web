<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPengiriman extends Model
{
    protected $table = 'detail_pengiriman';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_pengiriman','id_produk','jumlah_kirim','keterangan'];

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
