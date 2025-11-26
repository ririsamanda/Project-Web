<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapProduk extends Model
{
    protected $table = 'rekap_produk';
    protected $primaryKey = 'id_rekap';
    protected $fillable = ['id_karyawan','tanggal','total_produksi','total_pengiriman','periode','keterangan'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
