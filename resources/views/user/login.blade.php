<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eafaf1;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            display: flex;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
        }

        .login-image {
            flex: 1;
            background:url('storage/uploads/logo/logo-login.jpg');
            /* Đổi link tùy ý */
            background-size: cover;
            background-position: center;
        }

        .login-form {
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
    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-image d-none d-md-block"></div>
            <div class="login-form">
                <h4 class="mb-4 text-green text-center">Đăng nhập tài khoản</h4>

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="login" class="form-label">Tên đăng nhập hoặc Email</label>
                        <input type="text" class="form-control" name="login" id="login" required value="{{ old('login') }}">
                        @error('login')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 text-end">
                        <a href="" class="text-decoration-none text-green">Quên mật khẩu?</a>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-green text-white">Đăng nhập</button>
                    </div>

                    <div class="mt-4 text-center">
                        <span>Bạn chưa có tài khoản?</span>
                        <a href="{{ route('register') }}" class="text-green text-decoration-none">Đăng ký ngay</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>