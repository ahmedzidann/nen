@extends('admin.layouts.master')

@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' View'))) }}
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
        @if (Request()->category == 'about' && Request()->subcategory == 'achievements' && Request()->item == 'section-one')
            @if (empty($DataFull))
            <x-admin.form.filter :route="$routeCreate"></x-admin.form.filter>
            @endif
        @else
        <x-admin.form.filter :route="$routeCreate"></x-admin.form.filter>
        @endif


        <div class="card-body">
            <div class="table-responsive">
                <table id="yajra-datatable"
                    class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                            <th>{{ TranslationHelper::translate(ucfirst('#')??'') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('title')??'') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Created At')??'') }}</th>
                            <th>{{ TranslationHelper::translate(ucfirst('Processes')??'') }}</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                    <tfoot>
                        <tr class="odd">
                            <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                            <th>{{ TranslationHelper::translate(ucfirst('#')??'') }}</th>
                            <td><input type="text" class="form-control filter-input"
                                    placeholder="{{ TranslationHelper::translate(ucfirst('Search for name...')??'') }}"
                                    data-column="1"></td>
                            <td><input type="text" class="form-control filter-input"
                                    placeholder="Search for created_at..." data-column="3"></td>
                            <th>{{ TranslationHelper::translate(ucfirst('Processes')??'') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('jsadmin')
<script src="{{ asset('admin/about/achievements/js/index.js') }}"></script>
@endsection