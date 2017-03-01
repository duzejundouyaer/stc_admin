<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Uploads\Uploads;
use DB;

class FootController extends Controller
{
    //添加食品
    public function foot(){
        return view('admin.foot.foot');
    }
    //食物入库
    public function addFoot()
    {
        $obj = new Uploads();
        $img_path = $obj->up($_FILES['foot_img']);
        $foot = Input::get();
        $res = DB::table('foot')->insert([
            'foot_name'=>$foot['foot_name'],
            'img'=>$img_path,
            'price'=>$foot['foot_price']
        ]);
        if($res)
        {
            return redirect('admin/footshow');
        }
        else
            {
                return view('admin.foot.foot');
            }
    }
    //食物展示
    public function footShow()
    {
        $foot = DB::table('foot')->paginate(5);
        return view('admin.foot.footshow',['foot'=>$foot]);
    }
    //添加套餐
    public function package(Request $request)
    {
        if($request->isMethod('post'))
        {
            $package = Input::get();
            //print_r($package);die;
            $obj = new Uploads();
            $imgpath = $obj->up($_FILES['package_img']);//套餐封面图
            if(empty($package['zhekou']))
            {
               $discount = $package['discount'];//单选框折扣
            }else
                {
                    $discount = $package['zhekou'];//手动添的折扣
                }
            $package_name = $package['foot_name'];//套餐名字
            foreach ($package['foot'] as $k=>$v)
            {
                $arr[] = explode('/',$v);
            }
            $total = 0; // 总价
            foreach ($arr as $key=>$val)
            {
                $ids[] = $val[0];
                $total+= $val[1];
            }
            $discountPrice = $discount*$total/10;  //折扣价
            $id = implode(',',$ids);//组合食品id
            $res = DB::table('pack')->insert([
                'pack_name'=>$package_name,
                'pack_img'=>$imgpath,
                'discount_price'=>$discountPrice,
                'original_price'=>$total,
                'zuhe'=>$id,
                'zheshu'=>$discount
            ]);
            if($res)
            {
                return redirect('admin/packageshow');
            }else
                {
                    return redirect('admin/package');
                }
        }else
            {
                $foot = DB::table('foot')->get();
                return view('admin.foot.package',['foot'=>$foot]);
            }
    }
    //套餐展示
    public function packageShow()
    {
        $result = DB::table('pack')->get();
        foreach ($result as $k=>$v)
        {
           $ids = explode(',',$v->zuhe);
           $v->foot=DB::table('foot')->whereIn('id',$ids)->get();
        }
        return view('admin.foot.packageshow',['pack'=>$result]);
    }
}
