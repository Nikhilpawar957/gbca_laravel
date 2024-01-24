@extends('frontend.layout.pages-layout')
@section('pageTitle',
    isset($pageTitle)
    ? $pageTitle
    : 'Industries | GBCA & Associates LLP Chartered
    Accountants')
    @push('stylesheets')
        <style type="text/css">
            footer {
                margin-top: 0;
            }

            .about-cta {
                margin-top: 0px;
            }
        </style>
    @endpush
@section('content')
    <section class="heading-page header-text industries-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Industries</li>
                        </ol>
                        <h2 class="page-title">Industries</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="industries-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item mb40 item1">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/banking.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>Banking, Financial Services and Insurance</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>PSBs</li>
                                <li>Insurance</li>
                                <li>NBFC and CIC</li>
                                <li>Broking</li>
                                <li>Financial Institutions</li>
                                <li>AIF</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item mb40 item6">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/manufacturcing.png') }}" alt=""
                                class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>Manufacturing</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>Specialty chemicals</li>
                                <li> Shipbuilding</li>
                                <li>Pipes and fittings</li>
                                <li>Steel Strips and Wires</li>
                                <li>Pharmaceuticals</li>
                                <li>Home Appliances</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item mb40 item2">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/infrastructure.svg') }}" alt=""
                                class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>Infrastructure</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>Real Estate</li>
                                <li>Construction</li>
                                <li>Logistics and Carriers</li>
                                <li>EPC</li>
                                <li>Shipyard</li>
                                <li>Project Management Consultants</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item item4">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/retailing.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>Retailing</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>FMCG</li>
                                <li>Pharma</li>
                                <li>Computers</li>
                                <li>Gems and Jewellery</li>
                                <li>Textiles and Apparels</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item item5">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/services.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>Services</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>HR Consultancy Services </li>
                                <li>Printing and publications</li>
                                <li>Hospitality and fine Dine Restaurants</li>
                                <li>Shipping agent</li>
                                <li>Professionals</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item item3">
                        <div class="icon">
                            <img src="{{ asset('assets/img/industries/it-sector.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="down-content">
                            <h4>IT and ITES</h4>
                        </div>
                        <div class="industry-hidden-content">
                            <ul>
                                <li>Digital Education</li>
                                <li>E-Commerce</li>
                                <li>IT Staffing</li>
                                <li>IT Software and Solutions</li>
                            </ul>
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
@endpush
