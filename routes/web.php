<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\DashboardController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/password/email', [AuthController::class, 'reset_password'])->name('password.email');
Route::post('/password/reset', [AuthController::class, 'reset_verify'])->name('password.update');

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::post('/contact', [DashboardController::class, 'contact_store'])->name('contact.store');
Route::get('/pricing', [DashboardController::class, 'pricing'])->name('pricing');

Route::get('/privacy', [DashboardController::class, 'privacy'])->name('privacy');
Route::get('/terms', [DashboardController::class, 'terms'])->name('terms');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/', 'as' => 'public.'], function () {
    Route::get('cron-jobs', [DashboardController::class, 'topCronJobs'])->name('cron-jobs');
});
Route::get('/sym', function () {
    File::link(storage_path('app/public'), public_path('storage'));
    return response()->json("Link Create Successfully!");
});

