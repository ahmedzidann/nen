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
        <x-admin.form.breadcrumb :name="$viewTable" :routeView="$routeView" :type="$type"></x-admin.form.breadcrumb>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs')??'') }}</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            @foreach ($translation as $item)

                            <li class="nav-item" role="presentation">
                                <a class="nav-link {{ $loop->first?'active':'' }}" data-bs-toggle="tab"
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
                        <form method="post" action="{{ $action??'' }}" enctype="multipart/form-data">
                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                @foreach ($translation as $item)
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}"
                                    role="tabpanel">
                                    <div class="card-body p-4">
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Username  {{ $item->name  }}">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="{{ 'name.'.$item->key }}"
                                                    name="{{ 'name'.'['.$item->key.']' }}" type="text"
                                                    required="{{ $loop->first?'required':'' }}"
                                                    placeholder="Username {{ $item->name }}" class="form-control valid"
                                                    :value="$admin->translate('name', $item->key)"></x-admin.form.input>
                                            </div>
                                        </div>
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Phone">
                                            </x-admin.form.label-first>
                                            <input type="hidden" id="key" name="key" value="">
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="phone" name="phone" type="text" id="telephone"
                                                    required='required' placeholder="Phone" class="form-control valid"
                                                    :value="$admin->phone"></x-admin.form.input>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Email">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="email" name="email" type="email"
                                                    required='required' placeholder="Email" class="form-control valid"
                                                    :value="$admin->email"></x-admin.form.input>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Choose Password">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="password" name="password" type="password"
                                                    placeholder="password" class="form-control valid">
                                                </x-admin.form.input>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Confirm Password">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input old="confirm-password" name="confirm-password"
                                                    type="password" placeholder="confirm-password"
                                                    class="form-control valid"></x-admin.form.input>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Select Roles">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                {{-- $model --}}
                                                <x-admin.form.role disabled="disabled" required="required"
                                                    :foreach="$roles" name="roles" nameselect="Roles"
                                                    :model="$AdminRole">
                                                </x-admin.form.role>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="Address  {{ $item->name  }}">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.text old="{{ 'address.'.$item->key }}"
                                                    name="{{ 'address'.'['.$item->key.']' }}" type="text"
                                                    placeholder="address {{ ucfirst($item->name)  }}"
                                                    :value="$admin->translate('address', $item->key)">
                                                </x-admin.form.text>
                                            </div>
                                        </div>
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first class="col-sm-3 col-form-label"
                                                name="Checked switch checkbox status">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-3">
                                                    @foreach (App\Models\Admin::STATUS as $status)
                                                    <div class="form-check">
                                                        <x-admin.form.radio name="status"
                                                            :checked="$admin->status==$status?'checked':''"
                                                            value="{{ $status }}" :model="$admin"></x-admin.form.radio>
                                                        <label class="form-check-label" for="bsValidation6">{{
                                                            $status }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($loop->first)
                                        <div class="row mb-3">
                                            <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                name="File Upload">
                                            </x-admin.form.label-first>
                                            <div class="col-sm-9">
                                                <x-admin.form.input :model="$admin" nameImage="Admin" old="image"
                                                    name="image" type="file" readonly=""
                                                    placeholder="Please Enter Image" id="image" class="dropify"
                                                    DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                </x-admin.form.input>
                                            </div>
                                        </div>
                                        @endif


                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="input41"
                                                        name="agree">
                                                    <label class="form-check-label" for="input41">{{
                                                        TranslationHelper::translate(ucfirst('Check me out')??'')
                                                        }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <x-admin.form.submit type="submit"></x-admin.form.submit>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
@endsection