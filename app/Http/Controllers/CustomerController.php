<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHDB;
use App\Models\HoaDonBan;
use App\Models\KhachHang;
use App\Models\Message;
use App\Models\NhanVien;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function customerAccount(Request $request){
        $categorys = TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $account = KhachHang::where('MaKH', session('CustomorID'))->first();
        $products = Sach::paginate(8);
        $cart = $request->session()->get('cart', []);
        $hoadonbans1 = HoaDonBan::where('MaKH', '=', session('CustomorID'))->where('TrangThai', '=', 1)->get();
        $hoadonbans2 = HoaDonBan::where('MaKH', '=', session('CustomorID'))->where('TrangThai', '=', 2)->get();
        $hoadonbans3 = HoaDonBan::where('MaKH', '=', session('CustomorID'))->where('TrangThai', '=', 3)->get();
        $chitietHDBs = ChiTietHDB::all();
        $khachhang = KhachHang::where('MaKH', '=', session('CustomorID'))->first();
        $books = Sach::all();
        return view('pages.customerAccount', compact('khachhang', 'chitietHDBs', 'books','hoadonbans1', 'hoadonbans2', 'hoadonbans3','products', 'cart', 'categorys','nhaxuatbans', 'account'));
    }
    
    public function showLoginForm(Request $request)
    {
        session()->forget(['CustomorUserName', 'CustomorPassword', 'CustomorID']);
        $categorys = TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $products = Sach::paginate(8);
        $cart = $request->session()->get('cart', []);
        return view('index', compact('products', 'cart', 'categorys','nhaxuatbans'));
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('UserName', 'Password');
        $user = KhachHang::where('UserName', $credentials['UserName'])->first();
        if ($user && $user->password === $credentials['Password']) {
            session(['CustomorUserName' => $credentials['UserName']]);
            session(['CustomorPassword' => $credentials['Password']]);
            session(['CustomorID' => $user->MaKH]);
            return redirect()->back()->with('successlogin', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    
    public function logout(Request $request)
    {
        // Xóa thông tin phiên làm việc
        $request->session()->forget(['CustomorUserName', 'CustomorPassword', 'CustomorID']);
        $previousUrl = $request->session()->get('_previous.url');
        // Kiểm tra URL hiện tại
        if ($previousUrl && strpos($previousUrl, '/account') !== false) {
            return redirect()->route('index');
        }
        // Chuyển hướng lại trang trước
        return redirect()->back();
    }
    
    



    public function showRegistrationForm()
    {
        return view('index');
    }

    public function register(Request $request)
    {
        
        $request->validate([
            'TenKH' => 'required',
            'UserName' => 'required',
            'GioiTinh' => 'required',
            'DiaChi' => 'required',
            'DienThoai' => 'required',
            'Password' => 'required',
            'AnhDaiDien' => 'image', // Chấp nhận chỉ các tệp hình ảnh
        ], [
            'AnhDaiDien.image' => 'Ảnh đại diện phải là một tệp hình ảnh.',
            'AnhDaiDien.default' => 'avatar.png', // Giá trị mặc định nếu không có hình ảnh được cung cấp
        ]);
        if ($request->hasFile('AnhDaiDien')) {
            $image = $request->file('AnhDaiDien');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public/profile_images', $image, $imageName);
        }
        $khachhangcheck=KhachHang::where('UserName','=',$request['UserName'])->first();
        if($khachhangcheck!=null){
            return redirect()->back()->with('error','Tài khoản đã tồn tại');
        }
        $khachHang = new KhachHang();
        $latestKhachHang = KhachHang::orderBy('MaKh', 'desc')->first();
        if ($latestKhachHang) {
            
            $lastId = (int)(substr($latestKhachHang->MaKH, 2)); 
            $nextId = $lastId + 1;
            $khachHang->MaKH = 'KH' . str_pad($nextId, 2, '0', STR_PAD_LEFT);        
        } else {
            $khachHang->MaKh = 'KH01';
        }
        $khachHang->TenKH = $request->input('TenKH');
        $khachHang->UserName = $request->input('UserName');
        $khachHang->password = $request->input('Password');
        $khachHang->GioiTinh = $request->input('GioiTinh');
        $khachHang->DiaChi = $request->input('DiaChi');
        $khachHang->DienThoai = $request->input('DienThoai');
        $khachHang->AnhDaiDien = isset($imageName) ? $imageName : 'avatar.png'; // Lưu tên hình ảnh vào cơ sở dữ liệu
        $khachHang->save();

        $supportStaff = $request->session()->get('supportStaff');
        $lastStaffNumber = intval(substr($supportStaff, 2));
    
        // Chia đều hỗ trợ khách hàng cho các nhân viên
        $staffCount = NhanVien::count();
        if (!$supportStaff || $lastStaffNumber >4 ) {
            $request->session()->put('supportStaff', 'NV01');
            $supportStaff = 'NV01'; 
        } else {
            $nextStaffNumber = $lastStaffNumber + 1;
            $nextStaffId = 'NV' . str_pad($nextStaffNumber, 2, '0', STR_PAD_LEFT);
            $request->session()->put('supportStaff', $nextStaffId);
        }
        $message = new Message();
        $message->MaKH = $khachHang->MaKH;
        $message->MaNV = $supportStaff;
        $message->message = 'Kính chào quý khách';
        $message->thoigiannhan = now();
        $message->check = 2;
        $message->save();
        return redirect()->route('index')->with('success', 'Đăng kí thành công');
    }

}
