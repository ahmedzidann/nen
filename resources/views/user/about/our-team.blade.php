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
        <p class="global-description">
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
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="member-board-tab" data-bs-toggle="tab"
                        data-bs-target="#member-board" type="button" role="tab" aria-controls="member-board"
                        aria-selected="true">Member Board</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="financial-department-tab" data-bs-toggle="tab"
                        data-bs-target="#financial-department" type="button" role="tab"
                        aria-controls="financial-department" aria-selected="false">Financial Department</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-department-tab" data-bs-toggle="tab"
                        data-bs-target="#marketing-department" type="button" role="tab"
                        aria-controls="marketing-department" aria-selected="false">Marketing Department</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="it-department-tab" data-bs-toggle="tab" data-bs-target="#it-department"
                        type="button" role="tab" aria-controls="it-department" aria-selected="false">IT
                        Department</button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="teamTabContent">
                <!-- Member Board -->
                <div class="tab-pane fade show active" id="member-board" role="tabpanel"
                    aria-labelledby="member-board-tab">
                    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                        @foreach ($items->where('item', 'member-board') as $item)
                        <div class="our-team p-3 rounded-3">
                            <div class="pic shadow-sm">
                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Team Member">
                                <ul class="social">
                                    <li><a target="_blank" href="{{ $item->facebook }}" class="bi bi-facebook"></a></li>
                                    <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                            class="bi bi-whatsapp"></a></li>
                                    <li><a target="_blank" href="{{ $item->instagram }}" class="bi bi-instagram"></a>
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

                <!-- Financial Department -->
                <div class="tab-pane fade" id="financial-department" role="tabpanel"
                    aria-labelledby="financial-department-tab">
                    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                        @foreach ($items->where('item', 'financial-department') as $item)
                        <!-- Repeat same structure as above -->
                        <div class="our-team p-3 rounded-3">
                            <div class="pic shadow-sm">
                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Team Member">
                                <ul class="social">
                                    <li><a target="_blank" href="{{ $item->facebook }}" class="bi bi-facebook"></a></li>
                                    <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                            class="bi bi-whatsapp"></a></li>
                                    <li><a target="_blank" href="{{ $item->instagram }}" class="bi bi-instagram"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3 class="title">{{ $item->name }}</h3>
                                    <span class="post">{{ $item->jop }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Marketing Department -->
                <div class="tab-pane fade" id="marketing-department" role="tabpanel"
                    aria-labelledby="marketing-department-tab">
                    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                        @foreach ($items->where('item', 'marketing-department') as $item)
                        <!-- Repeat same structure as above -->
                        <div class="our-team p-3 rounded-3">
                            <div class="pic shadow-sm">
                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Team Member">
                                <ul class="social">
                                    <li><a target="_blank" href="{{ $item->facebook }}" class="bi bi-facebook"></a></li>
                                    <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                            class="bi bi-whatsapp"></a></li>
                                    <li><a target="_blank" href="{{ $item->instagram }}" class="bi bi-instagram"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3 class="title">{{ $item->name }}</h3>
                                    <span class="post">{{ $item->jop }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- IT Department -->
                <div class="tab-pane fade" id="it-department" role="tabpanel" aria-labelledby="it-department-tab">
                    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                        @foreach ($items->where('item', 'it-department') as $item)
                        <!-- Repeat same structure as above -->
                        <div class="our-team p-3 rounded-3">
                            <div class="pic shadow-sm">
                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Team Member">
                                <ul class="social">
                                    <li><a target="_blank" href="{{ $item->facebook }}" class="bi bi-facebook"></a></li>
                                    <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                            class="bi bi-whatsapp"></a></li>
                                    <li><a target="_blank" href="{{ $item->instagram }}" class="bi bi-instagram"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3 class="title">{{ $item->name }}</h3>
                                    <span class="post">{{ $item->jop }}</span>
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