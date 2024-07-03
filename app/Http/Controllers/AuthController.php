<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        session(['UserName' => null]);
        session(['Password' => null]);
        session(['MaNV' => null]);
        return view('admin.auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('UserName', 'Password');
        $nhanvien = NhanVien::where('UserName', $credentials['UserName'])->first();
        if ($nhanvien && $nhanvien->password === $credentials['Password']) {
            auth()->login($nhanvien);
            session(['UserName' => $credentials['UserName']]);
            session(['Password' => $credentials['Password']]);
            session(['MaNV' =>  $nhanvien->MaNV]);
            return redirect('/admin')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect('/admin/login')->with('error', 'Email hoặc mật khẩu không chính xác');
        }
    }
    public function logout(Request $request)
    {
        session(['UserName' => null]);
        session(['Password' => null]);
        session(['MaNV' => null]);
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');
    }

}
