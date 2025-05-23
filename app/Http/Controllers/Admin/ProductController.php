<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.product.products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $categoryId = $request->only('category_id');

            // Kiểm tra lại xem danh mục có tồn tại không ngay trước khi tạo
            $category = Category::find($categoryId);
            if (!$category) {
                return redirect()->back()->with(['error' => 'Danh mục đã bị xóa. Vui lòng chọn danh mục khác.'])->withInput();
            }

            $request->validate([
                'name' => 'required',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
            ]);

            $data = $request->only(['name', 'category_id', 'price', 'description', 'quantity']);

            // Upload hình ảnh
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('products', 'public');
            }



            Product::create($data);

            DB::commit();
            return redirect()->route('admin.products')->with('success', 'Thêm sản phẩm ' . $data['name'] . ' thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Đã có lỗi xảy ra: danh mục không tồn tại'])->withInput();
        }
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
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);

        $product = Product::findOrFail($id);

        // Kiểm tra xung đột
        if ($request->input('last_updated') !== $product->updated_at->toISOString()) {
            return redirect()->back()->with(['error' => 'Nội dung sản phẩm đã được thay đổi. Vui lòng thao tác lại.'])->withInput();
        }


        // Nếu có ảnh mới thì xử lý thay ảnh cũ
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Cập nhật các trường còn lại
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $product->image,
        ]);

        return redirect()->route('admin.products')->with('success', 'Cập nhật thông tin ' . $product->name . ' thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Đã xoá sản phẩm ' . $product->name);
    }
}
