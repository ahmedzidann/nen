<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/shopingo/demo/shopingo_V1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 10:06:39 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('store') }}/assets/images/favicon-32x32.webp" type="image/webp" />

    <!-- CSS files -->
    <link href="{{ asset('store') }}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('store') }}/assets/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('store') }}/assets/plugins/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('store') }}/assets/plugins/slick/slick-theme.css" />

    <link href="{{ asset('store') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('store') }}/assets/css/dark-theme.css" rel="stylesheet">

    <title>Shopingo - eCommerce HTML Template</title>
</head>

<body>


    @include('store.layouts.header')

    @yield('content')
    @include('store.layouts.footer')

    <!-- JavaScript files -->
    <script src="{{ asset('store') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('store') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('store') }}/assets/plugins/slick/slick.min.js"></script>
    <script src="{{ asset('store') }}/assets/js/main.js"></script>
    <script src="{{ asset('store') }}/assets/js/index.js"></script>
    <script src="{{ asset('store') }}/assets/js/loader.js"></script>

</body>


<!-- Mirrored from codervent.com/shopingo/demo/shopingo_V1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 10:07:04 GMT -->

</html>
