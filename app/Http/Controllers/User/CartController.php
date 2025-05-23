<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /** @var \App\Models\User $user **/
    public function index()
    {
        $items = CartItem::with('product')->where('user_id', Auth::id())->get();
        return view('user.cart', compact('items'));
    }

    /*public function add(Product $product)
    {
        $item = CartItem::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            ['quantity' => 1]
        );
        $item->increment('quantity');
        return back()->with('success', 'Đã thêm vào giỏ hàng');
    }*/

    public function add(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $user = Auth::user();

    // Số lượng yêu cầu (mặc định là 1 nếu không có)
    $quantity = $request->input('quantity', 1);

    // Kiểm tra số lượng đã có trong giỏ
    $existing = CartItem::where('user_id', $user->id)
        ->where('product_id', $productId)
        ->first();

    $existingQty = $existing ? $existing->quantity : 0;
    $totalAfterAdd = $existingQty + $quantity;

    if ($totalAfterAdd > $product->quantity) {
        return back()->with('error', 'Không thể thêm quá số lượng tồn kho hiện có.');
    }

    if ($existing) {
        $existing->quantity += $quantity;
        $existing->save();
    } else {
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    return back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
}

    public function update(Request $request, $productId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($productId);
    $cartItem = CartItem::where('user_id', Auth::id())
        ->where('product_id', $productId)
        ->firstOrFail();

    if ($request->quantity > $product->quantity) {
        return back()->with('error', 'Số lượng vượt quá tồn kho.');
    }

    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return back()->with('success', 'Cập nhật số lượng thành công.');
}

    public function remove(Product $product)
    {
        CartItem::where('user_id', Auth::id())->where('product_id', $product->id)->delete();
        return back()->with('success', 'Đã xoá ' .$product->name. ' khỏi giỏ hàng');
    }
}
