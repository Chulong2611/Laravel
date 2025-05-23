@extends('admin.layouts.admin')

@section('title', 'Chỉnh sửa danh mục')

@section('content')
    <h3>Chỉnh sửa danh mục</h3>
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" id="success-alert" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="w-50">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

            <input type="hidden" name="last_updated" value="{{ $category->updated_at->toISOString() }}">
        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
