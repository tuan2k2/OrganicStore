<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\client\products;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_cart(Request $request)
    {
        $productId = $request->input('productid_hidden');
        $quantity = $request->input('qty');
        $product_info = DB::table('SanPham')->where('maSanPham', $productId)->first();

        // $data['maSanPham'] = $product_info->maSanPham;
        // $data['qty'] = $product_info->$quantity;
        // $data['tenSanPham'] = $product_info->tenSanPham;
        // $data['donGia'] = $product_info->donGia;
        // $data['options']['image'] = $product_info->hinhAnhsp;
        return view('client.Cart');
    }
    public function show_cart(Request $request)
    {
        $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
    }
}
