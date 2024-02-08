@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
    <link rel="stylesheet" defer
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">GBCA</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                        <h2 class="page-title">Edit Profile</h2>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="personal-details">
        <div class="container">
            <form id="alumniForm" action="{{ route('save-alumni') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" class="btn-file" id="profile_image" name="profile_image"
                                    accept=".png, .jpg, .jpeg">
                                <label for="imageUpload" id="one_file">
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('{{ $alumni->profile_image }}');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="form-white-box">
                            <h4 class="profile-form-head">Personal Details</h4>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $alumni->id }}">
                            <div class="contact-form__two">
                                <div class="row fields-bs">
                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <span class="text-danger error-text name_error"></span>
                                        <input type="text" name="name" id="name" placeholder="Enter Full Name"
                                            value="{{ $alumni->name }}">
                                        <label for="name">Full Name <span class="red">*</span></label>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                        <span class="text-danger error-text ca_no_error"></span>
                                        <input type="text" name="ca_no" id="ca_no"
                                            placeholder="Enter CA Membership No." value="{{ $alumni->ca_no }}">
                                        <label for="ca_no">CA Membership No.</label>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4 mb-0">
                                        <label for="" class="sticky-label">Blood Group</label>
                                        <select class="form-select" id="blood_group" name="blood_group">
                                            <option value="">Select Blood Group</option>
                                            @php
                                                $blood_groups = ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'];
                                            @endphp
                                            @foreach ($blood_groups as $bg)
                                                <option value="{{ $bg }}"
                                                    {{ $alumni->blood_group == $bg ? 'selected' : '' }}>
                                                    {{ $bg }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text blood_group_error"></span>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4 radio-btn-st">
                                        <label for="" class="sticky-label">Gender <span
                                                class="red">*</span></label>
                                        <div class="radio-btns">
                                            <input type="radio" name="gender" id="gender_male" value="1"
                                                {{ $alumni->gender == 1 ? 'checked' : '' }}>
                                            <label for="gender_male">Male</label>
                                            <input type="radio" name="gender" id="gender_female" value="0"
                                                {{ $alumni->gender == 2 ? 'checked' : '' }}>
                                            <label for="gender_female">Female</label>
                                            <br />
                                            <span class="text-danger error-text gender_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="dob" class="sticky-label">Date of Birth <span
                                                class="red">*</span></label>
                                        <input type="text" id="dob" name="dob" autocomplete="off"
                                            class="date-input"
                                            value="{{ !empty($alumni->dob) ? date('Y-m-d', strtotime($alumni->dob)) : '' }}">
                                        <span class="text-danger error-text dob_error"></span>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="marital_status" class="sticky-label">Martial Status</label>
                                        <select id="marital_status" name="marital_status" class="form-select">
                                            <option value="">Select Martial Status</option>
                                            <option value="married"
                                                {{ !empty($alumni->marital_status == 'married') ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="unmarried"
                                                {{ !empty($alumni->marital_status == 'unmarried') ? 'selected' : '' }}>
                                                Unmarried</option>
                                        </select>
                                        <span class="text-danger error-text marital_status_error"></span>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="marriage_ann" class="sticky-label">Marriage Anniversary</label>
                                        <input type="text" autocomplete="off" class="date-input" name="marriage_ann"
                                            id="marriage_ann"
                                            value="{{ !empty($alumni->marriage_ann) ? date('Y-m-d', strtotime($alumni->marriage_ann)) : '' }}">
                                        <span class="text-danger error-text marriage_ann_error"></span>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                        <span class="text-danger error-text linkedin_url_error"></span>
                                        <input type="text" name="linkedin_url" id="linkedin_url"
                                            placeholder="Enter LinkedIn Url" value="{{ $alumni->linkedin_url }}">
                                        <label for="linkedin_url">LinkedIn Url</label>
                                    </div>
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                        <span class="text-danger error-text facebook_url_error"></span>
                                        <input type="text" name="facebook_url" id="facebook_url"
                                            placeholder="Enter Facebook Url" value="{{ $alumni->facebook_url }}">
                                        <label for="facebook_url">Facebook Url</label>
                                    </div>
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                        <span class="text-danger error-text twitter_url_error"></span>
                                        <input type="text" name="twitter_url" id="twitter_url"
                                            placeholder="Enter Twitter Url" value="{{ $alumni->twitter_url }}">
                                        <label for="twitter_url">Twitter Url</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group radio-btns bottom">
                                        <input type="radio" name="shared_status" id="full_shared" value="1"
                                            checked>
                                        <label for="full_shared" class="color-black"><b>Share Full Detail</b></label>
                                        <input type="radio" name="shared_status" id="limited_shared" value="0">
                                        <label for="limited_shared" class="color-black"><b>Share Limited
                                                Detail</b></label>
                                        <div class="info-icon">
                                            <a href="javascript:void();" data-bs-toggle="popover"
                                                data-bs-trigger="hover focus" title=""
                                                data-bs-content="Shared Limited Details will show the following fields: Full Name, Email ID, Job Description and LinkedIn Url"
                                                data-bs-original-title="Note" aria-label="Note"><i
                                                    class="fa fa-info-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-details">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="nav flex-column nav-pills  nav-shadow pb-5 profile-tab" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">
                                    <div class="d-flex align-items-center justify-content-center me-3">
                                        <img src="{{ asset('assets/img/alumni/contact-details.png') }}"
                                            class="prof-icon">
                                    </div>
                                    Contact Details
                                </button>
                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-center me-3">
                                        <img src="{{ asset('assets/img/alumni/job-description.png') }}"
                                            class="prof-icon">
                                    </div>
                                    Job Description
                                </button>
                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-center me-3">
                                        <img src="{{ asset('assets/img/alumni/other-details.png') }}" class="prof-icon">
                                    </div>
                                    Other Details
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="form-white-box">
                                        <h4 class="profile-form-head">Contact Details</h4>
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                                    <span class="text-danger error-text email_error"></span>
                                                    <input type="email" name="email" id="email"
                                                        placeholder="Enter E-mail" value="{{ $alumni->email }}">
                                                    <label for="email">E-mail <span class="red">*</span></label>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-3 col-md-3 mb-0">
                                                    <span class="text-danger error-text phone_error"></span>
                                                    <input type="text" name="phone" id="phone"
                                                        placeholder="Enter Contact Number" value="{{ $alumni->phone }}">
                                                    <label for="phone">Contact Number <span
                                                            class="red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12 col-md-12 mb-0">
                                                    <span class="text-danger error-text address_error"></span>
                                                    <textarea name="address" id="address" placeholder="Enter Address">{{ $alumni->address }}</textarea>
                                                    <label for="address">Address</label>
                                                </div>
                                            </div>
                                            <div class="row fields-bs">
                                                <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                                    <span class="text-danger error-text pincode_error"></span>
                                                    <input type="text" name="pincode" id="pincode" maxlength="6"
                                                        placeholder="Enter Pincode"
                                                        onkeypress="return validate_key(event)"
                                                        value="{{ $alumni->pincode }}">
                                                    <label for="pincode">Pincode</label>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                                    <span class="text-danger error-text city_error"></span>
                                                    <input type="text" name="city" id="city"
                                                        placeholder="Enter City" value="{{ $alumni->city }}">
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="form-group text-left col-lg-4 col-md-4 mb-0">
                                                    <label for="state" class="sticky-label">State</label>
                                                    <select name="state" id="state" class="form-select">
                                                        <option value="">Select State</option>
                                                        @foreach (DB::table('states')->orderBy('state_name')->get() as $state)
                                                            <option value="{{ $state->id }}"
                                                                {{ $alumni->state == $state->id ? 'selected' : '' }}>
                                                                {{ $state->state_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text state_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="form-white-box">
                                        <h4 class="profile-form-head">Job Description</h4>
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="form-group field contact-inner text-left col-lg-12 col-md-12">
                                                    <span class="text-danger error-text name_org_error"></span>
                                                    <input type="text" name="name_org" id="name_org"
                                                        placeholder="Enter Name of the Organisation" value="">
                                                    <label for="name_org">Name of the Organisation <span
                                                            class="red">*</span></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-6 col-md-6 mb-0">
                                                    <span class="text-danger error-text designation_error"></span>
                                                    <input type="text" name="designation" id="designation"
                                                        placeholder="Enter designation"
                                                        value="{{ $alumni->designation }}">
                                                    <label for="designation">Designation <span
                                                            class="red">*</span></label>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-6 col-md-6 mb-0">
                                                    <span class="text-danger error-text year_of_joining_error"></span>
                                                    <input type="text" name="year_of_joining" id="year_of_joining"
                                                        placeholder="Enter Year Of Joining"
                                                        value="{{ $alumni->year_of_joining }}"
                                                        onkeypress="return validate_key(event)" maxlength="4">
                                                    <label for="year_of_joining">Year Of Joining </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 tags-mt">
                                                    <label for="wrk_area" class="sticky-label">Work Area</label>
                                                    <div class="bs-example">
                                                        <input type="text" id="wrk_area" name="wrk_area"
                                                            value="" data-role="tagsinput" class="bs-tags">
                                                    </div>
                                                    <span class="text-danger error-text wrk_area_error"></span>
                                                </div>
                                                <div class="form-group field contact-inner col-lg-6 col-md-6 text-left">
                                                    <textarea id="subject" name="subject" placeholder="Enter Note" class="profile-note"></textarea>
                                                    <label for="subject">Add Note</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="form-white-box">
                                        <h4 class="profile-form-head">Other Details</h4>
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="form-group field contact-inner text-left col-lg-12 col-md-12">
                                                    <input type="text" name="name_ngo" id="name_ngo"
                                                        placeholder="Enter Association / Affiliation with Social Organisations, if any "
                                                        value="">
                                                    <label for="name_ngo">Association / Affiliation with Social
                                                        Organisations, if any</label>
                                                </div>
                                                <div class="form-group field contact-inner text-left col-lg-12 col-md-12">
                                                    <input type="text" name="degree" id="degree"
                                                        placeholder="Enter Degrees, Other than CA, if any "
                                                        value="">
                                                    <label for="degree">Degrees, Other than CA, if any </label>
                                                </div>
                                                <div class="form-group field contact-inner col-lg-12 col-md-12 text-left">
                                                    <textarea id="memory_gbc" name="memory_gbc" placeholder="Enter Memory associated with GB that you cherish the most"
                                                        class="profile-note"></textarea>
                                                    <label for="memory_gbc">Memory associated with GB that you cherish the
                                                        most</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-btns">
                    <a href="javascript:void(0)" id="submit_user" onclick="return submit_data()" class="orange-btn">Save
                        <img src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
                    <a href="{{ route('view-profile') }}" class="orange-btn blue-b">Cancel<img
                            src="{{ asset('assets/img/arrow-right-white.svg') }}" class="img-fluid btn-arrow"></a>
                </div>
            </form>
        </div>
    </section>

@endsection
@push('scripts')
    <script defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $("#one_file").click(function() {
            $(".btn-file").click();
        });

        $('#profile_image').bind('change', function() {
            var ext = $(this).val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['jpg', 'png', 'jpeg']) == -1) {
                valid('profile_image', "Please Upload Proper Image File (jpg, jpeg, png)");
                $(this).val("");
            } else {
                validate_clear();
                var _URL = window.URL || window.webkitURL;
                var file, img;
                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function() {

                    };
                    img.src = _URL.createObjectURL(file);
                    $("#imagePreview").css("background-image", "url('" + img.src + "')");
                }
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#dob").datepicker({
                dateFormat: "yy-mm-dd",
                duration: "fast",
                changeMonth: true,
                changeYear: true,
                maxDate: new Date()
            });
            $("#marriage_ann").datepicker({
                dateFormat: "yy-mm-dd",
                duration: "fast",
                changeMonth: true,
                changeYear: true,
                maxDate: new Date()
            });
        });
    </script>
    <script type="text/javascript">
        $("#inputTag").tagsinput('items');
    </script>
    <script type="text/javascript">
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script>
        function submit_data() {
            var form = document.querySelector('#alumniForm');
            var formdata = new FormData(form);

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                    $(form).find('#submit_user').prop('disabled', true);
                },
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $(form)[0].reset();
                        $("#success_register").text(response.msg);
                        $("#success_register").slideDown("slow").delay(5000).slideUp();
                    } else {
                        $("#danger_register").text(response.msg);
                        $("#danger_register").slideDown("slow").delay(5000).slideUp();
                    }
                    $(form).find('#submit_user').prop('disabled', false);
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                    $(form).find('#submit_user').prop('disabled', false);
                }
            });

        }
    </script>
@endpush
