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

class CategoryClientController extends Controller
{
    public function getAllProducts()
    {

        // $products = new products();

        // $productsList = $products->getAllProducts();

        $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        //$allSanPham = DB::table('SanPham')->join('DanhMucSanPham', 'DanhMucSanPham.maDanhMuc', '=', 'SanPham.maDanhMuc')->orderBy('SanPham.maSanPham', 'desc')->get();
        $all_product = DB::table('SanPham')->where('hienThisp', '1')->orderby('maSanPham', 'desc')->limit(12)->get();
        // Trả về view 'home' và truyền dữ liệu vào view
        return view('client.Products')->with('category', $cate_product)->with('all_product', $all_product);
    }
}
