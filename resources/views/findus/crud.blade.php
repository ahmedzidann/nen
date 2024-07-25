@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
@endsection
@section('cssadmin')

@endsection

@section('contentadmin')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <x-admin.form.breadcrumb :name="$viewTable" :routeView="$routeView" :type="$type"></x-admin.form.breadcrumb>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')??'') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            @foreach ($translation as $item)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $loop->first?'active':'' }}" data-bs-toggle="tab"
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
                        <form method="post" action="{{ $action??'' }}" enctype="multipart/form-data">
                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                @foreach ($translation as $item)
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}"
                                    role="tabpanel">
                                    <div class="card-body p-4">


                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="countries"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="country_id" id="country_id" class="form-control valid">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{ isset($admin) && $admin->country_id == $country->id ? 'selected' : '' }}>{{$country->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="states"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="state_id" id="state_id" class="form-control valid">
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}" data-country="{{$state->country_id}}" {{ isset($admin) && $admin->state_id == $state->id ? 'selected' : '' }}>{{$state->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                            name="page  ">
                                        </x-admin.form.label-first>
                                        <div class="col-sm-9">
                                            <select name="page_id" class="form-control valid">
                                                @foreach($pages as $country)
                                                    <option value="{{$country->id}}" {{ isset($admin) && $admin->page_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="categories"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="category_id" id="category_id" class="form-control valid">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" {{ isset($admin) && $admin->category_id == $category->id ? 'selected' : '' }}>{{$category->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="levels"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="level_id" id="level_id" class="form-control valid">
                                                    <option value="">Select Level</option>
                                                    @foreach($levels as $level)
                                                        <option value="{{$level->id}}" data-category="{{$level->category_id}}" {{ isset($admin) && $admin->level_id == $level->id ? 'selected' : '' }}>{{$level->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="certificates"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="certificate_id" id="certificate_id" class="form-control valid">
                                                    <option value="">Select Certificate</option>
                                                    @foreach($certificates as $certificate)
                                                        <option value="{{$certificate->id}}" data-category="{{$certificate->category_id}}" {{ isset($admin) && $admin->certificate_id == $certificate->id ? 'selected' : '' }}>{{$certificate->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="certificates"></x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="specialization_id" id="specialization_id" class="form-control valid">
                                                    <option value="">Select Certificate</option>
                                                    @foreach($specs as $certificate)
                                                        <option value="{{$certificate->id}}" data-category="{{$certificate->category_id}}" {{ isset($admin) && $admin->certificate_id == $certificate->id ? 'selected' : '' }}>{{$certificate->translate('title', $item->key)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        @if ($loop->first)
                                         <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="code">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="code" name="code" type="text"
                                                    placeholder="Code" class="form-control valid" required='true' :value="$admin->code ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="name">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="name" name="name" type="text"
                                                    placeholder="Name" class="form-control valid" required='true' :value="$admin->name ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="phone">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="phone" name="phone" type="text"
                                                    placeholder="Phone" class="form-control valid" required='true' :value="$admin->phone ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="email">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="email" name="email" type="text"
                                                    placeholder="Email" class="form-control valid" required='true' :value="$admin->email ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="address">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="address" name="address" type="text"
                                                    placeholder="Address" class="form-control valid" required='true' :value="$admin->address ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="lat">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="lat" name="lat" type="text"
                                                    placeholder="Lat" class="form-control valid" required='true' :value="$admin->lat ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="lng">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="lng" name="lng" type="text"
                                                    placeholder="Lang" class="form-control valid" required='true' :value="$admin->lang ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="status">

                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <select name="status" id="" class="form-control valid">

                                                    <option value="pending" >pending</option>
                                                    <option value="active" >active</option>
                                                    <option value="block" >block</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="join date">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="join_date" name="join_date" type="date"
                                                    placeholder="join_date" class="form-control valid" required='true' :value="$admin->join_date ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="end date">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="end_date" name="end_date" type="date"
                                                    placeholder="Lang" class="form-control valid" required='true' :value="$admin->end_date ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="start date">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="start_date" name="start_date" type="date"
                                                    placeholder="Lang" class="form-control valid" required='true' :value="$admin->start_date ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="user comment">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="user_comment" name="user_comment" type="text"
                                                    placeholder="" class="form-control valid" required='true' :value="$admin->user_comment ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="admin comment">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="admin_comment" name="admin_comment" type="text"
                                                    placeholder="" class="form-control valid" required='true' :value="$admin->admin_comment ?? ''">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="File Upload Image">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input :model="$admin" nameImage="findus"
                                                    old="image" name="image" type="file" readonly=""
                                                    placeholder="Please Enter Image" id="image" class="dropify"
                                                    DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                </x-admin.form.input>
                                            </div>
                                        </div>

                                        <div id="input-template"  class="input-temp" style="display:none;" >
                                            <div class="col-md-12 mb-4 row">
                                                <div class="col-md-10 row">
                                                    {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                    </x-admin.form.label-first> --}}
                                                    <div class="col-sm-8">
                                                        <x-admin.form.input name="links[]" type="text" required="" placeholder="id" class="form-control valid">
                                                        </x-admin.form.input>
                                                    </div>
                                                    <div class="col-sm-4">

                                                        <x-admin.form.input name="links_title" type="text" required="" placeholder="title" class="form-control valid">
                                                        </x-admin.form.input>
                                                    </div>
                                                    {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                    </x-admin.form.label-end> --}}
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger delete-input" style="">
                                                         <i class="bx bxs-trash"></i>&nbsp;</button>
                                                </div>
                                            </div>
                                            <!-- Add more input fields as needed -->

                                        </div>

                                        <div>
                                            <div class="col-md-12">
                                                <div id='inputs-container'>
                                                    <label>Gallery</label>
                                                    <div id="input-template2"  class="input-temp" style="">
                                                        <div class="col-md-12 mb-4 row">
                                                            <div class="col-md-10 row">
                                                                {{-- <x-admin.form.label-first star="*" class="form-label" name="Title">
                                                                </x-admin.form.label-first> --}}
                                                                <div class="col-sm-8">
                                                                    <x-admin.form.input name="links[]" type="text" required="" placeholder="id" class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>
                                                                <div class="col-sm-4">

                                                                    <x-admin.form.input name="links_title" type="text" required="" placeholder="title" class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>
                                                                {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                </x-admin.form.label-end> --}}
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-danger delete-input">
                                                                     <i class="bx bxs-trash"></i>&nbsp;</button>
                                                            </div>
                                                        </div>
                                                        <!-- Add more input fields as needed -->

                                                    </div>
                                                </div>

                                                <button id="add-input" type="button" class="col-sm-1 btn btn-success">
                                                    <i class='bx bx-plus' ></i></i>&nbsp;
                                                </button>

                                            </div>
                                        </div>
                                        @endif

                                        {{-- <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="title">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="title" name="title" type="text"
                                                    placeholder="title" class="form-control valid" required='true'>
                                                </x-admin.form.input>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="title  {{ $item->title  }}">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="{{ 'title.'.$item->key }}"
                                                    name="{{ 'title'.'['.$item->key.']' }}" type="text"
                                                    required="{{ $loop->first?'required':'' }}"
                                                    placeholder="Title {{ $item->title }}" class="form-control valid"
                                                    :value="$admin->translate('title', $item->key)"></x-admin.form.input>
                                            </div>
                                        </div> --}}





                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#country_id').change(function() {
        var selectedCountryId = $(this).val();

        // Show all states initially
        $('#state_id option').each(function() {
            $(this).hide();
        });

        // Show states that belong to the selected country
        $('#state_id option[data-country="' + selectedCountryId + '"]').each(function() {
            $(this).show();
        });

        // Reset the state dropdown to the default option
        $('#state_id').val('');
    });

    $('#category_id').change(function() {
        var selectedCategoryId = $(this).val();

        // Show all levels initially
        $('#level_id option').each(function() {
            $(this).hide();
        });

        // Show levels that belong to the selected category
        $('#level_id option[data-category="' + selectedCategoryId + '"]').each(function() {
            $(this).show();
        });

        // Reset the level dropdown to the default option
        $('#level_id').val('');


        var selectedLevelId = $(this).val();

        $('#certificate_id option').each(function() {
            $(this).hide();
        });
        $('#certificate_id option[data-category="' + selectedLevelId + '"]').each(function() {
            $(this).show();
        });
        $('#certificate_id').val('');

        $('#specialization_id option').each(function() {
            $(this).hide();
        });
        $('#specialization_id option[data-category="' + selectedLevelId + '"]').each(function() {
            $(this).show();
        });
        $('#specialization_id').val('');



    });

    $('#level_id').change(function() {
        var selectedLevelId = $(this).val();

        // Show all certificates initially
        $('#certificate_id option').each(function() {
            $(this).hide();
        });

        // Show certificates that belong to the selected level
        $('#certificate_id option[data-level="' + selectedLevelId + '"]').each(function() {
            $(this).show();
        });

        // Reset the certificate dropdown to the default option
        $('#certificate_id').val('');
    });



    // Trigger change event to set the initial state based on the pre-selected country (if any)
    $('#country_id').trigger('change');
    // $('#level_id').trigger('change');
    $('#category_id').trigger('change');

});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Function to create a new input field
    function createInputField() {
        // Clone the template
        var template = document.getElementById("input-template").cloneNode(true);
        console.log(template);
        template.style.display = "block";
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
@endsection
