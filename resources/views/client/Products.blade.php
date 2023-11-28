@extends('frontend.format')
@section('content')
<style>
    #a_mh {
        color: #7fad39;
    }

    #a_tc {
        color: #252525;
    }
</style>

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
                                <select class="select-filter" id="select-filter">
                                    <option value="0">Default</option>
                                    <option value="?kystu=asc">A-Z</option>
                                    <option value="?gia=asc">Giá từ cao - thấp</option>
                                    <option value="?gia=dec">Giá từ thấp - cao</option>
                                </select>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {

                                $(document).ready(function() {
                                    var active = location.search;
                                    $('#select-filter option[value"' + active + '"]').attr('selected', 'selected');
                                })
                                $('.select-filter').change(function() {
                                    var value = $(this).find(':selected').val(); // Sửa đổi $this thành $(this)
                                    //alert(value);
                                    if (value != "0") {
                                        var url = window.location.pathname + value; // Lấy URL hiện tại và thêm giá trị lọc vào sau dấu "?"
                                        window.location.href = url; // Chuyển hướng trang
                                    } else {
                                        alert('Hãy lọc sản phẩm');
                                    }
                                });
                            });
                        </script>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6>Sản phẩm mới nhất</h6>
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
                    @foreach($all_product as $key => $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product->maSanPham}}" class="card_product_id_{{$product->maSanPham}}">
                                <input type="hidden" value="{{$product->tenSanPham}}" class="card_product_name_{{$product->maSanPham}}">
                                <input type="hidden" value="{{$product->hinhAnhsp}}" class="card_product_image_{{$product->maSanPham}}">
                                <input type="hidden" value="{{$product->donGia}}" class="card_product_price_{{$product->maSanPham}}">
                                <input type="hidden" value="1" class="card_product_qty_{{$product->maSanPham}}">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('database/mysql_anh/anh_sanpham/'.$product->hinhAnhsp) }}" onclick="redirectToDetail(event, '{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}')" onmouseover="changeCursor()">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-retweet"></i></a>
                                        </li>
                                        <li>
                                            <a type="button" class="add-to-cart" onclick="addToCart(event)" data-id_product="{{$product->maSanPham}}"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
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
                            <div class="product__item__text">
                                <h6><a href="{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}">{{$product->tenSanPham}}</a></h6>
                                <h5><a href="{{ URL::to('/chi-tiet-san-pham/'.$product->maSanPham) }}">{{number_format($product->donGia).' VNĐ'}}</a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style=" display: flex; justify-content: center;align-items: center;">
                    {{ $all_product-> links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection