<?php

use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminCareerResourceController;
use App\Http\Controllers\Admin\AdminCompanyInfoController;
use App\Http\Controllers\Admin\AdminCvController;
use App\Http\Controllers\Admin\AdmindbController;
use App\Http\Controllers\Admin\AdminFooterController;
use App\Http\Controllers\Admin\AdminHomepageController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Agency\AgencyCompanyInfoController;
use App\Http\Controllers\Agency\AgencydbController;
use App\Http\Controllers\Agency\AgencyJobController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Page\AboutController;
use App\Http\Controllers\Page\CareerController;
use App\Http\Controllers\Page\CompanyController;
use App\Http\Controllers\Page\JobController;
use App\Http\Controllers\User\UserdbController;
use Illuminate\Support\Facades\Route;

// Website home page
Route::resource('/', AppController::class)->only('index');

// Job page
Route::resource('job', JobController::class);
Route::get('/jobsort/{jobshow}', [JobController::class, 'jobsort'])->where('jobshow', '.*'); //Prevent error with slash and more...
Route::get('searchjob', [JobController::class, 'searchjob'])->name('searchjob');

// About page
Route::resource('about', AboutController::class)->only('index');

// Career page
Route::resource('career', CareerController::class);

// Company page
Route::resource('company', CompanyController::class);

// Guest Register & Login
Route::get('showregister', [AuthController::class, 'showregister'])->name('showregister')->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('showlogin', [AuthController::class, 'showlogin'])->name('showlogin')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::put('changepassword', [AuthController::class, 'changepassword'])->name('changepassword')->middleware('auth');

// Change Password
Route::post('changepassword', [AuthController::class, 'changepassword'])->name('changepassword')->middleware('auth');

// Auth Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Dashboard
Route::prefix('admin')->name('admin.')->middleware('isadmin')->group(function () {
    Route::get('/dashboard', [AdmindbController::class, 'dashboard'])->name('dashboard');
    Route::resource('/job', AdminJobController::class);
    Route::resource('/user', AdminUserController::class);
    Route::get('/fetchuser', [AdminUserController::class, 'fetchuser'])->name('fetchuser');
    Route::resource('/companyinfo', AdminCompanyInfoController::class);
    Route::resource('/about', AdminAboutController::class);
    Route::get('/changejobstatus', [AdminJobController::class, 'changejobstatus'])->name('changejobstatus');
    Route::resource('/homepage', AdminHomepageController::class)->only(['index', 'store', 'destroy']);
    Route::post('/partner', [AdminHomepageController::class, 'partnerstore'])->name('partner.store');
    Route::delete('/partner/{partner}', [AdminHomepageController::class, 'partnerdestroy'])->name('partner.destroy');
    Route::resource('/footer', AdminFooterController::class);
    Route::post('/footersm', [AdminFooterController::class, 'footersm_store'])->name('footersm.store');
    Route::delete('/footersm/{footersm}', [AdminFooterController::class, 'footersm_destroy'])->name('footersm.destroy');
    Route::post('/footerqrcode', [AdminFooterController::class, 'footerqrcode_store'])->name('footerqrcode.store');
    Route::delete('/footerqrcode/{footerqrcode}', [AdminFooterController::class, 'footerqrcode_destroy'])->name('footerqrcode.destroy');
    Route::resource('/career', AdminCareerResourceController::class);
    Route::resource('/cv', AdminCvController::class);
});

// Agency Dashboard
Route::prefix('agency')->name('agency.')->middleware('isagency')->group(function () {
    Route::get('/dashboard', [AgencydbController::class, 'dashboard'])->name('dashboard');
    Route::resource('/companyinfo', AgencyCompanyInfoController::class);
    Route::resource('/job', AgencyJobController::class);
});

// User Dashboard
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserdbController::class, 'dashboard'])->name('dashboard')->middleware('auth');
});

// Switch multi language
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
