@extends('admin.layouts.admin')

@section('title', 'Chỉnh sửa đơn hàng')

@section('content')
<h3 class="mb-4">Chỉnh sửa đơn hàng</h3>


@if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" id="success-alert" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

<form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="w-50">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tên khách hàng</label>
        <input type="text" name="customer_name" class="form-control" required value="{{ old('customer_name', $order->customer_name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" name="customer_phone" class="form-control" required value="{{ old('customer_phone', $order->customer_phone) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Tổng tiền (VNĐ)</label>
        <input type="number" name="total_amount" class="form-control" min="0" required value="{{ old('total_amount', $order->total_amount) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Ngày đặt</label>
        <input type="date" name="order_date" class="form-control" required value="{{ old('order_date', $order->order_date->format('Y-m-d')) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="status" class="form-select" required>
            <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
            <option value="shipping" {{ old('status', $order->status) == 'shipping' ? 'selected' : '' }}>Vận chuyển</option>
            <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
            <option value="failed" {{ old('status', $order->status) == 'failed' ? 'selected' : '' }}>Thất bại</option>
        </select>
    </div>

    <input type="hidden" name="last_updated" value="{{ $order->updated_at->toISOString() }}">

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.orders') }}" class="btn btn-secondary ms-2">Quay lại</a>
</form>
@endsection
