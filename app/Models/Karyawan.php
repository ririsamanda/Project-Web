<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Karyawan extends Authenticatable
{
    // Pastikan kedua trait ini ada
    use Notifiable, HasFactory; 

    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan'; // Laravel perlu tahu PK-nya
    
    protected $fillable = [
        'nama_karyawan',
        'username',
        'password',
        'id_hakakses',
        'jabatan'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // --- PERBAIKAN KRUSIAL UNTUK MENGATASI REDIRECT LOOP ---
    // Memastikan Laravel selalu memuat relasi hakAkses saat user di-load dari sesi
    protected $with = ['hakAkses']; 
    // ---------------------------------------------------------
    
    // Relasi untuk Hak Akses
    public function hakAkses()
    {
        return $this->belongsTo(HakAkses::class, 'id_hakakses');
    }

    public function produksis() { return $this->hasMany(Produksi::class, 'id_karyawan'); }
    public function pengirimen() { return $this->hasMany(Pengiriman::class, 'id_karyawan'); }
    public function rekaps() { return $this->hasMany(RekapProduk::class, 'id_karyawan'); }
}