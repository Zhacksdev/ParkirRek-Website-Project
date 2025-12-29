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

use App\Http\Controllers\InternalApi\Mahasiswa\ScanLogController as StudentScanLogApiController;
use App\Http\Controllers\InternalApi\Mahasiswa\ViolationController as StudentViolationApiController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Login / Logout
|--------------------------------------------------------------------------
| Kalau kamu sudah pakai auth scaffolding lain, silakan sesuaikan.
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN WEB ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard.index');

        // Scan (web form)
        Route::get('/scan', [AdminScanController::class, 'index'])->name('scan.index');
        Route::post('/scan/masuk', [AdminScanController::class, 'scanMasuk'])->name('scan.masuk');
        Route::post('/scan/keluar', [AdminScanController::class, 'scanKeluar'])->name('scan.keluar');

        // Scan logs (web list)
        Route::get('/scan-logs', [AdminScanLogController::class, 'index'])->name('scan_logs.index');

        // Violations (web)
        Route::get('/violations', [AdminViolationController::class, 'index'])->name('violations.index');
        Route::get('/violations/create', [AdminViolationController::class, 'create'])->name('violations.create');
        Route::post('/violations', [AdminViolationController::class, 'store'])->name('violations.store');
        Route::patch('/violations/{pelanggaran}/status', [AdminViolationController::class, 'updateStatus'])
            ->name('violations.status');
    });

/*
|--------------------------------------------------------------------------
| MAHASISWA / STUDENT WEB ROUTES
|--------------------------------------------------------------------------
| Kamu sebelumnya campur nama route "student." dan prefix "/mahasiswa".
| Di sini aku buat prefix URL tetap /mahasiswa, tapi name tetap "student."
| supaya sesuai controller kamu yang redirect ke route('student.kendaraan.index').
*/
Route::middleware(['auth', 'role:student'])
    ->prefix('mahasiswa')
    ->name('student.')
    ->group(function () {
        // Kendaraan CRUD
        Route::resource('kendaraan', MahasiswaKendaraanController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        // Scan logs (web)
        Route::get('/scan-logs', [MahasiswaScanLogController::class, 'index'])
            ->name('scan_logs.index');

        // Violations (web)
        Route::get('/violations', [MahasiswaViolationController::class, 'index'])
            ->name('violations.index');
    });

/*
|--------------------------------------------------------------------------
| INTERNAL API (AJAX) - Session Auth
|--------------------------------------------------------------------------
| IMPORTANT:
| - Pakai middleware web + auth supaya cookie session sama dengan web.
| - Endpoint JSON untuk fetch/AJAX dari Blade.
*/
Route::prefix('internal-api')
    ->middleware(['web', 'auth'])
    ->group(function () {

        // =========================
        // ADMIN INTERNAL API
        // =========================
        Route::prefix('admin')
            ->middleware(['role:admin'])
            ->group(function () {
                // Scan masuk/keluar
                Route::post('/scan/masuk', [AdminScanApiController::class, 'masuk']);
                Route::post('/scan/keluar', [AdminScanApiController::class, 'keluar']);

                // Scan logs (paginate + filter)
                Route::get('/scan-logs', [AdminScanLogApiController::class, 'index']);

                // Kendaraan lookup
                Route::get('/kendaraan/lookup', [AdminKendaraanLookupApiController::class, 'lookup']);
            });

        // =========================
        // STUDENT INTERNAL API
        // =========================
        Route::prefix('student')
            ->middleware(['role:student'])
            ->group(function () {
                // Scan logs (milik sendiri)
                Route::get('/scan-logs', [StudentScanLogApiController::class, 'index']);

                // Violations (milik sendiri)
                Route::get('/violations', [StudentViolationApiController::class, 'index']);
            });
    });
