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
    Route::get('/about', 'MainController@about')->name('about');
    Route::get('/website', 'MainController@website')->name('website');
    Route::get('/mobile-app', 'MainController@mobileApp')->name('mobileApp');
    Route::get('/prices', 'MainController@prices')->name('prices');

    Route::get('/contact', 'MainController@getContact')->name('contact');
    Route::post('/contact', 'MainController@postContact')->name('contact');

    Route::get('/privacy-policy', 'MainController@privacyPolicy')->name('policy');


    /*
     * Testing page
    */
    Route::get('/test', 'MainController@test')->name('test');
    

});
