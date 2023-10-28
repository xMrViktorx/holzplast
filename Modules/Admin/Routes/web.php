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

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->middleware('guest')->name('admin.index');
    Route::post('/login', 'AdminController@login')->middleware('guest')->name('admin.login');
    Route::post('/logout', 'AdminController@logout')->middleware('auth')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth')->name('admin.dashboard');
});
