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
</style>
@endsection
@section('content')
<!-- Start Contact Us Page Section -->
<div id="contact-us-page">
    <div class="container">
        {{-- @if ($items->count()) --}}

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

        <div class="second-tabs-items mt-md-4 mt-3">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- Swiper -->
                <div
                    class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper swipper_action" id="swiper-wrapper-310fc3c10e410f46158"
                        aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                        @forelse ($countries as $country)
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                            style="margin-right: 10px;">
                            <div class="country_div overflow-hidden" style="cursor: pointer">
                                <a href="{{ route('contact-us', ['country' => $country->id]) }}"
                                    class="overflow-hidden">
                                    <span class="fs-5 text-black-50">
                                        {{ $country->translate('title', app()->getLocale()) }}
                                    </span>
                                    <div class="img-country-box">
                                        <img src="{{ $country->getFirstMediaUrl('flag') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="Flag">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Add more static slides as needed -->
                        @empty
                        <div style="display: flex; justify-content: center;">
                            <p style="color:#999;">There is No Data Of Countries Available</p>
                        </div>
                        @endforelse
                        <!-- Sample Static Data -->

                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                        aria-controls="swiper-wrapper-310fc3c10e410f46158" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-310fc3c10e410f46158"
                        aria-disabled="true"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </ul>
        </div>

        <div id="map"></div>

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

