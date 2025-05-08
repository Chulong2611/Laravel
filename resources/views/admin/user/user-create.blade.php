@extends('admin.layouts.admin')

@section('title', 'Thêm người dùng')

@section('content')
    <h3 class="mb-4">Thêm người dùng mới</h3>

    <form action="{{ route('admin.user.store') }}" method="POST" class="w-50">
        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" required>
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
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
