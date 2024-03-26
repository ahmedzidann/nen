<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()=='ar'?'rtl':'ltr' }}">
<head>
	<!-- Required meta tags -->
    <x-Meta.Meta />
    <title>@yield('titleadmin')</title>
    
@if (App::getLocale() == 'ar')
    @include('admin.layouts.css.css_ar')
@else
    @include('admin.layouts.css.css')
@endif
</head>
<body>

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin.layouts.sidebar.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.layouts.head.header')
		<!--end header -->
		@yield('contentadmin')
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	@include('admin.layouts.switcher.switcher')
    @include('admin.layouts.js.js')
</body>
</html>