<!-- Old Desgin (Remove d-none Class to view it again-->
<div class="about_content d-none">
    {{-- @if ($items->count()) --}}
    <div>
        <div class="Awards_head_titel find_us_style">
            <h1>Countries</h1>
            <div class="tabs_div">
                <ul class="nav nav-pills mb-3 Awards_bttn" id="pills-tab" role="tablist">
                    <!-- Swiper -->
                    <div
                        class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                        <div class="swiper-wrapper swipper_action" id="swiper-wrapper-310fc3c10e410f46158"
                            aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            @forelse ($countries as $country)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                                style="margin-right: 10px;">
                                <div class="country_div" style="cursor: pointer">
                                    <a href="{{ route('contact-us', ['country' => $country->id]) }}">
                                        {{ $country->translate('title', app()->getLocale()) }}
                                        <img src="{{ $country->getFirstMediaUrl('flag') }}" alt="Flag">
                                    </a>
                                </div>
                            </div>
                            <!-- Add more static slides as needed -->
                            @empty
                            <div style="display: flex; justify-content: center;">
                                <p style="color:#999;">There is No Data Of Countries Available</p>
                            </div>
                            @endforelse
                            <!-- Sample Static Data -->

                        </div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                            aria-controls="swiper-wrapper-310fc3c10e410f46158" aria-disabled="false"></div>
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-controls="swiper-wrapper-310fc3c10e410f46158"
                            aria-disabled="true"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </ul>
            </div>
        </div>


        <div id="map"></div>


        <div class="services_sec_tiiel elment_style">
            <div class="services_sec">
                @forelse ($services as $service)
                <a href="#" class="bttn_service">
                    <img src="{{ $service->getFirstMediaUrl('image') }}" alt="Customer Service">
                    <div class="flex_servic_icon">
                        <p>{{ $service->title }}</p>
                        <h6>{{ $service->email }}</h6>
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
        @if ($key == App\Enums\OfficeType::REGIONAL_OFFICES)
        <div class="tabel_contact_us contact_offices regional-offices">
            <h3 class="txt-center-bold">Regional offices</h3>
            <div class="table-responsive">
                <div class="office-table Find_us_tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-globe-asia-australia"></i>
                                        Country
                                    </div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-geo-alt"></i> Address</div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-clock"></i> Times of work
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons">
                                        <span class="office-flag-img">
                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                alt="Flag of Egypt">
                                        </span>
                                        {{ $office->country?->translate('title', app()->getLocale()) }}
                                    </div>
                                </td>
                                <td data-column="Name" class="td-center">{{ $office->address }}</td>
                                <td data-column="Phone">{{ $office->phone }}</td>
                                <td data-column="Phone">
                                    {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . '-' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
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
        <div class="tabel_contact_us contact_offices authorized-offices">
            <h3 class="txt-center-bold">Authorized Offices</h3>
            <div class="table-responsive">
                <div class="office-table Find_us_tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-globe-asia-australia"></i>
                                        Country
                                    </div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-geo-alt"></i> Address</div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-clock"></i> Times of work
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons">
                                        <span class="office-flag-img">
                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                alt="Flag of Egypt">
                                        </span>
                                        {{ $office->country?->translate('title', app()->getLocale()) }}
                                    </div>
                                </td>
                                <td data-column="Name" class="td-center">{{ $office->address }}</td>
                                <td data-column="Phone">{{ $office->phone }}</td>
                                <td data-column="Phone">
                                    {{ Carbon\Carbon::parse($office->from_at)->format('l h:i A') . '-' . Carbon\Carbon::parse($office->to_at)->format('l h:i A') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        @if ($key == App\Enums\OfficeType::REGIONAL_REPRESENTATIVES)
        <div class="tabel_contact_us contact_offices regional-representatives">
            <h3 class="txt-center-bold">Regional Representatives</h3>
            <div class="table-responsive">
                <div class="office-table Find_us_tabel">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-globe-asia-australia"></i>
                                        Country
                                    </div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-geo-alt"></i> name</div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $office)
                            <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons">
                                        <span class="office-flag-img">
                                            <img src="{{ $office->country?->getFirstMediaUrl('flag') }}"
                                                alt="Flag of Egypt">
                                        </span>
                                        {{ $office->country?->translate('title', app()->getLocale()) }}
                                    </div>
                                </td>
                                <td data-column="Name" class="td-center">{{ $office->name }}</td>
                                <td data-column="Phone">{{ $office->phone }}</td>
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
        <hr>
        <h3 class="txt-center-bold-black">Contact Form</h3>
        <br>
        <br>
        <form id="contact_form" action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="Department ">
                        <label for="Department" class="label_con">Select Department *</label>
                        <select class="form-control form_sty" placeholder="Department" name="department"
                            id="department_input" required="">
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
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="name">
                        <label for="name" class="label_con">Enter Name *</label>
                        <div class="input_icon">
                            <input class="form-control form_sty" type="text" placeholder="Name" name="name"
                                id="name_input">
                            <i class="bi bi-person icon_shp"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="email">
                        <label for="email" class="label_con">Enter Email *</label>

                        <div class="input_icon">
                            <input class="form-control form_sty" type="email" placeholder="Email" name="email"
                                id="email_input">
                            <i class="bi bi-envelope icon_shp"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="telephone">
                        <label for="Phone" class="label_con">Enter Phone Number *</label>
                        <div class="input_icon">
                            <input class="form-control form_sty" type="text" placeholder="Phone" name="phone"
                                id="telephone_input">
                            <i class="bi bi-telephone icon_shp"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="refrence">
                        <label for="refrence" class="label_con">Enter Reference *</label>

                        <div class="input_icon">
                            <input class="form-control form_sty" type="text" placeholder="Reference" name="reference"
                                id="reference_input">

                            <i class="bi bi-book icon_shp"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="subject">
                        <label for="subject" class="label_con">Enter Subject *</label>
                        <div class="input_icon">
                            <input class="form-control form_sty" type="text" placeholder="Subject" name="subject"
                                id="subject_input">
                            <i class="bi bi-file-earmark icon_shp"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                    <div class="message">
                        <label for="message" class="label_con">Enter Message *</label>
                        <textarea class="form-control form_sty" name="message" placeholder="Message" id="message_input"
                            cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-md-2 col-sm-12 mt-3">
                    <div class="submit">
                        <button class="form_sty sumb_btn " type="submit" value="Send Message" id="form_button">
                            send messege
                            <i class="bi bi-send icon_shp sumb_icon"></i>
                        </button>
                    </div>
                </div>
            </div>




        </form>
    </div>
</div>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCoodzJh0ZG9GqhVOYutT9f_yoPyAilU3s&loading=async"></script>
<script>
function initMap() {
    var styledMapType = new google.maps.StyledMapType(
        [{
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 40
                }]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 20
                }]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 21
                }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 17
                }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 18
                }]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 16
                }]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#000000"
                }, {
                    "lightness": 19
                }]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#0f252e"
                }, {
                    "lightness": 17
                }]
            }
        ], {
            name: 'Styled Map'
        }
    );

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: {
            lat: 30.033333,
            lng: 31.233334
        },
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
        }
    });

    // Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

    // Array of marker locations
    var locations = @json($locations);

    locations.forEach(function(location) {
        location.lat = parseFloat(location.lat);
        location.lng = parseFloat(location.lng);
        new google.maps.Marker({
            position: location,
            map: map
        });
    });
}

document.addEventListener('DOMContentLoaded', initMap);
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
@endsection
@section('websiteScript')
{{-- start toastr --}}
<script src="{{ asset('toastr/js/toastr.min.js') }}"></script>
{{-- end toastr --}}
<script>
$(document).ready(function() {
    $('#contact_form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        console.log('test'); // Debugging output to check if the function runs

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
                toastr.success(response.message, 'Error!', {
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