<?php 

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('user.profile');
    }

    public function edit()
    {
        return view('user.profile-edit', ['user' => Auth::user()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'birth_year' => 'nullable|integer|min:1900|max:' . now()->year,
        ]);
        
        /** @var \App\Models\User $user **/
    
        $user = Auth::user(); // lấy ra instance người dùng đang đăng nhập
    
        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_year' => $request->birth_year,
        ]);
    
        return redirect()->route('user.profile')->with('success', 'Cập nhật thành công!');
    }

    public function showChangePasswordForm()
    {
        return view('user.password-change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Đổi mật khẩu thành công.');
    }
    
}
