<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm mới nhất (giới hạn 8 sản phẩm)
        $products = Product::latest()->take(8)->get();

        //test
        $newProducts = Product::inRandomOrder()->take(8)->get(); // Tạm thời giả lập

        return view('user.home', compact('newProducts'));
    }
}
