@extends('layouts.app')

@section('content')
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/util-login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main-login.css')}}">
<!--===============================================================================================-->
</head>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('assets/images/about-01.jpg')}}" alt="IMG">
            </div>

            <form method="POST" class="login100-form validate-form" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    {{ __('Admin Login') }}
                </span>

                <div class="wrap-input100 validate-input">
                    <input id="email" class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <span class="focus-input100"></span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        <span class="focus-input100"></span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center p-t-12">
                    @if (Route::has('password.request'))
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="{{ route('password.request') }}">
                            Username / Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assets/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="{{asset('assets/js/main.js')}}"></script>
@endsection
