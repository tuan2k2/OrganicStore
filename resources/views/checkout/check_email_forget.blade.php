<div>
    <div>
        <h2 style="text-align: center;">Xin chào {{$khachhang->tenKH}}</h2>
        <p>Email này giúp bạn lấy lại mật khẩu</p>
        <p>Vui lòng click vào link dưới đây để lấy mật khẩu</p>
        <p><a style="display: inline-block; background: green ; color: #fff; padding: 7px 25px; font-weight: bold;" href="{{ route('getPass', ['token' => $khachhang->kh_token]) }}">
                Đặt lại mật khẩu
            </a></p>
    </div>
    <h3>người đặt hàng</h3>
</div>