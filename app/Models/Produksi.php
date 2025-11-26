<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    protected $primaryKey = 'id_produksi';
    protected $fillable = ['id_produk','jumlah_selesai','tanggal_produksi','id_karyawan','keterangan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
