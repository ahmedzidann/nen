@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Careers @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<!-- New Desgin -->
<div id="careers-section" class="container">
    @if ($fSection = $items->where('item','section-one')->first())
    <div class="texts-data d-flex flex-column align-items-start">
        <h5 class="global-title">
            {{$fSection->title}}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
        <p class="fs1-1 text-muted pt-3 lh-base text-start">
            {{strip_tags($fSection->description)}}
        </p>
    </div>
    <div class="careers_img">
        <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" loading="lazy"
            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
    </div>
    @endif

    <div class="Jobs-offers mt-md-5 mt-3">
        <div class="text-start">
            <p class="sub-title">
                Our Jobs Offers
            </p>
            <h5 class="global-title fw-semibold">
                Some of the jobs offered
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>
        @if ($items->where('item','section-two')->count())
        <div class="cards-list row mt-3">
            @foreach ($items->where('item','section-two') as $item)
            <div class="col-md-6 mb-3 d-flex h-100">
                <div class="card-item rounded-3 p-3 d-flex flex-column justify-content-between h-100">
                    @php
                    $date = Carbon\Carbon::parse($item->created_at)
                    @endphp
                    <div class="basic-info d-flex gap-3">
                        <div class="image-box">
                            <img src="{{$item->getFirstMediaUrl('StaticTable')}}" alt="Image">
                        </div>
                        <div class="basic-text d-flex flex-column gap-1">
                            <p class="text-muted fs-5-2">{{$item->subtitle}}</p>
                            <h5>{{$item->title}}</h5>
                            @if ($date->isToday())
                            @endif
                        </div>
                    </div>
                    <div class="details mt-3 d-flex flex-column gap-3">
                        <div class="icons-div d-flex gap-2 align-items-center flex-wrap">
                            <p class="d-flex align-items-center gap-1 text-second-color">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{$item->city}}</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 text-warning">
                                <i class="bi bi-clock"></i>
                                <span>{{$item->job_type}}</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 text-success">
                                <i class="bi bi-currency-dollar"></i>
                                <span>{{$item->salary}}</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 text-primary">
                                <i class="bi bi-calendar2"></i>
                                <span>{{$date->diffForHumans()}}</span>
                            </p>
                        </div>
                        <span
                            class="description text-start text-muted {{ strlen($fSection->description)>= 200 ? 'p_clamp_2':''}}">
                            {{ html_entity_decode(strip_tags($fSection->description)) }}
                        </span>
                        @if (strlen($fSection->description)>= 200)
                        <a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i
                                class="bi bi-chevron-down"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @endif
    </div>
</div>

<!-- Old Desgin (Remove d-none Class to view it again-->
<div class="about_content d-none">
    @if ($fSection = $items->where('item','section-one')->first())
    <div class="investors_flex">
        <div class="investors_titel">
            <h1>{{$fSection->title}}</h1>
            <p>{{strip_tags($fSection->description)}}</p>

        </div>

        <div class="investors_img">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>
    </div>
    @endif

    <div class="teams_sec">
        <div class="our_team_titels">
            <h1>Some of the jobs offered</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

        </div>
        @if ($items->where('item','section-two')->count())
        <div class="grid_dive_cards">
            @foreach ($items->where('item','section-two') as $item)
            <div class="card frame_card">
                @php
                $date = Carbon\Carbon::parse($item->created_at)
                @endphp
                <div class="frame_card_content_img">
                    <div class="frame_img">
                        <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                    </div>
                    <div class="frame_card_content">
                        <h6>{{$item->subtitle}}</h6>
                        <h5>{{$item->title}}</h5> @if ($date->isToday())
                        <span class="span_style">New Post</span>
                        @endif

                        <div class="small_icons_div">
                            <p><i class="bi bi-geo-alt"></i><span>{{$item->city}}</span></p>
                            <p><i class="bi bi-clock"></i><span>{{$item->job_type}}</span></p>
                            <p><i class="bi bi-currency-dollar"></i><span>{{$item->salary}}</span></p>
                            <p><i class="bi bi-calendar2"></i><span>{{$date->diffForHumans()}}</span></p>
                        </div>
                        <span
                            class=" description text-start  {{ strlen($fSection->description)>= 200 ? "p_clamp_2":''}}">
                            {{ html_entity_decode(strip_tags($fSection->description)) }}</span>
                        @if (strlen($fSection->description)>= 200)

                        <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i
                                class="bi bi-chevron-down"></i></a>
                        @endif
                        {{-- <a href="#" class="read_more">Read More <i class="bi bi-chevron-down"></i></a> --}}

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endif
    </div>





</div>

<script>
function toggleDescription(button) {
    var description = button.previousElementSibling;
    if (description.classList.contains('p_clamp_2')) {
        description.classList.remove('p_clamp_2');
        button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
    } else {
        description.classList.add('p_clamp_2');
        button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
    }
}
</script>
@endsection