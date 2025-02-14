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
            <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="Edit">
            </x-admin.customize-breadcrumb>
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
                                                <div class="tab-title"> {{ ucfirst($item->name) }}</div>

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

                                                    {{-- ----------Description first --}}
                                                    <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first star="*" class="form-label"
                                                            name="Description  {{ $item->name }}">
                                                        </x-admin.form.label-first>
                                                        <x-admin.form.text old="{{ 'description.' . $item->key }}"
                                                            name="{{ 'description' . '[' . $item->key . ']' }}"
                                                            type="text"
                                                            placeholder="Description {{ ucfirst($item->name) }}"
                                                            :value="$StaticTable->translate(
                                                                'description',
                                                                $item->key,
                                                            )">
                                                        </x-admin.form.text>
                                                        <x-admin.form.label-end star="*"
                                                            name="please enter Name  {{ $item->name }}">
                                                        </x-admin.form.label-end>
                                                    </div>
                                                    {{-- ----------Description end --}}

                                                    <input type="hidden" name="submit2" value="{{ $item->key }}">
                                                    <div class="col-md-12">
                                                        <div id='inputs-container-file-{{ $item->name }}'
                                                            class="inputs-container-file-{{ $item->name }}">
                                                            <label>file</label>
                                                            @if ($StaticTable->files->count())
                                                                @foreach ($StaticTable->files as $file)
                                                                    <div id="input-template-file" class="input-temp-file">
                                                                        <div class="col-md-12 mb-4 row">
                                                                            <div class="col-sm-4">
                                                                                <x-admin.form.input name="image[]"
                                                                                    type="file" required=""
                                                                                    placeholder="image"
                                                                                    class="form-control valid">
                                                                                </x-admin.form.input>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input type="hidden"
                                                                                    name="{{ 'file_id[' . $item->key . '][]' }}"
                                                                                    value="{{ $file->id }}">
                                                                                <x-admin.form.input
                                                                                    value="{{ $file->translate('title', $item->key) }}"
                                                                                    name="{{ 'title[' . $item->key . '][]' }}"
                                                                                    type="text" required=""
                                                                                    placeholder="{{ $item->name }} title"
                                                                                    class="form-control valid">
                                                                                </x-admin.form.input>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <x-admin.form.input
                                                                                    value="{{ $file->translate('sub_title', $item->key) }}"
                                                                                    name="{{ 'sub_title[' . $item->key . '][]' }}"
                                                                                    type="text" required=""
                                                                                    placeholder="{{ $item->name }} title"
                                                                                    class="form-control valid">
                                                                                </x-admin.form.input>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

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
    @include('admin.layouts.ckeditor.ckeditor')
    <script src="{{ asset('admin/education/js/edit.js') }}"></script>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to create a new input field

        function createInputFieldEnglish() {

            var template = document.getElementsByClassName("input-temp-english")[0].cloneNode(true);

            template.removeAttribute('id');
            template.removeAttribute('style');

            document.getElementsByClassName("inputs-container-english")[0].appendChild(template);
        }

        function createInputFieldArabic() {

            var template = document.getElementsByClassName("input-temp-arabic")[0].cloneNode(true);

            template.removeAttribute('id');
            template.removeAttribute('style');

            document.getElementsByClassName("inputs-container-arabic")[0].appendChild(template);
        }

        // Function to delete an input field
        function deleteInputField(btn) {
            btn.closest('.input-temp').remove();
        }

        // Add event listener for the "Add Input" button
        document.getElementById("add-input-arabic").addEventListener("click", function() {

            createInputFieldArabic();
        });

        document.getElementById("add-input-english").addEventListener("click", function() {

            createInputFieldEnglish();
        });

        // Add event listener for dynamically added "Delete" buttons
        document.addEventListener("click", function(event) {
            if (event.target && event.target.classList.contains("delete-input")) {
                deleteInputField(event.target);
            }
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to create a new input field
        function createInputFieldEnglish() {
            // Clone the template
            var template = document.getElementsByClassName("input-template-file-english")[0].cloneNode(true);
            console.log('d');
            template.removeAttribute('id');
            template.removeAttribute('style');
            // Append the cloned template to the container
            document.getElementsByClassName("inputs-container-file-english")[0].appendChild(template);
        }

        // Function to delete an input field
        function deleteInputField(btn) {
            btn.closest('.input-temp-file').remove();
        }

        // Add event listener for the "Add Input" button
        document.getElementById("add-input-file-english").addEventListener("click", function() {

            createInputFieldEnglish();
        });

        // Add event listener for dynamically added "Delete" buttons
        document.addEventListener("click", function(event) {
            if (event.target && event.target.classList.contains("delete-input-file")) {
                deleteInputField(event.target);
            }
        });
    });
</script>
