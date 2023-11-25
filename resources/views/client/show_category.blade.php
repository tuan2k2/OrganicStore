@extends('frontend.format')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg=" {{ asset('frontend/img/breadcrumb.jpg ' )}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Store</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ </a>
                        <span>Mua hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục sản phẩm</span>
                            </div>
                            <ul>
                                @foreach($category as $key => $cate)
                                <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->maDanhMuc)}}">{{$cate->tenDanhMuc}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">A-Z</option>
                                    <option value="0">Giá từ cao - thấp</option>
                                    <option value="0">Giá từ thấp - cao</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                @foreach($category_name as $key=>$category_sp)
                                <h6>{{$category_sp->tenDanhMuc}}</h6>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($category_by_id as $key => $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg=" {{ asset('database/mysql_anh/anh_sanpham/'.$product->hinhAnhsp)}}" onclick="redirectToDetail('{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}')" onmouseover="changeCursor()">
                                <ul class="product__item__pic__hover">
                                    <li>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-retweet"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                function redirectToDetail(url) {
                                    window.location.href = url;
                                }
                                function changeCursor() {
                                    document.body.style.cursor = 'pointer';
                                }
                            </script>
                            <div class="product__item__text">
                                <h6><a href="{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}">{{$product->tenSanPham}}</a></h6>
                                <h5><a href="{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}">{{number_format($product->donGia).' VNĐ'}}</a></h5>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Product Section End -->
@endsection

