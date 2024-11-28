<?php

namespace App\Http\Middleware;

use Closure;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Attempt to authenticate using the token
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            // Token is either missing, invalid, or expired
            return response()->json(['error' => 'Token is missing or invalid'], 401);
        }

        return $next($request);
    }
}
