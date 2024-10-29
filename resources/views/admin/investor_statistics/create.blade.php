@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Investor Statistics'))) }}
@endsection
@section('cssadmin')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.investor-statistics.index') }}">
                        Investor Statistics
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Investor Statistics')) }}
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
                            <form id="myForm" action="{{ route('admin.investor-statistics.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- @foreach ($translation as $key => $item) --}}
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="1" role="tabpanel">
                                        <div class="card-body p-4">
                                            {{-- --------start --}}
                                            <div class="card-body p-4 row">
                                                <div class="col-md-6">
                                                    <label
                                                        class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Year')) }}
                                                        <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                    <select class="form-select w-100" id="year"
                                                        data-placeholder="Choose Year" name="year">

                                                        <option selected="" value="" disabled selected>
                                                            {{ ucfirst(TranslationHelper::translate('Select Year')) }}
                                                        </option>
                                                        @for ($i = 2006; $i <= date('Y'); $i++)
                                                            @if (!in_array($i, $years->toArray()))
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="capital_value">Capital Value</label>
                                                    <input type="number" class="form-control" id="capital_value"
                                                        name="capital_value" value="{{ old('capital_value') }}" required>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="revenue_value">Revenue Value</label>
                                                    <input type="number" class="form-control" id="revenue_value"
                                                        name="revenue_value" value="{{ old('revenue_value') }}" required>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="profit_value">Profit Value</label>
                                                    <input type="number" class="form-control" id="profit_value"
                                                        name="profit_value" value="{{ old('profit_value') }}" required>
                                                </div>
                                            </div>
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
    <script src="{{ asset('admin/education/js/create.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $('.multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
