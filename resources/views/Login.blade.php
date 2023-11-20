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
                alert(successMessage); // Hiển thị thông báo thành công
                window.location.href = '/login'; // Chuyển hướng về trang chủ sau khi thông báo được hiển thị (có thể thay đổi URL tương ứng)
            }

            if (errorMessage) {
                alert(errorMessage); // Hiển thị thông báo lỗi (nếu có)
            }
        };
    </script>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form id="signUp" method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
                @csrf
                <input type="text" name="tenKH" placeholder="Họ và tên" value="{{ old('tenKH') }}" id="tenKH">
                <div id="errorTenKH" class="error-message"></div>

                <input type="text" name="diaChiKH" placeholder="Address ID" value="{{ old('diaChiKH') }}" id="diaChiKH">
                <div id="errorDiaChiKH" class="error-message"></div>

                <input type="text" name="SDT" placeholder="Phone Number" value="{{ old('SDT') }}" id="SDT">
                <div id="errorSDT" class="error-message"></div>

                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" id="email">
                <div id="errorEmail" class="error-message"></div>

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

    <script>
        function validateForm() {
            var tenKH = document.getElementById('tenKH').value.trim();
            var diaChiKH = document.getElementById('diaChiKH').value.trim();
            var SDT = document.getElementById('SDT').value.trim();
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            var confirmPassword = document.getElementById('confirm_password').value.trim();

            // Kiểm tra và hiển thị thông báo lỗi
            if (tenKH === '') {
                document.getElementById('errorTenKH').innerHTML = 'Bạn phải nhập Họ và tên.';
                return false;
            } else {
                document.getElementById('errorTenKH').innerHTML = '';
            }
            if (diaChiKH === '') {
                document.getElementById('errorDiaChiKH').innerHTML = 'Bạn phải nhập Address ID.';
                return false;
            } else {
                document.getElementById('errorDiaChiKH').innerHTML = '';
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

            if (email === '') {
                document.getElementById('errorEmail').innerHTML = 'Bạn phải nhập Email.';
                return false;
            } else {
                document.getElementById('errorEmail').innerHTML = '';
            }
            // Kiểm tra email có phải là @gmail.com
            if (!email.endsWith('@gmail.com')) {
                alert('Email không phải là địa chỉ email @gmail.com.');
                return false;
            }

            $.ajax({
                url: '{{ route('
                register ') }}',
                method: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    if (response.exists) {
                        document.getElementById('errorEmail').innerHTML = 'Email đã tồn tại trong cơ sở dữ liệu.';
                        return false;
                    } else {
                        document.getElementById('errorEmail').innerHTML = '';
                        // If email doesn't exist in the database, continue form submission
                        return true;
                    }
                }
            });

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