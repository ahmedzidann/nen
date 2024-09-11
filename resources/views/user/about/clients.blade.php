@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Clients @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<!-- <div class="about_content"> -->
<div id="clients-section">
    @if ($fSection = $items->where('item','section-one')->first())

    <!-- <div class="Awards_flex">
        <div class="Awards_titel">
            <h1>{{$fSection->title}}</h1>

            {!! $fSection->description!!}
        </div>
        <div class="Awards_img">
            <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
        </div>
    </div> -->

    <div class="container pb-md-5 pb-3 pt-3">
        <div id="about-section" class="row g-3 align-items-center container-data">
            <div class="col-md-7">
                <div class="text-start">
                    <h5 class="global-title fw-semibold">
                        {{$fSection->title}}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
                    </div>
                    <p class="global-description">
                        {!! $fSection->description!!}
                    </p>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-stretch">
                <div class="about-image-item card border-0 w-100">
                    <div class="about-image-container h-100">
                        <img src="{{$fSection->getFirstMediaUrl('StaticTable')}}" alt="clients image">
                    </div>
                    <div class="blob"></div>
                </div>
            </div>
        </div>
    </div>

    @endif

    <div class="clients-categories">
        <div class="tabs-items">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subClients as $key=>$award)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$loop->first ?" active":''}} proj_bttn" id="pills-{{$award->slug}}-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-{{$award->slug}}" type="button" role="tab"
                        aria-controls="pills-{{$award->slug}}" aria-selected="true">{{$award->name}}</button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content mt-md-4 mt-3" id="pills-tabContent">
                @foreach ($subClients as $key=>$award)
                <div class="tab-pane fade {{$loop->first ?" show active":''}}" id="pills-{{$award->slug}}"
                    role="tabpanel" aria-labelledby="pills-{{$award->slug}}-tab" tabindex="0">
                    <div class="tabs_content">
                        <div class="clients-items">
                            <div class="row">
                                @foreach ($items->where('item', $award->slug) as $item)
                                <div class="col-md-3 col-sm-6 col-12 d-flex mb-md-4 mb-3">
                                    <div
                                        class="tab-item-container p-md-4 p-3 shadow-sm rounded-3 flex-grow-1 d-flex flex-column {{ $loop->iteration == 3 ? '' : '' }}">
                                        <div class="client-item">
                                            <div class="client-image-box">
                                                <img src="{{$item->getFirstMediaUrl('StaticTable')}}" loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
                                            </div>
                                            <h6 class="mt-3">
                                                {{$item->title}}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">...</div>
        </div>
    </div>

    <!-- <div class="Awards_head_titel">
        <h1>Our Clients</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 clients_bttn " id="pills-tab" role="tablist">

                @foreach ($subClients as $key=>$award)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{$loop->first ?" active":''}} proj_bttn" id="pills-{{$award->slug}}-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-{{$award->slug}}" type="button" role="tab"
                        aria-controls="pills-{{$award->slug}}" aria-selected="true">{{$award->name}}</button>
                </li>
                @endforeach


            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($subClients as $key=>$award)
                <div class="tab-pane fade {{$loop->first ?" show active":''}}" id="pills-{{$award->slug}}"
                    role="tabpanel" aria-labelledby="pills-{{$award->slug}}-tab" tabindex="0">
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
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">...</div>

        </div>
    </div> -->

</div>
@endsection