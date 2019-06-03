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
Route::group(['middleware' => ['web']], function () {
    Route::get('language/{lang}', 'MainController@language')->where('lang', '[A-Za-z_-]+');

    Route::get('/', 'MainController@index')->name('home');
});
