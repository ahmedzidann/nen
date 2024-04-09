@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Investors @endsection
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
    @if ($items->where('item','section-two')->count())
    <div class="bg_div" style="background-image: url({{ $items->where('item','section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content/images/women2.png}});">
        <div class="number_div">
            @foreach ($items->where('item','section-two') as $item)
                <div class="num_img_div">

                    <img class="w-icons" src="{{$item->getFirstMediaUrl('StaticTable')}}">
                    <h3>{{$item->title}} </h3>
                    <p>{{$item->subtitle}}</p>
                </div>
            @endforeach


        </div>

    </div>
    @endif
    @if ($items->where('item','section-foure')->count())
    <div id="clients" class="clients-sec">
        <div class="swiper clients-slide">
            <div class="swiper-wrapper">
                @foreach ($items->where('item','section-foure') as $item)
                <div class="swiper-slide">
                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}" alt="{{$item->title}}">
                </div>
                @endforeach

            </div>
        </div>

    </div>
    @endif
</div>
@endsection
