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
        <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="Create">
        </x-admin.customize-breadcrumb>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')??'') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#{{ $translationFirst->id }}"
                                    role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> {{ ucfirst($translationFirst->name) }}</div>

                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form method="post" id="myForm" action="{{ $action??'' }}" enctype="multipart/form-data">

                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="{{ $translationFirst->id }}" role="tabpanel">
                                    <div class="card-body p-4">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="country {{ $translationFirst->country  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'country.'.$translationFirst->key }}"
                                                    name="{{ 'country'.'['.$translationFirst->key.']' }}" type="text"
                                                    required="" placeholder="country {{ $translationFirst->country }}"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('country', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter country  {{ $translationFirst->country  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="address  {{ $translationFirst->address  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'address.'.$translationFirst->key }}"
                                                    name="{{ 'address'.'['.$translationFirst->key.']' }}" type="text"
                                                    required="" placeholder="address {{ $translationFirst->address }}"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('address', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter address  {{ $translationFirst->address  }}">
                                                </x-admin.form.label-end>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.input old="{{ 'phone' }}"
                                                    name="phone" type="text"
                                                    required="" placeholder="phone"
                                                    class="form-control valid"
                                                    :value="$StaticTable->phone">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter phone">
                                                </x-admin.form.label-end>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="" class="form-label"
                                                    name="Latitude">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="lat"
                                                    name="lat" type="text"
                                                    required="" placeholder="Latitude"
                                                    class="form-control valid"
                                                    :value="$StaticTable->lat">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Latitude">
                                                </x-admin.form.label-end>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="" class="form-label"
                                                    name="Longitude">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="lng"
                                                    name="lng" type="text"
                                                    required="" placeholder="Longitude"
                                                    class="form-control valid"
                                                    :value="$StaticTable->lat">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Longitude">
                                                </x-admin.form.label-end>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="" class="form-label"
                                                    name="From At">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="from_at"
                                                    name="from_at" type="datetime-local"
                                                    required="" placeholder="From At"
                                                    class="form-control valid"
                                                    :value="$StaticTable->from_at">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter From At">
                                                </x-admin.form.label-end>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="" class="form-label"
                                                    name="To At">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="to_at"
                                                    name="to_at" type="datetime-local"
                                                    required="" placeholder="To At"
                                                    class="form-control valid"
                                                    :value="$StaticTable->lat">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter To At">
                                                </x-admin.form.label-end>
                                            </div>

                                            {{-- ----------first image--}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first  class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="image"
                                                        old="image" name="image" type="file" readonly=""
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            {{-- ----------end image--}}

                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- --------hatem --}}
                                    </div>
                                </div>
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
@include('admin.layouts.ckeditor.ckeditor')
<script src="{{ asset('admin/solution/js/create.js') }}"></script>
@endsection
    