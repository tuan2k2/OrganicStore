@extends('frontend.admin')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
        @if(Session::has('success_message'))
        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>
        @else
        <div class="alert alert-success">
            {{ Session::get('unsuccess_message') }}
        </div>
        @endif
        <?php
            use Illuminate\Support\Facades\Session;
                $message_1 = Session::get('message');
                if ($message_1) {
                    echo '<span class="text-alert">' . $message_1 . '</span>';
                    Session::put('message', null);
                }
        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;"></th>
            <th style="width:100px;">IDSP</th>
            <th style="width:170px;">Tên sản phẩm</th>
            <th style="width:100px;">Đơn giá</th>
            <th style="width:100px;">SLHC</th>
            <th style="width:550px;">Mô tả</th>
            <th style="width:100px;">Hình ảnh</th>
            <th style="width:250px;">Danh mục</th>
            <th style="width:150px;">Hiển thị</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($allSanPham as $key => $sp_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $sp_pro->maSanPham }}</td>
            <td>{{ $sp_pro->tenSanPham }}</td>
            <td>{{ $sp_pro->donGia}}</td>
            <td>{{ $sp_pro->soluongHienCon }}</td>
            <td>{{ $sp_pro->moTa}}</td>
            <td><img src="./database/mysql_anh/anh_sanpham/{{$sp_pro->hinhAnhsp}}" height="100" width="100"></td>
            <td>{{ $sp_pro->tenDanhMuc}}</td>
            <td><span class="text-ellipsis">
            <?php
                if ($sp_pro->hienThisp == 0) {
                    echo '<a href="' . route('unactive_product', ['maSanPham' => $sp_pro->maSanPham]) . '"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>';
                } else {
                    echo '<a href="' . route('active_product', ['maSanPham' => $sp_pro->maSanPham]) . '"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>';
                }
                ?>
            </span></td>
            <td><a href="{{ route('editSanPham', ['maSanPham' => $sp_pro->maSanPham]) }}" class="active" ui-toggle-class="">Sửa</a></td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" href="{{ route('deleteSanPham', ['maSanPham' => $sp_pro->maSanPham]) }}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a></td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
