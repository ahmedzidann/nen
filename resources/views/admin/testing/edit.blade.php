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
                                                        value="{{ $StaticTable->pages_id ?? '' }}">
                                                    <input type="hidden" name="category"
                                                        value="{{ Request()->category ?? '' }}">
                                                    <input type="hidden" name="subcategory"
                                                        value="{{ Request()->subcategory ?? '' }}">
                                                    <input type="hidden" name="item"
                                                        value="{{ Request()->item ?? '' }}">
                                                    {{-- ----------end static --}}
                                                    {{-- ----------name Pages --}}

                                                    {{-- @if ($loop->first)
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.label-first class="form-label"
                                                                name="Select Pages">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.dropdown required="" :foreach="$allPage"
                                                                name="pages_id" nameselect="pages" :model="$StaticTable">
                                                            </x-admin.form.dropdown>
                                                        </div>
                                                    @endif --}}
                                                    {{-- ----------end Pages --}}
                                                    {{-- ----------name first --}}

                                                    <div class="col-md-12 mb-4">
                                                   <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Section Design')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="section_id"
                                                    data-placeholder="Choose Category" name="section_id">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select design_section')) }}
                                                    </option>
                                                    @foreach ($sections as $section)
                                                        
                                                        <option value="{{ $section->id }}"
                                                            {{  $StaticTable->section_id== $section->id ?'selected':""  }}>
                                                            {{ $section->title }}</option>
                                                    @endforeach
                                                </select> 
                                                  </div>
                                                    <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first star="*" class="form-label"
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
                                                    <div class="form-group col-md-12">
                                                        <label for="mini_desc_{{ $item->key }}">Mini Description in
                                                            {{ ucfirst($item->name) }}</label>
                                                        <textarea class="form-control" id="mini_desc_{{ $item->key }}" name="mini_desc[{{ $item->key }}]"
                                                            rows="3">{{ old('mini_desc.' . $item->key, $StaticTable->getTranslation('mini_desc', $item->key)) }}</textarea>
                                                    </div>
                                                    {{-- ----------name first --}}
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
                                                     <div class="col-md-6 mb-4">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">Title First Button
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                              <input type="text" name="{{'first_button' . '[' . $item->key . ']' }}" value="{{$StaticTable->getTranslation('first_button', $item->key)}}" class="form-control"/>
                                            </div>

                                            

                                            <div class="col-md-6 mb-4">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">Title second Button
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                              <input type="text" name="{{'second_button' . '[' . $item->key . ']' }}" value="{{$StaticTable->getTranslation('second_button', $item->key)}}" class="form-control"/>
                                            </div>


                                                    {{-- ----------Description end --}}
                                                    {{-- ----------first image --}}
                                                    @if ($loop->first)


                                                    <div class="col-md-6 mb-4">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">URl Second Button
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <input type="url" name="url_second_button" value="{{$StaticTable->url_second_button }}" class="form-control"/>
                                               </div>

                                                <div class="col-md-6 mb-4">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">URl First Button
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                              <input type="url" name="url_first_button" value="{{$StaticTable->url_first_button }}" class="form-control"/>
                                            </div>
                                                        <div class="col-md-9 mb-4">
                                                            <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                                name="File Upload Image">
                                                            </x-admin.form.label-first>
                                                            <div class="col-sm-9">
                                                                <x-admin.form.input :model="$StaticTable" nameImage="Testing"
                                                                    old="image" name="image" type="file"
                                                                    readonly="" placeholder="Please Enter Image"
                                                                    id="image" class="dropify" DataHeight="300"
                                                                    accept=".jpg, .png, image/jpeg, image/png">
                                                                </x-admin.form.input>
                                                            </div>
                                                        </div>

                                                    
                                                    @endif
                                                    {{-- ----------end image --}}
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
                                                        <div class="col-md-6 mb-4">
                                                            <x-admin.form.label-first class="form-label"
                                                                name="SHow In Home">
                                                            </x-admin.form.label-first>
                                                            <div class="col-sm-9">
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <div class="form-check">
                                                                        <div class="form-check">
                                                                            <x-admin.form.radio :checked="$StaticTable->show_in_home ==
                                                                            true
                                                                                ? 'checked'
                                                                                : ''"
                                                                                name="show_in_home" value="1"
                                                                                :model="$StaticTable">
                                                                            </x-admin.form.radio>
                                                                            <label class="form-check-label"
                                                                                for="bsValidation6">yes</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <x-admin.form.radio :checked="$StaticTable->show_in_home ==
                                                                            false
                                                                                ? 'checked'
                                                                                : ''"
                                                                                name="show_in_home" value="0"
                                                                                :model="$StaticTable">
                                                                            </x-admin.form.radio>
                                                                            <label class="form-check-label"
                                                                                for="bsValidation6">no</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
    function delete_link(button) {
        // Access the link-id attribute
        var linkId = button.getAttribute('link-id');
        var url = '{{ route('admin.testing.delete.link', ':link_id') }}';
        url = url.replace(':link_id', linkId);
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Failed to delete the link. Please try again.');
            }
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Function to create a new input field
        function createInputField() {
            // Clone the template
            var template = document.getElementById("input-template").cloneNode(true);

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
