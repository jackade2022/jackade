<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        //user exist but not active
        if( ! $request -> user() -> active )
            return abort(403) ;

        //user exist but not enable
        if( ! $request -> user() -> enable )
            return abort(403) ;

        return $next($request);
    }
}
