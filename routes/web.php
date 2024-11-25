<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

require __DIR__.'/admin.php';
require __DIR__.'/user.php';

Route::get('/', [AuthenticationController::class, 'loginPage'])->name('loginPage');
Route::get('/register/page', [AuthenticationController::class, 'registerPage'])->name('registerPage');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
