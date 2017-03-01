<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
//厅号管理
class HomeController extends Controller
{
    //厅号列表
    public function homeList()
    {
        $homeList = DB::table('home')->get();

        return view('admin.home.homelist',['homeList'=>$homeList]);
    }
    //安排历程
    public function homeCourse()
    {
        //厅号id
        $home_id = Input::get('home_id');
        $error = Input::get('error');
        //自动执行的业务 以厅号id去删除当前id今天以前的所有历程
        $time = date('Y-m-d');
        $delReadly = DB::table('play')->where("home_id",'=',$home_id)->where("day",'<',$time)->delete();
        //选项卡传来的  相当于查询条件
        $day =  Input::get('day',$time);
        //厅号信息
        $homeInfo = DB::table('home')->where("home_id",'=',$home_id)->first();
        //根据选项卡传来的日期 查询当天已有的历程  以开始时间升序
        $counrse = DB::table('play')->select(['movie_director','begin_time','end_time','day_price','movie_name','movie_img','movie_length'])->join('movie', 'play.movie_id', '=', 'movie.movie_id')->where("home_id",'=',$home_id)->where("day",'=',$day)->orderBy('begin_time','asc')->get();
        //查询所有电影
        $movieList = DB::table('movie')->get();

        return view('admin.home.course',['counrse'=>$counrse,'day'=>$day,'movieList'=>$movieList,'homeInfo'=>$homeInfo,'error'=>$error]);
    }

    //添加历程
    public function addPlay()
    {
        $data = Input::get();
        unset($data['_token']);
        if($data['movie_id'] == 0)
        {
            return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day'].'&error=请选择电影!');
        }
        if(empty($data['begin_time']) || empty($data['end_time']))
        {
            return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day'].'&error=请填写开始时间和结束时间!');
        }
        if(empty($data['day_price']))
        {
            return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day'].'&error=请填写票价!');
        }
        //判断时间是否正确   添加的场次 开始时间必须大于上一场结束时间 并且大20分钟以上
        $info = DB::table('play')->where("home_id",'=',$data['home_id'])->where("day",'=',$data['day'])->orderBy('end_time','desc')->limit(1)->first();
        if($info)
        {
            if($data['begin_time'] < $info->end_time || strtotime($data['begin_time'])- strtotime($info->end_time) < 1199)
            {
                return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day'].'&error=开始时间必须大于上一场结束时间,并且大于20分钟以上!');
            }else{
               $res =  DB::table('play')->insert($data);
                if($res)
                {
                    return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day']);
                }
            }
        }else{
            //直接入库
            $res = DB::table('play')->insert($data);
            if($res)
            {
                 return redirect('admin/homeCourse?home_id='.$data['home_id'].'&day='.$data['day']);
            }
        }
    }
}
