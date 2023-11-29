<?php

namespace App\Http\Controllers\Admin;

use App\Models\tbl_coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function inrset_coupon()
    {
        return view('admin.coupon.insertCoupon');
    }
    public function edit_coupon($coupon_id)
    {
        $editCoupon = DB::table('tbl_coupon')->where('coupon_id', $coupon_id)->get();
        $manageallsp = view('admin.coupon.editCoupon')->with('editCoupon', $editCoupon);
        return view('admin.Home')->with('admin.cateories.editSanPham', $manageallsp);
    }
    public function update_coupon(Request $request, $coupon_id)
    {
        $data = array();
        $data['coupon_name'] = $request->input('coupon_name');
        $data['coupon_time'] = $request->input('coupon_time');
        $data['coupon_condition'] = $request->input('coupon_condition');
        $data['coupon_number'] = $request->input('coupon_number');
        $data['coupon_code'] = $request->input('coupon_code');
        DB::table('tbl_coupon')->where('coupon_id', $coupon_id)->update($data);
        Session::put('message', 'Cập nhật mã giảm thành công');
        return Redirect::to('/admin/list-coupon');
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
        DB::table('tbl_coupon')->where('coupon_id', $coupon_id)->delete();
        Session::put('message', 'Xóa mã giảm giá thành công');
        return Redirect::to('/admin/list-coupon');
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
        return Redirect::to('/admin/list-coupon');
    }

    public function list_coupon()
    {
        $coupon = tbl_coupon::orderby('coupon_id', 'DESC')->paginate(2);
        return view('admin.coupon.listCoupon')->with(compact('coupon'));
    }
}
