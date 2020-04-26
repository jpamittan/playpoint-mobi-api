<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Auth;

class TagsController extends Controller
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
        //var_dump($request->get('page'));
        //$data['limit']=8;
        $data['tag']=$request->get('tag');
        $data['pag']=12;
        if ($request->get('page')!==null){
            $data['page']=$request->get('page');

        }else{
            $data['page']=1;
        }
        $result = ApiHelper::call("game",'get', $data);
        //dd($result);
        $taggames = $result['content']->result;

        return view('tag', [
            'taggames' => $taggames,
            'tags' => str_replace(","," ", $request->get('tag')),
            'rawtags' =>$request->get('tag'),
        ]);
    }
}
