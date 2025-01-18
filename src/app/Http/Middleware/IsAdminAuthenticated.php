<?php

namespace App\Http\Middleware;

use App\Services\AdminLoginService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (AdminLoginService::is_login() === false) {
            return redirect(route('admin.login.index'));
        }

        return $next($request);
    }
}
