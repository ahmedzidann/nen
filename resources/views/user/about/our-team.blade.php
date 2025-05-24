@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Our Team
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')


    <!-- New Desgin -->
    <div id="our-teams-section" class="container w-100 overflow-hidden">
        @if ($fSection = $items->where('item', 'section-one')->first())
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
            <div class="our-teams_img">
                <img src="{{ $fSection->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
            </div>
        @endif
        @if ($items->count())
            <div class="our-teams mt-md-5 mt-3">
                <div class="text-start">
                    <p class="sub-title">
                        Our Teams
                    </p>
                    <h5 class="global-title">
                        Meet our team
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
                    </div>
                </div>

                <!-- Start Teams Tabs -->
                <div class="tabs-items mt-md-4 mt-3">
                    <!-- Swiper Container -->
                    <div class="swiper-container">
                        <!-- Swiper Wrapper for Tabs -->
                        <div class="swiper-wrapper px-5">
                            @foreach ($managements as $management)
                                <?php $string = str_replace(' ', '-', strtolower($management->translate('title', 'en'))); ?>
                                <div class="swiper-slide nav-item" role="presentation">
                                    <button class="nav-link swiper-tab @if ($loop->first) active @endif"
                                        id="{{ $string }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{ $string }}" type="button" role="tab"
                                        aria-controls="{{ $string }}" aria-selected="true"
                                        data-id="{{ $management->id }}">{{ $management->translate('title', app()->getLocale()) }}</button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Swiper Navigation Buttons -->
                        <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide">
                            <i class="fa fa-chevron-left"></i>
                        </div>
                        <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content mt-3" id="teamTabContent">
                        @foreach ($managements as $management)
                            <div class="tab-pane fade @if ($loop->first) show active @endif"
                                id="{{ str_replace(' ', '-', strtolower($management->translate('title', 'en'))) }}"
                                role="tabpanel"
                                aria-labelledby="{{ str_replace(' ', '-', strtolower($management->translate('title', 'en'))) }}-tab">
                                <div
                                    class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                                    @foreach ($members as $item)
                                        <div class="our-team p-3 rounded-3">
                                            <div class="pic shadow-sm">
                                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                    alt="Team Member">
                                                {{-- <ul class="social">
                                                    @if ($item->facebook != "")
                                                        <li><a target="_blank" href="{{ $item->facebook }}"
                                                            class="bi bi-facebook"></a></li>
                                                    @endif
                                                    @if ( $item->whatsapp)
                                                        <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                                                class="bi bi-whatsapp"></a></li>
                                                    @endif
                                                    @if ($item->instagram)
                                                        <li><a target="_blank" href="{{ $item->instagram }}"
                                                                class="bi bi-instagram"></a>
                                                        </li>
                                                    @endif
                                                </ul> --}}
                                            </div>
                                            <div class="team-content">
                                                <div class="team-info">
                                                    <h3 class="title">{{ $item->name }}</h3>
                                                    <span class="post text-center">{{ $item->jop }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Teams Tabs -->
            </div>

    </div>
    @endif
    </div>

@endsection
@section('websiteScript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.nav-link').forEach(tab => {
                tab.addEventListener('click', function() {
                    document.querySelectorAll('.nav-link.active').forEach(activeTab => {
                        activeTab.classList.remove('active');
                    });
                    const managementId = this.getAttribute('data-id');
                    this.classList.add('active');

                    // Dynamically construct the URL
                    let url = '{{ route('get-team-members', ['id' => ':id']) }}'.replace(':id',
                        managementId);

                    // Make the AJAX request using fetch
                    fetch(url)
                        .then(response => response.json()) // Parse the JSON data
                        .then(data => {
                            document.getElementById('teamTabContent').innerHTML = data.data;
                            // Here, you can use the data to dynamically update the UI
                        })
                        .catch(error => console.error('Error:', error)); // Log any errors
                });
            });
            // Initialize Swiper after DOM is fully loaded
            const swiper = new Swiper('.swiper-container', {
                slidesPerView: 'auto',
                spaceBetween: 20,
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
@endsection
