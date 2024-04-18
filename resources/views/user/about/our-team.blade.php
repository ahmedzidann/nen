@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Our Team @endsection
@section('cover_image')
    {{asset('content/images/about_img.png')}}
@endsection
@section('content')

    <div class="about_content">
        @if ($fSection =  $items->where('item','section-one')->first())

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
