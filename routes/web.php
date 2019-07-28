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
    Route::get('/realisations/{production}', 'MainController@showProduction')->name('show.production');
    Route::get('/previews/{production}', 'MainController@livePreview')->name('live.preview.production');

    Route::get('/contact', 'MainController@getContact')->name('contact');
    Route::post('/contact', 'MainController@postContact')->name('contact');

    Route::get('/privacy-policy', 'MainController@privacyPolicy')->name('policy'); 
    
    
    /*
    |--------------------------------------------------------------------------
    | Auth Routes | Admin functionnalities
    |--------------------------------------------------------------------------
    |
    */
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('production', 'ProductionController')->except([]);
    Route::post('detach-tag', 'ProductionController@detachTag')->name('detach.production.tag');
    Route::post('remove-screenshot', 'ProductionController@removeScreenshot')->name('remove.production.screenshot');
    Route::get('get-productions-data', 'ProductionController@getProductionsData')->name('get.data.productions');
    Route::get('get-last-user-message','DashboardController@getLastUserMessage')->name('get.user.message');
    
    
    /*
    |--------------------------------------------------------------------------
    | Tests Routes
    |--------------------------------------------------------------------------
    |
    */
    // Route::group(['domain' => 'admin.gngdev.com'], function(){

    Route::group(['middleware' => []], function(){

        Route::get('/test', 'TestController@formFile')->name('test');
        Route::post('/test', 'TestController@formFilePost')->name('test');

        Route::get('production-list', 'TestController@getDataProduction');
        Route::get('get-productions', 'TestController@displayData');

        //Route::get('dashboard', function () { $account = "It's me"; dd($account); });
    });

});

