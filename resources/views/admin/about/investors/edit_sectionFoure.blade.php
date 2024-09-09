@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate($viewTable . ' ' . $type))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="Edit"></x-admin.customize-breadcrumb>
            <!--end breadcrumb-->
            <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs') ?? '') }}</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-danger" role="tablist">
                                @foreach ($translation as $item)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            href="#{{ $item->id }}" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">
                                                    {{ TranslationHelper::translate(ucfirst('Profile') ?? '') }}
                                                    {{ ucfirst($item->name) }}</div>

                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <input type="hidden" id="key_new" value="{{ $translation->count() }}">
                            @foreach ($translation as $key => $item)
                                <form method="post" id="myForm{{ $key }}" action="{{ $action ?? '' }}"
                                    enctype="multipart/form-data">
                                    @include('components.admin.form.csrf')
                                    <div class="tab-content py-3">
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="{{ $item->id }}" role="tabpanel">
                                            <div class="card-body p-4">
                                                {{-- --------start --}}
                                                <div class="card-body p-4 row">
                                                    {{-- ----------start static --}}
                                                    <input type="hidden" name="pages_id"
                                                        value="{{ $SelectPages->id ?? '' }}">
                                                    <input type="hidden" name="category"
                                                        value="{{ Request()->category ?? '' }}">
                                                    <input type="hidden" name="subcategory"
                                                        value="{{ Request()->subcategory ?? '' }}">
                                                    <input type="hidden" name="item"
                                                        value="{{ Request()->item ?? '' }}">
                                                    {{-- ----------end static --}}
                                                    {{-- ----------first title --}}
                                                    <div class="col-md-6">
                                                        <x-admin.form.label-first class="form-label"
                                                            name="Title  {{ $item->name }}"></x-admin.form.label-first>
                                                        <x-admin.form.input id="title"
                                                            old="{{ 'title.' . $item->key }}"
                                                            name="{{ 'title' . '[' . $item->key . ']' }}" type="text"
                                                            required="" placeholder="Title {{ $item->name }}"
                                                            class="form-control valid" :value="$StaticTable->translate('title', $item->key)">
                                                        </x-admin.form.input>
                                                        <x-admin.form.label-end star="*"
                                                            name="please enter Title  {{ $item->name }}">
                                                        </x-admin.form.label-end>
                                                    </div>
                                                    {{-- ----------end title --}}

                                                    {{-- ----------first image --}}
                                                    @if ($loop->first)
                                                        {{-- ----------first url --}}
                                                        <div class="col-md-6">
                                                            <x-admin.form.label-first star="*" class="form-label"
                                                                name="url  {{ $item->name }}"></x-admin.form.label-first>
                                                            <x-admin.form.input id="url"
                                                                old="{{ 'url.' . $item->key }}" name="url"
                                                                type="text" required=""
                                                                placeholder="url {{ $item->name }}"
                                                                class="form-control valid" :value="$StaticTable->translate('url', $item->key)">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter url  {{ $item->name }}">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        {{-- ----------end url --}}
                                                        <div class="col-md-12">
                                                            <select name="cat" class="form-control">
                                                                <option selected="selected" disabled>Select
                                                                    Category</option>
                                                                <option value="1"
                                                                    {{ $StaticTable->category == 1 ? 'selected' : '' }}>
                                                                    subsidiaries</option>
                                                                <option
                                                                    value="2"{{ $StaticTable->category == 2 ? 'selected' : '' }}>
                                                                    Sister Companies</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 mb-4">

                                                            <h6>الصورة الابعاد (90 * 90)</h6>

                                                            <x-admin.form.label-first star="*"
                                                                class="col-sm-3 col-form-label" name="File Upload Image">
                                                            </x-admin.form.label-first>
                                                            <div class="col-sm-9">
                                                                <x-admin.form.input :model="$StaticTable"
                                                                    nameImage="StaticTable" old="image" name="image"
                                                                    type="file" readonly=""
                                                                    placeholder="Please Enter Image" id="image"
                                                                    class="dropify" DataHeight="300"
                                                                    accept=".jpg, .png, image/jpeg, image/png">
                                                                </x-admin.form.input>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- ----------end image --}}
                                                    {{-- ----------sort first --}}
                                                    @if ($loop->first)
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.label-first class="form-label" name="sort">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.input old="{{ 'sort' }}"
                                                                name="{{ 'sort' }}" type="number" required=""
                                                                placeholder="sort" class="form-control valid"
                                                                :value="$StaticTable->sort">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter sort">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                    @endif
                                                    {{-- ----------sort end --}}
                                                    @if ($loop->first)
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
                                                                                <x-admin.form.radio :checked="$StaticTable->status ==
                                                                                $status
                                                                                    ? 'checked'
                                                                                    : ''"
                                                                                    name="status"
                                                                                    value="{{ $status }}"
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
                                                        {{-- ----------status end --}}
                                                        <div id="sections-container">
                                                            <!-- Example of an existing section, populated with values in an edit view -->
                                                            @foreach ($StaticTable->investorAttributes as $k => $item)
                                                                <div class="section mb-3">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="number" class="form-control"
                                                                                name="attributes[{{ $k }}][since]"
                                                                                placeholder="Since"
                                                                                value="{{ $item->since }}">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="number" class="form-control"
                                                                                name="attributes[{{ $k }}][percent]"
                                                                                placeholder="Percent"
                                                                                value="{{ $item->percent }}">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select
                                                                                name="attributes[{{ $k }}][country_id]"
                                                                                class="form-control">
                                                                                <option disabled>Select
                                                                                    Country
                                                                                </option>
                                                                                @foreach ($countries as $country)
                                                                                    <option value="{{ $country->id }}"
                                                                                        {{ $item->country_id == $country->id ? 'selected' : '' }}>
                                                                                        {{ $country->translate('title', app()->getLocale()) }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <!-- Add more pre-filled sections as needed -->
                                                        </div>

                                                        <!-- Buttons to add or remove sections -->
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
                                                    @endif
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
                    {{--
                <input type="hidden" id="static_tables_id" value="{{ $StaticTable->id }}">
                            <div class="card p-4">
                                <h5 class="card-title">All Item</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bxs-plus-square"></i>Create</button>
                                    </div>
                                </div>
                       @include('admin.about.investors.modal.modal') --}}
                    {{-- <div class="card-body">
                        <div class="table-responsive">
                            <table id="yajra-datatable"
                                class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ TranslationHelper::translate(ucfirst('#')??'') }}</th>
                                        <th>{{ TranslationHelper::translate(ucfirst('since')??'') }}</th>
                                        <th>{{ TranslationHelper::translate(ucfirst('sharing')??'') }}</th>
                                        <th>{{ TranslationHelper::translate(ucfirst('image')??'') }}</th>
                                        <th>{{ TranslationHelper::translate(ucfirst('Processes')??'') }}</th>
                                    </tr>
                                </thead>

                                <tbody></tbody>
                            </table>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
        @include('admin.about.investors.modal.delete')
        <!--end row-->
    </div>
    </div>
@endsection
@section('jsadmin')
    @include('admin.layouts.ckeditor.ckeditor')
    {{-- <script src="{{ asset('admin/about/investors/many/js/index.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/about/investors/many/js/create.js') }}"></script> --}}
    <script src="{{ asset('admin/about/investors/js/edit.js') }}"></script>

    <script>
        //delete
        // hatem
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var detailsid = button.data('detailsid')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #detailsid').val(detailsid);
        })
    </script>
    <script>
        document.getElementById('add-section').addEventListener('click', function() {
            let sectionsContainer = document.getElementById('sections-container');
            let currentSectionCount = sectionsContainer.getElementsByClassName('section').length;

            let newSection = document.querySelector('.section').cloneNode(true);

            // Clear input values in the new section
            newSection.querySelectorAll('input, select').forEach((element, index) => {
                if (element.tagName.toLowerCase() === 'input') {
                    element.value = ''; // Clear input value
                } else if (element.tagName.toLowerCase() === 'select') {
                    element.selectedIndex = 0; // Reset select to the first option
                }
                element.name = element.name.replace(/\[\d+\]/,
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

        // Populate existing sections with the correct index when the page loads (for edit view)
        document.addEventListener('DOMContentLoaded', function() {
            let sectionsContainer = document.getElementById('sections-container');
            let sections = sectionsContainer.getElementsByClassName('section');

            Array.from(sections).forEach((section, index) => {
                section.querySelectorAll('input, select').forEach((element) => {
                    element.name = element.name.replace(/\[\d+\]/,
                        `[${index}]`); // Ensure the correct index is applied
                });
            });
        });
    </script>
@endsection
