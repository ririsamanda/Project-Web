<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ---------------------------------------------------------
        // LANGKAH 1: ISI TABEL HAK_AKSES (INDUK) TERLEBIH DAHULU
        // ---------------------------------------------------------
        
        // Cek dulu apakah hak akses sudah ada agar tidak duplikat error
        if (DB::table('hak_akses')->count() == 0) {
            DB::table('hak_akses')->insert([
                ['id_hakakses' => 1, 'nama_hakakses' => 'Admin'],
                ['id_hakakses' => 2, 'nama_hakakses' => 'Karyawan'],
            ]);
        }

        // ---------------------------------------------------------
        // LANGKAH 2: BARU ISI TABEL KARYAWAN (ANAK)
        // ---------------------------------------------------------

        // 1. Buat Akun ADMIN
        DB::table('karyawan')->insert([
            'nama_karyawan' => 'Administrator Utama',
            'username'      => 'admin',
            'password'      => 'admin123', 
            'id_hakakses'   => 1, // Sekarang aman karena ID 1 sudah dibuat di atas
            'jabatan'       => 'Kepala Operasional',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 2. Buat Akun KARYAWAN
        DB::table('karyawan')->insert([
            'nama_karyawan' => 'Budi Staff Gudang',
            'username'      => 'staff',
            'password'      => 'staff123',
            'id_hakakses'   => 2, // Sekarang aman karena ID 2 sudah dibuat di atas
            'jabatan'       => 'Staff Packing',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}