<?php

Route::get('/','Home\IndexController@index');//首页
Route::get('/lists','Home\ListsController@lists');//正在热播


Route::get('/details','Home\DetailsController@details');//详情页

Route::get('/grab/{play_id?}','Home\GrabController@index');//选座页
Route::any('/payGrab','Home\GrabController@payGrab');//购买座位
Route::any('/checked','Home\GrabController@checked');//已购座位




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
    Route::get('footshow','FootController@footshow');//食物展示
    Route::any('package','FootController@package');//添加套餐
    Route::any('packageshow','FootController@packageshow');//套餐展示
});
