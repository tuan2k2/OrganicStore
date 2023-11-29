@extends('frontend.format')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="mb-5">
    <div class="container">
        <div class="hero__item set-bg" data-setbg=" {{ asset('frontend/img/hero/banner.jpg ' )}}">
            <div class="hero__text">
                <span>Trái cây tươi</span>
                <h2>Thực phẩm <br />100% Organic</h2>
                <p>Có sẵn nhận và giao hàng miễn phí</p>
                <a href="./shop-grid.html" class="primary-btn">Mua sắm ngay</a>
            </div>
        </div>
    </div>

</section>
<!-- Breadcrumb Section End -->

<!-- Categories Section Begin -->
<section class="categories mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Danh mục sản phẩm</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                @foreach($all_category as $key => $catego)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg=" {{ asset('database/mysql_anh/anh_danhmuc/'.$catego->hinhAnh)}}">
                        <h5><a href="#">{{$catego->tenDanhMuc}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($all_product_home as $key => $product_home)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=" {{ asset('database/mysql_anh/anh_sanpham/'.$product_home->hinhAnhsp)}}" onclick="redirectToDetail(event, '{{ URL::to('/chi-tiet-san-pham/'.$product_home->maSanPham) }}')" onmouseover="changeCursor()">
                        <ul class="featured__item__pic__hover">
                            <li>
                                <a href="#"><i class="fa fa-heart"></i></a>
                            </li>
                            <li>
                                <a type="button" class="add-to-cart" onclick="addToCart(event)" data-id_product="{{$product_home->maSanPham}}"><i class="fa fa-shopping-cart"></i></a>
                                <script>
                                    function redirectToDetail(event, url) {
                                        // Ngăn chặn sự kiện lan truyền lên cấp cao hơn
                                        event.stopPropagation();
                                        window.location.href = url;
                                    }

                                    function changeCursor() {
                                        document.body.style.cursor = 'pointer';
                                    }

                                    function addToCart(event) {
                                        // Ngăn chặn sự kiện lan truyền lên cấp cao hơn
                                        event.stopPropagation();
                                        // Thêm logic xử lý thêm vào giỏ hàng ở đây
                                    }
                                </script>
                            </li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product_home->tenSanPham}}</a></h6>
                        <h5>{{number_format($product_home->donGia).' VNĐ'}}</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-2.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
@endsection