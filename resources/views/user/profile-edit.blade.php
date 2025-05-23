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

                        <!-- Fullname -->
                        <div class="mb-3">
                            <label class="form-label">Họ tên</label>
                            <input type="text" name="fullname" class="form-control"
                                value="{{ old('fullname', $user->fullname) }}"
                                maxlength="40"
                                pattern="[\p{L}\s]+"
                                title="Tối đa 40 ký tự, chỉ chữ và khoảng trắng"
                                required>
                            @error('fullname')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}"
                                maxlength="30"
                                pattern=".{1,30}"
                                title="Email tối đa 30 ký tự và phải có @"
                                required>
                            @error('email')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $user->phone) }}"
                                maxlength="10"
                                pattern="^0(?!0{9}$)[0-9]{9}$"
                                title="Bắt đầu bằng 0, đủ 10 chữ số, không phải toàn số 0"
                                required>
                            @error('phone')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Birth Year -->
                        <div class="mb-3">
                            <label class="form-label">Năm sinh</label>
                            <select name="birth_year" class="form-control">
                                <option value="">Chọn năm</option>
                                @for ($y = now()->year; $y >= 1900; $y--)
                                <option value="{{ $y }}" {{ old('birth_year', $user->birth_year) == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control"
                                value="{{ old('address', $user->address) }}"
                                required>
                            @error('address')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror

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