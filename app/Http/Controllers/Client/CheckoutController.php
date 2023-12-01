<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\tbl_order;
use App\Models\order_detail;
use App\Models\payment;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(Request $request)
    {
        // $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        return view('checkout.login_checkout');
    }

    public function checkoutPay()
    {
        // $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        $city = City::orderby('matp', 'ASC')->get();
        return view('checkout.checkoutPay')->with('city', $city);
    }

    public function save_checkout(Request $request)
    {
        $name = $request->input('shipping_name');
        $diaChiKH = $request->input('shipping_address');; // You may modify this to capture address data
        $sdt = $request->input('shipping_phone');
        $email = $request->input('shipping_email'); // Fetch 'email' field from the request
        $note = $request->input('shipping_note');

        //  Shipping 
        $newShipping = new Shipping();
        $newShipping->name = $name;
        $newShipping->diaChiKH = $diaChiKH;
        $newShipping->note = $note;
        $newShipping->SDT = $sdt;
        $newShipping->email = $email;


        $newShipping->save();

        Session::put('id', $newShipping->id);
        Session::put('name', $newShipping->name);
        // Payment 
        $payment = new payment();

        $payment->payment_method = $request->payment_option;
        $payment->payment_status = "Đang chờ xử lý";
        $payment->save();

        // order

        $order_tb = new tbl_order();

        $order_tb->idKH = Session::get('idKH');
        $order_tb->id = $newShipping->id;
        $order_tb->id_payment = $payment->id_payment;
        $order_tb->order_total = Cart::total();
        $order_tb->order_status = "Đang chờ xử lý";

        $order_tb->save();


        $content = Cart::content();
        // order_detail
        $order_detail = new order_detail();
        foreach ($content as $v_content) {
            $order_detail->id_order = $order_tb->id_order;
            $order_detail->product_id = $v_content->id;
            $order_detail->product_name = $v_content->name;
            $order_detail->product_price = $v_content->price;
            $order_detail->product_sales_quantity = $v_content->qty;
            $order_detail->save();
        }

        if ($payment->payment_method == 1) {
            Cart::destroy();
            return view('checkout.handCash');
        } elseif ($payment->payment_method == 2) {
            echo "thanh toán bằng ATM";
        } else {
            echo "Thẻ ghi nợ";
        }
        //  return Redirect()->route('payment');
    }


    public function manageOrder()
    {
        $all_orders = tbl_order::join('KhachHang', 'tbl_order.idKH', '=', 'KhachHang.idKH')
            ->select('tbl_order.*', 'KhachHang.tenKH as customer_name')
            ->orderByDesc('tbl_order.id_order')
            ->paginate(2);

        // Truyền thông tin đơn hàng và khách hàng tới view admin.manage_order
        return view('admin.manage_order', ['all_orders' => $all_orders]);
    }

    public function viewOrder($orderId)
    {
        $order = tbl_order::where('tbl_order.id_order', $orderId)
            ->join('KhachHang', 'tbl_order.idKH', '=', 'KhachHang.idKH')
            ->join('Shipping', 'tbl_order.id', '=', 'Shipping.id')
            ->join('order_detail', 'tbl_order.id_order', '=', 'order_detail.id_order')
            ->select(
                'tbl_order.*',
                'KhachHang.*',
                'Shipping.*',
                'order_detail.*'
            )
            ->first();

        return view('admin.viewOrder')->with('order', $order);
    }

    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                } else {
                    Session::put('fee', 25000);
                    Session::save();
                }
            }
        }
    }

    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name . '</option>';
                }
            } else {

                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name . '</option>';
                }
            }
            echo $output;
        }
    }

    public function del_fee()
    {
        Session::forget('fee');
        return redirect()->back();
    }
}
