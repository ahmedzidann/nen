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

            <div class="card">
                <div class="card-header">
                    <br>
                    @if (App\Models\FeatureAdvantages::count() == 0)
                        <a href="{{ $routeCreate ?? '' }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i>{{ TranslationHelper::translate(ucfirst('Create') ?? '') }}
                        </a>
                    @endif 

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
                                <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                                <th>{{ TranslationHelper::translate(ucfirst('#') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Description') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Created At') ?? '') }}</th>
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
    <script src="{{ asset('admin/feature-advantages/js/index.js') }}"></script>
@endsection
