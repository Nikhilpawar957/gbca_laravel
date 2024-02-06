@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Alumni Login | GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style type="text/css">
        footer {
            margin-top: 0;
        }

        .span_err {
            color: red;
        }

        .holder {
            background-color: #002862;
            width: 350px;
            height: 300px;
            overflow: hidden;

            position: absolute;
            right: 3%;
            top: 20%;
            font-family: Helvetica;
            border-radius: 5%;
            box-shadow: 0 0 15px #212020;
            padding: 0;
        }

        .holder .mask {
            position: relative;
            left: 0px;
            top: 10px;
            width: 340px;
            height: 230px;
            overflow: hidden;
        }

        .holder ul {
            list-style: none;
            margin: 0;
            padding: 15px;
            position: relative;
        }

        .holder ul li {
            padding: 10px 0px;
            border-bottom: 1px solid #ccc;
        }

        .holder ul li a {
            color: #e4e4e4;
            text-decoration: none;
        }

        .sol-new {
            padding: 30px 0 35px;
        }

        .sol-new:hover {
            background-color: #f9983e;
        }

        .recent_news h4 {
            color: #f09c51;
            background: #e4e4e4;
            margin: 0;
            padding: 8px 15px;
        }

        .news_head {
            color: #fff;
            font-weight: 400;
        }

        .news_detail {
            color: #fbfbfb;
        }

        .newsss {
            position: relative;
            width: inherit;
            /*marquee width */
            height: 220px;
            /*marquee height */
            overflow: hidden;
            padding: 2px;
            padding-left: 4px;
        }

        .subheading {
            width: 100%;
        }

        @media only screen and (device-width: 1280px) and (device-height: 720px) {

            .holder {
                top: 20% !important;
                right: 5% !important;
            }
        }


        @media only screen and (min-width: 1270px) and (max-width: 1290px) {
            .holder {
                top: 15%;
            }
        }

        @media only screen and (min-width: 1430px) and (max-width: 1450px) {
            .holder {
                top: 15%;
            }
        }

        @media only screen and (min-width: 1910px) and (max-width: 1930px) {
            .holder {
                top: 12%;
                right: 15%;
            }
        }

        @media only screen and (min-width: 300px) and (max-width: 768px) {
            section.heading-page.alumni-banner {
                padding-top: 180px;
                padding-bottom: 400px;
            }

            .holder {
                top: 52%;
            }
        }

        @media only screen and (device-width: 360px) and (device-height: 740px) {
            .holder {
                top: 48%;
                right: 1%;
            }

            section.heading-page.alumni-banner {
                padding-bottom: 445px;
            }

        }

        @media only screen and (device-width: 393px) and (device-height: 851px) {
            .holder {
                top: 42%;
                right: 5%;
            }

            section.heading-page.alumni-banner {
                padding-bottom: 445px;
            }

        }

        @media only screen and (device-width: 414px) and (device-height: 896px) {
            .holder {
                top: 42%;
                right: 8%;
            }

            section.heading-page.alumni-banner {
                padding-bottom: 445px;
            }
        }

        @media only screen and (device-width: 390px) and (device-height: 844px) {
            .holder {
                top: 42%;
                right: 5%;
            }

            section.heading-page.alumni-banner {
                padding-bottom: 445px;
            }

        }

        @media only screen and (device-width: 412px) and (device-height: 915px) {
            .holder {
                top: 42%;
                right: 8%;
            }

            section.heading-page.alumni-banner {
                padding-bottom: 445px;
            }
        }
    </style>
