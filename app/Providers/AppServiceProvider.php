<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\Favourite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        
        //lay danh sach categories
        View::composer('user.layouts.header', function ($view) {
            $view->with('categories', Category::all());
        });

         //hien thi so luong san pham yeu thich/ gio hang
        View::composer('user.layouts.*', function ($view) {
            $cartCount = 0;
            $favoriteCount = 0;

            if (Auth::check()) {
                $cartCount = CartItem::where('user_id', Auth::id())->count();
                $favoriteCount = Favourite::where('user_id', Auth::id())->count();
            }

            $view->with([
                'cartCount' => $cartCount,
                'favoriteCount' => $favoriteCount,
            ]);
        });
    }
}
