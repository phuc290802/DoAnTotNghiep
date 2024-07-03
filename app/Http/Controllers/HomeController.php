<?php

namespace App\Http\Controllers;

use App\Models\AnhNho;
use App\Models\DanhGiaKH;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\TheloaiNho;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use LengthException;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(session('CustomorID')){
            echo "<script>localStorage.setItem('CustomorIDcheck', '".session('CustomorID')."');</script>";
        }
        else{
            echo "<script> localStorage.removeItem('CustomorIDcheck');</script>";
        }
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $products = Sach::all();
        $cart = $request->session()->get('cart', []);
        return view('index', compact('products', 'cart','categorys','nhaxuatbans'));
    } 
    public function search(Request $request) 
    {
        $nhaxuatbans = NhaXuatBan::all();
        $categorys = TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $keyword = urldecode($request->input('keyword'));
        if (strpos($keyword, '%') === false) {
            $keyword = "%$keyword%";
        }
        $products = DB::table('sach')
        ->where('TenSach', 'like', $keyword)->paginate(9);
        if ($products->total() === 0) {
            $products = DB::table('sach')
                ->where('MaTG', 'like', $keyword)
                ->paginate(9);
        }
    
        // Nếu không tìm thấy kết quả theo mã tác giả, tìm kiếm theo nhà xuất bản
        if ($products->total() === 0) {
            $products = DB::table('sach')
                ->join('nhaxuatban', 'sach.MaNXB', '=', 'nhaxuatban.MaNXB')
                ->where('nhaxuatban.TenNXB', 'like', $keyword)
                ->select('sach.*')
                ->paginate(9);
        }
        return view('pages.shop', compact( 'keyword', 'cart', 'categorys', 'nhaxuatbans','products'));
    }
    public function search_smart(Request $request) 
    {
        $keyword = urldecode($request->input('keyword'));
        $keyword = "%$keyword%";

        // Tìm kiếm theo tên sách
        $products = DB::table('sach')
            ->where('TenSach', 'like', $keyword)
            ->paginate(2);

        // Nếu không tìm thấy kết quả theo tên sách, tìm kiếm theo mã tác giả
        if ($products->total() === 0) {
            $products = DB::table('sach')
                ->where('MaTG', 'like', $keyword)
                ->paginate(2);
        }

        // Nếu không tìm thấy kết quả theo mã tác giả, tìm kiếm theo nhà xuất bản
        if ($products->total() === 0) {
            $products = DB::table('sach')
                ->join('nhaxuatban', 'sach.MaNXB', '=', 'nhaxuatban.MaNXB')
                ->where('nhaxuatban.TenNXB', 'like', $keyword)
                ->select('sach.*')
                ->paginate(2);
        }

        $productsCount = $products->total();

        return view('backend.dashboard.component.product_list', compact('products', 'productsCount'));
    }


    public function show(Request $request)
    {
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $products = Sach::all();
        $cart = $request->session()->get('cart', []);
        return view('index', compact('products', 'cart','categorys','nhaxuatbans'));
    }
    public function detail(){
        $products = Sach::paginate(8);
        return view('backend.dashboard.component.Product',compact('products'));
    }
    public function productDetail($id, Request $request)
    {
        $anhnho = AnhNho::where('MaSach', $id)->get();
        $nhaxuatbans = NhaXuatBan::all();
        $categorys = TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $products = Sach::where('MaSach', '=', $id)->first();
        $books=Sach::where('MaTL','=',$products->MaTL)->get();
        $productNXB = nhaxuatban::where('MaNXB','=', $products->MaNXB)->first();
        $danhgiakhs = DanhGiaKH::where('MaSach', $id)->get();
        $khachhangs= KhachHang::all();
        $soluongDanhGia = $danhgiakhs->count();
        return view('pages.detail', compact('products', 'cart', 'nhaxuatbans', 'categorys','productNXB','soluongDanhGia','danhgiakhs','khachhangs','books','anhnho'));
    }
    
    public function category(Request $request,$id)
    {
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $products = Sach::whereHas('theLoai', function ($query) use ($id) {
            $query->where('MaTL', $id);
        })->paginate(9);
        
        return view('pages.shop', compact('products', 'cart','categorys','nhaxuatbans'));
    }
    public function smallcategory(Request $request,$id)
    {
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $products = Sach::whereHas('theLoainho', function ($query) use ($id) {
            $query->where('MaTLCon', $id);
        })->paginate(9);
        
        return view('pages.shop', compact('products', 'cart','categorys','nhaxuatbans'));
    }
    public function nhaxuatban(Request $request,$id)
    {
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $products = Sach::whereHas('nhaxuatban', function ($query) use ($id) {
            $query->where('MaNXB', $id);
        })->paginate(9);
        
        return view('pages.shop', compact('products', 'cart','categorys','nhaxuatbans'));
    }
    public function shopdetail(Request $request){
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $products = Sach::paginate(9);
        $cart = $request->session()->get('cart', []);
        return view('pages.shop', compact('products', 'cart','categorys','nhaxuatbans'));
    }

    public function review(Request $request, $id) {
        $request->validate([
            'DanhGia' => 'required', 
            'Vote' => 'required|integer|min:1|max:5',
        ]);
        $danhgiaKH = new DanhGiaKH();
        $latestReview = DanhGiaKH::orderBy('MaDG', 'desc')->first();
        if ($latestReview && $latestReview->MaDG) {
            $lastId = (int)(substr($latestReview->MaDG, 2)); 
            $nextId = $lastId + 1;
            $danhgiaKH->MaDG = 'DG' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
        } else {
            $danhgiaKH->MaDG = 'DG01';
        }
        $danhgiaKH->ThoiGian = date('Y-m-d');
        $danhgiaKH->MaKH = session('CustomorID');
        $danhgiaKH->MaSach = $id;
        $danhgiaKH->DanhGia = $request->input('DanhGia');
        $danhgiaKH->Vote = $request->input('Vote');
        $danhgiaKH->save();
    
        return response()->json(['success' => 'Đánh giá của bạn đã được gửi.']);
    }
    public function filterPrice(Request $request, $price1, $price2) {
        $nhaxuatbans = NhaXuatBan::all();
        $categorys = TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $products = Sach::whereBetween('GiaBan', [$price1, $price2])->paginate(9);
        return view('pages.shop', compact('products', 'cart', 'categorys', 'nhaxuatbans'));
    }
    public function aboutus(Request $request){
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        return view('pages.aboutus', compact('cart','categorys','nhaxuatbans'));
    }
    public function blog(Request $request)
    {
        $tintucs = TinTuc::all();
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        return view('pages.blog', compact('tintucs','cart','categorys','nhaxuatbans'));
    }
    public function showBlog(Request $request,$id)
    {
        $tintuc = TinTuc::findOrFail($id);
        $nhaxuatbans=NhaXuatBan::all();
        $categorys=TheLoai::all();
        $cart = $request->session()->get('cart', []);
        return view('pages.showblog', compact('tintuc','cart','categorys','nhaxuatbans'));
    }
    public function viewAccountUpdate(Request $request, $MaKH)
    {
        $nhaxuatbans = NhaXuatBan::all();
        $categorys = TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $khachhang = KhachHang::where('MaKH', '=', $MaKH)->first();
        
        return view('pages.accountUpdate', compact('khachhang', 'cart', 'categorys', 'nhaxuatbans'));
    }
    public function accountUpdate(Request $request, $MaKH)
    {
        // Validate input
        $validatedData = $request->validate([
            'TenKH' => 'required',
            'UserName' => 'required',
            'GioiTinh' => 'required',
            'DiaChi' => 'required',
            'DienThoai' => 'required',
            'AnhDaiDien' => 'nullable',
            'password' => 'nullable',
        ]);
    
        // Fetch the user
        $khachhang = KhachHang::where('MaKH', $MaKH)->first();
    
        // Update the user data
        $updateData = [
            'TenKH' => $validatedData['TenKH'],
            'UserName' => $validatedData['UserName'],
            'GioiTinh' => $validatedData['GioiTinh'],
            'DiaChi' => $validatedData['DiaChi'],
            'DienThoai' => $validatedData['DienThoai'],
            'AnhDaiDien' => $validatedData['AnhDaiDien'],
        ];
    
        // Update password if provided
        if (!empty($validatedData['password'])) {
            $updateData['password'] = $validatedData['password'];
        }
    
        // Perform the update
        DB::table('khachhang')
            ->where('MaKH', $MaKH)
            ->update($updateData);
    
        // Fetch related data
        $nhaxuatbans = NhaXuatBan::all();
        $categorys = TheLoai::all();
        $cart = $request->session()->get('cart', []);
        $account = KhachHang::where('MaKH', $MaKH)->first();
    
        return view('pages.accountUpdate', compact('khachhang', 'cart', 'categorys', 'nhaxuatbans'))->with('success', 'Tài khoản cập nhật thành công');
    }
    
    


}
