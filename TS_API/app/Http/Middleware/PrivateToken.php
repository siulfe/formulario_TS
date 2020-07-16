<?php

namespace App\Http\Middleware;

use Closure;

class PrivateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->token != "bc3b2003-dab0-4d91-86c6-b0f70eb16781"){
            return response()->json(["error"=>"usuario no autorizado"]);
        }

        return $next($request);
    }
}
