@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Awards @endsection
@section('cover_image')
    {{ isset($slider)? $slider->getFirstMediaUrl('image'): asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">

    @if ($fSection)
    <div class="Awards_flex">
        <div class="Awards_titel">
            <h1>{{$fSection->title}}</h1>

            <p>{!! ($fSection->description)!!}</p>
        </div>

        <div class="Awards_img">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>
    </div>
    @endif

    <div class="Awards_head_titel">
        <h1>AWARDS</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 Awards_bttn " id="pills-tab" role="tablist">
                <!-- Swiper -->
                <div class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper swipper_action" id="swiper-wrapper-106b4cf6610d8a50610" aria-live="polite">
                        @foreach ($subAwards as $key=>$award)
                            <div class="swiper-slide {{ $key==0? 'swiper-slide-active':($key==1?'swiper-slide-next':'swiper-slide') }}" role="group" aria-label="{{$key+1}} / 6" style="margin-right: 5px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link proj_bttn  {{ $loop->first? 'active':'' }}" id="pills-{{$award->slug}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$award->slug}}" type="button"
                                     role="tab" aria-controls="pills-{{$award->id}}" aria-selected="true">
                                     {{$award->name}}</button>
                            </li>
                        </div>
                        @endforeach

                        {{-- <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 6" style="margin-right: 5px;">
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
                        </div> --}}

                        {{-- <div class="swiper-slide" role="group" aria-label="6 / 6" style="margin-right: 5px;">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">LEARNING CENTER</button>
                            </li>
                        </div> --}}

                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-106b4cf6610d8a50610" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-106b4cf6610d8a50610" aria-disabled="true"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

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
                <div class="tab-pane fade {{ $loop->first? 'active show':'' }}" id="pills-{{$award->slug}}" role="tabpanel" aria-labelledby="pills-{{$award->slug}}-tab" tabindex="0">
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
                                        <p><img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a target="_blank" href='{{$item->getFirstMediaUrl('StaticTable2')}}'>Reference</a></span>
                                        </p>
                                        <p><img src="{{url('content/images/small_icon/global.png')}}"><span><a target="_blank" href="{{$item->url}}">Website</a> </span>
                                        </p>
                                        <p><img src="{{url('content/images/small_icon/calendar-2.png')}}"><span>{{$item->years_text}}</span></p>
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
                <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
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
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
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
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
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
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>

            </div>
        </div>
    </div>






</div>
@endsection
