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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('order', 'Admin\\OrderController@index');
	Route::get('success_page/{id}', 'Admin\\OrderController@successPage');
	Route::get('pay_order', 'Admin\\OrderController@payOrder');
	Route::post('pay_order', 'Admin\\OrderController@updatePayOrder');

	//top up balance
	Route::get('topup_balance', 'Admin\\TopupBalanceController@index');
	Route::post('topup_balance', 'Admin\\TopupBalanceController@store');

	//product
	Route::get('product', 'Admin\\ProductController@index');
	Route::post('product', 'Admin\\ProductController@store');
});

