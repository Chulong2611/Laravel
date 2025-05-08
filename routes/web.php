<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



Route::prefix('')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('user.home');
});

Route::get('/login', function () {
    return view('user.login');
});





Route::view('admin/', 'admin.login')->name('login');

Route::post('admin/', function (Request $request) {
    $credentials = $request->only('name', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['name' => 'Thông tin đăng nhập sai']);
})->name('admin.login.submit');

Route::post('/logout', function () {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
})->name('admin.logout');

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    /**----------------------------------------------------------------- */

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    /**----------------------------------------------------------------- */

    /* user */
    Route::get('/users', [UserController::class, 'index'])->name('users');

    /*them user*/
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    /*sua user*/
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    /**xoa user*/
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    /**----------------------------------------------------------------- */


    /** category */
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    /**----------------------------------------------------------------- */


    /** product */
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');

    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    /**----------------------------------------------------------------- */


    /** order */
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});
