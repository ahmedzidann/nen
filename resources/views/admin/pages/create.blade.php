@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
@endsection

@section('cssadmin')
<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
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
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="Select Parent">
                                                </x-admin.form.label-first>
                                                <x-admin.form.dropdown disabled="" required="" :foreach="$allPage"
                                                    name="parent_id" nameselect="pages" :model="$pages" class="select2" data-search="true">
                                                </x-admin.form.dropdown>
                                            </div>
                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Name  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'name.'.$translationFirst->key }}"
                                                    name="{{ 'name'.'['.$translationFirst->key.']' }}" type="text"
                                                    required="" placeholder="Name {{ $translationFirst->name }}"
                                                    class="form-control valid"
                                                    :value="$pages->translate('name', $translationFirst->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Name  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------name first --}}
                                            {{-- ----------sort first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="sort">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'sort' }}" name="{{ 'sort' }}" type="number"
                                                    required="" placeholder="sort" class="form-control valid"
                                                    :value="$pages->sort">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter sort">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------sort end --}}
                                            {{-- ----------link first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label" name="link">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'link' }}" name="{{ 'link' }}" type="text"
                                                    required="" placeholder="link" class="form-control valid"
                                                    :value="$pages->link">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter link">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------link end --}}
                                            {{-- ----------Description first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Description  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.text old="{{ 'description.'.$translationFirst->key }}"
                                                    name="{{ 'description'.'['.$translationFirst->key.']' }}"
                                                    type="text"
                                                    placeholder="Description {{ ucfirst($translationFirst->name)  }}"
                                                    :value="$pages->translate('description', $translationFirst->key)">
                                                </x-admin.form.text>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Description  {{ $translationFirst->name  }}">
                                                </x-admin.form.label-end>

                                            </div>
                                            {{-- ----------Description end --}}

                                            {{-- ----------navbar first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Checked switch checkbox navbar">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::NAVBAR as $navbar)
                                                            <div class="form-check">
                                                                <x-admin.form.radio name="navbar" value="{{ $navbar }}"
                                                                    :checked="$pages->navbar==$navbar?'checked':''"
                                                                    :model="$pages">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $navbar }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ----------navbar end --}}
                                            {{-- ----------footer first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Checked switch checkbox footer">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::FOOTER as $footer)
                                                            <div class="form-check">
                                                                <x-admin.form.radio name="footer" value="{{ $footer }}"
                                                                    :checked="$pages->footer==$footer?'checked':''"
                                                                    :model="$pages">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $footer }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- ----------footer end --}}
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
                                                                <x-admin.form.radio
                                                                    :checked="$pages->status==$status?'checked':''"
                                                                    name="status" value="{{ $status }}" :model="$pages">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
//     $(document).ready(function() {
//   $('.select2').select2();
// });
</script>
@section('jsadmin')

<script src="{{ asset('admin/pages/js/create.js') }}"></script>
@endsection
