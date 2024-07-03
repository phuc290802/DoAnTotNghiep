<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        $username = session('UserName');
        $password = session('Password');
        if ($username == null || $password == null) {
            // Nếu chưa đăng nhập, chuyển hướng họ đến trang đăng nhập
            return redirect('/admin/login')->with('error', 'Bạn chưa đăng nhập.');
        } else {
            // Nếu đã đăng nhập, tiếp tục chạy middleware
            return $next($request);
        }
    }
}

