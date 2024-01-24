@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Audit and Assurance | GBCA & Associates LLP Chartered
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
                            <li class="breadcrumb-item active" aria-current="page">Audit and Assurance</li>
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
                        <a href="{{ route('services.audit-and-assurance') }}" class="nav-link active">
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
                                                    <img src="{{ asset('assets/img/services/audit-assurance.jpg') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="service-quote-box service2">
                                                    <h4>Transperancy is a vital step towards assurance</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-page-content">
                                        <p>Audited financial statements provide an insight into depth of an entity's
                                            economic activity and it's SWOT for future potentials to the readers. A well
                                            conducted audit, in terms of quality processes by a competent team, helps the
                                            user to gauge the integrity of the information provided within the financial
                                            statements. </p>
                                        <p>Our audit commences with initial assessment and understanding of the client's
                                            business and identifying major risk areas which aids us to chalk out an
                                            effective audit plan. Detailed assessment of the client's business enables us to
                                            provide useful insights and constructive suggestions to the management in
                                            formulation of their business strategies, management information systems and
                                            internal control systems across wide variety of sectors.</p>
                                        <p>
                                            We work closely with our clients to comply with the applicable Accounting
                                            Standards, Standards on Auditing and other applicable provisions of various
                                            statutes. In doing so, we adhere to the highest standards of independence,
                                            confidentiality, integrity, professional objectivity and technical excellence.
                                        </p>
                                        <p>
                                            Our audit procedures and policies have been subjected to Peer Review and
                                            external reviews by Quality Review Board of ICAI. Our firm is registered with
                                            NFRA and has been filing details as required.</p>
                                    </div>
                                    <div class="service-accordian">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Statutory and Tax Audits
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <h6 class="list-title">We have rich experience in conducting
                                                            Statutory and Tax Audit of:</h6>
                                                        <ul class="orange-bullet-list">
                                                            <li> Listed Companies </li>
                                                            <li>Unlisted Public Companies </li>
                                                            <li>Public Sector Undertakings</li>
                                                            <li>Banking Companies</li>
                                                            <li>Insurance Companies </li>
                                                            <li>Non-Banking Financial Companies</li>
                                                            <li> Private Companies</li>
                                                            <li> Limited Liability Parternship Firms</li>
                                                            <li>Trusts</li>
                                                            <li> Others (Individuals, HUFs, AOP/BOIs)</li>
                                                        </ul>
                                                        <div class="service-para">
                                                            <p>Our expertise in conducting Statutory and Tax Audit expands
                                                                to various sectors including manufacturing, real estate,
                                                                shipping, hospitality, printing and publishing, banking,
                                                                insurance, financial services, etc.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Accounting and Financial Advisory
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <h6 class="list-title">Our advisory team has significant
                                                                hands-on experience in providing end-to-end solutions and
                                                                support services relating to financial requirements in a
                                                                wide range of scenarios i.e.</h6>
                                                            <ul class="orange-bullet-list">
                                                                <li>Setting up of Internal Financial Control System</li>
                                                                <li>Transaction Accounting </li>
                                                                <li> Group Consolidation </li>
                                                                <li>Preparation of Financial Statements under IGAAP / Ind AS
                                                                    / IFRS</li>
                                                                <li> CFO Support Service </li>
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
                                                        Implementation of Ind AS / IFRS
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>GAAP conversion is not just a mandatory compliance, but a
                                                                strategic one. Each company needs to develop its own roadmap
                                                                by considering its impact on various factors like
                                                                Information Technology, Finance, Human Resources, Tax, Legal
                                                                and Investor Relations. We understand the importance of
                                                                aligning financial reporting with regulatory changes and the
                                                                need for accurate financial reporting. We have successfully
                                                                helped our clients migrate to the Ind AS / IFRS framework
                                                                ensuring a seamless transition. We have rich in-house
                                                                expertise of the subject and provide following range of
                                                                services on GAAP conversions: </p>
                                                            <ul class="orange-bullet-list">
                                                                <li> Assistance in first time adoption of Ind AS/IFRS </li>
                                                                <li> Accounting advisory on the application of Ind AS and
                                                                    IFRS </li>
                                                                <li> Assistance on disclosures on the adoption of new
                                                                    accounting framework</li>
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
