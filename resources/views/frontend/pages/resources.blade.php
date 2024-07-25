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

        .pagination,
        .jsgrid .jsgrid-pager {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem
        }

        .page-link {
            color: black
        }

        .pagination.pagination-rounded-flat .page-item {
            margin: 0 .25rem
        }

        .pagination-success .page-item.active .page-link {
            background: #e97f17;
            border-color: #e97f17
        }

        .pagination.pagination-rounded-flat .page-item .page-link {
            border: none;
            border-radius: 50px;
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
                                    <a href="javascript:void(0);"
                                        class="nav-link {{ $hasSubcat !== '' ? $hasSubcat : 'resource_category' }} {{ Request('category') == $category->category_slug ? 'active' : '' }}"
                                        id="v-pills-{{ $category->category_slug }}-tab"
                                        @if ($hasSubcat == '') data-bs-toggle="pill"
                                            data-bs-target="#v-pills-{{ $category->category_slug }}"
                                            aria-controls="v-pills-{{ $category->category_slug }}"
                                        type="button"  role="tab" @endif
                                        data-slug="{{ $category->category_slug }}">
                                        <div class="d-flex align-items-center justify-content-center me-3">
                                            <img src="{{ asset('storage/' . $category->category_image) }}">
                                        </div>
                                        {{ $category->category_name }}
                                        @if ($hasSubcat !== '')
                                            <i class="fa fa-angle-down res-news-drop" aria-hidden="true"></i>
                                        @endif
                                    </a>
                                    @if ($subcategories->isNotEmpty())
                                        <div class="newsletter-sub" style="display: none;">
                                            @foreach ($subcategories as $key => $subcategory)
                                                <a href="javascript:void(0);"
                                                    class="nav-link br-btm-n br-tp-n resource_category
                                                    {{ Request('category') == $subcategory->category_slug ? 'active' : '' }}"
                                                    id="v-pills-{{ $subcategory->category_slug }}-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#v-pills-{{ $subcategory->category_slug }}"
                                                    aria-controls="v-pills-{{ $subcategory->category_slug }}"
                                                    type="button" data-slug="{{ $subcategory->category_slug }}"
                                                    role="tab">
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
                                @foreach (\App\Models\Category::all() as $category)
                                    <div class="tab-pane fade resource_tab {{ Request('category') == $category->category_slug ? 'show active' : '' }}"
                                        id="v-pills-{{ $category->category_slug }}" role="tabpanel"
                                        aria-labelledby="v-pills-{{ $category->category_slug }}-tab">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-4">
                                                <div class="d-flex">
                                                    <div class="year-selection">
                                                        <p>Year:</p>
                                                        <select class="year_filter" id="year_{{ $category->id }}"
                                                            onchange="return get_resources('{{ $category->category_slug }}',this.value,'')">
                                                            <option value="">Select Year</option>
                                                            @foreach ($years as $key => $year)
                                                                <option
                                                                    value="{{ $year->resource_year }}">
                                                                    {{ $year->resource_year }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="year-selection month-selection">
                                                        <p>Month:</p>
                                                        <select class="month_filter" id="month_{{ $category->id }}"
                                                            onchange="return get_resources('{{ $category->category_slug }}',$('#year_{{ $category->id }}').val(),this.value)">
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-8">
                                                <div class="search">
                                                    <input type="text" id="search_{{ $category->id }}" name="search"
                                                        class="searchTerm" placeholder="Search">
                                                    <button type="button" class="searchButton"
                                                        onclick="return get_resources('{{ $category->category_slug }}',$('#year_{{ $category->id }}').val(),$('#month_{{ $category->id }}').val(),$('#search_{{ $category->id }}').val())">
                                                        <img src="{{ asset('assets/img/resources/search_black.png') }}"
                                                            class="img-fluid">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="resource_list"></div>
                                        <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                                            <nav class="mt-3">
                                                <ul class="pagination d-flex justify-content-center flex-wrap pagination-rounded-flat pagination-success"
                                                    id="paginationControls_{{ $category->category_slug }}">
                                                </ul>
                                            </nav>
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
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var category_slug = "";

        if ($(".resource_category").hasClass('active') || $(".newsletter-main").hasClass('active')) {
            category_slug = $(".resource_category.active").attr('data-slug');
            if (category_slug == undefined) {
                category_slug = $(".newsletter-main.active").attr('data-slug');
            }

            var year = $("#v-pills-" + category_slug + ".active .year_filter").val();

            get_resources(category_slug, year, "", "", 1);
        }

        $(".resource_category").on('click', function() {
            var category_slug = $(this).attr('data-slug');
            var year = $("#v-pills-" + category_slug + ".active .year_filter").val();
            get_resources(category_slug, year, "", "", 1);
        });


        $(".newsletter-main").click(function() {
            $(".newsletter-sub").slideToggle(500);
        });

        if ($(".newsletter-sub a").hasClass("active")) {
            $(".newsletter-sub").slideToggle(500);
        }

        $(".newsletter-sub a").click(function() {
            if ($(this).hasClass("active")) {
                $(this).siblings('a').toggleClass("active");
            }
        });

        $(".service-tabs a").click(function() {
            if ($(".newsletter-sub a").hasClass("active")) {
                $(".newsletter-sub a").removeClass("active");
            }
        });


        function get_resources(category_slug, year = "", month = "", search = "", page = 1) {
            var formdata = new FormData();
            formdata.append('category_slug', category_slug);
            formdata.append('year', year);
            formdata.append('month', month);
            formdata.append('search', search);
            formdata.append('page', page);
            formdata.append('limit', 4);
            $.ajax({
                url: "{{ route('resources.get_resources') }}",
                method: 'POST',
                data: formdata,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {},
                success: function(response) {
                    //console.log(response.total_pages);
                    var html = '';
                    response.resources.forEach(element => {
                        html +=
                            '<div class="resou-content br-btm"><p class="desc-line1"><i class="fa fa-calendar"></i>' +
                            element.created_date;

                        if (element.resource_file) {
                            html += '&nbsp;&nbsp;<a href="' + element.resource_file +
                                '"><i class="fa fa-file"></i> PDF</a>';
                        }

                        html += '</p><a href="' + element.resource_url +
                            '" target="_blank"><h4 class="resou-head">' + element
                            .resource_title + '</h4><p class="resour-para">' + element
                            .resource_short_desc + '</p></a><a href="' + element.resource_url +
                            '" target="_blank" class="icon-read-more">Read More <img src="{{ asset('assets/img/arrow-right.svg') }}" class="img-fluid btn-arrow"></a> </div>';
                    });
                    $(".resource_tab .resource_list").html("");
                    $(".resource_tab .resource_list").html(html);

                    if (response.months) {
                        var months_option = '<option value="">Select</option>';
                        response.months.forEach(element => {
                            months_option += '<option value="' + element.month_number + '">' + element
                                .resource_month + '</option>';
                        });

                        $(".resource_tab.active .month_filter").html("");
                        $(".resource_tab.active .month_filter").html(months_option);
                    }

                    let paginationControls = generatePaginationControls(response.total_pages, page);
                    $("#paginationControls_" + category_slug).html(paginationControls);

                    $(".pagination-link").on("click", function(e) {
                        e.preventDefault();
                        let selectedPage = $(this).data("page");

                        let selectedYear = $("#v-pills-" + category_slug + ".active.show .year_filter")
                            .find(":selected").val();
                        console.log(selectedYear);

                        let selectedMonth = $("#v-pills-" + category_slug +
                            ".active .month_filter").find(":selected").val();
                        console.log(selectedMonth);

                        let selectedSearch = $("#v-pills-" + category_slug +
                            ".active .searchTerm").val();
                        console.log(selectedSearch);

                        get_resources(category_slug, selectedYear, selectedMonth, selectedSearch,
                            selectedPage);
                    });
                }
            });
        }

        function generatePaginationControls(totalPages, currentPage) {
            let paginationControls = '';

            if (totalPages > 1) {
                // Previous button
                paginationControls += `<li class="page-item ${(currentPage === 1) ? 'disabled' : ''}">
                                    <a class="page-link pagination-link" href="javascript:void(0);" data-page="${currentPage - 1}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>`;

                // First page
                paginationControls += `<li class="page-item ${(currentPage === 1) ? 'active' : ''}">
                                    <a class="page-link pagination-link" href="javascript:void(0);" data-page="1">1</a>
                               </li>`;

                // Ellipsis after first page
                if (currentPage > 4) {
                    paginationControls += `<li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0);">...</a>
                                   </li>`;
                }

                // Page numbers around the current page
                let startPage = Math.max(2, currentPage - 1);
                let endPage = Math.min(totalPages - 1, currentPage + 1);

                for (let i = startPage; i <= endPage; i++) {
                    paginationControls += `<li class="page-item ${(i === currentPage) ? 'active' : ''}">
                                        <a class="page-link pagination-link" href="javascript:void(0);" data-page="${i}">${i}</a>
                                   </li>`;
                }

                // Ellipsis before last page
                if (currentPage < totalPages - 3) {
                    paginationControls += `<li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0);">...</a>
                                   </li>`;
                }

                // Last page
                paginationControls += `<li class="page-item ${(currentPage === totalPages) ? 'active' : ''}">
                                    <a class="page-link pagination-link" href="javascript:void(0);" data-page="${totalPages}">${totalPages}</a>
                               </li>`;

                // Next button
                paginationControls += `<li class="page-item ${(currentPage === totalPages) ? 'disabled' : ''}">
                                    <a class="page-link pagination-link" href="javascript:void(0);" data-page="${currentPage + 1}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>`;
            }

            return paginationControls;
        }
    </script>
@endpush
