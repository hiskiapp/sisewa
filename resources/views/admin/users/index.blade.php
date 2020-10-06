{{-- Extends layout --}}
@extends('layout.default')

{{-- Title --}}
@section('title', 'Users List')

{{-- Content --}}
@section('content')

<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Users List</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>New User
            </a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..."
                                    id="kt_datatable_search_query" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                <select class="form-control" id="kt_datatable_search_status">
                                    <option value="">All</option>
                                    <option value="0">Not Submit</option>
                                    <option value="1">Submitted</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Is Downloaded:</label>
                                <select class="form-control" id="kt_datatable_search_is_downloaded">
                                    <option value="">All</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                </div>
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>IsDownloaded</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ optional($user->data)->is_downloaded ?? '0' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">
                                {{ Metronic::getSVG('media/svg/icons/Design/Pencil.svg') }}
                            </a>
                            <form method="POST"
                                action="{{ route('admin.users.destroy', $user->id) }}"
                                class="d-inline form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-default btn-text-primary btn-hover-danger btn-icon btn-destroy">
                                    {{ Metronic::getSVG('media/svg/icons/General/Trash.svg') }}
                                </button>
                            </form>
                            <a href="{{ route('admin.users.show', $user->id) }}"
                                class="btn btn-sm btn-default btn-text-primary btn-hover-info btn-icon">
                                {{ Metronic::getSVG('media/svg/icons/Devices/LTE1.svg') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>

@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script type="text/javascript">
    "use strict";
    // Class definition

    var KTDatatableHtmlTableDemo = function () {
        // Private functions

        // demo initializer
        var demo = function () {

            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    saveState: {
                        cookie: false
                    },
                },
                search: {
                    input: $('#kt_datatable_search_query'),
                    key: 'generalSearch'
                },
                columns: [{
                    field: 'Status',
                    title: 'Status',
                    autoHide: false,
                    // callback function support for column rendering
                    template: function (row) {
                        var status = {
                            0: {
                                'title': 'Not Submit',
                                'class': ' label-light-warning'
                            },
                            1: {
                                'title': 'Submitted',
                                'class': ' label-light-primary'
                            },
                        };
                        return '<span class="label font-weight-bold label-lg' + status[row
                                .Status].class + ' label-inline">' + status[row.Status]
                            .title + '</span>';
                    },
                },
                {
                    field: 'IsDownloaded',
                    title: 'IsDownloaded',
                    autoHide: false,
                    // callback function support for column rendering
                    template: function (row) {
                        var status = {
                            0: {
                                'title': 'No',
                                'class': ' label-light-warning'
                            },
                            1: {
                                'title': 'Yes',
                                'class': ' label-light-primary'
                            },
                        };
                        return '<span class="label font-weight-bold label-lg' + status[row
                                .IsDownloaded].class + ' label-inline">' + status[row.IsDownloaded]
                            .title + '</span>';
                    },
                }],
            });



            $('#kt_datatable_search_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_is_downloaded').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Is Downloaded');
            });

            $('#kt_datatable_search_status').selectpicker();

        };

        return {
            // Public functions
            init: function () {
                // init dmeo
                demo();
            },
        };
    }();

    $(document).on('submit', '.form-delete', function (e) {
        var form = this;
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function (result) {
            if (result.value) {
                return form.submit();
            }
        });
    });

    jQuery(document).ready(function () {
        KTDatatableHtmlTableDemo.init();
    });

</script>
@endsection
