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
                                <a class="nav-link active" data-bs-toggle="tab" href="#{{ $translationFirst->id }}" role="tab" aria-selected="true">
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
                                            <input type="hidden" name="category" value="{{ Request()->category ?? '' }}">
                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <input type="hidden" name="project_id" value="{{ Request()->project_id }}">
                                            <input type="hidden" name="tabs_id" value="{{ $tabs->id??'' }}">
                                            <input type="hidden" name="type" value="">

                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="form-label" name="title  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'title.'.$translationFirst->key }}" name="{{ 'title'.'['.$translationFirst->key.']' }}" type="text" required="" placeholder="title {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate('title', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end name="please enter label1  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------name first --}}


                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label" name="url  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'url.'.$translationFirst->key }}" name="{{ 'url'.'['.$translationFirst->key.']' }}" type="text" required="" placeholder="url {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate('url', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter url  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end url --}}

                                            {{-- ----------start years_text --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label" name="Years Text  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'years_text.'.$translationFirst->key }}" name="{{ 'years_text'.'['.$translationFirst->key.']' }}" type="text" required="" placeholder="Years Text {{ $translationFirst->name }}" class="form-control valid" :value="$StaticTable->translate('years_text', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter years_text  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end years_text --}}




                                            {{-- ----------Description first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label" name="Description  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.text old="{{ 'description.'.$translationFirst->key }}" name="{{ 'description'.'['.$translationFirst->key.']' }}" type="text" placeholder="Description {{ ucfirst($translationFirst->name)  }}" :value="$StaticTable->translate('description', $translationFirst->key)">
                                                </x-admin.form.text>
                                                <x-admin.form.label-end star="*" name="please enter Description  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------Description end --}}
                                            {{-- ----------sort first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="form-label" name="sort">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'sort' }}" name="{{ 'sort' }}" type="number" required="" placeholder="sort" class="form-control valid" :value="$StaticTable->sort">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter sort">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------sort end --}}

                                            {{-- ----------first image--}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="col-sm-3 col-form-label" name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="firstImage" old="image" name="image" type="file" readonly="" placeholder="Please Enter Image" id="image" class="dropify" DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            {{-- ----------end image--}}

                                            {{-- ----------first pdf--}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="col-sm-3 col-form-label" name="File Upload Pdf">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="pdfFile" accept="application/pdf" old="image2" name="image2" type="file" readonly="" placeholder="Please Enter Pdf" id="image" class="dropify" DataHeight="300">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            {{-- ----------end pdf--}}


                                            {{-- ----------status first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="Checked switch checkbox status">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::STATUS as $status)
                                                            <div class="form-check">
                                                                <x-admin.form.radio :checked="$StaticTable->status==$status?'checked':''" name="status" value="{{ $status }}" :model="$StaticTable">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $status }}</label>
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
<script src="{{ asset('admin/project/tabs/program/js/create.js') }}"></script>
@endsection