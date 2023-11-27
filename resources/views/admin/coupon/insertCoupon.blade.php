@extends('frontend.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã giảm giá
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
                    <form role="form" action="{{Route('admin.insretCouponPost')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">mã giảm giá </label>
                            <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng</label>
                            <input type="text" name="coupon_times" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tính năng mã</label>
                            <select class="form-control input-sm m-bot15" name="coupon_condition">
                                <option value="0">------chọn-------</option>
                                <option value="1">giảm theo %</option>
                                <option value="2">giảm theo tiền </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhập số phần trăm hoặc tiền giảm</label>
                            <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1">
                        </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Thêm danh mục</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
    @endsection