@extends('layouts.admin')

@section('title', 'Chỉnh sửa danh mục')

@section('content')
    <h3>Chỉnh sửa danh mục</h3>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="w-50">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
