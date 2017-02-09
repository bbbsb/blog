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

Route::get('/', function () {
    return redirect('admin/login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('/', function(){
        return redirect('admin/index');
    });
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::get('captcha', 'LoginController@captcha');
    Route::get('logout', 'LoginController@logout');
});

Route::group(['middleware' => ['admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('resetpassword', 'IndexController@resetPassword');
    Route::post('resetpassword', 'IndexController@passwordHandle');

    Route::get('wechat/article/index', 'WechatArticleController@index');
    Route::get('wechat/article/create', 'WechatArticleController@create');
    Route::post('wechat/article/create', 'WechatArticleController@store');
});

