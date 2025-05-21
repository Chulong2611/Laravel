@extends('admin.layouts.admin')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Danh sách đơn hàng</h3>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-success">
        <i class="fa fa-plus me-1"></i> Thêm đơn hàng
    </a>
</div>

<!--
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th class="text-center" style="width: 150px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->fullname ?? '-' }}</td>
                <td>{{ $order->user->phone ?? '-' }}</td>
                <td>{{ $order->order_date->format('d/m/Y') }}</td>
                <td>{{ number_format($order->total_amount) }}đ</td>
                <td> @switch($order->status)
            @case('pending')
                <span class="badge bg-warning text-dark">Đang xử lý</span>
                @break
            @case('shipping')
                <span class="badge bg-primary">Đang giao</span>
                @break
            @case('completed')
                <span class="badge bg-success">Hoàn tất</span>
                @break
            @case('failed')
                <span class="badge bg-danger">Thất bại</span>
                @break
        @endswitch</td>
        
        <td class="text-center">
            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i> Sửa
            </a>
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xoá đơn hàng này?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Xoá
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
-->
@foreach ($orders as $order)
<div class="card mb-4 mt-4">
    <div class="card-header bg-success text-white">
        Đơn hàng #{{ $order->id }} - {{ $order->created_at->format('d/m/Y H:i') }}
    </div>
    <div class="card-body">
        <p><strong>Người đặt:</strong> {{ $order->user->fullname }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->user->address }}</p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $product)
                <tr>
                    <td>{{ $product->product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}₫</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price * $product->quantity, 0, ',', '.') }}₫</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Tổng tiền:</strong></td>
                    <td><strong class="text-success">{{ number_format($order->total_amount, 0, ',', '.') }}₫</strong></td>
                </tr>
            </tbody>
            <tfoot>
                <td> Trạng thái: @switch($order->status)
            @case('pending')
                <span class="badge bg-warning text-dark">Đang xử lý</span>
                @break
            @case('shipping')
                <span class="badge bg-primary">Đang giao</span>
                @break
            @case('completed')
                <span class="badge bg-success">Hoàn tất</span>
                @break
            @case('failed')
                <span class="badge bg-danger">Thất bại</span>
                @break
        @endswitch</td>
                <td colspan="2" class="text-center">
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                </td>
                <td class="text-center">
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xoá đơn hàng này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </button>
                    </form>
                </td>
            </tfoot>
        </table>
    </div>
</div>
<hr>
@endforeach

@endsection