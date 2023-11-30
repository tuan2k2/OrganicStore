<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{

    public function __construct()
    {
    }

    public function register(Request $request)
    {
        $tenKH = $request->input('tenKH');
        $diaChiKH = null; // You may modify this to capture address data
        $taikhoan = $request->input('taikhoan');
        $sdt = $request->input('SDT');
        $email = $request->input('email'); // Fetch 'email' field from the request
        $password = $request->input('password');

        // Check if the 'taikhoan' already exists
        $existingAccount = KhachHang::where('taikhoan', $taikhoan)->exists();

        if ($existingAccount) {
            return redirect()->route('login')->with('error', 'Tài khoản đã tồn tại');
        }

        // Create a new instance of KhachHang model
        $newKhachHang = new KhachHang();
        $newKhachHang->tenKH = $tenKH;
        $newKhachHang->diaChiKH = $diaChiKH;
        $newKhachHang->taikhoan = $taikhoan;
        $newKhachHang->SDT = $sdt;
        $newKhachHang->email = $email;
        $newKhachHang->matKhau = $password;

        // Save the new KhachHang instance to the database
        $newKhachHang->save();

        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công!');
    }
}
