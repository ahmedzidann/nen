@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Sidebar Resources'))) }}
@endsection
@section('cssadmin')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.sidebar-resources.index') }}">
                        Sidebar Resources
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Sidebar Resources')) }}
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

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#en" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title"> English</div>

                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <form id="myForm" action="{{ route('admin.sidebar-resources.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- @foreach ($translation as $key => $item) --}}
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="1" role="tabpanel">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">
                                            <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Category')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="category_id"
                                                    data-placeholder="Choose Category" name="main_category">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select Category')) }}
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        }
                                                        <option value="{{ $category->slug }}"
                                                            data-id="{{ $category->id }}">
                                                            {{ $category->slug }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Sub Category')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="sub_categories"
                                                    data-placeholder="Choose Sub Category" name="sub_category">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select Sub Category')) }}
                                                    </option>

                                                </select>
                                            </div>
                                            <div id="resourceRows">
                                                <div class="resource-row">
                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="title">Title in English</label>
                                                            <input type="text" class="form-control" name="title[][en]"
                                                                required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="title">Sub Title in English</label>
                                                            <input type="text" class="form-control"
                                                                name="sub_title[][en]" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="title">Enter Url</label>
                                                            <input type="text" class="form-control"
                                                                name="url[]" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="form-label">Upload Image</label>
                                                            <input type="file" class="form-control" name="image[]"
                                                                accept="image/*" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="title">Select Type</label>
                                                            <select name="type[]" class="form-control" id="">
                                                                <option value="1" selected>Upper Section</option>
                                                                <option value="2">Lower Section</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-1 d-flex align-items-end">
                                                            <button type="button" class="btn btn-danger remove-row "><i
                                                                    class="bx bxs-trash"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 resource-input-container">
                                                        <!-- Dynamic input will be appended here -->
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-success" id="addRow"><i
                                                            class=" bx bx-plus-medical"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ asset('admin/slider/js/create.js') }}"></script>
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
    </script>
    <script>
        $(document).ready(function() {
            // Add new row
            $('#addRow').click(function() {
                let newRow = $('.resource-row:first').clone();
                newRow.find('input').val('');
                newRow.find('select').val(1);
                newRow.find('.resource-input-container').empty();
                $('#resourceRows').append(newRow);
                updateResourceIndexes();
            });

            // Remove row
            $(document).on('click', '.remove-row', function() {
                if ($('.resource-row').length > 1) {
                    $(this).closest('.resource-row').remove();
                    updateResourceIndexes();
                }
            });

            // Handle resource type change
            $(document).on('change', '.resource-type', function() {
                let container = $(this).closest('.row').find('.resource-input-container');
                let rowIndex = $(this).closest('.resource-row').index();
                container.empty();

                switch ($(this).val()) {
                    case 'image':
                        container.append(`
                            <label class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="resource[${rowIndex}]" accept="image/*" required>
                        `);
                        break;
                    case 'file':
                        container.append(`
                            <label class="form-label">Upload File</label>
                            <input type="file" class="form-control" name="resource[${rowIndex}]" required>
                        `);
                        break;
                    case 'url':
                        container.append(`
                            <label class="form-label">Enter URL</label>
                            <input type="url" class="form-control" name="resource[${rowIndex}]" required>
                        `);
                        break;
                }
            });

            // Update indexes for all resource inputs
            function updateResourceIndexes() {
                $('.resource-row').each(function(index) {
                    let container = $(this).find('.resource-input-container');
                    let input = container.find('input');
                    if (input.length) {
                        let currentName = input.attr('name');
                        if (currentName) {
                            if (currentName.includes('[file]')) {
                                input.attr('name', `resource[${index}][file]`);
                            } else if (currentName.includes('[url]')) {
                                input.attr('name', `resource[${index}][url]`);
                            }
                        }
                    }
                });
            }

            // Initialize first row
            $('.resource-type:first').trigger('change');
        });
    </script>
@endsection
