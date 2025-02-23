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
                                                    <input type="hidden" name="category"
                                                        value="{{ Request()->category ?? '' }}">
                                                    {{-- ----------end static --}}
                                                    {{-- ----------name Pages --}}
                                                    @if ($loop->first)
                                                        <div class="col-md-6 mb-4">
                                                            <x-admin.form.label-first class="form-label"
                                                                name="Select Pages">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.dropdown disabled="" required=""
                                                                :foreach="$allPage" id="page_id" nameselect="pages"
                                                                :model="$StaticTable" :param="$StaticTable->pages->parent_id">
                                                            </x-admin.form.dropdown>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label for="pages">Select Child Page</label>
                                                            <br>
                                                            <select class="form-select" id="pages" name="page_id">
                                                                <option value="" disabled selected>Select a child page
                                                                </option>
                                                                <option value="{{ $StaticTable->pages?->id }}" selected>
                                                                    {{ $StaticTable->pages?->slug }}</option>
                                                            </select>
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
                                                    {{--  @php
                                                dd(storage_path($StaticTable->image));
                                            @endphp  --}}
                                                    {{-- ----------first image --}}
                                                    @if ($loop->first)
                                                        {{-- <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first  class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <input
                                                    data-default-file="{{ asset('storage/slider/'.$StaticTable->image) }}"
                                                        name="image" type="file"
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png">

                                                </div>
                                            </div> --}}
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.label-first star="*"
                                                                class="col-sm-3 col-form-label" name="File Upload Image">
                                                            </x-admin.form.label-first>
                                                            <div class="col-sm-9">
                                                                <x-admin.form.input :model="$StaticTable" nameImage="image"
                                                                    old="image" name="image" type="file"
                                                                    readonly="" placeholder="Please Enter Image"
                                                                    id="image" class="dropify" DataHeight="300"
                                                                    accept=".jpg, .png, image/jpeg, image/png">
                                                                </x-admin.form.input>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- ----------end image --}}
                                                    {{-- ----------first icon --}}
                                                    @if ($loop->first)
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                                name="File Upload Image">
                                                            </x-admin.form.label-first>
                                                            <div class="col-sm-9">
                                                                <input
                                                                    data-default-file="{{ asset('storage/slider/' . $StaticTable->icon) }}"
                                                                    name="icon" type="file"
                                                                    placeholder="Please Enter Icon" id="icon"
                                                                    class="dropify"
                                                                    accept=".jpg, .png, image/jpeg, image/png">

                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- ----------end icon --}}
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
    @include('admin.layouts.ckeditor.ckeditor')
    <script src="{{ asset('admin/slider/js/edit.js') }}"></script>
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
