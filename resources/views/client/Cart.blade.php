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
<section class="shoping-cart spad">
    <div class="container">
        <?php

        use Gloudemans\Shoppingcart\Facades\Cart;
        use Illuminate\Support\Facades\Session;

        $content = Cart::content();
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
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
                            @foreach($content as $v_content)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="{{asset('database/mysql_anh/anh_sanpham/' .$v_content->options->image)}}" width="100px" height="100px" alt="">
                                    <h5>{{$v_content->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{number_format($v_content->price).' VNĐ'}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="{{URL::to('update-cart-quaty')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="pro-qty">
                                                <input type="number" name="cart_quantity" value="{{$v_content->qty}}" min="0">
                                            </div>
                                            <div>
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                            </div>
                                            <div>
                                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal) . ' VNĐ';
                                    ?>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{Route('Products')}}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form method="POST" action="{{Route('checkCoupon')}}">
                            @csrf
                            <input type="text" name="check_coupon" placeholder="Nhập mã giảm giá">
                            <button type="submit" class="site-btn">Áp dụng</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Bill</h5>
                    <ul>
                        <li>Tổng đơn hàng <span>{{Cart::priceTotal(0, ',', '.').' VNĐ'}}</span></li>
                        <li>Giảm giá <span>0 VNĐ</span></li>
                        <li>Thuế <span>0 VNĐ</span></li>
                        <li>Phí giao hàng <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total(0, ',', '.').' VNĐ'}}</span></li>
                    </ul>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection