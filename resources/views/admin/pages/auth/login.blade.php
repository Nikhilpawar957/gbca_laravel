@extends('admin.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA India | Admin Login')
@section('content')

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ route('author.login') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ \App\Models\Setting::find(1)->logo }}" height="36" alt="" />
                </a>
            </div>
            <div class="alert alert-success d-none"></div>
            <div class="alert alert-danger d-none"></div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4 text-uppercase">Admin Login</h2>
                    <form action="{{ url('api/login') }}" method="post" id="loginForm" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label required">Username or Email</label>
                            <input type="text" id="login_id" name="login_id" class="form-control"
                                placeholder="Enter Username or Email" autocomplete="off">
                            <span class="text-danger error-text login_id_error"></span>
                        </div>
                        <div class="mb-2">
                            <label class="form-label required">
                                Password
                                <span class="form-label-description">
                                    <a href="{{ route('author.forgot-password') }}" class="text-decoration-none">forgot
                                        password</a>
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter Password" autocomplete="off">
                                <span class="input-group-text">
                                    <a href="javascript:void(0)" class="link-secondary" data-bs-toggle="tooltip"
                                        onclick="show_password()" aria-label="Show password"
                                        data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path
                                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                            </path>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                            <span class="text-danger error-text password_error"></span>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function show_password() {
            var password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        $(document).ready(function() {
            $('form#loginForm').submit(function(e) {
                e.preventDefault();
                toastr.remove();
                var form = this;
                var formdata = new FormData(form);
                @if (isset($_GET['returnUrl']) && !empty($_GET['returnUrl']))
                    formdata.append('returnUrl', "{{ $_GET['returnUrl'] }}");
                @endif
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                        $('div.alert').addClass('d-none');
                        $('div.alert').text('');
                    },
                    success: function(response) {
                        // console.log(response);
                        // return false;
                        if (response.code == 1) {
                            $(form)[0].reset();
                            location.href = "{{ route('author.home') }}";
                        } else {
                            $('div.alert-danger').removeClass('d-none').text(response.msg)
                                .slideDown(1000).slideUp(
                                    1500);
                        }
                    },
                    error: function(response) {
                        $.each(response.responseJSON.errors, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                });
            });
        });
    </script>
@endpush
