<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['nama_karyawan','username','password','id_hakakses','jabatan'];
    protected $hidden = ['password'];

    public function hakAkses()
    {
        return $this->belongsTo(HakAkses::class, 'id_hakakses');
    }

    public function produksis()
    {
        return $this->hasMany(Produksi::class, 'id_karyawan');
    }

    public function pengirimen()
    {
        return $this->hasMany(Pengiriman::class, 'id_karyawan');
    }

    public function rekaps()
    {
        return $this->hasMany(RekapProduk::class, 'id_karyawan');
    }
}
