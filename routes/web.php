<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::any('login','LoginController@login');
    Route::get('code','LoginController@code');

});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['web','admin.login']],function(){
    Route::get('index','IndexController@index');
    Route::get('info','IndexController@info');
    Route::get('quit','LoginController@quit');
    Route::any('pass','IndexController@pass');
});