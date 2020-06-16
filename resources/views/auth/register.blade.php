@extends('layouts.app')

@section('content')

<head>
    <title></title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/util-login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main-login.css')}}">
<!--===============================================================================================-->
</head>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('assets/images/about-02.jpg')}}" alt="IMG">
            </div>

            <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                @csrf

                <span class="login100-form-title">
                    {{ __('Register') }}
                </span>

                <div class="wrap-input100 validate-input">
                    <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    <span class="symbol-input100">
                        <i class="fa fa-id-badge" aria-hidden="true"></i>
                    </span>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

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

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
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
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="text-center p-t-136">
                     
                    <a class="txt2" href="{{ route('login') }}">
                        Already have an Account? Login.
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
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