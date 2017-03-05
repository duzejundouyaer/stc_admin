<?php

Route::get('/','Home\IndexController@index');//首页
Route::get('/orby','Home\IndexController@orby');//票房排行
Route::get('/lists','Home\ListsController@lists');//正在热播
Route::any('/seach','Home\IndexController@seach');//搜索
Route::any('/jqjson','Home\IndexController@jqjson');//ss
Route::get('/forthcoming','Home\ListsController@forthcoming');//即将上映列表
Route::get('/box','Home\ListsController@box');//票房排行

Route::post('/commont','Home\DetailsController@commonts');//用户评论
Route::get('/pay/{movie_id?}','Home\PayController@pay');//详情页
Route::get('/details','Home\DetailsController@details');//详情页


Route::get('/grab/{play_id?}','Home\GrabController@index');//选座页
Route::get('/pay/{movie_id?}','Home\PayController@pay');//选座页
Route::any('/payGrab','Home\GrabController@payGrab');//购买座位
Route::any('/checked','Home\GrabController@checked');//已购座位
Route::any('/successUrl','Home\GrabController@successUrl');//支付成功同步地址
/**
 * 登陆
 */
Route::get('/login','Home\LoginController@login');//跳转登陆
Route::post('/checklogin','Home\LoginController@checklogin');//登陆
Route::get('/qqlogin','Home\LoginController@qqlogin');//qq登陆
Route::get('/weibo','Home\LoginController@weibo');//微博登陆
Route::get('/login_out','Home\LoginController@login_out');//退出登录
/**
 * 注册
 */
Route::get('/register','Home\LoginController@register');//跳转注册
Route::post('/adds','Home\LoginController@adds');//注册
Route::get('/nowapi_call','Home\LoginController@nowapi_call');//手机短信验证
Route::get('/only','Home\LoginController@only');//注册唯一性
Route::get('/short','Home\LoginController@short');//发送短信
Route::get('/contrast','Home\LoginController@contrast');//验证码对比

Route::any('/center','Home\CenterController@center');//个人中心页
Route::any('/updatecenter','Home\CenterController@updatecenter');//修改
Route::any('/updateone','Home\CenterController@updateone');//个人中心页
Route::get('/updatepwd','Home\CenterController@updatepwd');//修改密码
Route::any('/orders','Home\CenterController@orders');//orders
Route::get('/disorder/{order_id}','Home\CenterController@disorder');//订单详情
Route::get('/ispayshou/{order_id}','Home\CenterController@ispayshou');//ispayshou
Route::get('/againpay','Home\GrabController@againpay');//重新支付



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


Route::get('/pack/{pack_id}/{price}','Home\GrabController@pack');//详情页