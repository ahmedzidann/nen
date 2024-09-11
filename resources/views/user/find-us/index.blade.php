@extends('user.layout.master')
@section('parent_page_name')Find Us @endsection
@section('page_name'){{$tech->name}} @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
<style>
#map {
    height: 500px;
    width: 100%;
    margin-top: 25px;
    box-shadow: 0px 4px 30px rgba(213, 215, 216, 0.47);
    border-radius: 15px;
}
</style>
@section('content')

<!-- Start Find Us Page Section -->
<div id="contact-us-page">
    <div class="container">
        @if($items->count())
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
                        @foreach ($counties as $country)
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                            style="margin-right: 10px;">
                            <form id="countryForm-{{$country->id}}">
                                <div class="country_div overflow-hidden" style="cursor: pointer">
                                    <a href="{{ route('contact-us', ['country' => $country->id]) }}"
                                        class="overflow-hidden">
                                        <span class="fs-5 text-black-50">
                                            {{$country->title}}
                                        </span>
                                        <input type="hidden" name="page_id" value="{{request()->page_id}}">
                                        <input type="hidden" name="country_id" value="{{$country->id}}">
                                        <div class="img-country-box">
                                            <img src="{{$country->getFirstMediaUrl('flag')}}" loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Flag">
                                        </div>
                                    </a>
                                </div>
                            </form>
                        </div>
                        @endforeach




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

        <div class="decriptioned-texts mt-md-5 mt-3 lh-base">
            <p class="fs-5-2 text-muted">
                The National Network for Education is working to expand its educational impact across 28 countries by
                providing professional training and international examination services, through more than 2,000
                accredited training centers, 900 accredited trainers, 500 accredited testing centers, and 100 accredited
                invigilators. To ensure a strong, globally recognized certification for learning and assessment with a
                commitment to excellence.
            </p>
        </div>

        <hr class="custom-hr">

        <div class="global-search-section mt-md-4 mt-3">
            <form>
                <div class="row">
                    <!-- State -->
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-3">
                        <!-- <label for="state" class="form-label search-label">State</label> -->
                        <select name='state_id' class="form-select search-select" aria-label="Select state">
                            <option value="" selected>Select State</option>
                            @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Level -->
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-3">
                        <!-- <label for="level" class="form-label search-label">Level</label> -->
                        <select name='level_id' class="form-select search-select" aria-label="Select level">
                            <option value="" selected>Select Level</option>
                            @foreach ($levels as $level)
                            <option value="{{$level->id}}">{{$level->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Certificates -->
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-3">
                        <!-- <label for="certificate" class="form-label search-label">Certificates</label> -->
                        <select class="form-select search-select" aria-label="Select certificates">
                            <option value="" selected>Select Certificates</option>
                            @foreach ($certs as $certificate)
                            <option value="{{$certificate->id}}">{{$certificate->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Specializations -->
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-3">
                        <!-- <label for="specialization" class="form-label search-label">Specializations</label> -->
                        <select class="form-select search-select" aria-label="Select specializations">
                            <option value="" selected>Select Specializations</option>
                            @foreach ($specs as $specializations)
                            <option value="{{$specializations->id}}">{{$specializations->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden" name="page_id" value="{{request()->page_id}}">
                <input type="hidden" name="country_id" value="{{request()->country_id}}">

                <!-- Search Button aligned to end -->
                <div class="d-flex justify-content-end">
                    <button class="custom-button">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30"
                                    class="icon">
                                    <path
                                        d="M9.5 3a6.5 6.5 0 1 1-5.08 10.54l-3.47 3.47a.75.75 0 0 1-1.06-1.06l3.47-3.47A6.5 6.5 0 0 1 9.5 3zm0 1.5a5 5 0 1 0 0 10 5 5 0 0 0 0-10z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <span>Search</span>
                    </button>
                </div>
            </form>
        </div>


        <div id="office-table-section" class="mt-md-5 mt-3">
            <h3 class="table-title line-before text-gray500 fs-4 mb-3">
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
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="country-info">
                                        <img src="content/images/small_icon/Flag_of_Egypt.svg.webp" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="Flag" class="country-flag">
                                        <span>{{ $item->state?->country?->title }}</span>
                                    </div>
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    {{ isset($item->from_at) ? Carbon\Carbon::parse($item->from_at)->format('l h:i A') : '' }}
                                    -
                                    {{ isset($item->to_at) ? Carbon\Carbon::parse($item->to_at)->format('l h:i A') : '' }}
                                </td>
                            </tr>
                            @endforeach

                            <!-- Sample Static Data (Commented for Reference) -->
                            <!-- <tr>
                        <td>
                            <div class="country-info">
                                <img src="content/images/small_icon/Flag_of_the_United_Arab_Emirates.svg.png" loading="lazy"
                                    alt="Flag" class="country-flag">
                                <span>United Arab Emirates</span>
                            </div>
                        </td>
                        <td>501 Oud Metha Offices Building, Al-Razi Street, Oud Metha, Dubai, 184459, AE.</td>
                        <td>+97143852000<br>+971552162414</td>
                        <td>Monday - Friday <br> 10:00 AM - 6:00 PM</td>
                    </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @else
        <div style="display: flex; justify-content: center;">
            <p class="alert alert-danger no-data" role="alert" style="color:#999;">There is No Data Available</p>
        </div>
        @endif
    </div>
</div>
<!-- End Find Us Page Section -->

<!-- Old Desgin (Remove d-none Class to view it again-->
<div class="about_content d-none">
    @if($items->count())
    <div>
        <div class="Awards_head_titel find_us_style">
            <h1>Countries</h1>
            <div class="tabs_div">
                <ul class="nav nav-pills mb-3 Awards_bttn " id="pills-tab" role="tablist">
                    <!-- Swiper -->
                    <div
                        class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                        <div class="swiper-wrapper swipper_action" id="swiper-wrapper-310fc3c10e410f46158"
                            aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            @foreach ($counties as $country)
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                                style="margin-right: 10px;">
                                <form id="countryForm-{{$country->id}}">
                                    <div class="country_div"
                                        onclick="document.getElementById('countryForm-{{$country->id}}').submit()"
                                        style="cursor: pointer">
                                        {{$country->title}} <img src="{{$country->getFirstMediaUrl('flag')}}">
                                        <input type="hidden" name="page_id" value="{{request()->page_id}}">
                                        <input type="hidden" name="country_id" value="{{$country->id}}">
                                    </div>
                                </form>
                            </div>
                            @endforeach




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
            <p class="p_desc_service">The National Network for Education is working to expand its educational impact
                across 28
                countries by providing professional training and international examination services, through
                more than 2,000 accredited training centers, 900 accredited trainers, 500 accredited testing
                centers, and 100 accredited invigilators. To ensure a strong, globally recognized
                certification for learning and assessment with a commitment to excellence.</p>
            <div class="services_sec">
                <a href="#" class="bttn_service">
                    <img src="content/images/small_icon/chat.png">
                    <div class="flex_servic_icon">
                        <p>Customer Service</p>
                        <h6>cs@nen-global.org</h6>
                    </div>
                </a>

                <a href="#" class="bttn_service">
                    <img src="content/images/small_icon/tech.png">
                    <div class="flex_servic_icon">
                        <p>technical support</p>
                        <h6>support@nen-global.org</h6>
                    </div>
                </a>

                <a href="#" class="bttn_service">
                    <img src="content/images/small_icon/accredit.png">
                    <div class="flex_servic_icon">
                        <p>Credits</p>
                        <h6>acc@nen-global.org</h6>
                    </div>
                </a>

                <a href="#" class="bttn_service">
                    <img src="content/images/small_icon/sales.png">
                    <div class="flex_servic_icon">
                        <p>the sales</p>
                        <h6>sales@nen-global.org</h6>
                    </div>
                </a>

                <a href="#" class="bttn_service">
                    <img src="content/images/small_icon/inttest.png">
                    <div class="flex_servic_icon">
                        <p>International tests</p>
                        <h6>tca@nen-global.org</h6>
                    </div>
                </a>
            </div>
        </div>


        <form>
            <div class="select_div">
                {{-- <select  name='country_id' class="form-select" aria-label="Default select example">
                <option value="">select country</option>
                @foreach ($counties as $country)
                <option value="{{$country->id}}">{{$country->title}}</option>
                @endforeach
                </select> --}}
                <select name='state_id' class="form-select" aria-label="Default select example">
                    <option value="">select state</option>

                    @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->title}}</option>
                    @endforeach
                </select>
                <select name='level_id' class="form-select" aria-label="Default select example">
                    <option value="">select level</option>

                    @foreach ($levels as $level)
                    <option value="{{$level->id}}">{{$state->title}}</option>
                    @endforeach
                </select>
                <select class="form-select" aria-label="Default select example">
                    <option selected="">select certificates</option>
                    @foreach ($certs as $certificate)
                    <option value="{{$certificate->id}}">{{$certificate->title}}</option>
                    @endforeach
                </select>

                <select class="form-select" aria-label="Default select example">
                    <option selected="">select specializations</option>
                    @foreach ($specs as $specializations)
                    <option value="{{$specializations->id}}">{{$specializations->title}}</option>
                    @endforeach
                </select>




            </div>
            <input type="hidden" name="page_id" value="{{request()->page_id}}">
            <input type="hidden" name="country_id" value="{{request()->country_id}}">

            <div class="select_div mt-1">
                <button class="btn btn-primary serch_bttn">search</button>
            </div>
        </form>
        <div class="tabel_contact_us">
            <h3 class="txt-center-bold">Regional offices
            </h3>
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
                                    <div class="flex_img_country"><i class="bi bi-geo-alt"></i>address<div>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone
                                    </div>
                                </th>
                                <th>
                                    <div class="flex_img_country"><i class="bi bi-clock"></i> times of work
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)

                            <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons"> <span class="office-flag-img"><img
                                                src="content/images/small_icon/Flag_of_Egypt.svg.webp"></span>
                                        {{$item->state?->country?->title}}</div>

                                </td>
                                <td data-column="Name" class="td-center">
                                    {{ $item->address}}
                                </td>

                                <td data-column="Phone">{{ $item->phone}}
                                </td>
                                <td data-column="Phone">
                                </td>

                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons"> <span class="office-flag-img"><img src="content/images/small_icon/Flag_of_the_United_Arab_Emirates.svg.png"></span>
                                        United Arab Emirates </div>
                                </td>
                                <td data-column="Name" class="td-center">501 Oud Metha Offices Building,
                                    Al-Razi Street, Oud Metha, Dubai, 184459, AE.
                                </td>
                                <td data-column="Phone">+97143852000<br>+971552162414
                                </td>
                                <td data-column="Phone">Monday - Friday <br> 10:00 AM - 6:00 PM
                                </td>

                            </tr> --}}

                            {{--
                            <tr>
                                <td data-column="Country" class="td-left">
                                    <div class="country_icons"> <span class="office-flag-img"><img src="content/images/small_icon/Flag_of_Uzbekistan.svg"></span>
                                        Uzbekistan</div>
                                </td>
                                <td data-column="Name" class="td-center">4 Nukus Street, 100060 Tashkent
                                    City, UZ
                                </td>
                                <td data-column="Phone">+998712550666 <br> +998908227560/1
                                </td>
                                <td data-column="Phone">Monday - Friday <br> 10:00 AM - 6:00 PM
                                </td>
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    @else
    <div style="display: flex; justify-content: center;">
        <p class="alert alert-danger no-data" role="alert" style="color:#999;">There is No Data Available</p>
    </div>
    @endif
</div>


<script src="https://maps.google.com/maps/api/js?key=AIzaSyCoodzJh0ZG9GqhVOYutT9f_yoPyAilU3s"></script>
<script>
function initMap() {
    // Default center location (latitude and longitude)
    var center = {
        lat: 30.033333,
        lng: 31.233334
    };

    // Initialize the map
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2, // Default zoom level
        center: center, // Center of the map
    });

    // Array of marker locations (you'll need this array from your server-side)
    var locations = @json($locations);

    // Add markers for each location
    locations.forEach(function(location) {
        location.lat = parseFloat(location.lat);
        location.lng = parseFloat(location.lng);

        new google.maps.Marker({
            position: location,
            map: map
        });
    });
}

// Initialize the map after the DOM content is loaded
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
</script>
@endsection