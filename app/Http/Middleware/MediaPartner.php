<?php

namespace App\Http\Middleware;

use Closure;

class MediaPartner
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
        if (Session()->get('pubInfo')==null){
            if ($request->get('mid')!=null){
                
                Session()->put('pubInfo.media_partner_id',$request->get('mid'));
                Session()->put('pubInfo.media_sub_partner_id',$request->get('sid'));
                Session()->put('pubInfo.campaign_id',$request->get('cid'));
                Session()->put('pubInfo.pixel_id',$request->get('pid'));
                Session()->save();
            }
        }
        return $next($request);
    }
}
