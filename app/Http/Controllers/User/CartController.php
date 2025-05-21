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

    public function add($productId)
    {
        $item = CartItem::where('user_id',  Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'user_id' =>  Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function update(Request $request, Product $product)
    {
        $item = CartItem::where('user_id', Auth::id())->where('product_id', $product->id)->first();
        if ($item) {
            $item->update(['quantity' => $request->quantity]);
            return back()->with('success', "Cập nhật số lượng của '{$product->name}' thành công");
        }
        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng');
    }

    public function remove(Product $product)
    {
        CartItem::where('user_id', Auth::id())->where('product_id', $product->id)->delete();
        return back()->with('success', 'Đã xoá khỏi giỏ hàng');
    }
}
