@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Resource | ' . env('APP_NAME'))
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
                        Edit Resource
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <form id="resourceForm" action="{{ route('author.save-resource') }}" method="POST" class="card"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="resource_id" value="{{ Request('resource_id') }}">
                <div class="card-body border-bottom py-3">
                    <div class="row row-cards">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="resource_title" class="form-label required">Resource Title</label>
                                <input type="text" class="form-control" id="resource_title" name="resource_title"
                                    placeholder="Resource Title"
                                    value="{{ old('resource_title') != null ? old('resource_title') : $resource->resource_title }}">
                                <span class="error small text-danger resource_title_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="resource_file" class="form-label">Upload PDF <small>(Max Size <= 10MB)*</small>
                                </label>
                                <input type="file" accept="application/pdf" id="resource_file" name="resource_file"
                                    class="form-control">
                                <span class="error small text-danger resource_file_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="resource_short_desc" class="form-label required">Resource Short
                                    Description</label>
                                <textarea class="form-control" id="resource_short_desc" name="resource_short_desc" rows="4">{{ old('resource_short_desc') != null ? old('resource_short_desc') : $resource->resource_short_desc }}</textarea>
                                <span class="error small text-danger resource_short_desc_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="resource_desc" class="form-label required">Resource Description</label>
                                <textarea class="form-control ckeditor" id="resource_desc" name="resource_desc" rows="10">{{ old('resource_desc') != null ? old('resource_desc') : $resource->resource_desc }}</textarea>
                                <span class="error small text-danger resource_desc_error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="resource_category_id" class="form-label required">Category</label>
                                <select class="form-select" id="resource_category_id" name="resource_category_id">
                                    <option value="">Select Category</option>
                                    @foreach (\App\Models\Category::whereNull('parent_category')->get() as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $resource->resource_category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error small text-danger resource_category_id_error"></span>
                            </div>
                            <div class="mb-3 subcat {{ ($resource->resource_subcategory_id == null) ? 'd-none' : '' }}">
                                <label for="resource_subcategory_id" class="form-label required">SubCategory</label>
                                <select class="form-select" id="resource_subcategory_id" name="resource_subcategory_id">
                                    <option value="0">Select SubCategory</option>
                                    @foreach (\App\Models\Category::where('parent_category', '=', $resource->resource_category_id)->get() as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $resource->resource_subcategory_id ? 'selected' : '' }}>{{ $subcategory->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error small text-danger resource_subcategory_id_error"></span>
                            </div>
                            <div class="mb-3">
                                <img id="image-previewer" src="{{ $resource->resource_image }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Featured Image <small>(Max Size <= 2MB)*</small>
                                </div>
                                <input type="file" id="resource_image" name="resource_image" accept="image/*"
                                    class="form-control">
                                <span class="error small text-danger resource_image_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="resource_keywords" class="form-label required">Keywords</label>
                                <input type="text" class="form-control" id="resource_keywords" name="resource_keywords"
                                    placeholder="Resource Keywords" value="">
                                <span class="error small text-danger resource_keywords_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('author.resources') }}" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $('input[name="resource_keywords"]').amsifySuggestags();
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $('input[type="file"][name="resource_image"]').ijaboViewer({
                preview: "#image-previewer",
                imageShape: "rectangular",
                allowedExtensions: ["jpg", "png", "jpeg", "svg"],
                onErrorShape: function(message, element) {
                    toastr.error(message);
                },
                onInvalidType: function(message, element) {
                    toastr.error(message);
                },
                onSuccess: function(message, element) {},
            });

            $('form#resourceForm').submit(function(e) {
                e.preventDefault();
                toastr.remove();
                var resource_desc = CKEDITOR.instances.resource_desc.getData();
                var form = this;
                var formdata = new FormData(form);
                formdata.append('resource_desc', resource_desc);
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: formdata,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error').text('');
                    },
                    success: function(response) {
                        toastr.remove();
                        if (response.code == 1) {
                            // $(form)[0].reset();
                            // $('div.image-holder').find('img').attr('src', '');
                            // CKEDITOR.instances.resource_desc.setData('');
                            // $('input[name="resource_keywords"]').amsifySuggestags();
                            toastr.success(response.msg);
                            setTimeout(() => {
                                location.href = "{{ route('author.resources') }}";
                            }, 1500);
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(response) {
                        toastr.remove();
                        $.each(response.responseJSON.errors, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                });
            });

            $("[name='resource_category_id']").on('change', function() {
                var category_id = this.value;
                var formdata = new FormData();
                formdata.append('category_id', category_id);
                $.ajax({
                    url: "{{ route('author.getSubCategoriesByCategory') }}",
                    method: "POST",
                    data: formdata,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                    success: function(response) {
                        toastr.remove();
                        $("[name='resource_subcategory_id']").html("");
                        if (response.code == 1) {
                            var option = "<option value='0'>Select SubCategory</option>";

                            response.data.forEach(element => {
                                option += "<option value='" + element.id + "'>" +
                                    element.category_name + "</option>";
                            });

                            $("[name='resource_subcategory_id']").html(option);
                            $(".subcat").removeClass('d-none');
                        } else {
                            //toastr.warning(response.msg);
                            $(".subcat").addClass('d-none');
                        }

                    },
                });
            });
        });
    </script>
@endpush
