<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ogani | Template</title>

    <!-- Google Font -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert.css') }}" type="text/css" />



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href=" {{ asset('frontend/css/styleChat.css ' )}}" type="text/css" rel="stylesheet">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt="" /></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-bag"></i>
                        <span>3</span></a>
                </li>
                <li>
                    <a href="/chat"><i class="fa fa-commenting"></i>
                        <span>3</span></a>
                </li>
            </ul>
            <div class="header__cart__price">
                item: <span>$150.00</span>
            </div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Login</a>
                </div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth" style="margin-left: 20px">
                <a href="#"><i class="fa fa-user"></i> Register</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li>
                    <a href="#">Categories</a>
                    <ul class="header__menu__dropdown">
                        <li>
                            <a href="./shop-details.html">Shop Details</a>
                        </li>
                        <li>
                            <a href="./shoping-cart.html">Shoping Cart</a>
                        </li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li>
                            <a href="./blog-details.html">Blog Details</a>
                        </li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    organicstore@gmail.com
                                </li>
                                <li>Miễn phí ship cho đơn từ 300.000Đ trở lên</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        </span>
                        @if(!Session::has('khachHang_data'))
                        <div class="header__top__right">
                            <div class="header__top__right__language header__top__right__auth">
                                <a class="d-inline" href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a>
                            </div>
                        </div>
                        @else
                        <div class="header__top__right">
                            <div class="header__top__right__language header__top__right__auth">
                                <a class="d-inline" href="#"><i class="fa fa-user"></i> {{ session('khachHang_data')->tenKH}}</a>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Profile</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a class="d-inline" href="{{ route('logout') }}"><i class="fa fa-user"></i>Đăng Xuất</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a id="a_tc" href="{{ route('home')}}">Trang chủ</a>
                            </li>
                            <li><a id="a_mh" href="{{route('Products')}}">Mua hàng</a></li>
                            <li>
                                <a href="#">Danh mục</a>
                                <ul class="header__menu__dropdown">
                                    <li>

                                        <a href="route('ShowGioHangProduct')">Giỏ hàng</a>
                                    </li>
                                    <li>
                                        <a href="./checkout.html">Thông tin giao hàng của bạn</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Giới thiệu</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-heart"></i>
                                    <span>1</span></a>
                            </li>
                            <li>
                                <a href="{{URL::to('/show-gio-hang')}}"><i class="fa fa-shopping-cart"></i>
                                    <span>3</span></a>
                            </li>
                            <li>
                                <a href="/chat"><i class="fa fa-commenting"></i>
                                    <span>3</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="POST" action="{{route('search')}}">
                                @csrf
                                <input type="text" name="keyword_submit" placeholder="Bạn đang cần gì?" />
                                <button type="submit" class="site-btn">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <section>
        <div class="container">
            <h3 class=" text-center">Messaging</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" class="search-bar" placeholder="Search">
                                    <span class="input-group-addon">
                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="inbox_chat cursor-pointer" id="connect">
                            @foreach ($users as $user)
                            @if ($user->idAD == 1)
                            <div class="chat_list" data-id="{{$user->idAD}}" data-img="url">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{$user->tenAdmin}} </h5>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history">
                            <div class="incoming_msg">
                                <!-- <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p class="text_send">Test which is a new approach to have all
                                        solutions</p>
                                    <span class="time_date"> 11:01 AM | June 9</span>
                                </div>
                            </div> -->
                            </div>
                            <div class="outgoing_msg">
                                <!-- <div class="sent_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM | June 9</span>
                            </div> -->
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message" id="title" />
                                <button class="msg_send_btn" type="button" id="send"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>




    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>
                            Get E-mail updates about our latest shop and special offers.
                        </p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail" />
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved | This template is made with
                                <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment">
                            <img src="img/payment-item.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.card_product_id_' + id).val();
                var cart_product_name = $('.card_product_name_' + id).val();
                var cart_product_image = $('.card_product_image_' + id).val();
                var cart_product_price = $('.card_product_price_' + id).val();
                var cart_product_qty = $('.card_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url("/add-cart-ajax")}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                    },
                    success: function(data) {
                        alert(data);
                    },
                    url: '{{route("addfcartajax")}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                    },
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{route('ShowGioHangProduct')}}";
                            });

                    },
                });
            });
        });
    </script>




    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        let connect = false;
        var channel;
        var pusher;
        var ownerId;
        document.getElementById('send').addEventListener('click', function() {
            const title = document.getElementById('title').value;
            $.ajax({
                type: 'POST',
                url: `{{url('send/chat')}}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": '',
                    'channel': 'chat-' + '{{$id_kh}}' + '-with-' + '{{$id_user}}',
                    'body': title,
                    'to': ownerId,
                }
            });
        });
        $(document).ready(function() {
            $('.chat_list').on('click', function(event) {
                console.log("check ownerId", ownerId);

                if (!ownerId || ownerId != $(this).data('id')) {
                    ownerId = $(this).data('id');
                    console.log("check ownerId", ownerId);
                    Pusher.logToConsole = true;

                    pusher = new Pusher('3c3641c3f12a98d0d7b7', {
                        wsHost: '127.0.0.1',
                        wsPort: '6001',
                        wssPort: '6001',
                        wsPath: null,
                        disableStats: true,
                        authEndpoint: `{{url('sockets/connect')}}`,
                        forceTLS: false,
                        cluster: 'ap1',
                        auth: {
                            headers: {
                                "X-CSRF-Token": "{{ csrf_token() }}",
                                "X-App-ID": null
                            }
                        },
                        enabledTransports: ["ws"]
                    });
                    channel = pusher.subscribe('chat-' + '{{$id_kh}}' + '-with-' + '{{$id_user}}');
                    connect = !connect;
                    channel.bind('log-message', function(data) {
                        const msgHistoryContainer = document.querySelector('.msg_history');
                        const newDiv = document.createElement('div');
                        const receivedMsg = document.createElement('div');
                        const receivedWithdMsg = document.createElement('div');
                        var userIdNow = "{{ Session::get('idKH') }}";
                        console.log('check id user', userIdNow);
                        if (data.from != userIdNow) {
                            newDiv.classList.add('incoming_msg');
                            const incomingMsgImg = document.createElement('div');
                            receivedMsg.classList.add('received_msg');
                            receivedWithdMsg.classList.add('received_withd_msg');
                        } else {
                            newDiv.classList.add('outgoing_msg');
                            const incomingMsgImg = document.createElement('div');
                            receivedMsg.classList.add('sent_msg');
                            receivedWithdMsg.classList.add('sent_msg');
                        }

                        const currentTime = new Date().toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        const currentDate = new Date().toLocaleDateString([], {
                            month: 'long',
                            day: 'numeric'
                        });

                        receivedWithdMsg.innerHTML = `
                        <p>${data.body}</p>
                        <span class="time_date">${currentTime} | ${currentDate}</span>
                    `;
                        receivedMsg.appendChild(receivedWithdMsg);
                        newDiv.appendChild(receivedMsg);
                        msgHistoryContainer.appendChild(newDiv);
                        // if (channel) {
                        //     channel.unbind_all();
                        //     const msgHistoryContainer = document.querySelector('.msg_history');
                        //     msgHistoryContainer.innerHTML = ''; // Xóa nội dung của phần tử
                        //     // ...
                        // }
                    });
                }
            })
        });
    </script>

</body>

</html>