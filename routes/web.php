<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| ADMIN (Web Controllers)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ScanController as AdminScanController;
use App\Http\Controllers\Admin\ScanLogController as AdminScanLogController;
use App\Http\Controllers\Admin\ViolationController as AdminViolationController;

/*
|--------------------------------------------------------------------------
| STUDENT (Web Controllers)
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Student\KendaraanController as StudentKendaraanController;
use App\Http\Controllers\Student\ScanLogController as StudentScanLogController;
use App\Http\Controllers\Student\ViolationController as StudentViolationController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;

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
| LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('landing.index'))->name('landing');

/*
|--------------------------------------------------------------------------
| PUBLIC: QR SCAN (NO AUTH)
|--------------------------------------------------------------------------
| QR berisi URL /v/{token} -> buka detail kendaraan untuk petugas/gate
*/
Route::get('/v/{token}', [StudentKendaraanController::class, 'scan'])
    ->name('vehicle.scan');

/*
|--------------------------------------------------------------------------
| AUTH PAGES (FE routes) - guest only
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // STUDENT AUTH VIEWS
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/login', fn() => view('student.auth.login'))->name('auth.login');
        Route::get('/register', fn() => view('student.auth.register'))->name('auth.register');
        Route::get('/forgot-password', fn() => view('student.auth.forgot-password'))->name('auth.password.request');
        Route::get('/verify-code', fn() => view('student.auth.verify-code'))->name('auth.verify.code');
    });

    // ADMIN AUTH VIEWS
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', fn() => view('admin.auth.login'))->name('auth.login');
        Route::get('/register', fn() => view('admin.auth.register'))->name('auth.register');
    });

    // Default Laravel auth redirect needs route('login')
    Route::get('/login', fn() => redirect()->route('student.auth.login'))->name('login');
});

/*
|--------------------------------------------------------------------------
| AUTH ACTIONS (BE)
|--------------------------------------------------------------------------
*/
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN WEB (BE) - protected
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard.index');

        Route::get('/scan', [AdminScanController::class, 'index'])->name('scan.index');
        Route::post('/scan/masuk', [AdminScanController::class, 'scanMasuk'])->name('scan.masuk');
        Route::post('/scan/keluar', [AdminScanController::class, 'scanKeluar'])->name('scan.keluar');

        Route::get('/scan-logs', [AdminScanLogController::class, 'index'])->name('scan_logs.index');

        Route::get('/violations', [AdminViolationController::class, 'index'])->name('violations.index');
        Route::get('/violations/create', [AdminViolationController::class, 'create'])->name('violations.create');
        Route::post('/violations', [AdminViolationController::class, 'store'])->name('violations.store');
        Route::patch('/violations/{pelanggaran}/status', [AdminViolationController::class, 'updateStatus'])
            ->name('violations.status');
    });

/*
|--------------------------------------------------------------------------
| STUDENT WEB (BE) - protected
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        // DASHBOARD (satu saja)
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('dashboard');

        // VEHICLES (controller-driven, no duplicates)
        Route::get('/vehicles', [StudentKendaraanController::class, 'index'])->name('vehicles.index');
        Route::get('/vehicles/create', [StudentKendaraanController::class, 'create'])->name('vehicles.create');
        Route::post('/vehicles', [StudentKendaraanController::class, 'store'])->name('vehicles.store');

        Route::get('/vehicles/{kendaraan}/edit', [StudentKendaraanController::class, 'edit'])->name('vehicles.edit');
        Route::put('/vehicles/{kendaraan}', [StudentKendaraanController::class, 'update'])->name('vehicles.update');
        Route::delete('/vehicles/{kendaraan}', [StudentKendaraanController::class, 'destroy'])->name('vehicles.destroy');

        // QR image (student only)
        Route::get('/vehicles/{kendaraan}/qr', [StudentKendaraanController::class, 'qr'])
            ->name('vehicles.qr');

        // VIOLATIONS (satu saja)
        Route::get('/violations', [StudentViolationController::class, 'index'])
            ->name('violations.index');

        // SCAN LOGS
        Route::get('/scan-logs', [StudentScanLogController::class, 'index'])
            ->name('scan_logs.index');

        // PROFILE (view static ok)
        Route::get('/profile', fn() => view('student.profile.index'))->name('profile');
    });

/*
|--------------------------------------------------------------------------
| INTERNAL API (AJAX) - protected (session cookie)
|--------------------------------------------------------------------------
*/
Route::prefix('internal-api')
    ->middleware(['web', 'auth'])
    ->group(function () {

        Route::prefix('admin')
            ->middleware(['role:admin'])
            ->group(function () {
                Route::post('/scan/masuk', [AdminScanApiController::class, 'masuk']);
                Route::post('/scan/keluar', [AdminScanApiController::class, 'keluar']);
                Route::get('/scan-logs', [AdminScanLogApiController::class, 'index']);
                Route::get('/kendaraan/lookup', [AdminKendaraanLookupApiController::class, 'lookup']);
            });

        // NOTE: namespace kamu masih "Mahasiswa" tapi role student -> ini ok kalau controllernya memang begitu
        Route::prefix('mahasiswa')
            ->middleware(['role:student'])
            ->group(function () {
                Route::get('/scan-logs', [MahasiswaScanLogApiController::class, 'index']);
                Route::get('/violations', [MahasiswaViolationApiController::class, 'index']);
            });
    });
