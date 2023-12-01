@extends('frontend.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <?php

            use Illuminate\Support\Facades\Session;

            $message_1 = Session::get('message');
            if ($message_1) {
                echo '<span class="text-alert">' . $message_1 . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($editSanPham as $key => $edit_sp)
                    <form role="form" action="{{ route('updateSanPham', ['maSanPham' => $edit_sp->maSanPham]) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="tenSanPham" class="form-control" id="exampleInputEmail1" value="{{$edit_sp->tenSanPham}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đơn giá sản phẩm</label>
                            <input type="text" name="giaSanPham" class="form-control" id="exampleInputEmail1" value="{{$edit_sp->donGia}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text" name="slSanPham" class="form-control" id="exampleInputEmail1" value="{{$edit_sp->soluongHienCon}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="5" type="text" name="motaSanPham" class="form-control" id="exampleInputEmail1">{{$edit_sp->moTa}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="hinhAnhSanPham" class="form-control" id="exampleInputEmail1">
                            <img src="{{ URL::to('./database/mysql_anh/anh_sanpham/'.$edit_sp->hinhAnhsp) }}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="product_cate">
                                @foreach($cate_product as $key => $cate)
                                @if($cate->maDanhMuc==$edit_sp->maDanhMuc)
                                <option selected value="{{$cate->maDanhMuc}}">{{$cate->tenDanhMuc}}</option>
                                @else
                                <option value="{{$cate->maDanhMuc}}">{{$cate->tenDanhMuc}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                </div>
                <div class="btn-container1">
                    <button type="submit" name="editSanPham" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
    @endsection