<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Auth;

class AccountController extends Controller
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
    public function getAccount(Request $request)
    {

        $emailerror="";
        $data['limit']=1;
        $data['type']="new";
        $result = ApiHelper::call("video",'get', $data);
        //dd($result);
        $newvideos = $result['content']->result;
        if ($request->isMethod('POST')){
            $data=$request->all();
            foreach(Session()->get('pubInfo')as $key=>$val){
                $data[$key]=$val;
            }
            $result = ApiHelper::call("member",'post', $data);
            dd($result);
            if ($result['content']->state!=200){
                if (isset($result['content']->error)){
                    if ($result['content']->error="Email Exists"){
                        $emailerror = "A membership with this email already exists.";
                    }
                }
            }else{
                $result = ApiHelper::call("member/login",'post', $data);
                Session()->put('Bearer',$result['content']->result->bearer);
                $result = ApiHelper::call("subscription",'post', $data);
                Session()->save();
                return redirect($result['content']->result->url);

            }
        }
        return view('getaccount', [
            'newvideos' => $newvideos,
            'formfields' => $request->all(),
            'emailerror' => $emailerror,
        ]);
    }

    public function cancel(Request $request)
    {
        $error = "";
        $data = new \stdClass();
        if ($request->isMethod('POST')){
            $data->phone = $request->get('msisdn');
            $result = ApiHelper::call("subscription/cancel",'post', $data);
            if (isset($result['content']->error)){
                $error= $result['content']->error;
            }else{
                //dd($result);
                \Session()->put('cc_subscription_id',$result['content']->result->result->subscriptionContractId);
                \Session()->put('sub_id',$result['content']->result->sub_id);
                return redirect($result['content']->result->url);
            }

        }
        return view('cancel.eg', [
            'error'=>$error,
        ]);

    }

    public function cancelPin(Request $request)
    {
        $error = "";
        $canceled = false;
        if ($request->isMethod('POST')) {

            $data = new \stdClass();
            $data->pinCode = $request->pin;
            $data->cc_subscription_id=\Session()->get('cc_subscription_id');
            $data->sub_id=\Session()->get('sub_id');
            $res = ApiHelper::call("subscription/cancelpin", "post", $data);
            if (isset($res['content']->result->url)) {
                if ($res['content']->result->url=="cancelled"){
                   $canceled = true;
                }else{
                    $error=$res['content']->result->errorMessage;
                }
            }
           // dd($res);
        }

        return view('cancel.egpin', [
            'error'=>$error,
            'canceled'=>$canceled
        ]);

    }

    public function account(Request $request)
    {
        $emailerror="";
        $data['limit']=1;
        $data['type']="new";
        $result = ApiHelper::call("video",'get', $data);
        $newvideos = $result['content']->result;
        $data = "";
        $result = ApiHelper::call("member",'get', $data);
        //dd($result);
        $data = "";
        $subs = ApiHelper::call("subscription",'get', $data);
        return view('account', [
            'newvideos' => $newvideos,
            'formfields' => $result['content']->result,
            'emailerror' => $emailerror,
            'subs' => $subs['content']->result
        ]);
    }

    public function logout(Request $request)
    {
        session()->forget('Bearer');
        return redirect("/");
    }

    public function login(Request $request)
    {
        $error="";
        if ($request->isMethod('POST')){
            $data=$request->all();
            $result = ApiHelper::call("member/login",'post', $data);
            if ($result['content']->state!=200){
                $error = $result['content']->error;
            }else{
                Session()->put('Bearer',$result['content']->result->bearer);
                return redirect("/");
            }
        }

       return view('login', [
            'error'=>$error,
        ]);

    }

    public function getSubscriptionUrl(Request $request)
    {
        $data = array();
        if(Session()->get('pubInfo')!==null){
            foreach(Session()->get('pubInfo')as $key=>$val){
                $data[$key]=$val;
            }
        }

        $result = ApiHelper::call("subscription",'post', $data);
        return redirect($result['content']->result->url);

    }
}
