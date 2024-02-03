@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Contact | GBCA & Associates LLP Chartered
    Accountants')
    @push('stylesheets')
        <style type="text/css">
            footer {
                margin-top: 0;
            }
        </style>
    @endpush
@section('content')
    <section class="heading-page header-text contact-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                        </ol>
                        <h2 class="page-title">Contact us</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us contact-page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="form-section">
                        <form id="contact" class="contact-form1" action="{{ route('contact-form-submit') }}"
                            method="post">
                            <div class="alert alert-danger text-center" id="danger_register"
                                style="display:none; margin-top:20px"></div>
                            <div class="alert alert-success text-center" id="success_register"
                                style="display:none; margin-top:20px"></div>
                            <div class="contact-form__two">
                                <div class="row">
                                    <div class="field contact-inner text-left col-lg-12">
                                        <span class="text-danger error-text full_name_error"></span>
                                        <input type="text" name="full_name" id="full_name" placeholder="Enter Full Name" maxlength="255">
                                        <label for="fullname">Full Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <span class="text-danger error-text email_error"></span>
                                        <input type="text" name="email" id="email" placeholder="Enter E-mail" maxlength="255">
                                        <label for="email">E-mail <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <span class="text-danger error-text phone_error"></span>
                                        <input type="tel" name="phone" id="phone"
                                            placeholder="Enter Contact Number" maxlength="10" onkeypress="return phone_validate(event)">
                                        <label for="phone">Contact Number <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="field contact-inner col-lg-12 text-left">
                                        <span class="text-danger error-text message_error"></span>
                                        <textarea name="message" id="message" placeholder="Enter message here"></textarea>
                                        <label for="massage">Write a Message</label>
                                    </div>
                                </div>
                                <div class="comment-submit-btn">
                                    <button type="submit" id="contact_form_submit" class="button orange-btn">Submit<img
                                            src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                            class="img-fluid btn-arrow"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="contact-info">
                        <p>
                            <a href="tel:+912233213737"><img src="{{ asset('assets/img/icons/contact/call.png') }}" class="contact-icon"></a>
                            +912233213737
                        </p>
                        <p>
                            <a href="mailto:reachus@gbcaindia.com"><img src="{{ asset('assets/img/icons/contact/email.png') }}" class="contact-icon"></a>
                            reachus@gbcaindia.com
                        </p>
                        <div class="addr">
                            <div class="icon">
                                <a href="https://maps.app.goo.gl/szJHWK8rBuM8z5Ui8" target="_blank"><img src="{{ asset('assets/img/icons/contact/location.png') }}" class="contact-icon-diff"></a>
                            </div>
                            <p> Benefice Business House, 3rd Level, 126, Mathuradas Mills Compound, N. M. Joshi Marg, Lower
                                Parel (W), Mumbai - 400013, India.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.4621831237937!2d72.8282091143757!3d18.99934505931595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cef28f6a29e1%3A0x22a204ba2ee30052!2sBenefice+Business+House+%26+Associates!5e0!3m2!1sen!2sin!4v1548411276602"
            height="400" frameborder="0" style="border:0; width:100%;" allowfullscreen=""></iframe>

    </section>

@endsection
@push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script type="text/javascript">
        jQuery("#carousel").owlCarousel({
            autoplay: true,
            margin: 20,
            /*
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            */
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 7000,
            smartSpeed: 800,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 1
                },
                1366: {
                    items: 1
                }
            }
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $("form#contact").submit(function(e) {
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
                        $("#success_register").text(response.msg);
                        $("#success_register").slideDown("slow").delay(5000).slideUp();
                    } else {
                        $("#danger_register").text(response.msg);
                        $("#danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush
