@extends('admin.layouts.admin')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh sách đơn hàng</h3>
        <a href="#" class="btn btn-success">
            <i class="fa fa-plus me-1"></i> Tạo đơn hàng
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th class="text-center" style="width: 150px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>5001</td>
                    <td>Nguyễn Văn A</td>
                    <td>2024-04-01</td>
                    <td><span class="badge bg-warning text-dark">Đang xử lý</span></td>
                    <td>180,000đ</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-info me-1">
                            <i class="fa fa-eye"></i> Xem
                        </a>
                        <a href="#" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xoá
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>5002</td>
                    <td>Lê Thị B</td>
                    <td>2024-04-02</td>
                    <td><span class="badge bg-success">Hoàn thành</span></td>
                    <td>90,000đ</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm btn-info me-1">
                            <i class="fa fa-eye"></i> Xem
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
