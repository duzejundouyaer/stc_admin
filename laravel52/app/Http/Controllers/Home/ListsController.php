<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListsController extends Controller
{
    //正在热播
    public function lists()
    {
        $movie = DB::table('movie')->where('is_hot', '=',1)->where('is_status','=',1)->where('release','=',1)->orderBy('movie_box','desc')->get();
        $number = count($movie);
        return view('home.lists.lists',['movie'=>$movie,'number'=>$number]);
    }
    //即将上映
    public function forthcoming()
    {
        $movie = DB::table('movie')->where('release','=',0)->get();
        $number = sizeof($movie);
        return view('home.lists.forthcoming',['movie'=>$movie,'number'=>$number]);
    }
    //票房排行
    public function box()
    {
        $movie = DB::table('movie')->where('release','=',1)->where('is_status','=',1)->orderBy('movie_box','desc')->limit(20)->get();
        $number = count($movie);
        return view('home.lists.box',['movie'=>$movie,'number'=>$number]);
    }

}
