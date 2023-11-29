<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class forgotPassController extends Controller
{
    public function getforgot()
    {
        return view('checkout.forgotPass');
    }


    public function postgetforgot(Request $request)
    {

        $request->validate([
            'email' => 'required|exists:khachhang'
        ], [
            'email.required' => 'Vui lòng nhập đỉa chỉ email hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]);

        $token = strtoupper(Str::random(5));
        $khachhang = KhachHang::where('email', $request->email)->first();
        $khachhang->update(['kh_token' => $token]);
        Mail::send('checkout.check_email_forget', compact('khachhang'), function ($email) use ($khachhang) {
            $email->subject('Organic - Lấy lại mật khẩu tài khoản');
            $email->to($khachhang->Email, $khachhang->tenKH);
        });
        return redirect()->back()->with('yes', 'Vui lòng check mail để thực hiện thay đổi mật khẩu');
    }

    public function getPass($token)
    {

        $isToken = KhachHang::where('kh_token', $token)->exists();

        if ($isToken) {
            return view('checkout.getPass');
        }
        return abort(404);
    }


    public function postGetPass($token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $khachHang = KhachHang::where('kh_token', $token)->first(); // Lấy thông tin của KhachHang
        if ($khachHang) {
            // Đối tượng KhachHang được tìm thấy, bạn có thể thực hiện các thay đổi cần thiết ở đây
            // Ví dụ cập nhật mật khẩu
            $khachHang->update([
                'matKhau' => $request->password, // Cập nhật mật khẩu mới
                'kh_token' => null, // Đặt kh_token về null sau khi thay đổi mật khẩu
            ]);
            return redirect()->route('login')->with('Yes', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('No', 'Không thể thực hiện thay đổi mật khẩu');
        }
    }
}
