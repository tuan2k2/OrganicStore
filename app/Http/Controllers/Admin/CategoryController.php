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
        $data['hinhAnh'] = $request->input('hinhAnhDanhMuc');
        $data['hienThi'] = $request->input('category_product_status');

        DB::table('DanhMucSanPham')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('addDanhMuc');
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
        $data['hinhAnh'] = $request->input('hinhAnhDanhMuc');

        DB::table('DanhMucSanPham')->where('maDanhMuc', $maDanhMuc)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('allDanhMuc');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
