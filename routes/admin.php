<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('admin.pages.login', [
        'classes' => 'login-page',
    ]);
})->name('admin.auth.login');

Route::post('/login', 'AuthController@loginPost');

Route::get('/logout', 'AuthController@logout')
    ->name('admin.auth.logout');

Route::get('/register', function () {
    return view('admin.pages.register', [
        'classes' => 'register-page',
    ]);
})->name('admin.auth.register');

Route::middleware(['auth', 'can:adminPanel,App\Models\User'])->group(function () {

    Route::get('/', 'MainController@index')->name('admin.main.index');

});

Route::group( [ 'prefix' => 'action' ], function () {
	Route::get( 'addForm', 'PostController@getAll' )->name( 'allPosts' );
	Route::get( 'addPost', 'PostController@addPostGet' )->name( 'addPostGet' );
	Route::post( 'addPost', 'PostController@addPostPost' )->name( 'addPostPost' );

} );

Route::group( [ 'prefix' => 'location' ], function () {
	Route::get( 'addCountry', 'LocationController@formAddCountry' )->name( 'formAddCountry' );
	Route::post( 'addCountry', 'LocationController@addCountry' )->name( 'addCountry' );
	Route::get( 'addRegion', 'LocationController@formAddRegion' )->name( 'formAddRegion' );
	Route::post( 'addRegion', 'LocationController@addRegion' )->name( 'addRegion' );
	Route::get( 'addCity', 'LocationController@formAddCity' )->name( 'formAddCity' );
	Route::post( 'addCity', 'LocationController@addCity' )->name( 'addCity' );
} );

Route::group( [ 'prefix' => 'tag' ], function () {
	Route::get( 'add', 'TagController@formAddTag' )->name( 'formAddTag' );
	Route::post( 'add', 'TagController@addTag' )->name( 'addTag' );
} );

Route::group( [ 'prefix' => 'category' ], function () {
	Route::get( 'add', 'CategoryController@formAddCategory' )->name( 'formAddCategory' );
	Route::post( 'add', 'CategoryController@addCategory' )->name( 'addCategory' );
} );

