<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="caffeinated" content="false">

    <title>{{ $metaData['title'] ?? 'SAF' }}</title>
    <meta name="description" content="{{ $metaData['description'] ?? 'SAF' }}">
  	<meta name="keywords" content="{{ $metaData['keywords'] ?? 'SAF' }}">
  	<link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--end::Fonts-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{asset('plugins/global/plugins.bundlef552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/style.bundlef552.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->

	<!--begin::Owl Carousel Theme Styles(used by all pages)-->
	<link href="{{asset('plugins/custom/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('plugins/custom/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Owl Carousel Theme Styles-->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">

	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{asset('css/themes/layout/header/base/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/header/menu/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/brand/darkf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/aside/darkf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/custom.css?v=1.2') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/login-1.css') }}" rel="stylesheet" type="text/css" />

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108864587-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-108864587-1');
	</script>


	<meta name="facebook-domain-verification" content="drr75q40cdipzlyay16lnapxkxnsog" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-P23KC4G2');</script>
	<!-- End Google Tag Manager -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11381686179"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-11381686179');
	</script>

	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11386587174"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11386587174'); </script>

	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11385051980"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11385051980'); </script>

	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11385052634"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11385052634'); </script>

	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11384929312"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11384929312'); </script>


	<!-- Google tag (gtag.js) --> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11385053660"></script> 
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11385053660'); </script>



	<!-- Event snippet for Submit_Registrations conversion page
	In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
	<script>
	function gtag_report_conversion(url) {
	  var callback = function () {
	    if (typeof(url) != 'undefined') {
	      window.location = url;
	    }
	  };
	  gtag('event', 'conversion', {
	      'send_to': 'AW-11381686179/v8_gCNKhze4YEKP_mrMq',
	      'event_callback': callback
	  });
	  return false;
	}
	</script>

	

	@stack('pixelCode')

	{!! htmlScriptTagJsApi() !!}

	<script type="text/javascript">
    	var __BASE_URL_JS__ = '{{ url("/") }}';
    	var __BASE_URL_JS_FLAG__ = '{{ Auth::check() && Auth::user()->getRoleType() == "VIP" ? 1 : 0 }}';
    </script>

	@stack('style')

</head>

<style>
	.mymodal {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
	z-index: 999;
}
.mymodal  .modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 1rem 1.5rem;
    width:50rem;
    border-radius: 0rem;
	padding:70px 50px;
	text-align:center;
}

@media (max-width:767px){
	.mymodal .modal-content{
		width:95%;
	}
}

.close-button {
    width: 2.5rem;
    line-height: 2rem;
    text-align: center;
    padding: 0px 5px 5px 5px;
    cursor: pointer;
    border-radius: 0;
    background-color: black;
    color: white;
    position: absolute;
    top: 0;
    right: 0;
    font-size: 28px;
}
.close-button:hover {
    background-color: darkgray;
}
.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}

.trigger-btn{
	cursor: pointer;
    list-style-type: none;
    position: absolute;
    right: 65px;
    top: 28%;
}

.trigger-btn i{
	background:black;
	color:white;
	padding:6px;
	border-radius:3px;
}

@media (max-width:767px){
	.trigger-btn{
		right:72px;
	}
}

.search-form-saf input[type="submit"]{
	font-size: 20px;
    color: black;
    text-decoration: underline;
    text-transform: capitalize;
	background:none;
	border:0;
	margin-top:10px;
}


</style>

<body>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P23KC4G2"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


    <div id="app">
	    <div id="myNav" class="overlay">
	        <div class="overlay-content">
	            <div class="container">
	                <li><a href="{{route('about')}}">About</a></li>
	                <li><a href="{{route('venues')}}">Venues</a></li>
	                <li><a href="{{route('curators')}}">Curators</a></li>
	                <li id="gif_new"><a href="{{route('programs')}}"><img src="{{asset('image/new-gif.gif')}}"> Programs</a></li>
	                <li id="gif_new"><a href="{{route('exhibitions')}}" id="exhb_new"><img src="{{asset('image/new-gif.gif')}}"> Exhibitions & Installations</a></li>
	                <!-- <li><a href="{{route('dashboard')}}">Dashboard</a></li> -->
	                <li id="gif_new"><a href="{{route('register')}}" id="exhb_new"><img src="{{asset('image/new-gif.gif')}}"> Register now</a></li>
					<!-- <li><a href="{{route('apply.as.a.volunteer')}}">Apply as a Volunteer</a></li> -->
					<li><a href="{{route('our.partners')}}">Partners</a></li>
					<li><a href="{{route('vibes')}}">Eat Drink Stay</a></li>
	                <li><a href="{{route('contact')}}">Contact us</a></li>
	            </div>
	        </div>
	    </div>


		

	    <header class="main-header">


	<div class="topborder">
			
		</div>
	        <div class="container">
	            <div class="row">
	                <div class="col-md-7">
	                     <div class="left-block">
	                        <div class="logo">
	                            <!-- <a href="<?php echo url('/') ?>">Serendipity arts festival 2023</a> -->
	                            <a href="<?php echo url('/') ?>"><img src="{{asset('image/SAF-logosvg.svg')}}" alt=""></a>
	                        </div>

	                    </div>
	                </div>
	                <div class="col-md-5">
	                    <div class="right-block">
	                    	@if(Auth::check())
								<li class="drop-btn">Hi, {{ Auth::user()->name ? strtok(Auth::user()->name, ' ') : 'N/A' }} ↓
									<ul class="dropdowncstm">
										<li><a href="{{ route('dashboard') }}">My Account</a></li>
									 	<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"> {{__('Logout')}}</a> </li>
					                  	<form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
						                    {{ csrf_field() }}
					                  	</form>

									</ul>
								</li>

                        	@else 
								<!-- <li class="search-btn"><i class="fa fa-search" data-toggle="modal" data-target="#searchprog"></i></li> -->
                        		<li class="lgn-btn"><a href="{{route('login')}}">Login/Register</a></li>
							@endif


							<li class="header-cart">
								<a href="{{ route('cart.index') }}">
									<i class="fas fa-calendar-alt fa-2x" aria-hidden="true"></i>
		                        	<span class="cart-counter">{{ \Helper::getCartCount() }}</span>
		                        </a>
							</li>

							<li class="trigger-btn"><i class="fa fa-search"></i></li>
	                        
	                        <a class="nav-toggle"><span></span></a>
	                    </div>
	                </div>
	            </div>
	        </div>


			

		</header>

	    <main class="">
	        @yield('content')
	    </main>


		<section class="fixmob-btn">
			<div class="container">
	            <div class="row">

					<div class="col-md-12">
						<ul class="link-icon">
							<li><a href="{{route('register')}}"><i class="fa fa-edit"></i><p class="iconname">Register Now</p></a></li>
							<li><a href="{{route('curators')}}"><i class="fas fa-user-alt"></i><p class="iconname">Curators</p></a></li>
							<li><a href="https://api.whatsapp.com/send/?phone=9773972220&text=Hi"><i class="fas fa-comments"></i><p class="iconname">Chat</p></a></li>
							<li><a href="{{route('venues')}}"><i class="fa fa-map-marker-alt"></i><p class="iconname">Venues</p></a></li>
						</ul>
					</div>

				</div>
			</div>
		</section>
	        
	    <footer class="main-footer">
	        <div class="container">
			<div class="row">
					<div class="col-md-12">
						<h1 class="findbadgeformtitle">Find Your M-Ticket</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<form class="loginfrm findbadgeform" method="POST" action="{{ route('find.badge.submit') }}">
							@csrf
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" id="email" name="email" placeholder="Type your email" value="" required="" autocomplete="email">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" id="contact" name="contact" placeholder=" Type your contact number" required="" autocomplete="new-contact" value="">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="submit" value="Download M-Ticket ⟶">
									</div>	
								</div>
							</div>
						</form>
					</div>
				</div>
	            <div class="row">

	                <div class="col-md-3">
	                    <div class="footer-logo">
						<a href="<?php echo url('/') ?>"><img style="width: 70%;" src="{{url('/image/footer-logo-saf23.svg')}}" width="90%"></a>
	                    </div>
	                </div>

	                <div class="col-md-3">
	                    <div class="quick-links">
	                        <h4>Quick Links</h4>
	                        <ul class="footer-menus">
	                        	<li><a href="{{route('home')}}">Home</a></li>
				                <li><a href="{{route('venues')}}">Venues</a></li>
				                <li><a href="{{route('curators')}}">Curators</a></li>
				                <li><a href="{{route('programs')}}">Programs</a></li>
				                <li><a href="{{route('exhibitions')}}">Exhibitions</a></li>
				                <!-- <li><a href="{{route('dashboard')}}">Dashboard</a></li> -->
				                <li><a href="{{route('login')}}">Login</a></li>
				                <li><a href="{{route('register')}}">Register now</a></li>
				                <!-- <li><a href="{{route('apply.as.a.volunteer')}}">Apply as a Volunteer</a></li> -->
				                <li><a href="{{route('contact')}}">Contact us</a></li>
				                <!--<li><a href="{{route('media.stories')}}">Media</a></li> -->
								<li><a href="{{route('our.partners')}}">Partners</a></li>
								<li><a href="{{route('vibes')}}">Eat Drink Stay</a></li>
								<li><a href="https://archive.serendipityartsfestival.com/">Archive</a></li>
								<li><a href="{{route('disclaimer')}}">Disclaimer</a></li>
								<li><a href="{{route('terms.conditions')}}">Terms & Conditions</a></li>
	                        </ul>
	                    </div>
	                </div>

	                <div class="col-md-3">
	                    <div class="contact-details">
	                        <h4>Get in Touch</h4>
	                        <a href="mailto:info@serendipityarts.org"><i class="fa fa-envelope"></i> info@serendipityarts.org</a>
	                        <a href="tel:011 4554 6121"><i class="fa fa-phone-alt"></i> 011 4554 6121</a>
	                        <a href="#"><i class="fa fa-map-marker-alt"></i> C-340 Chetna Marg, Block C, Defence Colony, New Delhi-110024</a>
	                    </div>
	                </div>

	                <div class="col-md-3">
	                    <div class="social-icon">
	                        <h4>Follow us on</h4>
	                        
	                        <a href="https://www.facebook.com/serendipityartsfestival/" target="_blank"><i class="fab fa-facebook-f"></i></a>
	                        <a href="https://twitter.com/festserendipity?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
							<a href="https://www.instagram.com/serendipityartsfestival/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
							<a href="https://www.youtube.com/@SerendipityArtsFestival?sub_confirmation=1" target="_blank"><i class="fab fa-youtube"></i></a>
	                    </div>
	                </div>

	            </div>
	        </div>
			<div class="footerimg"><img src="{{ asset('image/footerbgimg.png') }}"></div>
	    </footer>

		<div class="mymodal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1 style="color:#000; margin-bottom:25px;">Search Program</h1>
		<form class="search-form-saf" action="/programs/">
			<input type="text" name="search" class="form-control" placeholder="Search...">
			<input type="submit" value="Submit ⟶">
		</form>
    </div>
</div>

	<div class="whts-btn"><a target="_blank" href="https://api.whatsapp.com/send/?phone=9773972220&text=Hi"><img src="{{url('/image/whatsapp.png')}}" width="100%"></a></div>	

	<button onclick="topFunction()" id="myBtn" ><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

	</div>
</body>

<script>
	var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
</script>
<script src="{{asset('plugins/global/plugins.bundlef552.js?v=7.1.8')}}"></script>
<script src="{{asset('plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8')}}"></script>
<script src="{{asset('js/scripts.bundlef552.js?v=7.1.8')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.424/build/spline-viewer.js"></script>

<!--begin::Owl Carousel Theme Styles(used by all pages)-->
<script src="{{asset('plugins/custom/owlcarousel/owl.carousel.js')}}"></script>
<!--end::Owl Carousel Theme Styles-->

<!-- Custom Scripts -->
<script src="{{asset('js/mymain.js?v=1.0') }}"></script>   

@stack('scripts')

<script type="text/javascript">
	var KTSummernoteDemo = function () {
		// Private functions
		var demos = function () {
			$('.summernote-editor').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				demos();
			}
		};
	}();

	// Initialization
	jQuery(document).ready(function() {
		KTSummernoteDemo.init();
	});
