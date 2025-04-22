<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->only(['name', 'category_id', 'price', 'quantity']));

        return redirect()->route('admin.products')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('admin.product.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'nullable|string|max:100',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ]);

    $product = Product::findOrFail($id);
    $product->update($request->only(['name', 'category_id', 'price', 'quantity']));

    return redirect()->route('admin.products')->with('success', 'Cập nhật sản phẩm thành công!');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products')->with('success', 'Đã xoá sản phẩm');
}
}

