<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;

class UserProductController extends Controller
{
    public function index(Request $request)
    {

        $query = Product::query();

        // Lọc theo danh mục nếu có
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Sắp xếp nếu có
        if ($request->has('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }
        // Lấy danh sách sản phẩm mới nhất (giới hạn 12 sản phẩm)
        $products = $query->paginate(12);
        $categories = Category::all(); 

        return view('user.products.product-list', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('user.products.detail', compact('product'));
    }
}
