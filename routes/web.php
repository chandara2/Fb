<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserDashboard;
use App\Http\Controllers\Admin\AdmindbController;
use App\Http\Controllers\Admin\AdminFbController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Supervisor\SupervisorDashboard;
use App\Http\Controllers\Supervisor\SupervisorFbController;
use App\Http\Controllers\Supervisor\SupervisorUserController;
use App\Http\Controllers\User\UserFbController;
use App\Http\Controllers\User\UserUserController;

// Guest Login & Auth Logout
Route::get('/', [AuthController::class, 'showlogin'])->name('showlogin')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');
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

    Route::resource('/user', SupervisorUserController::class)->only(['index']);
    Route::get('/userfetch', [SupervisorUserController::class, 'userfetch'])->name('userfetch');
    Route::get('/useredit', [SupervisorUserController::class, 'useredit'])->name('useredit');
    Route::post('/userupdate', [SupervisorUserController::class, 'userupdate'])->name('userupdate');

    Route::resource('/fb', SupervisorFbController::class)->only(['index', 'store']);
    Route::get('/fbfetch', [SupervisorFbController::class, 'fbfetch'])->name('fbfetch');
    Route::get('/fbedit', [SupervisorFbController::class, 'fbedit'])->name('fbedit');
    Route::post('/fbupdate', [SupervisorFbController::class, 'fbupdate'])->name('fbupdate');
    Route::delete('/fbdelete', [SupervisorFbController::class, 'fbdelete'])->name('fbdelete');
});

// User Dashboard
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'dashboard'])->name('dashboard')->middleware('auth');

    Route::resource('/user', UserUserController::class)->only(['index']);
    Route::get('/userfetch', [UserUserController::class, 'userfetch'])->name('userfetch');
    Route::get('/useredit', [UserUserController::class, 'useredit'])->name('useredit');
    Route::post('/userupdate', [UserUserController::class, 'userupdate'])->name('userupdate');

    Route::resource('/fb', UserFbController::class)->only(['index', 'store']);
    Route::get('/fbfetch', [UserFbController::class, 'fbfetch'])->name('fbfetch');
    Route::get('/fbedit', [UserFbController::class, 'fbedit'])->name('fbedit');
    Route::post('/fbupdate', [UserFbController::class, 'fbupdate'])->name('fbupdate');
    Route::delete('/fbdelete', [UserFbController::class, 'fbdelete'])->name('fbdelete');
});
