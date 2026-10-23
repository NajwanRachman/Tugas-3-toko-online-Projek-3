<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {
        // Pengguna belum login.
        if (! $request->user()) {
            abort(403, 'Kamu harus login terlebih dahulu.');
        }

        // Role pengguna tidak sesuai dengan akses yang dibutuhkan.
        if (! in_array($request->user()->role, $roles, true)) {
            abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
