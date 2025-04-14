<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('log start');
        Log::info("アクセスログ : " . print_r([
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'method' => $request->method(),
            'url' => $request->url(),
        ], true));
        Log::info("GETデータ : " . print_r($_GET, true));
        Log::info("POSTデータ : " . print_r($_POST, true));
        Log::info("SESSIONデータ : " . print_r(session()->all(), true));

        return $next($request);
    }
}
