<?php

Route::get('/','Home\IndexController@index');//首页
Route::get('/lists','Home\IndexController@lists');//正在热播
Route::get('/details','Home\DetailsController@details');//详情页
Route::get('/pay/{movie_id?}','Home\PayController@pay');//购票页
Route::get('/center','Home\CenterController@center');//详情页

Route::get('/grab','Home\GrabController@index');//选座页



/////////////////////////************后台************//////////////////////////////////////
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('admin','LoginController@index');//登录
    Route::get('index','IndexController@index');//首页
    Route::get('info','IndexController@info');//首页
    Route::get('homeList','HomeController@homeList');//厅号列表
    Route::get('homeCourse','HomeController@homeCourse');   //安排历程
    Route::any('addPlay','HomeController@addPlay');   //添加历程
    Route::get('calCulate','HomeController@calCulate');   //自动完成结束时间
    Route::get('changeOpen','HomeController@changeOpen');   //即点技改
    Route::any('moveadd','MoveController@moveadd');//电影添加
    Route::get('movelist','MoveController@movelist');//电影列表
    Route::any('uploadss','MoveController@uploadss');//电影列表
    Route::post('isnew','MoveController@isnew');
    Route::post('ishot','MoveController@ishot');
    Route::post('isstatus','MoveController@isstatus');
    Route::get('foot','FootController@foot');//添加食品
    Route::post('addfoot','FootController@addfoot');//食物入库
});
