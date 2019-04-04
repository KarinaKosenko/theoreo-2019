<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'ActionController@index')->name('site.home');
    Route::get('/category/{id?}', 'ActionController@show')->name('site.category');
    Route::get('/action/{action_alias?}', 'ActionController@action')
        ->where('action_alias', '[a-z-]+')
        ->name('site.action');
    Route::get('/brand/{brand_alias?}', 'ActionController@brand')
        ->where('brand_alias', '[a-z-]+')
        ->name('site.brand');
});