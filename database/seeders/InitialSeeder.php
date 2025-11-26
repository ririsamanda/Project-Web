<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HakAkses;
use App\Models\Karyawan;
use App\Models\Produk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;     // ← PERBAIKAN

class InitialSeeder extends Seeder
{
    public function run()
    {
        DB::table('hak_akses')->truncate();
        DB::table('karyawan')->truncate();
        DB::table('produk')->truncate();

        $admin = HakAkses::create(['nama_hakakses' => 'Admin']);
        $karyawanAkses = HakAkses::create(['nama_hakakses' => 'Karyawan']);

        Karyawan::create([
            'nama_karyawan' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'id_hakakses' => $admin->id_hakakses,
            'jabatan' => 'Admin'
        ]);

        Karyawan::create([
            'nama_karyawan' => 'Operator Produksi',
            'username' => 'operator1',
            'password' => Hash::make('password'),
            'id_hakakses' => $karyawanAkses->id_hakakses,
            'jabatan' => 'Operator'
        ]);

        Produk::create(['kode_produk'=>'PRD-001','nama_produk'=>'Produk A','kategori'=>'Makanan','satuan'=>'box','harga'=>15000]);
        Produk::create(['kode_produk'=>'PRD-002','nama_produk'=>'Produk B','kategori'=>'Minuman','satuan'=>'pcs','harga'=>8000]);
    }
}