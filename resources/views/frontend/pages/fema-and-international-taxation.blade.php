@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'FEMA & International Taxation | GBCA & Associates LLP Chartered
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
                            <li class="breadcrumb-item active" aria-current="page">FEMA and International Taxation
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
                        <a href="{{ route('services.direct-tax') }}" class="nav-link">
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
                        <a href="{{ route('services.fema-and-international-taxation') }}" class="nav-link active">
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
                                                    <img src="{{ asset('assets/img/services/fema.jpg') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="service-quote-box service3 sbig-content">
                                                    <h4>Clarity on taxation and certainty on compliance in cross border
                                                        transactions - A dire necessity for global business scenario</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-page-content fema-tax">
                                        <p>Today when the entire globe has become one market and borders are vanishing
                                            through digitalization of businesses and functions, the global tax environment
                                            has become more complex and fluid than ever before. One needs solid tax
                                            solutions and certainity in regulatory compliance before venturing into any
                                            cross border transactions be it inbound or outbound investment. From India
                                            perspective, exchange control regulations closely regulate and monitor inbound
                                            and outbound transactions, the ignorance of which can lead to severe penal
                                            consequences. Simultaneoulsy tax implications arising on such transactions need
                                            a 360 degree view of the situation from domestic tax laws and international tax
                                            development. We provide sound advisory for cross border transactions and prudent
                                            tax solutions to domestic as well as foreign entities and individuals. Our team
                                            strives to keep pace with ever dynamic global tax developments and provide
                                            holistic tax solutions.</p>
                                    </div>
                                    <div class="service-accordian">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Expatriates Taxation
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Advising on secondment/deputation agreement and tax and
                                                                    regulatory implications for employer including PE
                                                                    exposure.</li>
                                                                <li> Analysing tax equalization policy for expatriates.</li>
                                                                <li> Determing residential status and availability of
                                                                    Foreign Tax Credit.</li>
                                                                <li> Obtaining tax registration and handholding expatriates
                                                                    for Indian tax and regulatory compliances.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Inbound and Outbound Investment structuring
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Advisory on inbound investments in India and related
                                                                    reporting compliance .</li>
                                                                <li> Advisory on structuring outbound investments and
                                                                    related reporting compliance .</li>
                                                                <li> Establishment and Closure of Liaision/Branch/Project
                                                                    Office of foreign companies in India.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        FEMA Advisory and Representation
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Impact analysis on change in residential status .</li>
                                                                <li> Advisory and compliance for repatriation of funds.</li>
                                                                <li> Consultation on Acquisition/Transfer of immovable
                                                                    properties, shares and securities in India by NRIs by
                                                                    way of sale and gift.</li>
                                                                <li> Application to RBI for obtaining approvals.</li>
                                                                <li> Representation before RBI for compunding of offences.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Cross Border Transaction Advisory and BEPS Impact Analysis
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Analysing withholding tax implications and evaluating
                                                                    eligibility for benefits under tax treaties vis-à-vis
                                                                    domestic tax law considering MLI and limitation of
                                                                    benefit provisions.</li>
                                                                <li> Withholding tax certification for cross border
                                                                    remittances.</li>
                                                                <li> Analysing impact of global restructuring under indirect
                                                                    transfer regime.</li>
                                                                <li> Impact analysis of BEPS Action Plans.</li>
                                                                <li>Tax Advisory for cross border digital transactions
                                                                    including equalization levy - Obtaining Nil/lower
                                                                    withholding tax certificates from tax authorities.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        Advisory on POEM and Permanent Establishment Exposure
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Place of Effective Management (POEM) impact analysis
                                                                    for outbound investments.</li>
                                                                <li> Advisory on PE exposure and related safeguarding
                                                                    measures.</li>
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
                    <div class="head-btn d-none d-lg-block d-md-block services-resource">
                        <a href="{{ route('resources.all') }}">View all <img src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                class="img-fluid btn-arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="head-btn d-block d-lg-none d-md-none">
                    <a href="{{ route('resources.all') }}">View all <img src="{{ asset('assets/img/arrow-right-white.svg') }}"
                            class="img-fluid btn-arrow"></a>
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
