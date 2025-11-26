<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    protected $table = 'hak_akses';
    protected $primaryKey = 'id_hakakses';
    protected $fillable = ['nama_hakakses'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_hakakses');
    }
}