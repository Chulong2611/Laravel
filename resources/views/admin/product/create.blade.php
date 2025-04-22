@extends('layouts.admin')

@section('title', 'Thêm sản phẩm')

@section('content')
<h3 class="mb-4">Thêm sản phẩm mới</h3>

<form action="{{ route('admin.products.store') }}" method="POST" class="w-50">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="category_id" class="form-select">
            <option value="">-- Chọn danh mục --</option>
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                {{ e($cat->name) }}
            </option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label class="form-label">Giá (VNĐ)</label>
        <input type="number" name="price" class="form-control" min="0" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="quantity" class="form-control" min="0" value="{{ old('quantity') }}">
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="{{ route('admin.products') }}" class="btn btn-secondary ms-2">Quay lại</a>
</form>
@endsection