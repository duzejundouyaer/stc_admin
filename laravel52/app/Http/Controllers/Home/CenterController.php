<?php

namespace App\Http\Controllers\Home;

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
    public function orders(){
        return view('home.center.orders');
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
        $filename = "./images/users/$name.jpg";
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
