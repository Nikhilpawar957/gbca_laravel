@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Corporate & Regulatory Laws | GBCA & Associates LLP Chartered
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
                            <li class="breadcrumb-item active" aria-current="page">Corporate and Regulatory Laws</li>
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
                        <a href="{{ route('services.corporate-and-regulatory-laws') }}" class="nav-link active">
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
                                                    <img src="{{ asset('assets/img/services/corporate-regulatory-laws.jpg') }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5">
                                                <div class="service-quote-box service3">
                                                    <h4>One stop solution for your business's robust and compliant evolution
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-page-content direct-tax">
                                        <p>Faced with the dynamism in the legislation and regulatory requirements under
                                            corporate and other regulatory laws, every business needs to ensure that it is
                                            in good corporate order, ensuring the compliance in all aspects through the use
                                            of knowledge and expertise. We, at GBCA, strive to provide comprehensive
                                            Secretarial and Management Advisory Services in the field of Corporate Laws,
                                            Financial Management and Corporate Finance. The firm possess extensive
                                            experience and knowledge of corporate secretarial compliances, securities
                                            related laws and regulations, new business formations and corporate affairs. The
                                            firm aims to cater wide spectrum of clients from small-medium sized corporates
                                            to large MNC's with a commitment to excel in all our endeavors and deliver
                                            professionally high quality services.
                                        </p>
                                        <p>
                                            Whether you are planning to set up your business or reviewing your approach to
                                            corporate compliance, partnering with GBCA can deliver discernibility and
                                            tranquility and assist companies in becoming a compliant corporate member.</p>
                                    </div>

                                    <div class="service-accordian">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Incorporation - Company / LLP
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>We provide services for incorporation of Limited Liability
                                                                Partnership (LLP) and various types of companies such as
                                                                Private company, Public Company, Section 8 (not-for-profit)
                                                                company, One Person Company (OPC). </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Compliances
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>We ensure timely compliance for good corporate governance and
                                                                undue action / litigation from statutory authorities. The
                                                                compliances include Periodical / Annual compliance, Event
                                                                based compliance. Assisting in Conducting of Board Meetings,
                                                                Committee Meetings, General Meetings Drafting Minutes,
                                                                Notices and Resolutions and Maintaing and updating statutory
                                                                registers. Drafting of LLP Agreement and updation of changes
                                                                in Partners with ROC.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Advisory and Consultation
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>Professional expertise in consulting and advising upon
                                                                corporate and regulatory laws matter includes CSR
                                                                Consultancy, Corporate Governance Matters, Dividend
                                                                Declaration and Corporate Structuring / Restructuring.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        NBFC - Registration, Compliance and Advisory
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>Non Banking Financial Company (NBFC) is a Company Registered
                                                                with Reserve Bank of India (RBI) as Non Banking Financial
                                                                Institution (NBFI) to carry on the business of Loans and
                                                                Advances, Hire Purchase, Leasing, Investing, etc. We provide
                                                                services like:
                                                                Advising, Applying and Liasoning with Reserve Bank of India
                                                                (RBI) for obtaining Certificate of Registration(COR) as NBFI
                                                                with RBI.</p>
                                                            <p>
                                                                Drafting and Formulating various policies to be adopted by
                                                                NBFCs, Fair Practice Code as applicable to NBFCs and all
                                                                Periodic /Annual / Event based compliances with RBI
                                                                applicable to NBFCs.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        AIF
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>An Alternate Investment Fund (AIF) is a privately pooled
                                                                investment fund, (whether from Indian or foreign sources),
                                                                in the form of a trust or a company or a body corporate or a
                                                                Limited Liability Partnership(LLP) which is classified into
                                                                3 categories based on its Investment objective.</p>

                                                            <p>We provide services like:<br />
                                                                Assisting in setting up and registering a Category I/II/III
                                                                AIF with SEBI, Assisting in drafting of Fund documents
                                                                (Private Placement Memorandum [PPM], Contribution Agreement,
                                                                Investment Manager Agreement), Conducting PPM Audit,
                                                                Statutory Audit as per AIF regulations, Assistance in
                                                                preparation and review of NAV statement, Periodic / Annual /
                                                                Event based compliances with SEBI, Tax Advisory, Filing of
                                                                Income Tax Return.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                        aria-expanded="false" aria-controls="collapseSix">
                                                        Secretarial Support Services
                                                    </button>
                                                </h2>
                                                <div id="collapseSix" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>Buy-back of Shares, Rights issue and Private Placement of
                                                                Securities, Bonus Issue of Shares, Transfer of Shares,
                                                                Conversion of debt to equity, Conversion of Company to LLP
                                                                and vice-versa, Conversion of Partnership Firm and
                                                                Proprietorship to Company. Creation and Satisfcation of
                                                                Charge for Companies and LLPs. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSeven">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                        aria-expanded="false" aria-controls="collapseSeven">
                                                        Winding-up - Company / LLP
                                                    </button>
                                                </h2>
                                                <div id="collapseSeven" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="service-para">
                                                            <p>Preparing applications and liaisoning for Striking off the
                                                                Companies / LLPs from ROC. Assiting in winding up of company
                                                                with National Company Law Tribunal (NCLT). </p>
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
                                    src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
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
