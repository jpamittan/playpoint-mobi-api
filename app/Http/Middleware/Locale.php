<?php

namespace App\Http\Middleware;

use Closure;
use App;
class Locale
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
        if (Session()->get('locale')==null){
            $hostname = explode(".",$_SERVER['HTTP_HOST']);
            if (($hostname[0]=="m")or($hostname[0]=="localhost")or(($hostname[0]=="playpoint"))){
                App::setLocale('en');
                Session()->put('locale','en');
                Session()->put('direction',"ltr");
            }else{
                App::setLocale($hostname[0]);
                Session()->put('locale',$hostname[0]);
                if (($hostname[0]=="ar")or($hostname[0]=="eg")){
                    Session()->put('direction',"rtl");  
                }else{
                    Session()->put('direction',"ltr");
                }
            }
        }
        return $next($request);
    }
}
