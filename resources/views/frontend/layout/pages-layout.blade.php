<!DOCTYPE html>
<html lang="en">

<head>
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <title>@yield('pageTitle')</title>
    @stack('stylesheets')
</head>

<body>
    @include('frontend.layout.inc.header')
    @yield('content')
    @include('frontend.layout.inc.footer')
    @stack('scripts')
</body>

</html>
