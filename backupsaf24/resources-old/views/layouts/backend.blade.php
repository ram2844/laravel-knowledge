<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
	<title>SAF 2023</title>
	<link rel="shortcut icon" href="{{ asset('media/logos/favicon.png') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{asset('plugins/global/plugins.bundlef552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/style.bundlef552.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<link href="{{asset('css/themes/layout/header/base/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/header/menu/lightf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/brand/darkf552.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/themes/layout/aside/darkf552.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/admin.css') }}" rel="stylesheet" type="text/css" />
    <meta name="token" content="{{ csrf_token() }}">
    <script type="text/javascript">
    	var __BASE_URL_JS__ = '{{ asset("/") }}';
    </script>
    
	@stack('style')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	

	<!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    <!--begin::Logo-->
                    <a href="#" class="brand-logo">
                        <img alt="Logo" src="{{asset('media/logos/logo-login.png')}}" / style="width: 150px;">
                    </a>
                    <!--end::Logo-->
                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside Menu-->
                @include('admin.includes.sidebar.menu')
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                @include('admin.includes.headers.header')
                <!--end::Header-->  
                 <!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">                     
	                @yield('sub_header')
	                <!-- Content -->
	                @yield('content')
	            </div>

                @include('admin.includes.footers.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->


    <!--end::Chat Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->
	
	<!-- begin::User Panel-->
	<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
	    <!--begin::Header-->
	    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5" kt-hidden-height="40" style="">
	        <h3 class="font-weight-bold m-0">User Profile 
	            <!-- <small class="text-muted font-size-sm ml-2">12 messages</small> -->
	        </h3>
	        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
	        <i class="ki ki-close icon-xs text-muted"></i>
	        </a>
	    </div>
	    <!--end::Header-->
	    <!--begin::Content-->
	    <div class="offcanvas-content pr-5 mr-n5 scroll ps ps--active-y" style="height: 341px; overflow: hidden;">
	        <!--begin::Header-->
	        <div class="d-flex align-items-center mt-5">
	            <div class="symbol symbol-100 mr-5">
	                <div class="symbol-label" style="background-image:url({{asset('media/users/blank.png')}})"></div>
	                <i class="symbol-badge bg-success"></i>
	            </div>
	            <div class="d-flex flex-column">
	                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{@Auth::user()->name}}</a>
	                <!-- <div class="text-muted mt-1">Application Developer</div> -->
	                <div class="navi mt-2">
	                    <a href="#" class="navi-item">
	                        <span class="navi-link p-0 pb-2">
	                            <span class="navi-icon mr-1">
	                                <span class="svg-icon svg-icon-lg svg-icon-primary">
	                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
	                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                            <rect x="0" y="0" width="24" height="24"></rect>
	                                            <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
	                                            <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"></circle>
	                                        </g>
	                                    </svg>
	                                    <!--end::Svg Icon-->
	                                </span>
	                            </span>
	                            <span class="navi-text text-muted text-hover-primary">{{@Auth::user()->email}}</span>
	                        </span>
	                    </a>
	                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
	                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
	                        {{ csrf_field() }}
	                    </form>
	                </div>
	            </div>
	        </div>
	        <!--end::Header-->
	        <!--begin::Separator-->
	        <div class="separator separator-dashed mt-8 mb-5"></div>
	        <!--end::Separator-->
	        <!--begin::Nav-->
	        
	        <!--end::Notifications-->
	        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
	            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
	        </div>
	        <div class="ps__rail-y" style="top: 0px; height: 341px; right: 0px;">
	            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 130px;"></div>
	        </div>
	    </div>
	    <!--end::Content-->
	</div>
	<!-- end::User Panel-->
	
	<!--begin::Quick Panel-->
	<div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
	    <!--begin::Header-->
	    <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5" kt-hidden-height="45" style="">
	        <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
	            <li class="nav-item">
	                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
	            </li>
	        </ul>
	        <div class="offcanvas-close mt-n1 pr-5">
	            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
	            <i class="ki ki-close icon-xs text-muted"></i>
	            </a>
	        </div>
	    </div>
	    <!--end::Header-->
	    <!--begin::Content-->
	    <div class="offcanvas-content px-10">
	        <div class="tab-content">
	            
	            <!--begin::Tabpane-->
	            <div class="tab-pane fade pt-2 pr-5 mr-n5 scroll ps active show ps--active-y" id="kt_quick_panel_notifications" role="tabpanel" style="height: 299px; overflow: hidden;">
	                <!--begin::Nav-->
	                <div class="navi navi-icon-circle navi-spacer-x-0">
	                    <!--begin::Item-->

	                    @if( isset($adminNotifications) && $adminNotifications->count())

		                    <a href="{{ route('log_activity.index', ['type' => 'admin-notification']) }}" class="navi-item">
		                        <div class="navi-link rounded">
		                            <div class="navi-text">
		                                <div class="font-weight-bold font-size-lg">Show All</div>
		                            </div>
		                        </div>
		                    </a>

		                    @foreach($adminNotifications as $adminNotificationRow)
			                    <a href="javascript:void(0)" class="navi-item">
			                        <div class="navi-link rounded">
			                            <div class="symbol symbol-50 mr-3">
			                                <div class="symbol-label">
			                                    <i class="flaticon-bell text-success icon-lg"></i>
			                                </div>
			                            </div>
			                            <div class="navi-text">
			                                <!-- <div class="font-weight-bold font-size-lg">Admin</div> -->
			                                <div class="">{{$adminNotificationRow->subject}}</div>
			                                <div class="text-muted">{{isset($adminNotificationRow->user->name) ? $adminNotificationRow->user->name : 'N/A'}}</div>
			                                <div class="text-muted">{{$adminNotificationRow->created_ago}}</div>
			                            </div>
			                        </div>
			                    </a>
		                    @endforeach

	                   	@else
	                        <div class="d-flex flex-center text-center text-muted min-h-200px">
	                            
	                            <div class="navi-text">
	                                <div class="text-muted">No notification.</div>
	                            </div>
	                        </div>
	                    @endif

	                    <!--end::Item-->
	                    
	                </div>
	                <!--end::Nav-->
	                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
	                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
	                </div>
	                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 299px;">
	                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 98px;"></div>
	                </div>
	            </div>
	            <!--end::Tabpane-->
	            
	        </div>
	    </div>
	    <!--end::Content-->
	</div>
	<!--end::Quick Panel-->

	<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
	<script src="{{asset('plugins/global/plugins.bundlef552.js?v=7.1.8')}}"></script>
	<script src="{{asset('plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8')}}"></script>
	<script src="{{asset('js/scripts.bundlef552.js?v=7.1.8')}}"></script>

    <!-- Custom Scripts -->
    <script src="{{asset('js/custom/index.js?v=1.0')}}"></script>
	
	</body>
	<!--end::Body-->

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

</html>

<!-- js/pages/crud/file-upload/dropzonejsf552.js -->