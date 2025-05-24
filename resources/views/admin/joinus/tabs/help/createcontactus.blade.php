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
                                            {{-- ----------name Pages --}}
                                            <input type="hidden" name="category"
                                                value="{{ Request()->category ?? '' }}">
                                            <input type="hidden" name="type" value="contactus">
                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <input type="hidden" name="project_id" value="{{ Request()->project_id }}">
                                            <input type="hidden" name="tabs_id" value="{{ $tabs->id??'' }}">
                                            {{-- ----------name first --}}
                                            {{-- ----------email first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="email">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'email' }}" name="{{ 'email' }}"
                                                    type="email" required="" placeholder="email"
                                                    class="form-control valid" :value="$StaticTable->email">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter email">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------email end --}}
                                            {{-- ----------phone first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="phone">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'phone' }}" name="{{ 'phone' }}"
                                                    type="number" required="" placeholder="phone"
                                                    class="form-control valid" :value="$StaticTable->phone">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter phone">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------phone end --}}
                                            {{-- ----------first image--}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="HelpTabs"
                                                        old="image" name="image" type="file" readonly=""
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            {{-- ----------end image--}}
                                            {{-- ----------status first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Checked switch checkbox status">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::STATUS as $status)
                                                            <div class="form-check">
                                                                <x-admin.form.radio
                                                                    :checked="$StaticTable->status==$status?'checked':''"
                                                                    name="status" value="{{ $status }}"
                                                                    :model="$StaticTable">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $status }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- ----------status end --}}
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
<script src="{{ asset('admin/project/tabs/help/js/create.js') }}"></script>
@endsection