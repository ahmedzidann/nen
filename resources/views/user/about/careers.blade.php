@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Careers @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
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
                                <span class=" description text-start  {{ strlen($fSection->description)>= 200 ? "p_clamp_2":''}}"> {{ html_entity_decode(strip_tags($fSection->description)) }}</span>
                                @if (strlen($fSection->description)>= 200)

                                <a  role='btn' onclick="toggleDescription(this)" class="read_more" >Read More <i class="bi bi-chevron-down"></i></a>
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
