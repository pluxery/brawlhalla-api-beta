<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBasic
{
    public function handle(Request $request, Closure $next)
    {
        //return Auth::onceBasic() ?: $next($request);
        return $next($request);
    }
}
