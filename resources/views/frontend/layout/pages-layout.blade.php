<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta Tags --}}
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/gbc-logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/gbc-logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/gbc-logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/gbc-logo.png') }}">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    {{-- Title --}}
    <title>@yield('pageTitle')</title>

    {{-- Page Styles --}}
    @stack('stylesheets')
</head>

<body>
    {{-- Header --}}
    @include('frontend.layout.inc.header')

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.layout.inc.footer')

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom_scripts.js') }}"></script>

    {{-- Page Scripts --}}
    @stack('scripts')
</body>

</html>
