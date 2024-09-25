@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Achievements
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
    <div class="about_content">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <!-- <div class="investors_flex">
                            <div class="investors_titel">
                                <h1>{{ $fSection->title }}</h1>
                                <p>{{ strip_tags($fSection->description) }}</p>
                            </div>

                            <div class="investors_img">
                                <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}">
                            </div>


                        </div> -->
            <!-- Start Acheivements Hero Section -->
            <div id="acheivements-section">
                <div class="texts-data d-flex flex-column align-items-start">
                    <h5 class="global-title">
                        {{ $fSection->title }}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    <p class="global-description">
                        {{ strip_tags($fSection->description) }}
                    </p>
                </div>

                <div class="acheivements_img">
                    <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}">
                </div>
            </div>
            <!-- End Acheivements Hero Section -->
        @endif

        <!-- Old Desgin (Remove d-none Class to view it again-->
        <div class="bg_team_div d-none" style="background-image: url({{ asset('content/images/team_view.jpeg') }});">
            <div class="nen_sec">
                <div class="flex_upper_div">
                    <h3>NEN is a professional consulting company</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>

                </div>
                <div class="two_flex_grid_sec">
                    @foreach ($years as $year)
                        <div class="grid_sec">
                            @foreach ($items->where('years', $year) as $achievement)
                                <div class="year_div">
                                    <h5>{{ $achievement->title }}</h5>
                                    <p>{!! $achievement->description !!}</p>
                                </div>
                            @endforeach

                            <span class="span_number">{{ $year }}</span>
                        </div>
                    @endforeach
                </div>

            </div>


        </div>

        <!-- Start Acheivements Timeline Section -->
        <div id="acheivements-timeline-section" class="mt-md-5 mt-3">
            <div class="texts-data d-flex flex-column align-items-start">
                <h5 class="global-title">
                    NEN is a professional consulting company
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="global-description">
                    NEN is a trusted consulting firm with a proven track record in delivering innovative solutions across
                    various industries. With a focus on excellence, we provide expert guidance to help organizations achieve
                    their goals, streamline operations, and drive growth. Our team of experienced professionals is dedicated
                    to ensuring client success through tailored strategies and comprehensive consulting services.
                </p>
            </div>

            <div class="tabs-items">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <!-- Static Tabs -->
                    @foreach ($years as $yearNumber)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if ($loop->first) active @endif proj_bttn"
                                id="pills-{{ $yearNumber }}-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-{{ $yearNumber }}" type="button" role="tab"
                                aria-controls="pills-{{ $yearNumber }}"
                                aria-selected="true">{{ $yearNumber }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab Pane 1 -->
                    @foreach ($years as $year)
                        <div class="tab-pane fade show @if ($loop->first) active @endif" id="pills-{{$year}}" role="tabpanel"
                            aria-labelledby="pills-{{$year}}-tab" tabindex="0">
                            <div class="two_flex_grid_sec mt-5">
                                <div class="grid_sec">
                                    @foreach ($items->where('years', $year) as $achievement)
                                        <div class="year_div">
                                            <h5 class="global-title">
                                                {{ $achievement->title }}
                                            </h5>
                                            <p class="global-description">
                                                {!! $achievement->description !!}
                                            </p>
                                        </div>
                                    @endforeach
                                    <span class="span_number" style="color: white;">
                                        {{ $year }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End Acheivements Timeline Section -->

    </div>
@endsection
