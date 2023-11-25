@extends('frontend.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <?php
                use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                        <div class="position-center">
                    @foreach($editDanhMucSanPham as $key => $edit_value)
                            <form role="form" action="{{ route('updateDanhMuc', ['maDanhMuc' => $edit_value->maDanhMuc]) }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->tenDanhMuc}}" name="tenDanhMuc" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh danh mục</label>
                                    <input type="file" name="hinhAnhDanhMuc" class="form-control" id="exampleInputEmail1">
                                    <img src="{{ URL::to('./database/mysql_anh/anh_danhmuc/'.$edit_value->hinhAnh) }}" height="100" width="100">
                                </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="updateDanhMuc" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                    @endforeach
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
