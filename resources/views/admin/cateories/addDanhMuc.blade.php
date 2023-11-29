@extends('frontend.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{Route('saveDanhMuc')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label class="label_name" for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="tenDanhMuc" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label class="label_name" for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="hinhAnhDanhMuc" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label class="label_name" for="exampleInputEmail1">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="category_product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                            </div>
                                <div class="btn-container1">
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                                </div>
                            </form>

                        </div>
                    </section>
            </div>
@endsection
