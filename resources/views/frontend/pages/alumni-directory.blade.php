@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style type="text/css">
        footer {
            margin-top: 0;
        }

        .row-cols-lg-5 {
            margin: 0;
        }
    </style>
@endpush
@section('content')

    <section class="heading-page header-text alumni-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="page-content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni Directory</li>
                        </ol>
                        <h2 class="page-title">Alumni Directory</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="alumni-section">
        <div class="container">
            <div class="row alumni-topmenu">
                <div class="col-lg-5 col-md-8 col-7">
                    <div class="search">
                        <input type="text" class="searchTerm" name="search" id="search" onkeypress="handle(event)"
                            placeholder="Search by Name or Work Area">
                        <button type="button" class="searchButton" onclick="return SearchData();">
                            <img src="{{ asset('assets/img/resources/search_black.png') }}" class="img-fluid">
                        </button>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-5">
                    <div class="year-selection alumni-year-s">
                        <p>Year:</p>
                        <div class="select">
                            <select id="year" name="year" class="form-select">
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->year_of_joining }}">{{ $year->year_of_joining }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5" id="alumni_content">
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

        $(document).ready(function() {
            get_alumnis();
        });

        $("[name='year']").on('change', function() {
            var year = $(this).val();
            var search = $.trim($("[name='search']").val());
            get_alumnis(year, search);
        });

        function SearchData() {
            var year = $("[name='year']").val();
            var search = $.trim($("[name='search']").val());
            get_alumnis(year, search);
        }

        function handle(e) {
            if (e.keyCode === 13) {
                e.preventDefault(); // Ensure it is only this code that runs
                var year = $("[name='year']").val();
                var search = $.trim($("[name='search']").val());
                get_alumnis(year, search);
            }
        }

        function get_alumnis(year = "", search = "") {
            var formdata = new FormData();
            formdata.append('year', year);
            formdata.append('search', search);

            $.ajax({
                url: "{{ route('get-alumnis') }}",
                method: 'POST',
                data: formdata,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#alumni_content").html('Please Wait...');
                },
                success: function(response) {
                    var html = '';
                    response.data.forEach(element => {
                        html += '<div class="col">' +
                            '<div class="item team-images alumni-images">' +
                            '<a target="_blank" href="' + element.profile_url + '">' +
                            '<img src="' + element.profile_image + '" alt="' + element.name + '">' +
                            '</a>' +
                            '<div class="team-overlay">' +
                            '<div class="team-desc">' +
                            '<h5>' + element.name + '</h5>' +
                            '<p class="desg">' + element.designation + '</p>' +
                            '<div class="alumni-socials">';
                        if (element.linkedin_url != null) {
                            html += '<a target="_blank" href="' + element.linkedin_url +
                                '"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
                        }
                        if (element.facebook_url != null) {
                            html += '<a target="_blank" href="' + element.facebook_url +
                                '"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                        }
                        if (element.twitter_url != null) {
                            html += '<a target="_blank" href="' + element.twitter_url +
                                '"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                        }
                        html += '</div></div></div></div></div>';
                    });

                    $("#alumni_content").html('');
                    $("#alumni_content").html(html);
                }
            });
        }
    </script>
@endpush
