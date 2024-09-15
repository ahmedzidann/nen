
@extends('user.layout.master')
@section('parent_page_name')Education @endsection
@section('page_name'){{$partner->name}} @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<!-- New Desgin -->
<div id="certifications-section">
    <div class="text-start">
        <h5 class="global-title fw-semibold">
            {{$partner->name}}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
    </div>

        <div class="tabs-items">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach

            </ul>
            <div class="tab-content" id="pills-tabContent">
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
                        <div class="grid_div_bttn">
                            <div class="grid_div new-card" id="partners-{{$sub->slug}}" data-page="1">
                            @forelse ($items->where('pages_id', $sub->id)->take(6) as $item)
                            <div class="hovering-layers-card h-100 {{ $loop->first ? '' : '' }}">
                                <div id="cert-box" class="card h-100 mb-3">
                                <div class="card_content content">
                                    <div class="data-content-box">
                                        <div class="cert-data">
                                            <div class="image-box">
                                                <img src="{{$item->getFirstMediaUrl('Education')}}" loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                    alt="Education">
                                            </div>
                                            <p class="title-card mt-2">{{$item->title}}</p>
                                        </div>
                                        <div>
                                            <span
                                                class="description {{ strlen($item->description) >= 200 ? "p_clamp" : ''}}">
                                                {{ html_entity_decode(strip_tags($item->description)) }}
                                            </span>

                                            @if (strlen($item->description) >= 200)
                                            <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More
                                                <i class="bi bi-chevron-down"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="icons-data">
                                        <p class="icons-item">
                                            @if (isset($item->files[0])&& !empty($item->files[0]))
                                            <img src="{{url('content/images/small_icon/archive-book.png')}}">
                                            <span><a class="ref_coloring"
                                                href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                             @endif
                                        </p>
                                        <p class="icons-item">
                                            @if (array_key_exists(0, $item?->links->toArray()) && $item->links[0]->reference)
                                                <img src="{{url('content/images/small_icon/global.png')}}"><span><a
                                                        class="ref_coloring" href="{{$item->url}}">Website</a></span>
                                                @endif
                                        </p>
                                    </div>
                                </div>
                               </div>
                            </div>

                                    @empty

                                <div class="empty_state">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
                                        <path fill="#e0dfdf" d="M568.90415,220.74547V202.55431a13.07945,13.07945,0,0,0-13.07945-13.07945h-46.166a13.07945,13.07945,0,0,1-13.07946-13.07945V158.20424a13.07945,13.07945,0,0,1,13.07946-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V113.85418a13.07945,13.07945,0,0,0-13.07945-13.07945H169.20918a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h0a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H118.6298a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h19.84658a13.07945,13.07945,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946h-.048A13.07945,13.07945,0,0,0,125.349,291.25453V309.4456a13.07945,13.07945,0,0,0,13.07945,13.07946h2.87139a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19125a13.07945,13.07945,0,0,1-13.07945,13.07945H94.1753a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116A13.07945,13.07945,0,0,0,94.1753,411.22527h423.963a13.07945,13.07945,0,0,0,13.07945-13.07945V379.95466a13.07945,13.07945,0,0,0-13.07945-13.07945H506.79779a13.07945,13.07945,0,0,1-13.07945-13.07945V335.60451a13.07945,13.07945,0,0,1,13.07945-13.07945h26.73986A13.07945,13.07945,0,0,0,546.6171,309.4456V291.25453a13.07945,13.07945,0,0,0-13.07945-13.07945H525.426a13.07945,13.07945,0,0,1-13.07945-13.07946V246.90438A13.07945,13.07945,0,0,1,525.426,233.82492H555.8247A13.07945,13.07945,0,0,0,568.90415,220.74547Z"></path>
                                        <rect width="159.84" height="145.44" x="217.561" y="231.797" fill="#d90505"></rect>
                                        <rect width="84.96" height="145.44" x="377.401" y="231.797" fill="#990000"></rect>
                                        <path fill="#000" d="M462.36121,232.15729h-84.96l29.101-39.69379a3,3,0,0,1,2.41944-1.22621h77.52026a3,3,0,0,1,2.41944,4.77378Z"></path>
                                        <path fill="#990000" d="M217.95637,232.15729h84.96l-29.101-39.69379a3,3,0,0,0-2.41944-1.22621H193.87565a3,3,0,0,0-2.41944,4.77378Z"></path>
                                        <path fill="#000" d="M510.29292,285.1577l-47.93164-53.00043h0v57.96h45.66016A3,3,0,0,0,510.29292,285.1577Z"></path>
                                        <rect width="110.853" height="78.366" x="246.893" y="153.791" fill="#ee781d"></rect>
                                        <path fill="#e0dfdf" d="M299.07973,236.99513h-30.498a3.35392,3.35392,0,0,1-2.90457-5.03088l15.249-26.41208,15.249-26.41208a3.35392,3.35392,0,0,1,5.80915,0l15.249,26.41208,15.249,26.41208a3.35392,3.35392,0,0,1-2.90457,5.03088Z"></path>
                                        <rect width="3.356" height="28.368" x="297.402" y="192.301" fill="#d90505" rx="1.678"></rect>
                                        <circle cx="299.08" cy="227.235" r="4.014" fill="#d90505" transform="rotate(-84.345 299.08 227.235)"></circle>
                                        <path fill="#ffeaea" d="M325.66717,290.11729H173.75124a3,3,0,0,1-2.27157-4.9596l45.72154-53.0004h159.84l-49.10248,56.91959A3,3,0,0,1,325.66717,290.11729Z"></path>
                                        <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M474.287 338.33442c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 347.07361c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 355.8128c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M111.18347 292.11729c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 300.85648c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 309.59568c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 120.54318c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 129.28237c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 138.02156c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2"></path>
                                        <circle cx="183.705" cy="391.21" r="12.96" fill="#990000"></circle>
                                        <circle cx="193.109" cy="357.024" r="6.72" fill="#990000"></circle>
                                        <circle cx="219.723" cy="392.65" r="9.6" fill="#990000"></circle>
                                        <circle cx="170.969" cy="212.701" r="15.42" fill="#990000"></circle>
                                        <circle cx="141.504" cy="201.718" r="8.032" fill="#990000"></circle>
                                        <circle cx="148.882" cy="174.415" r="4.633" fill="#990000"></circle>
                                        <circle cx="174.529" cy="177.693" r="11.107" fill="#990000"></circle>
                                        <circle cx="438.988" cy="137.917" r="15.42" fill="#990000"></circle>
                                        <circle cx="463.523" cy="118.249" r="8.032" fill="#990000"></circle>
                                        <circle cx="494.205" cy="162.323" r="6.952" fill="#990000"></circle>
                                        <circle cx="483.183" cy="138.58" r="4.633" fill="#990000"></circle>
                                        <circle cx="467.22" cy="158.92" r="11.107" fill="#990000"></circle>
                                    </svg>
                                    <h3 class="title">No data</h3>
                                    <p class="description">There have been no data in this section yet</p>
                                </div>
                                    @endforelse
                                </div>
                                @if ($items->where('pages_id',$sub->id)->count()>6)
                                <a href="#"  id='see_more_bttn' class="see_more_bttn" data-slug="{{$sub->slug}}" onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">See More <span><i class="bi bi-chevron-down"></i></span></a>
                            @endif
                        </div>
                </div>


                @endforeach
            </div>
        </div>
        </div>
    {{-- </div> --}}
    

 <!-- Old Desgin (Remove d-none Class to view it again-->
    <div class="about_content d-none">
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
                                <div class="grid_div" id="partners-{{$sub->slug}}" data-page="1">
                                    @forelse ($items->where('pages_id',$sub->id)->take(6) as $item)

                                    <div class="card card_styles">
                                        <div class="card_content">
                                            <div class="iso_div">
                                                <div class="size_div">
                                                    <img src="{{$item->getFirstMediaUrl('Education')}}">

                                                </div>

                                                <p>{{$item->title}}  </p>
                                            </div>
                                            <div class="iso_titels "  >
                                                <span class="description text-start {{ strlen($item->description)>= 200 ? "p_clamp":''}}">
                                                {{ html_entity_decode(strip_tags($item->description)) }}
                                                </span>


                                                @if (strlen($item->description)>= 200)
                                                    <a  role='btn' onclick="toggleDescription(this)" class="read_more" > Read More <i class="bi bi-chevron-down"></i></a>
                                                @endif
                                                <div class="flex_icons_div">
                                                    <p>
                                                         @if (isset($item->files[0])&& !empty($item->files[0]))
                                                        <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a target="_blank"
                                                            class="ref_coloring"
                                                            href="{{asset('storage/education/'. $item->files[0]->file)}}">Reference</a></span>
                                                        @endif
                                                    </p>
                                                    <p>

                                                        @if (array_key_exists(0, $item?->links->toArray()) && $item->links[0]->reference)
                                                        <img src="{{url('content/images/small_icon/global.png')}}"><span><a target="_blank"
                                                            class="ref_coloring" href="{{$item->links[0]->reference}}">Website</a></span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="empty_state">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
                                        <path fill="#e0dfdf" d="M568.90415,220.74547V202.55431a13.07945,13.07945,0,0,0-13.07945-13.07945h-46.166a13.07945,13.07945,0,0,1-13.07946-13.07945V158.20424a13.07945,13.07945,0,0,1,13.07946-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V113.85418a13.07945,13.07945,0,0,0-13.07945-13.07945H169.20918a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h0a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H118.6298a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h19.84658a13.07945,13.07945,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946h-.048A13.07945,13.07945,0,0,0,125.349,291.25453V309.4456a13.07945,13.07945,0,0,0,13.07945,13.07946h2.87139a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19125a13.07945,13.07945,0,0,1-13.07945,13.07945H94.1753a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116A13.07945,13.07945,0,0,0,94.1753,411.22527h423.963a13.07945,13.07945,0,0,0,13.07945-13.07945V379.95466a13.07945,13.07945,0,0,0-13.07945-13.07945H506.79779a13.07945,13.07945,0,0,1-13.07945-13.07945V335.60451a13.07945,13.07945,0,0,1,13.07945-13.07945h26.73986A13.07945,13.07945,0,0,0,546.6171,309.4456V291.25453a13.07945,13.07945,0,0,0-13.07945-13.07945H525.426a13.07945,13.07945,0,0,1-13.07945-13.07946V246.90438A13.07945,13.07945,0,0,1,525.426,233.82492H555.8247A13.07945,13.07945,0,0,0,568.90415,220.74547Z"></path>
                                        <rect width="159.84" height="145.44" x="217.561" y="231.797" fill="#d90505"></rect>
                                        <rect width="84.96" height="145.44" x="377.401" y="231.797" fill="#990000"></rect>
                                        <path fill="#000" d="M462.36121,232.15729h-84.96l29.101-39.69379a3,3,0,0,1,2.41944-1.22621h77.52026a3,3,0,0,1,2.41944,4.77378Z"></path>
                                        <path fill="#990000" d="M217.95637,232.15729h84.96l-29.101-39.69379a3,3,0,0,0-2.41944-1.22621H193.87565a3,3,0,0,0-2.41944,4.77378Z"></path>
                                        <path fill="#000" d="M510.29292,285.1577l-47.93164-53.00043h0v57.96h45.66016A3,3,0,0,0,510.29292,285.1577Z"></path>
                                        <rect width="110.853" height="78.366" x="246.893" y="153.791" fill="#ee781d"></rect>
                                        <path fill="#e0dfdf" d="M299.07973,236.99513h-30.498a3.35392,3.35392,0,0,1-2.90457-5.03088l15.249-26.41208,15.249-26.41208a3.35392,3.35392,0,0,1,5.80915,0l15.249,26.41208,15.249,26.41208a3.35392,3.35392,0,0,1-2.90457,5.03088Z"></path>
                                        <rect width="3.356" height="28.368" x="297.402" y="192.301" fill="#d90505" rx="1.678"></rect>
                                        <circle cx="299.08" cy="227.235" r="4.014" fill="#d90505" transform="rotate(-84.345 299.08 227.235)"></circle>
                                        <path fill="#ffeaea" d="M325.66717,290.11729H173.75124a3,3,0,0,1-2.27157-4.9596l45.72154-53.0004h159.84l-49.10248,56.91959A3,3,0,0,1,325.66717,290.11729Z"></path>
                                        <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3" d="M474.287 338.33442c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 347.07361c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 355.8128c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M111.18347 292.11729c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 300.85648c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 309.59568c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 120.54318c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 129.28237c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 138.02156c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2"></path>
                                        <circle cx="183.705" cy="391.21" r="12.96" fill="#990000"></circle>
                                        <circle cx="193.109" cy="357.024" r="6.72" fill="#990000"></circle>
                                        <circle cx="219.723" cy="392.65" r="9.6" fill="#990000"></circle>
                                        <circle cx="170.969" cy="212.701" r="15.42" fill="#990000"></circle>
                                        <circle cx="141.504" cy="201.718" r="8.032" fill="#990000"></circle>
                                        <circle cx="148.882" cy="174.415" r="4.633" fill="#990000"></circle>
                                        <circle cx="174.529" cy="177.693" r="11.107" fill="#990000"></circle>
                                        <circle cx="438.988" cy="137.917" r="15.42" fill="#990000"></circle>
                                        <circle cx="463.523" cy="118.249" r="8.032" fill="#990000"></circle>
                                        <circle cx="494.205" cy="162.323" r="6.952" fill="#990000"></circle>
                                        <circle cx="483.183" cy="138.58" r="4.633" fill="#990000"></circle>
                                        <circle cx="467.22" cy="158.92" r="11.107" fill="#990000"></circle>
                                    </svg>
                                    <h3 class="title">No data</h3>
                                    <p class="description">There have been no data in this section yet</p>
                                </div>
                                    @endforelse
                                </div>
                                @if ($items->where('pages_id',$sub->id)->count()>6)
                                <a href="#"  id='see_more_bttn' class="see_more_bttn" data-slug="{{$sub->slug}}" onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">See More <span><i class="bi bi-chevron-down"></i></span></a>
                            @endif
                            </div>




                    </div>
                </div>


                @endforeach
            </div>
        </div>
        </div>
    {{-- </div> --}}
    
    
    <script>
        function toggleDescription(button) {
            var description = button.previousElementSibling;
            if (description.classList.contains('p_clamp')) {
                description.classList.remove('p_clamp');
                button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
            } else {
                description.classList.add('p_clamp');
                button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
            }
        }

        function htmlspecialchars(str) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return str.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
        function stripTags(input) {
        // Use a regular expression to match HTML tags and replace them with an empty string
        return input.replace(/<\/?[^>]+(>|$)/g, "");
        }



        function escapeHTML(str) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return str.replace(/[&<>"']/g, function(m) { return map[m]; });
            }

        function loadMorePartners(event, slug, slug_id, lang) {

            event.preventDefault();
            var container = document.getElementById('partners-' + slug);
            var page = parseInt(container.getAttribute('data-page'));
            var newPage = page + 1;

            // Fetching items through a data attribute (ensure items are available globally in the blade)
            var items = @json($items->values()); //'pages_id',$sub->id
            var subItems = items.filter(item => item.pages_id == slug_id)
            console.log(subItems);
            var start = page * 6;
            var end = start + 6;
            var newItems = subItems.slice(start, end);
            // console.log(items);
            // console.log(newItems);

            //.getFirstMediaUrl('StaticTable')
            newItems.forEach(item => {
                var card = document.createElement('div');
                card.className = 'card card_styles';
                card.innerHTML = `
                    <div class="card_content">
                        <div class="iso_div">
                            <div class="size_div">
                                <img src="${item.media ?(item.media.filter(i => i.collection_name == 'Education')[0]? item.media.filter(i => i.collection_name == 'Education')[0].original_url : ""):""}">

                            </div>
                            <p>${item.title[lang]?item.title[lang] :item.title.en} </p>
                        </div>
                        <div class="iso_titels">
                            <span class="description text-start ${ item.description[lang]?(item.description[lang].length >= 200 ? 'p_clamp' : ''):
                                (item.description.en.length >= 200 ? 'p_clamp' : '')
                            }">
                                ${htmlspecialchars(stripTags(item.description[lang]?item.description[lang] :item.description.en ))}
                            </span>


                            ${item.description.en.length >= 200 ? '<a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>' : ''}
                            <div class="flex_icons_div">
                                <p>${item.media ?(item.media.filter(i => i.collection_name == 'StaticTable2')[0]? '<img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a class="ref_coloring" href="' + item.media.filter(i => i.collection_name == 'StaticTable2')[0].original_url + '">Reference</a></span>' : '') :""}</p>
                                <p>${item.url ? '<img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" href="' + item.url[lang] + '">Website</a></span>' : ''}</p>
                            </div>
                        </div>
                    </div>`;
                container.appendChild(card);
            });

            if(((subItems.length / 6) - newPage)<0){
                    document.getElementById('see_more_bttn').style.display = 'none';
            }

            container.setAttribute('data-page', newPage);
        }
    </script>
@endsection
