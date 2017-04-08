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
    return view('welcome');
});

Route::resource('p', 'pageController');

Route::group(['middleware' => [], 'prefix' => 'admin'], function () {
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('page', 'Admin\ArticleController');

    // 文件上传路由
    Route::post('upload', ['uses' => 'Admin\UploadController@postIndex', 'as' => 'upload']);
    Route::controller('/', 'Admin\HomeController');
});
