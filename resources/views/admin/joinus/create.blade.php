@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate($viewTable . ' ' . $type))) }}
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
                    <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs') ?? '') }}</h6>
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
                            <form method="post" id="myForm" action="{{ $action ?? '' }}" enctype="multipart/form-data">

                                @include('components.admin.form.csrf')
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="{{ $translationFirst->id }}" role="tabpanel">
                                        <div class="card-body p-4">
                                            {{-- --------start --}}
                                            <div class="card-body p-4 row">
                                                {{-- ----------name Pages --}}
                                                <input type="hidden" name="category"
                                                    value="{{ Request()->category ?? '' }}">
                                                {{-- ----------end Pages --}}
                                                {{-- ----------name Pages --}}
                                                @if ( empty(Request()->parent_id))
                                                    <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first class="form-label" name="Select Category">
                                                        </x-admin.form.label-first>
                                                        <x-admin.form.dropdown disabled="" required="" :foreach="$allPage"
                                                            name="pages_id" nameselect="Category" :model="$StaticTable">
                                                        </x-admin.form.dropdown>
                                                    </div>
                                                @endif
                                                {{-- ----------end Pages --}}
                                                {{-- ----------name tabs_id --}}
                                                {{-- <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="Select Tabs">
                                                </x-admin.form.label-first>
                                                <x-admin.form.dropdown disabled="" required="" :foreach="$allTabs"
                                                    name="tabs_id" nameselect="Tabs" :model="$StaticTable">
                                                </x-admin.form.dropdown>
                                            </div> --}}
                                                {{-- ----------end tabs_id --}}
                                                {{-- ----------name first --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
                                                        name="Title  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="{{ 'title.' . $translationFirst->key }}"
                                                        name="{{ 'title' . '[' . $translationFirst->key . ']' }}" type="text"
                                                        required="" placeholder="Title {{ $translationFirst->name }}"
                                                        class="form-control valid" :value="$StaticTable->translate(
                                                            'title',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end star="*"
                                                        name="please enter title  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>



                                                {{-- ----------name first --}}
                                                {{-- ----------Description first --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
                                                        name="Description  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.text old="{{ 'description.' . $translationFirst->key }}"
                                                        name="{{ 'description' . '[' . $translationFirst->key . ']' }}"
                                                        type="text"
                                                        placeholder="Description {{ ucfirst($translationFirst->name) }}"
                                                        :value="$StaticTable->translate(
                                                            'description',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.text>
                                                    <x-admin.form.label-end star="*"
                                                        name="please enter Description  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------Description end --}}
                                                {{-- ----------first image --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                        name="File Upload Image">
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <x-admin.form.input :model="$StaticTable" nameImage="Project"
                                                            old="image" name="image" type="file" readonly=""
                                                            placeholder="Please Enter Image" id="image" class="dropify"
                                                            DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end image --}}
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
                                                                        <x-admin.form.radio :checked="$StaticTable->status == $status
                                                                            ? 'checked'
                                                                            : ''" name="status"
                                                                            value="{{ $status }}" :model="$StaticTable">
                                                                        </x-admin.form.radio>
                                                                        <label class="form-check-label"
                                                                            for="bsValidation6">{{ $status }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(request()->parent_id)
                                             <div class="col-md-6 mb-4">
                                                    <x-admin.form.label-first class="form-label" name="main or branch">
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="form-check">
                                                                <div class="form-check">
                                                                    <x-admin.form.radio :checked="$StaticTable->type == 'main'
                                                                        ? ''
                                                                        : ''"
                                                                        name="type" value="main"
                                                                        :model="$StaticTable">
                                                                    </x-admin.form.radio>
                                                                    <label class="form-check-label"
                                                                        for="bsValidation6">mainly</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <x-admin.form.radio :checked="$StaticTable->type == 'sub_main'
                                                                        ? 'checked'
                                                                        : 'checked'"
                                                                        name="type" value="sub_main"
                                                                        :model="$StaticTable">
                                                                    </x-admin.form.radio>
                                                                    <label class="form-check-label"
                                                                        for="bsValidation6">branch</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first class="form-label" name="Select main titles">
                                                        </x-admin.form.label-first>
                                                        <x-admin.form.dropdown disabled="" required="" :foreach="$main_titles"
                                                            name="main_title_id" nameselect="Main Title" :model="$StaticTable">
                                                        </x-admin.form.dropdown>
                                                    </div>
                                                 @endif
                                                <input  type="hidden" name="parent_id" value="{{request()->parent_id}}">
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="" class="form-label"
                                                        name="video">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="video"
                                                        name="video" type="text"
                                                         placeholder="video"
                                                        class="form-control valid" :value="$StaticTable->translate(
                                                            'title',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end star="*"
                                                        name="please enter video">
                                                    </x-admin.form.label-end>
                                                </div>

                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="" class="form-label"
                                                        name="sort">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="sort"
                                                        name="sort" type="text"
                                                         placeholder="sort"
                                                        class="form-control valid" :value="$StaticTable->sort">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end star=""
                                                        name="please enter sort">
                                                    </x-admin.form.label-end>
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
    <script src="{{ asset('admin/joinus/js/create.js') }}"></script>
@endsection
