<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ICDXController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\WilayahIndonesiaController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'regional'], function () {
    Route::get('provinsi', [WilayahIndonesiaController::class, 'provinsi'])->name('regional.provinsi');
    Route::get('kabupaten', [WilayahIndonesiaController::class, 'kabupatenKota'])->name('regional.kota');
    Route::get('kecamatan', [WilayahIndonesiaController::class, 'kecamatan'])->name('regional.kecamatan');
    Route::get('desa', [WilayahIndonesiaController::class, 'kelurahanDesa'])->name('regional.desa');
    ;
});

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('icdx', ICDXController::class);
Route::resource('dokter', DokterController::class);
Route::resource('perawat', PerawatController::class);
Route::resource('obat', ObatController::class);
Route::resource('pasien', PasienController::class);

Route::any('user-reset-password/{id}', [UserController::class, 'userPassword'])->name('users.reset');

Route::post('user-reset-password/{id}', [UserController::class, 'userPasswordReset'])->name('user.password.update');


Route::get('dashboard', [DashboardController::class, 'clientView'])->name('client.dashboard.view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
