@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('resources'))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.resources.index') }}">
                        Product Categories
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('resources')) }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs') ?? '') }}</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-danger" role="tablist">
                                @foreach ($langs as $item)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            href="#lang{{ $item->id }}" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title"> {{ ucfirst($item->name) }}</div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <form id="myForm"
                                action="{{ route('admin.sidebar-resources.update', ['sidebar_resource' => $resource->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="tab-content py-3">
                                    @foreach ($langs as $lang)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="lang{{ $lang->id }}" role="tabpanel">
                                            <div class="card-body p-4 row">
                                                @if ($loop->first)
                                                    <div class="col-md-6">
                                                        <label
                                                            class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Category')) }}
                                                            <span style="color: red">{{ $star ?? '' }}</span> </label>
                                                        <br>
                                                        <select class="form-select w-100" id="category_id"
                                                            data-placeholder="Choose Category" name="main_category">

                                                            <option selected="" value="" disabled selected>
                                                                {{ ucfirst(TranslationHelper::translate('Select Category')) }}
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->slug }}"
                                                                    {{ $resource->main_category == $category->slug ? 'selected' : '' }}
                                                                    data-id="{{ $category->id }}">
                                                                    {{ $category->slug }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label
                                                            class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Sub Category')) }}
                                                            <span style="color: red">{{ $star ?? '' }}</span> </label>
                                                        <br>
                                                        <select class="form-select w-100" id="sub_categories"
                                                            data-placeholder="Choose Sub Category" name="sub_category">

                                                            <option selected="" value="" disabled selected>
                                                                {{ ucfirst(TranslationHelper::translate('Select Sub Category')) }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                @endif

                                                <div id="resourceRows">
                                                    {{-- @if ($loop->first) --}}
                                                    @foreach ($resources as $index => $item)
                                                        @if ($lang->key == 'en')
                                                            <input type="hidden" name="keys[]"
                                                                value="{{ $item->id }}">
                                                        @endif
                                                        <div class="resource-row">
                                                            <div class="row">
                                                                <div class="form-group col-md-3">
                                                                    <label for="title">Title in English</label>
                                                                    <input type="text" class="form-control"
                                                                        name="title[{{ $index }}][{{ $lang->key }}]"
                                                                        value="{{ $item->translate('title', $lang->key) }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label for="title">Sub Title in English</label>
                                                                    <input type="text" class="form-control"
                                                                        name="sub_title[{{ $index }}][{{ $lang->key }}]"
                                                                        value="{{ $item->translate('sub_title', $lang->key) }}"
                                                                        required>
                                                                </div>
                                                                @if ($lang->key == 'en')
                                                                    <div class="form-group col-md-3">
                                                                        <label class="form-label">Upload Image</label>
                                                                        <input type="file" class="form-control"
                                                                            name="image[]" accept="image/*" value="{{ $item->resource }}">
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label for="title">Select Type</label>
                                                                        <select name="type[]" class="form-control" id="">
                                                                            <option value="1"
                                                                                {{ $item->type == 1 ? 'selected' : '' }}>
                                                                                Upper Section
                                                                            </option>
                                                                            <option value="2"
                                                                                {{ $item->type == 1 ? 'selected' : '' }}>
                                                                                Lower Section</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-1 d-flex align-items-end">
                                                                        <button type="button"
                                                                            onclick="delete_resource(this)"
                                                                            resource-id="{{ $resource->id }}"
                                                                            class="btn btn-danger remove-row mb-3"><i
                                                                                class="bx bxs-trash"></i></button>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- @endif --}}

                                                </div>
                                                @if ($loop->first)
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <button type="button" class="btn btn-success"
                                                                id="addRow"><i
                                                                    class=" bx bx-plus-medical"></i></button>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4"
                                            id="{{ $id ?? '' }}">{{ TranslationHelper::translate(ucfirst('Submit') ?? '') }}</button>
                                        <button type="reset"
                                            class="btn btn-light px-4">{{ TranslationHelper::translate(ucfirst('Reset') ?? '') }}</button>
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
    <script src="{{ asset('admin/custom/js/edit.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var selectedValue = $(this).find(':selected').data('id');
                let url = '{{ route('admin.get-child-pages', ['page_id' => ':id']) }}';
                url = url.replace(':id', selectedValue); // Replace the placeholder with the actual ID

                $.ajax({
                    url: url, // Replace with your server endpoint
                    type: 'GET', // or 'POST' depending on your requirement
                    data: {
                        page_id: selectedValue // Send the page_id in the request
                    },
                    success: function(response) {
                        $('#sub_categories').empty().append(
                            '<option value="" disabled selected>Select a child page</option>'
                        );

                        if (response.data && response.data.length > 0) {
                            // Assuming response.data is an array of objects
                            response.data.forEach(function(item) {
                                // Create a new option element
                                var option = $('<option></option>')
                                    .attr('value', item
                                        .slug
                                    ) // Assuming each item has an 'id' property
                                    .text(item
                                        .slug
                                    ); // Assuming each item has a 'name' property

                                // Append the option to the select element
                                $('#sub_categories').append(option);
                            });
                        } else {
                            // Optionally, you can add a default message if there are no options
                            $('#sub_categories').append(
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

        (function getChild() {
            var selectedValue = $('#category_id').find(':selected').data('id');
            var chiled = "{{ $resource->sub_category }}";
            let url = '{{ route('admin.get-child-pages', ['page_id' => ':id']) }}';
            url = url.replace(':id', selectedValue); // Replace the placeholder with the actual ID

            $.ajax({
                url: url, // Replace with your server endpoint
                type: 'GET', // or 'POST' depending on your requirement
                data: {
                    page_id: selectedValue // Send the page_id in the request
                },
                success: function(response) {
                    $('#sub_categories').empty().append(
                        '<option value="" disabled selected>Select a child page</option>'
                    );

                    if (response.data && response.data.length > 0) {
                        // Assuming response.data is an array of objects
                        response.data.forEach(function(item) {
                            // Create a new option element
                            var option = $('<option></option>')
                                .attr('value', item
                                    .slug)
                                .text(item
                                    .slug
                                ); // Assuming each item has a 'name' property
                            if (item.slug == chiled) {
                                option.prop('selected', true);
                            }
                            // Append the option to the select element
                            $('#sub_categories').append(option);
                        });
                    } else {
                        // Optionally, you can add a default message if there are no options
                        $('#sub_categories').append(
                            '<option disabled>No child pages available</option>');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    console.error('AJAX Error:', status, error);
                }
            });
        })();
    </script>

    <script>
        var index = {{ count($resources) }};
        $(document).ready(function() {

            // Get the count

            $('#addRow').click(function() {
                let newRow = $('.resource-row:first').clone();
                newRow.find('input').val('');
                newRow.find('select').val(1);
                newRow.find('.resource-input-container').empty();
                $('#resourceRows').append(newRow);
                newRow.find('[name]').each(function() {
                    let nameAttr = $(this).attr('name');
                    if (nameAttr && nameAttr.includes('title')) {
                        // Replace the index in the name, assuming it follows the pattern title[0][en]
                        $(this).attr('name', nameAttr.replace(/\[0\]/, `[${index}]`));
                        console.log(this);

                    }
                    if (nameAttr && nameAttr.includes('type')) {
                        // Replace the index in the name, assuming it follows the pattern title[0][en]
                        $(this).attr('name', nameAttr.replace(/\[\]/, `[${index}]`));
                        console.log(this);

                    }
                    if (nameAttr && nameAttr.includes('image')) {
                        // Replace the index in the name, assuming it follows the pattern title[0][en]
                        $(this).attr('name', nameAttr.replace(/\[\]/, `[${index}]`));
                        console.log(this);

                    }
                });
            });

            // Remove row
            $(document).on('click', '.remove-row', function() {
                if ($('.resource-row').length > 1) {
                    --index
                    $(this).closest('.resource-row').remove();
                }
            });

            ++index
        });
    </script>
    <script>
        function delete_resource(button) {
            // Access the link-id attribute
            var linkId = button.getAttribute('resource-id');
            if (linkId) {

                var url = '{{ route('admin.resources.delete.resource', ':resource') }}';
                url = url.replace(':resource', linkId);
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
        }
    </script>
@endsection
