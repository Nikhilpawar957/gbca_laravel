@extends('admin.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'GBCA India | Forgot Password')
@section('content')

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ route('author.login') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('admin/static/logo.svg') }}" height="36" alt="" />
                </a>
            </div>
            <form class="card card-md" method="post" autocomplete="off" novalidate>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Forgot password</h2>
                    <p class="text-muted mb-4">
                        Enter your email address and a reset password link will be sent to your email address
                    </p>
                    <div class="mb-3">
                        <label class="form-label required">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="form-footer">
                        <button class="btn btn-primary w-100" type="submit">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                            Send me a reset password link
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                Forget it, <a href="{{ route('author.login') }}">send me back</a> to the sign in screen.
            </div>
        </div>
    </div>

@endsection
