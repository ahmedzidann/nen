@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Identity
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')

    <div class="about_content">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <!-- Start About Section  -->
            <section id="about-section">
                <div class="container pb-md-5 pb-3 pt-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-7">
                            <div class="text-start">
                                <h5 class="global-title fw-semibold">
                                    {{ $fSection->title }}
                                </h5>
                                <div class="under-title-vector">
                                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="vector">
                                </div>
                                <p class="fs1-1 text-muted pt-3 lh-base">
                                    {{ strip_tags($fSection->description) }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="about-image-item card border-0 w-100">
                                <div class="about-image-container h-100">
                                    <img src="{{ $items->where('item', 'section-three')->first()?->getFirstMediaUrl('StaticTable') }}"
                                        alt="about image">
                                </div>
                                <div class="blob"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section  -->

            <div class="about_flex d-none">
                <div class="about_titel_circle_progress">
                    <div class="about_titel">
                        <h1>{{ $fSection->title }}</h1>
                        <p>
                            {{ strip_tags($fSection->description) }}
                        </p>

                        {{-- <a href="#" class="see_more">see more</a> --}}
                    </div>
                </div>
                <div class="video_div">
                    <img class="video_img" alt="video-icon1" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" />
                    <span class="video_icon"><i class="bi bi-play-circle"></i></span>
                </div>
            </div>

            <!-- Start Progress Section  -->
            <div id="progress-items" class="row justify-content-around mt-3 g-3 w-100">
                @foreach ($statistics as $item)
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="progress-item d-flex flex-column align-items-center justify-content-center w-100 gap-2">
                            <div class="progress-circle" data-progress="100">
                                <span class="progress-value">{{ $item->value }}%</span>
                            </div>
                        </div>
                        <span class="text fw-bold text-black-50">
                            {{ $item->translate('title', app()->getLocale()) }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- End Progress Section  -->
        @endif
        @if ($items->where('item', 'section-two')->count())
            <!-- End Mission Vision Section  -->
            <div class="about-explain mt-md-5 mt-3 px-md-4 px-3 py-md-5 py-4">
                <div class="explain-content">
                    <div class="d-flex align-items-start flex_action">
                        <div class="nav flex-column nav-pills our_visions me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            @foreach ($items->where('item', 'section-two') as $item)
                                <button
                                    class="nav-link tab_state  w_nav_link @if ($loop->first) active @else bttn_tab @endif"
                                    id="v-pills-section-two-{{ $item->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-section-two-{{ $item->id }}" type="button" role="tab"
                                    aria-controls="v-pills-section-two-{{ $item->id }}" aria-selected="true">
                                    {{ $item->title }}
                                </button>
                            @endforeach
                            {{-- <button class="nav-link active tab_state w_nav_link" id="v-pills-home-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                aria-selected="true">
                Our Vision
            </button>
            <button class="nav-link tab_state bttn_tab w_nav_link" id="v-pills-profile-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                Our Mission
            </button>
            <button class="nav-link tab_state bttn_tab w_nav_link" id="v-pills-messages-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                aria-selected="false">
                Objectives
            </button> --}}
                        </div>
                        <div class="tab-content tab_horzintal" id="v-pills-tabContent">
                            @foreach ($items->where('item', 'section-two') as $item)
                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                    id="v-pills-section-two-{{ $item->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-section-two-{{ $item->id }}-tab" tabindex="0">
                                    <p class="tab-desc text-white-color position-relative">
                                        {{ strip_tags($item->description) }}
                                    </p>
                                </div>
                            @endforeach
                            {{-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                aria-labelledby="v-pills-home-tab" tabindex="0">
                <p class="tab-desc text-white-color position-relative">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.
                </p>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="0">
                <p class="tab-desc text-white-color position-relative">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.
                </p>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                aria-labelledby="v-pills-messages-tab" tabindex="0">
                <p class="tab-desc text-white-color position-relative">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.

                </p>
            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mission Vision Section  -->
        @endif
        @if ($tSection = $items->where('item', 'section-three')->first())
            <!-- <div class="objectives_div">
            <div class="objectiv_titling">
                <h1>Our Objectives Of Company</h1>
                <ul class="objectives_ul">
                    @foreach ($tSection->identityAttributes as $attribute)
    <li>
                        <i class="bi bi-record-circle"></i>
                        {{ $attribute->translate('content', app()->getLocale()) }}
                    </li>
    @endforeach
                </ul>
            </div>
            <div class="objectives_img">
                <img src="content/images/Rating.png" />
            </div>
        </div> -->
        @endif

        <!-- Start Objectives Section  -->
        @php
            $tSection = $items->where('item', 'section-three')->first();
        @endphp
        <section id="objectives-section" class="mt-md-5 mt-3">
            <h5 class="global-title fw-semibold">
                Our Objectives Of Company
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
            </div>
            <ul class="objectives-items d-flex flex-column mt-3 gap-3">
                @foreach ($tSection?->identityAttributes as $item)
                    <li calss="objectives-item d-flex gap-1 lh-base">
                        <i class="bi bi-stars fs-4 text-warning"></i>
                        {{$item->translate('content', app()->getLocale())}}
                    </li>
                @endforeach
            </ul>
        </section>
        <!-- eND Objectives Section  -->
    </div>

@endsection
