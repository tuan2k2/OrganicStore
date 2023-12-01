<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ogani | Template</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <link href=" {{ asset('frontend_admin/css/sb-admin-2.css ' )}}" rel="stylesheet ">
    <style>
        .form-control {
            padding-top: 0;
            padding-bottom: 0;
            padding-left: 0;
            padding-right: 0;
        }
    </style>
</head>

<body>


    <!-- Breadcrumb Section Begin -->
    <?php

    use Illuminate\Support\Facades\Session;

    $total = session::get('total');
    ?>
    <!-- Custom styles for this template-->
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt="" /></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-bag"></i>
                        <span>3</span></a>
                </li>
            </ul>
            <div class="header__cart__price">
                item: <span>$150.00</span>
            </div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Login</a>
                </div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth" style="margin-left: 20px">
                <a href="#"><i class="fa fa-user"></i> Register</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul class="header__menu__dropdown">
                        <li>
                            <a href="./shop-details.html">Shop Details</a>
                        </li>
                        <li>
                            <a href="./shoping-cart.html">Shoping Cart</a>
                        </li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li>
                            <a href="./blog-details.html">Blog Details</a>
                        </li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    organicstore@gmail.com
                                </li>
                                <li>Miễn phí ship cho đơn từ 300.000Đ trở lên</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        </span>
                        @if(!Session::has('khachHang_data'))
                        <div class="header__top__right">
                            <div class="header__top__right__language header__top__right__auth">
                                <a class="d-inline" href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
                            </div>
                        </div>
                        @else
                        <div class="header__top__right">
                            <div class="header__top__right__language header__top__right__auth">
                                <a class="d-inline" href="#"><i class="fa fa-user"></i> {{ session('khachHang_data')->tenKH}}</a>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Profile</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a class="d-inline" href="{{ route('logout') }}"><i class="fa fa-user"></i>Đăng Xuất</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a id="a_tc" href="{{ route('home')}}">Trang chủ</a>
                            </li>
                            <li><a id="a_mh" href="{{route('Products')}}">Mua hàng</a></li>
                            <li>
                                <a href="#">Danh mục</a>
                                <ul class="header__menu__dropdown">
                                    <li>

                                        <a href="route('ShowGioHangProduct')">Giỏ hàng</a>
                                    </li>
                                    <li>
                                        <a href="./checkout.html">Thông tin giao hàng của bạn</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Giới thiệu</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-heart"></i>
                                    <span>1</span></a>
                            </li>
                            <li>
                                <a href="{{URL::to('/show-gio-hang')}}"><i class="fa fa-shopping-cart"></i>
                                    <span>3</span></a>
                            </li>
                            <li>
                                <a href="/chat"><i class="fa fa-commenting"></i>
                                    <span>3</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="POST" action="{{route('search')}}">
                                @csrf
                                <input type="text" name="keyword_submit" placeholder="Bạn đang cần gì?" />
                                <button type="submit" class="site-btn">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <div id="notification" class="mx-3 invisible"></div>

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
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chọn thành phố</label>
                        <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                            <option value="">--Chọn tỉnh thành phố--</option>
                            @foreach($city as $key => $ci)
                            <option value="{{$ci->matp}}">{{$ci->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chọn quận huyện</label>
                        <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                            <option value="">--Chọn quận huyện--</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chọn xã phường</label>
                        <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                            <option value="">--Chọn xã phường--</option>
                        </select>
                    </div>
                    <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
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

                                    <div class="col-lg-12" style=" display: flex; justify-content: space-between;">
                                        <form action="{{route('vnpay')}}" method="POST">
                                            @csrf
                                            <button type="submit" name="redirect" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;"> Thanh Toán VNPay</a>
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
                                        <li>

                                            @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition']==1)
                                            Mã giảm : <span> {{$cou['coupon_number']}} % </span>
                                            <p>
                                                @php
                                                $total_coupon = ($total*$cou['coupon_number'])/100;

                                                @endphp
                                            </p>
                                            <p>
                                                @php
                                                $total_after_coupon = $total-$total_coupon;
                                                @endphp
                                            </p>
                                            @elseif($cou['coupon_condition']==2)
                                            Mã giảm <span>{{number_format($cou['coupon_number'],0,',','.')}} VNĐ</span>
                                            <p>
                                                @php
                                                $total_coupon = $total - $cou['coupon_number'];
                                                @endphp
                                            </p>
                                            @php
                                            $total_after_coupon = $total_coupon;
                                            @endphp
                                            @endif
                                            @endforeach
                                        </li>
                                        @endif

                                        @if(Session::get('fee'))
                                        <li>
                                            <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>

                                            Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}} VNĐ</span>
                                        </li>
                                        <?php $total_after_fee = $total + Session::get('fee'); ?>
                                        @endif
                                        <li>Thành tiền <span>
                                                @php
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                $total_after = $total_after_fee;
                                                echo number_format($total_after,0,',','.').'đ';
                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                $total_after = $total_after_coupon;
                                                echo number_format($total_after,0,',','.').'đ';
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                $total_after = $total_after_coupon;
                                                $total_after = $total_after + Session::get('fee');
                                                echo number_format($total_after,0,',','.').' VNĐ';
                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                $total_after = $total;
                                                echo number_format($total_after,0,',','.').'đ';
                                                }

                                                @endphp
                                            </span></li>
                                    </ul>
                                    @if(Session::get('coupon'))
                                    <div class="col-lg-12" style=" display: flex; justify-content: space-between;">
                                        <a href="{{url('/unset-coupon')}}" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;"> Xóa khuyến mãi</a>
                                        <?php
                                        $vnd_to_usd = $total_after / 23083;
                                        ?>
                                        <div id="paypal-button"></div>
                                        <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
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

    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>
                            Get E-mail updates about our latest shop and special offers.
                        </p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail" />
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved | This template is made with
                                <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment">
                            <img src="img/payment-item.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('frontend_admin/vendor/jquery/jquery.min.js' )}}"></script>
    <script src="{{ asset('frontend_admin/vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('frontend_admin/vendor/jquery-easing/jquery.easing.min.js' )}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('frontend_admin/js/sb-admin-2.min.js' )}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('frontend_admin/vendor/chart.js/Chart.min.js' )}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('frontend_admin/js/demo/chart-area-demo.js' )}}"></script>
    <script src="{{ asset('frontend_admin/js/demo/chart-pie-demo.js' )}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{url("select-delivery-home")}}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.card_product_id_' + id).val();
                var cart_product_name = $('.card_product_name_' + id).val();
                var cart_product_image = $('.card_product_image_' + id).val();
                var cart_product_price = $('.card_product_price_' + id).val();
                var cart_product_qty = $('.card_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url("/add-cart-ajax")}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                    },
                    success: function(data) {
                        alert(data);
                    },
                    url: '{{route("addfcartajax")}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                    },
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{route('ShowGioHangProduct')}}";
                            });

                    },
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{url("/select-delivery-home")}}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    alert('Làm ơn chọn để tính phí vận chuyển');
                } else {
                    $.ajax({
                        url: '{{url("/calculate-fee")}}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            xaid: xaid,
                            _token: _token
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var $usd = document.getElementById("vnd_to_usd").value;
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AW2h-sKbYB_RmqYo4VYPhQK9SLfOUzqKaP7AOuXA6eRYM9ec2Y2Nhxg0dYiCUIqw1NbxLe2p_BtfThSq',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: `${$usd}`,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Cảm ơn bạn đã mua hàng');
                });
            }
        }, '#paypal-button');
    </script>
    <!-- Checkout Section End -->
</body>

</html>