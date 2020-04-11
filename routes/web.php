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
Route::get('/', 'HomeController@index')->name('home');

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

Route::get('/checkout','OrderController@getCheckout')->name('payment');

Route::post('/checkout','OrderController@postCheckout');


//Phần đăng nhập 
Auth::routes();
	
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

//PayPal
Route::get('/paypal/status/{order_id}','PayPalTestController@status');

Route::get('/paypal/{order_id}','PayPalTestController@index')->name('paypal1');
Route::post('/paypal','PayPalTestController@index')->name('paypal');

//Admin 
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
	
	Route::get('/','DashboardController@index')->name('admin/home');

	Route::group(['prefix' => 'book'], function(){
		Route::get('/','BookController@home')->name('book/home');
		Route::get('/add','BookController@getAdd')->name('book.getAdd');
		Route::post('/add','BookController@postAdd')->name('book.postAdd');
		Route::get('/edit/{id}','BookController@getEdit')->name('book.getEdit');
		Route::post('/edit/{id}','BookController@postEdit')->name('book.postEdit');
		Route::get('/delete/{id}','BookController@delete')->name('book.delete');
		Route::get('/pdf','BookController@pdf');
	});

	Route::group(['prefix' => 'category'], function(){
		Route::get('/','CategoryController@home')->name('category/home');		
		Route::get('/add','CategoryController@getAdd')->name('category.getAdd');
		Route::post('/add','CategoryController@postAdd')->name('category.postAdd');
		Route::get('/edit/{id}','CategoryController@getEdit')->name('category.getEdit');
		Route::post('/edit/{id}','CategoryController@postEdit')->name('category.postEdit');
		Route::get('/delete/{id}','CategoryController@delete')->name('category.delete');
	});

	Route::group(['prefix' => 'order'], function(){
		Route::get('/','OrderController@home')->name('order/home');
		Route::get('/edit/{id}','OrderController@getEdit')->name('order.getEdit');
		Route::post('/edit/{id}','OrderController@postEdit')->name('order.postEdit');	
		Route::get('/editStatus/{id}','OrderController@editStatus')->name('order.editStatus');
		Route::get('/editSituation/{id}/{situation}','OrderController@editSituation')->name('order.editSituation');
		Route::get('/pdf/{id}','OrderController@getOrderDetail')->name('order.pdf');				
	});

	Route::group(['prefix' => 'publisher'], function(){
		Route::get('/','PublisherController@home')->name('publisher/home');		
		Route::get('/add','PublisherController@getAdd')->name('publisher.getAdd');
		Route::post('/add','PublisherController@postAdd')->name('publisher.postAdd');
		Route::get('/edit/{id}','PublisherController@getEdit')->name('publisher.getEdit');
		Route::post('/edit/{id}','PublisherController@postEdit')->name('publisher.postEdit');
		Route::get('/delete/{id}','PublisherController@delete')->name('publisher.delete');
	});

	Route::group(['prefix' => 'user'], function(){
		Route::get('/','UserController@home')->name('user/home');		
	});
});

Route::get('/chart',function(){
	$data = App\Book::all();
	return view('chart',compact('data'));
});

Route::get('/slug',function(){
	return str_slug("Người Yêu Cũ");
});

Route::get('/plugin',function(){
	return view('plugin_js');
});

Route::get('/getPlugin','HomeController@getPlugin')->name('plugin');


Route::get('/selectize',function(){
	return view('selectize');
});

Route::get('/pwgslider',function(){
	return view('pwgslider');
});

Route::get('/googlemaps',function(){
	return view('googlemaps');
});

// Route::get('welcome/{locale}', function ($locale) {
//     App::setLocale($locale);
//     //
// });

Route::group(['middleware' => 'localization'], function () {
    Route::get('/localization', function () {
        return view('localization');
    });
    Route::get('change-language/{language}','HomeController@changeLanguage')->name('change-language');
});