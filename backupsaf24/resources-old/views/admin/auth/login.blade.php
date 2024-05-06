<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SAF</title>

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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">

	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{asset('css/themes/layout/header/base/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/header/menu/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/brand/darkf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/aside/darkf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/login-1.css') }}" rel="stylesheet" type="text/css" />

	@stack('style')
</head>
<body>
    <div id="app">
	    <main class="" style="margin-top: 10px">

			<div class="d-flex flex-column flex-root">
			    <!--begin::Login-->
			    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			        <!--begin::Aside-->
			        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
			            <!--begin::Aside Top-->
			            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
			                <!--begin::Aside header-->
			                <a href="#" class="text-center mb-10">
			                <img src="{{asset('media/logos/logo-login.png')}}" class="max-h-70px" alt="">
			                </a>
			                <!--end::Aside header-->
			                <!--begin::Aside title-->
			                <!-- <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Amazing Metronic 
			                    <br>with great build tools
			                </h3> -->
			                <!--end::Aside title-->
			            </div>
			            <!--end::Aside Top-->
			            <!--begin::Aside Bottom-->
			            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{asset('image/login-visual-1.svg')}})"></div>
			            <!--end::Aside Bottom-->
			        </div>
			        <!--begin::Aside-->
			        <!--begin::Content-->
			        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
			            <!--begin::Content body-->
			            <div class="d-flex flex-column-fluid flex-center">
			                <!--begin::Signin-->
			                <div class="login-form login-signin">
			                    <!--begin::Form-->
			                    <form method="POST" action="{{ route('admin.login') }}" class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" id="kt_login_signin_form">
			                    	@csrf

			                        <!--begin::Title-->
			                        <div class="pb-13 pt-lg-0 pt-5">
			                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Serendipity Arts Foundation</h3>
			                            <!-- <span class="text-muted font-weight-bold font-size-h4">New Here?  -->
			                           	<!--  <a href="{{route('register')}}" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span> -->
			                        </div>
			                        <!--begin::Title-->
			                        <!--begin::Form group-->
			                        <div class="form-group fv-plugins-icon-container">
			                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>

			                            <input id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

			                            @error('email')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror

			                        </div>
			                        <!--end::Form group-->
			                        <!--begin::Form group-->
			                        <div class="form-group fv-plugins-icon-container">
			                            <div class="d-flex justify-content-between mt-n5">
			                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>

			                                @if (Route::has('password.request'))
			                                    <!-- <a href="{{ route('password.request') }}" class="text-primary font-size-h6  text-hover-primary pt-5" id="kt_login_forgot">Forgot Password?</a> -->
			                                @endif
			                            </div>

			                            <input id="password" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

			                            @error('password')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror

			                        </div>
			                        <!--end::Form group-->
			                        <!--begin::Form group-->
			                        <div class="form-group fv-plugins-icon-container">
			                            <div class="d-flex justify-content-between mt-n5">
			                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
			                            </div>

			                            <input style="margin-left:5px" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			                            <label style="margin-left:25px" class="form-check-label" for="remember">
			                                {{ __('Remember Me') }}
			                            </label>


			                        </div>
			                        <!--end::Form group-->

			                        <!--begin::Action-->
			                        <div class="pb-lg-0 pb-5">
			                            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
			                            
			                        </div>
			                        <!--end::Action-->
			                        <input type="hidden">
			                        <div></div>
			                    </form>
			                    <!--end::Form-->
			                </div>
			                <!--end::Signin-->
			                
			            </div>
			            <!--end::Content body-->
			            
			        </div>
			        <!--end::Content-->
			    </div>
			    <!--end::Login-->
			</div>
	    </main>
	</div>
</body>

<script>
	var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };
</script>
<script src="{{asset('plugins/global/plugins.bundlef552.js?v=7.1.8')}}"></script>
<script src="{{asset('plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8')}}"></script>
<script src="{{asset('js/scripts.bundlef552.js?v=7.1.8')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>

<!-- Custom Scripts -->
<script src="{{asset('js/mymain.js') }}"></script>   

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
</script>
</body>
</html>
