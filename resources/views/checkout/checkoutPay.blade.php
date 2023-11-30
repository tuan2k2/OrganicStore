@extends('frontend.format')
@section('content')
<!-- Breadcrumb Section Begin -->
<?php

use Illuminate\Support\Facades\Session;

$total = session::get('total');
?>

<style>
    /* Định dạng các nhãn (labels) */
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* Định dạng các ô nhập liệu */
    .form-control {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    /* Định dạng các lựa chọn trong dropdown */
    select {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    /* Thiết lập màu nền cho dropdown */
    select:focus {
        outline: none;
        border-color: #66afe9;
        box-shadow: 0 0 10px #66afe9;
    }
</style>
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin giao hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Thông tin giao hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form action="{{ route('save_checkout') }}" method="POST">
                @csrf
                <div class="row" style="flex-wrap: nowrap;">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên<span>*</span></p>
                            <input type="text" name="shipping_name" />
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="shipping_address" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>SDT<span>*</span></p>
                                    <input type="text" name="shipping_phone" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="shipping_email" />
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="shipping_note" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                        <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                            <option value="0">Qua chuyển khoản</option>
                            <option value="1">Tiền mặt</option>
                        </select>
                    </div>
                </div>
            </form>

            <form>
                <div class="form-group">
                    <label for="city">Tỉnh/Thành phố:</label>
                    <select name="city" id="city" class="form-control choose city">
                        <option value="">--Chọn Tỉnh/Thành phố--</option>
                        @foreach($city as $key => $ci)
                        <option value="{{$ci->matp}}">{{$ci->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">Quận/Huyện:</label>
                    <select name="province" id="province" class="form-control province choose">
                        <option value="">--Chọn Quận/Huyện--</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ward">Xã/Phường:</label>
                    <select name="ward" id="ward" class="form-control wards">
                        <option value="">--Chọn Xã/Phường--</option>
                    </select>
                </div>
            </form>

        </div>

        <div class="col-sm-12 clearfix">
            @if(Session::get('cart')==true)
            <section class="shoping-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                            @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                            @endif
                            <div class="shoping__cart__table">
                                <form action="{{URL::to('update-cart')}}" method="post">
                                    {{csrf_field()}}
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="shoping__product">Danh sách thực phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach(Session::get('cart') as $key => $cart)
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img src="{{asset('database/mysql_anh/anh_sanpham/'.$cart['product_image'])}}" width="100px" height="100px" alt="">
                                                    <h5>{{$cart['product_name']}}</h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    {{number_format($cart['product_price']).' VNĐ'}}
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min="1">
                                                        </div>
                                                        <div>
                                                            <input type="hidden" value="{{$cart['session_id']}}" name="rowId_cart" class="form-control">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    <?php
                                                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                                                    $total += $subtotal;
                                                    echo number_format($subtotal) . ' VNĐ';
                                                    ?>
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a href="{{ route('delete-sp', ['session_id' => $cart['session_id']]) }}"><span class="icon_close"></span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <?php
                                    Session::put('total', $total);
                                    ?>
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="shoping__cart__btns" style="display: flex; justify-content: space-between;">
                                            <a href="{{route('Products')}}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                                            <a href="{{route('delete-all')}}" class="primary-btn cart-btn">Xóa tất cả</a>
                                            <input type="submit" style="outline: none; border: 1px solid #ccc;" name="update_qty" value="Cập nhật giỏ hàng" class="primary-btn cart-btn cart-btn-right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shoping__continue">
                                <div class="shoping__discount">
                                    <h5>Mã giảm giá</h5>
                                    <form method="POST" action="{{url('/check-coupon')}}">
                                        @csrf
                                        <input type=" text" name="coupon" placeholder="Nhập mã giảm giá">
                                        <input type="submit" style=" margin-top: 20px; display: block;color: black;" class="site-btn" name="check_coupon" value="Áp mã giảm giá">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5>Bill</h5>
                                <ul>
                                    <li>Tổng đơn hàng <span>{{number_format($total,0,',','.')}} VNĐ</span></li>
                                    @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                    <li>
                                        @if($cou['coupon_condition']==1)
                                        Mã giảm <span>{{$cou['coupon_number']}} %</span>
                                        <span>
                                            @php
                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                            echo '
                                        </span>
                                    <li>Tổng giảm <span>'.number_format($total_coupon,0,',','.').' VNĐ</span> </li>
                                    </span>';
                                    @endphp
                                    </span>
                                    <li>Tổng đã giảm <span>{{number_format($total-$total_coupon,0,',','.')}} VNĐ</span></li>
                                    </li>
                                    @elseif($cou['coupon_condition']==2)
                                    Mã giảm <span> {{number_format($cou['coupon_number'],0,',','.')}} VNĐ </span>
                                    <span>
                                        @php
                                        $total_coupon = $total - $cou['coupon_number'];
                                        @endphp
                                    </span>
                                    <span>
                                        <li>Tổng đã giảm <span> {{number_format($total_coupon,0,',','.')}} VNĐ </span></li>
                                    </span>
                                    @endif
                                    @endforeach
                                    </li>
                                    <li>Thuế <span>0 VNĐ</span></li>
                                    @endif
                                    <li>Phí giao hàng <span>Free</span></li>
                                    <li>Thành tiền <span></span></li>
                                </ul>
                                @if(Session::get('coupon'))
                                <div class="col-lg-12" style=" display: flex; justify-content: space-between;">
                                    <a href="{{url('/unset-coupon')}}" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;"> Xóa khuyến mãi</a>
                                    <?php
                                    $url = route('CheckoutPay');
                                    Session::put('previous_url', $url);
                                    ?>
                                    <?php
                                    $idKH = Session::get('idKH');
                                    if ($idKH != NULL) {
                                    ?>
                                        <a href="{{ route('CheckoutPay') }}" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;">Thanh toán</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href=" {{ route('login') }}" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;">Thanh toán</a>
                                    <?php
                                    }
                                    ?>

                                </div>
                                @else
                                <?php
                                $url = route('CheckoutPay');
                                Session::put('previous_url', $url);
                                ?>
                                <?php
                                $idKH = Session::get('idKH');
                                if ($idKH != NULL) {
                                ?>
                                    <a href="{{ route('CheckoutPay') }}" class="primary-btn">Thanh toán</a>
                                <?php
                                } else {
                                ?>
                                    <a href="{{ route('login') }}" class="primary-btn">Thanh toán</a>
                                <?php
                                }
                                ?>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @else
            <section class="shoping-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                            @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                            @endif
                            <div class="shoping__cart__table">
                                <form action="{{URL::to('update-cart')}}" method="post">
                                    {{csrf_field()}}
                                    <table>
                                        <tbody>
                                            <tr>
                                                <h3><?php
                                                    echo 'Giỏ hàng của bạn còn trống';
                                                    ?></h3>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="shoping__cart__btns">
                                            <a href="{{route('Products')}}" class="primary-btn cart-btn"> Mua hàng</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shoping__continue">
                                <div class="shoping__discount">
                                    <h5>Mã giảm giá</h5>
                                    <form action="#">
                                        <input type="text" placeholder="Nhập mã giảm giá">
                                        <button type="submit" class="site-btn">Áp dụng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5>Bill</h5>
                                <ul>
                                    <li>Tổng đơn hàng <span>0VNĐ</span></li>
                                    <li>Giảm giá <span>0 VNĐ</span></li>
                                    <li>Thuế <span>0 VNĐ</span></li>
                                    <li>Phí giao hàng <span>Free</span></li>
                                    <li>Thành tiền <span></span></li>
                                </ul>
                                <a href="{{route('Products')}}" class="primary-btn">Vui lòng mua hàng để Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection