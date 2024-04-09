@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Careers @endsection
@section('content')
    <div class="about_content">
        @if ($fSection =  $items->where('item','section-one')->first())
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

                        <div class="frame_card_content_img">
                            <div class="frame_img">
                                <img src="content/images/small_icon/Frame 17.png">
                            </div>
                            <div class="frame_card_content">
                                <h6>Linear company</h6>
                                <h5>{{$item->title}} <span class="span_style">New Post</span></h5>
                                <div class="small_icons_div">
                                    <p><i class="bi bi-geo-alt"></i><span>Cairo</span></p>
                                    <p><i class="bi bi-clock"></i><span>Full time</span></p>
                                    <p><i class="bi bi-currency-dollar"></i><span>10k</span></p>
                                    <p><i class="bi bi-calendar2"></i><span>1 year</span></p>
                                </div>
                                <p class="p_detail">{!! ($fSection->description)!!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            @endif
        </div>





    </div>
@endsection
