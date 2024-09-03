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
                                                    {{-- ----------Description end --}}
                                                    {{-- ----------first image --}}
                                                    @if ($loop->first)
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

                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                                    name="File Upload Video">
                                                                </x-admin.form.label-first>
                                                                <div class="col-sm-12">
                                                                    <x-admin.form.input :model="$StaticTable" nameImage="video"
                                                                        old="video" name="video" type="file"
                                                                        readonly="" placeholder="Please Enter video"
                                                                        id="video" class="dropify" DataHeight="300"
                                                                        accept=".mp4, .mov, video/mp4, video/quicktime">
                                                                    </x-admin.form.input>

                                                                </div>

                                                            </div>
                                                            @if ($StaticTable->video)
                                                                <div class="col-md-2">
                                                                    <video controls width="500">
                                                                        <source
                                                                            src="{{ url('storage/' . $StaticTable->video) }}"
                                                                            type="video/mp4">
                                                                        Your browser does not support the video tag.
                                                                    </video>
                                                                </div>
                                                            @endif
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
                                                    @endif
                                                    <div class=" mb-4">
                                                        <div class="col-md-12">
                                                            <div id='inputs-container'>
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
                                                                                            placeholder="title {{ $item->name }}"
                                                                                            class="form-control valid">
                                                                                        </x-admin.form.input>
                                                                                    </div>
                                                                                    {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                    </x-admin.form.label-end> --}}
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        onclick="delete_link(this)"
                                                                                        link-id="{{ $link->id }}"
                                                                                        style="">
                                                                                        <i
                                                                                            class="bx bxs-trash"></i>&nbsp;</button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Add more input fields as needed -->

                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div id="input-template" class="input-temp"
                                                                        style="">
                                                                        <div class="col-md-12 mb-4 row">
                                                                            <div class="col-md-10 row">
                                                                                {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                                    </x-admin.form.label-first> --}}
                                                                                <div class="col-sm-8">
                                                                                    <x-admin.form.input name="links[]"
                                                                                        type="text" required=""
                                                                                        placeholder="links"
                                                                                        class="form-control valid">
                                                                                    </x-admin.form.input>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <x-admin.form.input
                                                                                        name="links_title[]"
                                                                                        type="text" required=""
                                                                                        placeholder="title"
                                                                                        class="form-control valid">
                                                                                    </x-admin.form.input>
                                                                                </div>
                                                                                {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                    </x-admin.form.label-end> --}}
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <button type="button"
                                                                                    class="btn btn-danger delete-input"
                                                                                    style="">
                                                                                    <i
                                                                                        class="bx bxs-trash"></i>&nbsp;</button>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Add more input fields as needed -->

                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <button id="add-input" type="button"
                                                                class="col-sm-1 btn btn-success">
                                                                <i class='bx bx-plus'></i></i>&nbsp;
                                                            </button>

                                                        </div>


                                                        <div class="col-md-12">
                                                            <div id='inputs-container-file'>
                                                                <label>file</label>
                                                                @if ($StaticTable->files->count())
                                                                    @foreach ($StaticTable->files as $file)
                                                                        <div id="input-template-file"
                                                                            class="input-temp-file" style="">
                                                                            <div class="col-md-12 mb-4 row">
                                                                                <div class="col-md-4 row">
                                                                                    {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                                </x-admin.form.label-first> --}}
                                                                                    <div class="col-sm-4">
                                                                                        {{-- <x-admin.form.input name="file[]" value="{{storage_path('education').$file->file}}" type="file" required="" placeholder="file" class="form-control valid">
                                                                </x-admin.form.input> --}}


                                                                                        <a href="{{ url('storage/Testing/' . $file->file) }}"
                                                                                            class="btn btn-success donload-input-file"
                                                                                            download> <i
                                                                                                class="bx bxs-download"></i>&nbsp;</a>

                                                                                    </div>

                                                                                    <div class="col-sm-8">
                                                                                        <input type="hidden"
                                                                                            name="{{ 'file_id[' . $item->key . '][]' }}"
                                                                                            value="{{ $file->id }}">
                                                                                        <x-admin.form.input
                                                                                            value="{{ $file->translate('title', $item->key) }}"
                                                                                            name="{{ 'file_title[' . $item->key . '][]' }}"
                                                                                            type="text" required=""
                                                                                            placeholder="title {{ $item->name }}"
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
                                                            {{-- <button id="add-input-file" type="button" class="col-sm-1 btn btn-success">
                                                    <i class='bx bx-plus' ></i></i>&nbsp;</button> --}}
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
