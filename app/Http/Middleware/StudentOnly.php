<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentOnly
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
{
    {
        // Pastikan pengguna yang sedang login adalah student
        if (Auth::check() && Auth::user()->role === 'student') {
            return $next($request);
        }

        // Jika bukan student, redirect ke dashboard
        return redirect('/dashboard')->with('error', 'Akses ditolak. Halaman ini hanya untuk siswa.');
    }
}

}
