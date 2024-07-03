<?php

namespace App\Http\Controllers;

use App\Models\AnhNho;
use App\Models\ChiTietHDB;
use App\Models\Chitiethdbk;
use App\Models\ChiTietHDN;
use App\Models\DanhGiaKH;
use App\Models\HoaDonBan;
use App\Models\Hoadonbank;
use App\Models\HoaDonNhap;
use App\Models\KhachHang;
use App\Models\Message;
use App\Models\NhanVien;
use App\Models\NhaXuatBan;
use App\Models\Sach;
use App\Models\TheLoai;
use App\Models\TheloaiNho;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main');
    }
    public function getStaffInfo()
    {
        $staffInfo=NhanVien::where('UserName', '=',session('UserName'))->first(); 
        return response()->json($staffInfo);
    }
    ////////////////////////Book Manager //////////////////////////
    public function adminBook()
    {
        $products = Sach::paginate(10); 
        return view('admin.pages.adminBook.adminbook', compact('products'));
    }
    public function createBook()
    {
        $categorys = TheLoai::all();
        $nhaxuatbans = NhaXuatBan::all();
        return view('admin.pages.adminBook.adminBookCreate',compact('categorys','nhaxuatbans'));
    }
    public function storeBook(Request $request)
    {
        $validatedData = $request->validate([
            'TenSach' => 'required',
            'MaTL' => 'required', 
            'MaTLCon' => 'nullable',
            'MaNXB' => 'required',
            'MaTG' => 'required',
            'GiaNhap' => 'required|numeric',
            'GiaBan' => 'required|numeric',
            'SoTrang' => 'required|numeric',
            'TrongLuong' => 'required',
            'AnhDaiDien' => 'required',
            'SoLuong' => 'required|numeric',
            'MoTa' => 'required',
            'NamXB' => 'required|date',
            'SachMoi' => 'required|numeric',
            'SachTBo' => 'required|numeric',
        ]);
        $validatedDataAnh = $request->validate([
            'fileanh1' => 'required',
            'fileanh2' => 'required',
            'fileanh3' => 'required',
        ]);
        // Create a new Sach instance with the validated data
        $latestSach = Sach::orderBy('MaSach', 'desc')->first();
        if ($latestSach) {
            $lastId = intval(substr($latestSach->MaSach, 1));
            $nextId = $lastId + 1;
            $newBook= 'S' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
        } else {
            $newBook = 'S01';
        }
        $anhnho1 = new AnhNho();
        $anhnho1->MaSach=$newBook;
        $anhnho1->TenFileAnh=$validatedDataAnh['fileanh1'];
        $anhnho1->save();

        $anhnho2 = new AnhNho();
        $anhnho2->MaSach=$newBook;
        $anhnho2->TenFileAnh=$validatedDataAnh['fileanh2'];
        $anhnho2->save();

        $anhnho3 = new AnhNho();
        $anhnho3->MaSach=$newBook;
        $anhnho3->TenFileAnh=$validatedDataAnh['fileanh3'];
        $anhnho3->save();
        Sach::create($validatedData);

    
        return redirect('/admin/adminbook')->with('success', 'Book created successfully!');
    }
    public function getSubCategories(Request $request)
    {
        $maTL = $request->maTL;
        $subCategories = TheloaiNho::where('MaTL', $maTL)->get();
        return response()->json($subCategories);
    }
    public function editBook($id)
    {
        $product = Sach::where('MaSach', '=', $id)->first();
        $categories = TheLoai::all();
        $nhaxuatbans = NhaXuatBan::all();
        return view('admin.pages.adminBook.adminBookUpdate', compact('product','categories','nhaxuatbans'));
    }
    public function updateBook(Request $request, $id)
    {
        $existingProduct = ChiTietHDB::where('MaSach', $id)->first();

        if ($existingProduct) {
            return redirect()->back()->with('error', 'Sách không được phép sửa');
        }


        $data = array_merge($request->only([
            'TenSach',
            'MaTL',
            'MaNXB',
            'MaTG',
            'GiaNhap',
            'GiaBan',
            'TrongLuong',
            'SoLuong',
            'AnhDaiDien',
            'SoTrang',
            'MoTa',
            'NamXB',
            'SachMoi',
            'SachTBo',
        ]), $request->only('MaTLCon'));
        
        if (!empty($request->input('MaTLCon'))) {
            $data['MaTLCon'] = $request->input('MaTLCon');
        }
        else{
            $data['MaTLCon']=null;
        }
        
        // Tiếp tục xử lý dữ liệu khác như bình thường
        $validatedDataAnh = $request->validate([
            'fileanh1' => 'required',
            'fileanh2' => 'required',
            'fileanh3' => 'required',
        ]);

        $product = Sach::where('MaSach', '=', $id);
        $deleted = DB::delete('DELETE FROM anhnho WHERE MaSach = ?', [$id]);
        $anhnho1 = new AnhNho();
        $anhnho1->MaSach=$id;
        $anhnho1->TenFileAnh=$validatedDataAnh['fileanh1'];
        $anhnho1->save();

        $anhnho2 = new AnhNho();
        $anhnho2->MaSach=$id;
        $anhnho2->TenFileAnh=$validatedDataAnh['fileanh2'];
        $anhnho2->save();

        $anhnho3 = new AnhNho();
        $anhnho3->MaSach=$id;
        $anhnho3->TenFileAnh=$validatedDataAnh['fileanh3'];
        $anhnho3->save();
        if(!$product){
            return redirect('/admin/adminbook')->with('error', 'Không tìm thấy sản phẩm để sửa.');
        }
        $product->update($data);

        return redirect('/admin/adminbook')->with('success', 'Book updated successfully!');
    }
    public function deleteBook(Request $request,$id)
    {
        // Check if the product exists in ChiTietHDB
        $existingProduct = ChiTietHDB::where('MaSach', '=', $id)->first();

        if ($existingProduct) {
            // Product exists in ChiTietHDB, prevent deletion
            return redirect()->back()->with('error', 'Sách không được phép xóa');
        } else {
            // No associated transactions, proceed with deletion
            $deleted = DB::delete('DELETE FROM sach WHERE MaSach = ?', [$id]);
            $deleted = DB::delete('DELETE FROM anhnho WHERE MaSach = ?', [$id]);
            $cart = $request->session()->get('cart', []);
            foreach ($cart as $key => $item) {
                if ($item['MaSach'] == $id) {
                    unset($cart[$key]);
                }
            }
    
            $cart = array_values($cart);
    
            $request->session()->put('cart', $cart);
            if ($deleted) {
                return redirect()->back()->with('success', 'Xóa sách thành công!');
            } else {
                return redirect()->back()->with('error', 'Xóa sách thất bại!');
            }
        }
    }
    public function bossdeleteBook(Request $request, $id)
    {
        $deletedSach = DB::delete('DELETE FROM sach WHERE MaSach = ?', [$id]);
    
        $deletedAnhNho = DB::delete('DELETE FROM anhnho WHERE MaSach = ?', [$id]);
    
        $updatedChiTietHDB = ChiTietHDB::where('MaSach', $id)->update(['MaSach' => 1]);
    
        $cart = $request->session()->get('cart', []);
    
        foreach ($cart as $key => $item) {
            if ($item['MaSach'] == $id) {
                unset($cart[$key]);
            }
        }

        $cart = array_values($cart);

        $request->session()->put('cart', $cart);
    
        if ($deletedSach && $deletedAnhNho) {
            return redirect()->back()->with('success', 'Xóa sách thành công!');
        } else {
            return redirect()->back()->with('error', 'Xóa sách thất bại!');
        }
    }
    
    //////////////////////// Category Manager //////////////////////////
    public function adminCategory()
    {
        $categorys = TheLoai::paginate(6); 
        return view('admin.pages.adminCategory.adminCategory', compact('categorys'));
    }
    public function categoryShow(Request $request)
    {
        $validatedData = $request->validate([
            'TenTL' => 'required',      
        ]);

        $latestTheLoai = TheLoai::orderBy('MaTL', 'desc')->first();
        if ($latestTheLoai) {
            $lastId = (int) substr($latestTheLoai->MaTL, 2);
            $nextId = $lastId + 1;
            $validatedData['MaTL'] = 'TL' . str_pad($nextId, 2, '0', STR_PAD_LEFT);     
        } else {
            $validatedData['MaTL'] = 'TL01';
        }
        TheLoai::create($validatedData);

        // Redirect back with success message
        return redirect('/admin/admincategory')->with('success', 'Category created successfully!');
    }
    public function createCategory()
    {
        return view('admin.pages.adminCategory.adminCategoryCreate');
    }
    public function editCategory($id)
    {
        $category = TheLoai::where('MaTL', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminCategory.adminCategoryUpdate', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $data = $request->only([
            'TenTL',
        ]);
        
        $category = TheLoai::where('MaTL', '=', $id);
        if(!$category){
            return redirect('/admin/admincategory')->with('error', 'Không tìm thấy sản phẩm để sửa.');
        }
        $category->update($data);

        return redirect('/admin/admincategory')->with('success', 'Book updated successfully!');
    }
    public function deleteCategory($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM theloai WHERE MaTL = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    //////////////////////// Staff Manager //////////////////////////
    public function adminStaff()
    {
        $staff = NhanVien::where('UserName', '=',session('UserName'))->first(); 
        return view('admin.pages.adminStaff.adminStaff', compact('staff'));
    }
    public function adminStafflist()
    {
        $staffs = NhanVien::where('MaNV', '!=', 'NV06')->paginate(10); 
        return view('admin.pages.adminStaff.adminStafflist', compact('staffs'));
    }
    
    public function staffShow(Request $request)
    {
        $validatedData = $request->validate([
            'TenNV' => 'required',
            'UserName' => 'required', 
            'GioiTinh' => 'required',
            'DiaChi' => 'required',
            'DienThoai' => 'required|numeric',
            'NgaySinh' => 'required|Date',
            'AnhDaiDien' => 'required',
            'password' => 'required',
        ]);

        $latestNhanVien = NhanVien::orderBy('MaNV', 'desc')->first();
        if ($latestNhanVien) {
            $lastId = (int) substr($latestNhanVien->MaNV, 2);
            $nextId = $lastId + 1;
            $validatedData['MaNV'] = 'NV' . str_pad($nextId, 2, '0', STR_PAD_LEFT);     
        } else {
            $validatedData['MaNV'] = 'NV01';
        }
        NhanVien::create($validatedData);

        // Redirect back with success message
        return redirect('/admin/adminstaff')->with('success', 'Staff created successfully!');
    }
    public function createStaff()
    {
        return view('admin.pages.adminStaff.adminStaffCreate');
    }
    public function editStaff($id)
    {
        $staff = NhanVien::where('MaNV', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminStaff.adminStaffUpdate', compact('staff'));
    }
    public function updateStaff(Request $request, $id)
    {
        $data = $request->only([
            'TenNV',
            'UserName', 
            'GioiTinh',
            'DiaChi',
            'DienThoai',
            'NgaySinh',
            'AnhDaiDien',
            'password',
        ]);
        
        $staff = NhanVien::where('MaNV', '=', $id);
        if(!$staff){
            return redirect('/admin/adminstaff')->with('error', 'Không tìm thấy sản phẩm để sửa.');
        }
        $staff->update($data);

        return redirect('/admin/adminstaff')->with('success', 'Book updated successfully!');
    }
    public function deleteStaff($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM nhanvien WHERE MaNV = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    //////////////////////// NXB Manager //////////////////////////
    public function adminNXB()
    {
        $nxbs = NhaXuatBan::paginate(6); 
        return view('admin.pages.adminNXB.adminNXB', compact('nxbs'));
    }
    public function nxbShow(Request $request)
    {
        $validatedData = $request->validate([
            'TenNXB' => 'required',      
        ]);

        $latestNXB = NhaXuatBan::orderBy('MaNXB', 'desc')->first();
        if ($latestNXB) {
            $lastId = (int) substr($latestNXB->MaNXB, 3); // Bắt đầu từ vị trí thứ 3 để lấy phần số
            $nextId = $lastId + 1;
            $validatedData['MaNXB'] = 'NXB' . str_pad($nextId, 2, '0', STR_PAD_LEFT);     
        } else {
            $validatedData['MaNXB'] = 'NXB01';
        }
        NhaXuatBan::create($validatedData);

        // Redirect back with success message
        return redirect('/admin/adminnxb/')->with('success', 'NXB created successfully!');
    }
    public function createNXB()
    {
        return view('admin.pages.adminNXB.adminNXBCreate');
    }
    public function editNXB($id)
    {
        $nxb = NhaXuatBan::where('MaNXB', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminNXB.adminNXBUpdate', compact('nxb'));
    }
    public function updateNXB(Request $request, $id)
    {
        $data = $request->only([
            'TenNXB',
        ]);
        
        $nxb = NhaXuatBan::where('MaNXB', '=', $id);
        if(!$nxb){
            return redirect('/admin/adminnxb')->with('error', 'Không tìm thấy nhà xuất bản để sửa.');
        }
        $nxb->update($data);
    
        return redirect('/admin/adminnxb')->with('success', 'NXB updated successfully!');
    }
    public function deleteNXB($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM nhaxuatban WHERE MaNXB = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    ////////////////////////Hoadonban Manager //////////////////////////
    public function adminHoaDonBan()
    { 
        $hoadonbans1 = HoaDonBan::where('TrangThai', '=', 1)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbans2 = HoaDonBan::where('TrangThai', '=', 2)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbans3 = HoaDonBan::where('TrangThai', '=', 3)->where('MaNV','=',session('MaNV'))->get(); 
        $chitietHDBs = ChiTietHDB::all();
        $hoadonbanks1 = Hoadonbank::where('TrangThai', '=', 1)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbanks2 = Hoadonbank::where('TrangThai', '=', 2)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbanks3 = Hoadonbank::where('TrangThai', '=', 3)->where('MaNV','=',session('MaNV'))->get(); 
        $chitietHDBKs = Chitiethdbk::all();
        $books = Sach::all();
        $customors = KhachHang::all();
        
        return view('admin.pages.adminHoaDonBan.adminhoadonban', compact('hoadonbans1', 'hoadonbans2', 'hoadonbans3', 
        'chitietHDBs', 'books', 'customors','hoadonbanks1', 'hoadonbanks2', 'hoadonbanks3', 'chitietHDBKs'));
    }
    public function editHoaDonBan($id)
    {
        $hoadonban = HoaDonBan::where('SoHDB', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminHoaDonBan.adminHoaDonBanUpdate', compact('hoadonban'));
    }
    public function updateHoaDonBan(Request $request, $id)
    {
        $data = $request->only([
            'MaNV', 'MaKH', 'NgayBan','TrangThai',
        ]);
        
        $hoadonban = HoaDonBan::where('SoHDB', '=', $id);
        if(!$hoadonban){
            return redirect('/admin/adminHDB')->with('error', 'Không tìm thấy nhà xuất bản để sửa.');
        }
        $hoadonban->update($data);
    
        return redirect('/admin/adminHDB')->with('success', 'NXB updated successfully!');
    }
    public function deleteHoaDonBan($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM hoadonban WHERE SoHDB = ?', [$id]);
        $deleted1 = DB::delete('DELETE FROM chitiethdb WHERE SoHDB = ?', [$id]);
        if ($deleted) {
            return redirect()->back()->with('success', 'Xóa hóa đơn thành công!');
        } else {
            return redirect()->back()->with('error', 'Xóa hóa đơn thất bại!');
        }
    }
    public function updateStatusHoaDonBan(Request $request, $sohdb, $status)
    {
        $affected = HoaDonBan::where('SoHDB', $sohdb)->update(['TrangThai' => $status]);

        if ($affected) {
            return response()->json(['success' => true, 'message' => 'Trạng thái đã được cập nhật']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }
    }
    public function deleteHoaDonBank($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM hoadonbank WHERE SoHDBK = ?', [$id]);
        $deleted1 = DB::delete('DELETE FROM chitiethdbk WHERE SoHDBK = ?', [$id]);
        if ($deleted) {
            return redirect()->back()->with('success', 'Xóa hóa đơn thành công!');
        } else {
            return redirect()->back()->with('error', 'Xóa hóa đơn thất bại!');
        }
    }
    public function updateStatusHoaDonBank(Request $request, $sohdbk, $statusk)
    {
        $affected = Hoadonbank::where('SoHDBK', $sohdbk)->update(['TrangThai' => $statusk]);

        if ($affected) {
            return response()->json(['success' => true, 'message' => 'Trạng thái đã được cập nhật']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hóa đơn']);
        }
    }
    ////////////////////////ChiTietHDB Manager //////////////////////////
    public function adminChiTietHDB()
    {
        $maNV = session('MaNV');
        $chitietHDBs = ChiTietHDB::whereHas('hoaDonBan', function($query) use ($maNV) {
            $query->where('MaNV', $maNV);
        })->paginate(6);
        return view('admin.pages.adminHoaDonBan.adminchitietHDB', compact('chitietHDBs'));
    }
    public function editChiTietHDB($id)
    {
        $chitietHDB = ChiTietHDB::where('SoHDB', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminHoaDonBan.adminChiTietHDBUpdate', compact('chitietHDB'));
    }
    public function updateChiTietHDB(Request $request, $soHDB, $maSach)
    {
        $data = $request->only([
            'SoLuongBan',
            'KhuyenMai',
        ]);

        $chitietHDB = ChiTietHDB::where('SoHDB', '=', $soHDB)
                                ->where('MaSach', '=', $maSach)
                                ->first();
        if (!$chitietHDB) {
            return redirect('/admin/adminChiTietHDB')->with('error', 'Không tìm thấy chi tiết hóa đơn để cập nhật.');
        }

        $chitietHDB = DB::update('UPDATE chitiethdb SET SoLuongBan = ?, KhuyenMai = ? WHERE SoHDB = ? AND MaSach = ?', [$data['SoLuongBan'],$data['KhuyenMai'],$soHDB, $maSach]);

        return redirect('/admin/adminChiTietHDB')->with('success', 'Chi tiết hóa đơn được cập nhật thành công!');
    }
    public function deleteChiTietHDB($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM chitiethdb WHERE SoHDB = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    ////////////////////////Hoadonnhap Manager //////////////////////////
    public function adminHoaDonNhap()
    {
        $hoadonnhaps = HoaDonNhap::where('MaNV','=',session('MaNV'))->paginate(6);  
        return view('admin.pages.adminHoaDonNhap.adminhoadonnhap', compact('hoadonnhaps'));
    }
    public function editHoaDonNhap($id)
    {
        $hoadonnhap = HoaDonNhap::where('SoHDN', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminHoaDonNhap.adminHoaDonNhapUpdate', compact('hoadonnhap'));
    }
    public function updateHoaDonNhap(Request $request, $id)
    {
        $data = $request->only([
            'MaNV', 'MaNXB', 'NgayNhap',
        ]);
        
        $hoadonnhap = HoaDonNhap::where('SoHDN', '=', $id);
        if(!$hoadonnhap){
            return redirect('/admin/adminHDN')->with('error', 'Không tìm thấy nhà xuất bản để sửa.');
        }
        $hoadonnhap->update($data);
    
        return redirect('/admin/adminHDN')->with('success', 'NXB updated successfully!');
    }
    public function deleteHoaDonNhap($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM hoadonnhap WHERE SoHDN = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    ////////////////////////ChiTietHDN Manager //////////////////////////
    public function adminChiTietHDN()
    {
        $maNV = session('MaNV');
        $chitietHDNs = ChiTietHDN::whereHas('hoadonnhap', function($query) use ($maNV) {
            $query->where('MaNV', $maNV);
        })->paginate(6); 
        return view('admin.pages.adminHoaDonNhap.adminchitietHDN', compact('chitietHDNs'));
    }
    public function editChiTietHDN($id)
    {
        $chitietHDN = ChiTietHDN::where('SoHDN', '=', $id)->first(); // Find the book by its ID
        return view('admin.pages.adminHoaDonNhap.adminChiTietHDNUpdate', compact('chitietHDN'));
    }
    public function updateChiTietHDN(Request $request, $soHDN, $maSach)
    {
        $data = $request->only([
            'SoLuongNhap',
            'KhuyenMai',
        ]);

        $chitietHDN = ChiTietHDN::where('SoHDN', '=', $soHDN)
                                ->where('MaSach', '=', $maSach)
                                ->first();
        if (!$chitietHDN) {
            return redirect('/admin/adminChiTietHDN')->with('error', 'Không tìm thấy chi tiết hóa đơn để cập nhật.');
        }

        $chitietHDN = DB::update('UPDATE chitiethdn SET SoLuongNhap = ?, KhuyenMai = ? WHERE SoHDN = ? AND MaSach = ?', [$data['SoLuongNhap'],$data['KhuyenMai'],$soHDN, $maSach]);

        return redirect('/admin/adminChiTietHDN')->with('success', 'Chi tiết hóa đơn được cập nhật thành công!');
    }
    public function deleteChiTietHDN($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM chitiethdn WHERE SoHDN = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
    ////////////////////////Vote Manager //////////////////////////
    public function adminVote()
    {
        $books=Sach::all();
        $danhgiakhs = DanhGiaKH::paginate(10); 
        return view('admin.pages.adminVote.adminvote', compact('danhgiakhs','books'));
    }
    public function deleteVote($id)
    {
        $deleted = DB::delete('DELETE FROM danhgiakh WHERE MaDG = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Vote deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete vote!');
        }
    }
    ////////////////////////Blog Manager //////////////////////////

     public function adminBlog()
    {
        $blogs = TinTuc::paginate(6); 
        return view('admin.pages.adminBlog.adminblog', compact('blogs'));
    }
    public function blogShow(Request $request)
    {
        $maNV = session('MaNV');
        
        // Validate request data
        $validatedData = $request->validate([
            'AnhDaiDien' => 'required', 
            'ThoiGian' => 'required|date',
            'TieuDe' => 'required',
            'NoiDung' => 'required',
        ]);

        // Tạo mới bản tin
        $blog = new TinTuc();
        $blog->MaNV = $maNV;
        $blog->AnhDaiDien = $request->AnhDaiDien;
        $blog->ThoiGian = $request->ThoiGian;
        $blog->TieuDe = $request->TieuDe;
        $blog->NoiDung = $request->NoiDung;
        $blog->save();

        // Redirect back with success message
        return redirect('/admin/adminBlog')->with('success', 'Bản tin được tạo thành công!');
    }

    public function createBlog()
    {
        return view('admin.pages.adminBlog.adminBlogCreate');
    }
    public function editBlog($id)
    {
        $blog = TinTuc::where('id', '=', $id)->first();
        return view('admin.pages.adminBlog.adminBlogUpdate', compact('blog'));
    }
    public function updateBlog(Request $request, $id)
    {
        $data = $request->only([
            'MaNV',
            'AnhDaiDien',
            'ThoiGian',
            'TieuDe',
            'NoiDung',
        ]);
        
        $blog = TinTuc::where('id', '=', $id);
        if(!$blog){
            return redirect('/admin/adminBlog')->with('error', 'Không tìm thấy nhà xuất bản để sửa.');
        }
        $blog->update($data);
    
        return redirect('/admin/adminBlog')->with('success', 'NXB updated successfully!');
    }
    public function deleteBlog($id)
    {
        // Xóa bản ghi có MaSach là $id
        $deleted = DB::delete('DELETE FROM tintuc WHERE id = ?', [$id]);

        if ($deleted) {
            return redirect()->back()->with('success', 'Book deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete book!');
        }
    }
        //////////////////////// Category Manager //////////////////////////
        public function adminCategorySmall()
        {
            $categorysmalls = TheloaiNho::paginate(6); 
            return view('admin.pages.adminCategorySmall.adminCategorySmall', compact('categorysmalls'));
        }
        public function categorySmallShow(Request $request)
        {
            $validatedData = $request->validate([
                'MaTL' => 'required', 
                'TenTL' => 'required',      
            ]);
        
            $latestTheLoaiCon = TheloaiNho::orderBy('MaTLCon', 'desc')->first();
        
            if ($latestTheLoaiCon) {
                $lastId = (int) substr($latestTheLoaiCon->MaTLCon, 3);
                $nextId = $lastId + 1;
                $validatedData['MaTLCon'] = 'TLC' . str_pad($nextId, 2, '0', STR_PAD_LEFT);     
            } else {
                // Nếu chưa có mã MaTLCon nào, bắt đầu từ TLC01
                $validatedData['MaTLCon'] = 'TLC01';
            }
        
            // dd($validatedData);
            TheloaiNho::create($validatedData);
        
            // Redirect back with success message
            return redirect('/admin/admincategorysmall')->with('success', 'Category created successfully!');
        }
        
        public function createCategorySmall()
        {
            $categorys=TheLoai::all();
            return view('admin.pages.adminCategorySmall.adminCategorySmallCreate',compact('categorys'));
        }
        public function editCategorySmall($id)
        {
            $categories=TheLoai::all();
            $categorysmall = TheloaiNho::where('MaTLCon', '=', $id)->first(); // Find the book by its ID
            return view('admin.pages.adminCategorySmall.adminCategorySmallUpdate', compact('categorysmall','categories'));
        }
        public function updateCategorySmall(Request $request, $id)
        {
            $data = $request->only([
                'MaTL',
                'TenTL',
            ]);
            $categorysmall = TheloaiNho::where('MaTLCon', '=', $id);
            if(!$categorysmall){
                return redirect('/admin/admincategorysmall')->with('error', 'Không tìm thấy sản phẩm để sửa.');
            }
            $categorysmall->update($data);
    
            return redirect('/admin/admincategorysmall')->with('success', 'Book updated successfully!');
        }
        public function deleteCategorySmall($id)
        {
            // Xóa bản ghi có MaSach là $id
            $deleted = DB::delete('DELETE FROM theloainho WHERE MaTLCon = ?', [$id]);
    
            if ($deleted) {
                return redirect()->back()->with('success', 'Book deleted successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to delete book!');
            }
        }
}
