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
            <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="View">
            </x-admin.customize-breadcrumb>
            <!--end breadcrumb-->
            <hr />
            <input type="hidden" id="{{ $viewTable }}" value="{{ app()->getLocale() }}">
            {{-- <x-admin.form.filter  :route="$routeCreate"></x-admin.form.filter> --}}
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-sm-12"><b>{{ TranslationHelper::translate(ucfirst('Filter Data') ?? '') }}</b>
                        </div>
                        <div class="col col-sm-5 col-12">
                            <label for="input29"
                                class="form-label">{{ TranslationHelper::translate(ucfirst('Data To') ?? '') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" class="form-control datepickerto" name="datepickerto"
                                    id="datepickerto"
                                    placeholder="{{ TranslationHelper::translate(ucfirst('Data To...') ?? '') }}">
                            </div>
                        </div>
                        <div class="col col-sm-5 col-12">
                            <label for="input29"
                                class="form-label">{{ TranslationHelper::translate(ucfirst('Data From') ?? '') }}</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" class="form-control datepickerfrom" name="datepickerfrom"
                                    id="datepickerfrom"
                                    placeholder="{{ TranslationHelper::translate(ucfirst('Data From...') ?? '') }}">
                            </div>
                        </div>
                        <div class="col col-sm-2 col-12">
                            <label for="input29" style="visibility:hidden"
                                class="form-label">{{ TranslationHelper::translate(ucfirst('Data From') ?? '') }}</label>
                            <div class="input-group">
                                <a href="javascript:;" id="filterButton" class="btn btn-primary px-5 filterButton"><i
                                        class="fadeIn animated bx bx-filter"></i>{{ TranslationHelper::translate(ucfirst('Filter') ?? '') }}</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if (!$check)
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
                                <th>{{ TranslationHelper::translate(ucfirst('Project') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Tabs') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Created At') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('Processes') ?? '') }}</th>
                                <th>{{ TranslationHelper::translate(ucfirst('TabsData') ?? '') }}</th>
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
    <script src="{{ asset('admin/project/tabs/joinus/js/index.js') }}"></script>
@endsection
