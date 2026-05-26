@extends('admin.layouts.master')
@section('titleadmin') Homepage - Doc Validation @endsection

@section('contentadmin')
<div class="page-wrapper"><div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Homepage</div>
        <div class="ps-3"><nav><ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active">Doc Validation</li>
        </ol></nav></div>
    </div>

    @foreach(['add','update','info'] as $msg)
        @if(session($msg))
        <div class="alert alert-{{ $msg=='info'?'info':'success' }} alert-dismissible fade show">
            {{ session($msg) }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    @endforeach

    <div class="card">
        <div class="card-header d-flex align-items-center gap-3">
            <h5 class="mb-0">Doc Validation Section</h5>
            @if(!$record)
                <a href="{{ route('admin.homepage.home-doc-validation.create') }}" class="btn btn-primary btn-sm">
                    <i class="bx bxs-plus-square me-1"></i>Create
                </a>
            @else
                <a href="{{ route('admin.homepage.home-doc-validation.edit', $record->id) }}" class="btn btn-warning btn-sm">
                    <i class="bx bxs-edit me-1"></i>Edit
                </a>
            @endif
        </div>
        <div class="card-body">
            @if($record)
            <table class="table table-bordered table-hover text-center">
                <thead class="table-light">
                    <tr><th>#</th><th>Title (EN)</th><th>Items Count</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $record->translate('title','en') ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ $record->items->count() }} cards</span></td>
                        <td><span class="badge {{ $record->is_active ? 'bg-success':'bg-secondary' }}">{{ $record->is_active ? 'Active':'Inactive' }}</span></td>
                        <td><a href="{{ route('admin.homepage.home-doc-validation.edit', $record->id) }}" class="btn btn-sm btn-warning"><i class="bx bxs-edit"></i></a></td>
                    </tr>
                </tbody>
            </table>
            @else
            <div class="alert alert-warning mb-0">No record found. <a href="{{ route('admin.homepage.home-doc-validation.create') }}">Create one now</a>.</div>
            @endif
        </div>
    </div>
</div></div>
@endsection
