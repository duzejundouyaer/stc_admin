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
        $session=new Session();
        $nickname=$session->get('nickname','');
        return view('home.center.center');
    }
}
