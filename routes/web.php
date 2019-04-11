<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'ActionController@index')->name('site.action.index');
    Route::get('/category/{category_code}', 'ActionController@category')->name('site.action.category');
    Route::get('/action/{action_alias?}', 'ActionController@show')
        ->where('action_alias', '[a-z0-9-]+')
        ->name('site.action.show');
    Route::get('/brand/{brand_alias?}', 'ActionController@brand')
        ->where('brand_alias', '[a-z-]+')
        ->name('site.action.brand');
});