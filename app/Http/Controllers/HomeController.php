<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['limit']=8;
        $data['type']="new";
        $result = ApiHelper::call("game",'get', $data);
        $newGames = $result['content']->result;
        $data=array();
        $result = ApiHelper::call("game/tags",'get', $data);
        $tags = $result['content']->result;
        $byTags = array();
        foreach ($tags as $tag){
            $data['limit']=8;
            $data['tag']= $tag->tag;
            $result = ApiHelper::call("game",'get', $data);
            if (count($result['content']->result)>0){
                $byTags[$tag->tag] = $result['content']->result;
            }


        }
        return view('home', [
            'spotlights' => $newGames,
            'byTags' => $byTags,
            'terms' =>"",
        ]);
    }
}
