@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style>
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-width: 1px;
            padding: 2px 4px;
        }

        table {
            border-width: 1px;
        }

        footer {
            margin-top: 0;
        }

        .resource-details ul li {
            list-style: disc;
        }

        .resource-details ol li {
            list-style: inherit;
        }

        .resource-details ul,
        ol {
            padding-left: 20px;
        }

        .resource-details img {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
            width: auto;
        }

        body {
            color: #2a2a2a;
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
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $resource->category_name }}</li>
                        </ol>
                        <h2 class="page-title">{{ $resource->category_name }}</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="resource-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="res-date">
                        {{ date('M Y', strtotime($resource->created_at)) }}
                    </p>
                    <h2 class="section-heading center">
                        {{ $resource->resource_title }}
                    </h2>
                    <div>
                        {!! $resource->resource_desc !!}
                    </div>
                    @if ($resource->resource_file != '' && file_exists('storage/' . $resource->resource_file))
                        <div class="bottom-pdf-btn">
                            <a class="viewer-pdf" href="{{ asset('storage/' . $resource->resource_file) }}"
                                target="_blank">PDF View</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
@endpush
