@extends('user.layout.master')
@section('parent_page_name')
    Testing
@endsection
@section('page_name')
    Testing
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')

    <div class="testing">
        <div class="container">
            <div class="text-start">
                <h6 class="fs-5 mb-1 text-muted">Testing</h6>
                <h5 class="global-title">
                    {{ $tech->name }}
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="vector">
                </div>
            </div>

            @if ($fSection = $items)
                <div id="about-section">
                    <div class="flex_sec_content row g-5 align-items-center">
                        <div class="col-md-7">
                            {{-- <h3 class="decorated-title">
                                {{ $fSection->title }}
                                <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="vector">
                            </h3> --}}
                            <div class="data">
                                <p
                                    class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($fSection->description) >= 300 ? 'p_clamp_2' : '' }}" id="description_text">
                                    
                                </p>

                                @if (strlen($fSection->description) >= 300)
                                    <a role='btn' onclick="toggleDescription(this)"
                                        class="mt-3 read_more read_more_btn">Read More
                                        <i class="bi bi-chevron-down"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="about-image-item card border-0 w-100 container-data">
                                <div class="about-image-container h-100">
                                    <img src="{{ $fSection->getFirstMediaUrl('Testing') }}" loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="about image">
                                </div>
                                <div class="blob"></div>
                            </div>
                        </div>
                    </div>
            @endif
            <hr>
            <div class="counter_sec">
                @if ($items)
                    @forelse ($items->where('item','section-two') as $item)
                        <div class="hovering-lighted-card">
                            <div class="bg">
                                <div class="counter-item p-3">
                                    <div class="image-count d-flex justify-content-center mt-2">
                                        <img src="{{ $item->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="count image">
                                    </div>
                                    <h2 class="fs-4 fw-bold">{{ $item->title }}</h2>
                                    <p>{{ $item->subtitle }}</p>
                                </div>
                            </div>
                            <div class="blob"></div>
                        </div>
                    @empty
                        @include('user.layout.includes.no-data')
                    @endforelse
                @else
                    @include('user.layout.includes.no-data')
                @endif
            </div>
        </div>
    </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Insert the description content from the server into the <p> element
            const content = `{!! htmlspecialchars_decode($fSection->description, ENT_QUOTES | ENT_HTML5) !!}`;
            const description = document.getElementById('description_text');
            description.innerHTML = content;

            // Define the toggleDescription function globally so it can be used in the HTML
            window.toggleDescription = function(button) {
                const description = button.previousElementSibling; // Get the previous <p> element

                if (description.classList.contains('p_clamp_2')) {
                    description.classList.remove('p_clamp_2');
                    button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
                } else {
                    description.classList.add('p_clamp_2');
                    button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
                }
            };
        });
    </script>
@endsection
