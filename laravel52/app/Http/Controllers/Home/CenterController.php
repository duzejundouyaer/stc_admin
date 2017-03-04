<?php

namespace App\Http\Controllers\Home;

use App\Model\Move;
use Illuminate\Http\Request;
use DB;
use App\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * 个人中心
 */
class CenterController extends Controller
{
    //
    public function center(){
        $session=new Session();
        $u_id=$session->get('u_id','');
        $userone=User::where('u_id',$u_id)->first();
        return view('home.center.center',['userone'=>$userone]);
    }
    //修改个人信息
    public function updateone(Request $request){
        if($request->isMethod("post")) {
            $data = $request->input();
            $res=User::where('u_id', '=',$data['u_id']) ->update(array(
                'nickname' => $data['nickname'],
            ));
            if($res){
                return redirect('center');
            }else{
                return view('errors.503');
            }
        }else{
            $session=new Session();
            $u_id=$session->get('u_id','');
            $userone=User::where('u_id',$u_id)->first();
            //print_r($userone);die;
            return view('home.center.updatecenter',['userone'=>$userone]);
        }
    }
    //订单
    public function orders(Request $request){
        $session=new Session();
        $u_id=$session->get('u_id','');
//        $u_id=1;
        $move=new Move();
        if($request->isMethod("post")) {
            $num= $request->input("pay");
            if($num==0){
                $datas=$move->ordersShow($u_id,$num);
                return json_encode($datas);
            }else if($num==1){
                $datas=$move->ordersShow($u_id,$num);
                return json_encode($datas);
            }else if($num==3){
                $datas=$move->ordersShow($u_id,$num);
                return json_encode($datas);
            }
        }else{
            ///已支付 u_id , status
            $data=$move->ordersShow($u_id,1);
//        print_r($data);die;
//        die;
            return view('home.center.orders',['data'=>$data]);
        }
    }
    //订单详情
    public function disorder($order_id){
        $move = new Move();
        $orderone = $move->orderOnedis($order_id);
        $pack=DB::table('pack')->where('id', '=',$orderone->package_id)->first();
//        print_r($orderone);die;
        //print_r($pack);die;
        return view('home.center.disorder',['orderone'=>$orderone,'pack'=>$pack]);
    }
    //ispayshou
    public function ispayshou($order_id){
        $order=DB::table('order')->where('order_id', '=',$order_id)->first();
        //print_r($order);die;
        $play=DB::table('order')->where('play_id', '=',$order->play_id)->where('status','=',1)->select('value')->get();
        $movie_id=DB::table('play')->where('id', '=',$order->play_id)->select('movie_id')->first();
        if($play){
            foreach($play as $key=>$val){
                $val->values=explode(",",$val->value);
                foreach($val->values as $k=>$v){
                    $info[]=$v;
                }
            }
        $xianzuo=explode(",",$order->value);
            $arr=[];
            for($i=0;$i<count($xianzuo);$i++){
                if(in_array($xianzuo[$i],$info)){
                    $arr[]=$xianzuo[$i];
                }
            }
//            print_r($arr);die;
            if($arr!=[]){
                return view('errors.yipay',['arr'=>$arr,'movie_id'=>$movie_id->movie_id]);
            }else{
                return redirect("againpay?order_number=$order->order_number&price=$order->price&count=$order->count&value=$order->value");
            }
        }else{
            return redirect("againpay?order_number=$order->order_number&price=$order->price&count=$order->count&value=$order->value");
        }
//        echo $order_id;
    }

//    public function againpay(Request $request){
//        $order_number=$request->input("order_number");
//        $price=$request->input("price");
//        $count=$request->input("count");
//        $value=$request->input("value");
//        //支付
//        $this->zfbPay($order_number,$price,$count,$value);
//    }
     //修改密码
    public function updatepwd(){
        $session=new Session();
        $u_id=$session->get('u_id','');
        return view('home.center.updatepwd',['u_id'=>$u_id]);
    }
















//    //修改图像
//    public function updatecenter(Request $request){
//        $n_file = Input::file('touxiang');
//        if($n_file->isValid()){
//            //获取文件名称
//            $clientName = $n_file -> getClientOriginalName();
//            $realPath = $n_file -> getRealPath();
//            //获取图片格式
//            $entension = $n_file -> getClientOriginalExtension();
//            //图片保存路径
//            $mimeTye = $n_file -> getMimeType();
//            $path = $n_file -> move('images/users');
//            //print_r($path);die;
//        }
//        $session=new Session();
//        $u_id=$session->get('u_id','');
//        $ress = DB::table('users')->where('u_id',$u_id)->update(['img'=>$path]);
//    }
    public function updatecenter(Request $request){
        $img = $request->input('imag','');
        preg_match("/^.*,(.*)$/is",$img,$res);
        $name = time().rand(100,900);
        file_put_contents("./images/users/$name.jpg",base64_decode($res[1]));
        $filename = "images/users/$name.jpg";
        $session=new Session();
        $u_id=$session->get('u_id','');
        //return $u_id;die;
        $res=User::where('u_id', '=',$u_id) ->update(array('img' => $filename));
//        $res=DB::table('users')->where('u_id',$u_id)->update(['img'=>$filename]);
        if($res){
            return json_encode($filename);
        }else{
            return 0;
        }

    }

}
