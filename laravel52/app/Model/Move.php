<?php

namespace App\Model;

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

}
