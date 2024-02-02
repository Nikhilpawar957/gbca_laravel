@extends('admin.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ route('author.login') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('assets/img/gbc-llp-logo.png') }}" height="36" alt="" />
                </a>
            </div>
            <div class="alert alert-danger">Alert Danger</div>
            <div class="alert alert-success">Alert Success</div>
            <form class="card card-md" method="post" autocomplete="off" novalidate>
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Reset Password</h2>
                    <div class="mb-3">
                        <label class="form-label required">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter Username or Email" autocomplete="off"
                            disabled />
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="mb-2">
                        <label class="form-label required">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" id="password" placeholder="New Password"
                                autocomplete="off" />
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
                            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password"
                                autocomplete="off" />
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
            var password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        }

        function show_confirm_password() {
            var confirm_password = document.getElementById('confirm_password');
            if (confirm_password.type === 'password') {
                confirm_password.type = 'text';
            } else {
                confirm_password.type = 'password';
            }
        }
    </script>
@endpush
