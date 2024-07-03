<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHDB;
use App\Models\DanhGiaKH;
use App\Models\HoaDonBan;
use App\Models\Hoadonbank;
use App\Models\KhachHang;
use App\Models\NhanVien;
use App\Models\Sach;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function DoanhSo(){
        $staffInfo=NhanVien::where('UserName', '=',session('UserName'))->first(); 
        $nam = 2014; 
        $doanhSoTheoThang = [];
        $tongloinhuan=0;
        for ($i = 1; $i <= 12; $i++) {
            $totalGiaBan = 0; // Tổng giá bán của tháng
            $hoadons = HoaDonBan::whereYear('NgayBan', $nam)
                                ->whereMonth('NgayBan', $i)
                                ->get();
            
            foreach ($hoadons as $hoadon) {
                $chitiets = ChiTietHDB::where('SoHDB', $hoadon->SoHDB)->get();
                
                foreach ($chitiets as $chitiet) {
                    // Lấy thông tin của sách tương ứng với chi tiết hóa đơn
                    $sach = Sach::where('MaSach', $chitiet->MaSach)->first();
                    
                    if ($sach) {
                        // Tính tổng giá bán của mỗi sách
                        $totalGiaBan += $sach->GiaBan * $chitiet->SoLuongBan;
                    }
                }
            }
            
            // Thêm tổng giá bán của tháng vào mảng
            $doanhSoTheoThang[] = $totalGiaBan;
            $tongloinhuan+=$totalGiaBan;
        }
        $manv = session('MaNV');
        $listKH = KhachHang::whereHas('messages', function ($query) use ($manv) {
            $query->where('MaNV','=', $manv);
        })->get();
        $countKH=count($listKH);
        $hoadonbans1 = HoaDonBan::where('TrangThai', '=', 1)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbans2 = HoaDonBan::where('TrangThai', '=', 2)->where('MaNV','=',session('MaNV'))->get();
        $hoadonbanks1 = Hoadonbank::where('TrangThai', '=', 1)->where('MaNV','=',session('MaNV'))->get(); 
        $hoadonbanks2 = Hoadonbank::where('TrangThai', '=', 2)->where('MaNV','=',session('MaNV'))->get();
        $countHDB1=count($hoadonbans1)+count($hoadonbanks1);
        $countHDB2=count($hoadonbans2)+count($hoadonbanks2);
        $allDG=DanhGiaKH::all();
        $allDG=count($allDG);


        $theLoaiTheoSoLuongBan = DB::table('ChiTietHDB')
            ->join('Sach', 'ChiTietHDB.MaSach', '=', 'Sach.MaSach')
            ->select('Sach.MaTL', DB::raw('SUM(ChiTietHDB.SoLuongBan) as TongSoLuong'))
            ->groupBy('Sach.MaTL')
            ->get();
            foreach ($theLoaiTheoSoLuongBan as $theLoai) {
                $maTLArray[] = $theLoai->MaTL;
            
                // Lấy tên thể loại tương ứng với mã thể loại
                $tenTL = TheLoai::where('MaTL', $theLoai->MaTL)->pluck('TenTL')->first();
                $tenTLArray[] = $tenTL;
        }

        $voteCounts = DB::table('danhgiakh')
        ->select('Vote', DB::raw('count(*) as total'))
        ->groupBy('Vote')
        ->pluck('total', 'Vote')
        ->toArray();

        // Lưu các giá trị tổng số đánh giá vào mảng
        $voteTotals = [
            '1' => $voteCounts[1] ?? 0,
            '2' => $voteCounts[2] ?? 0,
            '3' => $voteCounts[3] ?? 0,
            '4' => $voteCounts[4] ?? 0,
            '5' => $voteCounts[5] ?? 0,
        ];

        $manv = session('MaNV');
        $listKHs = KhachHang::whereHas('messages', function ($query) use ($manv) {
            $query->where('MaNV','=', $manv);
        })->get();
        $tonghoadon = HoaDonBan::where('MaNV', '=', session('MaNV'))
        ->where(function ($query) {
            $query->where('TrangThai', '=', 1)
                  ->orWhere('TrangThai', '=', 2);
        })
        ->get();
        $listnhanviens = NhanVien::where('MaNV', '!=', 'NV06')->get();
        return view('admin.main', compact('tonghoadon','voteTotals','listKHs',
        'theLoaiTheoSoLuongBan','tenTLArray','doanhSoTheoThang','staffInfo',
        'tongloinhuan','countKH','countHDB1','countHDB2','allDG','listnhanviens'));
    }
    
    
    
}
