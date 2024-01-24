@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Careers | GBCA & Associates LLP Chartered
    Accountants')
    @push('stylesheets')
        <style type="text/css">
            footer {
                margin-top: 0;
            }
        </style>
    @endpush
@section('content')
    <section class="heading-page header-text careers-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Careers</li>
                        </ol>
                        <h2 class="page-title">Careers</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="career-apply-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="content-box apply-box-left">
                        <h2 class="section-heading">How should I Apply?</h2>
                        <p class="apply-para">Join us by applying with these 3 easy steps and be a part of the team.</p>
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="apply-step">
                                    <img src="{{ asset('assets/img/careers/profile.svg') }}" class="img-fluid">
                                    <h6>Apply for the desired profile</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="apply-step">
                                    <img src="{{ asset('assets/img/careers/fill-form.svg') }}" class="img-fluid">
                                    <h6 class="d-none d-lg-block">Fill the form <br />and submit</h6>
                                    <h6 class="d-block d-lg-none">Fill the form & submit</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="apply-step">
                                    <img src="{{ asset('assets/img/careers/cv.svg') }}" class="img-fluid">
                                    <h6 class="d-none d-lg-block">E-Mail us <br />your CV</h6>
                                    <h6 class="d-block d-lg-none">E-Mail us your CV</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="apply-quote">
                        <img src="{{ asset('assets/img/careers/left-quote-3.svg') }}" class="white-left-quote">
                        <h4>At GBCA and Associates LLP, opportunities are endless and so are the challenges and rewards. For
                            a team of highly qualified, professional, competitive members, who are fueled by collaboration,
                            we are looking for experienced resource. We believe in challenging and exciting young minds.
                        </h4>
                        <img src="{{ asset('assets/img/careers/left-quote-2.svg') }}" class="white-right-quote">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="join-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  col-md-12 text-center">
                    <div class="center-head">
                        <h2>Join Us!</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="join-section-bottom">
        <div class="container">
            <div class="join-us-boxes">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="join-content-box">
                            <img src="{{ asset('assets/img/careers/ca.png') }}" class="img-fluid join-icon">
                            <h4>Chartered Accountants</h4>
                            <div class="apply-btn">
                                <a href=" https://gbcaindia.peopleapps.in/Pages/JobBoard/Opening.aspx?v=b511943e-2e82-41c3-9c3c-910111ac1756"
                                    target="_blank" class="orange-btn">Apply Now <img
                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                        class="img-fluid btn-arrow"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="join-content-box">
                            <img src="{{ asset('assets/img/careers/semi-quali.svg') }}" class="img-fluid join-icon">
                            <h4>Semi-Qualified and Others</h4>
                            <div class="apply-btn">
                                <a href="https://gbcaindia.peopleapps.in/Pages/JobBoard/Opening.aspx?v=1d681828-16bd-49a9-95de-7432475c3aaf"
                                    target="_blank" class="orange-btn">Apply Now <img
                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                        class="img-fluid btn-arrow"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="join-content-box">
                            <img src="{{ asset('assets/img/careers/articleship.svg') }}" class="img-fluid join-icon">
                            <h4>Articleship at GBCA</h4>
                            <div class="apply-btn">
                                <a href=" https://gbcaindia.peopleapps.in/Pages/JobBoard/Opening.aspx?v=8030df1d-6f2d-4f90-9efd-1e97936ae2ae"
                                    target="_blank" class="orange-btn">Apply Now <img
                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                        class="img-fluid btn-arrow"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="teams-section">
        <div class="container res-container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="resour-head">
                        <h2>Testimonials</h2>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="owl-slider">
                <div id="carousel" class="owl-carousel testimonial-carousel">
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>GBCA is an Institution that has always nurtured and empowered the talent & transformed lives
                                of various teammates associated with it over past 6.5 decades . During my 30 years long
                                association with the firm I am most influenced by the strong ethical values nurtured by the
                                firm , most inspired by the progressive and professional conduct followed by the firm and
                                most touched by the human approach of the firm towards its teammates that makes GB the most
                                secured , vibrant and enjoyable work place. </h5>

                            <div class="testi-info">
                                <h5> Varsha Galvankar </h5>
                                <h6>CEO </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>


                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>For me GBCA is not only a professional organisation but an institution for the aspiring
                                Chartered Accountants. I would really like to acknowledge key traits of the organisation
                                which contributed to my journey from an intern to partner – entrusting confidence in team
                                members, sense of ownership to each team members, dedicated training programmes, knowledge
                                and experience sharing and strong ethics and values. <br />
                                Being a part of GBCA family for almost decade now, gives me a sense of pride

                            </h5>
                            <div class="testi-info">
                                <h5>Amit Sawant </h5>
                                <h6>Partner </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I have been part of the GBCA family for almost 8 years now. My journey from a first year
                                intern to an Assistant Manager - FEMA and International Tax has been a very energizing and
                                transformative one. A very unique attribute that I found here is that GBCA builds a great
                                sense of responsibility in us right from our internship phase that we start demonstrating an
                                ownership mindset in every little task we do. This culture undoubtedly resonates with me and
                                has been one of the key fascinating factors for my continuous ties with GBCA family. Apart
                                from providing holistic service to clients, GBCA has also given equal importance on
                                developing me professionally as an individual. I can proudly say that my individual goals
                                are very closely aligned with the firm's professional goals. </h5>
                            <div class="testi-info">
                                <h5>Jini Jain </h5>
                                <h6>Manager </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>It’s been around 9 years working at GBCA and it has indeed been a very enriching experience
                                for me. The organization is sensitive towards work life balance and is always ready to
                                provide assistance or education to help you learn new skills. The work culture in GBCA is
                                very dynamic and transparent and provides plenty of growth and learning opportunities for
                                everyone to nurture and grow both professionally and personally. It not only gives a chance
                                to excel in your core domain but also gives equal opportunities to take advantage of cross
                                functional learnings which aids in an overall career growth. Peers at GBCA are extremely
                                encouraging and energetic who are always around to support at times of need. Overall, GBCA
                                is a great place to work and learn. Coming to work every day has been easy and enjoyable
                                because it's not like coming to work, it’s like coming to see your extended family.
                            </h5>
                            <div class="testi-info">
                                <h5>Neel Shah </h5>
                                <h6>Manager </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I am passionate about taxation and working for GBCA has boosted the passion to new heights.
                                What I like to have by the end of the day is a sense of satisfaction and accomplishment.
                                Here in GBCA, I have always been given responsibility which not only helps me build a level
                                of confidence but also motivates to perform consistently. The way in which GBCA collaborates
                                and operates as a team is something to be admired of as everyone is willing to guide and
                                advise. That feeling of having support is reassuring and comforting.<br />
                                The culture of GBCA is very engaging and nurturing, so it is an ideal workplace. </h5>
                            <div class="testi-info">
                                <h5>Prashant Shah</h5>
                                <h6>Manager </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>

                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>Got an opportunity to join GBCA as an Entry level under Indirect Taxation as semi qualified
                                CA staff and now I hold the position as Associate - Indirect tax.
                                I worked as a staff for a long span and the bond & culture of the office is commendable. We
                                all are working together for more than a decade the reason being employee empowerment,
                                strong family values and opportunity to work in all areas of taxations.<br />
                                I have been promoted from staff to an Associate level due to my dedication, my partner's
                                support and knowledge sharing of all the colleagues at office level.<br />
                                Working with GBCA is an outstanding experience with great opportunities coming up to learn
                                and grow.
                            </h5>
                            <div class="testi-info">
                                <h5>Ankit Chheda</h5>
                                <h6>Associate </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I have been with GBCA for last 15 years. The work culture here has helped me to learn and
                                grow both personally and professionally. The firm cares about their employees like a family.
                                I really enjoy working with the people here. They encourage you to grow in your professional
                                area.
                            </h5>
                            <div class="testi-info">
                                <h5> Komal Dave</h5>
                                <h6>Senior Executive </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I started my journey in GBCA from August 2017. I found myself in my first full-time
                                opportunity working under a different work area. There is a lot to learn in my firm and the
                                work culture over here is amazing. They have seen my potential and encouraged me to develop
                                it by trusting me with increasing responsibility. I have been fortunate to be surrounded by
                                great individuals who are generous in sharing knowledge. It’s almost been 5 years I am
                                associated with GBCA and it has been a wonderful journey which has progressed my career
                                professionally and personally. I am proud to be a part of this firm.
                            </h5>
                            <div class="testi-info">
                                <h5> Ringal Shigvan </h5>
                                <h6>Executive </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>Before I joined GBCA i use to think why do people call their work place their second home.
                                After working here I realised how much it is true. GBCA has been a guide, a mentor for me.
                                There were times when I was pushed to my limits only to find out how much more potential I
                                had. It has taught me that if the plan is not working you change your plan, but always
                                achieve your goal.
                            </h5>
                            <div class="testi-info">
                                <h5> Sheetal Monani </h5>
                                <h6>Executive </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I have been associated with GBCA as an article assistant for the last 2 years now. GBCA has
                                been a great enabler towards offering new learning opportunities and experiences. One of the
                                qualities that I appreciate about GBCA culture is that it recognizes talents and gives ample
                                opportunities for professional as well as individual development. Another positive thing
                                about the culture that GBCA has built is the positive teamwork. Everyone at GBCA is
                                extremely encouraging and like one big family who are always ready to help.
                            </h5>
                            <div class="testi-info">
                                <h5> Mansi Dedhia </h5>
                                <h6>Article Assistant </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                    <div class="item">
                        <div class="testi-content">
                            <img src="{{ asset('assets/img/careers/testi-left-quote.svg') }}" class="left-black-quote">
                            <h5>I have been associated with GBCA for the past one year as an article assistant. It is truly
                                an experiential journey both personally and professionally. Ample opportunities are provided
                                to give exposure and enhance learning across various domains. I feel like I’m part of a team
                                which wants to make a real difference by providing quality deliverables. Support and
                                direction given by mentors is highly motivating.
                            </h5>
                            <div class="testi-info">
                                <h5> Priyanshu Jain </h5>
                                <h6>Article Assistant </h6>
                            </div>
                            <img src="{{ asset('assets/img/careers/testi-right-quote.svg') }}" class="right-black-quote">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="opport-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="content-box oppr-left-spac">
                        <h2 class="section-heading">Opportunities</h2>
                        <div class="section-img d-block d-lg-none d-md-none">
                            <img src="{{ asset('assets/img/careers/opportunity.jpg') }}" class="img-fluid">
                        </div>
                        <p class="para-style">We, at GBCA, believe in positive teamwork and opportunity for all. We strive
                            for growth and experience for everyone part of the team. Since foundation, over 250+ Articles
                            have cleared as Chartered Accountants till today and in the last 5 years, there have been 13 All
                            India Rankers (AIRs) at CA Final Exams.
                        </p>
                        <p class="para-style"> In these dynamic times, we have taken utmost care towards the health of our
                            personnel by shifting to an online network for Work From Home (WFH) which we expect to be
                            followed for coming months as well.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 pr0">

                    <div class="section-img d-none d-lg-block d-md-block">
                        <img src="{{ asset('assets/img/careers/opportunity.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="key-benefit">
                        <h4>Key Benefits Working With GBCA</h4>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="benefit-box move-up">
                                    <img src="{{ asset('assets/img/careers/team-work.svg') }}" class="benefit-icon1">
                                    <h4>Positive Teamwork</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="benefit-box move-up">
                                    <img src="{{ asset('assets/img/careers/equal-app.svg') }}" class="benefit-icon2">
                                    <h4>Equal Opportunities</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="benefit-box move-up">
                                    <img src="{{ asset('assets/img/careers/dynamic-time.png') }}" class="benefit-icon3">
                                    <h4>Holistic Development</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8">
                    <div class="cta-line">
                        <h4>If you need any advice! Just write a line.</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="abt-cta-btn">
                        <a href="{{ route('contact-us') }}" class="trasf-btn">Get In Touch <img
                                src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
                    </div>
                </div>

            </div>
        </div>

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
