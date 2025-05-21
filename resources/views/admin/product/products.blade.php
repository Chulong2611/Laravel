@extends('admin.layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Danh sách sản phẩm</h3>
    <a href="{{ route('admin.products.create') }}" class="btn btn-success">
        <i class="fa fa-plus me-1"></i> Thêm sản phẩm
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Mô tả</th>
                <th>hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th class="text-center" style="width: 150px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-height: 100px;"></td>
                <td>{{ number_format($product->price) }}đ</td>
                <td>{{ $product->quantity }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xoá?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            </form>
            </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection