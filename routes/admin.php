<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('admin.pages.login', [
        'classes' => 'login-page',
    ]);
})->name('login');

Route::post('/login','MainController@loginPost');
Route::get('/logout','MainController@logout');

Route::get('/register', function () {
    return view('admin.pages.register', [
        'classes' => 'register-page',
    ]);
})->name('admin.auth.register');

Route::get('/', 'MainController@index')
    ->name('admin.main.index')
    ->middleware('auth');