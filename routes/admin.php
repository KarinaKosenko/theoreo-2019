<?php

use Illuminate\Support\Facades\Route;

Route::get( '/login', function () {
	return view( 'admin.pages.login', [
		'classes' => 'login-page',
	] );
} )->name( 'admin.auth.login' );

Route::post( '/login', 'AuthController@loginPost' );

Route::get( '/logout', 'AuthController@logout' )
     ->name( 'admin.auth.logout' );

Route::get( '/register', function () {
	return view( 'admin.pages.register', [
		'classes' => 'register-page',
	] );
} )->name( 'admin.auth.register' );

Route::middleware( [ 'auth', 'can:adminPanel,App\Models\User' ] )->group( function () {

	Route::get( '/', 'MainController@index' )->name( 'admin.main.index' );

} );

Route::group( [ 'prefix' => 'action' ], function () {
	Route::get( 'addForm', 'PostController@getAll' )->name( 'allPosts' );
	Route::get( 'addPost', 'PostController@addPostGet' )->name( 'addPostGet' );
	Route::post( 'addPost', 'PostController@addPostPost' )->name( 'addPostPost' );

} );

Route::group( [ 'prefix' => 'city' ], function () {
	Route::get( 'add', 'CityController@formAddCity' )->name( 'formAddCity' );
	Route::post( 'add', 'CityController@addCity' )->name( 'addCity' );
} );

Route::group( [ 'prefix' => 'region' ], function () {
	Route::get( 'add', 'RegionController@formAddRegion' )->name( 'formAddRegion' );
	Route::post( 'add', 'RegionController@addRegion' )->name( 'addRegion' );
} );

Route::group( [], function () {
	Route::resources( [
		'countries' => 'CountryController',
	] );
//	Route::get( '', 'index' )->name( 'index' );
//
//
//	Route::get( 'create', 'CountryController@formAddCountry' )->name( 'createCountry' );
//	Route::post( '', 'CountryController@store' )->name( 'storeCountry' );
//	Route::get( '{id}', 'CountryController@show' )->name( 'showCountry' );
//	Route::get( '{id}/edit', 'CountryController@edit' )->name( 'editCountry' );
//	Route::put( '{id}/edit', 'CountryController@update' )->name( 'updateCountry' );
//	Route::delete( '{id}', 'CountryController@destroy' )->name( 'destroyCountry' );
} );

Route::group( [ 'prefix' => 'tag' ], function () {
	Route::get( 'add', 'TagController@formAddTag' )->name( 'formAddTag' );
	Route::post( 'add', 'TagController@addTag' )->name( 'addTag' );
} );

Route::group( [ 'prefix' => 'category' ], function () {
	Route::get( 'add', 'CategoryController@formAddCategory' )->name( 'formAddCategory' );
	Route::post( 'add', 'CategoryController@addCategory' )->name( 'addCategory' );
} );


Route::group( [ 'prefix' => 'brand' ], function () {
	Route::get( 'add', 'BrandController@formAddBrand' )->name( 'formAddBrand' );
	Route::post( 'add', 'BrandController@addBrand' )->name( 'addBrand' );
} );

Route::group( [ 'prefix' => 'action' ], function () {
	Route::get( 'add', 'ActionController@formAddAction' )->name( 'formAddAction' );
	Route::post( 'add', 'ActionController@addAction' )->name( 'addAction' );
} );

