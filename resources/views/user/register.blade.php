<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eafaf1;
            font-family: 'Segoe UI', sans-serif;
        }

        .register-wrapper {
            display: flex;
            justify-content: center;
        }

        .register-box {
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
        }

        .register-form {
            flex: 1;
            padding: 40px 30px;
            background-color: #ffffff;
        }

        .btn-green {
            background-color: #28a745;
            border: none;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        .text-green {
            color: #28a745;
        }
    </style>
</head>

<body>
    <div class="register-wrapper">
        <div class="register-box">
            <div class="register-form">


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf
                    <h4 class="text-green text-center">Tạo tài khoản</h4>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" maxlength="20" pattern="[A-Za-z0-9]{1,20}"
                            title="Tối đa 20 ký tự, chỉ chữ và số" class="form-control" value="{{ old('username') }}" required>
                        @error('username')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label class="form-label">Tên người dùng</label>
                        <input type="text" name="fullname" maxlength="40"
                            pattern="[A-Za-zÀ-ÿa-zA-Z\s]+"
                            title="Tối đa 40 ký tự, chỉ chữ và khoảng trắng" class="form-control" value="{{ old('fullname') }}"
                            required>
                        @error('fullname')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" maxlength="10"
                            pattern="0[0-9]{9}"
                            title="Bắt đầu bằng 0, có 10 chữ số" class="form-control" value="{{ old('phone') }}"
                            required>
                        @error('phone')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- birth year -->
                    <div class="mb-3">
                        <label class="form-label">Năm sinh</label>
                        <select name="birth_year" class="form-control" required>
                            <option value="">-- Chọn năm --</option>
                            @for ($year = now()->year; $year >= 1900; $year--)
                            <option value="{{ $year }}" {{ old('birth_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="address" maxlength="50" pattern="[A-Za-zÀ-ÿa-zA-Z\s]+"
                            title="Tối đa 50 ký tự, chỉ chữ và khoảng trắng" class="form-control" value="{{ old('address') }}">
                        @error('address')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" maxlength="30" class="form-control"
                            pattern=".{1,30}" title="Email tối đa 30 ký tự và phải có @"
                            value="{{ old('email') }}">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- email confirm -->
                    <div class="mb-3">
                        <label class="form-label">Xác nhận Email</label>
                        <input type="email" name="email_confirmation" maxlength="30"
                            pattern=".{1,30}" title="Email tối đa 30 ký tự và phải có @" class="form-control" value="{{ old('email_confirmation') }}">
                        @error('email_confirmation')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password"
                            pattern="^(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{6,20}$"
                            title="Từ 6-20 ký tự, ít nhất 1 chữ hoa và 1 ký tự đặc biệt" class="form-control" value="{{ old('password') }}"
                            required>
                        @error('password')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password confirm -->
                    <div class="mb-3">
                        <label class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control" pattern="^(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{6,20}$"
                            title="Từ 6-20 ký tự, ít nhất 1 chữ hoa và 1 ký tự đặc biệt" value="{{ old('password_confirmation') }}" required>
                        @error('password_confirmation')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-green text-white">Đăng ký</button>
                    </div>

                    <div class="mt-4 text-center">
                        <span>Đã có tài khoản?</span>
                        <a href="{{ route('login') }}" class="text-green text-decoration-none">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>