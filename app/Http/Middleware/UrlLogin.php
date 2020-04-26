<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\Helpers\ApiHelper;

class UrlLogin
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
        if (Session()->get('Bearer') == null) {
            if ($request->get('uid') != "") {
                $data['phone'] = $request->get('uid');
                $result = ApiHelper::call("member/login",'post', $data);
                if ($result['content']->state != 200) {
                    $error = $result['content']->error;
                } else {
                    Session()->put('Bearer',$result['content']->result->bearer);
                }
            } 
        }
        
        return $next($request);
    }
}
