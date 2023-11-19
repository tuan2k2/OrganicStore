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
        $pass = $request->input('matKhau');
        // $password = $request->input('password');

        // Kiểm tra xem người dùng là Khách hàng hay Admin
        $isAdminEmail = DB::table('admin')->where('email', $email)->exists();
        $isAdminPass =  DB::table('admin')->where('matKhau', $pass)->exists();
        $isCustomerEmail = DB::table('KhachHang')->where('email', $email)->exists();
        $isCustomerPass  =  DB::table('KhachHang')->where('matKhau', $pass)->exists();
        if ($isAdminEmail && $isAdminPass) {

            $id = DB::table('admin')->where('email', $email)->value('idAD');
            return redirect()->route('admin.dashboard', ['idAD' => $id]);
        } elseif ($isCustomerEmail && $isCustomerPass) {
            // Người dùng là Khách hàng, chuyển hướng tới trang khách hàng
            // Thực hiện kiểm tra mật khẩu ở đây nếu cần

            // $tenKH = DB::table('khachhang')->where('email', $email)->value('tenKH');
            // session(['username' => $tenKH, 'user_type' => 'customer']);
            return redirect()->route('home');
        } else {
            return 'email hoặc pass không đúng';
        }
    }
}
