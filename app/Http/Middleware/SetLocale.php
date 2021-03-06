<?php

namespace App\Http\Middleware;

use Closure;
Use App;

class SetLocale
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

        App::setLocale($request->segment(1));
        return $next($request);
    }
}
