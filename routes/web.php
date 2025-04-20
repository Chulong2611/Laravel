<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/users', 'admin.users')->name('users');
    Route::view('/products', 'admin.products')->name('products');
    Route::view('/orders', 'admin.orders')->name('orders');
});

