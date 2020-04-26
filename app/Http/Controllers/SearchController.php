<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Auth;

class SearchController extends Controller
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
    public function index(Request $request)
    {
        //$data['limit']=8;
        $data['search']=$request->get('q');
        $data['pag']=12;
        if ($request->get('page')!==null){
            $data['page']=$request->get('page');

        }else{
            $data['page']=1;
        }
       $result = ApiHelper::call("game",'get', $data);
        //dd($result['content']);
        $taggames = $result['content']->result;

        return view('search', [
            'taggames' => $taggames,
            'search' => $request->get('q'),
            'rawtags' =>$request->get('q'),
        ]);
    }
}
