@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Awards @endsection
@section('cover_image')
{{ isset($slider)? $slider->getFirstMediaUrl('image'): asset('content/images/about_img.png')}}
@endsection
<style>
span {
    font-size: 20px !important;
}
</style>
@section('content')

<div class="about_content">
    @if ($fSection)
    <!-- <div class="Awards_flex">
        <div class="Awards_titel">
            <h1>{{$fSection->title}}</h1>

            <p>{!! ($fSection->description)!!}</p>
        </div>

        <div class="Awards_img">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>
    </div> -->

    <!-- Start Awards Hero Section -->
    <section id="awards-section">
        <div class="container pb-md-5 pb-3 pt-3">
            <div class="row g-5 align-items-center">
                <div class="col-md-7">
                    <div class="text-start">
                        <h5 class="global-title">
                            {{$fSection->title}}
                        </h5>
                        <div class="under-title-vector">
                            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="vector">
                        </div>
                        <p class="global-description">
                            {!! ($fSection->description)!!}
                        </p>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-stretch">
                    <div class="awards-image-item card border-0 w-100">
                        <div class="awards-image-container h-100">
                            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}" alt="about image">
                        </div>
                        <div class="blob"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Awards Hero Section -->
    @endif

    <!-- Start Swiper Slider -->
    <div class="award-swiper">
        <div class="text-start">
            <h5 class="global-title fw-semibold">
                Awards
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>
        <div class="tabs-items mt-md-4 mt-3">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <div
                    class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper swipper_action" aria-live="polite">
                        @foreach ($subAwards as $key => $award)
                        <div class="swiper-slide {{ $key == 0 ? 'swiper-slide-active' : ($key == 1 ? 'swiper-slide-next' : 'swiper-slide') }}"
                            role="group" aria-label="{{ $key + 1 }} / {{ count($subAwards) }}"
                            style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn {{ $loop->first ? 'active' : '' }}"
                                    id="pills-{{ $award->slug }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{ $award->slug }}" type="button" role="tab"
                                    aria-controls="pills-{{ $award->slug }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $award->name }}
                                </button>
                            </li>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                        aria-label="Previous slide"></div>
                </div>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($subAwards as $award)
                <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="pills-{{ $award->slug }}"
                    role="tabpanel" aria-labelledby="pills-{{ $award->slug }}-tab">
                    <div class="tabs_content">
                        @foreach ($items->where('item', $award->slug) as $item)
                        <div class="tab-item-container p-md-4 p-3 shadow-sm rounded-3 mb-3">
                            <div class="award-info d-flex flex-wrap align-items-center gap-3">
                                <div class="logo-box shadow-sm rounded-3 overflow-hidden">
                                    <img class="logo_img" src="{{ $item->getFirstMediaUrl('StaticTable') }}"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="{{ $item->title }}">
                                </div>
                                <div class="award-data">
                                    <h5 class="global-title mb-3">
                                        {{ $item->title }}
                                    </h5>
                                    <div class="flex_icons_div">
                                        @if ($item->getFirstMediaUrl('StaticTable2'))
                                        <p>
                                            <img src="{{ url('content/images/small_icon/archive-book.png') }}"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Reference Icon">
                                            <span>
                                                <a class="ref_coloring" target="_blank"
                                                    href="{{ $item->getFirstMediaUrl('StaticTable2') }}">
                                                    Reference
                                                </a>
                                            </span>
                                        </p>
                                        @endif
                                        @if ($item->url)
                                        <p>
                                            <img src="{{ url('content/images/small_icon/global.png') }}" loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Website Icon">
                                            <span>
                                                <a class="text-main-color fs-8" target="_blank" href="{{ $item->url }}">
                                                    Website
                                                </a>
                                            </span>
                                        </p>
                                        @endif
                                        <p>
                                            <img src="{{ url('content/images/small_icon/calendar-2.png') }}"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Calendar Icon">
                                            <span class="text-black">
                                                {{ $item->years_text }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="description fs1-1 text-muted pt-3 lh-base text-start">
                                <p>{!! $item->description !!}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- End Swiper Slider -->

    <div class="Awards_head_titel d-none">
        <h1>AWARDS</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 Awards_bttn " id="pills-tab" role="tablist">
                <!-- Swiper -->
                <div
                    class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper swipper_action" id="swiper-wrapper-106b4cf6610d8a50610"
                        aria-live="polite">
                        @foreach ($subAwards as $key=>$award)
                        <div class="swiper-slide {{ $key==0? 'swiper-slide-active':($key==1?'swiper-slide-next':'swiper-slide') }}"
                            role="group" aria-label="{{$key+1}} / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn  {{ $loop->first? 'active':'' }}"
                                    id="pills-{{$award->slug}}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-{{$award->slug}}" type="button" role="tab"
                                    aria-controls="pills-{{$award->id}}" aria-selected="true">
                                    {{$award->name}}</button>
                            </li>
                        </div>
                        @endforeach
                        {{--
                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">TAMKEEN
                                    COMPETITION</button>
                            </li>
                        </div>
                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">CISCO
                                    ACADEMY</button>
                            </li>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="3 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Microsoft</button>
                            </li>
                        </div>

                        <div class="swiper-slide" role="group" aria-label="4 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">ACTIVATE ICT PRODUCT
                                    DEVELOPMENT</button>
                            </li>
                        </div>

                        <div class="swiper-slide" role="group" aria-label="5 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">INNOVATION AWARD</button>
                            </li>
                        </div>

                         <div class="swiper-slide" role="group" aria-label="6 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">LEARNING CENTER</button>
                            </li>
                        </div> --}}

                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                        aria-controls="swiper-wrapper-106b4cf6610d8a50610" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-106b4cf6610d8a50610"
                        aria-disabled="true"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>

                <!-- Swiper JS -->

                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link active proj_bttn" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">TAMKEEN COMPETITION</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab"
                        aria-controls="pills-profile" aria-selected="false">CISCO ACADEMY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Microsoft</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">ACTIVATE ICT PRODUCT
                        DEVELOPMENT</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">INNOVATION AWARD</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">LEARNING CENTER</button>
                </li> -->
            </ul>

            <div class="tab-content" id="pills-tabContent">

                @foreach ($subAwards as $award)
                <div class="tab-pane fade {{ $loop->first? 'active show':'' }}" id="pills-{{$award->slug}}"
                    role="tabpanel" aria-labelledby="pills-{{$award->slug}}-tab" tabindex="0">
                    {{$award->item}}
                    <div class="tabs_content">
                        @php
                        $it = clone $items;
                        $it = $it->where('item', $award->slug)
                        @endphp
                        @foreach ($it as $item)
                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="{{$item->getFirstMediaUrl('StaticTable')}}">

                                </div>
                                <div class="icons_div">
                                    <h5>{{$item->title}}</h5>
                                    <div class="flex_icons_div">
                                        @if ($item->getFirstMediaUrl('StaticTable2'))

                                        <p><img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a
                                                    class="ref_coloring" target="_blank"
                                                    href='{{$item->getFirstMediaUrl('StaticTable2')}}'>Reference</a></span>
                                            @endif
                                        </p>
                                        @if ($item->url)

                                        <p><img src="{{url('content/images/small_icon/global.png')}}"><span><a
                                                    class="ref_coloring" target="_blank"
                                                    href="{{$item->url}}">Website</a> </span>
                                            @endif
                                        </p>
                                        <p><img
                                                src="{{url('content/images/small_icon/calendar-2.png')}}"><span class="text-black">{{$item->years_text}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="discreption_div">
                                <p>{!!$item->description!!}</p>

                            </div>

                        </div>
                        @endforeach


                    </div>

                </div>
                @endforeach
                <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="tabs_content">
                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span class="text-black">19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>

                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span class="text-black">19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>

                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span class="text-black">19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">...</div>

            </div>
        </div>
    </div>
</div>

<script src="{{url('content/js/vendors/jquery.min.js')}}"></script>
<script src="{{url('content/js/vendors/kursor.min.js')}}"></script>
<script src="{{url('content/js/vendors/all.min.js')}}"></script>
<script src="{{url('content/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('content/js/vendors/swiper-bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script>
<script src="{{url('content/js/scripts.js')}}"></script>

<script>
var swiper = new Swiper(".Awards_slider", {
    slidesPerView: "auto",
    spaceBetween: 10,
    breakpoints: {

        1024: {
            slidesPerView: "auto",
            spaceBetween: 5
        },

        900: {
            slidesPerView: 3,
            spaceBetween: 5
        },

        650: {
            slidesPerView: 2,
            spaceBetween: 5
        },

        375: {
            slidesPerView: 1,
            spaceBetween: 5
        },

        0: {
            slidesPerView: 1,
            spaceBetween: 0
        },

    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>
@endsection