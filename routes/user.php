<?php

use App\Http\Controllers\User\ApartmentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\InvoiceController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth','user']], function () {
    Route::post('/payment/{invoice}', [InvoiceController::class, 'payment'])->name('invoice.payment');
});
Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['auth','user','verified']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('user-rollback', [DashboardController::class, 'rollback'])->name('rollback');
    
    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::put('/update/password', [ProfileController::class, 'password'])->name('password');
        Route::post('/upload', [ProfileController::class, 'image'])->name('upload.image');
    });

    Route::group(['as' => 'invoice.', 'prefix' => 'invoice'], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('/payment_method', [InvoiceController::class, 'payment_method'])->name('payment_method');
        Route::Post('/storePaymentMethod', [InvoiceController::class, 'storePaymentMethod'])->name('storePaymentMethod');
        Route::get('/buy/{id}', [InvoiceController::class, 'buy'])->name('buy');
        Route::get('/cancel', [InvoiceController::class, 'cancel'])->name('cancel');
        Route::get('/active', [InvoiceController::class, 'active'])->name('active');
    });
    Route::get('notification', [DashboardController::class, 'notification'])->name('notification.index');
    Route::get('notification/{id}', [DashboardController::class, 'notificationshow'])->name('notification.show');

    Route::resource('apartment',ApartmentController::class);
});
