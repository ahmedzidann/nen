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

        <x-admin.customize-breadcrumb :name="$viewTable" :route-view="$routeView" type="Create">
        </x-admin.customize-breadcrumb>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')??'') }}</h6>
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
                        <form method="post" id="myForm" action="{{ $action??'' }}" enctype="multipart/form-data">

                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="{{ $translationFirst->id }}" role="tabpanel">
                                    <div class="card-body p-4">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">
                                            {{-- ----------name Pages --}}
                                            <input type="hidden" name="pages_id" value="{{ $SelectPages->id ?? '' }}">
                                            <input type="hidden" name="tab" value="contacts">


                                            <input type="hidden" name="category"
                                                value="{{ Request()->category ?? '' }}">

                                            <input type="hidden" name="subcategory"
                                                value="{{ Request()->subcategory ?? '' }}">
                                                <input type="hidden" name="subsubcategory"
                                                value="{{ Request()->subsubcategory ?? '' }}">
                                            {{-- <input type="hidden" name="childe_pages_id"
                                                value="{{ $childe_pages_id->id  }}"> --}}
                                                <input type="hidden" name='tabs_id' value="{{$tabs->id}}">
                                                <input type="hidden" name='solution_id' value="{{$solution_id}}">
                                            <input type="hidden" name="item" value="{{ Request()->item ?? '' }}">
                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Country">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'subsubtitle.'.$translationFirst->key }}"
                                                    name="{{ 'subsubtitle'}}" type="text"
                                                    required="" placeholder="Country"
                                                    class="form-control valid"
                                                    :value="$StaticTable->subsubtitle">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Country">
                                                </x-admin.form.label-end>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Name">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'title.'.$translationFirst->key }}"
                                                    name="{{ 'title'.'['.$translationFirst->key.']' }}" type="text"
                                                    required="" placeholder="Name"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('title', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Name">
                                                </x-admin.form.label-end>
                                            </div>



                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Phone">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'subtitle.'.$translationFirst->key }}"
                                                    name="{{ 'subtitle'.'['.$translationFirst->key.']' }}" type="text"
                                                    required="" placeholder="Phone"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('subtitle', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Phone">
                                                </x-admin.form.label-end>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                    name="country Flag">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="StaticTable"
                                                        old="image" name="image" type="file" readonly=""
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Checked switch checkbox status">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::STATUS as $status)
                                                            <div class="form-check">
                                                                <x-admin.form.radio
                                                                    :checked="$StaticTable->status==$status?'checked':''"
                                                                    name="status" value="{{ $status }}"
                                                                    :model="$StaticTable">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $status }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <br>
                                        </div>
                                            {{-- ----------status end --}}
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>

                                        {{----------hatem --}}
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
<script src="{{ asset('admin/about/certificates/js/create.js') }}"></script>
@endsection

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
