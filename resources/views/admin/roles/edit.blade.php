@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Roles Data'))) }}
@endsection
@section('cssadmin')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .group {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .group-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            margin: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 8px;
        }

        label {
            display: block;
            padding: 8px;
            background-color: #f9f9f9;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        label:hover {
            background-color: #e9e9e9;
        }

        input[type="checkbox"] {
            margin-left: 8px;
        }

        .group-checkbox {
            transform: scale(1.5);
            margin-right: 10px;
        }

        .group.checked {
            background-color: #e6f7ff;
        }

        .group.checked label {
            background-color: #d1e8ff;
        }
    </style>
@endsection
@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.roles.index') }}">
                        blogs
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Roles Data')) }}
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

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#en" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title"> English</div>

                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <form method="post" action="{{ $action }}">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!} --}}
                                <!-- row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mg-b-20">
                                            <div class="card-body">
                                                <div class="main-content-label mg-b-5">
                                                    <div class="col-xs-7 col-sm-7 col-md-7">
                                                        <div class="form-group">
                                                            <p>{{ TranslationHelper::translate('Role Name :') }}</p>
                                                            {!! Form::text('name', $role->name, ['class' => 'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="container">
                                                    <div class="row">
                                                        @foreach ($permission as $key => $group)
                                                            <div class="col-md-4">
                                                                <div class="group" id="group-{{ $key }}">
                                                                    <div class="group-header">
                                                                        <h2>{{ $key }}</h2>
                                                                        <input type="checkbox" class="group-checkbox"
                                                                            onchange="toggleGroup(this, 'group-{{ $key }}')">
                                                                    </div>
                                                                    <ul>
                                                                        @foreach ($group as $row)
                                                                            <li><label><input type="checkbox"
                                                                                        name="permission[]"
                                                                                        value="{{ $row->name }}"
                                                                                        {{ in_array($row->id, $rolePermissions) ? 'checked' : '' }}>
                                                                                    {{ $row->name }}</label></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            <!-- /col -->

                                            <x-admin.form.submit :type="$action"></x-admin.form.submit>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <!-- row closed -->
                    </div>
                    <!-- Container closed -->
                </div>
                <!-- main-content closed -->

                {{-- {!! Form::close() !!} --}}
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
    <script src="{{ asset('admin/roles/js/create.js') }}"></script>
    <script>
        function toggleGroup(checkbox, groupId) {
            const group = document.getElementById(groupId);
            const checkboxes = group.querySelectorAll('ul input[type="checkbox"]');
            checkboxes.forEach(cb => cb.checked = checkbox.checked);
            group.classList.toggle('checked', checkbox.checked);
        }
    </script>
@endsection
