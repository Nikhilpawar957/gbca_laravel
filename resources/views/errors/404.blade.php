@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : '404 Page Not Found | GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style>
        footer {
            margin-top: 0;
        }
    </style>
@endpush
@section('content')

<section class="heading-page header-text about-banner" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="page-content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:history.back();">Go Back</a></li>
                        <li class="breadcrumb-item active" aria-current="page">404</li>
                    </ol>
                    <h2 class="page-title">404 Page Not Found</h2>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
@endpush
