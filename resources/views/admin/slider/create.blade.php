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
                                                <div class="col-md-6 mb-4">
                                                    <x-admin.form.label-first class="form-label" name="Select Main Page">
                                                    </x-admin.form.label-first>
                                                    <x-admin.form.dropdown required="" :foreach="$allPage"
                                                        :disabled="true" nameselect="pages" :model="$StaticTable"
                                                        id="page_id">
                                                    </x-admin.form.dropdown>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label for="pages">Select Child Page</label>
                                                    <br>
                                                    <select class="form-select" id="pages" name="page_id" >
                                                        <option value="" disabled selected>Select a child page
                                                        </option>
                                                    </select>
                                                </div>
                                                {{-- ----------end Pages --}}
                                                {{-- ----------name first --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first star="*" class="form-label"
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
                                                        <x-admin.form.input {{--  :model="$StaticTable" nameImage="image"   old="image"   --}} name="image"
                                                            type="file" readonly="" placeholder="Please Enter Image"
                                                            id="image" class="dropify" DataHeight="300"
                                                            accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end image --}}
                                                {{-- ----------first icon --}}
                                                <div class="col-md-12 mb-4">
                                                    <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                        name="File Upload Image">
                                                    </x-admin.form.label-first>
                                                    <div class="col-sm-9">
                                                        <x-admin.form.input name="icon" type="file" readonly=""
                                                            placeholder="Please Enter Icon" id="icon" class="dropify"
                                                            DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                        </x-admin.form.input>
                                                    </div>
                                                </div>
                                                {{-- ----------end icon --}}
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
    <script src="{{ asset('admin/slider/js/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#page_id').on('change', function() {
                var selectedValue = this.value;
                let url = '{{ route('admin.get-child-pages', ['page_id' => ':id']) }}';
                url = url.replace(':id', selectedValue); // Replace the placeholder with the actual ID
                console.log(url);

                $.ajax({
                    url: url, // Replace with your server endpoint
                    type: 'GET', // or 'POST' depending on your requirement
                    data: {
                        page_id: selectedValue // Send the page_id in the request
                    },
                    success: function(response) {
                        $('#pages').empty().append(
                            '<option value="" disabled selected>Select a child page</option>'
                        );

                        if (response.data && response.data.length > 0) {
                            // Assuming response.data is an array of objects
                            response.data.forEach(function(item) {
                                // Create a new option element
                                var option = $('<option></option>')
                                    .attr('value', item
                                        .id) // Assuming each item has an 'id' property
                                    .text(item
                                        .slug
                                        ); // Assuming each item has a 'name' property

                                // Append the option to the select element
                                $('#pages').append(option);
                            });
                        } else {
                            // Optionally, you can add a default message if there are no options
                            $('#pages').append(
                                '<option disabled>No child pages available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });
    </script>
@endsection
