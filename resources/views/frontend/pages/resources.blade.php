@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style type="text/css">
        footer {
            margin-top: 0;
        }

        .cursor-none {
            cursor: text;
        }

        .news-item {
            margin-bottom: 30px;
            box-shadow: 0 0 15px 0 rgb(40 40 40 / 15%);
            background: #fff;
            border-radius: 10px;
            transition: all .3s ease;
            padding: 20px;
        }

        .nav-pills .nav-link.active .new-main-menu {
            color: #222222;
        }

        select {
            border: 1px solid #DDDDDD;
            border-radius: 4px;
            font: normal normal normal 12px/30px Lato;
            letter-spacing: 0px;
            color: #222222;
            word-wrap: normal;
            padding: 0 20px 0 2px;
        }

        select:focus-visible {
            background-color: transparent;
            border: 1px solid #DDDDDD;
        }

        .month-selection {
            margin-left: 20px;
        }

        .resou-content .desc-line1 {
            align-items: center;
            color: #e97f17;
        }

        .resou-content .desc-line1 .fa-calendar {
            margin-right: 4px;
        }

        .resou-content .desc-line1 a {
            color: #e97f17;
        }
    </style>
@endpush
@section('content')

    <section class="heading-page header-text resource-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Resources</li>
                        </ol>
                        <h2 class="page-title">Resources</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5 main-content">
        <div class="container">
            <div class=" bg-white flex-row service-box-section">
                <div class=" align-items-start d-change">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav flex-column nav-pills me-3 service-tabs" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="tab-head">
                                    Resources</button>
                                @foreach (\App\Models\Category::whereNull('parent_category')->orderBy('ordering')->get() as $category)
                                    @php
                                        $subcategories = DB::table('categories')
                                            ->where('parent_category', '=', $category->id)
                                            ->orderBy('ordering')
                                            ->get();
                                        if ($subcategories->isNotEmpty()) {
                                            $hasSubcat = 'br-btm-n newsletter-main';
                                        } else {
                                            $hasSubcat = '';
                                        }
                                    @endphp
                                    <a href="javascript:void(0);" class="nav-link {{ $hasSubcat }} {{ (Request('category') == $category->category_slug) ?  'active' : ''}}"
                                        id="v-pills-{{ $category->category_slug }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-{{ $category->category_slug }}" type="button"
                                        role="tab" aria-controls="v-pills-{{ $category->category_slug }}"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center justify-content-center me-3">
                                            <img src="{{ asset('storage/' . $category->category_image) }}">
                                        </div>
                                        {{ $category->category_name }}
                                    </a>

                                    @if ($subcategories->isNotEmpty())
                                        <div class="newsletter-sub" style="display: none;">
                                            @foreach ($subcategories as $key => $subcategory)
                                                <a href="javascript:void(0);" class="nav-link br-btm-n br-tp-n">
                                                    {{ $subcategory->category_name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content resources-tabs" id="v-pills-tabContent">
                                @foreach (\App\Models\Category::whereNull('parent_category')->get() as $category)
                                <div class="tab-pane fade {{ (Request('category') == $category->category_slug) ?  'show active' : ''}}" id="v-pills-{{ $category->category_slug }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $category->category_slug }}-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-md-4">
                                            <div class="d-flex">
                                                <div class="year-selection">
                                                    <p>Year:</p>
                                                    <select>
                                                        <option value="hide">Select</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                    </select>
                                                </div>
                                                <div class="year-selection">
                                                    <p>Month:</p>
                                                    <select>
                                                        <option value="hide">Select</option>
                                                        <option value="2019">Jan</option>
                                                        <option value="2020">Feb</option>
                                                        <option value="2021">March</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-8">
                                            <div class="search">
                                                <input type="text" class="searchTerm" placeholder="Search">
                                                <button type="submit" class="searchButton">
                                                    <img src="{{ asset('assets/img/resources/search_black.png') }}"
                                                        class="img-fluid">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resou-content">
                                        <h4 class="resou-head">{{ $category->category_name }}</h4>
                                    </div>
                                </div>
                                @endforeach
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
