<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;




Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/users', 'admin.users')->name('users');
    Route::view('/products', 'admin.products')->name('products');
    Route::view('/orders', 'admin.orders')->name('orders');
});



Route::prefix('')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user.home');
});

