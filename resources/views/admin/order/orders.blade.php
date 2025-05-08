@extends('admin.layouts.admin')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Danh sách đơn hàng</h3>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-success">
        <i class="fa fa-plus me-1"></i> Thêm đơn hàng
    </a>
</div>

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
                <td>{{ $order->customer_name ?? '-' }}</td>
                <td>{{ $order->customer_phone ?? '-' }}</td>
                <td>{{ $order->order_date->format('d/m/Y') }}</td>
                <td>{{ number_format($order->total_amount) }}đ</td>
                <td><!--{{ $order->status ?? '-' }}--> @switch($order->status)
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
@endsection
