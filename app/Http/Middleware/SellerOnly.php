<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerOnly
{
    public function handle(Request $request, Closure $next)
    {

        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        if ($role === 'seller' || $role === 'member') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak.');
    }
}
