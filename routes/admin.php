<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CreateController;
use App\Http\Controllers\Admin\DeleteController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\Admin\RedirectController;

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/profile', [RedirectController::class, 'adminProfilePage'])->name('adminProfilePage');
    Route::get('categories/page', [RedirectController::class, 'categoriesPage'])->name('categoriesPage');
    Route::get('products/page', [RedirectController::class, 'productsPage'])->name('productsPage');

    Route::post('category/add', [CreateController::class, 'addCategory'])->name('addCategory');
    Route::post('product/add', [CreateController::class, 'addProduct'])->name('addProduct');

    Route::post('update/category', [UpdateController::class, 'updateCategory'])->name('updateCategory');
    Route::post('update/product', [UpdateController::class, 'updateProduct'])->name('updateProduct');

    Route::delete('/product/{id}', [DeleteController::class, 'deleteProduct'])->name('deleteProduct');
});
