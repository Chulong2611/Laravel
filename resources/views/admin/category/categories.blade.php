@extends('admin.layouts.admin')

@section('title', 'Danh sách danh mục')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Danh sách danh mục</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success"><i class="fa fa-plus me-1"></i> Thêm danh mục</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th style="width: 200px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Xoá?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Xoá</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $categories->links() }}
@endsection