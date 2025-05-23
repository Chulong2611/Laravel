<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::inRandomOrder()->take(8)->get(); // Tạm thời giả lập

        $categories = Category::latest()->take(10)->get();

        //lay het danh sach danh muc 
         $cateProducts = Category::with(['products' => function ($q) {
        $q->take(15); // lấy 15 sản phẩm mỗi danh mục
        }])->inRandomOrder()->take(3)->get();


        return view('user.home', compact('newProducts', 'categories', 'cateProducts'));
    }

    public function search(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->get();

        return view('user.search-results', compact('products'));
    }
}
