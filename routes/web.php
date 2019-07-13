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
    Route::post('/prices', 'MainController@ajaxPrices')->name('prices');
    Route::get('/realisations', 'MainController@realisations')->name('realisations');

    Route::get('/contact', 'MainController@getContact')->name('contact');
    Route::post('/contact', 'MainController@postContact')->name('contact');

    Route::get('/privacy-policy', 'MainController@privacyPolicy')->name('policy'); 
    
    
    /*
    |--------------------------------------------------------------------------
    | Auth Routes
    |--------------------------------------------------------------------------
    |
    */
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('production', 'ProductionController')->except([]);
    
    
    /*
    |--------------------------------------------------------------------------
    | Tests Routes
    |--------------------------------------------------------------------------
    |
    */
    // Route::group(['domain' => 'admin.gngdev.com'], function(){

    Route::group(['middleware' => []], function(){

        Route::get('/test', 'TestController@test')->name('test');
        Route::post('/test', 'TestController@testPost')->name('test');

        //Route::get('dashboard', function () { $account = "It's me"; dd($account); });
    });

});

