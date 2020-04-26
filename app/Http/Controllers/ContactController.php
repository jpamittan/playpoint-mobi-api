<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ApiHelper;
use App\Helpers\MediaPartnerHelper;
Use App\Helpers\LocaleHelper;

class ContactController extends Controller
{
    public function index(Request $request){
        $terms="";
        if ($request->isMethod('POST')){
            Mail::send('emails.contact', $request->all(), function ($message) {
                $message->from(env('SUPPORT_EMAIL'), 'Contact playpoint');
            
                $message->to(env('SUPPORT_EMAIL'));
            });
            return redirect('thankyou');
        }
        return view('contact', [
            'terms'=>$terms,
         ]);
 
    }

    public function thankyou(Request $request){
        
        $terms="";
        return view('thankyou', [
            'terms'=>"",
         ]);

    }

    public function cancel(Request $request){
        
        $terms="";
        return view('cancel', [
            'terms'=>$terms,
         ]);

    }

    public function tos(Request $request){
        
        $terms="";
        return view('tos.'.App::getLocale(), [
            'terms'=>$terms,
         ]);       
    }

    public function privacy(Request $request){
        
        $terms="";
        return view('privacy.'.App::getLocale(), [
            'terms'=>$terms,
         ]);       
    }
}
