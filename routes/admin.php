<?php

Route::get('/login', function (){
    return view('admin.pages.login',[
        'classes' => 'login-page',
    ]);
});

Route::get('/register', function (){
    return view('admin.pages.register',[
        'classes' => 'register-page',
    ]);
});

Route::get('/', 'MainController@index');