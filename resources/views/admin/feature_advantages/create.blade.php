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
                                {{-- @foreach ($translation as $key => $item) --}}
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="1" role="tabpanel">
                                        <div class="card-body p-4">
                                            {{-- --------start --}}
                                            <div class="card-body p-4 row">
                                                {{-- ----------name Pages --}}
                                                <input type="hidden" name="category"
                                                    value="{{ Request()->category ?? '' }}">
                                                <input type="hidden" name="subcategory"
                                                    value="{{ Request()->subcategory ?? '' }}">
                                                {{-- <input type="hidden" name="item"
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

                                                <div class="">

                                                    <div id="input-template-file" class="input-temp-file"
                                                        style="display:none;">
                                                        <div class="col-md-12 mb-4 row">
                                                            <div class="col-md-10 row">
                                                                {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                            </x-admin.form.label-first> --}}
                                                                <div class="col-sm-4">
                                                                    <x-admin.form.input name="image[]" type="file"
                                                                        required="" placeholder="image"
                                                                        class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <x-admin.form.input
                                                                        name="{{ 'title' . '[' . $translationFirst->key . '][]' }}"
                                                                        type="text" required=""
                                                                        placeholder="title {{ $translationFirst->name }}"
                                                                        class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <x-admin.form.input
                                                                        name="{{ 'sub_title' . '[' . $translationFirst->key . '][]' }}"
                                                                        type="text" required=""
                                                                        placeholder="Sub title {{ $translationFirst->name }}"
                                                                        class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>
                                                                {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                            </x-admin.form.label-end> --}}
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-danger delete-input-file"> <i
                                                                        class="bx bxs-trash"></i>&nbsp;</button>
                                                            </div>
                                                        </div>
                                                        <!-- Add more input fields as needed -->

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id='inputs-container-file'>
                                                            <label>file</label>
                                                            <div id="input-template-file2" class="input-temp-file"
                                                                style="">
                                                                <div class="col-md-12 mb-4 row">
                                                                    <div class="col-md-10 row">
                                                                        {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                                </x-admin.form.label-first> --}}
                                                                        <div class="col-sm-4">
                                                                            <x-admin.form.input name="image[]"
                                                                                type="file" required=""
                                                                                placeholder="image"
                                                                                class="form-control valid">
                                                                            </x-admin.form.input>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <x-admin.form.input
                                                                                name="{{ 'title' . '[' . $translationFirst->key . '][]' }}"
                                                                                type="text" required=""
                                                                                placeholder="title {{ $translationFirst->name }}"
                                                                                class="form-control valid">
                                                                            </x-admin.form.input>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <x-admin.form.input
                                                                                name="{{ 'sub_title' . '[' . $translationFirst->key . '][]' }}"
                                                                                type="text" required=""
                                                                                placeholder="sub_title {{ $translationFirst->name }}"
                                                                                class="form-control valid">
                                                                            </x-admin.form.input>
                                                                        </div>
                                                                        {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                </x-admin.form.label-end> --}}
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="button"
                                                                            class="btn btn-danger delete-input-file"> <i
                                                                                class="bx bxs-trash "></i>&nbsp;</button>
                                                                    </div>
                                                                </div>
                                                                <!-- Add more input fields as needed -->

                                                            </div>
                                                        </div>
                                                        <button id="add-input-file" type="button"
                                                            class="col-sm-1 btn btn-success">
                                                            <i class='bx bx-plus'></i></i>&nbsp;</button>
                                                    </div>


                                                </div>
                                                {{-- @endif --}}



                                                {{-- ----------status end --}}

                                            </div>
                                            {{-- --------hatem --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- @endforeach --}}

                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <x-admin.form.submit type="submit"></x-admin.form.submit>
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
    <script src="{{ asset('admin/education/js/create.js') }}"></script>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to create a new input field
        function createInputField() {
            // Clone the template
            var template = document.getElementById("input-template").cloneNode(true);
            console.log(template);
            template.style.display = "block";
            template.removeAttribute('id');
            template.removeAttribute('style');
            //template.value = "";
            // Append the cloned template to the container
            document.getElementById("inputs-container").appendChild(template);
        }

        // Function to delete an input field
        function deleteInputField(btn) {
            btn.closest('.input-temp').remove();
        }

        // Add event listener for the "Add Input" button
        document.getElementById("add-input").addEventListener("click", function() {

            createInputField();
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
        function createInputField() {
            // Clone the template
            var template = document.getElementById("input-template-file").cloneNode(true);

            template.removeAttribute('id');
            template.removeAttribute('style');
            // Append the cloned template to the container
            document.getElementById("inputs-container-file").appendChild(template);
        }

        // Function to delete an input field
        function deleteInputField(btn) {
            btn.closest('.input-temp-file').remove();
        }

        // Add event listener for the "Add Input" button
        document.getElementById("add-input-file").addEventListener("click", function() {

            createInputField();
        });

        // Add event listener for dynamically added "Delete" buttons
        document.addEventListener("click", function(event) {
            if (event.target && event.target.classList.contains("delete-input-file")) {
                deleteInputField(event.target);
            }
        });
    });
</script>
