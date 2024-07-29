<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::any('user-reset-password/{id}', [UserController::class, 'userPassword'])->name('users.reset');

Route::post('user-reset-password/{id}', [UserController::class, 'userPasswordReset'])->name('user.password.update');


Route::get('dashboard', [DashboardController::class, 'clientView'])->name('client.dashboard.view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
