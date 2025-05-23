@extends('admin.layouts.admin')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<h3 class="mb-4">Chỉnh sửa sản phẩm</h3>

@if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" id="success-alert" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="w-50" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="category_id" class="form-select" required>
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
        <label class="form-label">Mô tả</label>
        <input type="text" name="description" class="form-control" value="{{ $product->description }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
    </div>

    <div class="mb-3">
        <label>Ảnh hiện tại:</label><br>
    <img src="{{ asset('storage/' . $product->image) }}" width="150">
    <br>
    <label>Chọn ảnh mới (nếu cần):</label>
    <input type="file" name="image" class="form-control">

    </div>

    <input type="hidden" name="last_updated" value="{{ $product->updated_at->toISOString() }}">


    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('admin.products') }}" class="btn btn-secondary ms-2">Quay lại</a>
</form>
@endsection