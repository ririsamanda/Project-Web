<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan; 
use Illuminate\Support\Facades\Hash; 

class LoginController extends Controller
{
    /**
     * Proses Login untuk Admin
     */
    public function processAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $karyawan = Karyawan::where('username', $request->username)->first();

        // 1. Cek Kredensial dan Pastikan Hak Akses = 1 (Admin)
        if ($karyawan && $karyawan->password == $request->password && $karyawan->id_hakakses == 1) {
            
            // --- PERBAIKAN KRUSIAL DI SINI ---
            // 2. Lakukan Login dengan Guard Web secara eksplisit
            Auth::guard('web')->login($karyawan); // Menggunakan guard 'web' yang dikonfigurasi untuk Karyawan Model
            
            // 3. Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // 4. Redirect ke dashboard
            return redirect()->intended('dashboard');

        } else {
            // Jika Gagal (termasuk jika dia Karyawan mencoba login di Admin)
            return back()->withErrors([
                'username' => 'Akses ditolak: Username atau password salah, atau Anda bukan Administrator.',
            ])->onlyInput('username');
        }
    }

    /**
     * Proses Login untuk Karyawan
     */
    public function processKaryawan(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $karyawan = Karyawan::where('username', $request->username)->first();

        // Cek Kredensial dan Pastikan Hak Akses BUKAN 1 (Admin)
        if ($karyawan && $karyawan->password == $request->password && $karyawan->id_hakakses != 1) {
            
            // Lakukan Login dengan Guard Web
            Auth::guard('web')->login($karyawan);
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Login gagal: Username atau password salah.',
        ])->onlyInput('username');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}