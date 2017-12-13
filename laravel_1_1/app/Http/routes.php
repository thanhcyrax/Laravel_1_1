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

Route::get('view1/{mon_hoc?}',function($mon_hoc='kkk'){
    return $mon_hoc;
});

Route::get('user/{id}/{name}', function ($id, $name) {
    return 'okok';
})
->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::group(['prefix'=>'admin'],function(){
	Route::get('ad1',function(){
	    return 'ad1';
	});
	Route::get('ad2',function(){
	    return 'ad2';
	});
});

Route::get('vitest' ,function(){
	if (view()->exists('welcome')){
        return 'okok';
	}else{
		return 'koko';
	}
});

Route::get('master' ,function(){
	return view('child');
});

Route::get('url/full' ,function(){
	return URL::asset('hh.css');
});

Route::get('to' ,function(){
	return URL::to('thong-tin',['thanh','01222222']);
});

Route::get('to' ,function(){
	return secure_url('thong-tin',['thanh','01222222']);
});

