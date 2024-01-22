@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Users | ' . env('APP_NAME'))
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
                        Alumni Users
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-home-13" class="nav-link active" data-bs-toggle="tab"
                                        aria-selected="true" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-check me-2 text-success" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                            <path d="M15 19l2 2l4 -4" />
                                        </svg>
                                        Approved<small id="approved_user_count"
                                            class="badge rounded-pill bg-green ms-2">{{ DB::table('users')->where('role', '!=', 1)->where('blocked', '=', 0)->count() }}</small></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-profile-13" id="pending_tab" class="nav-link" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-plus me-2 text-primary" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M16 19h6" />
                                            <path d="M19 16v6" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                        </svg>
                                        Pending<small id="pending_user_count"
                                            class="badge rounded-pill bg-blue ms-2">{{ DB::table('users')->where('role', '!=', 1)->where('blocked', '=', 2)->count() }}</small></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="#tabs-activity-13" id="reject_tab" class="nav-link" data-bs-toggle="tab"
                                        aria-selected="false" role="tab" tabindex="-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-x me-2 text-danger" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                            <path d="M22 22l-5 -5" />
                                            <path d="M17 22l5 -5" />
                                        </svg>
                                        Rejected<small id="rejected_user_count"
                                            class="badge rounded-pill bg-red ms-2">{{ DB::table('users')->where('role', '!=', 1)->where('blocked', '=', 1)->count() }}</small></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tabs-home-13" role="tabpanel">
                                    <div id="table-default" class="table-responsive">
                                        <table id="approved_users_table" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">
                                                        No.
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Phone No.
                                                    </th>
                                                    <th style="width: 200px">
                                                        Date
                                                    </th>
                                                    <th style="width: 50px">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-profile-13" role="tabpanel">
                                    <div id="table-default" class="table-responsive">
                                        <table id="pending_users_table" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">
                                                        No.
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Phone No.
                                                    </th>
                                                    <th style="width: 200px">
                                                        Date
                                                    </th>
                                                    <th style="width: 50px">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-activity-13" role="tabpanel">
                                    <div id="table-default" class="table-responsive">
                                        <table id="rejected_users_table" class="table w-100">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">
                                                        No.
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Phone No.
                                                    </th>
                                                    <th style="width: 200px">
                                                        Date
                                                    </th>
                                                    <th style="width: 50px">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="deleteUser" action="{{ route('author.delete-user') }}" method="post">
        @csrf
        <input type="hidden" id="delete_user_id" name="user_id" value="0">
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

        var approved_users_table = $('#approved_users_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            ajax: {
                url: "{{ route('author.getUsers') }}",
                data: function(data) {
                    data.blocked = 0;
                }
            },
            drawCallback: function(settings, start, end, max, total, pre) {
                $("#approved_user_count").text(this.fnSettings().fnRecordsTotal());
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'phone',
                    name: 'phone',
                    orderable: true,
                    searchable: true
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

        $("#pending_tab").on("click", function() {
            if (!$.fn.DataTable.isDataTable('#pending_users_table')) {
                var pending_users_table = $('#pending_users_table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    ajax: {
                        url: "{{ route('author.getUsers') }}",
                        data: function(data) {
                            data.blocked = 2;
                        }
                    },
                    drawCallback: function(settings, start, end, max, total, pre) {
                        $("#pending_user_count").text(this.fnSettings().fnRecordsTotal());
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: true,
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: true,
                            searchable: true
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
            }
        });

        $("#reject_tab").on("click", function() {
            if (!$.fn.DataTable.isDataTable('#rejected_users_table')) {
                var rejected_users_table = $('#rejected_users_table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    ajax: {
                        url: "{{ route('author.getUsers') }}",
                        data: function(data) {
                            data.blocked = 1;
                        }
                    },
                    drawCallback: function(settings, start, end, max, total, pre) {
                        $("#rejected_user_count").text(this.fnSettings().fnRecordsTotal());
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: true,
                        },
                        {
                            data: 'name',
                            name: 'name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'email',
                            name: 'email',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: true,
                            searchable: true
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
            }
        });

        function delete_user(id) {
            swal.fire({
                title: 'Delete User',
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
                    $("#delete_user_id").val(id);
                    var form = document.getElementById("deleteUser");
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
                                $('#approved_users_table').DataTable().ajax.reload(null, false);
                                $('#pending_users_table').DataTable().ajax.reload(null, false);
                                $('#pending_users_table').DataTable().ajax.reload(null, false);
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

        function change_status(id, status) {

            var type = '';

            if (status === 0) {
                type = 'Approve';
            } else if (status === 1) {
                type = 'Reject';
            }

            swal.fire({
                title: type + ' User',
                text: 'Are You Sure ?',
                imageWidth: 48,
                imageHeight: 48,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                width: 320,
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    $("#delete_user_id").val(id);
                    var formdata = new FormData();
                    formdata.append('user_id', id);
                    formdata.append('status', status);
                    $.ajax({
                        url: "{{ route('author.change-user-status') }}",
                        method: "POST",
                        data: formdata,
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {},
                        success: function(response) {
                            toastr.remove();
                            if (response.code == 1) {
                                toastr.success(response.msg);
                                approved_users_table.ajax.reload(null, false);

                                if ($.fn.DataTable.isDataTable('#pending_users_table')) {
                                    $('#pending_users_table').DataTable().ajax.reload(null, false);
                                }

                                if ($.fn.DataTable.isDataTable('#rejected_users_table')) {
                                    $('#rejected_users_table').DataTable().ajax.reload(null, false);
                                }

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
