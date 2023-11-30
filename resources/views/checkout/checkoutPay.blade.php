@extends('frontend.format')
@section('content')
<!-- Breadcrumb Section Begin -->
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
                <div class="row">
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
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng</h4>
                            <div class="checkout__order__products">
                                Sản phẩm<span>Đơn giá</span>
                            </div>
                            <ul>
                                <li>Tổng đơn hàng <span>{{Cart::priceTotal(0, ',', '.').' VNĐ'}}</span></li>
                                <li>Thuế <span>0 VNĐ</span></li>
                            </ul>
                            <div class="checkout__order__subtotal">
                                Phí giao hàng <span>Free</span>
                                <div>
                                    <li>Giảm giá <span>0 VNĐ</span></li>
                                </div>
                            </div>
                            <div class="checkout__order__total">
                                Thành tiền <span>{{Cart::total(0, ',', '.').' VNĐ'}}</span>
                            </div>
                            <h3 style="font-size: 21px; text-align: center; margin: 12px 6px;color: blue; text-transform: uppercase;">Hình thức thanh toán</h3>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" class="payment_option" id="acc-or" name="payment_option" value="1">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán bằng thẻ ATM
                                    <input type="checkbox" class="payment_option" id="payment" name="payment_option" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Thẻ ghi nợ
                                    <input type="checkbox" class="payment_option" id="paypal" name="payment_option" value="3">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('.payment_option').on('change', function() {
                                        $('.payment_option').not(this).prop('checked', false);
                                    });
                                });
                            </script>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection