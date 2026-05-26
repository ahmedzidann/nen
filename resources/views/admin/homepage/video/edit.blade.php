@extends('admin.layouts.master')

@section('titleadmin')
    Homepage - Edit Video Section
@endsection

@section('contentadmin')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Homepage</div>
            <div class="ps-3"><nav aria-label="breadcrumb"><ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.homepage.video.index') }}">Video Section</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol></nav></div>
        </div>

        <div class="card">
            <div class="card-header"><h5 class="mb-0">Edit Video Section</h5></div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-danger mb-3" role="tablist">
                    @foreach($translation as $item)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            href="#tab-{{ $item->id }}" role="tab">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i></div>
                                <div class="tab-title">{{ ucfirst($item->name) }}</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="{{ $method }}">

                    <div class="tab-content">
                        @foreach($translation as $item)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $item->id }}" role="tabpanel">
                            <div class="row g-3 mt-1">

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Title ({{ ucfirst($item->name) }})</label>
                                    <input type="text" name="title[{{ $item->key }}]"
                                        value="{{ old('title.' . $item->key, $StaticTable->translate('title', $item->key)) }}"
                                        class="form-control @error('title.' . $item->key) is-invalid @enderror"
                                        placeholder="Title in {{ ucfirst($item->name) }}">
                                    @error('title.' . $item->key)<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Description ({{ ucfirst($item->name) }})</label>
                                    <textarea name="description[{{ $item->key }}]"
                                        class="form-control @error('description.' . $item->key) is-invalid @enderror"
                                        rows="4" placeholder="Description in {{ ucfirst($item->name) }}">{{ old('description.' . $item->key, $StaticTable->translate('description', $item->key)) }}</textarea>
                                    @error('description.' . $item->key)<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Button Text ({{ ucfirst($item->name) }})</label>
                                    <input type="text" name="button_text[{{ $item->key }}]"
                                        value="{{ old('button_text.' . $item->key, $StaticTable->translate('button_text', $item->key)) }}"
                                        class="form-control"
                                        placeholder="e.g. Learn More">
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>

                    <hr>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">YouTube URL <span class="text-danger">*</span></label>
                            <input type="url" name="youtube_url"
                                value="{{ old('youtube_url', $StaticTable->youtube_url) }}"
                                class="form-control @error('youtube_url') is-invalid @enderror"
                                placeholder="https://www.youtube.com/embed/XXXXXXXXX">
                            @error('youtube_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-muted">Use the embed URL format: https://www.youtube.com/embed/VIDEO_ID</small>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Button URL</label>
                            <input type="url" name="button_url"
                                value="{{ old('button_url', $StaticTable->button_url) }}"
                                class="form-control"
                                placeholder="https://example.com">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1" {{ old('is_active', $StaticTable->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $StaticTable->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bx bx-save me-1"></i>Update
                        </button>
                        <a href="{{ route('admin.homepage.video.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
