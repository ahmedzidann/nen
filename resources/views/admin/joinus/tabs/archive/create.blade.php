@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace('-', ' ', ucfirst(TranslationHelper::translate($viewTable . ' ' . $type))) }}
@endsection
@section('cssadmin')
<style>
    .hr hr {
        border: 4px solid black;

        /* You can adjust the border properties */
        margin: 10px 0;
        /* Adjust the margin to control the spacing around the <hr> */
    }

</style>
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
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs') ?? '') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#{{ $translationFirst->id }}" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> {{ ucfirst($translationFirst->name) }}</div>

                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form method="post" id="myForm" action="{{ $action ?? '' }}" enctype="multipart/form-data">

                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="{{ $translationFirst->id }}" role="tabpanel">
                                    <div class="card-body p-4">

                                        <div class="card-body p-4 row">
                                            <input type="hidden" name="category" value="{{ Request()->category ?? '' }}">
                                            <input type="hidden" name="project_id" value="{{ Request()->project_id }}">
                                            <input type="hidden" name="tabs_id" value="{{ $tabs->id ?? '' }}">



                                            <!-- Repeater Items -->
                                            <div class="items" data-group="test">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="kt_repeater_1" class="repeater">
                                                            <div class="repeater-default" data-repeater-list="body">
                                                                <div class="row g-3" data-repeater-item>
                                                                    <div class="col-md-6 mb-2">
                                                                        <x-admin.form.label-first star="*" class="form-label" name="Title  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-first>
                                                                        <x-admin.form.input old="{{ 'title.' . $translationFirst->key }}" name="body[0][title]" type="text" placeholder="Title {{ ucfirst($translationFirst->name) }}" :value="$StaticTable->translate(
                                                                                                            'title',
                                                                                                            $translationFirst->key,
                                                                                                        )">
                                                                        </x-admin.form.input>
                                                                        <x-admin.form.label-end star="*" name="please enter Title  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-end>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <x-admin.form.label-first class="form-label" name="type  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-first>
                                                                        <select class="form-select selectedTypes" name="body[0][type]" id="type">
                                                                            <option disabled selected>Choose Type
                                                                            </option>
                                                                            @foreach ($getTypes as $key=>$item)
                                                                            <option value="{{ $key }}">{{ $item }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <x-admin.form.label-end name="please enter type  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-end>
                                                                    </div>
                                                                    <input name="body[0][url]" type="search" placeholder="url {{ $translationFirst->name }}" class="form-control valid col-12 " id="url">
                                                                    {{-- <x-admin.form.input  name="body[0][url]" type="search" placeholder="url {{ $translationFirst->name }}" class="form-control valid"> --}}
                                                                    {{--  <input name="body[0][image]" type="file" readonly="" placeholder="Please Enter file" id="image" class="dropify" DataHeight="300">  --}}
                                                                    {{-- test  --}}
                                                                    <x-admin.form.input :model="$StaticTable" nameImage="firstFile" old="image" name="body[0][image]" type="file" readonly="" placeholder="Please Enter Image" id="image" class="dropify" DataHeight="300" >
                                                                    </x-admin.form.input>
                                                                    {{-- end test  --}}
                                                                    <br><br>
                                                                    <div class="col-md-12 mb-2">
                                                                        <x-admin.form.label-first star="*" class="form-label" name="Description  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-first>
                                                                        <x-admin.form.text old="{{ 'description.' . $translationFirst->key }}" name="body[0][description]" :value="$StaticTable->translate(
                                                                            'description',
                                                                            $translationFirst->key,
                                                                        )">
                                                                        </x-admin.form.text>
                                                                        <x-admin.form.label-end star="*" name="please enter Description  {{ $translationFirst->name }}">
                                                                        </x-admin.form.label-end>
                                                                    </div>
                                                                    <div class='hr'>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-md font-weight-bolder btn-outline-danger">
                                                                            <i class="la la-close"></i>delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!-- Repeater Add Button -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <a href="javascript:;" data-repeater-create="" class="btn btn-md font-weight-bolder btn-outline-dark">
                                                                        <i class=" bx bx-plus-medical"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                    </div>
                                                </div>
                                            </div>
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
<!-- Add this in your HTML head section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-a4n5LfkiMDqQFm6LOACvYPgeH6fP8w+D9FKPec+Vr+Mq4+fxS0vdLvgp97/BfUSoZ1LmVi2CpZbBz6a32Jn+Qg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-MHrEKoiNs0FXZMk9P0jK9FSjk1g/1jnmUlFCvtNSmOsBwnVz0hk8ZtsoeTeC8eN2YyEtE17arRC/Ud+wU0fA4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="{{ asset('admin/project/tabs/archive/js/create.js') }}"></script>
@endsection
