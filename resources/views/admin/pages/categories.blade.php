@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Categories & SubCategories | ' . env('APP_NAME'))
@push('stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush
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
                        Categories & SubCategories
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6 p-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <div class="card-actions">
                                <a href="javascript:void(0);" onclick="return openModal('add-edit-cat-modal');"
                                    class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Add new
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="w-100">
                                <table id="category_table" class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Subcat Count</th>
                                            <th>Resources Count</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SubCategories</h3>
                            <div class="card-actions">
                                <a href="javascript:void(0);" onclick="return openModal('add-edit-subcat-modal');"
                                    class="btn btn-primary">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Add new
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="w-100">
                                <table id="subcategory_table" class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Parent Category</th>
                                            <th>Resources Count</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="add-edit-cat-modal" tabindex="-1" style="display: none;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form id="addUpdateCategory" action="{{ route('author.save-category') }}" method="POST"
                enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="category_id" value="">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                        <span class="error text-danger category_name_error"></span>
                    </div>
                    <div class="mb-3">
                        <img id="category_icon" width="50" height="50" src="https://placehold.co/50x50" class="img-fluid"
                            alt="">
                    </div>
                    <div class="mb-3">
                        <label for="category_image" class="form-label">Icon</label>
                        <input type="file" class="form-control" name="category_image">
                        <span class="error text-danger category_image_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal modal-blur fade" id="add-edit-subcat-modal" tabindex="-1" style="display: none;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form id="addUpdateSubCategory" action="{{ route('author.save-subcategory') }}" method="POST"
                enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">SubCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="parent_category" class="form-label">Select Category</label>
                        <select id="parent_category" name="parent_category" class="form-select">
                            <option value="">Select Category</option>
                            @foreach (\App\Models\Category::whereRaw('(parent_category IS NULL OR parent_category = 0)')->get() as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="subcategory_id" value="">
                        <label for="category_name" class="form-label">SubCategory Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                        <span class="error text-danger category_name_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        Save</button>
                </div>
            </form>
        </div>
    </div>

    <form id="deleteCat" action="{{ route('author.delete-category') }}" method="post">
        @csrf
        <input type="hidden" id="delete_cat_id" name="category_id" value="0">
    </form>

    <form id="deleteSubCat" action="{{ route('author.delete-subcategory') }}" method="post">
        @csrf
        <input type="hidden" id="delete_subcat_id" name="subcategory_id" value="0">
    </form>

@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {

            $('input[type="file"][name="category_image"]').ijaboViewer({
                preview: "#category_icon",
                imageShape: "square",
                allowedExtensions: ["jpg", "png", "jpeg", "svg"],
                onErrorShape: function(message, element) {
                    toastr.error(message);
                },
                onInvalidType: function(message, element) {
                    toastr.error(message);
                },
                onSuccess: function(message, element) {},
            });

            var r = /^(ftp|http|https):\/\/[^ "]+$/;
            var table = $('#category_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                aLengthMenu: [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                ajax: "{{ route('author.getCategories') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                    },
                    {
                        data: 'category_image',
                        name: 'category_image',
                        render: function(data, type, full, meta) {
                            if (r.test(data)) {
                                return '<img src="' + data +
                                    '" class="img-fluid" style="height:20px;">';
                            } else {
                                return '<img src="{{ asset("/storage") }}/' +
                                    data + '" class="img-fluid" style="height:20px;">';
                            }
                        },
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'subcat_count',
                        name: 'subcat_count',
                        orderable: true,
                    },
                    {
                        data: 'resources_count',
                        name: 'resources_count',
                        orderable: true,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            var table2 = $('#subcategory_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                aLengthMenu: [
                    [10, 15, 25, 50, 100, -1],
                    [10, 15, 25, 50, 100, "All"]
                ],
                ajax: "{{ route('author.getSubCategories') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                    },
                    {
                        data: 'subcategory_name',
                        name: 'subcategory_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'resources_count',
                        name: 'resources_count',
                        orderable: true,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        function openModal(id) {
            $("#" + id + " form")[0].reset();
            $("#" + id + " form input[type='hidden']").val('');
            $("#" + id + " span.error").text('');
            $("#" + id).modal('show');
        }

        $("form#addUpdateCategory").submit(function(e) {
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
                    toastr.remove();
                },
                success: function(response) {
                    if (response.code == 1) {
                        $('form#addUpdateCategory')[0].reset();
                        $("#add-edit-cat-modal").modal('hide');
                        $('#category_table').DataTable().ajax.reload();
                        toastr.success(response.msg);
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

        $("form#addUpdateSubCategory").submit(function(e) {
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
                    toastr.remove();
                },
                success: function(response) {
                    if (response.code == 1) {
                        $('form#addUpdateSubCategory')[0].reset();
                        $("#add-edit-subcat-modal").modal('hide');
                        $('#subcategory_table').DataTable().ajax.reload();
                        toastr.success(response.msg);
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

        function edit_category(id) {
            toastr.remove();
            var formdata = new FormData();
            formdata.append('category_id', id);
            $.ajax({
                url: "{{ route('author.edit-category') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    toastr.remove();
                },
                success: function(response) {
                    if (response.code == 1) {
                        $("input[name='category_id']").val(id);
                        $("input[name='category_name']").val(response.data.category_name)
                        $("#add-edit-cat-modal").modal("show");
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }

        function delete_category(id) {
            swal.fire({
                title: 'Delete Category',
                text: 'Are You Sure ?',
                imageWidth: 48,
                imageHeight: 48,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 320,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    $("#delete_cat_id").val(id);
                    var form = document.getElementById("deleteCat");
                    $.ajax({
                        url: $(form).attr("action"),
                        method: $(form).attr("method"),
                        data: new FormData(form),
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {},
                        success: function(response) {
                            toastr.remove();
                            if (response.code == 1) {
                                toastr.success(response.msg);
                                $(form)[0].reset();
                                $("#deleteCat input[type='hidden']").val('');
                                $('#category_table').DataTable().ajax.reload(null, false);
                            } else {
                                toastr.error(response.msg);
                            }
                        },
                        error: function(response) {
                            toastr.error(response.msg);
                        }
                    });
                }
            });
        }

        function edit_subcategory(id) {
            toastr.remove();
            var formdata = new FormData();
            formdata.append('subcategory_id', id);
            $.ajax({
                url: "{{ route('author.edit-subcategory') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    toastr.remove();
                },
                success: function(response) {
                    if (response.code == 1) {
                        $("form#addUpdateSubCategory input[name='subcategory_id']").val(id);
                        $("form#addUpdateSubCategory select[name='parent_category']").val(response.data
                            .parent_category);
                        $("form#addUpdateSubCategory input[name='category_name']").val(response.data
                            .category_name);
                        $("#add-edit-subcat-modal").modal("show");
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }

        function delete_subcategory(id) {
            swal.fire({
                title: 'Delete SubCategory',
                text: 'Are You Sure ?',
                imageWidth: 48,
                imageHeight: 48,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 320,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    $("#delete_subcat_id").val(id);
                    var form = document.getElementById("deleteSubCat");
                    $.ajax({
                        url: $(form).attr("action"),
                        method: $(form).attr("method"),
                        data: new FormData(form),
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {},
                        success: function(response) {
                            toastr.remove();
                            console.log(response.msg);
                            if (response.code == 1) {
                                toastr.success(response.msg);
                                $(form)[0].reset();
                                $("#deleteSubCat input[type='hidden']").val('');
                                $('#subcategory_table').DataTable().ajax.reload(null, false);
                            } else {
                                toastr.error(response.msg);
                            }
                        },
                        error: function(response) {
                            toastr.error(response.msg);
                        }
                    });
                }
            });
        }
    </script>
@endpush
