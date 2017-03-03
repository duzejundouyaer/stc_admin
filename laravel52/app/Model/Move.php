<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $table='movie';
    protected $primaryKey='movie_id';
    public $timestamps=false;
    protected $guarded=[];

    ////首页随机查询4条
    public function fourShow($ber){
            return self::where('release',$ber)
                    ->where('is_hot',1)
                    ->where('is_status',1)
                    ->orderBy(\DB::raw('RAND()'))
                    ->take(4)
                    ->get();
    }
    ///查询订单
    public function ordersShow($u_id,$status){
        $sql="select a.order_id,a.order_number,a.count,a.user_id,a.play_id,a.status,a.price,a.value,b.id,b.movie_id,b.home_id,b.day,b.begin_time,b.end_time,b.day_price,c.home_id,c.home_name,c.is_open,d.movie_id,d.movie_name,d.movie_img,d.movie_price from `order` a,play b,home c,movie d where a.play_id=b.id and b.home_id=c.home_id and b.movie_id=d.movie_id and a.user_id=$u_id";
        if($status!=3){
            $sql.=" and a.status=$status";
        }
        $data=DB::select($sql);
        foreach($data as $key=>$val){
            $val->daybegin=$val->day." ".$val->begin_time.":00";
            $val->daybegintime=strtotime($val->daybegin);
        }
        $time=time();
        //echo $time;
        if($status!=3){
            foreach($data as $key=>$val){
                if($val->daybegintime < $time){
                    unset($data[$key]);
                }
            }
        }else{
            foreach($data as $key=>$val){
                if($val->daybegintime > $time){
                    unset($data[$key]);
                }
            }
        }
        //print_r($data);die;
        //$data=DB::table('order')->where('user_id', '=',$u_id)->where('status', '=',1)->get();
        return $data;
    }
    ///查询一条订单所有信息
    public function orderOnedis($order_id){
        $sql="select a.order_id,a.order_number,a.count,a.user_id,a.play_id,a.status,a.price,a.value,b.id,b.movie_id,b.home_id,b.day,b.begin_time,b.end_time,b.day_price,c.home_id,c.home_name,c.is_open,d.movie_id,d.movie_name,d.movie_img,d.movie_price from `order` a,play b,home c,movie d where a.play_id=b.id and b.home_id=c.home_id and b.movie_id=d.movie_id and a.order_id=$order_id";
        $data=DB::select($sql);
        $data[0]->zuo=explode(",",$data[0]->value);
        return $data[0];
    }
}

















