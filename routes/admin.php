<?php

Route::get('/login', function (){
    return view('admin.pages.login',[
        'classes' => 'login-page',
    ]);
})->name('admin.auth.login');

Route::get('/register', function (){
    return view('admin.pages.register',[
        'classes' => 'register-page',
    ]);
})->name('admin.auth.register');

Route::get('/', 'MainController@index')->name('admin.main.index');