<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Model\Move;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
class IndexController extends Controller
{
    //
    public function index(){
        $session=new Session();
        $nickname=$session->get('nickname','');
        //echo $nickname;die;
        $move = new Move();
        $well = $move->fourShow(1);
        $soon = $move->fourShow(0);
        //print_r($data);die;
        return view('home.index.index',['well'=>$well,'soon'=>$soon,'nickname'=>$nickname]);
    }

    public function orby(){
        $move = new Move();
        $well = $move->fourOrderby();
        return view('home.index.orby',['well'=>$well]);
    }
    //搜索
    public function seach(Request $request){
        if($request->isMethod("post")) {
            $seach = $request->input('seach');
//            echo $seach;
            $movie=DB::table('movie')->where('movie_name','=',$seach)->get();
            $number = count($movie);
            return view('home.lists.lists',['movie'=>$movie,'number'=>$number]);
        }else{
            $movie=DB::table('movie')->select('movie_name')->get();
            foreach($movie as $key=>$val){
                $arr[]=$val->movie_name;
            }
//            $arr="[";
//            foreach($movie as $key=>$val){
//                $arr.='"'.$val->movie_name.'"'.',';
//            }
//            $arr.="]";
//            print_r($arr);die;
            return view('home.index.seach',['arr'=>$arr]);
        }

    }
//    //正在热播
//    public function lists(){
//        return view('home.index.lists');
//    }
}
