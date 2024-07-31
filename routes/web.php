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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('icdx', ICDXController::class);
Route::resource('dokter', DokterController::class);
Route::resource('perawat', PerawatController::class);
Route::resource('obat', ObatController::class);

Route::any('user-reset-password/{id}', [UserController::class, 'userPassword'])->name('users.reset');

Route::post('user-reset-password/{id}', [UserController::class, 'userPasswordReset'])->name('user.password.update');


Route::get('dashboard', [DashboardController::class, 'clientView'])->name('client.dashboard.view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
