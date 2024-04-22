
@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Achievements @endsection
@section('cover_image')
    {{ isset($slider)? $slider->getFirstMediaUrl('image'): asset('content/images/about_img.png')}}
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
                <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
            </div>


        </div>
    @endif


        <div class="bg_team_div" style="background-image: url({{asset('content/images/team_view.jpeg')}});">
            <div class="nen_sec">
                <div class="flex_upper_div">
                    <h3>NEN is a professional consulting company</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>

                </div>
                <div class="two_flex_grid_sec">
                    @foreach ($years as $year)
                    <div class="grid_sec">
                            @foreach ($items->where('years', $year) as $achievement)
                            <div class="year_div">
                                <h5>{{$achievement->title}}</h5>
                                <p>{!!$achievement->description!!}</p>
                            </div>
                            @endforeach

                            {{-- <div class="year_div">
                                <h5>Jan, 2018</h5>
                                <p>Launch of elite membership program for all categories. This membership
                                    facilitates many of the difficulties they face in developing their educational
                                    skills.</p>
                            </div> --}}


                            <span class="span_number">{{$year}}</span>
                        </div>
                    @endforeach


                </div>

            </div>


        </div>


    </div>

@endsection
