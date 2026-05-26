@extends('admin.layouts.master')

@section('titleadmin')
    Homepage - Video Section
@endsection

@section('contentadmin')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Homepage</div>
            <div class="ps-3"><nav aria-label="breadcrumb"><ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Video Section</li>
            </ol></nav></div>
        </div>

        @if(session('add'))
            <div class="alert alert-success alert-dismissible fade show"><strong>✓</strong> {{ session('add') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show"><strong>✓</strong> {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show">{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif

        <div class="card">
            <div class="card-header d-flex align-items-center gap-3">
                <h5 class="mb-0">Video Section</h5>
                @if(!$record)
                    <a href="{{ route('admin.homepage.video.create') }}" class="btn btn-primary btn-sm">
                        <i class="bx bxs-plus-square me-1"></i>Create
                    </a>
                @else
                    <a href="{{ route('admin.homepage.video.edit', $record->id) }}" class="btn btn-warning btn-sm">
                        <i class="bx bxs-edit me-1"></i>Edit
                    </a>
                @endif
            </div>
            <div class="card-body">
                @if($record)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>YouTube URL</th>
                                <th>Title (EN)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <a href="{{ $record->youtube_url }}" target="_blank" class="text-primary">
                                        {{ \Illuminate\Support\Str::limit($record->youtube_url, 50) }}
                                    </a>
                                </td>
                                <td>{{ $record->translate('title', 'en') ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $record->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $record->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.homepage.video.edit', $record->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning mb-0">
                        No video record found. <a href="{{ route('admin.homepage.video.create') }}">Create one now</a>.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
