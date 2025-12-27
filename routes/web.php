<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/verify-code', function () {
    return view('auth.verify-code');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/dashboard', function () {
    return view('dashboard.user');
});

Route::get('/vehicles', function () {
    return view('vehicles.show');
});
Route::get('/violations', function () {
    return view('violations.index');
});

Route::get('/vehicles/create', function () {
    return view('vehicles.create');
});

Route::get('/vehicles/edit', function () {
    return view('vehicles.edit');
});

Route::get('/timestamp', function () {
    return view('timestamp.index');
});

Route::get('/security', function () {
    return view('dashboard.security');
});