</script>

<script type="text/javascript">
	// Class definition

	var KTBootstrapDatepicker = function () {

		var arrows;
		if (KTUtil.isRTL()) {
			arrows = {
				leftArrow: '<i class="la la-angle-right"></i>',
				rightArrow: '<i class="la la-angle-left"></i>'
			}
		} else {
			arrows = {
				leftArrow: '<i class="la la-angle-left"></i>',
				rightArrow: '<i class="la la-angle-right"></i>'
			}
		}

		// Private functions
		var demos = function () {
			// minimum setup
			$('.kt_datepicker').datepicker({
				rtl: KTUtil.isRTL(),
				todayHighlight: true,
				orientation: "bottom left",
				templates: arrows,
				autoClose: true,
				format: 'dd/mm/yyyy',
			});
		}

		return {
			// public functions
			init: function() {
				demos();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTBootstrapDatepicker.init();
	});
</script>

<script type="text/javascript">
	// Class definition

	var KTBootstrapTimepicker = function () {

		// Private functions
		var demos = function () {
			// minimum setup
			$('.kt_timepicker').timepicker({
				minuteStep: 1,
				defaultTime: '',
				showSeconds: false,
				showMeridian: false,
				snapToStep: true
			});
		}

		return {
			// public functions
			init: function() {
				demos();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTBootstrapTimepicker.init();
	});




	var modal = document.querySelector(".mymodal");
var trigger = document.querySelector(".trigger-btn");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);



</script>
</body>
</html>
