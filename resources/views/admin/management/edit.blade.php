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
            <x-admin.form.breadcrumb :name="$viewTable" :routeView="$routeView" :type="$type"></x-admin.form.breadcrumb>
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

                                                    <div class="col-md-6 mb-4">
                                                        <x-admin.form.label-first star="*" class="form-label"
                                                            name="Title  {{ $item->name }}"></x-admin.form.label-first>
                                                        <x-admin.form.input id="Title"
                                                            old="{{ 'title.' . $item->key }}"
                                                            name="{{ 'title' . '[' . $item->key . ']' }}" type="text"
                                                            required="" placeholder="Title {{ $item->name }}"
                                                            class="form-control valid" :value="$management->translate('title', $item->key)">
                                                        </x-admin.form.input>
                                                        <x-admin.form.label-end star="*"
                                                            name="please enter Title  {{ $item->name }}">
                                                        </x-admin.form.label-end>
                                                    </div>
                                                    @if ($loop->first)
                                                        <div class="col-md-6 mb-4">
                                                            <x-admin.form.label-first class="form-label" name="sort">
                                                            </x-admin.form.label-first>
                                                            <x-admin.form.input old="{{ 'sort' }}"
                                                                name="{{ 'sort' }}" type="number" required=""
                                                                placeholder="sort" class="form-control valid"
                                                                :value="$management->sort">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*" name="please enter sort">
                                                            </x-admin.form.label-end>
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
                                                                                <x-admin.form.radio :checked="$management->status ==
                                                                                $status
                                                                                    ? 'checked'
                                                                                    : ''"
                                                                                    name="status"
                                                                                    value="{{ $status }}"
                                                                                    :model="$management">
                                                                                </x-admin.form.radio>
                                                                                <label class="form-check-label"
                                                                                    for="bsValidation6">{{ $status }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
    {{-- UpdateEmployForm --}}
    <script src="{{ asset('admin/pages/js/edit.js') }}"></script>
@endsection
