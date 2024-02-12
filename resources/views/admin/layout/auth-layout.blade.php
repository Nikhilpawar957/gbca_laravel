<!DOCTYPE html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ \App\Models\Setting::find(1)->favicon }}">

    <!-- CSS files -->
    <link href="{{ asset('admin/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" >
    @stack('stylesheets')
    <link href="{{ asset('admin/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url("https://rsms.me/inter/inter.css");

        :root {
            --tblr-font-sans-serif: "Inter Var", -apple-system, BlinkMacSystemFont,
                San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">

    <script src="{{ asset('admin/dist/js/demo-theme.min.js') }}"></script>
    @yield('content')
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/dist/libs/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/tabler.min.js') }}" defer></script>
    @stack('scripts')
    <script>

        window.addEventListener('showToastr', function() {
            toastr.remove();

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            if (event.detail.type === "success") {
                toastr.success(event.detail.message);
            } else if (event.detail.type === "info") {
                toastr.info(event.detail.message);
            } else if (event.detail.type === "error") {
                toastr.error(event.detail.message);
            } else if (event.detail.type === "warning") {
                toastr.warning(event.detail.message);
            } else {
                return false;
            }
        });
    </script>
    <script src="{{ asset('admin/dist/js/demo.min.js') }}" defer></script>
</body>

</html>
