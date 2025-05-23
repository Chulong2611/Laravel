<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//phan admin
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

//phan user
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\FavouriteController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\CheckoutController;

// ----------- PHAN USER ------------------


Route::prefix('')->group(function () {
    // Trang chủ user
    Route::get('/', [HomeController::class, 'index'])->name('user.home');

    // Đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Đăng ký
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    // Đăng xuất (user)
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('user.home');
    })->name('logout');

    //search
    Route::get('/search', [HomeController::class, 'search'])->name('search');

    // Product
    Route::get('/products', [UserProductController::class, 'index'])->name('products');
    Route::get('/product/{id}', [UserProductController::class, 'show'])->name('product.show');


});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {

    //thong tin ca nhan
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');

    //doi mk
    Route::get('/change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [UserProfileController::class, 'changePassword'])->name('password.update');

     // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    // Favourites
    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites');
    Route::post('/favourites/add/{product}', [FavouriteController::class, 'add'])->name('favourites.add');
    Route::delete('/favourites/remove/{product}', [FavouriteController::class, 'remove'])->name('favourites.remove');



    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

});





// ----------- PHAN ADMIN ------------------

Route::view('admin/', 'admin.login')->name('admin.login');

Route::post('admin/', function (Request $request) {
    $credentials = $request->only('name', 'password');
    
    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }
    
    return back()->withErrors(['name' => 'Thông tin đăng nhập sai']);
})->name('admin.login.submit');


Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    })->name('logout');
    /**----------------------------------------------------------------- */

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

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
