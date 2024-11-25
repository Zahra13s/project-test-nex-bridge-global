<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CreateController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\UpdateController;
use App\Http\Controllers\User\RedirectController;

Route::middleware('user')->prefix('user')->group(function () {
    Route::get('/profile', [RedirectController::class, 'userProfilePage'])->name('userProfilePage');
    Route::get('/product', [RedirectController::class, 'productPage'])->name('productPage');
    Route::get('/product/details/{id}', [RedirectController::class, 'productDetailsPage'])->name('productDetailsPage');
    Route::get('/cart', [RedirectController::class, 'cartPage'])->name('cartPage');
    Route::get('/order', [RedirectController::class, 'orderPage'])->name('orderPage');

    Route::post('/cart/add', [CreateController::class, 'add'])->name('cartAdd');

    Route::put('/profile/update', [UpdateController::class, 'update'])->name('profileUpdate');
    Route::put('cart/{cartItemId}', [UpdateController::class, 'updateCart'])->name('cart.update');

    Route::delete('/profile/delete', [DeleteController::class, 'destroy'])->name('profileDelete');





});
