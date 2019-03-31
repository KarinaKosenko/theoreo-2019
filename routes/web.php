<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/category/{id?}', 'HomeController@show');
    Route::get('/action/{action_alias?}', 'HomeController@action')->where('action_alias', '[a-z-]+');
    Route::get('/brand/{brand_alias?}', 'HomeController@brand')->where('brand_alias', '[a-z-]+');

    Route::get('/vkauth', 'HomeController@activation');
    Route::get('/vk_token', 'HomeController@vkActivation');
});


