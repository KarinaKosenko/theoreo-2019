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

Route::middleware(['auth', 'can:adminPanel,App\Models\User','error.session'])
    ->group(function () {

    Route::get('/', 'MainController@index')->name('admin.main.index');
    Route::resource('brands', 'BrandController')
        ->middleware('can:brands,App\Models\User');


});


