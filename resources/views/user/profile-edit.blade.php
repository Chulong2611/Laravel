@extends('user.layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-success text-white fs-4">
                    Cập nhật thông tin
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Năm sinh</label>
                            <select name="birth_year" class="form-control">
                                <option value="">Chọn năm</option>
                                @for ($y = now()->year; $y >= 1900; $y--)
                                    <option value="{{ $y }}" {{ old('birth_year', $user->birth_year) == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        <a href="{{ route('user.profile') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
