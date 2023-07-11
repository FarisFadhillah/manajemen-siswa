<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\KategoriKelasController as AdminKategoriKelasController;
use App\Http\Controllers\Admin\PelajaranController as AdminPelajaranController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\TahunAjaranController as AdminTahunAjaranController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;

use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\AbsenController as GuruAbsenController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;

use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    // SISWA
    Route::get('/', 'index');
    Route::post('/login-siswa', 'loginSiswa');

    // GURU
    Route::get('/login-guru', 'guru');
    Route::post('/login-guru', 'loginGuru');

    // ADMIN
    Route::get('/login-admin', 'admin');
    Route::post('/login-admin', 'loginAdmin');
});

Route::middleware(['auth'])->get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index']);

    Route::resource('tahun-ajarans', AdminTahunAjaranController::class);
    Route::resource('gurus', AdminGuruController::class);
    Route::resource('kategori-kelases', AdminKategoriKelasController::class);
    Route::resource('pelajarans', AdminPelajaranController::class);
    Route::resource('siswas', AdminSiswaController::class);
    Route::resource('kelases', AdminKelasController::class);
    Route::resource('nilais', AdminNilaiController::class);
});

Route::middleware(['auth:guru'])->prefix('guru')->group(function () {
    Route::get('/', [GuruDashboardController::class, 'index']);
    Route::get('/profile', [GuruDashboardController::class, 'guru']);
    Route::put('/profile/{id}', [GuruDashboardController::class, 'update']);

    Route::resource('nilais', GuruNilaiController::class);
    Route::resource('absens', GuruAbsenController::class);
    Route::resource('siswas', GuruSiswaController::class);
});

Route::middleware(['auth:siswa'])->prefix('siswa')->group(function () {
    Route::get('/', [SiswaDashboardController::class, 'index']);
    Route::get('/profile', [SiswaDashboardController::class, 'siswa']);
    Route::put('/profile/{id}', [SiswaDashboardController::class, 'update']);

    Route::resource('nilais', SiswaNilaiController::class);
});
