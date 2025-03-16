<?php

namespace App\Http\Middleware;

use App\Services\UserLoginService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserIsAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (UserLoginService::is_login() === false) {
            return redirect(route('user.login.index'));
        }

        return $next($request);
    }
}
