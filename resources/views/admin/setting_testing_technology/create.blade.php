@extends('admin.layouts.master')
@section('titleadmin')
    {{ str_replace('-', ' ', ucfirst(TranslationHelper::translate('Testing Technology Settings'))) }}
@endsection
@section('cssadmin')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('contentadmin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    <a href="{{ route('admin.setting_technology_testing.index') }}">
                        Sidebar Resources
                    </a>
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ str_replace('-', ' ', ucfirst('sections technology testing')) }}
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
                            <form id="myForm" action="{{ route('admin.setting_technology_testing.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- @foreach ($translation as $key => $item) --}}
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade show active" id="1" role="tabpanel">
                                        {{-- --------start --}}
                                        <div class="card-body p-4 row">
                                            <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Category')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="category_id"
                                                    data-placeholder="Choose Category" name="main_category_id">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select Category')) }}
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        }
                                                        <option value="{{ $category->slug }}"
                                                            data-id="{{ $category->id }}">
                                                            {{ $category->slug }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Sub Category')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="sub_categories"
                                                    data-placeholder="Choose Sub Category" name="sub_category_id">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select Sub Category')) }}
                                                    </option>

                                                </select>
                                            </div>
                                            

                                            <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">Title
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                              <input type="text" name="title[en]" value="" class="form-control"/>
                                            </div>

                                              <div class="col-md-4">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Section Design')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                                <select class="form-select w-100" id="design_section_id" onchange="get_image();"
                                                    data-placeholder="Choose Category" name="design_section_id">

                                                    <option selected="" value="" disabled selected>
                                                        {{ ucfirst(TranslationHelper::translate('Select design_section')) }}
                                                    </option>
                                                    @foreach ($designs as $design)
                                                        
                                                        <option value="{{ $design->id }}" data-image-src="{{ asset('content/images/design-sections/' . $design->title.'.png') }}"
                                                            >
                                                            {{ $design->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-2" style="padding-top: 32px;">
                                               
                                                


<!------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------>

<!-- Eye icon trigger -->
<a href="#"
   onclick="return false;"
   style="display:inline-flex; align-items:center; justify-content:center;
          width:34px; height:34px; background:#f8f9fa; border:1px solid #0d6efd;
          border-radius:50%; color:#0d6efd; cursor:pointer; font-size:18px;"
   data-bs-toggle="modal"
   data-bs-target="#viewModal"
   title="View">
    <i class="fa-solid fa-eye"></i>
</a>

<!-- Modal -->
<!-- Modal Preview -->
<div class="modal fade" id="viewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:70vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="text-align:center; max-height:70vh; overflow:auto;">
        <img id="modalImage"
             src=""
             alt="Preview"
             style="max-width:100%; max-height:100%; object-fit:contain; border-radius:5px;">
      </div>
    </div>
  </div>
</div>




<!------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------>




                                               </div>





                                            
                                            <div class="col-md-12">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Description')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                               <textarea rows="4" id="" class="form-control" placeholder="Description English" name="description[en]"/>  </textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Image1')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                               <input type="file" name="image_1" value="" class="dropify" id="image_1"  placeholder="Please Enter Image1" .jpg,="" .png,="" image="" jpeg,="" png="">
                                            </div>

                                            <div class="col-md-12">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">{{ ucfirst(TranslationHelper::translate('Image2')) }}
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                               <input type="file" name="image_2" value="" class="dropify" id="image_2"  placeholder="Please Enter Image2" .jpg,="" .png,="" image="" jpeg,="" png="">
                                            </div>
                                            
                                             <div class="col-md-6">
                                                <label
                                                    class="{{ $class ?? 'form-label' }}">Sort
                                                    <span style="color: red">{{ $star ?? '' }}</span> </label> <br>
                                              <input type="number" name="sort" value="" class="form-control"/>
                                            </div>
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
                                                                
                                                                <input type="radio" value="{{ $status }}" class="form-check-input" name="status"/>
                                                                <label class="form-check-label" for="bsValidation6">{{
                                                                    $status }}</label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- ----------status end --}}
                                           
                                         
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
    <script src="{{ asset('admin/setting_testing_technology/js/create.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var selectedValue = $(this).find(':selected').data('id');
                let url = '{{ route('admin.get-child-pages', ['page_id' => ':id']) }}';
                url = url.replace(':id', selectedValue); // Replace the placeholder with the actual ID

                $.ajax({
                    url: url, // Replace with your server endpoint
                    type: 'GET', // or 'POST' depending on your requirement
                    data: {
                        page_id: selectedValue // Send the page_id in the request
                    },
                    success: function(response) {
                        $('#sub_categories').empty().append(
                            '<option value="" disabled selected>Select a child page</option>'
                        );

                        if (response.data && response.data.length > 0) {
                            // Assuming response.data is an array of objects
                            response.data.forEach(function(item) {
                                // Create a new option element
                                var option = $('<option></option>')
                                    .attr('value', item
                                        .slug
                                    ) // Assuming each item has an 'id' property
                                    .text(item
                                        .slug
                                    ); // Assuming each item has a 'name' property

                                // Append the option to the select element
                                $('#sub_categories').append(option);
                            });
                        } else {
                            // Optionally, you can add a default message if there are no options
                            $('#sub_categories').append(
                                '<option disabled>No child pages available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });

        
    </script>

<script>
document.addEventListener('DOMContentLoaded', function() {

    const select = document.getElementById('design_section_id'); // select
    const modalImage = document.getElementById('modalImage'); // صورة المودال
    const modal = new bootstrap.Modal(document.getElementById('viewModal')); // المودال

    if(!select || !modalImage){
        console.warn('Element not found: check your IDs!');
        return;
    }

    // عند تغيير الاختيار في select
    select.addEventListener('change', function() {
        const selectedOption = select.options[select.selectedIndex];
        const imageUrl = selectedOption ? selectedOption.getAttribute('data-image-src') : null;

        if(imageUrl){
            modalImage.src = imageUrl; // ضع الصورة في المودال
            modal.show(); // افتح المودال مباشرة
        } else {
            modalImage.src = '';
        }
    });

});
</script>




   
@endsection
