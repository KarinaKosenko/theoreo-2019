<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/category/{id?}', 'HomeController@show');
    Route::get('/action/{action_alias?}', 'HomeController@action')->where('action_alias', '[a-z-]+');
    Route::get('/brand/{brand_alias?}', 'HomeController@brand')->where('brand_alias', '[a-z-]+');

    Route::get('/vk_token', 'ParserController@generateToken');
    Route::get('/vk_wall', 'ParserController@vkWallGet');
    Route::get('/vk_newsfeed', 'ParserController@vkNewsfeedGet');
    Route::get('/vk_groups/{offset?}/{id?}', 'ParserController@vkGroupsGet')->where('id', '[0-9-]+');
});


