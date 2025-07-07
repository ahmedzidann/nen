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
                                                <input type="hidden" name="pages_id" value="{{ $SelectPages->id ?? '' }}">
                                                <input type="hidden" name="category"
                                                    value="{{ Request()->category ?? '' }}">
                                                <input type="hidden" name="subcategory"
                                                    value="{{ Request()->subcategory ?? '' }}">
                                                <input type="hidden" name="item" value="{{ Request()->item ?? '' }}">
                                                {{-- ----------end Pages --}}
                                                {{-- ----------first title --}}
                                                <div class="col-md-6 mb-4">
                                                    <x-admin.form.label-first class="form-label"
                                                        name="Title  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="{{ 'title.' . $translationFirst->key }}"
                                                        name="{{ 'title' . '[' . $translationFirst->key . ']' }}"
                                                        type="text" required=""
                                                        placeholder="Title {{ $translationFirst->name }}"
                                                        class="form-control valid" :value="$StaticTable->translate(
                                                            'title',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end
                                                        name="please enter title  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------first title --}}
                                                {{-- ----------start url --}}
                                                <div class="col-md-6 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
                                                        name="url  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="{{ 'url.' . $translationFirst->key }}"
                                                        name="{{ 'url' . '[' . $translationFirst->key . ']' }}"
                                                        type="text" required=""
                                                        placeholder="url {{ $translationFirst->name }}"
                                                        class="form-control valid" :value="$StaticTable->translate(
                                                            'url',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end star="*"
                                                        name="please enter url  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------end url --}}
                                                <div class="col-md-12">
                                                    <select name="category" class="form-control">
                                                        <option selected="selected" disabled>Select
                                                            Category</option>
                                                        <option value="1">subsidiaries</option>
                                                        <option value="2">Sister Companies</option>
                                                    </select>
                                                </div>
                                                {{-- ----------first image --}}
                                                <div class="col-md-12 mb-4">(90*90)                                                    
                                                    <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                        name="File Upload Image"> 
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <x-admin.form.input :model="$StaticTable" nameImage="StaticTable"
                                                            old="image" name="image" type="file" readonly=""
                                                            placeholder="Please Enter Image" id="image" class="dropify"
                                                            DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end image --}}
                                                {{-- ----------sort first --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first class="form-label" name="sort">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.input old="{{ 'sort' }}"
                                                        name="{{ 'sort' }}" type="number" required=""
                                                        placeholder="sort" class="form-control valid" :value="$StaticTable->sort">
                                                    </x-admin.form.input>
                                                    <x-admin.form.label-end star="*" name="please enter sort">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------sort end --}}
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
                                                                            : ''"
                                                                            name="status" value="{{ $status }}"
                                                                            :model="$StaticTable">
                                                                        </x-admin.form.radio>
                                                                        <label class="form-check-label"
                                                                            for="bsValidation6">{{ $status }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container mt-5">
                                                    <div id="sections-container">
                                                        <div class="section mb-3">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <input type="number" class="form-control"
                                                                        name="attributes[0][since]" placeholder="Since">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="number" class="form-control"
                                                                        name="attributes[0][percent]"
                                                                        placeholder="Percent">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="attributes[0][country_id]"
                                                                        class="form-control">
                                                                        <option selected="selected" disabled>Select Country
                                                                        </option>
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}">
                                                                                {{ $country->translate('title', app()->getLocale()) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-2">
                                                            <button type="button" id="add-section"
                                                                class="form-control btn btn-success">+</button>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" id="remove-section"
                                                                class="form-control btn btn-danger"><i class="bx bxs-trash"></i></button>
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
    <script src="{{ asset('admin/about/investors/js/create.js') }}"></script>
    <script>
        document.getElementById('add-section').addEventListener('click', function() {
            let sectionsContainer = document.getElementById('sections-container');
            let currentSectionCount = sectionsContainer.getElementsByClassName('section').length;

            let newSection = document.querySelector('.section').cloneNode(true);

            // Clear input values in the new section
            newSection.querySelectorAll('input, select').forEach((input, index) => {
                input.value = '';
                input.name = input.name.replace(/\[\d+\]/,
                    `[${currentSectionCount}]`); // Update the name index
            });

            sectionsContainer.appendChild(newSection);
        });

        document.getElementById('remove-section').addEventListener('click', function() {
            let sectionsContainer = document.getElementById('sections-container');
            if (sectionsContainer.children.length > 1) {
                sectionsContainer.removeChild(sectionsContainer.lastElementChild);
            }
        });
    </script>
@endsection
