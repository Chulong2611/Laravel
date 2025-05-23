<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;

class CategoriesController extends Controller
{
    public function index()
    {
       $categories = Category::all();
        return view('user.all-cate', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all(); // Để hiển thị danh sách bên sidebar

        // Lấy sản phẩm thuộc danh mục được chọn
        $products = $category->products()->latest()->paginate(12);

        return view('user.cate-products', compact('categories', 'products', 'category'));
    }
}
