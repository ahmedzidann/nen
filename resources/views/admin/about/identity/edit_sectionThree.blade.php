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
                                                    <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first star="*" class="form-label"
                                                            name="Title  {{ $translationFirst->name }}">
                                                        </x-admin.form.label-first>
                                                        <x-admin.form.input old="{{ 'title.' . $translationFirst->key }}"
                                                            name="{{ 'title' . '[' . $item->key . ']' }}" type="text"
                                                            required=""
                                                            placeholder="Title {{ $translationFirst->name }}"
                                                            class="form-control valid" :value="$StaticTable->translate(
                                                                'title',
                                                                $translationFirst->key,
                                                            )">
                                                        </x-admin.form.input>
                                                        <x-admin.form.label-end star="*"
                                                            name="please enter title  {{ $translationFirst->name }}">
                                                        </x-admin.form.label-end>
                                                    </div>

                                                    @foreach ($StaticTable->identityAttributes as $attribute)
                                                        <div class="@if ($loop->first) input-container @endif"
                                                            data-lang="{{ $item->key }}" class="col-md-12 mb-4">
                                                            <div class="input-group">
                                                                <div class=" col-md-10   mb-4">
                                                                    <input type="text" class="form-control"
                                                                        name="attributes[][{{ $item->key }}]"
                                                                        value="{{ $attribute->translate('content', $translationFirst->key) }}"
                                                                        placeholder="Enter text">
                                                                    <input type="hidden" class="form-control"
                                                                        name="keys[]" value="{{ $attribute->id }}"
                                                                        placeholder="Enter text">
                                                                </div>
                                                                <div class="col-md-2 mb-4">
                                                                    <button type="button"
                                                                        class="form-control elem_{{ $attribute->id }}"
                                                                        onclick="removeGroup('elem_{{ $attribute->id }}')">-</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div id="input-container" class="col-md-12 mb-4">
                                                        <div class="input-group new-chiled">
                                                            <div class="col-md-8 mb-4">
                                                                <input type="text" class="form-control"
                                                                    name="attributes[][{{$item->key}}]" placeholder="Enter text">
                                                            </div>
                                                            <div class="col-md-2 mb-4">
                                                                <button type="button" class="form-control"
                                                                    onclick="addInput()">+</button>
                                                            </div>
                                                            <div class="col-md-2 mb-4">
                                                                <button type="button" class="form-control"
                                                                    onclick="removeInput()">-</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    {{-- ----------sort first --}}
                                                    @if (Request()->category == 'about' && Request()->subcategory == 'identity' && Request()->item == 'section-one')
                                                    @else
                                                        @if ($loop->first)
                                                            <div class="col-md-12 mb-4">
                                                                <x-admin.form.label-first class="form-label"
                                                                    name="sort">
                                                                </x-admin.form.label-first>
                                                                <x-admin.form.input old="{{ 'sort' }}"
                                                                    name="{{ 'sort' }}" type="number"
                                                                    required="" placeholder="sort"
                                                                    class="form-control valid" :value="$StaticTable->sort">
                                                                </x-admin.form.input>
                                                                <x-admin.form.label-end star="*"
                                                                    name="please enter sort">
                                                                </x-admin.form.label-end>
                                                            </div>
                                                            <div class="col-md-12 mb-4">
                                                                <h6>مقاس الصورة (350 * 350)</h6>

                                                                <x-admin.form.label-first star="*"
                                                                    class="col-sm-3 col-form-label"
                                                                    name="File Upload Image">
                                                                </x-admin.form.label-first>
                                                                <div class="col-sm-9">
                                                                    <x-admin.form.input :model="$StaticTable"
                                                                        nameImage="StaticTable" old="image"
                                                                        name="image" type="file" readonly=""
                                                                        placeholder="Please Enter Image" id="image"
                                                                        class="dropify" DataHeight="300"
                                                                        accept=".jpg, .png, image/jpeg, image/png">
                                                                    </x-admin.form.input>
                                                                </div>
                                                            </div>
                                                        @endif
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
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
@section('jsadmin')
    <script>
        function addInput() {
            // Create a new div element for the input group
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group');

            // Create the input field container
            const inputContainer = document.createElement('div');
            inputContainer.classList.add('col-md-10', 'mb-4');

            // Create the new input field
            const newInput = document.createElement('input');
            newInput.type = 'text';
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
            minusButton.onclick = removeInput;

            // Append the minus button to its container
            minusButtonContainer.appendChild(minusButton);

            // Append all elements to the new input group
            newInputGroup.appendChild(inputContainer);
            newInputGroup.appendChild(minusButtonContainer);

            // Append the new input group to all language-specific containers
            const translations = @json($translation);
            const containers = document.querySelectorAll('.new-chiled');
            containers.forEach((container, index) => {
                const language = translations[index].key;
                const clonedInputGroup = newInputGroup.cloneNode(true);
                clonedInputGroup.querySelector('input').name = `attributes[][${language}]`;
                container.appendChild(clonedInputGroup);
            });
        }

        function removeInput() {
            // Target all containers with the class 'new-chiled' across all languages
            document.querySelectorAll('.new-chiled').forEach(container => {
                const inputGroups = container.getElementsByClassName('input-group');
                if (inputGroups.length > 1) {
                    container.removeChild(inputGroups[inputGroups.length - 1]);
                }
            });
        }


        function removeGroup(elementClass) {
            const elements = document.querySelectorAll('.' + elementClass);
            elements.forEach(element => {
                const inputGroup = element.closest('.input-group');
                if (inputGroup) {
                    inputGroup.remove();
                }
            });
        }
    </script>
    <script src="{{ asset('admin/about/identity/js/edit.js') }}"></script>
    @include('admin.layouts.ckeditor.ckeditor')
@endsection
