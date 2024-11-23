<?php

use App\Http\Controllers\client\AccountController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Client

Route::get('/login', [AccountController::class, 'login'])->name('login');
Route::get('/verify-account/{email}', [AccountController::class, 'verify_account'])->name('verify.account');
Route::post('/login', [AccountController::class, 'loginSubmit'])->name('loginSubmit');

Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::post('/register', [AccountController::class, 'registerSubmit'])->name('registerSubmit');

Route::get('/forgot-password', [AccountController::class, 'forgot_password'])->name('account.forgot_password');
Route::post('/forgot-password', [AccountController::class, 'check_forgot_password']);

Route::get('/reset-password/{token}', [AccountController::class, 'reset_password'])->name('account.reset_password');
Route::post('/reset-password/{token}', [AccountController::class, 'check_reset_password']);

Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
