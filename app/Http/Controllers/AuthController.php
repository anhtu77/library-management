<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate dữ liệu
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            $user = Auth::user();
    
            // Kiểm tra vai trò của người dùng
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Chuyển hướng admin đến trang quản trị
            } else {
                return redirect()->route('user.index'); // Chuyển hướng user đến trang chủ
            }
        }
    
        // Đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ]);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Tạo user mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Mặc định role là 'user'
        ]);
    
        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user);
    
        // Chuyển hướng về trang chủ của user
        return redirect()->route('user.index')->with('success', 'Đăng ký thành công!');
    }
}