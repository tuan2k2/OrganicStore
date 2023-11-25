<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDanhMucSanPham(){
        return view('admin.cateories.addDanhMuc');
    }
    public function allDanhMucSanPham(){
        $allDanhMucSanPham = DB::table('DanhMucSanPham')->get();
        $managealldm = view('admin.cateories.allDanhMuc')->with('allDanhMucSanPham', $allDanhMucSanPham);
        return view('admin.Home')->with('admin.cateories.allDanhMuc', $managealldm);
    }
    public function saveDanhMucSanPham(Request $request){
        $data = array();
        $data['tenDanhMuc'] = $request->input('tenDanhMuc');
        $data['hienThi'] = $request->input('category_product_status');
        $get_image = $request->file('hinhAnhDanhMuc');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,10000).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./database/mysql_anh/anh_danhmuc', $new_image);
            $data['hinhAnh'] = $new_image;
            DB::table('DanhMucSanPham')->insert($data);
            Session::put('message', 'Thêm danh mục sản phẩm thành công');
            return Redirect::to('allDanhMuc');
        }
        $data['hinhAnh'] = '';
        DB::table('DanhMucSanPham')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('allDanhMuc');
    }
    public function unactive_category($maDanhMuc){
        DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->update(['hienThi' => 1]);
        Session::flash('success_message', 'Kích hoạt danh mục sản phẩm thành công');
        return redirect()->route('allDanhMuc');
    }
    public function active_category($maDanhMuc){
        DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->update(['hienThi' => 0]);
        Session::flash('unsuccess_message', 'Không kích hoạt danh mục sản phẩm');
        return redirect()->route('allDanhMuc');
    }
    public function editDanhMucSanPham($maDanhMuc){
        $editDanhMucSanPham = DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->get();
        $managealldm = view('admin.cateories.editDanhMuc')->with('editDanhMucSanPham', $editDanhMucSanPham);
        return view('admin.Home')->with('admin.cateories.editDanhMuc', $managealldm);
    }
    public function deleteDanhMucSanPham($maDanhMuc){
        DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('allDanhMuc');
    }
    public function updateDanhMucSanPham(Request $request, $maDanhMuc){
        $data = array();
        $data['tenDanhMuc'] = $request->input('tenDanhMuc');
        $get_image = $request->file('hinhAnhDanhMuc');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,10000).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./database/mysql_anh/anh_danhmuc', $new_image);
            $data['hinhAnh'] = $new_image;
            DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->update($data);
            Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
            return Redirect::to('allDanhMuc');
        }
        DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('allDanhMuc');
    }
    public function show_category_home($maDanhMuc){
        $cate_product = DB::table('DanhMucSanPham')->where('hienThi', '1')->orderby('maDanhMuc', 'desc')->get();
        $category_by_id = DB::table('SanPham')->join('DanhMucSanPham', 'SanPham.maDanhMuc', '=', 'DanhMucSanPham.maDanhMuc')->where('SanPham.maDanhMuc', $maDanhMuc)->get();
        $category_name = DB::table('DanhMucSanPham')->where('DanhMucSanPham.maDanhMuc', $maDanhMuc)->limit(1)->get();
        return view('client.show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }

}
