@extends('frontend.admin')
@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Responsive Table
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
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;"></th>
            <th style="width:70px;">Mã Danh mục</th>
            <th style="width:150px;">Tên danh mục</th>
            <th style="width:100px;">Hình ảnh</th>
            <th style="width:50px;">Hiển thị</th>
            <th style="width:50px;">Ngày thêm</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($allDanhMucSanPham as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cate_pro->maDanhMuc }}</td>
            <td>{{ $cate_pro->tenDanhMuc }}</td>
            <td><span class="text-ellipsis">{{ $cate_pro->hinhAnh }}</span></td>
            <td><span class="text-ellipsis">
            <?php
                if ($cate_pro->hienThi == 0) {
                    echo '<a href="' . route('unactive_category', ['maDanhMuc' => $cate_pro->maDanhMuc]) . '"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>';
                } else {
                    echo '<a href="' . route('active_category', ['maDanhMuc' => $cate_pro->maDanhMuc]) . '"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>';
                }
                ?>
            </span></td>
            <td><span class="text-ellipsis">12.05.2023</span></td>
            <td><a href="{{ route('editDanhMuc', ['maDanhMuc' => $cate_pro->maDanhMuc]) }}" class="active" ui-toggle-class="">Sửa</a></td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" href="{{ route('deleteDanhMuc', ['maDanhMuc' => $cate_pro->maDanhMuc]) }}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-trash"></i></a></td>
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
