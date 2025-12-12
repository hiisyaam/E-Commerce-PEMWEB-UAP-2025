<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Akses ditolak.');
        }

        if ($user->isMember()) {
            return $next($request);
        }

        if ($user->isSeller()) {
            return $next($request);
        }

    return abort(403, 'Akses tidak diizinkan.');
    }
}
