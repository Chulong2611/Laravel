@extends('user.layouts.app')

@section('content')
<div class="container mt-5 mb-5" style="max-width: 700px;">
    <div class="card shadow rounded-3">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Đổi mật khẩu</h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('user.password.update') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                    <input type="password" name="current_password" id="current_password"
                           class="form-control @error('current_password') is-invalid @enderror" required>
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                    <input type="password" name="new_password" id="new_password"
                           class="form-control @error('new_password') is-invalid @enderror" required>
                    @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                           class="form-control" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
