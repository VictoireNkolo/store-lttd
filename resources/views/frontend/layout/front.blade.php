<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="frontend/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <!-- magnific-popup.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!-- slicknav.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
    <!-- slicknav.min.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- modernizr css -->

    @yield('css')

    <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <title>
        @yield('title', 'Accueil | MOB')
    </title>

</head>

<body>
<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

@include('frontend.partials.header')
@include('frontend.partials.breadcumb')

<!-- content start -->
<div class="pt-40" style="padding-bottom: 30px;padding-top: 20px;">
    <div class="container">

        @yield('content')

    </div>
</div>
<!-- content end -->

@include('frontend.partials.footer')

    <!-- footer-area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- popper.min.js -->
    <script src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!-- slick.min.js -->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>

    @yield('js')

</body>

</html>
