<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KhachHang;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
            $admin = DB::table('admin')->where('idAD', $id)->first();
            session(['admin_data' => $admin]);
            return redirect()->route('admin.dashboard', ['idAD' => $admin->idAD]);
        } elseif ($isCustomerEmail && $isCustomerPass) {
            $id = DB::table('khachhang')->where('email', $email)->value('idKH');
            $khachhang = DB::table('khachhang')->where('idKH', $id)->first();
            if ($khachhang) {
                // Lấy mảng từ session (nếu đã tồn tại)
                $arrayUser = session('arrayUser', []);

                // Cập nhật đối tượng khách hàng trong mảng
                $arrayUser['khachhang'] = $khachhang;

                // Lưu mảng vào session
                session(['arrayUser' => $arrayUser]);

                // In mảng để kiểm tra
            } else {
                // Xử lý khi không tìm thấy khách hàng
            }
            Session::put('users', $khachhang);
            session(['khachHang_data' => $khachhang]);
            return redirect()->route('home');
        } else {
            return 'email hoặc pass không đúng';
        }
    }

    public function logout(Request $request)
    {
        //   $request->session()->forget('khachHang_data');

        return redirect()->route('login'); // Hoặc điều hướng tới trang đăng nhập
    }
}
