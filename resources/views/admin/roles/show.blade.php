@extends('admin.layouts.master')

@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate('Show Roles'))) }}
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')

<div class="content-body">
    <x-admin.route :route="route('admin.roles.index')" name="{{ TranslationHelper::translate('Index Roles') }}"></x-admin.route>
    <!-- container starts -->
    <div class="container-fluid">
        <!-- row -->
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                <x-admin.crud name="{{ $type??'' }} Form Roles"></x-admin.crud>
                <div class="card-body">
                    <div class="basic-form">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mg-b-20">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.roles.index') }}">{{TranslationHelper::translate('Back')}}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-lg-4">
                                        <ul id="treeview1">
                                            <li><a>{{ $role->name }}</a>
                                                <ul>
                                                    @if(!empty($rolePermissions))
                                                    @foreach($rolePermissions as $v)
                                                    <li>{{ $v->name }}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row closed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsadmin')
@endsection
