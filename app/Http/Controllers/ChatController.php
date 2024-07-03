<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\KhachHang;
use App\Models\Message;
use App\Models\NhanVien;
use App\Models\Sach;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function store(Request $request)
    {
        $idMessage = Message::where('MaKH', session('CustomorID'))->first();
        $request->validate([
            'message' => 'required|string',
            'check' => 'required|int',
        ]);

        $message = Message::create([
            'MaNV' => $idMessage->MaNV,
            'MaKH' => $idMessage->MaKH,
            'message' => $request->message,
            'thoigiannhan' => now(),
            'check' => $request->check,
            'ThongBao' => 2,
            'emoji' => 0,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message, 201);
    }

    public function index()
    {
        $messages = Message::where('MaKH', session('CustomorID'))->get();
        return response()->json($messages);
    }
    public function messageAdmin($maKH)
    {
        $manv = session('MaNV');
        $messages = Message::where('MaKH', $maKH)
                        ->where('MaNV', $manv)
                        ->get();
        return response()->json($messages);
    }

    public function productMess(Request $request,$masach)
    {
        $product = Sach::where('MaSach', '=', $masach)->first();
        $productMess = json_encode([$product->MaSach, $product->AnhDaiDien, $product->TenSach, $product->GiaBan]);
        $idMessage = Message::where('MaKH', session('CustomorID'))->first();
        $messageProduct = Message::create([
            'MaNV' => $idMessage->MaNV,
            'MaKH' => $idMessage->MaKH,
            'message' => $productMess,
            'thoigiannhan' => now(),
            'check' => 1,
            'ThongBao' => 2,
            'emoji' => 0,
        ]);

        broadcast(new MessageSent($messageProduct))->toOthers();
        return response()->json($messageProduct);
    }
    public function listKH()
    {
        $manv = session('MaNV');
        $listKH = KhachHang::whereHas('messages', function ($query) use ($manv) {
            $query->where('MaNV','=', $manv);
        })->get();
        return response()->json($listKH);
    }
    public function storeAdmin(Request $request)
    {
        $manv = session('MaNV');
        $request->validate([
            'MaKH' =>'required|string',
            'message' => 'required|string',
            'check' => 'required|int',
            // 'emoji' => 'required|int',
        ]);

        $message = Message::create([
            'MaNV' => $manv,
            'MaKH' => $request->MaKH,
            'message' => $request->message,
            'thoigiannhan' => now(),
            'check' => $request->check,
            'ThongBao' => 1,
            'emoji' => 0,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message, 201);
    }
    public function setEmoji(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $request->validate([
            'emoji' => 'required|int',
        ]);
        $message->update([
            'emoji' => $request->emoji,
        ]);
        broadcast(new MessageSent($message))->toOthers();
        return response()->json($message, 200);
    }
    public function restartNotification(Request $request,$makh)
    {
        // Lấy các tin nhắn có thuộc tính check bằng 1 và ThongBao bằng 2
        $manv = session('MaNV');
        $messages = Message::where('check', '=', 1)
                            ->where('MaNV', $manv)
                            ->where('MaKH', $makh)
                            ->where('ThongBao', '=', 2)->get();      
        foreach ($messages as $message) {
            $message->ThongBao = 0;
            $message->save();
        }
    
            broadcast(new MessageSent($messages))->toOthers();
        
        return response()->json($message, 200);
    }
    public function removeMessages(Request $request,$id)
    {
        $message = Message::findOrFail($id);
        $message->update([
            'message' => 'Tin nhắn đã bị thu hồi',
        ]);
        broadcast(new MessageSent($message))->toOthers();
        return response()->json($message, 200);
    }
    
    
}
