@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Alumni Login | GBCA & Associates LLP Chartered Accountants')
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
                            <li class="breadcrumb-item active" aria-current="page">Alumni Login</li>
                        </ol>
                        <h2 class="page-title">Alumni Login</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us alumn-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="almn-login-sign">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                                    aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <div class="login-form">
                                    <form id="contact" class="contact-form1" action="" method="post">
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <input type="email" name="email20" id="email20"
                                                        placeholder="Enter Email / Mobile No.">
                                                    <label for="email20">Enter Email / Mobile No.</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <input type="tel" name="phone20" id="phone20"
                                                        placeholder="Enter OTP">
                                                    <label for="phone20">Enter OTP</label>
                                                </div>
                                            </div>
                                            <div class="comment-submit-btn tabs-btn">
                                                <button type="submit" id="form-submit" class="button orange-btn">Send OTP
                                                    <img src="assets/img/arrow-right-white.svg"
                                                        class="img-fluid btn-arrow"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="sign-up-form">
                                    <form id="contact" class="contact-form1" action="" method="post">
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12">
                                                    <input type="text" name="fullname10" id="fullname10"
                                                        placeholder="Enter Full Name">
                                                    <label for="fullname10">Full Name</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <input type="email" name="email10" id="email10"
                                                        placeholder="Enter E-mail">
                                                    <label for="email10">E-mail</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <input type="tel" name="phone10" id="phone10"
                                                        placeholder="Enter Contact Number">
                                                    <label for="phone10">Contact Number</label>
                                                </div>
                                                <div class="field contact-inner text-left col-lg-12 mb-0">
                                                    <input type="tel" name="phone10" id="phone10"
                                                        placeholder="Year of Joining">
                                                    <label for="phone10">Year of Joining</label>
                                                </div>
                                            </div>
                                            <div class="comment-submit-btn tabs-btn">
                                                <button type="submit" id="form-submit" class="button orange-btn">Sign Up
                                                    <img src="assets/img/arrow-right-white.svg"
                                                        class="img-fluid btn-arrow"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="alumni-content">
                        <h2 class="section-heading">Greetings GBite!</h2>
                        <p class="para-style">Welcome back to where it all started. We missed you.
                            Whether you moved on from GBCA years ago or more recently, you were and still are, part of our
                            community. GBCA Alumni Page helps you stay connected with the firm and your former colleagues
                            and friends who have been an integral part of your journey here.<br />
                            Login Now and become a lifelong member of GBCA to reengage, to reconnect and rekindle.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="{{ asset('assets/js/modal.js') }}"></script>
@endpush
