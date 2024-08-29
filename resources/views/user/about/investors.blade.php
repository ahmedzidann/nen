@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Investors @endsection
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
    <!-- <div id="clients" class="clients-sec">
        <div class="swiper clients-slide">
            <div class="swiper-wrapper">
                @foreach ($items->where('item','section-foure') as $item)
                <div class="swiper-slide">
                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}" alt="{{$item->title}}">
                </div>
                @endforeach

            </div>
        </div>

    </div> -->

       <div class="subsidiaries_sec_content">
                        <h1 class="subsidiaries_titel">subsidiaries</h1>
                        <div class="subsidiaries__sec">
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/subsid_default.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN for Information Technology</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image5.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN BIO</h5>

                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image4.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN Foundation (NGO)</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image3.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>Data Quest Documents Validation</h5>

                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/subsid_eexam.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>EEXAM (LLC)</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="subsidiaries_sec_content">
                        <h1 class="subsidiaries_titel">Sister Companies
                        </h1>
                        <div class="subsidiaries__sec">
                        <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/subsid_default.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN for Information Technology</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image5.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN BIO</h5>

                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image4.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>NEN Foundation (NGO)</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/Image3.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>Data Quest Documents Validation</h5>

                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                            <div class="subsidiaries_content">
                                <div class="flg_div">
                                    <img src="{{asset('content/images/subsid_eexam.png')}}">
                                </div>
                                <div class="subsidiaries_details">
                                    <h5>EEXAM (LLC)</h5>
                                    <div class="flags_sec">
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/Flag_of_Kuwait.svg.webp')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/es.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/uz.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="flag_icon_titel">
                                            <div class="sub_contennt">
                                                <h6><img src="{{asset('content/images/small_icon/gb.png')}}">
                                                    <p>Since : <span>2008</span></p>
                                                </h6>
                                                <h6>
                                                    <p>Sharing : <span>100%</span></p>
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                    <a href="#" class="website_link">Website</a>
                                </div>

                            </div>
                        </div>
                    </div>
    @endif
</div>
@endsection
