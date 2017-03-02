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
    	$movie_id = $request->input('movie_id');  //接收电影ID
    	if(!isset($movie_id))
    	{
    		return redirect('/');
    		//$movie_id = '11';
    	}
    		$desc = DB::table('movie')->where('movie_id',$movie_id)->first(); //根据ID获取电影详情
            $package = DB::table('package')->where('movie_id',$movie_id)->get(); //获取套餐ID
            $food_id = array();
            foreach ($package as $key => $value)
            {
               $food_id[] = $value->foot_id;//将套餐ID合并成一维数组
            }
            $packages = DB::table('pack')->whereIn('id',$food_id)->get(); //获取套餐详情
        return view('home.details.details',['desc'=>$desc,'packages'=>$packages]);
    }
}
