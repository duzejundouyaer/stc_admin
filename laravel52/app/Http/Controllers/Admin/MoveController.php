<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Model\Move;
use App\Http\Requests;
use App\Uploads\Uploads;
use App\Http\Controllers\Controller;

class MoveController extends Controller
{
    //
    public function moveadd(Request $request){
        if($request->isMethod("post")){
            $data=$request->input();
            $movie_type=implode(',',$data['movie_type']);
            $obj = new Uploads();
            $mov = $obj->up($_FILES['movie_img']);
            print_r($mov);die;
            $res=DB::table('movie')->insert([
                'movie_name'=>$data['movie_name'],
                'movie_type'=>$movie_type,
                'movie_length'=>$data['movie_length'],
                'movie_time'=>$data['movie_time'],
                'movie_director'=>$data['movie_director'],
                'movie_boss'=>$data['movie_boss'],
                'movie_score'=>$data['movie_score'],
                'movie_box'=>$data['movie_box'],
                'movie_price'=>$data['movie_price'],
                'is_hot'=>$data['is_hot'],
                'is_new'=>$data['is_new'],
                'is_status'=>$data['is_status'],
                'movie_desc'=>$data['movie_desc'],
            ]);
             if($res){
                 echo 1;
             }else{
                 echo 0;
             }
            //print_r($data);
        }else{
            return view('admin.move.addmove');
        }
    }
    //电影列表
    public function movelist(){
        echo "list";
    }
}
