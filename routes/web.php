<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserDashboard;
use App\Http\Controllers\Admin\AdmindbController;
use App\Http\Controllers\Admin\AdminFbController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Supervisor\SupervisorDashboard;


// Guest Register & Login
Route::get('showregister', [AuthController::class, 'showregister'])->name('showregister')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('/', [AuthController::class, 'showlogin'])->name('showlogin')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::put('changepassword', [AuthController::class, 'changepassword'])->name('changepassword')->middleware('auth');

// Auth Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Dashboard
Route::prefix('admin')->name('admin.')->middleware('isadmin')->group(function () {
    Route::get('/dashboard', [AdmindbController::class, 'dashboard'])->name('dashboard');

    Route::resource('/user', AdminUserController::class)->only(['index', 'store']);
    Route::get('/userfetch', [AdminUserController::class, 'userfetch'])->name('userfetch');
    Route::get('/useredit', [AdminUserController::class, 'useredit'])->name('useredit');
    Route::post('/userupdate', [AdminUserController::class, 'userupdate'])->name('userupdate');
    Route::delete('/userdelete', [AdminUserController::class, 'userdelete'])->name('userdelete');

    Route::resource('/fb', AdminFbController::class)->only(['index', 'store']);
    Route::get('/fbfetch', [AdminFbController::class, 'fbfetch'])->name('fbfetch');
    Route::get('/fbedit', [AdminFbController::class, 'fbedit'])->name('fbedit');
    Route::post('/fbupdate', [AdminFbController::class, 'fbupdate'])->name('fbupdate');
    Route::delete('/fbdelete', [AdminFbController::class, 'fbdelete'])->name('fbdelete');
});

// Suprevisor Dashboard
Route::prefix('supervisor')->name('supervisor.')->middleware('issupervisor')->group(function () {
    Route::get('/dashboard', [SupervisorDashboard::class, 'dashboard'])->name('dashboard');
});

// User Dashboard
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'dashboard'])->name('dashboard')->middleware('auth');
});

// Switch multi language
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
