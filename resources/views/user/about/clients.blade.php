@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Clients @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    @if ($fSection =  $items->where('item','section-one')->first())
    <div class="Awards_flex">
        <div class="Awards_titel">
            <h1>{{$fSection->title}}</h1>

            {!! $fSection->description!!}
        </div>

        <div class="Awards_img">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>


    </div>
    @endif
    <div class="Awards_head_titel">
        <h1>Our Clients</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 clients_bttn " id="pills-tab" role="tablist">

                @foreach ($subClients as $key=>$award)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$loop->first ?" active":''}} proj_bttn" id="pills-{{$award->slug}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$award->slug}}" type="button" role="tab" aria-controls="pills-{{$award->slug}}" aria-selected="true">{{$award->name}}</button>
                </li>
                @endforeach


            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($subClients as $key=>$award)
                <div class="tab-pane fade {{$loop->first ?" show active":''}}" id="pills-{{$award->slug}}" role="tabpanel" aria-labelledby="pills-{{$award->slug}}-tab" tabindex="0">
                    <div class="tabs_content">
                        <div class="client_sec">
                            @foreach ($items->where('item', $award->slug) as $item)

                                <div class="client_content">
                                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                                    <h2>{{$item->title}}</h2>
                                </div>
                            @endforeach


                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>

        </div>
    </div>
</div>
@endsection
