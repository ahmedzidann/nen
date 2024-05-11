@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
@endsection
@section('cssadmin')
@endsection
@section('contentadmin')
<br><br>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
                    {{-- <div class="card-body"> --}}
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <p>{{ TranslationHelper::translate('Role Name :') }}</p>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- col -->
                            {{-- startRow Dashboard --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Dashboard</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'dashboard_view', false, array('class'
                                                =>
                                                'name')) }}
                                                Dashboard View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}

                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- endRow Dashboard --}}
                            <!-- /col -->
                            <!-- col -->
                            {{-- startRow Home Controller --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Home Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'home_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Home Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_homePage_view', false,
                                                array('class' =>
                                                'name')) }}
                                                ContactUs HomePage View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_homePage_update', false,
                                                array('class' =>
                                                'name')) }}
                                                ContactUs HomePage Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_homePage_delete', false,
                                                array('class' =>
                                                'name')) }}
                                                ContactUs HomePage Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'apply_for_job_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Apply For Job View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'apply_for_job_update', false,
                                                array('class' =>
                                                'name')) }}
                                                Apply For Job Update <div class="main-content-label mg-b-5">

                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'apply_for_job_delete', false,
                                                array('class' =>
                                                'name')) }}
                                                Apply For Job Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'apply_for_job_download', false,
                                                array('class' =>
                                                'name')) }}
                                                Apply For Job Download
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'item_view', false, array('class' =>
                                                'name')) }}
                                                Item View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'item_update', false, array('class' =>
                                                'name')) }}
                                                Item Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'item_delete', false, array('class' =>
                                                'name')) }}
                                                Item Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- endRow Home Controller --}}
                            <!-- col -->
                            {{-- startRow Orchidia --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Orchidia Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            {{ Form::checkbox('permission[]', 'orchidia_controller_view', false,
                                            array('class' =>
                                            'name')) }}
                                            Orchidia Controller View
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- endRow Orchidia --}}
                            {{-- start product_controller_view --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Product Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'product_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Product Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_product_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Contactus Product View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_product_update', false,
                                                array('class' =>
                                                'name')) }}
                                                Contactus Product Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_product_delete', false,
                                                array('class' =>
                                                'name')) }}
                                                Contactus Product Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'product_view', false, array('class'
                                                =>
                                                'name')) }}
                                                Product View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'product_create', false, array('class'
                                                =>
                                                'name')) }}
                                                Product Create
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'product_update', false, array('class'
                                                =>
                                                'name')) }}
                                                Product Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'product_delete', false, array('class'
                                                =>
                                                'name')) }}
                                                Product Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end product_controller_view --}}
                            {{-- start cme_controller_view --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Cme Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'cme_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Cme Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end product_controller_view --}}
                            {{-- start investors_controller_view --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Investors Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'investors_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Investors Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end investors_controller_view --}}
                            {{-- start Careers Controller --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Careers Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'careers_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Careers Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Careers Controller --}}
                            {{-- start Careers Controller --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Contactus Controller</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'contact_us_controller_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Contactus Controller View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Careers Controller --}}
                            {{-- start Country --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Country</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'country_view', false, array('class'
                                                =>
                                                'name')) }}
                                                Country View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'country_create', false, array('class'
                                                =>
                                                'name')) }}
                                                Country Create
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'country_update', false, array('class'
                                                =>
                                                'name')) }}
                                                Country Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'country_delete', false, array('class'
                                                =>
                                                'name')) }}
                                                Country Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Country --}}
                            {{-- start Hr --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Hr</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'hr_view', false, array('class' =>
                                                'name')) }}
                                                Hr View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'admin_view', false, array('class' =>
                                                'name')) }}
                                                Admin View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'admin_create', false, array('class'
                                                =>
                                                'name')) }}
                                                Admin Create
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'admin_update', false, array('class'
                                                =>
                                                'name')) }}
                                                Admin Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'admin_delete', false, array('class'
                                                =>
                                                'name')) }}
                                                Admin Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'roles_view', false, array('class' =>
                                                'name')) }}
                                                Roles View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'roles_create', false, array('class'
                                                =>
                                                'name')) }}
                                                Roles Create
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'roles_update', false, array('class'
                                                =>
                                                'name')) }}
                                                Roles Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'roles_delete', false, array('class'
                                                =>
                                                'name')) }}
                                                Roles Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}


                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Hr --}}

                            {{-- start Hr --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Opening Hours</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'openinghours_view', false,
                                                array('class' =>
                                                'name')) }}
                                                Opening Hours View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'openinghours_create', false,
                                                array('class' =>
                                                'name')) }}
                                                Opening Hours Create
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'openinghours_update', false,
                                                array('class' =>
                                                'name')) }}
                                                Opening Hours Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'openinghours_delete', false,
                                                array('class' =>
                                                'name')) }}
                                                Opening Hours Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Hr --}}
                            {{-- start Hr --}}
                            <div class="col-12">
                                <ul id="treeview1">
                                    <li><a>Settings</a>
                                        <ul>
                                    </li>
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'settings_view', false, array('class'
                                                =>
                                                'name')) }}
                                                Settings View
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'settings_update', false,
                                                array('class' =>
                                                'name')) }}
                                                Settings Update
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    {{-- start make permission role --}}
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label>
                                                {{ Form::checkbox('permission[]', 'settings_delete', false,
                                                array('class' =>
                                                'name')) }}
                                                Settings Delete
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End make permission role --}}
                                    </li>

                                </ul>
                                </li>
                                </ul>
                            </div>
                            {{-- end Hr --}}

                            <!-- /col -->
                        </div>

                        <div class="mb-3 col-md-12">
                            <x-admin.form.submit type="submit" :route="route('admin.roles.index')">
                            </x-admin.form.submit>
                        </div>
                        {!! Form::close() !!}
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>

        @endsection


        @section('jsadmin')
        @endsection