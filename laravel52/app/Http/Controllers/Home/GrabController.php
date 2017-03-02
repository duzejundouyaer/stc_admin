<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class GrabController extends Controller
{
    //抢位页面
    public function index($id){

        $playInfo = DB::table('play')->select(['id','play.home_id','day','play.movie_id','day_price','home_name','movie_name','begin_time'])->join('home', 'home.home_id', '=', 'play.home_id')->join('movie', 'movie.movie_id', '=', 'play.movie_id')->where("id",'=',$id)->first();
        $data = [
            'playInfo' => $playInfo,
        ];
        return view('home.grab.index',$data);
    }
    //购买票
    public function payGrab()
    {
        session_start();
//        if(!isset($_SESSION['userInfo']))
//        {
//            $result['status'] = 0;
//            $result['msg'] = '请先登录';
//            die(json_encode($result));
//        }
        $str = trim(Input::get('str'),',');
        $play_id =Input::get('play_id');
        $playInfo = DB::table("play")->where("id",'=',$play_id)->first();
        $str = explode(',',$str);
        $data['play_id'] = Input::get('play_id');
        $data['count']  = count($str);
        $data['price']  = $data['count'] * $playInfo->day_price;
        $data['order_number'] = 'zk_'.time();
        $data['is_package'] = 0;
        $data['value'] = trim(Input::get('str'),',');
        $data['pay_time'] = date('Y-m-d H:i:s');
        $data['user_id'] = 1;
        $data['status'] = 0;
        $data['package_id'] = '';
        $res = DB::table('order')->insert($data);
        if($res)
        {
            //支付
            $this->zfbPay($data['order_number'],$data['price'],$data['count'],$str);die;
        }

    }

    //查询已购买的位置
    public function checked()
    {
        $play_id = Input::get('play_id');
        $readyList = DB::table('order')->select('value')->where("play_id",'=',$play_id)->where("status",'=',1)->get();
        $result = [];
        foreach ($readyList as $k=>$v)
        {
            $result = array_merge($result,explode(',',$v->value));
        }
        echo json_encode($result);die;
    }

    //手机支付
    public function zfbPay($sn,$price,$count,$str)
    {
        $url = 'http://localhost:9096/training/stc_admin/laravel52/public/1/wappay/pay.php';
        $data = [
            'WIDout_trade_no' => $sn,
            'WIDsubject'      => '购买'.$count.'电影票',
            'WIDtotal_amount' => $price,
            'WIDbody'  =>         '支付'
        ];
        echo $this->curlPost($url,$data);
    }
    //curl
    public function curlPost($url,$data)
    {
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        if($data){
            curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }else{
            echo '缺少参数';
        }
        $data = curl_exec($ch);//运行curl
        return $data;
    }
}
