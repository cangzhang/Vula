<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthJWT
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle($request, \Closure $next)
    {
        try {
            $user = JWTAuth::authenticate(JWTAuth::getToken());
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        return $next($request);
    }
}
