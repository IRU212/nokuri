<?php

namespace App\Http\Middleware;

use App\Services\AdminLoginService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        if (AdminLoginService::is_login() === false) {
            Log::warning("管理者未ログイン状態なのでアクセス不可");
            return redirect(route('admin.login.index'));
        }

        return $next($request);
    }
}
