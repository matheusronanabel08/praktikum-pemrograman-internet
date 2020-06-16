@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products Checkout</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body class="animsition">
    <header class="header-v4">
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

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="{{asset('assets/images/icons/logo-01.png')}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.html">Home</a>
							</li>

							<li class="active-menu">
								<a href="product.html">Shop</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="shoping-cart.html">Features</a>
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

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
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

    <form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
                                    <th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
                                    <th class="column-4" style="text-align: center;">Quantity</th>
                                    <th class="column-5" style="text-align: center;">Action</th>
								</tr>

                                @foreach ($carts2 as $cart)
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="{{asset('assets/images/product-01.jpg')}}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">{{$cart->product_name}}</td>
                                        <td class="column-3">Rp {{$cart->price}}</td>
                                        <td class="column-4" style="text-align: center;">{{$cart->qty}}</td>
                                        <td class="column-5" style="text-align: center;">
                                            <form action="{{route('DeleteCarts', ['id'=>$cart->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger ml-2" onclick="return confirm('Delete?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
                        <form action="/productsCheckout/store" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Subtotal:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        Rp {{$total}}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Shipping:
                                    </span>
                                </div>

                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    <p class="stext-111 cl6 p-t-2">
                                        Silahkan isi form dibawah ini.
                                    </p>

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Hitung Ongkir
                                        </span>

                                        <input type="hidden" name="timeout" value="">

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Alamat">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="regency" placeholder="Kabupaten">
                                        </div>

                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" name="province">
                                                <option>-- Provinsi --</option>
                                                <option value="Bali">Bali</option>
                                                <option value="DKI Jakarta">DKI Jakarta</option>
                                                <option value="Jawa Barat">Jawa Barat</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <input type="hidden" name="total" value="{{$total1}}">

                                        <input type="hidden" name="shipping_cost" value="30000">

                                        <input type="hidden" name="sub_total" value="{{$total}}">

                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" name="couriers">
                                                <option>-- Couriers --</option>
                                                @foreach ($couriers as $couriers)
                                                    <option value="{{$couriers->id}}">{{$couriers->courier}}</option>
                                                @endforeach
                                            </select>

                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <span class="stext-112 cl8">
                                            Upload
                                        </span>
                                        <input type="file" name="proof_of_payment">

                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        Rp {{$total1}}
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </button>

                        </form>
					</div>
				</div>
			</div>
		</div>
	</form>


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
        <script src="{{asset('assets/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
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
