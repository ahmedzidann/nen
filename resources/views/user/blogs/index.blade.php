@extends('user.layout.blogs.master')
@section('parent_page_name')
Blogs
@endsection
@section('page_name')
Blogs
@endsection
@section('websiteStyle')
<link rel="stylesheet" href="{{ asset('content/styles/pages/blogs-page/blog.css') }}" />
<link rel="stylesheet" href="{{ asset('content/styles/pages/blogs-page/blog-rtl.css') }}" />

{{-- start toastr --}}
<link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}" />
{{-- end toastr --}}
<style>

</style>
@endsection
@section('content')
<!-- Start Slider -->
<div class="slider position-relative overflow-hidden">
    <!-- Display list Items -->
    <div class="list d-flex w-100 h-100"></div>
    <!-- Create Slider Dots -->
    <div class="slider-dots px-5 position-absolute d-flex gap-1 z-2"></div>
</div>
<!-- End Slider -->
<!-- Start blogs -->
<div class="blogs p-4" id="blogList">
    <div class="title-and-filter d-flex justify-content-between flex-wrap">
        <div class="title mb-5 " id="blogText">
            <div>
                <h2 class="fs-2 fw-semibold">Blogs</h2>
                <div class="under-title-vector">
                    <img src="https://dev.nendemo2024.xyz/content/images/vector-title.svg" loading="lazy" alt="vector">
                </div>
            </div>
            <p class="my-1 fs-6">
                Here, we share travel tips, destination guides, and stories that
                inspire your next adventure.
            </p>
        </div>
        <div class="filter d-flex gap-1 align-items-center p-3">
            <span id="sortTitle"> Sort by :</span>
            <div id="sort" class="position-relative">
                <select class="dropdown category" id="select">
                    <option selected>
                        All
                    </option>
                    <option>
                        Latest Blogs
                    </option>
                    <option>
                        Oldest Blogs
                    </option>
                    <option>
                        Popular Blogs
                    </option>
                </select>
            </div>
            <svg viewBox="0 0 24 24" class="droupdown-arrow position-absolute no-rotate" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7 10L12 15L17 10" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>
        </div>
    </div>
    <!-- Display categorates -->
    <div class="swiper d-flex gap-2">
        <button class="back-btn swiper-btn py-2 px-1 rounded" name="backButton" aria-label="Go back">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs">
                <path d="M15 18l-6-6 6-6"></path>
            </svg>
        </button>
        <div class="categorates d-flex gap-2 overflow-auto"></div>
        <button class="next-btn swiper-btn py-2 px-1 rounded" name="nextButton" aria-label="Go forward">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="25" height="25">
                <g id="SVGRepo_bgCarrier1111121" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier4545" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier44">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L9.70711 19.7071C9.31658 20.0976 8.68342 20.0976 8.29289 19.7071C7.90237 19.3166 7.90237 18.6834 8.29289 18.2929L14.5858 12L8.29289 5.70711C7.90237 5.31658 7.90237 4.68342 8.29289 4.29289Z"
                        fill="#ffffff"></path>
                </g>
            </svg>
        </button>
    </div>

    <!-- Create Cards -->

    <div class="cards my-5 row"></div>
    <div class="pagination d-flex justify-content-center my-3"></div>
</div>

<!-- End Blogs -->

<!-- Start Ads -->
<div class="ads m-4 d-grid gap-3">
    <div class="booking text-black position-relative rounded overflow-hidden">
        <img src="https://wakeb-tech-site.vercel.app/images/useCases/cases/wind.webp" alt="Destination"
            class="position-absolute w-100 top-0 start-0 object-fit-cover h-100" />
        <div id="booking"
            class="booking-content d-flex py-3 px-4 w-100 h-100 text-white justify-content-lg-end justify-content-sm-center flex-column">
            <h2 class="fs-3 z-2">Explore more to get your comfort zone</h2>
            <p class="z-2 text-white mt-3 mb-4">Book your perfect stay with us.</p>
            <button class=" booking  p-2 rounded z-2" name="bookingButton" aria-label="Book now">Booking Now
            </button>

        </div>
    </div>

    <div class="article position-relative rounded">
        <img src="https://cdn3.pixelcut.app/7/20/uncrop_hero_bdf08a8ca6.jpg" alt="Clothes"
            class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover rounded" />
        <div id="article"
            class="article-content d-flex py-3 px-4 w-100 h-100 text-white justify-content-lg-end justify-content-sm-center flex-column">
            <p class="fs-4 z-2">Article Available</p>
            <h3 class="fs-1 z-2">78</h3>
        </div>
    </div>
    <div id="beyond" class="beyond position-relative">
        <img src="https://img-cdn.pixlr.com/image-generator/history/65661ff66061274d12af3e59/1b1b22a1-56ad-4002-9705-b95bf8c5bc4e/medium.webp"
            alt="Scenic Image" class="w-100 rounded" />
        <h2 class="position-absolute top-50  start-50 translate-middle text-center text-white fs-2">
            Beyond accommodation, creating memories of a lifetime
        </h2>
    </div>
</div>

<!-- toTop button -->
<button id="toTop" class="top position-fixed z-2 cursor-pointer rounded-circle border-secondary opacity-0"
    name="scrollToTop" aria-label="Scroll to top">
    <svg xmlns="https://cdn3.pixelcut.app/7/20/uncrop_hero_bdf08a8ca6.jpg" height="30" fill="currentColor"
        class="bi bi-arrow-up-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z">
        </path>
    </svg>
</button>
<script>

</script>

<!-- <a href="{{route('blogs.details')}}" target="__blannk">details</a> -->
@endsection
@section('websiteScript')
<script src="{{ asset('content/js/pages/blogs.js') }}"></script>
@endsection