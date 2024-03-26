@extends('admin.layouts.master')

@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate('Roles'))) }}
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')

<div class="content-body">
    <x-admin.route :route="route('admin.roles.create')" name="{{ TranslationHelper::translate('Create Roles') }}">
    </x-admin.route>
    <!-- container starts -->
    <div class="container-fluid">
        <!-- row -->
        <div class="">
            <div class="demo-view">
                <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                    <div class="row">
                        <!-- Column starts -->
                        <div class="col-xl-12">
                            <div class="card dz-card" id="accordion-one">
                                <div class="card-header flex-wrap">
                                    <x-admin.basic name="{{ TranslationHelper::translate('Roles') }}"></x-admin.basic>
                                    <x-admin.search :route="route('admin.roles.index')"></x-admin.search>
                                </div>
                                <ul class="nav nav-tabs dzm-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="{{ route('admin.roles.create') }}" class="nav-link active"
                                            id="home-tab" data-bs-target="#BadgesSize" type="button" role="tab"
                                            aria-selected="true">{{ TranslationHelper::translate('Create') }}</a>
                                    </li>
                                </ul>
                                <!--tab-content-->
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="card-body pt-0">
                                            <div class="table-responsive ">
                                                <table id="" class="display table dataTable no-footer" style="min-width: 845px" role="grid">
                                                    <thead>
                                                        <tr style="background-color: #F0F4F9;">
                                                            <x-admin.table th1='#'
                                                                th2="{{ TranslationHelper::translate('Role Name') }}"
                                                                th3="{{ TranslationHelper::translate('Actions') }}"
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($roles as $key => $role)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                <td>{{ $role->name }}</td>
                                                                <td>
                                                                    <span style="overflow: visible; position: relative; width: 110px;">
                                                                            <x-admin.eye :route="route('admin.roles.show', $role->id)"> </x-admin.eye>
                                                                            <x-admin.edit :route="route('admin.roles.edit', $role->id)"> </x-admin.edit>
                                                                            <x-admin.delete-model :id="$role->id"
                                                                                :name="$role->name"
                                                                                :route="route('admin.roles.destroy', $role->id)">
                                                                            </x-admin.delete-model>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr style="background-color: #F0F4F9;">
                                                            <x-admin.table th1='#'
                                                                th2="{{ TranslationHelper::translate('Role Name') }}"
                                                                th3="{{ TranslationHelper::translate('Actions') }}"
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                {{$roles->links()}}
                                            </div>
                                        </div>
                                        <!-- /Default accordion -->
                                    </div>
                                </div>
                                <!--/tab-content-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsadmin')
@endsection
