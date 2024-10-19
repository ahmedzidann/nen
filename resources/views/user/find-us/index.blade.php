@extends('user.layout.master')
@section('parent_page_name')
    Find Us
@endsection
@section('page_name')
    {{ $tech->name }}
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('websiteStyle')
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

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

    <!-- Start Find Us Page Section -->
    <div id="contact-us-page">
        <div class="container">
            @if ($items->count())
                <div id="map"></div>
                <div class="global-search-section mt-md-4 mt-3">
                    <form action="{{ request()->url() }}">
                        @csrf
                        <div class="row g-3">

                            <!-- Categories -->
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <!-- <label for="certificate" class="form-label search-label">Certificates</label> -->
                                <select class="form-select search-select" name="category_id" id="category_id"
                                    aria-label="Select Category">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Level -->
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <!-- <label for="level" class="form-label search-label">Level</label> -->
                                <select name='level_id' id="level_id" class="form-select search-select"
                                    aria-label="Select level">
                                    <option value="" selected disabled>Select Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Specializations -->
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <!-- <label for="specialization" class="form-label search-label">Specializations</label> -->
                                <select class="form-select search-select" name="specialization_id" id="specialization_id"
                                    aria-label="Select specializations">
                                    <option value="" selected disabled>Select Specializations</option>
                                    @foreach ($specs as $specializations)
                                        <option value="{{ $specializations->id }}">{{ $specializations->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Country -->
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <select name='country_id' class="form-select search-select" id="country_id"
                                    aria-label="Select country">
                                    <option value="" selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- State -->
                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <!-- <label for="state" class="form-label search-label">State</label> -->
                                <select name='state_id' id="state_id" class="form-select search-select"
                                    aria-label="Select state">
                                    <option value="" selected disabled>Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                                <button class="custom-button">
                                    <div class="svg-wrapper-1">
                                        <div class="svg-wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30"
                                                height="30" class="icon">
                                                <path
                                                    d="M9.5 3a6.5 6.5 0 1 1-5.08 10.54l-3.47 3.47a.75.75 0 0 1-1.06-1.06l3.47-3.47A6.5 6.5 0 0 1 9.5 3zm0 1.5a5 5 0 1 0 0 10 5 5 0 0 0 0-10z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <span>Search</span>
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="page_id" value="{{ request()->page_id }}">
                        {{-- <input type="hidden" name="country_id" value="{{ request()->country_id }}"> --}}
                    </form>
                </div>


                <div id="office-table-section" class="mt-md-5 mt-3">
                    <h3 class="table-title line-before text-gray500 fs-4 mb-3">
                        Regional Offices
                    </h3>
                    <div class="table-container">
                        <table id="findUsTable" class="table office-table " style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    {{-- <th>Times of work</th> --}}
                                    <th>Address</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @else
                <div style="display: flex; justify-content: center;">
                    <p class="alert alert-danger no-data" role="alert" style="color:#999;">There is No Data Available
                    </p>
                </div>
            @endif
        </div>
    </div>
    <!-- End Find Us Page Section -->

    <!-- Old Desgin (Remove d-none Class to view it again-->
    <div class="about_content d-none">
        @if ($items->count())
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
                                    @foreach ($countries as $country)
                                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 7"
                                            style="margin-right: 10px;">
                                            <form id="countryForm-{{ $country->id }}">
                                                <div class="country_div"
                                                    onclick="document.getElementById('countryForm-{{ $country->id }}').submit()"
                                                    style="cursor: pointer">
                                                    {{ $country->title }} <img
                                                        src="{{ $country->getFirstMediaUrl('flag') }}">
                                                    <input type="hidden" name="page_id" value="{{ request()->page_id }}">
                                                    <input type="hidden" name="country_id" value="{{ $country->id }}">
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
                    <p class="p_desc_service">The National Network for Education is working to expand its educational
                        impact
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
                        <select name='country_id' class="form-select" id="country_id"
                            aria-label="Default select example">
                            <option value="">select country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                            @endforeach
                        </select>
                        <select name='state_id' class="form-select" aria-label="Default select example">
                            <option value="" selected disabled>select state</option>

                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->title }}</option>
                            @endforeach
                        </select>
                        <!-- Categories -->
                        <!-- <label for="certificate" class="form-label search-label">Certificates</label> -->
                        <select class="form-select search-select" name="category_id" aria-label="Select Category">
                            <option value="" selected disabled>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <select name='level_id' class="form-select" aria-label="Default select example">
                            <option value="" selected disabled>select level</option>

                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $state->title }}</option>
                            @endforeach
                        </select>

                        <select class="form-select" aria-label="Default select example">
                            <option selected="" selected disabled>select specializations</option>
                            @foreach ($specs as $specializations)
                                <option value="{{ $specializations->id }}">{{ $specializations->title }}</option>
                            @endforeach
                        </select>




                    </div>
                    <input type="hidden" name="page_id" value="{{ request()->page_id }}">
                    <input type="hidden" name="country_id" value="{{ request()->country_id }}">

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
                                                    {{ $item->state?->country?->title }}</div>

                                            </td>
                                            <td data-column="Name" class="td-center">
                                                {{ $item->address }}
                                            </td>

                                            <td data-column="Phone">{{ $item->phone }}
                                            </td>
                                            <td data-column="Phone">
                                            </td>

                                        </tr>
                                    @endforeach
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

@endsection
@section('websiteScript')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        var stateId;
        var categoryId;
        var countryId;
        var level_id;
        var specialization_id;

        $(document).ready(function() {
            let table = $('#findUsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('find-us.data') }}',
                    data: function(d) {
                        d.page_id = '{{ request('page_id') }}';
                        d.country_id = countryId || '{{ request()->country_id }}';
                        d.category_id = categoryId;
                        d.state_id = stateId;
                        d.level_id = level_id;
                        d.specialization_id = specialization_id;
                    }
                },
                columns: [{
                        data: 'country',
                        name: 'country',
                        render: function(data, type, row) {
                            return '<div class="country-info">' +
                                '<img src="' + row.flag_url + '" ' +
                                'loading="lazy" ' +
                                'onerror="this.src=\'' +
                                "{{ asset('content/images/not-found/no-image.svg') }}" + '\';" ' +
                                'alt="Flag" ' +
                                'class="country-flag"> ' +
                                '<span>' + data + '</span>' +
                                '</div>';
                        }
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        render: function(data, type, row) {
                            return '<a style="color: #333;" href="tel:' + data + '">' + data +
                                '</a>';
                        }
                    },
                    // {
                    //     data: 'work_times',
                    //     name: 'work_times',
                    //     render: function(data, type, row) {
                    //         return row.from_at + ' - ' + row.to_at;
                    //     }
                    // },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'location',
                        name: 'location',
                        render: function(data, type, row) {
                            return '<a href="' + row.map_url + '" ' +
                                'class="google-map-link d-flex flex-nowrap gap-2 justify-content-around align-items-center" ' +
                                'target="_blank"> ' +
                                '<span class="gradient-text">Google Map</span>' +
                                '<img class="map-icon" src="' +
                                "{{ asset('content/images/small_icon/google-map-icon.webp') }}" +
                                '" ' +
                                'loading="lazy" ' +
                                'onerror="this.src=\'' +
                                "{{ asset('content/images/not-found/no-image.svg') }}" + '\';" ' +
                                'alt="map icon"> ' +
                                '</a>';
                        }
                    },
                ]
            });

            $(' #country_id, #category_id, #state_id, #level_id, #specialization_id').on('change', function() {
                stateId = $('#state_id').val();
                categoryId = $('#category_id').val();
                countryId = $('#country_id').val();
                level_id = $('#level_id').val();
                specialization_id = $('#specialization_id').val();

                table.draw();
            });
        });
    </script>

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
