<?php

use App\Http\Controllers\Admin\PricePlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LoginLogController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // user Route
    Route::resource('user', UserController::class);
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('user/search', [UserController::class, 'search'])->name('user.search');
    Route::post('user/active', [UserController::class, 'active'])->name('user.active');
    Route::get('user/login/{id}', [UserController::class, 'login'])->name('user.login');
    Route::post('user/bulk-action', [UserController::class, 'bulkAction'])->name('user.bulk-action');
    Route::get('user/login/{id}', [UserController::class, 'login'])->name('user.login');


    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::put('/update/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/upload', [ProfileController::class, 'image'])->name('upload.image');
    });

    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::group(['as' => 'general.', 'prefix' => 'general'], function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::put('update', [SettingController::class, 'update'])->name('update');
        });
        Route::get('appearance', [SettingController::class, 'appearance'])->name('appearance');
        Route::put('appearance', [SettingController::class, 'appearanceUpdate'])->name('appearance.update');
        Route::get('smtp', [SettingController::class, 'smtp'])->name('smtp');
        Route::put('smtp', [SettingController::class, 'smtpUpdate'])->name('smtp.update');
        Route::get('question', [SettingController::class, 'question'])->name('question');
        Route::post('question', [SettingController::class, 'questionStore'])->name('question.store');
        Route::get('delete/question/{id}', [SettingController::class, 'questionDelete'])->name('question.delete');
    });

    Route::resource('notification', NotificationController::class);
    Route::get('delete/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');

    Route::get('login-log', [LoginLogController::class, 'index'])->name('loginlog.index');

    Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('delete');
        Route::get('show/{id}', [ContactController::class, 'show'])->name('show');
    });

    Route::group(['as' => 'apartment.', 'prefix' => 'apartment'], function () {
        Route::get('/', [ApartmentController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ApartmentController::class, 'delete'])->name('delete');
        Route::get('show/{id}', [ApartmentController::class, 'show'])->name('show');
        Route::Post('status/{id}', [ApartmentController::class, 'status'])->name('status');
    });
    Route::group(['as' => 'invoice.', 'prefix' => 'invoice'], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('approve/{id}', [InvoiceController::class, 'approve'])->name('approve');
        Route::get('cancel/{id}', [InvoiceController::class, 'cancel'])->name('cancel');
    });



    // price plan route
    Route::resource('price-plan', PricePlanController::class);
});
