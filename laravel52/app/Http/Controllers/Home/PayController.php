<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    //
    public function pay($movie_id = 0 ){
        if($movie_id == 0)
        {
            echo '滚';
        }
    }
}
