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

                            <input type="hidden" name="category"
                                   value="{{ Request()->category ?? '' }}">
                            <input type="hidden" name="subcategory"
                                   value="{{ Request()->subcategory ?? '' }}">

                            <div class="tab-content py-3">
                                <div class="tab-pane fade {{ $loop->first?'show active':'' }}" id="{{ $item->id }}"
                                    role="tabpanel">
                                    <div class="card-body p-4">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">
                                            {{-- ----------start static --}}

                                            {{-- ----------end static --}}
                                            {{-- ----------name Pages --}}

                                            {{-- ----------end Pages --}}
                                            {{-- ----------name first --}}
                                            <div class="col-md-12 mb-4">
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
                                            {{-- ----------name first --}}

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

                                            <div class="col-md-9 mb-4">
                                                <x-admin.form.label-first  class="col-sm-3 col-form-label"
                                                    name="File Upload Image">
                                                </x-admin.form.label-first>
                                                <div class="col-sm-9">
                                                    <x-admin.form.input :model="$StaticTable" nameImage="DocValidation"
                                                        old="image" name="image" type="file" readonly=""
                                                        placeholder="Please Enter Image" id="image" class="dropify"
                                                        DataHeight="300" accept=".jpg, .png, image/jpeg, image/png">
                                                    </x-admin.form.input>
                                                </div>
                                            </div>


                                            @endif
                                            {{-- ----------end image--}}
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

                                            <br>

                                            @if($StaticTable->details->count())


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id='inputs-container-{{$item->id}}'>
                                                            <label>{{ TranslationHelper::translate(ucfirst('Details')??'') }}</label>

                                                            @foreach($StaticTable->details as $details)
                                                                <div id="input-template-{{$item->id}}-{{$details->id}}"  class="input-temp" style="">
                                                                    <div class="col-md-12 mb-4 row">
                                                                        <div class="col-md-10 row">

                                                                            <input type="hidden" name="{{ 'old_details_id'.'['.$item->key.'][]' }}" value="{{$details->id}}">
                                                                            <div class="col-sm-12">

                                                                                <x-admin.form.input name="{{ 'old_details_title'.'['.$item->key.'][]' }}" type="text" required="" placeholder="title {{ $item->name  }}" class="form-control valid" value="{{ $details->translate('title', $item->key)}}">
                                                                                </x-admin.form.input>
                                                                            </div>
                                                                            {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                            </x-admin.form.label-end> --}}
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <button data-id="{{$details->id}}" data-item="{{$item->id}}" type="button" class="btn btn-danger delete-input">
                                                                                <i class="bx bxs-trash"></i>&nbsp;</button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Add more input fields as needed -->

                                                                </div>

                                                            @endforeach
                                                        </div>

                                                        <button id="add-input" data-item="{{$item->id}}"  data-key="{{$item->key}}" data-trans="{{$item->name}}" type="button" class="col-sm-1 btn btn-success addItem">
                                                            <i class='bx bx-plus' ></i></i>&nbsp;
                                                        </button>

                                                    </div>



                                                </div>

                                            @endif






                                            <input type="hidden" name="submit2" value="{{ $item->key }}">
                                            <div class="col-md-12 my-4">
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
<script src="{{ asset('admin/education/js/edit.js') }}"></script>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to create a new input field

        $(document).on('click','.addItem',function (){

            var item_id=$(this).attr('data-item');
            var trans=$(this).attr('data-trans');
            var random = Math.floor(Math.random() * (999999999 - 2 + 1)) + 999999999;
            var key=$(this).attr('data-key');


            var row=`

                                                                 <div id="input-template-${item_id}-${random}"  class="input-temp" style="">
                                                        <div class="col-md-12 mb-4 row">
                                                            <div class="col-md-10 row">

                                                                <div class="col-sm-12">

                                                                    <x-admin.form.input name="details_title[${key}][]" type="text" required="" placeholder="title ${trans}" class="form-control valid">
                                                                    </x-admin.form.input>
                                                                </div>
                                                                {{-- <x-admin.form.label-end star="*" name="Please enter title">
                                                                </x-admin.form.label-end> --}}
            </div>
            <div class="col-md-2">
                <button data-id="${random}" data-item="${item_id}" type="button" class="btn btn-danger delete-input">
                    <i class="bx bxs-trash"></i>&nbsp;</button>
            </div>
        </div>
        <!-- Add more input fields as needed -->

    </div>




`;

            $(`#inputs-container-${item_id}`).append(row);
        })

        $(document).on('click','.delete-input',function (){

            var id=$(this).attr('data-id');
            var item=$(this).attr('data-item')

            $(`#input-template-${item}-${id}`).remove();



        })
    });

</script>
