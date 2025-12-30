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

    Route::get('/admin/login', function () {
    return view('admin.auth.login');
    })->name('admin.login');

    Route::get('/admin/register', function () {
    return view('admin.auth.register');
    })->name('admin.register');

    Route::post('/logout', function () {
    request()->session()->flush();
    return redirect('/');
    })->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {


    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/locations', function () {
        return view('admin.locations');
    })->name('locations');

    Route::get('/statistics', function () {
        return view('admin.statistics');
    })->name('statistics');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');

     Route::get('/scan', function () {
        return view('admin.scan');
    })->name('scan');

     Route::get('/violations', function () {
        return view('admin.violations');
    })->name('violations');

     Route::get('/vehicle-logs', function () {
        return view('admin.vehicle_logs');
    })->name('vehicle_logs');
});
