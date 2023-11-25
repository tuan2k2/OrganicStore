@extends('frontend.format')
@section('content')
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Kết quả tìm kiếm</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($search_products as $key => $product_home)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg=" {{ asset('database/mysql_anh/anh_sanpham/'.$product_home->hinhAnhsp)}}">
                        <ul class="featured__item__pic__hover">
                            <li>
                                <a href="#"><i class="fa fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
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