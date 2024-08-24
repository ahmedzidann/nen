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
<style>
    #map {
        height: 100%;
    }
</style>
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
                                            <a href="{{ route('contact-us', ['country' => $country->country]) }}">
                                                {{ $country->country }}
                                                <img src="{{ $country->getFirstMediaUrl('image') }}" alt="Flag">
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
                                                            <img src="{{ $office->getFirstMediaUrl('image') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                        {{ $office->country }}
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
                                                            <img src="{{ $office->getFirstMediaUrl('image') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                        {{ $office->country }}
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
                                                            <img src="{{ $office->getFirstMediaUrl('image') }}"
                                                                alt="Flag of Egypt">
                                                        </span>
                                                        {{ $office->country }}
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
        </div>
    </div>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCoodzJh0ZG9GqhVOYutT9f_yoPyAilU3s"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: {
                    lat: 30.033333,
                    lng: 31.233334
                }
            });

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

            // Loop through each 'contact_offices' div
            offices.forEach(function(office) {
                // Check if the class name exists in the URL
                
                if (currentUrl.includes(office.classList[2])) {
                    office.style.display = 'block'; // Show the matching office
                } else {
                    office.style.display = 'none'; // Hide non-matching offices
                }
            });
        });
    </script>

@endsection
