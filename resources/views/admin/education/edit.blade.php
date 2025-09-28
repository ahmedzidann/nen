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
                                            {{-- ----------name Pages --}}
                                            @if ($loop->first)
                                               <div class="col-md-12 mb-4">
                                         <x-admin.form.label-first class="form-label" name="Type">
                                                </x-admin.form.label-first>
                                                <select name="type" class="form-control">
                                                <option value="cards" {{  $StaticTable->type == 'cards' ? 'selected' : ''  }}> cards</option>
                                                <option value="faqs"{{  $StaticTable->type == 'faqs' ? 'selected' : ''  }}> faqs</option>

                                                </select>
                                             </div>
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Select Pages">
                                                </x-admin.form.label-first>
                                                <x-admin.form.dropdown required="" :foreach="$allPage"
                                                    name="pages_id" nameselect="pages" :model="$StaticTable">
                                                </x-admin.form.dropdown>
                                            </div>
                                            @endif
                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="{{ $item->name }} title"></x-admin.form.label-first>
                                                <x-admin.form.input id="title" old="{{ 'title.' . $item->key }}"
                                                    name="{{ 'title' . '[' . $item->key . ']' }}" type="text"
                                                    required="" placeholder="{{ $item->name }} title"
                                                    class="form-control valid" :value="$StaticTable->translate('title', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Title  {{ $item->name }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ------hours ---- --}}

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name=" Hours"></x-admin.form.label-first>
                                                <x-admin.form.input id="hours" old="hours"
                                                    name="hours" type="text"
                                                    required="" placeholder=""
                                                    class="form-control valid" :value="$StaticTable->hours">
                                                </x-admin.form.input>

                                            </div>

                                            {{-- ------Price ---- --}}

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name=" Hours"></x-admin.form.label-first>
                                                <x-admin.form.input id="price" old="price"
                                                    name="price" type="text"
                                                    required="" placeholder=""
                                                    class="form-control valid" :value="$StaticTable->price">
                                                </x-admin.form.input>

                                            </div>

                                            {{-- ----------name first --}}
                                            <div class="form-group col-md-12">
                                                <label for="mini_desc_{{ $item->key }}">Mini Description in
                                                    {{ ucfirst($item->name) }}</label>
                                                <textarea class="form-control" id="mini_desc_{{ $item->key }}" name="mini_desc[{{ $item->key }}]"
                                                    rows="3">{{ old('mini_desc.' . $item->key, $StaticTable->getTranslation('mini_desc', $item->key)) }}</textarea>
                                            </div>
                                            {{-- ----------Description first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Description  {{ $item->name }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.text old="{{ 'description.' . $item->key }}"
                                                    name="{{ 'description' . '[' . $item->key . ']' }}" type="text"
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
                                            {{-- ----------first image --}}
                                            @if ($loop->first)
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="Education"
                                                        old="image" name="image" type="file"
                                                        readonly="" placeholder="Please Enter Image"
                                                        id="image" class="dropify" DataHeight="300"
                                                        accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4">
    <x-admin.form.label-first class="col-sm-3 col-form-label" name="Material" />
    <div class="col-sm-9">
        <x-admin.form.input 
            :model="$StaticTable" 
            nameImage="material"
            old="material" 
            name="material" 
            type="file" 
            readonly=""
            placeholder="Please Enter File" 
            id="material" 
            class="dropify"
            DataHeight="300" 
            accept=".pdf"
            data-default-file="{{ asset('storage/education/' . ($StaticTable->material ?? '#')) }}">
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

                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="SHow In Home">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <div class="form-check">
                                                                <x-admin.form.radio :checked="$StaticTable->show_in_home == true
                                                                            ? 'checked'
                                                                            : ''"
                                                                    name="show_in_home" value="1"
                                                                    :model="$StaticTable">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label"
                                                                    for="bsValidation6">yes</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <x-admin.form.radio :checked="$StaticTable->show_in_home == false
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
                                            {{-- ----------status end --}}
                                            @endif
                                            <div id="input-template"
                                                class="input-temp input-temp-{{ $item->name }}"
                                                style="display:none;">
                                                <div class="col-md-12 mb-4 row">
                                                    <div class="col-md-10 row">
                                                        {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                        </x-admin.form.label-first> --}}
                                                        <div class="col-sm-8">
                                                            <x-admin.form.input name="links[]" type="text"
                                                                required="" placeholder="links"
                                                                class="form-control valid">
                                                            </x-admin.form.input>
                                                        </div>
                                                        <div class="col-sm-4">

                                                            <x-admin.form.input
                                                                name="{{ 'links_title' . '[' . $translationFirst->key . '][]' }}"
                                                                type="text" required=""
                                                                placeholder="{{ $item->name }} title"
                                                                class="form-control valid">
                                                            </x-admin.form.input>
                                                        </div>
                                                        {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                        </x-admin.form.label-end> --}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger delete-input"
                                                            style="">
                                                            <i class="bx bxs-trash"></i>&nbsp;</button>
                                                    </div>
                                                </div>
                                                <!-- Add more input fields as needed -->

                                            </div>
                                            <div class=" mb-4">
                                                <div class="col-md-12">
                                                    <div id='inputs-container'
                                                        class="inputs-container-{{ $item->name }}">
                                                        <label>links</label>
                                                        {{-- @dd($StaticTable) --}}
                                                        @if ($StaticTable->links->count())
                                                        @foreach ($StaticTable->links as $link)
                                                        <div id="input-template" class="input-temp"
                                                            style="">
                                                            <div class="col-md-12 mb-4 row">
                                                                <div class="col-md-10 row">
                                                                    {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                                    </x-admin.form.label-first> --}}
                                                                    <div class="col-sm-8">
                                                                        <input
                                                                            value='{{ $link->reference }}'
                                                                            name="links[]" type="text"
                                                                            required=""
                                                                            placeholder="links"
                                                                            class="form-control valid">
                                                                        {{-- </input> --}}
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="hidden"
                                                                            name="{{ 'link_id[' . $item->key . '][]' }}"
                                                                            value="{{ $link->id }}">

                                                                        <x-admin.form.input
                                                                            value="{{ $link->translate('title', $item->key) }}"
                                                                            name="{{ 'links_title[' . $item->key . '][]' }}"
                                                                            type="text" required=""
                                                                            placeholder="{{ $item->name }} title"
                                                                            class="form-control valid">
                                                                        </x-admin.form.input>
                                                                    </div>
                                                                    {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                    </x-admin.form.label-end> --}}
                                                                </div>
                                                                <div class="col-md-2">
                                                                    {{-- <button type="button" class="btn btn-danger delete-input" style="">
                                                                         <i class="bx bxs-trash"></i>&nbsp;</button> --}}
                                                                </div>
                                                            </div>
                                                            <!-- Add more input fields as needed -->

                                                        </div>
                                                        @endforeach
                                                        @else
                                                        @endif
                                                    </div>

                                                    <!-- <button id="add-input-{{ $item->name }}" type="button"
                                                        class="col-sm-1 btn btn-success">
                                                        <i class='bx bx-plus'></i>&nbsp;
                                                    </button> -->

                                                </div>

                                                <div id="input-template-file"
                                                    class="input-template-file-{{ $item->name }} input-temp-file"
                                                    style="display:none;">
                                                    <div class="col-md-12 mb-4 row">
                                                        <div class="col-md-10 row">
                                                            {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                            </x-admin.form.label-first> --}}
                                                            <div class="col-sm-8">
                                                                <x-admin.form.input name="file[]" type="file"
                                                                    required="" placeholder="file"
                                                                    class="form-control valid">
                                                                </x-admin.form.input>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <x-admin.form.input
                                                                    name="{{ 'file_title' . '[' . $translationFirst->key . '][]' }}"
                                                                    type="text" required=""
                                                                    placeholder="title {{ $translationFirst->name }}"
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
                                                    <div id='inputs-container-file-{{ $item->name }}'
                                                        class="inputs-container-file-{{ $item->name }}">
                                                        <label>file</label>
                                                        @if ($StaticTable->files->count())
                                                        @foreach ($StaticTable->files as $file)
                                                        <div id="input-template-file"
                                                            class="input-temp-file" style="">
                                                            <div class="col-md-10 mb-4 row">
                                                                <div class="col-md-12 row">

                                                                    <div class="col-sm-8">
                                                                        <x-admin.form.input name="file[]" value="{{storage_path('education').$file->file}}" type="file" required="" placeholder="file" class="form-control valid">
                                                                        </x-admin.form.input>


                                                                        <a href="{{ url('storage/education/' . $file->file) }}"
                                                                            class="btn btn-success donload-input-file"
                                                                            download> <i
                                                                                class="bx bxs-download"></i>&nbsp;</a>

                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <input type="hidden"
                                                                            name="file_id[]"
                                                                            value="{{ $file->id }}">
                                                                        <x-admin.form.input
                                                                            value="{{ $file->translate('title', $item->key) }}"
                                                                            name="{{ 'file_title[' . $item->key . '][]' }}"
                                                                            type="text" required=""
                                                                            placeholder="{{ $item->name }} title"
                                                                            class="form-control valid">
                                                                        </x-admin.form.input>
                                                                    </div>
                                                                    {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                </x-admin.form.label-end> --}}
                                                                </div>
                                                                <div class="col-md-2">
                                                                    {{-- <button type="button" class="btn btn-danger delete-input-file">
                                                                     <i class="bx bxs-trash"></i>&nbsp;
                                                                    </button> --}}
                                                                </div>
                                                            </div>
                                                            <!-- Add more input fields as needed -->

                                                        </div>
                                                        @endforeach
                                                        @else
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">

                                                        <h3>Registered Countries</h3>
                                                        <table class="table table-bordered" id="table-country2">
                                                            <thead style="background-color: gray;">
                                                                <th style="width: 10%;"> #</th>
                                                                <th class="text-center" style="width: 30%;"> Country</th>
                                                                <th class="text-center" style="width: 50%;"> Url </th>
                                                                <th class="text-center" style="width: 10%;"> Action </th>

                                                            </thead>
                                                            <tbody class="table-country">

                                                                @php
                                                                $x= 1 ;
                                                                @endphp

                                                                @if(isset($StaticTable->country_register) && !empty($StaticTable->country_register))
                                                               

                                                                @foreach($StaticTable->country_register as $country)



                                                                <tr id="row{{$x}}">
                                                                    <td>{{$x}}</td>
                                                                    <td><select class="form-control" name="country[]">
                                                                            @foreach ($countries as $row)
                                                                            <option value="{{ $row->id }}" {{ $row->id == $country->id ? 'selected' : '' }}>
                                                                                {{ $row->title }}
                                                                                @endforeach

                                                                        </select></td>
                                                                    <td> <input type="url" value="{{ $country->pivot->url}}" name="url[]" class="form-control" /></td>
                                                                    <td> <button type="button" onclick="delete_row({{$x}})"
                                                                            class="btn btn-danger">
                                                                            <i class="bx bxs-trash"></i>&nbsp;</button></td>


                                                                </tr>
                                                                @php
                                                                $x++ ; ;
                                                                @endphp
                                                                @endforeach
                                                                @endif

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>




                                                                    <td colspan="3"> <button id="" onclick="add_row();" type="button"
                                                                            class="col-sm-1 btn btn-success">
                                                                            <i class='bx bx-plus'></i></i>&nbsp;
                                                                        </button></td>

                                                                </tr>


                                                            </tfoot>




                                                        </table>
                                                    </div>
                                                </div>


                                            </div>


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

<script>
    function add_row() {
        var length = $('#table-country2 tr').length;



        $.ajax({
            url: "{{ route('admin.education.add_row') }}", // Laravel route helper
            type: "POST", // using POST instead of PUT/DELETE
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                length: length
            },
            success: function(response) {

                $('#table-country2').append(response);
                // Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
            },
            error: function(xhr) {
                Swal.fire('Error!', 'An error occurred while Adding  the item.', 'error');
            }
        });

    }


    function delete_row(id) {
        $('#row' + id).remove();
    }
</script>