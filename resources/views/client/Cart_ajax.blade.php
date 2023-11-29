@extends('frontend.format')
@section('content')
<section class="breadcrumb-section set-bg" data-setbg=" {{ asset('frontend/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                            <input type="submit" style="float: right; display: block;color: black;" class="site-btn" name="check_coupon" value="Áp mã giảm giá">
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
                        <a href="" class="primary-btn" style="  text-align: center;text-decoration: none;color: #fff;">Thanh toán</a>
                    </div>
                    @else
                    <a href="" class="primary-btn">Thanh toán</a>
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
                    <a href="" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection