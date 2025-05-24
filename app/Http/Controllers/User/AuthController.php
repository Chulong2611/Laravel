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
        if (Auth::check()) {
            return redirect()->route('user.home');
        }
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
            'username' => [
                'required',
                'string',
                'max:20',
                'regex:/^[A-Za-z0-9]+$/',
                'unique:users,username'
            ],

            'fullname' => [
                'required',
                'string',
                'max:40',
                'regex:/^[\p{L}\s]+$/u' // Cho phép ký tự unicode và khoảng trắng
            ],

            'address' => [
                'string',
                'max:50',
                'regex:/^[\p{L}\s]+$/u' // Cho phép ký tự unicode và khoảng trắng
            ],

            'phone' => [
                'required',
                'regex:/^0(?!0{9}$)[0-9]{9}$/'
            ],
            'birth_year' => [
                'required',
                'integer',
                'min:1900',
                'max:' . now()->year
            ],
            'email' => [
                'string',
                'email',
                'max:30',
                'confirmed',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:20',
                'regex:/^(?=.*[A-Z])(?=.*[^A-Za-z0-9]).{6,20}$/',
                'confirmed'
            ],
        ]);

        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'birth_year' => $request->birth_year,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('user.home');
    }
}
