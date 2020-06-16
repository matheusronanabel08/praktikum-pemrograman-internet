@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body class="animsition">
    <header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Welcome, {{ Auth::user()->name }}
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="/userProfile" class="flex-c-m trans-04 p-lr-25">
							Profile
						</a>

						<a class="flex-c-m trans-04 p-lr-25" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</div>
				</div>
            </div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="{{asset('assets/images/icons/logo-01.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="{{asset('assets/images/icons/logo-01.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="/login" class="flex-c-m p-lr-10 trans-04">
							Have an Account? Login.
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.html">Homepage 1</a></li>
						<li><a href="home-02.html">Homepage 2</a></li>
						<li><a href="home-03.html">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{asset('assets/images/icons/icon-close2.png')}}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
    <section class="sec-product-detail bg0 p-b-60" style="padding-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="{{asset('assets/images/seringai.jpg')}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('assets/images/seringai.jpg')}}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('assets/images/seringai.jpg')}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="{{asset('assets/images/seringai.jpg')}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('assets/images/seringai.jpg')}}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('assets/images/seringai.jpg')}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3" data-thumb="{{asset('assets/images/seringai.jpg')}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset('assets/images/seringai.jpg')}}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('assets/images/seringai.jpg')}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$products->product_name}}
                        </h4>

                        <span class="mtext-106 cl2">
                            {{$products->price}}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{$products->description}}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/addToCart/add" method="POST">
                                        @csrf
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">

                                            <input type="hidden" name="productId" value="{{$products->id}}">
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Additional information</a>
                        </li>

                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="information" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <ul class="p-lr-28 p-lr-15-sm">
                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Weight
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{$products->weight}} Kg
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Posted
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                {{$products->created_at}}
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Materials
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                60% cotton
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Color
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                Black, Blue, Grey, Green, Red, White
                                            </span>
                                        </li>

                                        <li class="flex-w flex-t p-b-7">
                                            <span class="stext-102 cl3 size-205">
                                                Size
                                            </span>

                                            <span class="stext-102 cl6 size-206">
                                                XL, L, M, S
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        @foreach ($product_review as $product_review)
                                            <div class="flex-w flex-t p-b-68">
                                                <div class="size-207">
                                                    <div class="flex-w flex-sb-m p-b-17">
                                                        <span class="mtext-107 cl2 p-r-20">
                                                            {{$product_review->name}}
                                                        </span>

                                                        <span class="fs-18 cl11">
                                                            {{$product_review->rate}} / 10
                                                        </span>
                                                    </div>

                                                    <p class="stext-102 cl6">
                                                        {{$product_review->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach


                                        <!-- Add review -->
                                        <form class="w-full" action="/productsReview/store" method="POST">

                                            @csrf

                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>

                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="content"></textarea>
                                                </div>

                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your Rating</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="rate">
                                                </div>

                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="hidden" name="product_id" value="{{$products->id}}">

                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                            </div>

                                            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                SKU: JAK-01
            </span>

            <span class="stext-107 cl6 p-lr-25">
                Categories: Jacket, Men
            </span>
        </div>
    </section>

    <!--===============================================================================================-->
	    <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
        <script>
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            })
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
        <script src="{{asset('assets/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/parallax100/parallax100.js')}}"></script>
        <script>
            $('.parallax100').parallax100();
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
        <script>
            $('.gallery-lb').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    },
                    mainClass: 'mfp-fade'
                });
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
        <script>
            $('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
                e.preventDefault();
            });

            $('.js-addwish-b2').each(function(){
                var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");

                    $(this).addClass('js-addedwish-b2');
                    $(this).off('click');
                });
            });

            $('.js-addwish-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");

                    $(this).addClass('js-addedwish-detail');
                    $(this).off('click');
                });
            });

            /*---------------------------------------------*/

            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });

        </script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script>
            $('.js-pscroll').each(function(){
                $(this).css('position','relative');
                $(this).css('overflow','hidden');
                var ps = new PerfectScrollbar(this, {
                    wheelSpeed: 1,
                    scrollingThreshold: 1000,
                    wheelPropagation: false,
                });

                $(window).on('resize', function(){
                    ps.update();
                })
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('assets/js/main.js')}}"></script>
</body>
