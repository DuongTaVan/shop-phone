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
Route::get('login', 'LoginController@getLogin');
Route::get('logout', 'HomeController@getLogout');
Route::post('postLogin', 'LoginController@postLogin');


Route::group(['prefix'=>'admin', 'middleware'=>'ckeckLogout'], function(){
	Route::get('home', 'HomeController@getHome');

	Route::get('trangchu', 'HomeController@trangchu');
	Route::get('category', 'HomeController@category');
	Route::get('editcategory/{id}', 'HomeController@editcategory');
	Route::post('suacategory/{id}', 'HomeController@suacategory');
	Route::get('xoacategory/{id}', 'HomeController@xoacategory');
	Route::post('themcategory', 'HomeController@themcategory');
//product
	Route::get('trangchuproduct', 'ProductController@trangchuproduct');
	Route::get('product', 'ProductController@product');
	Route::get('editproduct/{id}', 'ProductController@editproduct');
	Route::get('suaproduct/{id}', 'ProductController@suaproduct');
	Route::get('xoaproduct/{id}', 'ProductController@xoaproduct');
	Route::get('themproduct', 'ProductController@themproduct');
	Route::post('postaddproduct','ProductController@postaddproduct');
	Route::post('suasp/{id}','ProductController@suasp');
	Route::get('xoa/{id}','ProductController@xoasp');
//cart
	Route::get('khachhang','ProductController@khachhang');
	Route::get('chitietdonhang/{id}','ProductController@chitietdonhang');
	Route::get('chitietdonhangdaxuli/{id}','ProductController@chitietdonhangdaxuli');
	Route::get('xuli/{id}','ProductController@daxuli');
	Route::get('process','ProductController@process');
	//Route::post('xuli/{id}','ProductController@daxuli');
});
Route::group(['prefix'=>'clear'], function(){
	Route::get('home', 'clearController@getHome');
	Route::get('danhmucsp', 'clearController@getdmsp');
	Route::get('chitiet/{id}', 'clearController@getchitiet');
	Route::get('dathang/{id}', 'clearController@getdathang');
	Route::get('show', 'clearController@getshow');
	Route::post('timkiem', 'clearController@getTimkiem');
	Route::get('delete/{id}', 'clearController@getdelete');
	Route::get('destroy', 'clearController@getdestroy');
	Route::get('danhmucsp/{id}', 'clearController@getdanhmucsp');
	Route::post('comment/{id}', 'clearController@getComment');
	Route::get('update', 'clearController@getUpdate');
	Route::post('complete', 'clearController@gettComplete');

	Route::get('listuser', 'clearController@getListuser');
	Route::get('adduser', 'clearController@getAdduser');
	Route::get('edituser/{id}', 'clearController@getEdituser');
	Route::get('deluser/{id}', 'clearController@getDeluser');
	Route::post('postAddUser', 'clearController@postAddUser');
	Route::post('postEditUser/{id}', 'clearController@postEditUser');
});

//  Route::get('xoa', function(){

// Schema::table('order', function ($table) {
//     $table->dropColumn('state');
// });

// });
