
@extends('user.layout.master')
@section('parent_page_name')Testing @endsection
@section('page_name'){{$partner->name}} @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')
    <div class="about_content">
        <h1>{{$partner->name}}</h1>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content certificates_h" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php
                    $fs= $items->where('item','section-one')
                    ->where('childe_pages_id',$sub->id)->first();

                @endphp

                <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                    aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
                    <div class="explain_titel">
                        <p>{!! $fs?->description !!}</p>

                    </div>

                    <div class="swiper-slide">
                        @if ($fs)
                            <img src="{{$fs->getFirstMediaUrl('StaticTable')}}" alt="{{$fs->title}}">
                        @endif
                    </div>


                    <div class="ceryifcates_sec">



                            <div class="grid_div_bttn">
                                <div class="grid_div">
                                    @forelse ($items->where('pages_id',$sub->id) as $item)

                                    <div class="card card_styles">
                                        <div class="card_content">
                                            <div class="iso_div">
                                                <img src="{{$item->getFirstMediaUrl('Education')}}">
                                                <p>{{$item->title}} {{--<span>({{$item->years_text}})</span>--}}</p>
                                            </div>
                                            <div class="iso_titels">
                                            {!! $item->description!!}

                                                <div class="flex_icons_div">
                                                    <p>
                                                        <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a  href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                    </p>
                                                    <p>
                                                        <img  src="{{url('content/images/small_icon/global.png')}}"><span><a  href="{{$item->url}}">Website</a></span>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @empty
                                        <div style="display: flex; justify-content: center;">
                                            <p style="color:#999;">There is No Data Available</p>
                                        </div>
                                    @endforelse


                                </div>

                            </div>




                    </div>
                </div>


                @endforeach
            </div>
        </div>
        </div>
    {{-- </div> --}}

@endsection
