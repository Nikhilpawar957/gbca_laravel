@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Settings | ' . env('APP_NAME'))
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
                        Settings
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-8">
                    <h3>Set Logo</h3>
                    <div class="mb-2" style="max-width:200px;">
                        <img src="" alt="" class="img-thumbnail" id="logo-image-preview"
                            data-ijabo-default-img="{{ \App\Models\Setting::find(1)->logo }}">
                    </div>
                    <form action="{{ route('author.change-logo') }}" method="post" id="changeLogoForm">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Logo</div>
                            <input type="file" name="logo" id="logo" accept="image/*" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Change Logo</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <h3>Set Favicon</h3>
                    <div class="mb-2" style="max-width:100px;">
                        <img src="" alt="" class="img-thumbnail" id="favicon-image-preview"
                            data-ijabo-default-img="{{ \App\Models\Setting::find(1)->favicon }}">
                    </div>
                    <form action="{{ route('author.change-favicon') }}" method="post" id="changeFaviconForm">
                        @csrf
                        <div class="mb-3">
                            <div class="form-label">Favicon</div>
                            <input type="file" name="favicon" id="favicon" accept="image/*"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Change Favicon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $("input[name='logo']").ijaboViewer({
            preview: "#logo-image-preview",
            imageShape: "rectangular",
            allowedExtensions: ["jpg", "png", "jpeg", "svg"],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {},
        });

        $("form#changeLogoForm").submit(function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr("action"),
                method: $(form).attr("method"),
                data: new FormData(form),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {},
                success: function(data) {
                    toastr.remove();
                    if (data.status == 1) {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                }
            });
        });

        $("input[name='favicon']").ijaboViewer({
            preview: "#favicon-image-preview",
            imageShape: "square",
            allowedExtensions: ["ico", "png", "gif"],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {},
        });

        $("form#changeFaviconForm").submit(function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr("action"),
                method: $(form).attr("method"),
                data: new FormData(form),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {},
                success: function(data) {
                    toastr.remove();
                    if (data.status == 1) {
                        toastr.success(data.msg);
                    } else {
                        toastr.error(data.msg);
                    }
                }
            });
        });
    </script>
@endpush
