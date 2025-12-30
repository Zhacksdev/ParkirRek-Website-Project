<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('landing.index'));

/*
|--------------------------------------------------------------------------
| STUDENT (UI Views)
|--------------------------------------------------------------------------
| View path:
| resources/views/student/...
*/
Route::prefix('student')->name('student.')->group(function () {

    // Auth
    Route::get('/login', fn () => view('student.auth.login'))->name('login');
    Route::get('/register', fn () => view('student.auth.register'))->name('register');
    Route::get('/forgot-password', fn () => view('student.auth.forgot-password'))->name('forgot');
    Route::get('/verify-code', fn () => view('student.auth.verify-code'))->name('verify');

    // App
    Route::get('/dashboard', fn () => view('student.dashboard.user'))->name('dashboard');

    Route::get('/vehicles', fn () => view('student.vehicles.show'))->name('vehicles.index');
    Route::get('/vehicles/create', fn () => view('student.vehicles.create'))->name('vehicles.create');
    Route::get('/vehicles/edit', fn () => view('student.vehicles.edit'))->name('vehicles.edit');

    Route::get('/violations', fn () => view('student.violations.index'))->name('violations.index');

    Route::get('/timestamp', fn () => view('timestamp.index'))->name('timestamp');
});

/*
|--------------------------------------------------------------------------
| ADMIN (UI Views)
|--------------------------------------------------------------------------
| View path:
| resources/views/admin/...
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login', fn () => view('admin.auth.login'))->name('login');
    Route::get('/register', fn () => view('admin.auth.register'))->name('register');

    // Pages
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    Route::get('/locations', fn () => view('admin.locations'))->name('locations');
    Route::get('/statistics', fn () => view('admin.statistics'))->name('statistics');
    Route::get('/settings', fn () => view('admin.settings'))->name('settings');
    Route::get('/scan', fn () => view('admin.scan'))->name('scan');
    Route::get('/violations', fn () => view('admin.violations'))->name('violations');
    Route::get('/vehicle-logs', fn () => view('admin.vehicle_logs'))->name('vehicle_logs');
});

/*
|--------------------------------------------------------------------------
| SHORTCUTS (optional)
|--------------------------------------------------------------------------
| Kalau kamu pengen URL lama tetap hidup tanpa /student,
| kamu bisa arahkan ke route student:
*/
Route::get('/login', fn () => redirect()->route('student.login'))->name('login');
Route::get('/register', fn () => redirect()->route('student.register'))->name('register');
Route::get('/dashboard', fn () => redirect()->route('student.dashboard'))->name('dashboard');

/*
|--------------------------------------------------------------------------
| LOGOUT (dummy)
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    request()->session()->flush();
    return redirect('/');
})->name('logout');

