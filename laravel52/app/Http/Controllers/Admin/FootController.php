<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use app\Uploads\Uploads;

class FootController extends Controller
{
    //添加食品
    public function foot(){
        return view('admin.foot.foot');
    }
    //食物入库
    public function addFoot(){
        $obj = new Uploads();
        $foot = Input::get();
        return view('admin.index.info');
    }
}
