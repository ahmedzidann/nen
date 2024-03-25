@extends('admin.layouts.master')

@section('titleadmin')
{{ str_replace("-"," ",ucfirst($type.' '.$nameView)) }}
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')

<div class="content-body">
    <x-admin.route :route="$RouteIndex" name="{{ TranslationHelper::translate($IndexView) }}"></x-admin.route>
    <!-- container starts -->
    <div class="container-fluid">
        <!-- row -->
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <x-admin.crud name="{{ $type??'' }} {{ TranslationHelper::translate('Form '.$nameView) }}"></x-admin.crud>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{$action}}" enctype="multipart/form-data">
                            @include('components.admin.csrf')
                            <div class="row">
                                @foreach ($translation as $item)
                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="Name {{ ucfirst(TranslationHelper::translate($item->name))  }}">
                                    </x-admin.form.label-first>
                                    <x-admin.form.input old="{{ 'name.'.$item->key }}"
                                        name="{{ 'name'.'['.$item->key.']' }}" type="text"
                                        placeholder="Name {{ ucfirst($item->name)  }}"
                                        :value="$user->translate('name', $item->key)"></x-admin.form.input>
                                    <x-admin.form.label-end
                                        name="Please Enter {{ ucfirst($item->name) }} Admin Name">
                                    </x-admin.form.label-end>
                                </div>

                                @endforeach

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="Email"></x-admin.form.label-first>
                                    <x-admin.form.input old="email" :value="$user->email" name="email" type="email"
                                        placeholder="Example@test.com"></x-admin.form.input>
                                    <x-admin.form.label-end name="Please Enter Email">
                                    </x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="{{ TranslationHelper::translate('Password') }}"></x-admin.form.label-first>
                                    <x-admin.form.input old="password" name="password" type="password"
                                        placeholder="*********"></x-admin.form.input>
                                    <x-admin.form.label-end name="{{ TranslationHelper::translate('Please Enter Admin Password') }}"></x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="{{ TranslationHelper::translate('confirm Password') }}">
                                    </x-admin.form.label-first>
                                    <x-admin.form.input old="confirm-password" name="confirm-password" type="password"
                                        placeholder="*********"></x-admin.form.input>
                                    <x-admin.form.label-end name="{{ TranslationHelper::translate('Please Enter Admin Confirm Password') }}">
                                    </x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="Address"></x-admin.form.label-first>
                                    <x-admin.form.input old="address" :value="$user->address" name="address" type="text"
                                        placeholder="address"></x-admin.form.input>
                                    <x-admin.form.label-end name="Please Enter Address">
                                    </x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="Mobile"></x-admin.form.label-first>
                                    <x-admin.form.input old="mobile" :value="$user->mobile" name="mobile" type="number"
                                        placeholder="mobile"></x-admin.form.input>
                                    <x-admin.form.label-end name="Please Enter Mobile">
                                    </x-admin.form.label-end>
                                </div>


                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="{{ TranslationHelper::translate('Gender') }}"></x-admin.form.label-first>
                                    <x-admin.form.state :foreach="App\Models\Admin::GENDER" :model="$user" name="gender"></x-admin.form.state>
                                    <x-admin.form.label-end name="{{ TranslationHelper::translate('Please Choose Gender') }}"> </x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first star="*" name="{{ TranslationHelper::translate('State') }}"></x-admin.form.label-first>
                                    <x-admin.form.state :foreach="App\Models\Admin::STATUS" :model="$user" name="status"></x-admin.form.state>
                                    <x-admin.form.label-end name="{{ TranslationHelper::translate('Please Choose State') }}"> </x-admin.form.label-end>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <x-admin.form.label-first name="{{ TranslationHelper::translate('Default file input Image') }}">
                                    </x-admin.form.label-first>
                                    <x-admin.form.image star="*" name="image" oldname="image" type="file"
                                        placeholder="{{ TranslationHelper::translate('Default file input Image') }}"></x-admin.form.image>
                                    <x-admin.form.label-end name="{{ TranslationHelper::translate('Please Upload file Image') }}"></x-admin.form.label-end>
                                    <img src="" id="mainThmb">
                                </div>

                                @livewire('location',
                                ['CityId'=>$user->City->id ?? '','CountryId'=>$user->Country->id ?? '','DistrictId'=>$user->District->id ?? '','DistrictShow'=>'show'])


                                </div>
                            </div>
                                <x-admin.form.submit :route="$RouteIndex"></x-admin.form.submit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsadmin')
@endsection
