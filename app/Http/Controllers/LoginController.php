<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KhachHang;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;
use App\Models\Social; //sử dụng model Social
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
class LoginController extends Controller
{
    public function getLogin()
    {
        return view('Login');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('matKhau');
        // Kiểm tra xem người dùng là Khách hàng hay Admin
        $isAdminEmail = DB::table('admin')->where('email', $email)->exists();
        $isAdminPass =  DB::table('admin')->where('matKhau', $pass)->exists();
        $isCustomerEmail = DB::table('KhachHang')->where('email', $email)->exists();
        $isCustomerPass  =  DB::table('KhachHang')->where('matKhau', $pass)->exists();
        $resultAdmin = DB::table('admin')->where('email', $email)->where('matKhau', $pass)->first();
        if ($isAdminEmail && $isAdminPass) {
            Session::put('admin_name', $resultAdmin->tenAdmin);
            Session::put('admin_id', $resultAdmin->idAD);
            return  redirect()->route('admin.dashboard');
        } elseif ($isCustomerEmail && $isCustomerPass) {
            $id = DB::table('khachhang')->where('email', $email)->value('idKH');
            $khachhang = DB::table('khachhang')->where('idKH', $id)->first();
            session(['khachHang_data' => $khachhang]);
            return redirect()->route('home');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản không chính xác Vui lòng nhập lại');
            return Redirect::to('login');
        }
    }

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        dd($provider);
        //     $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
        //     if ($account) {
        //         $account_name = DB::table('KhachHang')->where('idKH', $account->idKH)->first();
        //         Session::put('tenKH', $account_name->tenKH);
        //         Session::put('idKH', $account_name->idKH);
        //         return redirect()->route('home')->with('message', 'Đăng nhập thành công');
        //     } else {

        //         $hieu = new Social([
        //             'provider_user_id' => $provider->getId(),
        //             'provider' => 'facebook'
        //         ]);

        //         $orang = DB::table('KhachHang')->where('Email', $provider->getEmail())->first();

        //         if (!$orang) {
        //             $orang = DB::table('khachHang')->insert([
        //                 'tenKH' => $provider->getName(),
        //                 'diaChiKH' => '',
        //                 'SDT' => '',
        //                 'Email' => $provider->getEmail(),
        //                 'matKhau' => ''
        //             ]);
        //         }
        //         $hieu->login()->associate($orang);
        //         $hieu->save();

        //         $account_name = DB::table('KhachHang')->where('idKH', $account->idKH)->first();

        //         Session::put('admin_login', $account_name->tenKH);
        //         Session::put('admin_id', $account_name->idKH);
        //         return redirect()->route('home')->with('message', 'Đăng nhập thành công');
        //     }
    }


    public function logout(Request $request)
    {
        $request->session()->forget('khachHang_data');
        $request->session()->forget('admin_name');
        $request->session()->forget('admin_id');
        return redirect()->route('login'); // Hoặc điều hướng tới trang đăng nhập
    }
}
