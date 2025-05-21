<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items'])->latest()->paginate(10);
        return view('admin.order.orders', compact('orders'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'total_amount' => 'required|numeric|min:0',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,shipping,completed,failed',
        ]);

        Order::create($request->all());
        

        return redirect()->route('admin.orders')->with('success', 'Thêm đơn hàng thành công!');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'total_amount' => 'required|numeric|min:0',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,shipping,completed,failed',
        ]);
        
        $order = Order::findOrFail($id);
        $order->update($request->all());
        

        return redirect()->route('admin.orders')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders')->with('success', 'Xoá đơn hàng thành công!');
    }
}
