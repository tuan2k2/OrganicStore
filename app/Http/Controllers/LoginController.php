<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\KhachHang;
use App\Models\Social;
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

        // Kiểm tra xem người dùng là Admin hay Khách hàng
        $isAdmin = Admin::where('taikhoan', $taikhoan)->where('matKhau', $pass)->first();
        $isCustomer = KhachHang::where('taikhoan', $taikhoan)->where('matKhau', $pass)->first();

        if ($isAdmin) {
            // Đăng nhập thành công với tư cách Admin
            Session::put('admin_name', $isAdmin->tenAdmin);
            Session::put('admin_id', $isAdmin->idAD);
            return redirect()->route('admin.dashboard');
        } elseif ($isCustomer) {
            // Đăng nhập thành công với tư cách Khách hàng
            session(['khachHang_data' => $isCustomer]);
            return redirect()->route('home');
        } else {
            // Đăng nhập không thành công
            Session::put('message', 'Mật khẩu hoặc tài khoản không chính xác. Vui lòng nhập lại');
            return redirect()->route('login')->with('message', 'Đăng nhập thành công');
        }
    }
    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook()
    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateUser($user, 'facebook');

        session(['khachHang_data' => $authUser]);

        return redirect()->route('home')->with('message', 'Đăng nhập thành công');
    }


    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback_google()
    {
        $user = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($user, 'google');

        session(['khachHang_data' => $authUser]);

        return redirect()->route('home')->with('message', 'Đăng nhập thành công');
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
        $request->session()->forget('admin_name');
        $request->session()->forget('admin_id');
        return redirect()->route('login'); // Hoặc điều hướng tới trang đăng nhập
    }
}
