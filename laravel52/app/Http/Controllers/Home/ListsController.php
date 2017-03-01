<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListsController extends Controller
{
    //正在热播
    public function lists(){
        $movie = DB::table('movie')->where('is_hot', '=',1)->where('is_status','=',1)->where('release','=',1)->get();
        $number = count($movie);
        return view('home.lists.lists',['movie'=>$movie,'number'=>$number]);
    }
}
