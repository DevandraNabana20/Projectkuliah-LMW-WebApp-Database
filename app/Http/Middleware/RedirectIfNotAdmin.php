<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in as admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')
                ->withErrors(['auth' => 'Anda harus login terlebih dahulu']);
        }

        return $next($request);
    }
}
