<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{

    public function __construct()
    {
    }

    public function register(Request $request)
    {

        $tenKH = $request->input('tenKH');
        $diaChiKH = null;
        $sdt = $request->input('SDT');
        $email = $request->input('email');
        $password = $request->input('password');
        $existingEmail = DB::table('KhachHang')->where('Email', $email)->exists();
        $existingEmail = DB::table('KhachHang')->where('Email', $email)->exists();
        if ($existingEmail) {
            return redirect()->route('login')->with('alert', 'Email đã tồn tại');
        }


        DB::table('KhachHang')->insert([
            'tenKH' => $tenKH,
            'diaChiKH' => $diaChiKH,
            'SDT' => $sdt,
            'email' => $email,
            'matKhau' => $password,
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công!');
    }
}
