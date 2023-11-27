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
                            @php
                                use Illuminate\Support\Facades\Session;
                                print_r(Session::get('cart'));
                            @endphp
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="" width="100px" height="100px" alt="">
                                    <h5></h5>
                                </td>
                                <td class="shoping__cart__price">
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="" method="post">
                                        <div class="pro-qty">
                                            <input type="number" name="cart_quantity" value="" min="0">
                                        </div>
                                        <div>
                                            <input type="hidden" value="" name="rowId_cart" class="form-control">
                                        </div>
                                        <div>
                                             <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                        </div>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href=""><span class="icon_close"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Cập nhật giỏ hàng</a>
                </div>
            </div>
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
                        <li>Tổng đơn hàng <span></span></li>
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
@endsection
