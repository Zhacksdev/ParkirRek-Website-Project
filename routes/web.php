<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH (session-based)
|--------------------------------------------------------------------------
| Sesuaikan dengan setup login kamu.
*/
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| ADMIN (Web)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ScanController as AdminScanController;
use App\Http\Controllers\Admin\ScanLogController as AdminScanLogController;
use App\Http\Controllers\Admin\ViolationController as AdminViolationController;

/*
|--------------------------------------------------------------------------
| STUDENT/MAHASISWA (Web)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Mahasiswa\KendaraanController as MahasiswaKendaraanController;
use App\Http\Controllers\Mahasiswa\ScanLogController as MahasiswaScanLogController;
use App\Http\Controllers\Mahasiswa\ViolationController as MahasiswaViolationController;

/*
|--------------------------------------------------------------------------
| INTERNAL API (AJAX - session cookie)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\InternalApi\Admin\ScanController as AdminScanApiController;
use App\Http\Controllers\InternalApi\Admin\ScanLogController as AdminScanLogApiController;
use App\Http\Controllers\InternalApi\Admin\KendaraanLookupController as AdminKendaraanLookupApiController;

use App\Http\Controllers\InternalApi\Mahasiswa\ScanLogController as MahasiswaScanLogApiController;
use App\Http\Controllers\InternalApi\Mahasiswa\ViolationController as MahasiswaViolationApiController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    // Kalau mau landing page:
    return view('landing.index');

    // Kalau mau langsung login:
    // return redirect()->route('student.login');
});

/*
|--------------------------------------------------------------------------
| STUDENT AUTH (views in resources/views/student/auth)
|--------------------------------------------------------------------------
*/
Route::get('/login', fn () => view('student.auth.login'))->name('login'); // biar route('login') tetap works
Route::get('/register', fn () => view('student.auth.register'))->name('register');
Route::get('/forgot-password', fn () => view('student.auth.forgot-password'))->name('password.request');
Route::get('/verify-code', fn () => view('student.auth.verify-code'))->name('verify.code');

/*
|--------------------------------------------------------------------------
| AUTH ACTIONS (POST) - tetap pakai controller kamu
|--------------------------------------------------------------------------
*/
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH (views in resources/views/admin/auth)
|--------------------------------------------------------------------------
| NOTE: Ini page login admin, bukan dashboard.
| Dashboard admin tetap di group middleware role:admin di bawah.
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', fn () => view('admin.auth.login'))->name('login');
    Route::get('/register', fn () => view('admin.auth.register'))->name('register');
});
