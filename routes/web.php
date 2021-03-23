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

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::resource('catering', 'CateringController');

Route::resource('employees', 'EmployeeController');

Route::resource('dishes', 'DishController');

Route::resource('orders', 'OrdersController');

Route::resource('test', 'TestController');

Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('cateringemployee/routes', 'HomeController@cateringemployee')->middleware('cateringemployee');

Route::get('companyemployee/routes', 'HomeController@companyemployee')->middleware('companyemployee');

Route::get('cart/add/{id}', 'OrdersController@addToCart');

Route::get('cart/delete/{id}', 'OrdersController@removeFromCart');

Route::get('cart/flush/', 'OrdersController@removeAll');

Route::get('order/storeOrder/{id}', 'OrdersController@storeOrder');

Route::get('order/showForEmployee', 'OrdersController@showForEmployee');

Route::get('order/showForAdmin', 'OrdersController@showForAdmin');

Route::get('order/showForCatering', 'OrdersController@showForCatering');

Route::get('employees/refreshFunds/', 'EmployeeController@refreshFunds');
