<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminCompanyInfoController;
use App\Http\Controllers\Admin\AdmindbController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Agency\AgencyCompanyInfoController;
use App\Http\Controllers\Agency\AgencydbController;
use App\Http\Controllers\Agency\AgencyJobController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Page\AboutController;
use App\Http\Controllers\User\UserdbController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('app');
// });

Route::resource('/', AppController::class)->only('index');


// Guest Register & Login
Route::get('showregister', [AuthController::class, 'showregister'])->name('showregister')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('showlogin', [AuthController::class, 'showlogin'])->name('showlogin')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::put('changepassword', [AuthController::class, 'changepassword'])->name('changepassword')->middleware('auth');

// About Page
Route::resource('about', AboutController::class);

// Auth Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserdbController::class, 'dashboard'])->name('dashboard')->middleware('auth');
});

// Agency
Route::prefix('agency')->name('agency.')->middleware('isagency')->group(function () {
    Route::get('/dashboard', [AgencydbController::class, 'dashboard'])->name('dashboard');
    Route::resource('/companyinfo', AgencyCompanyInfoController::class);
    Route::resource('/job', AgencyJobController::class);
});

// Admin
Route::prefix('admin')->name('admin.')->middleware('isadmin')->group(function () {
    Route::get('/dashboard', [AdmindbController::class, 'dashboard'])->name('dashboard');
    Route::resource('/job', AdminJobController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/companyinfo', AdminCompanyInfoController::class);
    Route::resource('/about', AdminAboutController::class);
    Route::get('edit-job-status/{id}', [AdminJobController::class, 'edit_job_status'])->name('edit-job-status');
});
