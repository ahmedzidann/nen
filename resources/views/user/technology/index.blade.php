@extends('user.layout.master')
@section('parent_page_name')Technology @endsection
@section('page_name')Technology @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <h5>Education</h5>
    <h2>{{$tech->name}}</h2>
    @if ($fSection =  $items->where('item','section-one')->first())
    <div class="flex_sec_content">
        <div class="left_side col-sm-6" style="">
            <h2>{{ $fSection->title }}</h2>
            <div class="iso_titels">
                <span class="description text-start {{ strlen($fSection->description) >= 300 ? "p_clamp_2" : ''}}">
                    {{ html_entity_decode(strip_tags($fSection->description)) }}
                </span>

                @if (strlen($fSection->description) >= 300)
                <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                @endif
            </div>

            {{-- <a href="#"     class="show_hidden">show more <i class="bi bi-chevron-down"></i></a> --}}
        </div>
        <div class="right_side">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>

    </div>
    @endif

    <div class="counter_sec">
        @foreach ($items->where('item','section-two') as $item)
            <div class="counter_content">
                <h2>{{$item->title}}
                    <p>{{$item->subtitle}}</p>
                </h2>
                <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
            </div>
        @endforeach

    </div>


    <!-- <div class="bg_div" style="background-image: url(content/images/women.png);">
        <div class="number_div">

            <div class="num_img_div">
                <img src="content/images/small_icon/Vector (1).png">
                <h3>19 +</h3>
                <p>Lorem Ipsum</p>
            </div>

            <div class="num_img_div">
                <img src="content/images/small_icon/Vector.png">
                <h3>20 +</h3>
                <p>Lorem Ipsum</p>
            </div>

            <div class="num_img_div">
                <img src="content/images/small_icon/people.png">
                <h3>850 +</h3>
                <p>Lorem Ipsum</p>
            </div>

            <div class="num_img_div">
                <img src="content/images/small_icon/receipt-add.png">
                <h3>16 +</h3>
                <p>Lorem Ipsum</p>
            </div>

        </div>

    </div> -->



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
