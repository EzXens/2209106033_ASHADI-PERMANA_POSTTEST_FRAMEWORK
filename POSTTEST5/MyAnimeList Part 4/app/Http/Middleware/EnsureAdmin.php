<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (!Auth::user()->is_admin) {
            return redirect()->route('admin.login')->withErrors([
                'login' => __('Anda memerlukan akses admin untuk melanjutkan.'),
            ]);
        }

        return $next($request);
    }
}
