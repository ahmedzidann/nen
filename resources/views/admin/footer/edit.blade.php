@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Footer Data'))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.footer.index') }}">
                        Footer Data
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('footer')) }}
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
                            <form id="myForm" action="{{ route('admin.footer.update', ['footer' => $footer->id]) }}"
                                method="post" enctype="multipart/form-data">
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
                                                            class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Type')) }}
                                                            <span style="color: red">{{ $star ?? '' }}</span> </label>
                                                        <br>
                                                        <select class="form-select w-100" id="type"
                                                            data-placeholder="Choose Type" name="type">

                                                            <option selected="" value="" disabled selected>
                                                                {{ ucfirst(TranslationHelper::translate('Select Type')) }}
                                                            </option>
                                                            @foreach (App\Enums\FooterType::getValues() as $type)
                                                                }
                                                                <option value="{{ $type }}"
                                                                    {{ $footer->type == $type ? 'selected' : '' }}>
                                                                    {{ App\Enums\FooterType::getName($type) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="form-group col-md-6">
                                                    <label for="title_{{ $lang->key }}">Title in
                                                        {{ ucfirst($lang->name) }}</label>
                                                    <input type="text" class="form-control"
                                                        id="title_{{ $lang->key }}" name="title[{{ $lang->key }}]"
                                                        value="{{ old('title.' . $lang->key, $footer->getTranslation('title', $lang->key)) }}"
                                                        required>
                                                </div>
                                                @if ($loop->first)
                                                    <div class="form-group col-md-12 ">
                                                        <label for="url">Enter URL</label>
                                                        <input type="url" class="form-control" id="url"
                                                            name="url" value="{{ old('url', $footer->url) }}" required>
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
@endsection
