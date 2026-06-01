<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    // Login dummy
    if($email == 'admin@gmail.com' && $password == '123456'){

        session([
            'login' => true,
            'username' => 'fajar'
        ]);

        return redirect('/');
    }

    return redirect('/login')->with('error', 'Email atau Password salah');
});

Route::get('/profile', function () {

    if(!session('login')){
        return redirect('/login');
    }

    return view('profile');
});

Route::post('/update-profile', function (Request $request) {

    session([
        'username' => $request->username
    ]);

    return redirect('/profile');
});

Route::get('/logout', function () {

    session()->flush();

    return redirect('/');
});