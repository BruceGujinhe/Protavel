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

// page
Route::resource('p', 'pageController');



//
// Admin
// -------------------------------
Route::get('admin/log-in', 'Admin\AuthController@getLogIn');
Route::post('admin/log-in', 'Admin\AuthController@postLogIn');
Route::get('admin/log-out', 'Admin\AuthController@getLogOut');

Route::group(['middleware' => ['auth.admin'], 'prefix' => 'admin'], function () {
    Route::resource('article', 'Admin\ArticleController');
    Route::resource('page', 'Admin\PageController');

    // 文件上传路由
    Route::post('upload', ['uses' => 'Admin\UploadController@postIndex', 'as' => 'upload']);
    Route::controller('/', 'Admin\HomeController');
});
