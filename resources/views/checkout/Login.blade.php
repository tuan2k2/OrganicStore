<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/login_signup.css')}}">
    <title>Modern Login Page | AsmrProg</title>
    <script>
        window.onload = function() {
            var successMessage = "{{ session('success') }}";
            var errorMessage = "{{ session('error') }}";

            if (successMessage) {
                alert(successMessage);
                window.location.href = '/login';
            }

            if (errorMessage) {
                alert(errorMessage);
            }

            var alertMessage = '{{ session("alert") }}';
            if (alertMessage) {
                toastr.error(alertMessage);
            }
        };
    </script>
</head>

<body>
    <?php

    use Illuminate\Support\Facades\Session;
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="signUp" method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
                <h2>Đăng ký tài khoản</h2>
                <div class="social-icons">
                    <a href="{{ route('login-google') }}" class="icon"><i id="icon" class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i id="icon" class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng Tài khoản để đăng ký tài khoản</span>
                @csrf
                <input type="text" name="tenKH" placeholder="Họ và tên" value="{{ old('tenKH') }}" id="tenKH">
                <div id="errorTenKH" class="error-message"></div>

                <input type="text" name="SDT" placeholder="SĐT" value="{{ old('SDT') }}" id="SDT">
                <div id="errorSDT" class="error-message"></div>

                <input name="taikhoan" placeholder="Tên đăng nhập" value="{{ old('taikhoan') }}" id="taikhoan">
                <div id="errorTaiKhoan" class="error-message"></div>

                <input type="password" name="password" placeholder="Password" id="password">
                <div id="errorPassword" class="error-message"></div>

                <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                <div id="errorConfirmPassword" class="error-message"></div>

                <button type="submit">Đăng ký</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login.authenticate') }}">
                @csrf
                <h1>Đăng nhập</h1>
                <div class=" social-icons">
                    <a href="{{ route('login-google') }}" class="icon"><i id="icon" class="fa-brands fa-google"></i></a>
                    <a href="{{ route('login-facebook') }}" class="icon"><i id="icon" class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản và mật khẩu của bạn</span>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <input name="taikhoan" placeholder="Tên đăng nhập">
                <input type="password" name="matKhau" placeholder="Mật khẩu">
                <p>Quên mật khẩu? Nhấn tại <a id="forgot_pass" href="{{route('forgotPass')}}">đây</a></p>
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

    <script>
        function validateForm() {
            var tenKH = document.getElementById('tenKH').value.trim();
            var SDT = document.getElementById('SDT').value.trim();
            var taikhoan = document.getElementById('taikhoan').value.trim();
            var password = document.getElementById('password').value.trim();
            var confirmPassword = document.getElementById('confirm_password').value.trim();
            // Kiểm tra và hiển thị thông báo lỗi
            if (tenKH === '') {
                document.getElementById('errorTenKH').innerHTML = 'Bạn phải nhập Họ và tên.';
                return false;
            } else {
                document.getElementById('errorTenKH').innerHTML = '';
            }
            if (SDT === '') {
                document.getElementById('errorSDT').innerHTML = 'Bạn phải nhập Phone Number.';
                return false;
            } else {
                document.getElementById('errorSDT').innerHTML = '';
            }
            if (isNaN(SDT) || SDT === '' || SDT.length !== 10 || !/^\d+$/.test(SDT)) {
                document.getElementById('errorSDT').innerHTML = 'Số điện thoại phải là số và có đúng 10 chữ số.';
                return false;
            } else {
                document.getElementById('errorSDT').innerHTML = '';
            }

            if (taikhoan === '') {
                document.getElementById('errorTaiKhoan').innerHTML = 'Bạn phải nhập tài khoản.';
                return false;
            } else {
                document.getElementById('errorTaiKhoan').innerHTML = '';
            }
            if (password === '') {
                document.getElementById('errorPassword').innerHTML = 'Bạn phải nhập Password.';
                return false;
            } else {
                document.getElementById('errorPassword').innerHTML = '';
            }

            if (confirmPassword === '') {
                document.getElementById('errorConfirmPassword').innerHTML = 'Bạn phải nhập Confirm Password.';
                return false;
            } else if (password !== confirmPassword) {
                document.getElementById('errorConfirmPassword').innerHTML = 'Confirm Password không trùng khớp với Password.';
                return false;
            } else {
                document.getElementById('errorConfirmPassword').innerHTML = '';
            }
            return true;
        }
    </script>



    <script src="{{asset('frontend/js/login_signup.js')}}"></script>
</body>


</html>