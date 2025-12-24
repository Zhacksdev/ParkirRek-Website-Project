<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.user');
});

Route::get('/booking', function () {
    return view('parking.booking');
});

Route::get('/vehicles', function () {
    return view('vehicles.show');
});
