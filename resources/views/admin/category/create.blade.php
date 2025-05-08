@extends('admin.layouts.admin')

@section('title', 'Thêm danh mục')

@section('content')
    <h3>Thêm danh mục</h3>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="w-50">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
