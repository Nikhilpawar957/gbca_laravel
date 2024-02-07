@extends('frontend.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA & Associates LLP Chartered Accountants')
@push('stylesheets')
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
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type="file" class="btn-file" id="profile_image" name="profile_image[]"
                                accept=".png, .jpg, .jpeg">
                            <label for="imageUpload" id="one_file">
                            </label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url('{{ asset('storage/' . $alumni->profile_image) }}');">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" id="user_id" value="451">
                <div class="col-lg-9 col-md-9">
                    <div class="form-white-box">
                        <h4 class="profile-form-head">Personal Details</h4>
                        <form id="contact" class="contact-form1" action="" method="post">
                            <div class="contact-form__two">
                                <div class="row fields-bs">
                                    <div class="field contact-inner text-left col-lg-12 mb-0">
                                        <input type="email" name="full_name" id="full_name" placeholder="Enter Full Name"
                                            value="Nikhil Pawar">
                                        <label for="email20">Full Name</label>
                                        <span class="span_err" id="full_name_err"></span>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                        <input type="text" name="ca_no" id="ca_no"
                                            placeholder="Enter CA Membership No." value="">
                                        <label for="fullname20">CA Membership No.</label>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4 mb-0">
                                        <label for="" class="sticky-label">Blood Group</label>
                                        <select class="form-select" id="bld_grp" aria-label="Default select example">
                                            <option selected="">Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+" selected="">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4 radio-btn-st">
                                        <label for="" class="sticky-label">Gender<span
                                                class="red">*</span></label>
                                        <div class="radio-btns">
                                            <input type="radio" name="gender" id="gender_male" value="1"
                                                checked="">
                                            <label for="gender_male">Male</label>
                                            <input type="radio" name="gender" id="gender_female" value="0">
                                            <label for="gender_female">Female</label>
                                            <br>
                                            <span class="span_err" id="gender_err"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="datepicker" class="sticky-label">Date of Birth <span
                                                class="red">*</span></label>
                                        <input type="text" id="datepicker" autocomplete="off"
                                            class="date-input hasDatepicker" value="1996-04-11">
                                        <span class="span_err" id="d_o_b_err"></span>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="marriage_ann" class="sticky-label">Marriage Anniversary</label>
                                        <input type="text" autocomplete="off" class="date-input hasDatepicker"
                                            name="marriage_ann" id="marriage_ann"
                                            onkeypress="return date_validate(event);" value="" maxlength="10">
                                        <span class="span_err" id="marriage_ann_err"></span>
                                    </div>
                                    <div class="form-group text-left col-lg-4 col-md-4">
                                        <label for="" class="sticky-label">Martial Status</label>
                                        <select id="mrt_status" class="form-select" aria-label="Default select example">
                                            <option value="0" selected="">Martial Status</option>
                                            <option value="Married">Married</option>
                                            <option value="Unmarried" selected="">Unmarried</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row fields-bs">
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                        <input type="text" name="linkedin_url" id="linkedin_url"
                                            placeholder="Enter LinkedIn Url" value="">
                                        <label for="linkedin_url">LinkedIn Url </label>
                                    </div>
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                        <input type="text" name="facebook_url" id="facebook_url"
                                            placeholder="Enter Facebook Url" value="">
                                        <label for="facebook_url">Facebook Url</label>
                                    </div>
                                    <div class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                        <input type="text" name="twitter_url" id="twitter_url"
                                            placeholder="Enter Twitter Url" value="">
                                        <label for="twitter_url">Twitter Url</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group radio-btns bottom">
                                        <input type="radio" name="shared_status" id="full_shared" value="1">
                                        <label for="full_shared" class="color-black"><b>Share Full Detail</b> </label>
                                        <input type="radio" name="shared_status" id="limited_shared" value="0"
                                            checked="">
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
                        </form>
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
                                    <img src="assets/img/alumni/contact-details.png" class="prof-icon">
                                </div>
                                Contact Details
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">
                                <div class="d-flex align-items-center justify-content-center me-3">
                                    <img src="assets/img/alumni/job-description.png" class="prof-icon">
                                </div>
                                Job Description
                            </button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <div class="d-flex align-items-center justify-content-center me-3">
                                    <img src="assets/img/alumni/other-details.png" class="prof-icon">
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
                                    <form id="contact" class="contact-form1" action="" method="post">
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                                    <input type="email" name="email_id" id="email_id"
                                                        placeholder="Enter E-mail " value="nikhil.pawar@onerooftech.com">
                                                    <label for="email_id">E-mail</label>
                                                    <span class="span_err" id="email_id_err"></span>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-3 col-md-3 mb-0">
                                                    <input type="text" name="mob_num" id="mob_num"
                                                        placeholder="Enter Contact Number" value="08108177139">
                                                    <label for="mob_num">Contact Number</label>
                                                    <span class="span_err" id="mob_num_err"></span>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <div class="row align-items-center">
                                                        <div
                                                            class="form-group field contact-inner text-left col-lg-5 col-4 col-md-4 mb-0 tab-plr0">
                                                            <input type="text" name="std_num" id="std_num"
                                                                placeholder="Enter STD Code" value=""
                                                                onkeypress="return date_validate(event);">
                                                            <label for="std_num">STD Code</label>
                                                            <span class="span_err" id="std_num_err"></span>
                                                        </div>
                                                        <div class="col-lg-1 col-1 col-md-1 pl0">
                                                            <span class="sep-line">_</span>
                                                        </div>
                                                        <div
                                                            class="form-group field contact-inner text-left col-lg-6 col-7 col-md-7 mb-0 pl0">
                                                            <input type="text" name="landline_num" id="landline_num"
                                                                placeholder="Enter Landline No." value="">
                                                            <label for="landline_num">Landline No.</label>
                                                            <span class="span_err" id="landline_num_err"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="field contact-inner text-left col-lg-12 col-md-12 mb-0">
                                                    <input type="text" name="address" id="address"
                                                        placeholder="Enter Address"
                                                        value="817 Business Ecstacy Mulund West">
                                                    <label for="address">Address</label>
                                                    <span class="span_err" id="pin_code_err"></span>
                                                </div>
                                            </div>
                                            <div class="row fields-bs">
                                                <div class="form-group field contact-inner text-left col-lg-4 col-md-4">
                                                    <input type="text" name="pin_code" id="pin_code" maxlength="6"
                                                        placeholder="Enter Pincode" value="400080">
                                                    <label for="pin_code">Pincode</label>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-4 col-md-4 mb-0">
                                                    <input type="text" name="city" id="city"
                                                        placeholder="Enter City" value="Mumbai">
                                                    <label for="city">City</label>
                                                </div>
                                                <div class="form-group text-left col-lg-4 col-md-4 mb-0">
                                                    <label for="state" class="sticky-label">State</label>
                                                    <select name="state" id="state" class="form-select">
                                                        @foreach (DB::table('states')->orderBy('state_name')->get() as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="form-white-box">
                                    <h4 class="profile-form-head">Job Description</h4>
                                    <form id="contact" class="contact-form1" action="" method="post">
                                        <div class="contact-form__two">
                                            <div class="row">
                                                <div class="form-group field contact-inner text-left col-lg-12 col-md-12">
                                                    <input type="email" name="name_org" id="name_org"
                                                        placeholder="Enter Name of the Organisation " value="">
                                                    <label for="name_org">Name of the Organisation <span
                                                            class="red">*</span></label>
                                                    <span class="span_err" id="name_org_err"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-6 col-md-6 mb-0">
                                                    <input type="text" name="designation" id="designation"
                                                        placeholder="Enter designation" value="">
                                                    <label for="designation">Designation <span
                                                            class="red">*</span></label>
                                                    <span class="span_err" id="designation_err"></span>
                                                </div>
                                                <div
                                                    class="form-group field contact-inner text-left col-lg-6 col-md-6 mb-0">
                                                    <input type="text" name="year_of_joining" id="year_of_joining"
                                                        placeholder="Enter Year Of Joining" value="2023"
                                                        keypress="return date_validate(event);">
                                                    <label for="year_of_joining">Year Of Joining </label>
                                                    <span class="span_err" id="year_of_joining_err"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-6 tags-mt">
                                                    <label for="wrk_area" class="sticky-label">Work Area</label>
                                                    <div class="bs-example">
                                                        <div class="bootstrap-tagsinput"><input type="text"
                                                                placeholder=""></div><input type="text" id="wrk_area"
                                                            name="wrk_area" value="" data-role="tagsinput"
                                                            class="bs-tags" style="display: none;">
                                                        <span class="span_err" id="wrk_area1_err"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group field contact-inner col-lg-6 col-md-6 text-left">
                                                    <textarea id="subject" name="subject" placeholder="Enter Note" class="profile-note"></textarea>
                                                    <label for="subject">Add Note</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <div class="form-white-box">
                                    <h4 class="profile-form-head">Other Details</h4>
                                    <form id="contact" class="contact-form1" action="" method="post">
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
                                                        class="profile-note" value=""></textarea>
                                                    <label for="memory_gbc">Memory associated with GB that you cherish the
                                                        most</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-btns">
                <a href="#" onclick="return submit_data()" id="submit_user" class="orange-btn">Save <img
                        src="assets/img/arrow-right-white.svg" class="img-fluid btn-arrow"></a>
                <a href="{{ route('view-profile') }}" class="orange-btn blue-b">Cancel<img
                        src="assets/img/arrow-right-white.svg" class="img-fluid btn-arrow"></a>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    <script type="text/javascript">
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
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
            });
            $("#marriage_ann").datepicker({
                dateFormat: "dd-mm-yy",
                duration: "fast"
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
@endpush
