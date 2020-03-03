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

//Các link của navigator
Route::get('/', 'HomeController@index');

Route::get('/shop','HomeController@showListBook');

Route::get('product-single/{url}', 'HomeController@showBook');

Route::get('search-result',['as'=>'getSearch','uses'=>'HomeController@getFind']);

Route::get('/faq',function(){
	return view('pages.faq');
});

Route::get('/about',function(){
	return view('pages.about');
});

Route::get('/cart','CartController@getShoppingCart')->name('shopping-cart');


//Phần đăng nhập 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
	
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/register','Auth\RegisterController@register')->name('register');
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/email','Auth\ForgotPasswordController@getForgot');
Route::post('/email','Auth\ForgotPasswordController@postForgot')->name('password.email');

Route::get('/reset/{token}/{email}','Auth\ResetPasswordController@getResetPassword');
Route::post('/reset','Auth\ResetPasswordController@postResetPassword')->name('password.request');


//Phần giỏ hàng
Route::get('/addCart/{id}','CartController@addItem')->name('addItem');
Route::get('/removeCart/{id}','CartController@removeItem')->name('removeItem');
Route::get('/updateCart/{id}','CartController@updateItem')->name('updateItem');
Route::get('/destroyCart','CartController@destroyItems')->name('destroyItems');

