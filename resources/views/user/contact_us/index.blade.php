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
            /* Set the height of the map */
            width: 100%;
            /* Set the width to fill the container */
        }

        .txt-center-bold-black {
            text-align: center !important;
            padding: 8px 10px;
            background: #000000;
            color: #fff !important;
            font-size: 20px;
            outline: 0;
            margin: 25px 0 0 0 !important;
        }
    </style>
@endsection
@section('content')
    <div class="about_content">
        {{-- @if ($items->count()) --}}
        <div>
            <div class="Awards_head_titel">
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


            <div class="services_sec_tiiel">
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
                                                            <img src="{{ $office->country->getFirstMediaUrl('flag') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                        {{ $office->country->translate('title', app()->getLocale()) }}
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
                                                            <img src="{{ $office->country->getFirstMediaUrl('flag') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                       {{ $office->country->translate('title', app()->getLocale()) }}
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
                                                            <img src="{{ $office->country->getFirstMediaUrl('flag') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                        {{ $office->country->translate('title', app()->getLocale()) }}
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
                <div class="Department ">
                    <label for="Department">Select Department</label>
                    <select class="form-control" placeholder="Department" name="department" id="department_input"
                        required="">
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
                <div class="name">
                    <label for="name">Enter Name</label>
                    <input class="form-control" type="text" placeholder="Name" name="name" id="name_input">
                </div>
                <div class="email">
                    <label for="email">Enter Email</label>
                    <input class="form-control" type="email" placeholder="Email" name="email" id="email_input">
                </div>
                <div class="telephone">
                    <label for="Phone">Enter Phone Number</label>
                    <input class="form-control" type="text" placeholder="Phone" name="phone" id="telephone_input">
                </div>
                <div class="refrence">
                    <label for="refrence">Enter Reference</label>
                    <input class="form-control" type="text" placeholder="Reference" name="reference"
                        id="reference_input">
                </div>
                <div class="subject">
                    <label for="subject">Enter Subject</label>
                    <input class="form-control" type="text" placeholder="Subject" name="subject" id="subject_input">
                </div>
                <div class="message">
                    <label for="message">Enter Message</label>
                    <textarea class="form-control" name="message" placeholder="Message" id="message_input" cols="30"
                        rows="5"></textarea>
                </div>
                <div class="submit">
                    <input class="form-control" type="submit" value="Send Message" id="form_button">
                </div>
            </form>
        </div>
    </div>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCoodzJh0ZG9GqhVOYutT9f_yoPyAilU3s&loading=async"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: {
                    lat: 30.033333,
                    lng: 31.233334
                }
            });
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
