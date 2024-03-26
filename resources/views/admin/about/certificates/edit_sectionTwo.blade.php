@extends('admin.layouts.master')
@section('titleadmin')
{{ str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type))) }}
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
                        <input type="hidden" id="key_new" value="{{ $translation->count() }}">
                        @foreach ($translation as $key=>$item)
                        <form method="post" id="myForm{{ $key }}" action="{{ $action??'' }}"
                            enctype="multipart/form-data">
                            @include('components.admin.form.csrf')
                            <div class="tab-content py-3">
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}"
                                    role="tabpanel">
                                    <div class="card-body p-4">

                                        <div class="card-body p-4 row">
                                            {{-- ----------start static --}}
                                            <input type="hidden" name="pages_id" value="{{ $SelectPages->id ?? '' }}">
                                            <input type="hidden" name="category"
                                                value="{{ Request()->category ?? '' }}">
                                            <input type="hidden" name="subcategory"
                                                value="{{ Request()->subcategory ?? '' }}">
                                            <input type="hidden" name="item" value="{{ Request()->item ?? '' }}">
                                            {{-- ----------first title --}}
                                            <div class="col-md-6">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Title  {{ $item->name  }}"></x-admin.form.label-first>
                                                <x-admin.form.input id="title" old="{{ 'title.'.$item->key }}"
                                                    name="{{ 'title'.'['.$item->key.']' }}" type="text" required=""
                                                    placeholder="Title {{ $item->name }}" class="form-control valid"
                                                    :value="$StaticTable->translate('title', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Title  {{ $item->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end title --}}
                                            {{-- ----------first subtitle --}}
                                            <div class="col-md-6">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="subtitle  {{ $item->name  }}"></x-admin.form.label-first>
                                                <x-admin.form.input id="subtitle" old="{{ 'subtitle.'.$item->key }}"
                                                    name="{{ 'subtitle'.'['.$item->key.']' }}" type="text" required=""
                                                    placeholder="subtitle {{ $item->name }}" class="form-control valid"
                                                    :value="$StaticTable->translate('subtitle', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter subtitle  {{ $item->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end subtitle --}}
                                            {{-- ----------first subsubtitle --}}
                                            <div class="col-md-6">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Sub Sub Title  {{ $item->name  }}"></x-admin.form.label-first>
                                                <x-admin.form.input id="subsubtitle"
                                                    old="{{ 'subsubtitle.'.$item->key }}"
                                                    name="{{ 'subsubtitle'.'['.$item->key.']' }}" type="text"
                                                    required="" placeholder="Sub Sub Title {{ $item->name }}"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('subsubtitle', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end
                                                    name="please enter Sub Sub Title  {{ $item->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end subsubtitle --}}

                                            {{-- ----------first url --}}
                                            <div class="col-md-6">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="url  {{ $item->name  }}"></x-admin.form.label-first>
                                                <x-admin.form.input id="url" old="{{ 'url.'.$item->key }}"
                                                    name="{{ 'url'.'['.$item->key.']' }}" type="text" required=""
                                                    placeholder="url {{ $item->name }}" class="form-control valid"
                                                    :value="$StaticTable->translate('url', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter url  {{ $item->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end url --}}
                                            {{-- ----------first years_text --}}
                                            <div class="col-md-6">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Years Text  {{ $item->name  }}"></x-admin.form.label-first>
                                                <x-admin.form.input id="years_text" old="{{ 'years_text.'.$item->key }}"
                                                    name="{{ 'years_text'.'['.$item->key.']' }}" type="text" required=""
                                                    placeholder="Years Text {{ $item->name }}"
                                                    class="form-control valid"
                                                    :value="$StaticTable->translate('years_text', $item->key)">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Years Text  {{ $item->name  }}">
                                                </x-admin.form.label-end>
                                            </div>
                                            {{-- ----------end years_text --}}
                                            {{-- ----------Description first --}}
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="form-label"
                                                    name="Description  {{ $item->name  }}">
                                                </x-admin.form.label-first>
                                                <x-admin.form.text old="{{ 'description.'.$item->key }}"
                                                    name="{{ 'description'.'['.$item->key.']' }}" type="text"
                                                    placeholder="Description {{ ucfirst($item->name)  }}"
                                                    :value="$StaticTable->translate('description', $item->key)">
                                                </x-admin.form.text>
                                                <x-admin.form.label-end star="*"
                                                    name="please enter Name  {{ $item->name  }}">
                                                </x-admin.form.label-end>

                                            </div>
                                            {{-- ----------Description end --}}
                                            {{-- ----------first image--}}
                                            @if ($loop->first)
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="StaticTable"
                                                        old="image" name="image" type="file" readonly=""
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            @endif
                                            {{-- ----------end image--}}
                                            {{-- ----------first Pdf--}}
                                            @if ($loop->first)
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first star="*" class="col-sm-3 col-form-label"
                                                    name="File Upload Pdf">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="StaticTable2"
                                                        old="image2" name="image2" type="file" readonly=""
                                                        placeholder="Please Enter Pdf" id="image" class="dropify"
                                                        DataHeight="300">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>
                                            @endif
                                            {{-- ----------end Pdf--}}
                                            {{-- ----------sort first --}}
                                            @if ($loop->first)
                                            <div class="col-md-12 mb-4">
                                                <x-admin.form.label-first class="form-label" name="sort">
                                                </x-admin.form.label-first>
                                                <x-admin.form.input old="{{ 'sort' }}" name="{{ 'sort' }}" type="number"
                                                    required="" placeholder="sort" class="form-control valid"
                                                    :value="$StaticTable->sort">
                                                </x-admin.form.input>
                                                <x-admin.form.label-end star="*" name="please enter sort">
                                                </x-admin.form.label-end>
                                            </div>
                                            @endif
                                            {{-- ----------sort end --}}

                                            @if ($loop->first)
                                            {{-- ----------status first --}}
                                            <div class="col-md-6 mb-4">
                                                <x-admin.form.label-first class="form-label"
                                                    name="Checked switch checkbox status">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            @foreach (App\Models\Page::STATUS as $status)
                                                            <div class="form-check">
                                                                <x-admin.form.radio
                                                                    :checked="$StaticTable->status==$status?'checked':''"
                                                                    name="status" value="{{ $status }}"
                                                                    :model="$StaticTable">
                                                                </x-admin.form.radio>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $status }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ----------status end --}}

                                            @endif
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
<script src="{{ asset('admin/about/certificates/js/edit.js') }}"></script>
@endsection