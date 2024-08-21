@extends('admin.layouts.master')

@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate($viewTable . ' View'))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="View"></x-admin.customize-breadcrumb>
            <!--end breadcrumb-->
            <hr />
            <input type="hidden" id="{{ $viewTable }}" value="{{ app()->getLocale() }}">
            <x-admin.form.filter :route="$routeCreate"></x-admin.form.filter>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="yajra-datatable"
                        class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                                <th>{{ TranslationHelper::translate(ucfirst('#') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('title') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('email') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Processes') ?? '') }}</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                        <tfoot>
                            {{-- <tr class="odd">
                            <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                            <th>{{ TranslationHelper::translate(ucfirst('#')??'') }}</th>
                            <td><input type="text" class="form-control filter-input"
                                    placeholder="{{ TranslationHelper::translate(ucfirst('Search for name...')??'') }}"
                                    data-column="1"></td>
                            <td><input type="text" class="form-control filter-input"
                                    placeholder="{{ TranslationHelper::translate(ucfirst('Search for name...')??'') }}"
                                    data-column="2"></td>
                            <td><input type="text" class="form-control filter-input"
                                    placeholder="Search for created_at..." data-column="3"></td>
                            <th>{{ TranslationHelper::translate(ucfirst('Processes')??'') }}</th>
                        </tr> --}}
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
        let url = '{{ route('admin.contact-us-services.show', ['contact_us_service' => ':id']) }}'
        url = url.replace(':id', language);
        $(document).ready(function() {
            var table = initializeDataTable(
                '#yajra-datatable', // The selector for the table
                url, // The AJAX URL for fetching data
                [ // Define the columns
                    {
                        data: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'email'
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
            // Setup bulk delete functionality
            bulkDelete(table, "{{route('admin.delete.contact-us-services')}}");
        });
    </script>
@endsection
