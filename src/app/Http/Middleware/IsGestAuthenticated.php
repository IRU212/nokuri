<?php

namespace App\Http\Middleware;

use App\Services\AdminLoginService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsGestAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (AdminLoginService::is_login()) {
            return redirect(route('admin.home.index'));
        }

        return $next($request);
    }
}
