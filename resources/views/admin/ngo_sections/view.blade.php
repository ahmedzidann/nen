@extends('admin.layouts.master')

@section('titleadmin')
    NGO Sections
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')
<div class="page-wrapper">
    <div class="page-content">

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">NGO Sections</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">NGO Section Settings</li>
                    </ol>
                </nav>
            </div>
        </div>

        <hr />

        <div class="card">
            <div class="card-header">
                <br>
                <a href="{{ route('admin.ngo_sections.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                    <i class="bx bxs-plus-square"></i>
                    {{ TranslationHelper::translate(ucfirst('Create') ?? '') }}
                </a>
                <button type="button" class="btn btn-secondary btn-xs" name="bulk_delete" id="bulk_delete">
                    <i class="bx bxs-trash"></i>
                    {{ TranslationHelper::translate(ucfirst('Delete') ?? '') }}
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="yajra-datatable"
                       class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                            <th>{{ TranslationHelper::translate(ucfirst('#') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Category') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Sub Category') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Title') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Section Number') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Sort') ?? '') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Processes') ?? '') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

@section('jsadmin')
<script src="{{ asset('admin/custom/js/index.js') }}"></script>
<script>
$(document).ready(function() {
    let url = "{{ route('admin.ngo_sections.index') }}";

    var table = initializeDataTable(
        '#yajra-datatable',
        url,
        [
            { data: 'checkbox', orderable: false, searchable: false },
            { data: 'id' },
            { data: 'main_category_id' },
            { data: 'sub_category_id' },
            { data: 'title' },
            { data: 'design_section_id' },
            { data: 'sort' },
            { data: 'action', orderable: false, searchable: false }
        ],
        [
            { extend: 'excel', text: 'Export to Excel', className: 'btn btn-primary' }
        ],
        {}
    );

    bulkDelete(table, "{{ route('admin.ngo_sections.bulk_delete') }}");
});
</script>
@endsection
