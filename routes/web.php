<?php

use App\Http\Controllers\Admin\AdmindbController;
use App\Http\Controllers\Agency\AgencydbController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserdbController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

// Guest Register & Login
Route::get('showregister', [AuthController::class, 'showregister'])->name('showregister')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('showlogin', [AuthController::class, 'showlogin'])->name('showlogin')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');

// Auth Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User
Route::get('userdb', [UserdbController::class, 'userdb'])->name('userdb')->middleware('auth');

// Agency
Route::get('agencydb', [AgencydbController::class, 'agencydb'])->name('agencydb')->middleware('auth');

// Admin
Route::get('admindb', [AdmindbController::class, 'admindb'])->name('admindb')->middleware('auth');
