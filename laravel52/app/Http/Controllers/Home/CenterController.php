<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
/**
 * 个人中心
 */
class CenterController extends Controller
{
    //
    public function center(){
        return view('home.center.center');
    }
}
