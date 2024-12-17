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
                                                    <div class="col-md-12 mb-4">
                                                        <x-admin.form.label-first star="*" class="form-label"
                                                            name="Text  {{ $item->key }}"></x-admin.form.label-first>
                                                        <x-admin.form.input id="title" old="{{ 'text.' . $item->key }}"
                                                            name="{{ 'text' . '[' . $item->key . ']' }}" type="text"
                                                            required="" placeholder="Text {{ $item->key }}"
                                                            class="form-control valid" :value="$StaticTable->translate('text', $item->key)">
                                                        </x-admin.form.input>
                                                        <x-admin.form.label-end star="*"
                                                            name="please enter Text  {{ $item->key }}">
                                                        </x-admin.form.label-end>
                                                    </div>

                                                    {{-- ----------first image --}}
                                                    @if ($loop->first)
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'facebook_link' }}" name="facebook_link"
                                                                type="url" required="" placeholder="facebook_link"
                                                                class="form-control valid" :value="$StaticTable->facebook_link">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter facebook_link">
                                                            </x-admin.form.label-end>
                                                        </div>

                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'twitter_link' }}" name="twitter_link"
                                                                type="url" required="" placeholder="twitter_link"
                                                                class="form-control valid" :value="$StaticTable->twitter_link">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter twitter_link">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'instagram_link' }}" name="instagram_link"
                                                                type="url" required="" placeholder="instagram_link"
                                                                class="form-control valid" :value="$StaticTable->instagram_link">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter instagram_link">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'instagram_link' }}" name="instagram_link"
                                                                type="url" required="" placeholder="instagram_link"
                                                                class="form-control valid" :value="$StaticTable->instagram_link">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter instagram_link">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'youtube_link' }}" name="youtube_link"
                                                                type="url" required="" placeholder="youtube_link"
                                                                class="form-control valid" :value="$StaticTable->youtube_link">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter youtube_link">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'whats_number' }}" name="whats_number"
                                                                type="text" required="" placeholder="whats_number"
                                                                class="form-control valid" :value="$StaticTable->whats_number">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter whats number">
                                                            </x-admin.form.label-end>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <x-admin.form.input old="{{ 'telegram_number' }}" name="telegram_number"
                                                                type="text" required="" placeholder="telegram_number"
                                                                class="form-control valid" :value="$StaticTable->telegram_number">
                                                            </x-admin.form.input>
                                                            <x-admin.form.label-end star="*"
                                                                name="please enter telegram number">
                                                            </x-admin.form.label-end>
                                                        </div>

                                                    @endif
                                                    {{-- ----------end image --}}

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
    <script src="{{ asset('admin/solution/js/edit.js') }}"></script>
@endsection
