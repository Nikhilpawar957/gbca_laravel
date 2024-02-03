@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style>
        footer {
            margin-top: 0;
        }

        .about-cta {
            margin-top: 15px;
        }
    </style>
@endpush
@section('content')

    <section class="heading-page header-text about-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                        <h2 class="page-title">About GBCA</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="overview-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h2 class="section-heading d-block d-lg-none"> Overview</h2>
                    <div class="section-img">
                        <img src="{{ asset('assets/img/about/comp-overview.jpg') }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="content-box">
                        <h2 class="section-heading d-none d-lg-block"> Overview</h2>
                        <p>GBCA and Associates LLP (formerly Ghalla and Bhansali) is a leading Chartered Accountant’s firm
                            based in Mumbai, India. Founded in 1955, with the paramount belief that “When You Win, We Win”.
                            Our value added and dedicated services have made us a preferred Chartered Accountancy Firm.</p>
                    </div>
                    <div class="counter-section">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 stats plus">
                                <div class="counting" data-count="65">0</div>
                                <h5>Years of Experience</h5>
                            </div>
                            <div class="col-lg-4 col-md-4 stats sat-client">
                                <div class="counting" data-count="5">0</div>
                                <h5>Jobs Delivered per annum</h5>
                            </div>
                            <div class="col-lg-4 col-md-4 stats plus last-item">
                                <div class="counting" data-count="20">0</div>
                                <h5>Sectors Catered</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="overview-extra-content">
                        <p class="bottom-space">We are a team of over 125 including 10 Partners, a Chief Executive Officer
                            and 18 Professionals. Our team’s expertise in bringing creative and practical solutions tailored
                            to clients’ unique requirements has earned us the trust and confidence of numerous domestic and
                            international clients. We assist businesses and organisations from start-up through growth and
                            transition. We serve individuals, families and businesses in a broad spectrum of industries.</p>
                        <p> We at GBCA, are committed in ensuring that our services are provided maintaining the highest
                            ethical and professional standards with paramount emphasis to the interest of clients. We
                            provide comprehensive end-to-end solutions to our clients across Audit and Assurance, Tax and
                            Regulatory, Business Advisory and Transaction Advisory.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="values-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 order-2 order-lg-1">
                    <div class="content-box">
                        <h2 class="section-heading d-none d-lg-block">Legacy and Values</h2>
                        <p>The foundation of GBCA and Associates LLP was laid by Mr. Devchand R. Ghalla and Mr. Niranjan H.
                            Bhansali with a goal of delivering superior services incorporating the virtues of character,
                            integrity and accountability. These virtues have enabled us in forging lasting relationships,
                            become trusted service providers and an active partner in our clients’ success. In the last six
                            decades, we have stood by our clients through changing times and business cycles and will
                            continue to do so.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 order-1 order-lg-2">
                    <h2 class="section-heading d-block d-lg-none">Legacy and Values</h2>
                    <div class="section-img">
                        <img src="{{ asset('assets/img/about/values.jpg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mission-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-box">
                        <h2 class="section-heading">Our Mission</h2>
                        <div class="mission-white-box">
                            <h4 class="d-none d-lg-block d-md-block">
                                To offer specialized, professional and<br /> personalized services with an aim of value
                                addition<br /> and satisfaction of our clients.
                            </h4>
                            <h4 class="d-block d-lg-none d-md-none">
                                To offer specialized, professional and<br /> personalized services<br /> with an aim of
                                value <br />addition and <br />satisfaction of our<br /> clients.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="approach-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h2 class="section-heading d-block d-lg-none">Focused Approach</h2>
                    <div class="section-img">
                        <img src="{{ asset('assets/img/about/focused-app.jpg') }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="content-box">
                        <h2 class="section-heading d-none d-lg-block">Focused Approach</h2>
                        <p>We are a large enough organisation to serve our clients comprehensively and yet, small and agile
                            enough to provide personal and focused attention and offer services to meet client specific
                            requirements. We believe in getting deeply familiar with the details of our clients’
                            organisations to develop a thorough understanding of their business. This enables us to offer
                            proactive and customised solutions, focusing on client requirements, that help in serving the
                            clients’ current needs and anticipating future challenges.</p>
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
                        <h2>Our Expert Team</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 team-row-2">
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team1" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/dinesh-ghalla.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Dinesh D. Ghalla </h5>
                                    <h6>Family Business and Taxation Consultancy </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team2" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/haresh-chheda.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Haresh K. Chheda </h5>
                                    <h6>Transaction Advisory, Family office, Estate & Succession Planning </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team3" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/sanjeev-lahan.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Sanjeev D. Lalan </h5>
                                    <h6>Audits of Regulated Entities and Tax Litigations</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team4" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/tansukh-chheda.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Tansukh K. Chheda </h5>
                                    <h6>Indirect Taxation</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-5  row-cols-lg-5">
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team5" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/varsha.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Varsha R. Galvankar </h5>
                                    <h6>Foreign Exchange Regulations and NRI Advisory</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="#" id="team6" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/haresh-kenia.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Haresh P. Kenia</h5>
                                    <h6>Direct Tax & Corporate Tax Advisory </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team7" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/hitesh-pasad.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Hitesh K. Pasad</h5>
                                    <h6>Assurance and Corporate Laws </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team8" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/yogesh-amal.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Yogesh R. Amal </h5>
                                    <h6>Assurance, System Controls and Business Support Services </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team9" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/toral-shah.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Toral J. Shah </h5>
                                    <h6>Family Office, Estate and Succession Planning </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 team-row-2">
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team10" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/viral-maru.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Viral P. Maru </h5>
                                    <h6>Assurance, Due Diligence and Family Office</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team11" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/amit-sawant.jpeg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Amit A. Sawant </h5>
                                    <h6>Transaction Advisory, M&A Services</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="javascript:void();" id="team12" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/niraj-chheda.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Niraj B. Chheda </h5>
                                    <h6>International & Expatriate Taxation, Transfer Pricing </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col plr0">
                    <div class="item team-images">
                        <a href="#" id="team13" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="{{ asset('assets/img/about/rohan-ghalla.jpg') }}" alt="team member">
                            <div class="team-overlay">
                                <div class="team-desc">
                                    <h5>Rohan D. Ghalla</h5>
                                    <h6>Family Office, Business Process and Business Consultancy</h6>
                                </div>
                            </div>
                        </a>
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

    <!-- The Modal -->
    <div class="container my_container">
        <div class="modal fade team-member-details" id="myModal">
            <div class="modal-dialog my_class">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <img src="#" class="img-fluid mydisplay my_float">
                            </div>
                            <div class="col-lg-7 team-info">
                                <span class="my_content"> </span>
                                <span class="my_clear"> </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script type="text/javascript">
        $('.counting').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');
            $({
                countNum: $this.text()
            }).animate({
                countNum: countTo
            }, {
                duration: 3000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }
            });
        });
    </script>
@endpush
