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
Route::group(['middleware'=>"login"],function(){

	Route::get('/',function(){
		return view('welcome');
	});

	Route::get('/admin',function(){
		return '这是一个牛逼胡后台';
	})->name('ht');

	Route::get('/home',function(){
		return '<a href='.route('ht').'>后台</a>';
	});

	Route::get('/user/{id}',function($id){
		return '用户id是：'.$id;
	})->where('id','\d+');

	Route::get('/404}',function(){
		if(empty($_GET['id'])){
			abort(404);
		}
	});
});



//后台
//Route::group([],function(){
//	Route::get('/aa'function(){
//		return 'aa';
//	});
//});