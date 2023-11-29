<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\KhachHang;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('checkout/Login');
    }

    public function checkLogin(Request $request)
    {
        $taikhoan = $request->input('taikhoan');
        $pass = $request->input('matKhau');
        $previousUrl = Session::get('previous_url');

        // Kiểm tra xem người dùng là Khách hàng hay Admin
        $isAdminEmail = DB::table('admin')->where('email', $taikhoan)->exists();
        $isAdminPass =  DB::table('admin')->where('matKhau', $pass)->exists();
        $isCustomerEmail = DB::table('KhachHang')->where('email', $taikhoan)->exists();
        $isCustomerPass  =  DB::table('KhachHang')->where('matKhau', $pass)->exists();
        if ($isAdminEmail && $isAdminPass) {

            $id = DB::table('admin')->where('email', $taikhoan)->value('idAD');
            $admin = DB::table('admin')->where('idAD', $id)->first();
            session(['admin_data' => $admin]);
            return redirect()->route('admin.dashboard', ['idAD' => $admin->idAD]);
        } elseif ($isCustomerEmail && $isCustomerPass) {
            $id = DB::table('khachhang')->where('email', $taikhoan)->value('idKH');
            $khachhang = DB::table('khachhang')->where('idKH', $id)->first();
            session(['khachHang_data' => $khachhang]);
            return redirect()->route('home');
        } else {
            return  redirect()->route('home');
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $existingUser = KhachHang::where('Email', $user->getEmail())->first();

        if (!$existingUser) {
            $newUser = KhachHang::create([
                'tenKH' => $user->getName(),
                'diaChiKH' => null,
                'SDT' => '',
                'Email' => $user->getEmail(),
                'matKhau' => ''
            ]);

            Social::create([
                'provider_user_id' => $user->getId(),
                'provider' => strtoupper($provider),
                'idKH' => $newUser->idKH
            ]);

            return $newUser;
        } else {
            $socialUser = Social::where('idKH', $existingUser->idKH)->first();

            if (!$socialUser) {
                Social::create([
                    'provider_user_id' => $user->getId(),
                    'provider' => strtoupper($provider),
                    'idKH' => $existingUser->idKH
                ]);
            }

            return $existingUser;
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('khachHang_data');

        return redirect()->route('login'); // Hoặc điều hướng tới trang đăng nhập
    }
}
