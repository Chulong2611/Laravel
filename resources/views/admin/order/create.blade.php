@extends('admin.layouts.admin')

@section('title', 'Thêm đơn hàng')

@section('content')
<h3 class="mb-4">Thêm đơn hàng mới</h3>

<form action="{{ route('admin.orders.store') }}" method="POST" class="w-50">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tên khách hàng</label>
        <input type="text" name="customer_name" class="form-control" required value="{{ old('customer_name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Số điện thoại</label>
        <input type="text" name="customer_phone" class="form-control" required value="{{ old('customer_phone') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Tổng tiền (VNĐ)</label>
        <input type="number" name="total_amount" class="form-control" min="0" required value="{{ old('total_amount') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Ngày đặt</label>
        <input type="date" name="order_date" class="form-control" required value="{{ old('order_date', date('Y-m-d')) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="status" class="form-select" required>
            <option value="">-- Chọn --</option>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Chờ xác nhận</option>
            <option value="shipping" {{ old('status') == 'shipping' ? 'selected' : '' }}>Vận chuyển</option>
            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
            <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Thất bại</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="{{ route('admin.orders') }}" class="btn btn-secondary ms-2">Quay lại</a>
</form>
@endsection
