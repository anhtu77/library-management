<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Kiểm tra role của người dùng
        $user = Auth::user();
        if ($user->role !== $role) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}