@endpush
@section('content')

    <section class="heading-page header-text alumni-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni Login</li>
                        </ol>
                        <h2 class="page-title">Alumni Login</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us alumn-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="almn-login-sign">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                                    aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" role="tab"
                                    aria-controls="signup" aria-selected="false">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <div class="login-form">
                                    <form id="contact" class="contact-form1 signInForm" action="" method="post">
                                        <div class="contact-form__two">
                                            <div class="alert alert-danger text-center danger_register"
                                                style="display:none; margin-top:20px"></div>
                                            <div class="alert alert-success text-center success_register"
                                                style="display:none; margin-top:20px"></div>
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <span class="text-danger error-text login_id_error"></span>
                                                    <input type="text" name="login_id" id="login_id"
                                                        placeholder="Enter Email / Mobile No." maxlength="255">
                                                    <label for="login_id">Enter Email / Mobile No.</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <span class="text-danger error-text otp_error"></span>
                                                    <input type="text" name="otp" id="otp"
                                                        placeholder="Enter OTP" maxlength="6">
                                                    <label for="otp">Enter OTP</label>
                                                </div>
                                            </div>
                                            <div class="comment-submit-btn tabs-btn" id="send_otp">
                                                <button type="button" onclick="return sendOTP();" id="otp-acces-btn"
                                                    class="button orange-btn">Send OTP <img
                                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                                        class="img-fluid btn-arrow"></button>
                                            </div>
                                            <div class="comment-submit-btn tabs-btn d-none" id="sign_otp_div">
                                                <button type="button" id="login-btn" onclick="requestLogin();"
                                                    class="button orange-btn">Sign In <img
                                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                                        class="img-fluid btn-arrow"></button>

                                                <a href="javascript:void(0);" id="resend_otp" class="d-none"
                                                    onclick="return sendOTP();">Resend OTP</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                                <div class="sign-up-form">
                                    <form id="contact" class="contact-form1 signUpForm"
                                        action="{{ route('sign-up-form-submit') }}" method="post">
                                        <div class="alert alert-danger text-center danger_register"
                                            style="display:none; margin-top:20px"></div>
                                        <div class="alert alert-success text-center success_register"
                                            style="display:none; margin-top:20px"></div>
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12">
                                                    <span class="text-danger error-text full_name_error"></span>
                                                    <input type="text" name="full_name" id="full_name"
                                                        placeholder="Enter Full Name" maxlength="255">
                                                    <label for="full_name">Full Name</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <span class="text-danger error-text email_error"></span>
                                                    <input type="email" name="email" id="email"
                                                        placeholder="Enter E-mail" maxlength="255">
                                                    <label for="email">E-mail</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <span class="text-danger error-text phone_error"></span>
                                                    <input type="tel" name="phone" id="phone"
                                                        onkeypress="return phone_validate(event)"
                                                        placeholder="Enter Contact Number" maxlength="255">
                                                    <label for="phone">Contact Number</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <span class="text-danger error-text doj_error"></span>
                                                    <input type="text" name="doj" id="doj"
                                                        onkeypress="return phone_validate(event)"
                                                        placeholder="Year of Joining" maxlength="4">
                                                    <label for="doj">Year of Joining</label>
                                                </div>
                                            </div>
                                            <div class="comment-submit-btn tabs-btn">
                                                <button type="submit" id="form-submit" class="button orange-btn">Sign Up
                                                    <img src="assets/img/arrow-right-white.svg"
                                                        class="img-fluid btn-arrow"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="alumni-content">
                        <h2 class="section-heading">Greetings GBite!</h2>
                        <p class="para-style">
                            Welcome back to where it all started. We missed you.
                            Whether you moved on from GBCA years ago or more recently, you were and still are, part of our
                            community. GBCA Alumni Page helps you stay connected with the firm and your former colleagues
                            and friends who have been an integral part of your journey here.<br />
                            Login Now and become a lifelong member of GBCA to reengage, to reconnect and rekindle.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $("form.signUpForm").submit(function(e) {
            e.preventDefault();
            var form = this;
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
                },
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $(form)[0].reset();
                        $(form).find(".success_register").text(response.msg);
                        $(form).find(".success_register").slideDown("slow").delay(5000).slideUp();
                    } else {
                        $(form).find(".danger_register").text(response.msg);
                        $(form).find(".danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });

        function sendOTP() {
            var login_id = $.trim($("input[name='login_id']").val());
            var formdata = new FormData();
            formdata.append('login_id', login_id);
            $.ajax({
                url: "{{ route('send-otp') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $(".signInForm").find('span.error-text').text('');
                    $(".signInForm").find('button').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $(".signInForm").find(".success_register").text(response.msg);
                        $(".signInForm").find(".success_register").slideDown("slow").delay(5000).slideUp();
                        $("#send_otp").addClass("d-none");
                        $("#sign_otp_div").removeClass("d-none");
                    } else {
                        $(".signInForm").find(".danger_register").text(response.msg);
                        $(".signInForm").find(".danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                    $(".signInForm").find('button').prop('disabled', false);
                    setTimeout(() => {
                        expireOTP();
                    }, 30000);
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(".signInForm").find('span.' + prefix + '_error').text(val[0]);
                    });
                    $(".signInForm").find('button').prop('disabled', false);
                }
            });
        }

        function expireOTP() {
            var login_id = $.trim($("input[name='login_id']").val());
            var formdata = new FormData();
            formdata.append('login_id', login_id);
            $.ajax({
                url: "{{ route('expire-otp') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {},
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $("#resend_otp").removeClass("d-none");
                    } else {
                        $(".signInForm").find(".danger_register").text(response.msg);
                        $(".signInForm").find(".danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                },
            });
        }

        function requestLogin() {
            var login_id = $.trim($("input[name='login_id']").val());
            var otp = $.trim($("input[name='otp']").val());
            var formdata = new FormData();
            formdata.append('login_id', login_id);
            formdata.append('otp', otp);
            $.ajax({
                url: "{{ route('confirm-otp') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $(".signInForm").find('span.error-text').text('');
                    $(".signInForm").find('button').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $(".signInForm").find(".success_register").text(response.msg);
                        $(".signInForm").find(".success_register").slideDown("slow").delay(5000).slideUp();
                    } else {
                        $(".signInForm").find(".danger_register").text(response.msg);
                        $(".signInForm").find(".danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                    $(".signInForm").find('button').prop('disabled', false);
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(".signInForm").find('span.' + prefix + '_error').text(val[0]);
                    });
                    $(".signInForm").find('button').prop('disabled', false);
                }
            });
        }
    </script>
@endpush
