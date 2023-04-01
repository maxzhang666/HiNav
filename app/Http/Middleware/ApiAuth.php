<?php

namespace App\Http\Middleware;

use App\Extensions\ApiResult;
use App\Extensions\Constants;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    use ApiResult;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request                                                                          $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = admin_setting(Constants::Api_Token, '');
        if (!empty($token) && $request->input('token') != $token) {
            return $this->fail([], 'Token Error');
        }
        return $next($request);
    }
}
