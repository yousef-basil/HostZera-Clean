<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check() || !Auth::guard('admin')->user()->is_super_admin) {
            abort(403, 'Access denied. Super Admin only.');
        }

        return $next($request);
    }
}
