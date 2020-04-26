<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class DetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$locale,$game_id)
    {
        $data="";
        $result = ApiHelper::call("game/view/{$game_id}",'get', $data);
        $game = $result['content']->result;
        if ($result['content']->state!=200){
            if ($result['content']->error=="User Session failed"){
                return redirect("https://pacman.playpoint.mobi/". app()->getLocale());
            }
            if ($result['content']->state==402){
                return redirect("https://pacman.playpoint.mobi/". app()->getLocale());
            }
        }
        if ($game->location=="local"){
            $content = file_get_contents(env('CDN_URL').$game->content_code."/index.html");
        }else{
            //$content = file_get_contents(str_ireplace("&amp;","&",$game->gameurl));
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $game->gameurl);
        curl_setopt($ch, CURLOPT_HEADER, false /* TRUE to include the header in the output */);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 2500);
            $content = curl_exec($ch);
        }

        $xml = new \DOMDocument('1.0', "utf8");
        libxml_use_internal_errors(true);
        $xml->loadHTML($content);
        libxml_use_internal_errors(false);
        //$xml->getElementsByTagName('title')->item(0)->nodeValue=env('APP_NAME'). " " . $game->name;
        $head = $xml->getElementsByTagName('head')->item(0);
        $body = $xml->getElementsByTagName('body')->item(0);

        $style = $xml->createElement('style');
        $style->nodeValue = ".mypacks_done_button { cursor: pointer; position: fixed; bottom: 0; background: #f4f4f4; color: #f68b33; padding-right: 5px;padding-left: 5px; padding-top:2px; padding-bottom:2px; font-size: 20px;}";
        $head->appendChild($style);

        $script = $xml->createElement('script');
        $script->nodeValue="(function() { var body = document.querySelector('body'); var button = document.createElement('div'); button.innerHTML = 'Exit'; button.classList.add('mypacks_done_button'); button.onclick = function() {window.history.back(); }; body.appendChild(button); })();";
        $body->appendChild($script);
        if ($game->location=="local"){
            $base = $xml->createElement('base');
            $base->setAttribute('href',env('CDN_URL').$game->content_code."/");
            if ($head->hasChildNodes()) {
                $head->insertBefore($base,$head->firstChild);
            } else {
                $head->appendChild($base);
            }
        }

        $output = $xml->saveHTML();
        return view('detail',["output"=>$output]);
}
}
