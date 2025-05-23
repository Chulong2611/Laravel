@extends('admin.layouts.admin')

@section('title', 'Chỉnh sửa người dùng')

@section('content')
    <h3 class="mb-4">Edit user</h3>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-50">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" maxlength="20" pattern="[A-Za-z0-9]{1,20}"
            title="Tối đa 20 ký tự, chỉ chữ và số" value="{{ old('username', $user->username) }}" required>
        @error('username')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

        <div class="mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" name="fullname" class="form-control" maxlength="40"
            pattern="[A-Za-zÀ-ÿa-zA-Z\s]+"
            title="Tối đa 40 ký tự, chỉ chữ và khoảng trắng" value="{{ old('fullname', $user->fullname) }}" required>
        @error('fullname')
        <div style="color:red;">{{ $message }}</div>
        @enderror
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
        <input type="text" name="phone" class="form-control" maxlength="10"
            pattern="0[0-9]{9}"
            title="Bắt đầu bằng 0, có 10 chữ số" value="{{ old('phone', $user->phone) }}">
        @error('phone')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" maxlength="100" class="form-control"
        value="{{ old('password', $user->password) }}">
        @error('password')
        <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
@endsection
