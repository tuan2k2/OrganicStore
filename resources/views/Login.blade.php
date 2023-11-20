<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/login_signup.css')}}">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Đăng ký tài khoản</h1>
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                <!-- Hiển thị thông báo thành công nếu có -->
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="social-icons">
                    <a href="#" class="icon"><i id="icon" class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i id="icon" class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng Email để đăng ký tài khoản</span>
                <input type="text" name="tenKH" placeholder="Họ và tên">
                <input type="text" name="diaChiKH" placeholder="Address ID">
                <input type="text" name="SDT" placeholder="Phone Number">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Đăng ký</button>
            </form>

        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login.authenticate') }}">
                @csrf
                <h1>Đăng nhập</h1>
                <div class=" social-icons">
                    <a href="#" class="icon"><i id="icon" class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i id="icon" class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng Email và mật khẩu của bạn</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="matKhau" placeholder="Mật khẩu">
                <p>Quên mật khẩu? Nhấn tại <a id="forgot_pass" href="#">đây</a></p>
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Đăng nhập để sử dụng tất cả các tính năng của trang website. Nếu bạn chưa có tài khoản, mời đăng ký.</p>
                    <button class="hidden" id="login">Đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Chào bạn!</h1>
                    <p>Đăng ký tài khoản với thông tin cá nhân của bạn để trải nghiệm website một cách tốt nhất. Nếu bạn đã có tài khoản, mời đăng nhập.</p>
                    <button class="hidden" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('frontend/js/login_signup.js')}}"></script>
</body>

</html>