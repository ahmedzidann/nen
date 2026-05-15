@extends('admin.layouts.master')

@section('titleadmin')
    NGO Section Edit
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')
<div class="page-wrapper">
    <div class="page-content">

        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')) }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">

                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            @foreach ($translation as $item)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#tab_{{ $item->id }}" role="tab">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                            <div class="tab-title">{{ ucfirst($item->name) }}</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <input type="hidden" id="key_new" value="{{ $translation->count() }}">

                        <div class="tab-content py-3">
                            @foreach ($translation as $key => $item)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                     id="tab_{{ $item->id }}" role="tabpanel">

                                    <form method="POST"
                                          id="myForm{{ $key }}"
                                          action="{{ route('admin.ngo_sections.update', $resource->id) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="card-body p-4 row">

                                            @if ($loop->first)
                                                <div class="col-md-12 mb-4">

                                                    <div class="col-md-9">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Category')) }} <span style="color:red">*</span></label>
                                                        <select class="form-select w-100" id="category_id" name="main_category_id">
                                                            <option disabled selected>{{ ucfirst(TranslationHelper::translate('Select Category')) }}</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->slug }}" data-id="{{ $category->id }}"
                                                                    {{ $resource->main_category_id == $category->slug ? 'selected' : '' }}>
                                                                    {{ $category->slug }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-9 mt-3">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Sub Category')) }} <span style="color:red">*</span></label>
                                                        <select class="form-select w-100" id="sub_categories" name="sub_category_id">
                                                            <option disabled selected>{{ ucfirst(TranslationHelper::translate('Select Sub Category')) }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-9 mt-3">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Section Design')) }} <span style="color:red">*</span></label>
                                                        <select class="form-select w-100" id="design_section_id" name="design_section_id">
                                                            <option disabled selected>{{ ucfirst(TranslationHelper::translate('Select design_section')) }}</option>
                                                            @foreach ($designs as $design)
                                                                <option value="{{ $design->id }}"
                                                                    {{ $resource->design_section_id == $design->id ? 'selected' : '' }}>
                                                                    {{ $design->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 mb-4 mt-3">
                                                        <div class="col-md-9">
                                                            <label class="form-label">Title <span style="color:red">*</span></label>
                                                            <input type="text" name="title[{{ $item->key }}]" class="form-control"
                                                                   value="{{ $resource->getTranslation('title', $item->key) }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Description')) }} <span style="color:red">*</span></label>
                                                        <textarea rows="4" class="form-control" name="description[{{ $item->key }}]">{{ $resource->getTranslation('description', $item->key) }}</textarea>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Image1')) }}</label>
                                                        <input type="file" name="image_1" class="dropify" id="image_1"
                                                               data-default-file="{{ isset($resource->image_1) ? asset('storage/setting_testing_technology/' . $resource->image_1) : '' }}" />
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label class="form-label">{{ ucfirst(TranslationHelper::translate('Image2')) }}</label>
                                                        <input type="file" name="image_2" class="dropify" id="image_2"
                                                               data-default-file="{{ isset($resource->image_2) ? asset('storage/setting_testing_technology/' . $resource->image_2) : '' }}" />
                                                    </div>

                                                    <div class="col-md-9 mt-3">
                                                        <label class="form-label">Sort <span style="color:red">*</span></label>
                                                        <input type="number" name="sort" class="form-control" value="{{ $resource->sort }}">
                                                    </div>

                                                    <div class="col-md-12 mt-4">
                                                        <label class="form-label">Status</label>
                                                        <div class="col-sm-9 mt-2">
                                                            @foreach (App\Models\Page::STATUS as $status)
                                                                <div class="form-check">
                                                                    <input type="radio" value="{{ $status }}" class="form-check-input"
                                                                           name="status" {{ $resource->status == $status ? 'checked' : '' }} />
                                                                    <label class="form-check-label">{{ $status }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                            @if (!$loop->first)
                                                <div class="col-md-12 mb-4 mt-3">
                                                    <div class="col-md-9">
                                                        <label class="form-label">Title <span style="color:red">*</span></label>
                                                        <input type="text" name="title[{{ $item->key }}]" class="form-control"
                                                               value="{{ $resource->getTranslation('title', $item->key) }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">{{ ucfirst(TranslationHelper::translate('Description')) }}</label>
                                                    <textarea rows="4" class="form-control" name="description[{{ $item->key }}]">{{ $resource->getTranslation('description', $item->key) }}</textarea>
                                                </div>
                                            @endif

                                            <input type="hidden" name="submit2" value="{{ $item->key }}">

                                            <div class="col-md-12 my-4">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('jsadmin')
@include('admin.layouts.ckeditor.ckeditor')
<script src="{{ asset('admin/setting_testing_technology/js/edit.js') }}"></script>
<script>
$(document).ready(function() {
    $('#category_id').on('change', function() {
        var selectedValue = $(this).find(':selected').data('id');
        let url = "{{ route('admin.get-child-pages', ['page_id' => '__ID__']) }}";
        url = url.replace('__ID__', selectedValue);

        $.ajax({
            url: url, type: 'GET',
            success: function(response) {
                $('#sub_categories').empty().append('<option value="" disabled selected>Select a child page</option>');
                if (response.data && response.data.length > 0) {
                    response.data.forEach(function(item) {
                        $('#sub_categories').append($('<option></option>').attr('value', item.slug).text(item.slug));
                    });
                } else {
                    $('#sub_categories').append('<option disabled>No child pages available</option>');
                }
            },
            error: function(xhr, status, error) { console.error('AJAX Error:', status, error); }
        });
    });

    (function getChild() {
        var selectedValue = $('#category_id').find(':selected').data('id');
        var chiled = "{{ $resource->sub_category_id }}";
        let url = "{{ route('admin.get-child-pages', ['page_id' => '__ID__']) }}";
        url = url.replace('__ID__', selectedValue);

        $.ajax({
            url: url, type: 'GET',
            success: function(response) {
                $('#sub_categories').empty().append('<option value="" disabled selected>Select a child page</option>');
                if (response.data && response.data.length > 0) {
                    response.data.forEach(function(item) {
                        var option = $('<option></option>').attr('value', item.slug).text(item.slug);
                        if (item.slug == chiled) { option.prop('selected', true); }
                        $('#sub_categories').append(option);
                    });
                } else {
                    $('#sub_categories').append('<option disabled>No child pages available</option>');
                }
            },
            error: function(xhr, status, error) { console.error('AJAX Error:', status, error); }
        });
    })();
});
</script>
@endsection
