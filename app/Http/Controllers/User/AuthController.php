<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Model User mặc định

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('user.login'); // Tạo file resources/views/user/auth/login.blade.php
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cho phép đăng nhập bằng username hoặc email
        $login_type = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$login_type => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('user.home');
        }

        return back()->withErrors([
            'login' => 'Tài khoản hoặc mật khẩu không đúng.',
        ]);
    }

    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
        'fullname' => 'required|string|max:255',
        'phone' => 'required|string|max:10',
        'birth_year' => 'required|integer|min:1900|max:' . now()->year,
        'email' => 'required|email|confirmed|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
             'username' => $request->username,
        'fullname' =>$request->fullname,
        'phone' => $request->phone,
        'birth_year' => $request->birth_year,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('user.home');
    }
}
