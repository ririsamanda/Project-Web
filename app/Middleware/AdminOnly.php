<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->hakAkses->nama_hakakses !== 'Admin') {
            abort(403, 'Hanya Admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}
