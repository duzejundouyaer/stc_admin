<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Model\Move;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
class IndexController extends Controller
{
    //
    public function index(){
        $session=new Session();
        $nickname=$session->get('nickname','');
        //echo $nickname;die;
        $move = new Move();
        $well = $move->fourShow(1);
        $soon = $move->fourShow(0);
        //print_r($data);die;
        return view('home.index.index',['well'=>$well,'soon'=>$soon,'nickname'=>$nickname]);
    }

    //正在热播
    public function lists(){
        return view('home.index.lists');
    }
}
