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

Route::get('/login',function(){
    return 'login page';
});
//前台
Route::group([],function(){

	Route::get('/',function(){
		return view('welcome');
	});

	Route::get('/admin',function(){
		return '这是一个牛逼胡后台';
	})->name('ht')->middleware('login');

	Route::get('/home',function(){
		return '<a href='.route('ht').'>后台</a>';
	});

	Route::get('/update',function(){
        echo 'update';
    })->middleware('login');

	Route::get('/delete',function(){
        echo 'delete';
    })->middleware('login');

	Route::get('/404}',function(){
		if(empty($_GET['id'])){
			abort(404);
		}
	});
});



//后台
Route::get('/user/add','UserController@add');
Route::post('/user/insert','UserController@insert');


//Api
Route::get('/user/{id}','UserController@show')->name('user.show')->where('id','\d+');
Route::get('/user/index','UserController@index')->middleware('login');


//资源控制器
Route::resource('tiezi','TieziController');
Route::post('/upload','TieziController@upload');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/set','HomeController@set');
Route::get('/get','HomeController@get');

Route::get('/select','DBController@select');
Route::get('/model','DBController@model');