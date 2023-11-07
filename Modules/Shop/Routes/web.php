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

Route::get('/', 'ShopController@index')->name('shop.index');
Route::post('/add', 'CartController@add')->name('cart.add');
Route::get('/shopping-cart', 'CartController@index')->name('cart.index');
Route::post('/remove-all', 'CartController@removeAll')->name('cart.remove.all');
Route::post('/update', 'CartController@update')->name('cart.update');

Route::get('/checkout', 'ShopController@checkout')->name('shop.checkout');
Route::post('/order', 'ShopController@saveOrder')->name('shop.order');

Route::fallback('ShopController@getCategoryOrProduct');
