<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $fillable = ['id_pelanggan','tanggal_kirim','id_karyawan','status_pengiriman'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function details()
    {
        return $this->hasMany(DetailPengiriman::class, 'id_pengiriman');
    }
}
