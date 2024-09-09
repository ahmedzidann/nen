@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Our Team @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')


<!-- New Desgin -->
<div id="our-teams-section" class="container">
    @if ($fSection = $items->where('item','section-one')->first())
    <div class="texts-data d-flex flex-column align-items-start">
        <h5 class="global-title">
            {{ $fSection->title }}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
        <p class="fs1-1 text-muted pt-3 lh-base text-start">
            {{ strip_tags($fSection->description) }}
        </p>
    </div>
    <div class="our-teams_img">
        <img src="{{ $fSection->getFirstMediaUrl('OurTeam') }}" loading="lazy"
            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
    </div>
    @endif
    @if ($items->where('item','member-board')->count())

    <div class="our-teams mt-md-5 mt-3">
        <div class="text-start">
            <p class="sub-title">
                Our Teams
            </p>
            <h5 class="global-title fw-semibold">
                Meet our team
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>

        <div class="team-list row g-3 mt-3">
            @foreach ($items->where('item','member-board') as $item)
            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                <div class="our-team p-3 rounded-3">
                    <div class="pic shadow-sm">
                        <img src="{{$item->getFirstMediaUrl('OurTeam')}}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="Team Member">
                        <ul class="social">
                            <li><a target="_blank" href="{{$item->facebook}}" class="bi bi-facebook"></a></li>
                            <li>
                                <a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                    class="bi bi-whatsapp"></a>                            </li>

                            <li><a target="_blank" href="{{$item->instagram}}" class="bi bi-instagram"></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3 class="title">{{$item->name}}</h3>
                            <span class="post">{{$item->jop}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div> --}}

        </div>
    </div>
    @endif
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
            <img src="{{$fSection->getFirstMediaUrl('OurTeam')}}">
        </div>


    </div>
    @endif
    @if ($items->where('item','member-board')->count())
    <div class="teams_sec">
        <div class="our_team_titels">
            <h5>Our Teams</h5>
            <h1>Meet our team</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                has been the industry's standard dummy text.</p>

        </div>

        <div class="grid_dives">
            @foreach ($items->where('item','member-board') as $item)
            <div class="grid_div_cont">
                <img src="{{$item->getFirstMediaUrl('OurTeam')}}">
                <h5>{{$item->name}}</h5>
                <p>{{$item->jop}}</p>
                <div class="socail_flex_icons">
                    <a href="{{$item->facebook}}"><i class="bi bi-facebook"></i></a>
                    <a href="{{$item->whatsapp}}"><i class="bi bi-whatsapp"></i></a>
                    <a href="{{$item->instagrame}}"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            @endforeach
            {{-- <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="grid_div_cont">
                    <img src="content/images/small_icon/karrly.png">
                    <h5>Demi Wilkinson</h5>
                    <p>Frontend Developer</p>
                    <div class="socail_flex_icons">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div> --}}

        </div>

    </div>
    @endif
</div>

@endsection