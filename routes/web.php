<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'ActionController@index')
        ->name('site.action.index');
    Route::get('/category/{category_code}', 'ActionController@category')
        ->name('site.action.category');
    Route::post('/action/search', 'ActionController@search')
        ->name('site.action.search');
    Route::get('/action/{action_alias?}', 'ActionController@show')
        ->where('action_alias', '[a-z0-9-]+')
        ->name('site.action.show');
    Route::get('/brand/{code}', 'ActionController@brand')
        ->where('code', '[a-z-]+')
        ->name('site.action.brand');


        Route::get('/vk_token', 'ParserController@generateToken');
        Route::get('/vk_newsfeed', 'ParserController@vkNewsfeedGet');






    Route::get('/archive', 'ActionController@archive')
        ->name('site.action.archive');
    Route::get('/tag/{tag_code}', 'ActionController@tag')
        ->where('tag_code', '[a-z-0-9_]+')
        ->name('site.action.tag');
});