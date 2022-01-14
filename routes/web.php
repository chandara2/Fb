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
Route::put('changepassword', [AuthController::class, 'changepassword'])->name('changepassword')->middleware('auth');

// Auth Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserdbController::class, 'dashboard'])->name('dashboard')->middleware('auth');
});

// Agency
Route::prefix('agency')->name('agency.')->group(function () {
    Route::get('/dashboard', [AgencydbController::class, 'dashboard'])->name('dashboard')->middleware('auth');
});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdmindbController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/job', [AdmindbController::class, 'job'])->name('job');
    Route::get('/user', [AdmindbController::class, 'user'])->name('user');
    Route::post('/createnewuser', [AdmindbController::class, 'createnewuser'])->name('createnewuser');
    Route::get('/usergetid/{id}', [AdmindbController::class, 'usergetid'])->name('usergetid')->middleware('auth');
});
