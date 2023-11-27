<?php

namespace App\Http\Controllers\Admin;

use App\Models\tbl_coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function inrset_coupon()
    {
        return view('admin.coupon.insertCoupon');
    }

    public function unset_coupon()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {

            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công');
        }
    }
    public function delete_coupon($coupon_id)
    {
        $coupon = tbl_coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect()->route('admin.coupon.listCoupon');
    }

    public function inrset_coupon_post(Request $request)
    {
        $data = $request->all();

        $coupon = new tbl_coupon();

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công');
        return Redirect()->route('admin.insretCoupon');
    }

    public function list_coupon()
    {
        $coupon = tbl_coupon::orderby('coupon_id', 'DESC')->paginate(2);
        return view('admin.coupon.listCoupon')->with(compact('coupon'));
    }
}
