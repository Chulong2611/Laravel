<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm mới nhất (giới hạn 8 sản phẩm)
        $products = Product::latest()->take(8)->get();

        //test
        $newProducts = Product::inRandomOrder()->take(8)->get(); // Tạm thời giả lập


       

        return view('user.home', compact('newProducts',  ));
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
