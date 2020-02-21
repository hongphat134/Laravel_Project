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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
