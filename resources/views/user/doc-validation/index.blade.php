@extends('user.layout.master')
@section('parent_page_name')Doc VAlidation @endsection
@section('page_name'){{$tech->name}} @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <div class="Awards_flex">
        @if ($item)

            <div class="Awards_titel">
                <h1>{{$item->title}}
                </h1>

                <div class="iso_titels">
                    <span class="description text-start {{ strlen($item->description) >= 400 ? "p_clamp_2" : ''}}">
                        {{ html_entity_decode(strip_tags($item->description)) }}
                    </span>

                    @if (strlen($item->description) >= 400)
                    <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                    @endif
                </div>
                {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                </p> --}}
            </div>

            <div class="Awards_img">
                <img src="{{$item->getFirstMediaUrl('DocValidation')}}">
            </div>
        @endif


    </div>

    <div class="doc_valdation_div">
        @if ($item)
        <h1>why choose us</h1>
            <div class="p_div">
                @foreach ($item->details as $details)

                <p><i class="bi bi-check2"></i>{{$details->title}}</p>
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
