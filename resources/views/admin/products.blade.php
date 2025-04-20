@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh sách sản phẩm</h3>
        <a href="#" class="btn btn-success">
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
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th class="text-center" style="width: 150px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Rau cải xanh</td>
                    <td>Rau củ</td>
                    <td>15,000đ</td>
                    <td>120</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-primary me-1">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Nước ép táo</td>
                    <td>Nước ép</td>
                    <td>25,000đ</td>
                    <td>85</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-primary me-1">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
