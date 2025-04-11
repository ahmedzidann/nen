@extends('admin.layouts.master')

@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('orders' . ' View'))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ $routeView ?? '' }}">
                        {{ str_replace('-', ' ', ucfirst(Request()->item)) }}
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('blogs')) }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="card">
                <div class="card-header">

                    <br>
                    {{-- <a href="{{route('admin.store_sliders.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>{{ TranslationHelper::translate(ucfirst('Create') ?? '') }}
                    </a> --}}
                    <button type="button" class="btn btn-secondary btn-xs " name="bulk_delete" id="bulk_delete"><i
                            class="bx bxs-trash"></i>{{ TranslationHelper::translate(ucfirst('Delete') ?? '') }}</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="yajra-datatable"
                        class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                        <thead>
                            <tr>
                                {{-- <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th> --}}
                                <th>{{ TranslationHelper::translate(ucfirst('#') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('status') ?? '') }}</th>
                                    <th>{{ TranslationHelper::translate(ucfirst('address') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Created At') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('actions') ?? '') }}</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('jsadmin')
    <script src="{{ asset('admin/custom/js/index.js') }}"></script>

    <script>
        var language = $('#Admins').val();
        let url = '{{ route('admin.orders.index') }}'
        url = url.replace(':id', language);
        $(document).ready(function() {
            var table = initializeDataTable(
                '#yajra-datatable', // The selector for the table
                url, // The AJAX URL for fetching data
                [ // Define the columns
                    // {
                    //     data: 'checkbox',
                    //     orderable: false,
                    //     searchable: false
                    // },
                    {
                        data: 'id'
                    },
                    {
                        data: 'status'
                    },

                    {
                        data: 'address'
                    },

                    {
                        data: 'created_at'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                [ // Define buttons
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        className: 'btn btn-primary'
                    }
                ], {} // Extra data to pass with the request (optional)
            );
            bulkDelete(table, "{{ route('admin.store_sliders.delete_bulck') }}");

            // Setup bulk delete functionality
        });
    </script>
@endsection
