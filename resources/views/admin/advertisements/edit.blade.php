@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Advertisements'))) }}
@endsection
@section('cssadmin')
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.advertisements.index') }}">
                        Advertisements
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Advertisements')) }}
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
                                action="{{ route('admin.advertisements.update', ['advertisement' => $row->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="tab-content py-3">
                                    @foreach ($langs as $lang)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="lang{{ $lang->id }}" role="tabpanel">
                                            <div class="card-body p-4 row">
                                                <div class="form-group col-md-12">
                                                    <label for="title_{{ $lang->key }}">Title in
                                                        {{ ucfirst($lang->name) }}</label>
                                                    <input type="text" class="form-control"
                                                        id="title_{{ $lang->key }}" name="title[{{ $lang->key }}]"
                                                        value="{{ old('title.' . $lang->key, $row->getTranslation('title', $lang->key)) }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="mini_desc_{{ $lang->key }}">Mini Description in
                                                        {{ ucfirst($lang->name) }}</label>
                                                    <textarea class="form-control" id="mini_desc_{{ $lang->key }}" name="mini_desc[{{ $lang->key }}]"
                                                        rows="3">{{ old('mini_desc.' . $lang->key, $row->getTranslation('mini_desc', $lang->key)) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="card-body p-4 row">
                                    <div class="form-group col-md-12 ">
                                        <label for="title">Link</label>
                                        <input type="url" class="form-control" id="link" name="link"
                                            value="{{ $row->link }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="image"> Image</label>
                                        <input type="file" class="form-control-file dropify" id="image"
                                            name="image"
                                            data-default-file="{{ $row->image ? asset('storage/' . $row->image) : '' }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="activeOption" value="1"
                                                name="is_active" {{ $row->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="activeOption">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="inactiveOption"
                                                value="0" name="is_active" {{ !$row->is_active ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inactiveOption">Inactive</label>
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
    <script src="{{ asset('admin/custom/js/edit.js') }}"></script>
@endsection
