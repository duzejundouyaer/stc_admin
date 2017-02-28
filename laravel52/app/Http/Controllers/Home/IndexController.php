<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){
        return view('home.index.index');
    }

    //正在热播
    public function lists(){
        return view('home.index.lists');
    }
}
