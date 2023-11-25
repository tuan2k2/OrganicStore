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

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $all_category = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        //$allSanPham = DB::table('SanPham')->join('DanhMucSanPham', 'DanhMucSanPham.maDanhMuc', '=', 'SanPham.maDanhMuc')->orderBy('SanPham.maSanPham', 'desc')->get();
        $all_product_home = DB::table('SanPham')->where('hienThisp', '1')->orderby('maSanPham', 'desc')->limit(8)->get();
        // Trả về view 'home' và truyền dữ liệu vào view
        return view('client.Home')->with('all_category', $all_category)->with('all_product_home', $all_product_home);
    }


    public function searchController(Request $request)
    {
        $keyword = $request->keyword_submit;
        $all_category = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        //$allSanPham = DB::table('SanPham')->join('DanhMucSanPham', 'DanhMucSanPham.maDanhMuc', '=', 'SanPham.maDanhMuc')->orderBy('SanPham.maSanPham', 'desc')->get();
        $all_product_home = DB::table('SanPham')->where('hienThisp', '1')->orderby('maSanPham', 'desc')->limit(8)->get();
        // Trả về view 'home' và truyền dữ liệu vào view

        $search_products = DB::table('SanPham')->where('tenSanPham', 'like', '%' . $keyword . '%')->get();
        return view('client.search')
            ->with('all_category', $all_category)
            ->with('all_product_home', $all_product_home)
            ->with('search_products', $search_products);
    }
}
