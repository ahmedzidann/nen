@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
@endsection
@section('cssadmin')

@endsection

@section('contentadmin')
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="Edit">
        </x-admin.customize-breadcrumb>
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
                                <a class="nav-link {{ $loop->first?'active':'' }}" data-bs-toggle="tab" href="#{{ $item->id }}" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> {{ ucfirst($item->name) }}</div>

                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <input type="hidden" id="key_new" value="{{ $translation->count() }}">
                        @foreach ($translation as $key=>$item)
                        <form method="post" id="myForm{{ $key }}" action="{{ $action??'' }}" enctype="multipart/form-data">
                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}" role="tabpanel">
                                    <div class="card-body p-4">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">
                                            {{-- ----------start static --}}
                                            <input type="hidden" name="category" value="{{ Request()->category ?? '' }}">
                                            {{-- ----------end static --}}
                                            {{-- ----------name first --}}

                                            <!-- Repeater Html Start -->
                                            <div id="repeater">
                                                <!-- Repeater Heading -->



                                                <!-- Repeater Items -->
                                                <div class="items" data-group="test">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- Repeater Content -->

                                                            <div class="repeater item-content row">
                                                                <br>
                                                                <div class="col-md-12 mb-2">
                                                                    <x-admin.form.label-first class="form-label" name="type  {{ $translationFirst->name }}">
                                                                    </x-admin.form.label-first>
                                                                     <select class="form-select" id="type" name="type" onchange="types()">
                                                                        <option disabled>Choose Type</option>
                                                                        @foreach ($getTypes as $key => $value)
                                                                        <option value="{{ $key }}" {{ ($StaticTable->type == $key) ? 'selected' : "" }}>{{ $value }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <x-admin.form.label-end name="please enter type  {{ $translationFirst->name }}">
                                                                    </x-admin.form.label-end>
                                                                </div>
                                                               


                                                            <div class="col-md-12 mb-2 url" id="link">
                                                                <x-admin.form.label-first class="form-label" name="url  {{ $translationFirst->name }}">
                                                                </x-admin.form.label-first>
                                                                <x-admin.form.input old="{{ 'url.' . $translationFirst->key }}" id="url" name="{{ 'url' . '[' . $translationFirst->key . ']' }}" type="search" placeholder="url {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate(
                                                                            'url',
                                                                            $translationFirst->key,
                                                                        )">
                                                                </x-admin.form.input>
                                                                <x-admin.form.label-end name="please enter url  {{ $translationFirst->name }}">
                                                                </x-admin.form.label-end>
                                                            </div>
                                                            
                                                            <div class="col-md-12 mb-2 upload" id="upload">
                                                                <x-admin.form.label-first class="form-label" name="upload  {{ $translationFirst->name  }}">
                                                                </x-admin.form.label-first>
                                                                <x-admin.form.input :model="$StaticTable" nameImage="firstFile" old="image" name="image" type="file" readonly="" placeholder="Please Enter Pdf" id="image" class="dropify" DataHeight="300">
                                                                </x-admin.form.input>
                                                                <x-admin.form.label-end name="please enter upload  {{ $translationFirst->name  }}">
                                                                </x-admin.form.label-end>
                                                                <a class="button" class="dropdown-item d-flex align-items-center" href="{{ route("admin.tabproject.archiveDownload",$StaticTable->id) }}"><span style="color:blue;font-weight:bold"><i class="bx bx-download fs-5"></i><span> Downloads</span></span></a>
                                                                <br>
                                                            </div>
                            

                                                        <div class="col-md-12 mb-2">
                                                            <x-admin.form.label-first class="form-label" name="title  {{ $translationFirst->name  }}">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.input old="{{ 'title.'.$translationFirst->key }}" name="{{ 'title'.'['.$translationFirst->key.']' }}" type="text" required="" placeholder="title {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate('title', $translationFirst->key)">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end name="please enter title  {{ $translationFirst->name  }}">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <x-admin.form.label-first class="form-label" name="description  {{ $translationFirst->name  }}">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.input old="{{ 'description.'.$translationFirst->key }}" name="{{ 'description'.'['.$translationFirst->key.']' }}" type="text" required="" placeholder="description {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate('description', $translationFirst->key)">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end name="please enter description  {{ $translationFirst->name  }}">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                    </div>
                                                    <!-- Repeater Remove Btn -->

                                                </div>
                                            </div>

                                        </div>




                                    </div>
                                    <!-- Repeater End -->

                                    {{-- ----------status end --}}


                                    <input type="hidden" name="submit2" value="{{ $item->key }}">
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
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--end row-->
</div>
</div>
@endsection
@section('jsadmin')
{{-- @include('admin.layouts.ckeditor.ckeditor')  --}}

<script src="{{ asset('admin/project/tabs/archive/js/edit.js') }}"></script>
@endsection
