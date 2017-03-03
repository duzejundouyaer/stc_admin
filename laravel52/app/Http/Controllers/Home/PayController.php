<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class PayController extends Controller
{
    //
    public function pay($movie_id = 0 ){
        if($movie_id == 0)
        {
            echo '滚';
        }
        //查询该电影的基本信息
        $movieList = DB::table('movie')->where("movie_id",'=',$movie_id)->first();

        foreach($movieList as $k=>$v)
        {
            if($k == 'movie_type')
            {
                $movieList->$k = str_replace(',','/',$v);
            }
            if($k == 'movie_boss')
            {
                $movieList->$k = str_replace(',','/',$v);
            }
        }
        //查询该电影下的 今天 明天  后天的
        $time = date('Y-m-d');
        $tmorry = date('Y-m-d',strtotime($time) + 24 * 60 * 60);
        $houtian = date('Y-m-d',strtotime($time) + 2 * 24 * 60 * 60);
        //该电影今天播放的场次 //过滤已结束 正在播放 未播放
        $todayList = DB::table('play')->select(['id','day','begin_time','end_time','home_name','day_price'])->join('home', 'home.home_id', '=', 'play.home_id')->where("movie_id",'=',$movie_id)->where("day",'=',$time)->get();
        $todayList = $this->comlun($todayList);
        //该电影明天播放的场次
        $tmorryList = DB::table('play')->select(['id','day','begin_time','end_time','home_name','day_price'])->join('home', 'home.home_id', '=', 'play.home_id')->where("movie_id",'=',$movie_id)->where("day",'=',$tmorry)->get();
        $tmorryList = $this->comlun($tmorryList);
        //该电影后天播放的场次
        $houtianList = DB::table('play')->select(['id','day','begin_time','end_time','home_name','day_price'])->join('home', 'home.home_id', '=', 'play.home_id')->where("movie_id",'=',$movie_id)->where("day",'=',$houtian)->get();
        $houtianList = $this->comlun($houtianList);
        $data = [
            'todayList' =>$todayList,
            'tmorryList' =>$tmorryList,
            'houtianList' =>$houtianList,
            'movieList' =>$movieList
        ];
        return view('home.pay.pay',$data);
    }

    public function comlun($obj)
    {
        date_default_timezone_set('PRC');
        $his = date('H:i',time());
        $date = date('Y-m-d');
        foreach ($obj as $k=>$v)
        {
            //明天或者后天
            if($v->day > $date)
            {
                $obj[$k]->zhuangtai = '1';
                continue;
            }

            if(strtotime($his) > strtotime($v->begin_time) && strtotime($his) > strtotime($v->end_time))
            {
                //已结束
                $obj[$k]->zhuangtai = '3';

            }else if(strtotime($v->begin_time) < strtotime($his) && strtotime($v->end_time) > strtotime($his)){
                //正在播放
                $obj[$k]->zhuangtai = '2';
            }else {
                $obj[$k]->zhuangtai = '1';
            }
        }
        return $obj;
    }
}
