@extends('layouts.admin')

@section('title', 'Danh sách người dùng')

@section('content')
    <!--tieu de va nut them du lieu-->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh sách người dùng</h3>
        <a href="#" class="btn btn-success">
            <i class="fa fa-plus me-1"></i> Thêm người dùng
        </a>
    </div>


    <!--bang du lieu-->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <!--thuoc tinh cua cot-->
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>SĐT</th>
                    <th class="text-center" style="width: 150px;">Thao tác</th>
                </tr>
            </thead>
            <!--du lieu trong cot-->
            <tbody>
                {{-- Dữ liệu mẫu tạm thời --}}
                <tr>
                    <td>1</td>
                    <td>nguyenvan01</td>
                    <td>Nguyễn Văn A</td>
                    <td>1995</td>
                    <td>0901234567</td>
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
                    <td>2</td>
                    <td>lethib02</td>
                    <td>Lê Thị B</td>
                    <td>2000</td>
                    <td>0912345678</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-primary me-1">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </a>
                    </td>
                </tr>
                {{-- Thêm dòng khác sau --}}
            </tbody>
        </table>
    </div>
@endsection
