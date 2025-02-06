<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Periksa apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Ambil role pengguna
        $userRole = auth()->user()->role;

        // Periksa apakah role pengguna sesuai dengan role yang diizinkan
        if ($userRole !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}