<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
	<title>SAF 2023</title>
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
    <link href="{{asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <meta name="token" content="{{ csrf_token() }}">

    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-P3VXXC7X90"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-P3VXXC7X90');
	</script>
    
	@stack('style')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	
	<h1 class="text-center mt-5">Comming Soon...</h1>
	<script src="{{asset('plugins/global/plugins.bundlef552.js?v=7.1.8')}}"></script>
	<script src="{{asset('plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8')}}"></script>
	<script src="{{asset('js/scripts.bundlef552.js?v=7.1.8')}}"></script>

    <!-- Custom Scripts -->
    <script src="{{asset('js/custom/index.js')}}"></script>
	
	</body>
	<!--end::Body-->

	@stack('scripts')

</html>

<!-- js/pages/crud/file-upload/dropzonejsf552.js -->