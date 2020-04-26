<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ApiHelper;
use App\Helpers\MediaPartnerHelper;
Use App\Helpers\LocaleHelper;
use App\Helpers\LoginHelper;

class PlayController extends Controller
{
    public function index(Request $request){
        LoginHelper::loginCheck($request);
        
        $res = ApiHelper::call("/paymentwall/country/{$request->session()->get('locale')}","get","");
        $paymentGateway = $res['content']->result->paymentGateways[0];
        if (Session()->has('apiToken')){
            $res = ApiHelper::call("/items/item/type/desktop/id/{$request->get('id')}","get","");

            $content = file_get_contents($res['content']->result->item->content ."index.html");
            $xml = new \DOMDocument('1.0', "utf8");
            libxml_use_internal_errors(true);
            $xml->loadHTML($content);
            libxml_use_internal_errors(false);

            $xml->getElementsByTagName('title')->item(0)->nodeValue=env('APP_NAME'). " " . $res['content']->result->item->name;
            $head = $xml->getElementsByTagName('head')->item(0);
            $body = $xml->getElementsByTagName('body')->item(0);

            $style = $xml->createElement('style');
            $style->nodeValue = ".mypacks_done_button { position: fixed; bottom: 0; background: #f4f4f4; color: #f68b33; padding-right: 5px;padding-left: 5px; padding-top:2px; padding-bottom:2px; font-size: 20px;}";
            $head->appendChild($style);

            $script = $xml->createElement('script');
            $script->nodeValue="(function() { var body = document.querySelector('body'); var button = document.createElement('div'); button.innerHTML = 'Exit'; button.classList.add('mypacks_done_button'); button.onclick = function() {window.history.back(); }; body.appendChild(button); })();";
            $body->appendChild($script);

            $base = $xml->createElement('base');
            $base->setAttribute('href',$res['content']->result->item->content);
            if ($head->hasChildNodes()) {
                $head->insertBefore($base,$head->firstChild);
            } else {
                $head->appendChild($base);
            }

            $output = $xml->saveHTML();
            return view('play',["output"=>$output]);
    
        }else{
            return redirect("https://carrush.playpoint.mobi/{$request->session()->get('locale')}");
        }
 
    }
}