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
Route::get('/kosar', 'CartController@index')->name('cart.index');
Route::get('/remove-all', 'CartController@removeAll')->name('cart.remove.all');
Route::get('/remove/{id}', 'CartController@removeItem')->name('cart.remove.item');
Route::post('/update', 'CartController@update')->name('cart.update');

Route::get('/rendeles', 'ShopController@checkout')->name('shop.checkout');
Route::post('/checkout', 'ShopController@saveOrder')->name('shop.order');

Route::get('/rolunk', 'ShopController@about')->name('shop.about');

Route::get('/aszf', 'ShopController@termsAndConditions')->name('shop.terms');
Route::get('/adatkezelesi_tajekoztato', 'ShopController@dataPrivacy')->name('shop.privacy');

Route::fallback('ShopController@getCategoryOrProduct');
