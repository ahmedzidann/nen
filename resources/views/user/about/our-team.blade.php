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
    <div id="our-teams-section" class="container">
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
                    <ul class="nav nav-tabs" id="teamTabs" role="tablist">
                        @foreach ($managements as $management)
                            <li class="nav-item" role="presentation">
                                <?php $string = str_replace(' ', '-', strtolower($management->translate('title', 'en'))); ?>
                                <button class="nav-link @if ($loop->first) active @endif"
                                    id="{{ $string }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $string }}"
                                    type="button" role="tab" aria-controls="{{ $string }}" aria-selected="true"
                                    data-id="{{ $management->id }}">{{ $management->translate('title', app()->getLocale()) }}</button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-3" id="teamTabContent">
                        <div class="tab-pane fade show active"
                            id="{{ str_replace(' ', '-', strtolower($managements->first()->translate('title', 'en'))) }}"
                            role="tabpanel"
                            aria-labelledby="{{ str_replace(' ', '-', strtolower($managements->first()->translate('title', 'en'))) }}-tab">
                            <div
                                class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                                @foreach ($members as $item)
                                    <div class="our-team p-3 rounded-3">
                                        <div class="pic shadow-sm">
                                            <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Team Member">
                                            <ul class="social">
                                                <li><a target="_blank" href="{{ $item->facebook }}"
                                                        class="bi bi-facebook"></a></li>
                                                <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                                        class="bi bi-whatsapp"></a></li>
                                                <li><a target="_blank" href="{{ $item->instagram }}"
                                                        class="bi bi-instagram"></a>
                                                </li>
                                            </ul>
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
                    </div>
                </div>
                <!-- End Teams Tabs -->

            </div>
        @endif
    </div>

    <!-- Old Desgin (Remove d-none Class to view it again-->
    <div class="about_content d-none">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <div class="investors_flex">
                <div class="investors_titel">
                    <h1>{{ $fSection->title }}</h1>
                    <p>{{ strip_tags($fSection->description) }}</p>
                </div>

                <div class="investors_img">
                    <img src="{{ $fSection->getFirstMediaUrl('OurTeam') }}">
                </div>


            </div>
        @endif
        @if ($items->count())
            <div class="teams_sec">
                <div class="our_team_titels">
                    <h5>Our Teams</h5>
                    <h1>Meet our team</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text.</p>

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
                    const managementId = this.getAttribute('data-id');

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
        });
    </script>
@endsection
