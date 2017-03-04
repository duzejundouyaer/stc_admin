<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
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
        $session = new Session();
        $user_id = $session->get('u_id');
//        if(!isset($_SESSION['userInfo']))
//        {
//            $result['status'] = 0;
//            $result['msg'] = '请先登录';
//            die(json_encode($result));
//        }
        date_default_timezone_set('PRC');
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
        $data['user_id'] = $user_id;
        $data['status'] = 0;
        $data['package_id'] = '';
        $res = DB::table('order')->insert($data);
        if($res)
        {
            //支付
            $this->zfbPay($data['order_number'],$data['price'],$data['count'],$str);
        }else{
            echo "<script>alert('下订单失败');location.href='grab/$play_id'</script>";
        }

    }
    //同步地址
    public function successUrl()
    {
        if(isset($_GET['out_trade_no']))
        {
            $sn = $_GET['out_trade_no'];
            preg_match("/^ls(.*)$/",$sn,$res);
            if(empty($res)){
                $data['status'] = 1;
                $res = DB::table('order')->where("order_number",'=',$sn)->update($data);
                if($res)
                {
                    //购买给用户发短信  票房加
                    $mess = DB::table('order')->join('users', 'users.u_id', '=', 'order.user_id')->where("order_number",'=',$sn)->first();
                    $play_id = $mess->play_id;
                    $movieId = DB::table('play')->select('movie_id')->where("id",'=',$play_id)->first();
                    $movieId = $movieId->movie_id;
                    $movieInfo = DB::table('movie')->where("movie_id",'=',$movieId)->first();
                    $newbox = $movieInfo->movie_box + $mess->count;
                    $upStatus = DB::table('movie')->where("movie_id",'=',$movieId)->update(['movie_box'=>$newbox]);
                    $tel = $mess->user;
                    $content = "nickname=".$mess->nickname.'&num='.$mess->count.'&order_number='.$mess->order_number;
                    $status = $this->Short($tel,$content);
                    if($status)
                    {
                        return redirect('/');
                        //echo "<script>alert('购买成功,短信已发送到您的手机');location.href='/'</script>";
                    }else{
                        //return redirect('/');
                        echo "<script>alert('系统出错,请联系网站管理员');location.href='/'</script>";
                    }

                }
            }else{
                DB::table('pack_order')->where("order_name",'=',$sn)->update(['status'=>1]);
                $mess = DB::table('pack_order')->join('users', 'users.u_id', '=', 'pack_order.user_id')->where("order_name",'=',$sn)->first();
                $tel = $mess->user;
                $content = "nickname=".$mess->nickname.'&order_number='.$mess->order_name;
                $status = $this->Short($tel,$content);
                if($status)
                {
                    return redirect('/');
                }else{
                    echo "<script>alert('系统出错,请联系网站管理员');location.href='/'</script>";
                }
            }

        }else{
            echo "<script>alert('购买失败');location.href='/'</script>";
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
        $url = 'http://localhost/dayi/stc_admin/laravel52/public/1/wappay/pay.php';
        $data = [
            'WIDout_trade_no' => $sn,
            'WIDsubject'      => '购买'.$count.'张电影票',
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
    //拼接短信参数
    public function Short($tel,$content)
    {
        $nowapi_parm['app']='sms.send';
        $nowapi_parm['param']= urlencode($content);
        $nowapi_parm['tempid']=50921;
        $nowapi_parm['phone']=$tel;
        $nowapi_parm['appkey']=20892;
        $nowapi_parm['sign']='28feb41149334bcdb2d02918f618d98d';
        $nowapi_parm['format']='json';
        $result=$this->nowapi_call($nowapi_parm);
        if($result['status'] == 'OK'){
            return 1;
        }else{
            //失败了继续调
            $this->Short($tel,$content);
        }
    }
    //短信接口
    public function nowapi_call($a_parm){
        if(!is_array($a_parm)){
            return false;
        }
        //combinations
        $a_parm['format']=empty($a_parm['format'])?'json':$a_parm['format'];
        $apiurl=empty($a_parm['apiurl'])?'http://api.k780.com:88/?':$a_parm['apiurl'].'/?';
        unset($a_parm['apiurl']);
        foreach($a_parm as $k=>$v){
            $apiurl.=$k.'='.$v.'&';
        }
        $apiurl=substr($apiurl,0,-1);
        if(!$callapi=file_get_contents($apiurl)){
            return false;
        }
        //format
        if($a_parm['format']=='base64'){
            $a_cdata=unserialize(base64_decode($callapi));
        }elseif($a_parm['format']=='json'){
            if(!$a_cdata=json_decode($callapi,true)){
                return false;
            }
        }else{
            return false;
        }
        //array
        if($a_cdata['success']!='1'){
            echo $a_cdata['msgid'].' '.$a_cdata['msg'];
            return false;
        }
        return $a_cdata['result'];
    }


    //套餐
    public function pack($pack_id,$price){
          $session = new Session();
          $user_id = $session->get('u_id');
          $playInfo = DB::table("pack")->where("id",'=',$pack_id)->first();
          $order_number = 'ls'.time();
          $lin = $playInfo->pack_name;
          $data['order_name'] = $order_number;
          $data['price'] = $price;
          $data['user_id'] = $user_id;
          $data['time'] = date('Y-m-d h:i:s');
          $data['status'] = 0;
          $data['pack_id'] = $pack_id;
          $res = DB::table('pack_order')->insert($data);
          if($res)
          {
              $this->lala($order_number,$price,$lin);
          }else
              {
                  echo "下单失败";
              }



    }

    public function lala($order_number,$price,$lin)
    {
        $url = 'http://localhost/dayi/stc_admin/laravel52/public/1/wappay/pay.php';
        $data = [
            'WIDout_trade_no' => $order_number,
            'WIDsubject'      => '购买'.$lin.'零食组合套餐',
            'WIDtotal_amount' => $price,
            'WIDbody'  =>         '支付'
        ];
        echo $this->curlPost($url,$data);
    }

    public function againpay(Request $request){
        $order_number=$request->input("order_number");
        $price=$request->input("price");
        $count=$request->input("count");
        $value=$request->input("value");
        //支付
        $this->zfbPay($order_number,$price,$count,$value);
    }


}
