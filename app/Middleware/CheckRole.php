<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // roles berasal dari parameter route, misal ->middleware('role:Admin')
        if (!in_array($user->hakAkses->nama_hakakses, $roles)) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
