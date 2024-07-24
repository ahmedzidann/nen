@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
@endsection
@section('cssadmin')

@endsection

@section('contentadmin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-admin.form.breadcrumb :name="$viewTable" :routeView="$routeView" :type="$type"></x-admin.form.breadcrumb>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')??'') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            @foreach ($translation as $item)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $loop->first?'active':'' }}" data-bs-toggle="tab"
                                    href="#{{ $item->id }}" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> {{ ucfirst($item->name) }}</div>

                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <form method="post" action="{{ $action??'' }}" enctype="multipart/form-data">
                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                @foreach ($translation as $item)
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}"
                                    role="tabpanel">
                                    <div class="card-body p-4">




                                        {{-- <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="title">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="title" name="title" type="text"
                                                    placeholder="title" class="form-control valid" required='true'>
                                                </x-admin.form.input>
                                            </div>
                                        </div> --}}

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="title  {{ $item->title  }}">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="{{ 'title.'.$item->key }}"
                                                    name="{{ 'title'.'['.$item->key.']' }}" type="text"
                                                    required="{{ $loop->first?'required':'' }}"
                                                    placeholder="Title {{ $item->title }}" class="form-control valid"
                                                    :value="$admin->translate('title', $item->key)"></x-admin.form.input>
                                            </div>
                                        </div>





                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@endsection
@section('jsadmin')
@endsection
