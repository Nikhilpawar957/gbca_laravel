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

    <meta name="title"
        content="{{ isset($meta_title) && $meta_title != '' ? $meta_title : 'GBCA & Associates LLP Chartered Accountants' }}">
    <meta name="description"
        content="{{ isset($meta_desc) && $meta_desc != '' ? $meta_desc : 'GBCA & Associates LLP Chartered Accountants' }}">
    <meta name="keywords"
        content="{{ isset($meta_keywords) && $meta_keywords != '' ? $meta_keywords : 'GBCA,Chartered Accountants' }}">
    <meta name="robots" content="index,follow">

    <!-- social responsibilities -->
    <meta property="og:title"
        content="{{ isset($meta_title) && $meta_title != '' ? $meta_title : 'GBCA & Associates LLP Chartered Accountants' }}">
    <meta property="og:type" content="website" />
    <meta property="og:description"
        content="{{ isset($meta_desc) && $meta_desc != '' ? $meta_desc : 'GBCA & Associates LLP Chartered Accountants' }}">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image"
        content="{{ isset($meta_image) && $meta_image != '' ? $meta_image : asset('assets/img/gbc-logo.png') }}">
    <meta name="twitter:card" content="{{ \App\Models\Setting::find(1)->logo }}">

    {{-- Title --}}
    <title>@yield('pageTitle')</title>

    {{-- Shortcut Icon --}}
    <link rel="shortcut icon" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ \App\Models\Setting::find(1)->favicon }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom_scripts.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $("form#profileForm").submit(function(e) {
            e.preventDefault();
            var form = this;

            const fullNameregex = /^([\w]{3,})+\s+([\w\s]{3,})+$/i;
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phoneRegex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;

            let full_name = $.trim($(form).find('[name="full_name"]').val());
            let email = $.trim($(form).find('[name="email"]').val());
            let phone = $.trim($(form).find('[name="phone"]').val());

            if (full_name === "") {
                valid(form, 'full_name', 'Please Enter Full Name');
                return false;
            } else if (full_name !== "" && !fullNameregex.test(full_name)) {
                valid(form, 'full_name', 'Please Enter Valid Full Name eg: John Smith');
                return false;
            } else if (email === "") {
                valid(form, 'email', 'Please Enter Email Address');
                return false;
            } else if (email !== "" && !emailRegex.test(email)) {
                valid(form, 'email', 'Please Enter Valid Email Address eg: john@example.com');
                return false;
            } else if (phone === "") {
                valid(form, 'phone', 'Please Enter Phone Number');
                return false;
            } else if (phone !== "" && !phoneRegex.test(phone)) {
                valid(form, 'phone', 'Please Enter Valid Phone Number eg: 9999922222');
                return false;
            } else {
                var formdata = new FormData(form);
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                        $(form).find(".alert-info").text('Please Wait...').slideDown("slow");
                        $(form).find('button[type="submit"]').prop('disabled', true);
                    },
                    success: function(response) {
                        //console.log(response);
                        $(form).find(".alert-info").text('').slideUp();
                        if (response.code == 1) {
                            $(form)[0].reset();
                            $(".successmsg").text(response.msg);
                            $(".successmsg").slideDown("slow").delay(3000).slideUp();
                            setTimeout(() => {
                                $("#profileModal").modal("hide");
                            }, 3000);
                        } else {
                            $(".errmsg").text(response.msg);
                            $(".errmsg").slideDown("slow").delay(3000).slideUp();
                        }
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            $.each(response.responseJSON.errors, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                        $(form).find(".alert-info").text('').slideUp();
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    }
                });
            }
        });
    </script>

    {{-- Page Scripts --}}
    @stack('scripts')
</body>

</html>
