@extends('user.layout.master')
@section('parent_page_name')
Contact Us
@endsection
@section('page_name')
Contact Us
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('websiteStyle')
{{-- start toastr --}}
<link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
{{-- end toastr --}}
<style>
#map {
    height: 500px;
    width: 100%;
    margin-top: 25px;
    box-shadow: 0px 4px 30px rgba(213, 215, 216, 0.47);
    border-radius: 15px;
}

.static_map_image {
    width: 100%;
    height: 30rem;
    box-shadow: 0px 4px 30px rgba(213, 215, 216, 0.47);
    border-radius: 15px;
    overflow: hidden;
}

.static_map_image img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.country-box {
    overflow: hidden;
}

.country-box .img-box {
    width: 30px;
    height: 30px;
    flex-shrink: 0;
    border-radius: 50%;
    overflow: hidden;
}

.country-box .img-box img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.swiper-free-mode.swiper-wrapper {
    padding-left: 6.5rem;
}

.swiper-slide:last-child {
    margin-right: 6.5rem !important;
}

@media (max-width: 600px) {
    .swiper-slide:last-child {
        margin-right: 3rem !important;
    }

    .swiper-free-mode.swiper-wrapper {
        padding-left: 3rem !important;
    }
}

.active-tab {
    background: #990000 !important;
    color: white !important;
}

.active-tab span {
    color: white !important;
}
</style>
@endsection

@section('content')
<!-- Start Contact Us Page Section -->
<div id="contact-us-page">
    <div class="container">
        <div class="texts-data d-flex flex-column align-items-start">
            <h5 class="global-title">
                Countries
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>

        <!-- Start Swiper Container -->
        <div class="swiper-container">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper nav nav-pills mb-3 flex-nowrap" id="pills-tab" role="tablist">
                @forelse ($countries as $country)
                <div class="swiper-slide nav-item {{ $loop->first ? 'active-tab' : '' }}" role="presentation">
                    <a href="{{ route('contact-us', ['country' => $country->id]) }}" class="rounded overflow-hidden">
                        <div
                            class="country-box d-flex justify-content-center align-items-center gap-3 p-2 border overflow-hidden">
                            <span class="text-dark">
                                {{ $country->translate('title', app()->getLocale()) }}
                            </span>
                            <div class="img-box shadow-sm">
                                <img src="{{ $country->getFirstMediaUrl('flag') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Flag">
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                <div style="display: flex; justify-content: center;">
                    <p style="color:#999;">There is No Data Of Countries Available</p>
                </div>
                @endforelse
            </div>

            <!-- Next button with custom SVG -->
            <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                <i class="fa fa-chevron-right"></i>
            </div>

            <!-- Previous button with custom SVG -->
            <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide">
                <i class="fa fa-chevron-left"></i>
            </div>
        </div>
        <!-- End Swiper Container -->

        <!-- Static map image -->
        <div class="static_map_image mt-md-4 mt-3 p-3">
            <img src="{{ asset('content/images/contacts-static.jpg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="Static Map">
        </div>

        <!-- Services -->
        <div class="services-items-container mt-md-4 mt-3">
            <div class="services-items">
                @forelse ($services as $service)
                <a href="#" class="service-item">
                    <div class="service-item-box">
                        <img src="{{ $service->getFirstMediaUrl('image') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="Customer Service">
                    </div>
                    <div class="texts-data">
                        <p class="fs-5-2 text-gray500">
                            {{ $service->title }}
                        </p>
                        <p class="fs-6 text-decoration-underline text-warning">
                            {{ $service->email }}
                        </p>
                    </div>
                </a>
                @empty
                <div style="display: flex; justify-content: center;">
                    <p style="color:#999;">There is No Data Of Service Available</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Additional content here (tables, form, etc.) -->

    </div>
</div>
<!-- End Contact Us Page Section -->

@endsection

@section('websiteScript')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        freeMode: true,
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        mousewheel: {
            forceToAxis: true,
        },
    });
});
</script>

<script>
function toggleDescription(button) {
    var description = button.previousElementSibling;
    if (description.classList.contains('p_clamp_2')) {
        description.classList.remove('p_clamp_2');
        button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
    } else {
        description.classList.add('p_clamp_2');
        button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Get the current URL
    var currentUrl = window.location.href;

    // Select all elements with the class 'contact_offices'
    var offices = document.querySelectorAll('.contact_offices');

    if (currentUrl.includes('contact_offices')) {
        // Loop through each 'contact_offices' div
        offices.forEach(function(office) {
            // Check if the class name exists in the URL
            if (currentUrl.includes(office.classList[2])) {
                office.style.display = 'block'; // Show the matching office
            } else {
                office.style.display = 'none'; // Hide non-matching offices
            }
        });
    }
});
</script>

{{-- start toastr --}}
<script src="{{ asset('toastr/js/toastr.min.js') }}"></script>
{{-- end toastr --}}
<script>
$(document).ready(function() {
    $('#contact_form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this)[0]; // Get the DOM element for FormData
        var formData = new FormData(form); // Create a new FormData object

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: "POST",
            data: formData, // Send the FormData object
            contentType: false,
            processData: false,
            success: function(response) {
                toastr.success(response.message, 'Success!', {
                    timeOut: 11000
                });
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(index, error) {
                    toastr.error(error, 'Error!', {
                        timeOut: 11000
                    });
                });
            }
        });
    });
});
</script>
@endsection