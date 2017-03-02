<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class DetailsController extends Controller
{
    //
    public function details(Request $request)
    {header("Content-type:text/html;charset=utf-8");
    	$movie_id = $request->input('movie_id');
    	if(!isset($movie_id))
    	{
    		return redirect('/');
    		//$movie_id = '11';
    	}
    		$desc = DB::table('movie')->where('movie_id',$movie_id)->first();
        return view('home.details.details',['desc'=>$desc]);
    }
}
