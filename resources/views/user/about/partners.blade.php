@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Partners @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')
    <div class="about_content">
        <h1>STRATIGIC PARTNERS</h1>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach
                {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link active proj_bttn" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Strategic</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Technology</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Education</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">Testing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">Business</button>
                </li> --}}
            </ul>
            <div class="tab-content certificates_h" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php

                    $fs= $items->where('item','section-one')
                    ->where('childe_pages_id',$sub->id)->first();

                @endphp
                <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                    aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
                    <div class="explain_titel">
                        <p>{!! $fs?->description !!}</p>

                    </div>

                    <div class="swiper-slide">
                        @if ($fs)
                            <img src="{{$fs->getFirstMediaUrl('StaticTable')}}" alt="{{$fs->title}}">
                        @endif
                    </div>


                <div class="ceryifcates_sec">
                    <h1>Our Partners</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>


                        <div class="grid_div_bttn">
                            <div class="grid_div">
                                @foreach ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id) as $item)

                                <div class="card card_styles">
                                    <div class="card_content">
                                        <div class="iso_div">
                                            <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                                            <p>{{$item->title}} <span>({{$item->years_text}})</span></p>
                                        </div>
                                        <div class="iso_titels">
                                           {!! $item->description!!}

                                            <div class="flex_icons_div">
                                                <p>


                                                    <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a  href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                </p>
                                                <p>
                                                    <img  src="{{url('content/images/small_icon/global.png')}}"><span><a  href="{{$item->url}}">Website</a></span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a href="#" class="read_more">Read More</a> --}}

                                </div>
                                @endforeach


                            </div>

                        </div>




                </div>
            </div>
                @endforeach
                {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab" tabindex="0">
                <div class="explain_titel">
                    <p>National Education Network sought various accreditations, including strategic,
                        technological, and educational, as well as recognition from prominent global
                        companies specializing in technological, academic, and governmental testing.
                        Many international companies rely on these test centers to conduct skill and
                        quality assessments worldwide, and National Education Network aimed to obtain
                        accreditations from these companies in a legitimate, fair, and organized manner.
                        National Education Network has successfully administered over 100,000
                        international tests across different domains in recent years, emphasizing its
                        experience and expertise in this area.</p>
                    <!-- Swiper -->
                    <div class="swiper mySwiper partners_slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="content/images/man.png"></div>
                            <div class="swiper-slide"><img src="content/images/mens.png"></div>
                            <div class="swiper-slide"><img src="content/images/women.png"></div>
                            <div class="swiper-slide"><img src="content/images/women2.png"></div>
                            <div class="swiper-slide"><img src="content/images/Switch.png"></div>
                            <div class="swiper-slide"><img src="content/images/cup1.png"></div>
                            <div class="swiper-slide"><img src="content/images/man.png"></div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <!-- Swiper JS -->
                </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                    aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="explain_titel">
                        <p>National Education Network sought various accreditations, including strategic,
                            technological, and educational, as well as recognition from prominent global
                            companies specializing in technological, academic, and governmental testing.
                            Many international companies rely on these test centers to conduct skill and
                            quality assessments worldwide, and National Education Network aimed to obtain
                            accreditations from these companies in a legitimate, fair, and organized manner.
                            National Education Network has successfully administered over 100,000
                            international tests across different domains in recent years, emphasizing its
                            experience and expertise in this area.</p>

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                    aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                    aria-labelledby="pills-disabled-tab" tabindex="0">...</div> --}}

            </div>
        </div>



        </div>
    </div>

@endsection
