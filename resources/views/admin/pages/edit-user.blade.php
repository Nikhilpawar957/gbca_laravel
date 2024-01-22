@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit User | ' . env('APP_NAME'))
@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Edit User
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <form id="userForm" action="{{ route('author.save-user') }}" method="POST" class="card"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Request('user_id') }}">
                <div class="card-body border-bottom py-3">
                    <div class="row row-cards">

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('author.users') }}" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
