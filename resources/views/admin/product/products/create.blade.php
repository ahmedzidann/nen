@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Blog'))) }}
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
                    <a href="{{ route('admin.products.index') }}">
                        Products
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Products')) }}
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
                            <form id="myForm" action="{{ route('admin.products.store') }}" method="post"
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
                                                        class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Vendors')) }}
                                                        <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                    <select class="form-select w-100" data-placeholder="Choose Vendors"
                                                        name="vendor_id">

                                                        <option selected="" value="" disabled selected>
                                                            {{ ucfirst(TranslationHelper::translate('Select Vendor')) }}
                                                        </option>
                                                        @foreach ($vendors as $vendor)
                                                            }
                                                            <option value="{{ $vendor->id }}">
                                                                {{ $vendor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Categories')) }}
                                                        <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                    <select class="form-select z w-100" data-placeholder="Choose Category"
                                                        name="product_category_id">

                                                        <option selected="" value="" disabled selected>
                                                            {{ ucfirst(TranslationHelper::translate('Select Category')) }}
                                                        </option>
                                                        @foreach ($categories as $item)
                                                            }
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="name">Product Name in English</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name[en]" value="{{ old('name[en]') }}" required>
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" id="price" name="price"
                                                        value="{{ old('price') }}" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description in English</label>
                                                    <textarea class="form-control " id="description" name="description[en]">{{ old('description[en]') }}</textarea>

                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="main_image">Main Image</label>
                                                    <input type="file" class="form-control-file dropify" id="main_image"
                                                        name="main_image">
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                    <label for="sort">Sort:</label>
                                                    <input type="number" class="form-control" id="sort" name="sort"
                                                        value="{{ old('sort') }}" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="activeOption"
                                                            value="1" name="is_active">
                                                        <label class="form-check-label" for="activeOption">Active</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input"
                                                            id="inactiveOption" value="0" name="is_active">
                                                        <label class="form-check-label"
                                                            for="inactiveOption">Inactive</label>
                                                    </div>
                                                </div>
                                                <div id="image-container">
                                                    <div class="row mb-3 image-row">
                                                        <div class="col">
                                                            <input type="file" class="form-control imageUpload" name="images[]"
                                                                accept="image/*">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control"
                                                                name="titles[][en]" placeholder="Image Title">
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-danger remove-image"><i
                                                                    class="bx bxs-trash"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-success mb-3" id="add-image"><i
                                                        class="bx bx-plus"></i></button>

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
        $('.select2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
    <script>
        document.getElementById('add-image').addEventListener('click', function() {
            const container = document.getElementById('image-container');
            const newRow = document.createElement('div');
            newRow.className = 'row mb-3 image-row';
            newRow.innerHTML = `
                <div class="col">
                    <input type="file" class="form-control imageUpload" name="images[]" accept="image/*">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="titles[][en]" placeholder="Image Title">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger remove-image"><i class="bx bxs-trash"></i></button>
                </div>
            `;
            container.appendChild(newRow);
        });

        document.getElementById('image-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-image')) {
                e.target.closest('.image-row').remove();
            }
        });
    </script>
@endsection
