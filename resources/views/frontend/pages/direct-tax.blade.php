@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Direct Tax | GBCA & Associates LLP Chartered
    Accountants')
    @push('stylesheets')
        <style type="text/css">
            footer {
                margin-top: 0;
            }
        </style>
    @endpush
@section('content')

    <section class="heading-page header-text service-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Direct Tax</li>

                        </ol>
                        <h2 class="page-title">Delivering Excellence</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 main-content">
        <div class="container">
            <div class="d-flex bg-white flex-row service-box-section">
                <div class="d-flex align-items-start d-change">
                    <div class="nav flex-column nav-pills me-3 service-tabs" role="tablist" aria-orientation="vertical">
                        <button class="tab-head">
                            Services</button>
                        <a href="{{ route('services.transaction-and-business-structuring') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img
                                    src="{{ asset('assets/img/services/services-icons/business_structuring_grey-32px.svg') }}">
                            </div>
                            Transaction and Business Structuring
                        </a>
                        <a href="{{ route('services.audit-and-assurance') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/audit_grey-32px.svg') }}">
                            </div>
                            Audit and Assurance
                        </a>
                        <a href="{{ route('services.direct-tax') }}" class="nav-link active">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/direct_tax_grey-32px.svg') }}">
                            </div>
                            Direct Tax
                        </a>
                        <a href="{{ route('services.corporate-and-regulatory-laws') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/tax_law_grey-32px.svg') }}">
                            </div>
                            Corporate and Regulatory Laws
                        </a>
                        <a href="{{ route('services.indirect-tax') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/indirect_tax_grey-32px.svg') }}">
                            </div>
                            Indirect Tax
                        </a>
                        <a href="{{ route('services.fema-and-international-taxation') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/fema_grey-32px.svg') }}">
                            </div>
                            FEMA and International Taxation
                        </a>
                        <a href="{{ route('services.safe') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/safe_grey-32px.svg') }}">
                            </div>
                            SAFE
                        </a>
                        <a href="{{ route('services.doing-business-in-india') }}" class="nav-link">
                            <div class="d-flex align-items-center justify-content-center me-3">
                                <img src="{{ asset('assets/img/services/services-icons/business_india_grey-32px.svg') }}">
                            </div>
                            Doing Business in India
                        </a>
                        <div class="service-extra-box d-none d-lg-block">
                            <div class="service-contact">
                                <h2 class="section-heading">Got Questions?</h2>
                                <p>We'll Take It From Here.</p>
                                <a href="{{ route('contact-us') }}" class="orange-btn">Contact Us <img
                                        src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                        class="img-fluid btn-arrow"></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <div class="">
                                <div class="transaction-service">
                                    <div class="service-image-with-content">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7">
                                                <div class="service-img">
                                                    <img src="{{ asset('assets/img/services/direct-tax.jpg') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="service-quote-box service3">
                                                    <h4>Paying the price of civilisation while mitigating the risks of
                                                        uncertainty</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-page-content direct-tax">
                                        <p>Simplicity in taxation system is an illusionary maxim, rarely achieved. The ever
                                            changing economic environment and complexities fuel complexities in more than
                                            one way. In terms of trade in goods and services the world is continuously
                                            shrinking on the back of the evolving technologies which have also invaded the
                                            homes. The convergence of technologies, changing canvass of supply chains with
                                            evolution of technology that facilitates last mile efficient deliveries has at
                                            times distorted the middle level of this chain to almost unrecognisable levels.
                                        </p>
                                    </div>

                                    <div class="service-accordian">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Advisory and Consultation
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>
                                                                Our team thoroughly analyses the direct tax laws to offer
                                                                timely tax advice on complex matters to resolve your tax
                                                                dilemma and mitigate the associated risks and also provides
                                                                opinion on direct tax related queries from clients.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Planning and Compliance
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>
                                                                Tax planning is mainly understanding of various business
                                                                taxes liable to pay and looking at ways and means in a
                                                                manner such that it make business more tax efficient. Tax
                                                                Compliance is crucial to avoid the probable obligations due
                                                                to the ever changing standards. Our team provides
                                                                comprehensive guidance towards the impact of tax laws and
                                                                its compliance within the four corners of law.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Litigation and Representations
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>We offer a wide range of legal services for disputes
                                                                pertaining to scrutiny assessment proceedings, re-assessment
                                                                proceedings, search proceedings, revision proceedings, TDS
                                                                proceedings and penalty proceedings. Our team with quality
                                                                standards of technical skill and knowledge represents before
                                                                various forums including CIT(A) and ITAT to assist clients
                                                                steer through disputes efficiently.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Certifications
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>To the accelerating requirements of various financial
                                                                institutions, we provide certifications in accordance with
                                                                the provisions and rules of the respective statute.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        Transfer Pricing
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Evaluating applicability of Indian Transfer Pricing
                                                                    provisions on intercompany international transactions
                                                                </li>
                                                                <li> Assistance in setting up business/operational mode,
                                                                    Initial Transfer Pricing Study and benchmarking </li>
                                                                <li>Transfer Pricing Audit/Certification</li>
                                                                <li> Assistance in Country by Country Reporting (CbCR) and
                                                                    Master File reporting requirements</li>
                                                                <li> Transfer Pricing Assessments and Appeals including
                                                                    representation before DRP and Assistance in relation to
                                                                    Safe Harbour Application </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="service-extra-box d-block d-lg-none">
                        <div class="service-contact">
                            <h2 class="section-heading">Got Questions?</h2>
                            <p>We'll Take It From Here.</p>
                            <a href="{{ route('contact-us') }}" class="orange-btn">Contact Us <img
                                    src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                    class="img-fluid btn-arrow"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-resources service-resources">
        <div class="container-fluid res-container">
            <div class="row">
                <div class="col-lg-8 offset-lg-1 col-md-8 head-margin">
                    <div class="resour-head">
                        <h2>Explore Our Resources</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
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
