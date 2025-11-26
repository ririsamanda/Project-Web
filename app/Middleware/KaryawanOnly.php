<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KaryawanOnly
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->hakAkses->nama_hakakses !== 'Karyawan') {
            abort(403, 'Hanya Karyawan yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
