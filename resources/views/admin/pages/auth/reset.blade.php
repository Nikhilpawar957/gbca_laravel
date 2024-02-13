@extends('admin.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ route('author.login') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ \App\Models\Setting::find(1)->logo }}" height="36" alt="" />
                </a>
            </div>
            <div class="alert alert-danger d-none">Alert Danger</div>
            <div class="alert alert-success d-none">Alert Success</div>
            <form action="{{ route('author.reset-password-submit') }}" class="card card-md" id="resetForm" method="post"
                autocomplete="off" novalidate>
                @csrf
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Reset Password</h2>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="email" name="email"
                            value="{{ $email }}" />
                        <input type="hidden" class="form-control" id="token" name="token"
                            value="{{ $token }}" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label required">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                placeholder="New Password" autocomplete="off" />
                            <span class="input-group-text">
                                <a href="javascript:void(0)" class="link-secondary" title="Show password"
                                    data-bs-toggle="tooltip" onclick="show_password()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <span class="text-danger error-text password_error"></span>
                    </div>
                    <div class="mb-2">
                        <label class="form-label required">
                            Confirm Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" id="confirm_new_password"
                                name="confirm_new_password" placeholder="Confirm Password" autocomplete="off" />
                            <span class="input-group-text">
                                <a href="javascript:void(0)" class="link-secondary" title="Show password"
                                    data-bs-toggle="tooltip" onclick="show_confirm_password()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <span class="text-danger error-text confirm_password_error"></span>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center text-muted mt-3">
            <a href="{{ route('author.login') }}">Back to Login</a>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function show_password() {
            var new_password = document.getElementById('new_password');
            if (new_password.type === 'password') {
                new_password.type = 'text';
            } else {
                new_password.type = 'password';
            }
        }

        function show_confirm_password() {
            var confirm_new_password = document.getElementById('confirm_new_password');
            if (confirm_new_password.type === 'password') {
                confirm_new_password.type = 'text';
            } else {
                confirm_new_password.type = 'password';
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        $('form#resetForm').submit(function(e) {
            e.preventDefault();
            var form = this;
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
                    $('div.alert').addClass('d-none');
                    $('div.alert').text('');
                },
                success: function(response) {
                    //console.log(response);
                    if (response.code == 1) {
                        $('div.alert-success').removeClass('d-none').text(response.msg)
                            .slideDown(5000).slideUp(
                                5000);


                        setTimeout(() => {
                            location.href = "{{ route('author.login') }}"
                        }, 2000);
                    } else {
                        $('div.alert-danger').removeClass('d-none').text(response.msg)
                            .slideDown(5000).slideUp(
                                5000);
                    }
                },
                error: function(response) {
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush
