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

        <div class="static_map_image mt-md-4 mt-3 p-3">
            <img src="{{ asset('content/images/contacts-static.jpg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
        </div>

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

        @forelse ($contacts as $key=>$contact)

        @if ($key == App\Enums\OfficeType::REGIONAL_REPRESENTATIVES)
        <div id="representatives-table-section" class="mt-md-5 mt-3">
            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                Regional Representatives
            </h3>
            <div class="table-container">
                <div class="table-responsive office-table-container">
                    <table class="table office-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-globe-asia-australia"></i> Country
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-person"></i> Name</div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td>
                                    <div class="country-info">
                                        <img src="{{ $office->country?->getFirstMediaUrl('flag') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="Flag of {{ $office->country?->translate('title', app()->getLocale()) }}"
                                            class="country-flag">
                                        <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                    </div>
                                </td>
                                <td>{{ $office->name }}</td>
                                <td>{{ $office->phone }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @if ($key == App\Enums\OfficeType::REGIONAL_OFFICES)
        <div id="office-table-section" class="mt-md-5 mt-3">
            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                Regional Offices
            </h3>
            <div class="table-container">
                <div class="table-responsive office-table-container">
                    <table class="table office-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-globe-asia-australia"></i> Country
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i> Address</div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-clock"></i> Times of work</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td>
                                    <div class="country-info">
                                        <img src="{{ $office->country?->getFirstMediaUrl('flag') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="Flag" class="country-flag">
                                        <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                    </div>
                                </td>
                                <td>{{ $office->address }}</td>
                                <td>{{ $office->phone }}</td>
                                <td>
                                    {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . ' - ' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @if ($key == App\Enums\OfficeType::AUTHORIZED_OFFICES)
        <div id="authorized-offices-table-section" class="mt-md-5 mt-3">
            <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                Authorized Offices
            </h3>
            <div class="table-container">
                <div class="table-responsive office-table-container">
                    <table class="table office-table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-globe-asia-australia"></i> Country
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-geo-alt"></i> Address</div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                                <th scope="col">
                                    <div class="table-header-icon"><i class="bi bi-clock"></i> Times of Work</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td>
                                    <div class="country-info">
                                        <img src="{{ $office->country?->getFirstMediaUrl('flag') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="Flag" class="country-flag">
                                        <span>{{ $office->country?->translate('title', app()->getLocale()) }}</span>
                                    </div>
                                </td>
                                <td>{{ $office->address }}</td>
                                <td>{{ $office->phone }}</td>
                                <td>
                                    {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . ' - ' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @empty
        <div style="display: flex; justify-content: center;">
            <p style="color:#999;">There is No Data Of Service Available</p>
        </div>
        @endforelse

        <hr class="custom-hr">
        <div class="contact-form-section p-4 rounded shadow">
            <h3 class="form-title mb-4">
                Let's Chat, Reach Out to Us
            </h3>
            <p class="form-description mb-4">
                Enjoy the Arabic language, live with the splendor of the language of the Great Qur’an, and the beauty of
                the Prophet’s Sunnah, learn about Arab culture, and benefit from the great Arab-Islamic heritage. Just
                contact us.
            </p>
            <hr class="custom-hr">
            <form id="contact_form" action="{{ route('contacts.store') }}" method="post">
                @csrf
                <div class="row">
                    <!-- Department -->
                    <div class="col-md-6 mb-3">
                        <label for="department_input" class="form-label fw-bold">
                            Select Department <span class="text-danger">*</span>
                        </label>
                        <select class="form-select form-control" id="department_input" name="department" required>
                            <option disabled="" hidden="" selected="">Department</option>
                            <option value="0">Customer Service</option>
                            <option value="1">Technical Support</option>
                            <option value="2">Sales and Marketing</option>
                            <option value="3">Operation and Quality</option>
                            <option value="4">Purchase and Finance</option>
                            <option value="5">International Testing</option>
                            <option value="6">Education and Training</option>
                        </select>
                    </div>
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label for="name_input" class="form-label fw-bold">
                            Enter Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name_input" name="name" placeholder="Your Name"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email_input" class="form-label fw-bold">
                            Enter Email <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="email_input" name="email" placeholder="Your Email"
                            required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label for="telephone_input" class="form-label fw-bold">
                            Enter Phone Number <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="telephone_input" name="phone"
                            placeholder="Your Phone Number" required>
                    </div>

                    <!-- Reference -->
                    <div class="col-md-6 mb-3">
                        <label for="reference_input" class="form-label fw-bold">
                            Enter Reference <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="reference_input" name="reference"
                            placeholder="Reference" required>
                    </div>

                    <!-- Subject -->
                    <div class="col-md-6 mb-3">
                        <label for="subject_input" class="form-label fw-bold">
                            Enter Subject <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="subject_input" name="subject" placeholder="Subject"
                            required>
                    </div>

                    <!-- Message -->
                    <div class="col-12 mb-4">
                        <label for="message_input" class="form-label fw-bold">
                            Enter Message <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="message_input" name="message"
                            placeholder="Leave us a message" rows="5" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center mt-md-4 mt-3">
                        <button type="submit"
                            class="btn submit-button d-flex gap-3 align-items-center justify-content-center">
                            <span>
                                Send Message
                            </span>
                            <i class="bi bi-send icon_shp sumb_icon"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

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