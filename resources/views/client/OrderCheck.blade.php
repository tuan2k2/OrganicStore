@extends('frontend.format')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg=" {{ asset('frontend/img/breadcrumb.jpg ')}}">
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
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ và tên<span>*</span></p>
                            <input type="text" />
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" />
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" />
                            <input type="text" placeholder="Apartment, suite, unite ect (optinal)" />
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" />
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" />
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng</h4>
                            <div class="checkout__order__products">
                                Sản phẩm<span>Đơn giá</span>
                            </div>
                            <ul>
                                <li>Vegetable’s Package <span>$75.99</span></li>
                                <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li>
                            </ul>
                            <div class="checkout__order__subtotal">
                                Phí ship <span>$750.99</span>
                                <div>
                                    Khuyến mãi <span>$750.99</span>
                                </div>
                            </div>
                            <div class="checkout__order__total">
                                Tổng đơn <span>$750.99</span>
                            </div>
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