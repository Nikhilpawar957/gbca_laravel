@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Doing Business in India | GBCA & Associates LLP Chartered
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
                            <li class="breadcrumb-item"><a href="index.php">GBCA </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doing Business in India
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
                        <a href="{{ route('services.doing-business-in-india') }}" class="nav-link active">
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
                                                    <img src="{{ asset('assets/img/services/doing-business-in-india.jpg') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="service-quote-box service8">
                                                    <h4>One Stop Services- Your Trusted Advisors and Partners for the India
                                                        Entry and Growth Journey</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-page-content business-tax">
                                        <p>India is a land of opportunities. With its immense potential and business
                                            prospects, it is emerging to be the most preferred jurisdiction globally for the
                                            Multinationals to expand their businesses. For the top management remotely
                                            operating the businesses,we can be your trusted advisors on the ground to ensure
                                            tax and regulatory compliance and timely escalation of the challenges involved
                                            with possible solutions. We provide specialised services with personalized
                                            attention and bespoke solutions tailored to your requirements. We commit to be
                                            active partners in your journey beginning from testing Indian markets to being
                                            completely integrated with India.</p>
                                    </div>

                                    <div class="service-accordian">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Advisory on Entry mode and Implementation
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Assistance in selection of optimal legal structure
                                                                    achieving commercial objectives for entry strategy in
                                                                    India.</li>
                                                                <li> Setting up legal entity in India.</li>
                                                                <li> Obtaining various tax and regulatory registrations.
                                                                </li>
                                                                <li> Liasing with bankers and other agencies in India.</li>
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
                                                        Equity and Debt Capital Structuring
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li> Advising on optimum capital structure balancing
                                                                    commercial objectives with tax and regulatory
                                                                    implications.</li>
                                                                <li> Debt structuring including External Commercial
                                                                    Borrowings (ECB) and related tax and regulatory
                                                                    compliances.</li>
                                                                <li> Strategy for tax efficient cash repatriation.</li>
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
                                                        Tax and Regulatory Compliance
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>Multidisciplinary firm providing Tax and Regulatory services
                                                                through pool of dynamic and experienced professionals. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Exit Strategy
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <ul class="orange-bullet-list">
                                                                <li>Identifying various exit options and analysing tax and
                                                                    regulatory implications for informed decision making.
                                                                </li>
                                                                <li>Implementation of Exit Plan in entirety with need based
                                                                    coordination with other professionals.</li>
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
                        <a href="resources.php">View all <img src="{{ asset('assets/img/arrow-right-white.svg') }}"
                                class="img-fluid btn-arrow"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="head-btn d-block d-lg-none d-md-none">
                    <a href="resources.php">View all <img src="{{ asset('assets/img/arrow-right-white.svg') }}"
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
