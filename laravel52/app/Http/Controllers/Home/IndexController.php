<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Model\Move;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        $move = new Move();
        $well = $move->fourShow(1);
        $soon = $move->fourShow(0);
        //print_r($data);die;
        return view('home.index.index',['well'=>$well,'soon'=>$soon]);
    }

    //正在热播
    public function lists(){
        return view('home.index.lists');
    }
}
