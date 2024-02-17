@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@section('content')

    <section class="section main-banner" id="top" data-section="section1">
        <img src="{{ asset('assets/img/page-banners/home-banner.jpg') }}" class="img-fluid banner-img d-none d-lg-block"
            alt="">
        <img src="{{ asset('assets/img/page-banners/home-mobile-banner.jpg') }}"
            class="img-fluid banner-img d-block d-lg-none" alt="">
        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <p>We provide solutions in </p>
                            <h2 class="rw-sentence d-none d-lg-block d-md-block" id="moveText">
                                <div class="rw-words rw-words-1">
                                    <span>Mergers, Acquisitions and Restructuring</span>
                                    <span>Audits of BFSI Sector</span>
                                    <span>India Entry Services</span>
                                    <span>MIS Services of HNIs</span>
                                    <span>Tax Advisory</span>
                                </div>
                            </h2>
                            <h2 class="rw-sentence d-block d-lg-none d-md-none" id="moveText">
                                <div class="rw-words rw-words-1">
                                    <span>Mergers, Acquisitions <br />and Restructuring</span>
                                    <span>Audits of BFSI Sector</span>
                                    <span>India Entry Services</span>
                                    <span>MIS Services of HNIs</span>
                                    <span>Tax Advisory</span>
                                </div>
                            </h2>
                            <p class="caption-last-para">with paramount belief that <span class="italic">"When You Win, We
                                    Win"</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-cta">
        <div class="container">
            <div class="banner-cta-box">
                <div class="row center-align">
                    <div class="col-lg-9 col-md-8">
                        <h2>India Union Budget 2023</h2>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="banner-cta-btn"><a
                                href="{{ route('resources.resource_category', ['category' => 'union-budget']) }}"
                                class="orange-btn">Read
                                More <img src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                    class="img-fluid btn-arrow"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-gbca">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="content-box">
                                <h2 class="section-heading">Why GBCA</h2>
                                <p>From our decades of experience in serving clients in India and globally, we understand
                                    what it takes to reach their goals. Personlised approach, constantly striving to exceed
                                    expectations and our ability to blend knowledge, experience, expertise and skills to
                                    deliver creative, timely and tailored solutions to our client’s unique needs, make us a
                                    professional firm of choice for our clients.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="item mb40">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/icons/multi_dis.svg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Multi Disciplinary Service</h4>
                                    <p>We render multitude of services across Tax, Audit, Business Advisory and Transaction
                                        Advisory</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="item mb40">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/icons/sectoral_exposure.svg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Sectoral Exposure</h4>
                                    <p>Substantial experience across multiple industries and business segments</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/icons/rate.svg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Profound Experience</h4>
                                    <p>Large client base spanning Multinational Corporations, Public and Private Companies
                                        and Family Managed Groups</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/icons/multi_disciplinary_services.svg') }}"
                                        alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Dedicated Team</h4>
                                    <p>A team of over 125 including 10 Partners, a Chief Executive Officer and 18
                                        Professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ asset('assets/img/icons/target.svg') }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Focused Approach</h4>
                                    <p>Applying contemporary methodology and focused approach to deliver high quality
                                        services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-full relative services-section">
        <div class="container-fluid ser-container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6  pr0">
                    <div class="service-section-head">
                        <h2 class="section-heading">Delivering Excellence</h2>
                    </div>
                    <div class="s-service-carousel-nav mt-60 d-none d-lg-block d-md-block">
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img">
                                <img src="assets/img/services/services-icons/business_structuring_grey-32px.svg"
                                    class="img-fluid service-icons">
                            </div>
                            Transaction and Business Structuring
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img">
                                <img src="assets/img/services/services-icons/audit_grey-32px.svg"
                                    class="img-fluid service-icons">
                            </div>
                            Audit and Assurance
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img"><img src="assets/img/services/services-icons/direct_tax_grey-32px.svg"
                                    class="img-fluid service-icons"></div>
                            Direct Tax
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img"><img src="assets/img/services/services-icons/indirect_tax_grey-32px.svg"
                                    class="img-fluid service-icons">
                            </div>Indirect Tax
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img">
                                <img src="assets/img/services/services-icons/tax_law_grey-32px.svg"
                                    class="img-fluid service-icons">
                            </div>Corporate and Regulatory Laws
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img"><img src="assets/img/services/services-icons/fema_grey-32px.svg"
                                    class="img-fluid service-icons"></div> FEMA and International Taxation
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img"><img src="assets/img/services/services-icons/safe_grey-32px.svg"
                                    class="img-fluid service-icons"></div>
                            SAFE
                        </div>
                        <div class="item roboto-slab fw300 fz-18 transition">
                            <div class="icon-img"><img
                                    src="assets/img/services/services-icons/business_india_grey-32px.svg"
                                    class="img-fluid service-icons"></div> Doing Business in India
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 flex disable-flex-xs pl0">
                    <div class="service-slider-content">
                        <div class="vl1"></div>
                        <div class="vl2"></div>
                        <div class="s-service-carousel-for">
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/business_structuring_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>
                                    Transaction and Business Structuring
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Business and Ownership Restructuring</p>
                                    <p class="fw300 no-ls">Restructuring Promoter and Family Driven Business</p>
                                    <p class="fw300 no-ls">Valuations</p>
                                    <p class="fw300 no-ls">Transaction Support and Post Deal</p>
                                    <p class="fw300 no-ls">Due Diligence</p>
                                </div>

                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/audit_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>Audit and Assurance
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Statutory Audit </p>
                                    <p class="fw300 no-ls">Tax Audit</p>
                                    <p class="fw300 no-ls">Banks, NBFC and Financial Sector</p>
                                    <p class="fw300 no-ls">Insurance Companies </p>
                                    <p class="fw300 no-ls">Public Sector Undertakings</p>
                                    <p class="fw300 no-ls">GAAP Conversion </p>
                                    <p class="fw300 no-ls">Accounting and Financial Advisory </p>
                                    <p class="fw300 no-ls">Management Audit and Accounting Advisory </p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/direct_tax_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div> Direct Tax
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Advisory and Consultation </p>
                                    <p class="fw300 no-ls">Planning and Compliance </p>
                                    <p class="fw300 no-ls">Litigation and Representations </p>
                                    <p class="fw300 no-ls">Certifications </p>
                                    <p class="fw300 no-ls">Transfer Pricing </p>
                                    <p class="fw300 no-ls">Critical Review of Key Compliances </p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/indirect_tax_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>Indirect Tax
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">GST health check up services </p>
                                    <p class="fw300 no-ls">GST Compliances </p>
                                    <p class="fw300 no-ls">Litigation and Representations </p>
                                    <p class="fw300 no-ls">Comprehensive Tax Reviews </p>
                                    <p class="fw300 no-ls">UAE Taxation </p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/tax_law_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div> Corporate and Regulatory Laws
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Incorporation - Company / LLP </p>
                                    <p class="fw300 no-ls">Compliances </p>
                                    <p class="fw300 no-ls">Advisory and Consultation </p>
                                    <p class="fw300 no-ls">NBFC/ AIF - Registration, Compliance and Advisory </p>
                                    <p class="fw300 no-ls">Secretarial Support Services </p>
                                    <p class="fw300 no-ls">Winding-up - Company / LLP</p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/fema_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>FEMA and International Taxation
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Expatriates Taxation </p>
                                    <p class="fw300 no-ls">Inbound and Outbound Investment structuring </p>
                                    <p class="fw300 no-ls">FEMA Advisory and Representation </p>
                                    <p class="fw300 no-ls">Cross Border Transaction Advisory and BEPS Impact Analysis </p>
                                    <p class="fw300 no-ls">Advisory on POEM and Permanent Establishment Exposure </p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/safe_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>SAFE
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Statutory Compliance </p>
                                    <p class="fw300 no-ls">Accounting </p>
                                    <p class="fw300 no-ls">Financial Reporting </p>
                                    <p class="fw300 no-ls">Estate and Succession Planning </p>
                                    <p class="fw300 no-ls">Private Trusts and Wills </p>
                                    <p class="fw300 no-ls">Document Digitization</p>
                                </div>
                            </div>
                            <div class="item">
                                <h3 class="fz-24 fw400 mb-20 d-block d-lg-none d-md-none">
                                    <div class="icon-img">
                                        <img src="assets/img/services/services-icons/business_india_grey-32px.svg"
                                            class="img-fluid service-icons">
                                    </div>Doing Business in India
                                </h3>
                                <div class="down-arrow d-block d-lg-none d-md-none">
                                    <img src="assets/img/service-down-arrow.svg" class="img-fluid">
                                </div>
                                <div class="service-content">
                                    <p class="fw300 no-ls">Advisory on Entry mode and Implementation </p>
                                    <p class="fw300 no-ls">Equity and Debt Capital Structuring </p>
                                    <p class="fw300 no-ls">Tax and Regulatory Compliance </p>
                                    <p class="fw300 no-ls">Exit Strategy </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end .row -->
        </div> <!-- end .container -->
    </section>

    <section class="our-resources">
        <div class="container-fluid res-container">
            <div class="row">
                <div class="col-lg-7 offset-lg-1 col-md-8 head-margin">
                    <div class="resour-head">
                        <h2>Explore Our Resources</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="head-btn d-none d-lg-block d-md-block">
                        <a href="{{ route('resources.all') }}">View all <img
                                src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="head-btn d-block d-lg-none d-md-none">
                    <a href="{{ route('resources.all') }}">View all <img
                            src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row center-align">
                <div class="col-lg-6 col-md-5">
                    <div class="bottom-cta">
                        <div class="cta-head">
                            <h2>Got Questions? We'll Take It From Here.</h2>
                        </div>
                        <div class="cta-para">
                            <p>Our advisors are here to support you. Please complete the contact form and we will be in
                                touch.</p>
                        </div>
                        <div class="cta-btn d-none d-lg-block d-md-block">
                            <a href="{{ route('contact-us') }}" class="trasf-btn">Contact Us <img
                                    src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                    class="img-fluid btn-arrow"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-section home-contact">
                                <form id="contact" class="contact-form1" action="{{ route('contact-form-submit') }}"
                                    method="post" autocomplete="off">
                                    <div class="alert alert-info" style="display:none; margin-top:20px"></div>
                                    <div class="alert alert-danger text-center" style="display:none; margin-top:20px">
                                    </div>
                                    <div class="alert alert-success text-center" style="display:none; margin-top:20px">
                                    </div>
                                    <div class="contact-form__two">
                                        <div class="row">
                                            <div class="field contact-inner text-left col-lg-12">
                                                <span class="text-danger error-text full_name_error"></span>
                                                <input type="text" name="full_name" id="full_name"
                                                    placeholder="Enter Full Name" maxlength="150">
                                                <label for="full_name">Full Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="field contact-inner text-left col-lg-12 mb-0">
                                                <span class="text-danger error-text email_error"></span>
                                                <input type="text" name="email" id="email"
                                                    placeholder="Enter E-mail" maxlength="150">
                                                <label for="email">E-mail <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="field contact-inner text-left col-lg-12 mb-0">
                                                <span class="text-danger error-text phone_error"></span>
                                                <input type="tel" name="phone" id="phone"
                                                    placeholder="Enter Contact Number" maxlength="10"
                                                    onkeypress="return phone_validate(event)">
                                                <label for="phone">Contact Number <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="field contact-inner col-lg-12 text-left">
                                                <span class="text-danger error-text message_error"></span>
                                                <textarea name="message" id="message" placeholder="Enter message here"></textarea>
                                                <label for="massage">Write a Message</label>
                                            </div>
                                        </div>

                                        <div class="comment-submit-btn">
                                            <button type="submit" id="contact_form_submit"
                                                class="button orange-btn">Submit <img
                                                    src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                                    class="img-fluid btn-arrow"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cta-btn d-block d-lg-none d-md-none">
                                <a href="#" class="trasf-btn">Contact Us <img src="assets/img/blue-arrow.png"
                                        class="img-fluid btn-arrow"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
    <script>
        $('.owl-banner-item').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            nav: true,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
    <script>
        (function($) {
            $(".s-service-carousel-for").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                speed: 1000,
                vertical: true,
                autoplay: true,
                autoplaySpeed: 3000,
                asNavFor: ".s-service-carousel-nav",
                focusOnSelect: true,
                responsive: [{
                    breakpoint: 767,
                    settings: {
                        arrows: true,
                        prevArrow: "<button type='button' class='slick-prev pull-left custom-nav'><img src='assets/img/navigate_left.svg'></button>",
                        nextArrow: "<button type='button' class='slick-next pull-right custom-nav'><img src='assets/img/navigate_right.svg'></button>",
                        vertical: false
                    }
                }, ]
            });
            $(".s-service-carousel-nav").slick({
                slidesToShow: 7,
                slidesToScroll: 1,
                focusOnSelect: true,
                asNavFor: ".s-service-carousel-for",
                vertical: true,
                speed: 1000,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                prevArrow: "<button type='button' class='slick-prev pull-left custom-nav'><img src='assets/img/navigate_up.svg'></button>",
                nextArrow: "<button type='button' class='slick-next pull-right custom-nav'><img src='assets/img/navigate_down.svg'></button>",
                centerMode: true,
                centerPadding: 0,
            });
        })(jQuery);
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $("form#contact").submit(function(e) {
            e.preventDefault();
            let form = this;
            const fullNameregex = /^([\w]{3,})+\s+([\w\s]{3,})+$/i;
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phoneRegex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;

            let full_name = $.trim($(form).find('[name="full_name"]').val());
            let email = $.trim($(form).find('[name="email"]').val());
            let phone = $.trim($(form).find('[name="phone"]').val());
            let message = $.trim($(form).find('[name="message"]').val());

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
            } else if (message === "") {
                valid(form, 'message', 'Please Write Some Message');
                return false;
            } else {
                validate_clear();
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
                            $(form).find(".alert-success").text(response.msg);
                            $(form).find(".alert-success").slideDown("slow").delay(5000).slideUp();
                        } else {
                            $(form).find(".alert-danger").text(response.msg);
                            $(form).find(".alert-danger").slideDown("slow").delay(5000).slideUp();
                        }
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    },
                    error: function(response) {
                        $.each(response.responseJSON.errors, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                        $(form).find(".alert-info").text('').slideUp();
                        $(form).find('button[type="submit"]').prop('disabled', false);
                    }
                });
            }

        });
    </script>
@endpush
