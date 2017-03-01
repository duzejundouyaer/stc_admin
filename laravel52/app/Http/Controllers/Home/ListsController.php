<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListsController extends Controller
{
    //正在热播
    public function lists(){
        return view('home.lists.lists');
    }
}
