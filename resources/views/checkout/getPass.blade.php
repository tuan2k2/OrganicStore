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
    <?php

    use Illuminate\Support\Facades\Session;
    ?>

    <div class="container" id="container">
        <div class="form-container sign-in" style="width : 100%">
            <form method="POST">
                <span>Đặt lại mật khẩu</span>
                @csrf
                <input type="password" name="password" placeholder="Password" id="password">
                <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                @error('confirm_password')
                <small>{{$message}}</small>
                @enderror
                <button type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
    <script>
        window.onload = function() {
            var successMessage = "{{ session('Yes') }}";
            var errorMessage = "{{ session('No') }}";

            if (successMessage) {
                alert(successMessage);
                window.location.href = '/login'; // Redirect đến trang login khi thay đổi thành công
            }

            if (errorMessage) {
                alert(errorMessage);
            }
        };
    </script>
    <script src="{{asset('frontend/js/login_signup.js')}}"></script>
</body>


</html>