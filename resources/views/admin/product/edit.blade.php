@extends('layouts.admin')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<h3 class="mb-4">Chỉnh sửa sản phẩm</h3>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="w-50">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="category_id" class="form-select">
            <option value="">-- Chọn danh mục --</option>
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.products') }}" class="btn btn-secondary ms-2">Quay lại</a>
</form>
@endsection