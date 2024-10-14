@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Education Description'))) }}
@endsection

@section('cssadmin')
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.education-descriptions.index') }}">
                        Education Description
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('Education Description')) }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">{{ TranslationHelper::translate(ucfirst('Nav Tabs') ?? '') }}</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-danger" role="tablist">
                                @foreach ($langs as $item)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            href="#lang{{ $item->id }}" role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i></div>
                                                <div class="tab-title"> {{ ucfirst($item->name) }}</div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <form id="myForm" action="{{ route('admin.education-descriptions.update', ['education_description' => $description->id]) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="tab-content">
                                    @foreach ($langs as $lang)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                            id="lang{{ $lang->id }}" role="tabpanel">
                                            <div class="card-body p-4 row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description in {{ $lang->name }}</label>
                                                    <textarea class="form-control" id="description" name="description[{{ $lang->key }}]">{{ old('description.' . $lang->key, $description->getTranslation('description', $lang->key)) }}</textarea>
                                                </div>
                                                @if ($loop->first)
                                                    <div class="card-body p-4 row">
                                                        <div class="form-group col-md-12">
                                                            <label for="main_image" Image</label>
                                                            <input type="file" class="form-control-file dropify"
                                                                id="image" name="image"
                                                                data-default-file="{{ asset('storage') . '/' . $description->image }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit"
                                            class="btn btn-primary px-4">{{ TranslationHelper::translate(ucfirst('Submit') ?? '') }}</button>
                                        <button type="reset"
                                            class="btn btn-light px-4">{{ TranslationHelper::translate(ucfirst('Reset') ?? '') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
@endsection

@section('jsadmin')
    @include('admin.layouts.ckeditor.ckeditor')
    <script src="{{ asset('admin/custom/js/edit.js') }}"></script>
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
                    <input type="file" class="form-control" name="images[]" accept="image/*">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="image_titles[]" placeholder="Image Title">
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
