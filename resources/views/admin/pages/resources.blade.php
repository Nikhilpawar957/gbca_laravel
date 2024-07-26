@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Resources | ' . env('APP_NAME'))
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
                        Resources
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('author.add-resource') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Add Resource
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div id="table-default" class="table-responsive">
                            <table id="resource_table" class="table w-100">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">
                                            No.
                                        </th>
                                        <th style="width: 500px;">
                                            Resource
                                        </th>
                                        <th style="width: 100px">
                                            Flip Book
                                        </th>
                                        <th style="width: 100px">
                                            PDF
                                        </th>
                                        <th style="width: 100px">
                                            Created Date
                                        </th>
                                        <th style="width: 50px">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="sortable_resource" class="table-tbody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="deleteRes" action="{{ route('author.delete-resource') }}" method="post">
        @csrf
        <input type="hidden" id="delete_res_id" name="resource_id" value="0">
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
            var r = /^(ftp|http|https):\/\/[^ "]+$/;
            var table = $('#resource_table').DataTable({
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
                ajax: "{{ route('author.getResources') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: true,
                    },
                    {
                        data: 'resource_details',
                        name: 'resource_details',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'flipbook',
                        name: 'flipbook',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'pdf_url',
                        name: 'pdf_url',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'date',
                        name: 'date',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $(".reload").click(function() {
                table.ajax.reload(null, false);
            });
        });

        function delete_resource(id) {
            swal.fire({
                title: 'Delete Resource',
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
                    $("#delete_res_id").val(id);
                    var form = document.getElementById("deleteRes");
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
                                $("#deleteRes input[type='hidden']").val('');
                                $('#resource_table').DataTable().ajax.reload(null, false);
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
