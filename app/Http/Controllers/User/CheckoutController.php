<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = CartItem::with('product')->where('user_id', Auth::id())->get();
        $totalAmount = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('user.checkout', compact('items'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
        ]);

        $items = CartItem::with('product')->where('user_id', Auth::id())->get();
        if ($items->isEmpty()) {
            return back()->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        DB::transaction(function () use ($request, $items) {
            $user = Auth::user();

            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $items->sum(fn($item) => $item->product->price * $item->quantity),
                'status' => 'pending',
                'phone' => $user->phone,
                'address' => $request->address,
                'order_date' => Carbon::now(),
            ]);

            foreach ($items as $item) {
                $product = $item->product;
                if ($product->quantity < $item->quantity) {
                    throw new \Exception("Sản phẩm '{$product->name}' không đủ số lượng trong kho.");
                }

                $product->decrement('quantity', $item->quantity);

                $order->items()->create([
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $item->quantity
                ]);
            }

            CartItem::where('user_id', $user->id)->delete();
        });


        return redirect()->route('user.checkout')->with('success', 'Đặt hàng thành công!');
    }
}
