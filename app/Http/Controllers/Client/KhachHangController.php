<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        $name = $request->input('tenKH');
        $diaChiKH = $request->input('diaChiKH');
        $SDT = $request->input('SDT');
        $email = $request->input('email');
        $password = $request->input('password');

        $validatedData = [
            'tenKH' => $name,
            'diaChiKH' => $diaChiKH,
            'SDT' => $SDT,
            'Email' => $email,
            'matKhau' => $password,
        ];

        // Kiểm tra điều kiện các trường dữ liệu ở đây
        // ...

        if (!str_ends_with($email, '@gmail.com')) {
            // Lưu thông báo lỗi vào Session
            Session::flash('error', 'Email phải kết thúc bằng @gmail.com');
            return redirect()->back();
        }

        // Nếu email hợp lệ, thêm dữ liệu vào cơ sở dữ liệu bằng Query Builder
        $inserted = DB::table('KhachHang')->insert([
            'tenKH' => $name,
            'diaChiKH' => $diaChiKH,
            'SDT' => $SDT,
            'email' => $email,
            'matKhau' => $password,
        ]);

        if ($inserted) {
            // Lưu thông báo thành công vào Session
            Session::flash('success', 'Đăng ký thành công');
        } else {
            // Lưu thông báo lỗi vào Session
            Session::flash('error', 'Đã xảy ra lỗi khi đăng ký');
        }

        return redirect()->back();
    }
}
