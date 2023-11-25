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
            <form method="POST" action="{{ route('forgot') }}">
                @csrf
                <span>Nhập email của bạn :</span>
                <input type="email" name="email" placeholder="Email">
                @error('email')
                <small>{{ $message }}</small>
                @enderror
                @if(Session::has('yes'))
                <div class="success-message">
                    {{ Session::get('yes') }}
                </div>
                @endif
                <button>Gửi</button>
            </form>
        </div>
    </div>

    <script src="{{asset('frontend/js/login_signup.js')}}"></script>
</body>


</html>