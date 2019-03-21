<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/cat/{id?}', 'HomeController@show');
    Route::get('/action/{action_alias?}', 'HomeController@action')->where('action_alias', '[a-z-]+');
    Route::get('/brand/{brand_alias?}', 'HomeController@brand')->where('brand_alias', '[a-z-]+');
});

Route::view('/404', 'posts.404');