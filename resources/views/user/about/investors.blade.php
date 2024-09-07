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
    <ul class="nav nav-tabs subsidiaries_tab" id="myTab" role="tablist">

        <li class="nav-item" role="presentation">
            <button class="nav-link active bttn_tab_color" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                aria-selected="true">subsidiaries</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link bttn_tab_color" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                aria-selected="false">Sister Companies</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">

            @if ($items->where('item', 'section-foure')->count())

            <div class="subsidiaries_sec_content">
                {{-- <h1 class="subsidiaries_titel">subsidiaries</h1> --}}
                <div class="subsidiaries__sec">
                    @forelse ($subInvestors as $sub)
                    <div class="subsidiaries_content">
                        <div class="flg_div">
                            <img src="{{ $sub->getFirstMediaUrl('StaticTable') }}">
                        </div>
                        <div class="subsidiaries_details">
                            <h5>{{ $sub->translate('title', app()->getLocale()) }}</h5>
                            <div class="flags_sec">
                                @foreach ($sub->investorAttributes as $row)
                                <div class="flag_icon_titel">
                                    <div class="sub_contennt">
                                        <h6><img src="{{ $row->country->getFirstMediaUrl('flag') }}">
                                            <p>Since : <span>{{ $row->since }}</span></p>
                                        </h6>
                                        <h6>
                                            <p>Sharing : <span>{{ $row->percent }}%</span></p>
                                        </h6>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                            <a href="{{ $sub->url}}" class="website_link">Website</a>
                        </div>

                    </div>

                    @empty
                    <h1>No Data Available</h1>
                    @endforelse

                </div>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

            @if ($items->where('item', 'section-foure')->count())

            <div class="subsidiaries_sec_content">
                {{-- <h1 class="subsidiaries_titel">Sister Companies
                </h1> --}}
                <div class="subsidiaries__sec">
                    @forelse ($sisInvestors as $sister)
                    <div class="subsidiaries_content">
                        <div class="flg_div">
                            <img src="{{ $sister->getFirstMediaUrl('StaticTable') }}">
                        </div>
                        <div class="subsidiaries_details">
                            <h5>{{$sister->translate('title', app()->getLocale())}}</h5>
                            <div class="flags_sec">
                                @foreach ($sister->investorAttributes as $attr)
                                <div class="flag_icon_titel">
                                    <div class="sub_contennt">
                                        <h6><img src="{{ $attr->country->getFirstMediaUrl('flag') }}">
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
    </div>
    @endsection
