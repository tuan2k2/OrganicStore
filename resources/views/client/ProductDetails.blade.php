@extends('frontend.format')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg=" {{ asset('frontend/img/breadcrumb.jpg ' )}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./index.html">Mua hàng</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
@foreach($details_product as $key => $value)
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{ asset('database/mysql_anh/anh_sanpham/' . $value->hinhAnhsp) }}" alt="" height="540px" width="550px" />
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{ asset('frontend/img/product/details/product-details-1.jpg') }}" src="{{ asset('frontend/img/product/details/thumb-1.jpg') }}" alt="" height="120px" width="120px" />
                        <img data-imgbigurl="{{ asset('frontend/img/product/details/product-details-2.jpg') }}" src="{{ asset('frontend/img/product/details/thumb-2.jpg') }}" alt="" height="120px" width="120px" />
                        <img data-imgbigurl="{{ asset('frontend/img/product/details/product-details-3.jpg') }}" src="{{ asset('frontend/img/product/details/thumb-3.jpg') }}" alt="" height="120px" width="120px" />
                        <img data-imgbigurl="{{ asset('frontend/img/product/details/product-details-4.jpg') }}" src="{{ asset('frontend/img/product/details/thumb-4.jpg') }}" alt="" height="120px" width="120px" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$value -> tenSanPham}}</h3>
                    <p><span>ID sản phẩm: </span> {{$value->maSanPham}}...</p>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 đánh giá)</span>
                    </div>
                    <p><span>Mô tả: </span> {{$value->tenDanhMuc}}...</p>
                    <p><span>Tình trạng: </span> Còn hàng</p>
                    <form action="{{URL::to('/save-cart')}}" method="post">
                        {{ csrf_field() }}
                        <div class="product__details__price">{{number_format($value->donGia).' VNĐ'}}</div>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="qty" min="0" value="1" />
                                    <input type="hidden" name="productid_hidden" value="{{$value->maSanPham}}" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    </form>
                    <ul>
                        <li><b>Cân nặng</b> <span>0.5 kg</span></li>
                        <li>
                            <b>Chia sẽ</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Đánh giá <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{{$value->moTa}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Bình luận 1</h6>
                                <p>
                                    Vestibulum ac diam sit amet quam vehicula elementum sed
                                    sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                                    Proin eget tortor risus. Vivamus suscipit tortor eget
                                    felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                    vehicula elementum sed sit amet dui. Donec rutrum congue
                                    leo eget malesuada. Vivamus suscipit tortor eget felis
                                    porttitor volutpat. Curabitur arcu erat, accumsan id
                                    imperdiet et, porttitor at sem. Praesent sapien massa,
                                    convallis a pellentesque nec, egestas non nisi. Vestibulum
                                    ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Vestibulum ante ipsum primis in faucibus orci luctus et
                                    ultrices posuere cubilia Curae; Donec velit neque, auctor
                                    sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                                    eget tortor risus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($related_product as $key => $all)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('database/mysql_anh/anh_sanpham/'.$all->hinhAnhsp)}}">
                        <ul class="product__item__pic__hover">
                            <li>
                                <a href="#"><i class="fa fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$all -> tenSanPham}}</a></h6>
                        <h5>{{number_format($all->donGia).' VNĐ'}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection