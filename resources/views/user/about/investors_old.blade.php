@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Investors
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
    <div class="about_content">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <!-- <div class="investors_flex"> -->

            <!-- Start Investors Hero Section -->
            <div id="investors-section">
                <div class="texts-data d-flex flex-column align-items-start">
                    <h5 class="global-title">
                        {{ $fSection->title }}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
                    </div>
                    <p class="global-description">
                        {{ strip_tags($fSection->description) }}
                    </p>
                </div>
                <div class="investors_img">
                    <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
                </div>
            </div>
            <!-- End Investors Hero Section -->
        @endif
        @if ($items->where('item', 'section-two')->count())
            <div class="bg_div d-none"
                style="background-image: url({{ $items->where('item', 'section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content / images / women2 . png }});">
                <div class="number_div">
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="num_img_div">

                            <img class="w-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            <h3>{{ $item->title }} </h3>
                            <p>{{ $item->subtitle }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            <!-- Start Investors Statisctics Section -->
            <div id="investors-statisctics-section" class="mt-md-5 mt-3 px-md-4 px-3 py-md-5 py-4">
                <div class="statisctic-items d-flex align-items-center justify-content-around gap-3 flex-wrap">
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="statisctic-item d-flex flex-column align-items-center justify-content-center gap-3">
                            <img class="image-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            <h6 class="title text-secondary-color fs-5 fw-semibold text-uppercase">
                                {{ $item->title }}
                            </h6>
                            <p class="desc text-white-color fs-3">
                                {{ $item->subtitle }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End Investors Statisctics Section -->
        @endif

        <!-- Start Partner Section -->
        <div id="partner-section" class="tabs-items mt-md-5 mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" data-id="subsidiaries">
                        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1"
                            id="Layer_1" class="sparkle svg-with-gap">
                            <path
                                d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                            </path>
                        </svg>
                        <span>
                            subsidiaries
                        </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" data-id="sister_companies">
                        <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1"
                            id="Layer_1" class="sparkle svg-with-gap">
                            <path
                                d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                            </path>
                        </svg>
                        <span>
                            Sister Companies
                        </span>
                    </button>
                </li>
            </ul>
            <div class="tab-content mt-md-4 mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="subsidiaries_sec_content">
                        <!-- <div class="subsidiaries__sec"> -->
                        <div class="row g-3">
                            @forelse ($rows as $sub)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="subsidiaries_content">
                                <div class="first">
                                    <h5 class="title">{{ $sub->translate('title', app()->getLocale()) }}</h5>
                                    <div class="d-flex align-items-center justify-content-center">
                                    <div class="flg_div">
                                        <img src="{{ $sub->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="vector">
                                    </div>
                                    </div>
                                    <div class="subsidiaries_details">
                                        <div class="flags_sec">
                                            @foreach ($sub->investorAttributes as $row)
                                                <div class="flag_icon_titel">
                                                    <div class="sub_contennt">
                                                        <h6>
                                                            <img src="{{ App\Models\Country::where('id', $row->country_id)->first()->getFirstMediaUrl('flag') }}" loading="lazy"
                                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                                alt="vector">
                                                            <p>Since : <span class="mt-0 pt-0">{{ $row->since }}</span></p>
                                                        </h6>
                                                        <h6>
                                                            <p>Sharing : <span class="mt-0 pt-0">{{ $row->percent }}%</span></p>
                                                        </h6>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    </div>
                                    <a href="{{ $sub->url }}" class="website_link mt-0 p-2 text-center">Website</a>

                                </div>
                            </div>
                            @empty
                                @include('user.layout.includes.no-data')
                            @endforelse

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="subsidiaries_sec_content" id="sister">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner Section -->
    @endsection
    @section('websiteScript')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.nav-link').forEach(tab => {
                    tab.addEventListener('click', function() {
                                               const type = this.getAttribute('data-id');

                        // Dynamically construct the URL
                        let url = '{{ route('get-companies', ['type' => ':id']) }}'.replace(':id',
                            type);

                        // Make the AJAX request using fetch
                        fetch(url)
                            .then(response => response.json()) // Parse the JSON data
                            .then(data => {
                                document.getElementById('sister').innerHTML = data.data;
                                // Here, you can use the data to dynamically update the UI
                            })
                            .catch(error => console.error('Error:', error)); // Log any errors
                        
                    });
                });
            });
        </script>
    @endsection