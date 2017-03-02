<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','Home\IndexController@index');//首页
Route::get('/lists','Home\IndexController@lists');//正在热播
Route::get('/details','Home\DetailsController@details');//详情页
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

/////////////////////////************后台************//////////////////////////////////////
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::get('admin','LoginController@index');//登录
    Route::get('index','IndexController@index');//首页
    Route::get('info','IndexController@info');//首页
});
