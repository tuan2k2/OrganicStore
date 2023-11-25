<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\client\products;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function addSanPham(){
        $cate_product = DB::table('DanhMucSanPham')->orderBy('maDanhMuc', 'desc')->get();
        return view('admin.cateories.addSanPham')->with('cate_product', $cate_product);
    }
    public function allSanPham(){
        $allSanPham = DB::table('SanPham')->join('DanhMucSanPham', 'DanhMucSanPham.maDanhMuc', '=', 'SanPham.maDanhMuc')->orderBy('SanPham.maSanPham', 'desc')->get();
        $manageallsp = view('admin.cateories.allSanPham')->with('allSanPham', $allSanPham);
        return view('admin.Home')->with('admin.cateories.allSanPham', $manageallsp);
    }
    public function saveSanPham(Request $request){
        $data = array();
        $data['tenSanPham'] = $request->input('tenSanPham');
        $data['donGia'] = $request->input('giaSanPham');
        $data['soluongHienCon'] = $request->input('slSanPham');
        $data['moTa'] = $request->input('motaSanPham');
        $data['maDanhMuc'] = $request->input('product_cate');
        $data['hienThisp'] = $request->input('product_status');
        $get_image = $request->file('hinhAnhSanPham');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,10000).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./database/mysql_anh/anh_sanpham', $new_image);
            $data['hinhAnhsp'] = $new_image;
            DB::table('SanPham')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('allSanPham');
        }
        $data['hinhAnhsp'] = '';
        DB::table('SanPham')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('allSanPham');
    }
    public function unactive_product($maSanPham){
        DB::table('SanPham')->where('maSanPham', $maSanPham)->update(['hienThisp' => 1]);
        Session::flash('success_message', 'Kích hoạt sản phẩm thành công');
        return redirect()->route('allSanPham');
    }
    public function active_product($maSanPham){
        DB::table('SanPham')->where('maSanPham', $maSanPham)->update(['hienThisp' => 0]);
        Session::flash('unsuccess_message', 'Không kích hoạt sản phẩm');
        return redirect()->route('allSanPham');
    }
    public function editSanPham($maSanPham){
        $cate_product = DB::table('DanhMucSanPham')->orderBy('maDanhMuc', 'desc')->get();
        $editSanPham = DB::table('SanPham')->where('maSanPham', $maSanPham)->get();
        $manageallsp = view('admin.cateories.editSanPham')->with('editSanPham', $editSanPham)->with('cate_product', $cate_product);
        return view('admin.Home')->with('admin.cateories.editSanPham', $manageallsp);
    }
    public function deleteSanPham($maSanPham){
        DB::table('SanPham')->where('maSanPham', $maSanPham)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('allSanPham');
    }
    public function updateSanPham(Request $request, $maSanPham){
        $data = array();
        $data['tenSanPham'] = $request->input('tenSanPham');
        $data['donGia'] = $request->input('giaSanPham');
        $data['soluongHienCon'] = $request->input('slSanPham');
        $data['moTa'] = $request->input('motaSanPham');
        $data['maDanhMuc'] = $request->input('product_cate');
        $data['hienThisp'] = $request->input('product_status');
        $get_image = $request->file('hinhAnhSanPham');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,10000).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./database/mysql_anh/anh_sanpham', $new_image);
            $data['hinhAnhsp'] = $new_image;
            DB::table('SanPham')->where('maSanPham', $maSanPham)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('allSanPham');
        }
        DB::table('SanPham')->where('maSanPham', $maSanPham)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('allSanPham');
    }
    public function details_product($maSanPham){
        $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        $details_product = DB::table('SanPham')->join('DanhMucSanPham', 'DanhMucSanPham.maDanhMuc', '=', 'SanPham.maDanhMuc')->where('SanPham.maSanPham', $maSanPham)->get();
        return view('client.ProductDetails');
    }
}
