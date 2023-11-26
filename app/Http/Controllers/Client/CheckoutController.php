<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\client\products;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(Request $request)
    {
        $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        return view('client.Cart')->with('cate_product', $cate_product);
    }
}
