<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bee Barber</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('client/assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('client/assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('client/assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('client/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">
</head>
<body>
    @include('clients.layouts.header')

    @yield('content')

    @include('clients.layouts.footer')

    <script src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/aos.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('client/assets/js/google-map.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
</body>
</html>
