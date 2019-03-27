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

Route::get('/', 'MainController@index')
    ->name('admin.main.index')
    ->middleware('auth')
    ->middleware('can:login,App\Models\User');
