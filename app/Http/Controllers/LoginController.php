<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KhachHang;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{

    public function __construct()
    {
    }
    public function getLogin()
    {
        return view('Login');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
        // $password = $request->input('password');

        // Kiểm tra xem người dùng là Khách hàng hay Admin
        $isAdminEmail = DB::table('admin')->where('email', $email)->exists();
        $isAdminPass =  DB::table('admin')->where('password', $pass)->exists();
        $isCustomerEmail = DB::table('khachhang')->where('email', $email)->exists();
        $isCustomerPass  =  DB::table('khachhang')->where('password', $pass)->exists();
        if ($isAdminEmail && $isAdminPass) {
            // Người dùng là Admin, chuyển hướng tới trang admin
            // Thực hiện kiểm tra mật khẩu ở đây nếu cần
            $id = DB::table('admin')->where('email', $email)->value('id');
            return redirect()->route('admin.dashboard', ['id' => $id]);
        } elseif ($isCustomerEmail && $isCustomerPass) {
            // Người dùng là Khách hàng, chuyển hướng tới trang khách hàng
            // Thực hiện kiểm tra mật khẩu ở đây nếu cần

            // $tenKH = DB::table('khachhang')->where('email', $email)->value('tenKH');
            // session(['username' => $tenKH, 'user_type' => 'customer']);
            return redirect()->route('home');
        } else {
            // Email và pass không tồn tại trong cả hai bảng
            return 'Email or pass không đúng';
        }
    }
}
