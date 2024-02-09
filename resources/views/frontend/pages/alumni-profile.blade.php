@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <style type="text/css">
        footer {
            margin-top: 0;
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
                            <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                        </ol>
                        <h2 class="page-title">View Profile</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="personal-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="avatar-upload">
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url('{{ !empty($alumni->profile_image) ? $alumni->profile_image : asset('storage/default-img.png') }}');">
                            </div>
                        </div>
                    </div>
                    <div class="static-profile-details">
                        <h4 class="name"><i class="fa fa-user" aria-hidden="true"></i> {{ $alumni->name }}</h4>
                        <h4><i class="fa fa-phone" aria-hidden="true"></i> Concat: {{ $alumni->phone }}</h4>
                        <h4><i class="fa fa-envelope" aria-hidden="true"></i> Email: {{ $alumni->email }}</h4>

                        @if ($alumni->shared_status == 1)
                            <h4 class="last-info"><i class="fa fa-tint" aria-hidden="true"></i> Blood Group:
                                {{ $alumni->blood_group }}</h4>
                        @endif


                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="form-white-box">
                        @if ($alumni->shared_status == 1)
                            <h2 class="section-heading">Personal Details</h2>
                            <div class="row sep-br">
                                <div class="col-lg-5 col-md-5">
                                    <div class="view-profile-info">
                                        <h5>CA No. : {{ $alumni->ca_no }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="view-profile-info">
                                        <h5>
                                            Gender : {{ $alumni->gender }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="view-profile-info">
                                        <h5>Date of Birth : {{ date('d-M-Y', strtotime($alumni->dob)) }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="view-profile-info">
                                        <h5>Martial Status : {{ $alumni->marital_status }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5">
                                    <div class="view-profile-info">
                                        <h5>Marriage Anniversary : {{ $alumni->marriage_ann }}</h5>
                                    </div>
                                </div>
                            </div>
                            <h2 class="section-heading">Contact Details</h2>
                            <div class="row sep-br">
                                <div class="col-lg-12 col-md-12">
                                    <div class="view-profile-info">
                                        <h5>{{ $alumni->address }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <h2 class="section-heading">Job Description</h2>
                        <div class="row sep-br">
                            <div class="col-lg-12 col-md-12">
                                <div class="view-profile-info">
                                    <h5>Name of the Organisation :</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="view-profile-info">
                                    <h5>Designation :</h5>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="view-profile-info">
                                    <h5>Work Area :</h5>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="view-profile-info">
                                    <h5>Year Of Joining : {{ $alumni->year_of_joining }}</h5>
                                </div>
                            </div>
                        </div>
                        @if ($alumni->shared_status == 1)
                            <h2 class="section-heading">Other Details</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="view-profile-info">
                                        <h5>Association / Affiliation with Social Organisations, if any :</h5>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="view-profile-info">
                                        <h5>Degrees, Other than CA, if any :</h5>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="view-profile-info">
                                        <h5>Memory associated with GB that you cherish the most :</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
@endpush
