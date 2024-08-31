@extends('user.layout.master')
@section('parent_page_name')
    About
@endsection
@section('page_name')
    Investors
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
    <div class="about_content">
        @if ($fSection = $items->where('item', 'section-one')->first())
            <div class="investors_flex">
                <div class="investors_titel">
                    <h1>{{ $fSection->title }}</h1>
                    <p>{{ strip_tags($fSection->description) }}</p>
                </div>

                <div class="investors_img">
                    <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}">
                </div>

            </div>
        @endif
        @if ($items->where('item', 'section-two')->count())
            <div class="bg_div"
                style="background-image: url({{ $items->where('item', 'section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content / images / women2 . png }});">
                <div class="number_div">
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="num_img_div">

                            <img class="w-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            <h3>{{ $item->title }} </h3>
                            <p>{{ $item->subtitle }}</p>
                        </div>
                    @endforeach


                </div>

            </div>
        @endif
        @if ($items->where('item', 'section-foure')->count())
            <!-- <div id="clients" class="clients-sec">
                    <div class="swiper clients-slide">
                        <div class="swiper-wrapper">
                            @foreach ($items->where('item', 'section-foure') as $item)
    <div class="swiper-slide">
                                <img src="{{ $item->getFirstMediaUrl('StaticTable') }}" alt="{{ $item->title }}">
                            </div>
    @endforeach

                        </div>
                    </div>

                </div> -->

            <div class="subsidiaries_sec_content">
                <h1 class="subsidiaries_titel">subsidiaries</h1>
                <div class="subsidiaries__sec">
                    @forelse ($subInvestors as $sub)
                        <div class="subsidiaries_content">
                            <div class="flg_div">
                                <img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            </div>
                            <div class="subsidiaries_details">
                                <h5>{{ $sub->translate('title', app()->getLocale()) }}</h5>
                                <div class="flags_sec">
                                    @foreach ($sub->investorAttributes as $row)
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                                                    <p>Since : <span>{{ $row->since }}</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>{{ $row->percent }}%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="sub_contennt">
                                        <h6><img src="{{ asset('content/images/small_icon/Flag_of_Kuwait.svg.webp') }}">
                                            <p>Since : <span>2008</span></p>
                                        </h6>
                                        <h6>
                                            <p>Sharing : <span>100%</span></p>
                                        </h6>
                                    </div>


                                </div>
                                <a href="{{ $sub->url}}" class="website_link">Website</a>
                            </div>

                        </div>

                    @empty
                        <h1>No Data Available</h1>
                    @endforelse

                </div>
            </div>

            <div class="subsidiaries_sec_content">
                <h1 class="subsidiaries_titel">Sister Companies
                </h1>
                <div class="subsidiaries__sec">
                    @forelse ($sisInvestors as $sister)
                        <div class="subsidiaries_content">
                            <div class="flg_div">
                                <img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            </div>
                            <div class="subsidiaries_details">
                                <h5>{{$sister->translate('title', app()->getLocale())}}</h5>
                                <div class="flags_sec">
                                    @foreach ($sister->investorAttributes as $attr)
                                                                        <div class="flag_icon_titel">
                                        <div class="sub_contennt">
                                            <h6><img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                                                <p>Since : <span>{{ $attr->since}}</span></p>
                                            </h6>
                                            <h6>
                                                <p>Sharing : <span>{{ $attr->percent}}%</span></p>
                                            </h6>
                                        </div>

                                    </div>    
                                    @endforeach
                                </div>
                                <a href="{{ $sister->url}}" class="website_link">Website</a>
                            </div>

                        </div>

                    @empty
                    @endforelse

                </div>
            </div>
        @endif
    </div>
@endsection
