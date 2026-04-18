<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If it's an admin guard request and user is admin, redirect to admin dashboard
                if ($guard === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                
                // If it's a web guard request (default) and user is logged in, redirect to home
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Removed the global admin check that was causing redirects on client pages.
        
        return $next($request);
    }
}
