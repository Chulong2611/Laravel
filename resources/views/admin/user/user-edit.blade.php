@extends('admin.layouts.admin')

@section('title', 'Chỉnh sửa người dùng')

@section('content')
    <h3 class="mb-4">Edit user</h3>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}">
        </div>

        <div class="mb-3">
    <label class="form-label">Năm sinh</label>
    <select name="birth_year" class="form-select">
        <option value="">-- Chọn năm sinh --</option>
        @for ($year = now()->year; $year >= 1900; $year--)
            <option value="{{ $year }}" {{ old('birth_year', $user->birth_year ?? '') == $year ? 'selected' : '' }}>
                {{ $year }}
            </option>
        @endfor
    </select>
</div>

        <div class="mb-3">
            <label class="form-label">SĐT</label>
            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
