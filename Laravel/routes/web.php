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

Route::resource('test_rest', 'RestController');

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    return view('admin.cate.add');
});
Route::group(['prefix'=>'admin'],function(){ //tạo chủ nhóm cha bên ngoài VD http://localhost/Laravel/admin
	Route::group(['prefix'=>'cate'] ,function(){ //tạo chủ nhóm con bên trong VD http://localhost/Laravel/admin/cate
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		//tạo link show ra view
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		//tạo link nhỏ bên trong với get để show giao diện VD http://localhost/Laravel/admin/cate/add
		//add là tên nên đặt trùng với post phía dưới đề lấy và show giá trị đồng nhất
		//admin.cate.getAdd là tên route đặt để điều hướng controller
		//CateController@getAdd tên controller kèm theo function sử dụng
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		//tạo link nhỏ bên trong với post để lấy giá trị VD http://localhost/Laravel/admin/cate/add
		//add là tên nên đặt trùng với post ở trên đề lấy và show giá trị đồng nhất
		//admin.cate.postAdd là tên route đặt để điều hướng controller
		//CateController@postAdd tên controller kèm theo function sử dụng
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);//{id}: truyền thêm biến vào url đã khai bào ở List
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);//{id}: truyền thêm biến vào url đã khai bào ở List
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);//{id}: truyền thêm biến vào url đã khai bào ở List

	});
	Route::group(['prefix'=>'product'] ,function(){ //tạo chủ nhóm con bên trong VD http://localhost/Laravel/admin/cate
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
	});
});

