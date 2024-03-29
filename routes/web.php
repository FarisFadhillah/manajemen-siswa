<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\GuruMatpelController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KategoriKelasController as AdminKategoriKelasController;
use App\Http\Controllers\Admin\PelajaranController as AdminPelajaranController;
use App\Http\Controllers\Admin\SiswaController as AdminSiswaController;
use App\Http\Controllers\Admin\TahunAjaranController as AdminTahunAjaranController;
use App\Http\Controllers\Admin\KelasController as AdminKelasController;
use App\Http\Controllers\Admin\NilaiController as AdminNilaiController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController;
use App\Http\Controllers\Admin\TugasController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Guru\AbsenController as GuruAbsenController;
use App\Http\Controllers\Guru\SiswaController as GuruSiswaController;

use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\NilaiController as SiswaNilaiController;

use App\Http\Controllers\CalonSiswa\DataSiswaController as DataSiswaController;
use App\Http\Controllers\CalonSiswa\DataLengkapSiswaController as SiswaLengkapController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/','LandingController@index')->name('home');

    
    Route::get('/login','AuthController@index')->name('login');
    Route::post('/login-siswa','AuthController@loginSiswa')->name('loginSiswa');

    
    Route::get('/pendaftaran','CalonSiswa\DataSiswaController@create')->name('daftar');
    Route::post('/pendaftaran','CalonSiswa\DataSiswaController@store')->name('casis.store');
    
    Route::get('/guru','AuthController@guru')->name('guru');
    Route::post('/login-guru','AuthController@loginGuru')->name('loginGuru');

    
    Route::get('/admin','AuthController@admin')->name('admin');
    Route::post('/login-admin','AuthController@loginAdmin')->name('loginAdmin');
});


// Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
//     // SISWA
//     Route::get('/', 'index');
//     Route::post('/login-siswa', 'loginSiswa');

//     Route::get('pendaftaran', [DataSiswaController::class, 'create']);
//     Route::post('pendaftaran', [DataSiswaController::class, 'store'])->name('casis.store');

//     // GURU
//     Route::get('/login-guru', 'guru');
//     Route::post('/login-guru', 'loginGuru');

//     // ADMIN
//     Route::get('/login-admin', 'admin');
//     Route::post('/login-admin', 'loginAdmin');
// });

Route::middleware(['auth'])->get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth:web'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/beranda', [AdminDashboardController::class, 'index']);

    Route::resource('tahun-ajarans', AdminTahunAjaranController::class);
    Route::resource('gurus', AdminGuruController::class);
    Route::resource('kategori-kelases', AdminKategoriKelasController::class);
    Route::resource('pelajarans', AdminPelajaranController::class);
    Route::resource('siswas', AdminSiswaController::class);
    Route::resource('kelases', AdminKelasController::class);

    // Route::prefix('/kelas')->name('kelas.')->group(function () {
    //     Route::get('/','KelasController@index')->name('index');
    //     Route::get('/create','KelasController@create')->name('create');
    //     Route::post('/store','KelasController@store')->name('store');
    //     Route::get('/{id}','KelasController@show')->name('show');
    //     Route::get('/{id}/edit','KelasController@edit')->name('edit');
    //     Route::post('{id}/update','KelasController@update')->name('update');
    //     Route::delete('/{id}/delete','KelasController@destroy')->name('delete');
    // });


    Route::resource('nilais', AdminNilaiController::class);
    Route::resource('jabatans', JabatanController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('guru-matpel', GuruMatpelController::class);
    Route::resource('pendaftarans', AdminPendaftaranController::class);
    Route::post('/pendaftaran/konfirmasi/{id}', [AdminPendaftaranController::class, 'konfirmasi']);

});

Route::middleware(['auth:karyawan'])->prefix('guru')->group(function () {
    Route::get('/beranda', [GuruDashboardController::class, 'index']);
    Route::get('/akun', [GuruDashboardController::class, 'akun']);
    Route::put('/akun/{id}', [GuruDashboardController::class, 'updatePass']);
    Route::get('/profile', [GuruDashboardController::class, 'show']);
    Route::get('/{id}/edit', [GuruDashboardController::class, 'edit']);
    Route::put('/update-profile/{id}', [GuruDashboardController::class, 'update']);
    
    Route::resource('nilais', GuruNilaiController::class);
    Route::resource('absens', GuruAbsenController::class);
    Route::post('/absen/fetch-siswa', [GuruAbsenController::class, 'fetchStudentData']);
    Route::resource('siswas', GuruSiswaController::class);
});

Route::middleware(['auth:siswa'])->prefix('siswa')->group(function () {
    Route::get('/', [SiswaDashboardController::class, 'index']);
    Route::get('/profile', [SiswaDashboardController::class, 'siswa']);
    Route::put('/profile/{id}', [SiswaDashboardController::class, 'update']);

    Route::get('/data-ortu', [SiswaLengkapController::class, 'ortu']);
    Route::match(['post', 'put'],'/data-ortu/update/{id}', [SiswaLengkapController::class, 'update_ortu']);

    Route::get('/data-tambahan', [SiswaLengkapController::class, 'tambahan']);
    Route::match(['post', 'put'],'/data-tambahan/update/{id}', [SiswaLengkapController::class, 'update_tambahan']);

    Route::get('/data-lengkap', [SiswaLengkapController::class, 'lengkap']);
    Route::match(['post', 'put'],'/data-lengkap/update/{id}', [SiswaLengkapController::class, 'update_lengkap']);

    Route::resource('nilais', SiswaNilaiController::class);
});

