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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth','auth:web'],function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('user', 'UserController');
    Route::resource('item', 'ItemController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');

    Route::get('/add_to_order/{id}', 'OrderController@addToOrder')->name('add_to_order');
    Route::get('/delete_from_order/{id}', 'OrderController@deleteFromOrder')->name('delete_from_order');
    Route::get('/add_ded_one_to_item/{id}','OrderController@addDedOneToItem')->name('add_ded_one_to_item');

    Route::get('/save_order/{id}','OrderController@saveOrder')->name('save_order');

    Route::get('/sizes/{id}','SizeController@index')->name('sizes');
    Route::post('/add_size','SizeController@store')->name('add_size');
    Route::get('/delete_size','SizeController@destroy')->name('delete_size');

    Route::get('/bill/{id}','OrderController@bill')->name('bill');

    Route::resource('order_details', 'OrderDetailsController');
    Route::resource('log', 'LogController');

    Route::get('daily_report', 'HomeController@dailyReport')->name('daily_report');
});
