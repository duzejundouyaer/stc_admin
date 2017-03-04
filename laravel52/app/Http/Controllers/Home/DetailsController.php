<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DetailsController extends Controller
{
    //详情页
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
            $comment = DB::table('comment')->leftJoin('users', 'comment.users_id', '=', 'users.u_id')->where('movie_id',$movie_id)->orderBy('c_date', 'desc')
->get();
            $num = DB::table('comment')->where('movie_id',$movie_id)->count();
        return view('home.details.details',['desc'=>$desc,'packages'=>$packages,'comment'=>$comment,'num'=>$num]);
    }
    public function commonts(Request $request)
    {
        $session = $session = new Session;
        $request = $request->all();
        $movie_id = $request['movie_id'];//电影ID
        $strs  = $request['content'];//用户评论内容
        $user_id = $session->get('u_id');//用户ID
        $star = $request['star'];//星级分数
        $datetime = date("Y-m-d H:i:s",time()+8*60*60);
        $Sensitive = DB::table('sensitive')->get();
        $newArray = array();
        foreach ($Sensitive as $key => $value)
        {
             $newArray[] = $value->sensitive;
        }
        foreach ($newArray as $key => $value)
        {
            $strs = $this->strreplace($value,$strs);//过滤敏感词
        }
       $result = DB::table('comment')->insert(['users_id'=>$user_id,'c_content'=>$strs,'c_date'=>$datetime,'movie_id'=>$movie_id,'c_number'=>$star]);
       $movie_score = DB::table('comment')->where('movie_id',$movie_id)->count(); //此电影共有的评论
       $score = DB::table('comment')->where('movie_id',$movie_id)->sum('c_number');//此电影的所有评分
       $re = $score/$movie_score*1;   //电影评分
       $pingfeng = number_format($re, 1);  //电影评分取小数点后第一位
       $r = DB::table('movie')->where('movie_id',$movie_id)->update(['movie_score'=>$pingfeng]);
       $info = array();
       if($result)
       {
          $user = DB::table('users')->where('u_id',$user_id)->first();
          $info['c_content'] = $strs;
          $info['img'] = $user->img;
          $info['c_date'] = $datetime;
          $info['pingfeng'] = $pingfeng;
          return json_encode($info,true);  
       }
    }
    /**
     * 字符串处理
     */
    function strreplace($value,$strs)
    {
      return str_replace($value,str_repeat('*', $this->mbstrlen($value)),$strs);
    }
    function mbstrlen($str,$encoding="utf8")
    {

        if (($len = strlen($str)) == 0) {
            return 0;
        }

        $encoding = strtolower($encoding);

        if ($encoding == "utf8" or $encoding == "utf-8") {
            $step = 3;
        } elseif ($encoding == "gbk" or $encoding == "gb2312") {
            $step = 2;
        } else {
            return false;
        }

        $count = 0;
        for ($i=0; $i<$len; $i++) {
            $count++;
            //如果字节码大于127，则根据编码跳几个字节
            if (ord($str{$i}) >= 0x80) {
                $i = $i + $step - 1;//之所以减去1，因为for循环本身还要$i++
            }
        }
        return $count;
    }
}
