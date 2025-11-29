<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek apakah user sudah terautentikasi
        if (! Auth::check()) {
            // Jika belum login, arahkan ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();

        // 2. Ambil ID Hak Akses user yang sedang login
        $userRole = $user->id_hakakses;
        
        // 3. Konversi array role yang diizinkan menjadi array ID
        // Asumsi: Admin=1, Karyawan=2 (Sesuai KaryawanSeeder)
        $allowedRoleIds = [];
        foreach ($roles as $roleName) {
            if (strtolower($roleName) === 'admin') {
                $allowedRoleIds[] = 1;
            } elseif (strtolower($roleName) === 'karyawan') {
                $allowedRoleIds[] = 2;
            }
            // Tambahkan role lain jika ada
        }
        
        // 4. Lakukan Pengecekan
        // Jika ID hak akses user ADA di dalam daftar ID yang diizinkan
        if (in_array($userRole, $allowedRoleIds)) {
            return $next($request);
        }

        // 5. Jika akses ditolak, arahkan ke dashboard (atau halaman error)
        // Kita arahkan ke dashboard agar tidak masuk loop
        return redirect('/dashboard')->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk halaman tersebut.');
    }
}