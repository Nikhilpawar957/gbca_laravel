<!doctype html>
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
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>@yield('pageTitle')</title>

    <link rel="shortcut icon" href="" type="image/x-icon">
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/tabler.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/tabler-flags.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/tabler-payments.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/css/tabler-vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/dist/libs/ijabo/ijabo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.13.2/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.13.2/jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.13.2/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('amsify/amsify.suggestags.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    @stack('stylesheets')

    <link href="{{ asset('admin/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        body.theme-dark .nav-item.active {
            background: var(--tblr-light) !important;
        }

        body.theme-dark .nav-item.active>.nav-link {
            color: var(--tblr-dark) !important;
        }

        body.theme-dark .nav-item.active>.nav-link>.nav-link-icon {
            color: var(--tblr-dark) !important;
        }

        .swal2-popup {
            font-size: 0.85rem;
        }

        .nav-item.active {
            background: var(--tblr-dark) !important;
        }

        .nav-item.active>.nav-link {
            color: var(--tblr-light) !important;
        }

        .nav-item.active>.nav-link>.nav-link-icon {
            color: var(--tblr-light) !important;
        }

        .ts-wrapper.multi .ts-control>div {
            padding: 2px 5px;
            background: var(--tblr-primary);
            color: var(--tblr-light);
        }

        .amsify-suggestags-input-area .amsify-select-tag.col-bg {
            background: var(--tblr-primary);
            color: var(--tblr-light);
        }

        body.theme-dark .amsify-suggestags-area .amsify-suggestags-input-area .amsify-suggestags-input {
            background: #1a2234;
            color: var(--tblr-light);
        }
    </style>
</head>

<body>
    <script src="{{ asset('admin/dist/js/demo-theme.min.js') }}"></script>
    <div class="page">
        @include('admin.layout.inc.sidebar')
        @include('admin.layout.inc.header')
        <div class="page-wrapper">
            @yield('content')
            @include('admin.layout.inc.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('admin/dist/libs/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/dist/libs/ijabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('admin/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>
    <script src="{{ asset('admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('amsify/jquery.amsify.suggestags.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('admin/dist/js/tabler.min.js') }}"></script>
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
    <script src="{{ asset('admin/dist/js/demo.min.js') }}"></script>

</body>

</html>
