@extends('frontend.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
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
                                <form role="form" action="{{Route('saveSanPham')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="tenSanPham" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đơn giá sản phẩm</label>
                                    <input type="text" name="giaSanPham" class="form-control" id="exampleInputEmail1" placeholder="Đơn giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" name="slSanPham" class="form-control" id="exampleInputEmail1" placeholder="Số lượng sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" type="text" name="motaSanPham" class="form-control" id="exampleInputEmail1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="hinhAnhSanPham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_cate">
                                        @foreach($cate_product as $key => $cate)
                                        <option value="{{$cate->hienThi}}">{{$cate->tenDanhMuc}}</option>
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
                                <div class="form-group">
                                <button type="submit" name="addSanPham" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
@endsection
