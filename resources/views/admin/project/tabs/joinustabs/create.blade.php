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
                                                {{-- ----------name first --}}
                                                <input type="hidden" name="project_id" value="{{ Request()->project_id }}">
                                                <input type="hidden" name="tabs_id" value="{{ $tabs->id ?? '' }}">
                                                <input type="hidden" name="type" value="">
                                                {{-- ----------Description first --}}
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Add Registers  {{ $translationFirst->name }}">
                                                </x-admin.form.label-first>
                                                <div id="register-container" class="col-md-12 mb-4">
                                                    <div class="input-group">
                                                        <div class="col-md-8 mb-4">
                                                            <input type="text" class="form-control"
                                                                name="register_attributes[][en]" placeholder="Enter text">
                                                        </div>
                                                        <div class="col-md-2 mb-4">
                                                            <button type="button" class="form-control btn btn-primary"
                                                                onclick="addRegisterInput()">+</button>
                                                        </div>
                                                        <div class="col-md-2 mb-4">
                                                            <button type="button" class="form-control btn btn-danger"
                                                                onclick="removeRegisterInput()">-</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Add Terms  {{ $translationFirst->name }}">
                                                </x-admin.form.label-first>
                                                <div id="terms-container" class="col-md-12 mb-4">
                                                    <div class="input-group">
                                                        <div class="col-md-8 mb-4">
                                                            <input type="text" class="form-control"
                                                                name="terms_attributes[][en]" placeholder="Enter text">
                                                        </div>
                                                        <div class="col-md-2 mb-4">
                                                            <button type="button" class="form-control btn btn-primary"
                                                                onclick="addTermsInput()">+</button>
                                                        </div>
                                                        <div class="col-md-2 mb-4">
                                                            <button type="button" class="form-control btn btn-danger"
                                                                onclick="removeTermsInput()">-</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
                                                        name="Register Description  {{ $translationFirst->name }}">
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
                                                        name="please enter Register Description  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------Description end --}}
                                                {{-- ----------first image --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                        name=" Register File Upload Image">
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <x-admin.form.input :model="$StaticTable" nameImage="JoinusTabs"
                                                            old="image" name="image" type="file" readonly=""
                                                            placeholder="Please Enter Image" id="image"
                                                            class="dropify" DataHeight="300"
                                                            accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end image --}}
                                                {{--  terms  --}}
                                                {{-- ----------Description second --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
                                                        name="Terms Description  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.text
                                                        old="{{ 'sub_description.' . $translationFirst->key }}"
                                                        name="{{ 'sub_description' . '[' . $translationFirst->key . ']' }}"
                                                        type="text"
                                                        placeholder="Terms {{ ucfirst($translationFirst->name) }}"
                                                        :value="$StaticTable->translate(
                                                            'sub_description',
                                                            $translationFirst->key,
                                                        )">
                                                    </x-admin.form.text>
                                                    <x-admin.form.label-end star="*"
                                                        name="please enter Terms Description  {{ $translationFirst->name }}">
                                                    </x-admin.form.label-end>
                                                </div>
                                                {{-- ----------Description end --}}
                                                {{-- ----------second image --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*"
                                                        class="col-sm-3 col-form-label" name=" Terms File Upload Image">
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <x-admin.form.input :model="$StaticTable" nameImage="JoinusTerms"
                                                            old="image2" name="image2" type="file" readonly=""
                                                            placeholder="Please Enter Image" id="image2"
                                                            class="dropify" DataHeight="300"
                                                            accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end image --}}
                                                {{--  end terms  --}}
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
    <script src="{{ asset('admin/project/tabs/joinus/js/create.js') }}"></script>
    <script>
        function addRegisterInput() {
            // Create a new div element for the input group
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group');

            // Create the input field container
            const inputContainer = document.createElement('div');
            inputContainer.classList.add('col-md-10', 'mb-4');

            // Create the new input field
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'register_attributes[][en]';
            newInput.classList.add('form-control');
            newInput.placeholder = 'Enter text';

            // Append the input to the input container
            inputContainer.appendChild(newInput);


            // Create the minus button container
            const minusButtonContainer = document.createElement('div');
            minusButtonContainer.classList.add('col-md-2', 'mb-4');

            // Create the new minus button
            const minusButton = document.createElement('button');
            minusButton.type = 'button';
            minusButton.classList.add('form-control');
            minusButton.textContent = '-';
            minusButton.onclick = removeRegisterInput;

            // Append the minus button to its container
            minusButtonContainer.appendChild(minusButton);

            // Append all elements to the new input group
            newInputGroup.appendChild(inputContainer);
            newInputGroup.appendChild(minusButtonContainer);

            // Append the new input group to the container
            document.getElementById('register-container').appendChild(newInputGroup);
        }

        function removeRegisterInput() {
            const container = document.getElementById('register-container');
            const inputGroups = container.getElementsByClassName('input-group');
            if (inputGroups.length > 1) {
                container.removeChild(inputGroups[inputGroups.length - 1]);
            }
        }

        function addTermsInput() {
            // Create a new div element for the input group
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group');

            // Create the input field container
            const inputContainer = document.createElement('div');
            inputContainer.classList.add('col-md-10', 'mb-4');

            // Create the new input field
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'terms_attributes[][en]';
            newInput.classList.add('form-control');
            newInput.placeholder = 'Enter text';

            // Append the input to the input container
            inputContainer.appendChild(newInput);


            // Create the minus button container
            const minusButtonContainer = document.createElement('div');
            minusButtonContainer.classList.add('col-md-2', 'mb-4');

            // Create the new minus button
            const minusButton = document.createElement('button');
            minusButton.type = 'button';
            minusButton.classList.add('form-control');
            minusButton.textContent = '-';
            minusButton.onclick = removeTermsInput;

            // Append the minus button to its container
            minusButtonContainer.appendChild(minusButton);

            // Append all elements to the new input group
            newInputGroup.appendChild(inputContainer);
            newInputGroup.appendChild(minusButtonContainer);

            // Append the new input group to the container
            document.getElementById('terms-container').appendChild(newInputGroup);
        }

        function removeTermsInput() {
            const container = document.getElementById('terms-container');
            const inputGroups = container.getElementsByClassName('input-group');
            if (inputGroups.length > 1) {
                container.removeChild(inputGroups[inputGroups.length - 1]);
            }
        }
    </script>
@endsection
