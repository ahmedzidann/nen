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
<div id="achievements-tab" class="about_content">
    @if ($fSection = $items->where('item', 'section-one')->first())
    <!-- Start Achievements Hero Section -->
    <div id="achievements-section">
        <div class="texts-data d-flex flex-column align-items-start">
            <h5 class="global-title">{{ $fSection->title }}</h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
            </div>
            <p class="global-description">{{ strip_tags($fSection->description) }}</p>
        </div>

        <div class="achievements_img">
            <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}">
        </div>
    </div>
    <!-- End Achievements Hero Section -->
    @endif

    <!-- Start Achievements Timeline Section -->
    <div id="achievements-timeline-section" class="mt-md-5 mt-3">
        <div class="texts-data d-flex flex-column align-items-start">
            <h5 class="global-title">{{ TranslationHelper::translateWeb(ucfirst('NEN is a professional consulting company')??'') }}</h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
            </div>
            <p class="global-description">
               {{ TranslationHelper::translateWeb(ucfirst(' NEN is a trusted consulting firm with a proven track record in delivering innovative solutions across
                various industries. With a focus on excellence, we provide expert guidance to help organizations achieve
                their goals, streamline operations, and drive growth. Our team of experienced professionals is dedicated
                to ensuring client success through tailored strategies and comprehensive consulting services.')??'') }}
            </p>
        </div>

        <div class="tabs-items mt-md-4 mt-3">
            <!-- Start Swiper Container -->
            <div class="swiper-container">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper nav nav-pills mb-3 flex-nowrap" id="pills-tab" role="tablist">
                    @foreach ($years as $yearNumber)
                    <div class="swiper-slide nav-item" role="presentation">
                        <button class="nav-link @if ($loop->first) active @endif proj_bttn"
                            id="pills-{{ $yearNumber }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $yearNumber }}" type="button" role="tab"
                            aria-controls="pills-{{ $yearNumber }}" aria-selected="true">
                            {{ $yearNumber }}
                        </button>
                    </div>
                    @endforeach
                     
                </div>

                <!-- Add Swiper navigation controls -->
                <!-- Next button with custom SVG -->
                <div class="d-flex align-items-center justify-content-center mt-2 gap-1">

                                <!-- Previous button with custom SVG -->
                                <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-233c22c6e8a4bb89" aria-disabled="false"><i
                        class="fa fa-chevron-left"></i></div>
                <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-547e9b84ed089508" aria-disabled="false"><i
                        class="fa fa-chevron-right"></i></div>

                                 <div class="d-flex align-items-center justify-content-center mt-2 gap-1">
               </div>
            </div>
            <!-- End Swiper Container -->


            <!-- Tab Content -->
            <div class="tab-content pt-md-4 pt-3" id="pills-tabContent">
                @foreach ($years as $year)
                <div class="tab-pane fade show @if ($loop->first) active @endif" id="pills-{{$year}}" role="tabpanel"
                    aria-labelledby="pills-{{$year}}-tab" tabindex="0">
                    <div class="two_flex_grid_sec mt-5">
                        <div class="grid_sec">
                            @foreach ($items->where('years', $year) as $achievement)
                            <div class="year_div">
                                <h5 class="global-title">{{ $achievement->title }}</h5>
                                <p class="global-description">{!! $achievement->description !!}</p>
                            </div>
                            @endforeach
                            <span class="span_number" style="color: white; padding: 1rem;">
                                {{ $year }}
                            </span>
                        </div>
                    </div>
                </div>
                
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Achievements Timeline Section -->
</div>
@endsection

@section('websiteScript')
<!-- Start Swiper Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize Swiper after DOM is fully loaded
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        slidesOffsetAfter: 130,
        // slidesOffsetBefore: 130,
        freeMode: true,
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
        // Optional: Enable keyboard control
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        // Optional: Enable mousewheel control
        mousewheel: {
            forceToAxis: true,
        }
    });
});
</script>
<!-- End Swiper Script -->
@endsection