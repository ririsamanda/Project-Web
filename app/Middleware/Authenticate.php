<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Pengecekan standar Laravel
        if (! $request->expectsJson()) {
            
            // --- PERBAIKAN DI SINI ---
            // Secara default, Laravel mengembalikan route('login')
            // Kita ubah menjadi route('login.select') karena ini adalah gerbang utama Anda.
            // Anda juga bisa menggunakan route('login') jika sudah diubah di web.php.
            // Kita gunakan 'login.select' agar lebih eksplisit sesuai kebutuhan UX Anda.
            return route('login.select'); 
        }

        return null;
    }
}