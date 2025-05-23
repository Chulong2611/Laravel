@extends('admin.layouts.admin')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh sách người dùng</h3>
        <a href="{{ route('admin.user.create') }}" class="btn btn-success">
    <i class="fa fa-plus me-1"></i> Thêm người dùng
</a>
    </div>
 @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th class="text-center" style="width: 150px;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username ?? '-' }}</td>
                        <td>{{ $user->fullname ?? '-' }}</td>
                        <td>{{ $user->birth_year ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td>{{ $user->phone ?? '-' }}</td>
                        <td class="text-center">
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary me-1">
        <i class="fa fa-edit"></i> Sửa
    </a>
    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xác nhận xoá?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            <i class="fa fa-trash"></i> Xoá
        </button>
    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Phân trang --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
