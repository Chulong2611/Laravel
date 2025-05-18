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
                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên người dùng</label>
                        <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Năm sinh</label>
                        <select name="birth_year" class="form-control" required>
                            <option value="">-- Chọn năm --</option>
                            @for ($year = now()->year; $year >= 1900; $year--)
                            <option value="{{ $year }}" {{ old('birth_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Xác nhận Email</label>
                        <input type="email" name="email_confirmation" class="form-control" value="{{ old('email_confirmation') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
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