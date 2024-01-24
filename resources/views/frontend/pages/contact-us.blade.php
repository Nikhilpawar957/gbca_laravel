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
                        <form id="contact" class="contact-form1" action="" method="post">
                            <div class="alert alert-danger errmsg text-center " id="success_register"
                                style="display:none; margin-top:20px"></div>
                            <div class="contact-form__two">
                                <div class="row">
                                    <div class="field contact-inner text-left col-lg-12">
                                        <input type="text" name="fullname20" id="fullname20"
                                            placeholder="Enter Full Name">
                                        <label for="fullname20">Full Name</label>
                                    </div>
                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <input type="email" name="email20" id="email20" placeholder="Enter E-mail">
                                        <label for="email20">E-mail</label>
                                    </div>

                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <input type="tel" name="phone20" id="phone20"
                                            placeholder="Enter Contact Number">
                                        <label for="phone20">Contact Number</label>
                                    </div>
                                    <div class="field contact-inner col-lg-12 text-left">
                                        <textarea name="massage20" id="massage20" placeholder="Enter message here"></textarea>
                                        <label for="massage20">Write a Message</label>
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
                            <img src="{{ asset('assets/img/icons/contact/call.png') }}" class="contact-icon">
                            +912233213737
                        </p>
                        <p>
                            <img src="{{ asset('assets/img/icons/contact/email.png') }}" class="contact-icon">
                            reachus@gbcaindia.com
                        </p>
                        <div class="addr">
                            <div class="icon">
                                <img src="{{ asset('assets/img/icons/contact/location.png') }}" class="contact-icon-diff">
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
    </script>
@endpush
