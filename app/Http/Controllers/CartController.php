<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\ChiTietHDB;
use App\Models\Chitiethdbk;
use App\Models\HoaDonBan;
use App\Models\Hoadonbank;
use App\Models\KhachHang;
use App\Models\Message;
use App\Models\NhanVien;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(Request $request){
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        return view('pages.cart',compact('cart','categorys','nhaxuatbans'));
    }
    
    public function addToCart(Request $request, $productId)
    {

        $bookdetail = Sach::where('MaSach', '=', $productId)->first();
        $cart = $request->session()->get('cart', []);
        $productIndex = null;
        foreach ($cart as $index => $item) {
            if ($item['MaSach'] == $bookdetail->MaSach) {
                $productIndex = $index;
                break;
            }
        }

        if ($productIndex !== null) {
            if ($cart[$productIndex]['quantity'] + 1 > $bookdetail->SoLuong) {
                return redirect('/cart')->with('error', 'Vượt quá số lượng tồn');
            }
            $cart[$productIndex]['quantity'] += 1;
        } else {
            if (1 > $bookdetail->SoLuong) {
                return redirect('/cart')->with('error', 'Vượt quá số lượng tồn');
            }
            $cart[] = [
                'MaSach' => $bookdetail->MaSach,
                'TenSach' => $bookdetail->TenSach,
                'GiaBan' => $bookdetail->GiaBan,
                'AnhDaiDien' => $bookdetail->AnhDaiDien,
                'quantity' => 1,
            ];
        }
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $request->session()->put('cart', $cart);
        return view('pages.cart', compact('cart','categorys','nhaxuatbans'));
    }

    public function addCartDetail(Request $request, $productId,$quantity)
    {
        $viewback = "/product/$productId";
        $bookdetail = Sach::where('MaSach', '=', $productId)->first();
        $cart = $request->session()->get('cart', []);
        $productIndex = null;
    
        foreach ($cart as $index => $item) {
            if ($item['MaSach'] == $bookdetail->MaSach) {
                $productIndex = $index;
                break;
            }
        }
        if ($productIndex !== null) {
            if ($cart[$productIndex]['quantity'] + $quantity > $bookdetail->SoLuong) {
                return redirect($viewback)->with('error', 'Vượt quá số lượng tồn');
            }
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $cart[$productIndex]['quantity'] += $quantity;
        } else {
            if ($quantity > $bookdetail->SoLuong) {
                return redirect($viewback)->with('error', 'Vượt quá số lượng tồn');
            }
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
            $cart[] = [
                'MaSach' => $bookdetail->MaSach,
                'TenSach' => $bookdetail->TenSach,
                'GiaBan' => $bookdetail->GiaBan,
                'AnhDaiDien' => $bookdetail->AnhDaiDien,
                'quantity' => $quantity,
            ];
        }
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $request->session()->put('cart', $cart);
        
        // Trả về view chi tiết sản phẩm với giỏ hàng
        return view('pages.cart', compact('cart','categorys','nhaxuatbans'));
    }
    

    public function showcart(Request $request)
    {
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        return view('pages.cart', compact( 'cart','categorys','nhaxuatbans'));
    }

    public function updateQuantity(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $productIndex = array_search($productId, array_column($cart, 'MaSach'));
        
        
        $cart[$productIndex]['quantity'] -= 1;
        if ($productIndex === false || $cart[$productIndex]['quantity'] <= 0) {
            return $this->clearCart($request, $productId);
        }
        // Lưu giỏ hàng đã cập nhật vào session
        $request->session()->put('cart', $cart);
        return view('pages.cart', compact( 'cart','categorys','nhaxuatbans'));
    }

    public function clearCart(Request $request, $productId)
    {
        $categorys=TheLoai::all();
        $nhaxuatbans=NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        $updatedCart = array_filter($cart, function ($item) use ($productId) {
            return $item['MaSach'] != $productId;
        });
        $updatedCart = array_values($updatedCart);

        $request->session()->put('cart', $updatedCart);
        $cart = $updatedCart;
        return view('pages.cart', compact('cart','categorys','nhaxuatbans'));
    }

    public function viewcheckout(Request $request){
        $categorys = TheLoai::all();
        $nhaxuatbans = NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        $khachhang = KhachHang::where('MaKH', session('CustomorID'))->first();
        return view('pages.checkout', compact('cart','categorys','nhaxuatbans','khachhang'));
    }
    public function checkout(Request $request)
    {
        $categorys = TheLoai::all();
        $nhaxuatbans = NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        $khachhang = KhachHang::where('MaKH', session('CustomorID'))->first();
        if (session('CustomorID')) {
            $supportMessage = Message::where('MaKH', session('CustomorID'))->first();
            $salesStaff =  $supportMessage->MaNV;
    
              // Tạo hóa đơn bán mới
            $newHoaDonBan=new HoaDonBan();
            $latestHoaDonBan = HoaDonBan::orderBy('SoHDB', 'desc')->first();
    
            if ($latestHoaDonBan && $latestHoaDonBan->SoHDB) {
                $lastId = (int)(substr($latestHoaDonBan->SoHDB, 3)); 
                $nextId = $lastId + 1;
                $newHoaDonBan->SoHDB = 'HDB' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
            } else {
                $newHoaDonBan->SoHDB = 'HDB01';
            }
            $newHoaDonBan->MaNV=$salesStaff;
            $newHoaDonBan->NgayBan=date('Y-m-d');
            $newHoaDonBan->MaKH=session('CustomorID');
            $newHoaDonBan->TrangThai=1;
            $newHoaDonBan->save();
             // Tạo Chi tiết hóa đơn bán mới cho mỗi sản phẩm trong giỏ hàng
             foreach ($cart as $index => $item) {
                $bookinfo = Sach::where('MaSach', '=', $item['MaSach'])->first(); 
                $newChiTietHDB = new ChiTietHDB();
                $newChiTietHDB->SoHDB = $newHoaDonBan->SoHDB;
                $newChiTietHDB->MaSach = $item['MaSach'];
                $newChiTietHDB->SoLuongBan = $item['quantity'];
                $newChiTietHDB->KhuyenMai = 1;
                $newChiTietHDB->TenSach = $bookinfo->TenSach;
                $newChiTietHDB->AnhDaiDien = $bookinfo->AnhDaiDien;
                $newChiTietHDB->GiaBan = $bookinfo->GiaBan;
                $newChiTietHDB->save();
    
                // Cập nhật số lượng sách
                DB::update('UPDATE `sach` SET `SoLuong` = `SoLuong` - ? WHERE `MaSach` = ?', [$item['quantity'], $item['MaSach']]);
               
            }
        }
       else{
        $request->validate([
            'nameInput' => 'required',
            'emailInput' => 'required',
            'phoneInput' => 'required',
            'diachiInput' => 'required',
        ]);
        // Determine staff assignment
        $staffReceive = $request->session()->get('staffReceive', 'NV01'); // Default value if session variable not set
        $lastStaffNumber = intval(substr($staffReceive, 2));
        $nextStaffId = ($lastStaffNumber < 5) ? 'NV' . str_pad($lastStaffNumber + 1, 2, '0', STR_PAD_LEFT) : 'NV01';
        $request->session()->put('staffReceive', $nextStaffId);
    
        // Create new invoice record
        $newHoaDonBan = new Hoadonbank();
        $latestHoaDonBan = Hoadonbank::orderBy('SoHDBK', 'desc')->first();
    
        $newHoaDonBan->SoHDBK = $latestHoaDonBan ? 'HDBK' . str_pad(substr($latestHoaDonBan->SoHDBK, 4) + 1, 2, '0', STR_PAD_LEFT) : 'HDBK01';
        $newHoaDonBan->MaNV = 'NV01';
        $newHoaDonBan->TenKH = $request->input('nameInput');
        $newHoaDonBan->email = $request->input('emailInput');
        $newHoaDonBan->DienThoai = $request->input('phoneInput');
        $newHoaDonBan->DiaChi = $request->input('diachiInput');
        $newHoaDonBan->NgayBan = date('Y-m-d');
        $newHoaDonBan->TrangThai = 1;
        $newHoaDonBan->save();
    
        // Process each item in the cart
        foreach ($cart as $item) {
            $newChiTietHDB = new Chitiethdbk();
            $newChiTietHDB->SoHDBK = $newHoaDonBan->SoHDBK;
            $newChiTietHDB->MaSach = $item['MaSach'];
            $newChiTietHDB->SoLuongBan = $item['quantity'];
            $book = Sach::where('MaSach', $item['MaSach'])->first();
            $newChiTietHDB->GiaBan = $book->GiaBan;
            $newChiTietHDB->TenSach = $book->TenSach;
            $newChiTietHDB->AnhDaiDien = $book->AnhDaiDien;
            $newChiTietHDB->save();
    
            Sach::where('MaSach', $item['MaSach'])->decrement('SoLuong', $item['quantity']);
        }

        try {
            Mail::to($newHoaDonBan->email)->send(new OrderPlaced($newHoaDonBan));
            $request->session()->forget('cart');
            return response()->json(['SoHDBK' => $newHoaDonBan->SoHDBK]);
        } catch (\Exception $e) {
            // Xử lý lỗi gửi email
            $request->session()->forget('cart');
            return response()->json(['SoHDBK' => $newHoaDonBan->SoHDBK]);
        }

       }
       $request->session()->forget('cart');
        return view('pages.checkout', compact('cart', 'categorys', 'nhaxuatbans', 'khachhang'))
            ->with('successcart', 'Đơn hàng đặt thành công');
    }
    
    public function orderdetail(Request $request, $order)
    {
        $categorys = TheLoai::all();
        $nhaxuatbans = NhaXuatBan::all();
        $cart = $request->session()->get('cart', []);
        $hoadonbank = Hoadonbank::where('SoHDBK', $order)->first();
        $chitiethdbk = Chitiethdbk::where('SoHDBK', $order)->get();

        foreach ($chitiethdbk as $item) {
            $sach = Sach::where('MaSach', $item->MaSach)->first();
            $item->AnhDaiDien = $sach->AnhDaiDien;
        }
    
        // Calculate total amount and other necessary details here if needed
    
        return view('pages.orderdetail', compact('cart', 'categorys', 'nhaxuatbans', 'hoadonbank', 'chitiethdbk'));
    }
    
}
