@extends('user.layout.master')
@section('parent_page_name')
About
@endsection
@section('page_name')
Investors
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
<div class="about_content">
    @if ($fSection = $items->where('item', 'section-one')->first())
    <!-- <div class="investors_flex"> -->

    <!-- Start Investors Hero Section -->
    <div id="investors-section">
        <div class="texts-data d-flex flex-column align-items-start">
            <h5 class="global-title">
                {{ $fSection->title }}
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
            <p class="fs1-1 text-muted pt-3 lh-base text-start">
                {{ strip_tags($fSection->description) }}
            </p>
        </div>
        <div class="investors_img">
            <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
        </div>
    </div>
    <!-- End Investors Hero Section -->
    @endif
    @if ($items->where('item', 'section-two')->count())

    <!-- Start Investors Statisctics Section -->
    <div class="bg_div d-none"
        style="background-image: url({{ $items->where('item', 'section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content / images / women2 . png }});">
        <div class="number_div">
            @foreach ($items->where('item', 'section-two') as $item)
            <div class="num_img_div">

                <img class="w-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                <h3>{{ $item->title }} </h3>
                <p>{{ $item->subtitle }}</p>
            </div>
            @endforeach
        </div>

    </div>

    <div id="investors-statisctics-section" class="mt-md-5 mt-3 px-md-4 px-3 py-md-5 py-4">
        <div class="statisctic-items d-flex align-items-center justify-content-around gap-3 flex-wrap">
            @foreach ($items->where('item', 'section-two') as $item)
            <div class="statisctic-item d-flex flex-column align-items-center justify-content-center gap-3">
                <img class="image-icons" src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                <h6 class="title text-secondary-color fs-5 fw-semibold fst-italic text-uppercase">
                    {{ $item->title }}
                </h6>
                <p class="desc text-white-color fs-3">
                    {{ $item->subtitle }}
                </p>
            </div>
            @endforeach
        </div>

    </div>
    <!-- End Investors Statisctics Section -->

    @endif

    <!-- Start Partner Section -->
    <div id="partner-section" class="tabs-items mt-md-5 mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                        class="sparkle svg-with-gap">
                        <path
                            d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                        </path>
                    </svg>
                    <span>
                        subsidiaries
                    </span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                    <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1"
                        class="sparkle svg-with-gap">
                        <path
                            d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z">
                        </path>
                    </svg>
                    <span>
                        Sister Companies
                    </span>
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                @if ($items->where('item', 'section-foure')->count())
                <div class="subsidiaries_sec_content">
                    <!-- <div class="subsidiaries__sec"> -->
                    <div class="">
                        @forelse ($subInvestors as $sub)
                        <div class="subsidiaries_content">
                            <div class="flg_div">
                                <img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            </div>
                            <div class="subsidiaries_details">
                                <h5>{{ $sub->translate('title', app()->getLocale()) }}</h5>
                                <div class="flags_sec">
                                    @foreach ($sub->investorAttributes as $row)
                                    <div class="flag_icon_titel">
                                        <div class="sub_contennt">
                                            <h6><img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                                                <p>Since : <span>{{ $row->since }}</span></p>
                                            </h6>
                                            <h6>
                                                <p>Sharing : <span>{{ $row->percent }}%</span></p>
                                            </h6>
                                        </div>

                                    </div>
                                    @endforeach
                                    <div class="sub_contennt">
                                        <h6><img src="{{ asset('content/images/small_icon/Flag_of_Kuwait.svg.webp') }}">
                                            <p>Since : <span>2008</span></p>
                                        </h6>
                                        <h6>
                                            <p>Sharing : <span>100%</span></p>
                                        </h6>
                                    </div>


                                </div>
                                <a href="{{ $sub->url}}" class="website_link">Website</a>
                            </div>

                        </div>
                        @empty
                        <div id="empty-data-placeholder" class="p-3 mt-md-4 mt-3">
                            <svg id="Group_6921" data-name="Group 6921" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="304" height="304"
                                viewBox="0 0 304 304">
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect id="Rectangle_395" data-name="Rectangle 395" width="304" height="304"
                                            fill="none" />
                                    </clipPath>
                                </defs>
                                <g id="Group_6862" data-name="Group 6862" transform="translate(1.04 61.942)">
                                    <g id="Group_6830" data-name="Group 6830" transform="translate(0 8.824)">
                                        <path id="Path_6600" data-name="Path 6600"
                                            d="M278.682,275.737l-225.354,16L30.894,132.1,252.17,116.391Z"
                                            transform="translate(-13.15 -116.391)" fill="#fff" />
                                        <path id="Path_6601" data-name="Path 6601"
                                            d="M306.386,167.455a25.241,25.241,0,0,0-8.02-2.922,21.435,21.435,0,0,0-7.868.268,31.427,31.427,0,0,0-7.485,2.754A38.53,38.53,0,0,0,276.2,171.8a30.381,30.381,0,0,0-7.759,10.065c-1.93,3.787-3.394,7.784-5.108,11.668a58.778,58.778,0,0,1-2.829,5.682c-1.236,2.143-2.539,4.237-3.686,6.431a51.486,51.486,0,0,0-3,6.828c-.417,1.19-.785,2.4-1.113,3.615a13.7,13.7,0,0,1-.58,1.92c-1.093,2.523-2.993,4.738-4.613,6.931a49.435,49.435,0,0,0-5.37,8.331c-1.06,2.283-1.882,5.29.15,7.3,3.059,3.025,7.506.254,10.361-1.64,3.29-2.181,6.576-4.61,10.717-4.586a19.717,19.717,0,0,1,5.586,1.1A38.513,38.513,0,0,0,276,237.093c5.888.637,11.679-1.155,17.45-2.005,2.786-.41,5.638-.455,8.448-.6,2.932-.154,5.865-.316,8.787-.618,5.639-.585,11.269-1.519,16.882-2.32,7.483-1.068,14.987-2.231,22.365-3.915l-7.9-47.456a62.276,62.276,0,0,1-20.922-4.762C316.006,173.144,311.3,170.095,306.386,167.455Z"
                                            transform="translate(-95.527 -135.167)" fill="#f2f2f2" />
                                        <path id="Path_6602" data-name="Path 6602"
                                            d="M39.6,285.562,19.454,142.234,1.71,289.7Z"
                                            transform="translate(-1.71 -126.521)" fill="#ddd" />
                                        <path id="Path_6603" data-name="Path 6603"
                                            d="M46.25,285.562,26.108,142.234,18.686,288.575Z"
                                            transform="translate(-8.364 -126.521)" fill="#ccc" />
                                    </g>
                                    <g id="Group_6831" data-name="Group 6831" transform="translate(17.744 8.824)">
                                        <path id="Path_6604" data-name="Path 6604"
                                            d="M252.17,116.391,30.894,132.1l3.6,26.247L256.57,142.581Z"
                                            transform="translate(-30.894 -116.391)" fill="#ddd" />
                                    </g>
                                    <g id="Group_6832" data-name="Group 6832" transform="translate(158.472 8.824)">
                                        <path id="Path_6605" data-name="Path 6605"
                                            d="M287.1,146.856l60.2-4.275-4.4-26.19-80.548,5.719Z"
                                            transform="translate(-262.354 -116.391)" fill="#ddd" />
                                    </g>
                                    <path id="Path_6606" data-name="Path 6606"
                                        d="M58.983,138.953l-28.089,1.995L53.327,300.583l156.195-11.091Z"
                                        transform="translate(-13.15 -116.411)" fill="#fafafa" />
                                    <g id="Group_6833" data-name="Group 6833" transform="translate(17.744 22.542)">
                                        <path id="Path_6607" data-name="Path 6607"
                                            d="M58.983,138.953l-28.089,1.995,3.6,26.247,49.234-3.5Z"
                                            transform="translate(-30.894 -138.953)" fill="#ddd" />
                                    </g>
                                    <g id="Group_6835" data-name="Group 6835" transform="translate(30.647 12.373)">
                                        <circle id="Ellipse_64" data-name="Ellipse 64" cx="4.572" cy="4.572" r="4.572"
                                            transform="translate(15.869 27.059) rotate(-76.718)" fill="#3f2a2a" />
                                        <g id="Group_6834" data-name="Group 6834">
                                            <path id="Path_6608" data-name="Path 6608"
                                                d="M64.881,122.229c-6.259,0-11.5,4.828-12.764,11.246l1.907-.135c1.259-5.334,5.642-9.287,10.858-9.287,6.194,0,11.233,5.569,11.233,12.413a13.008,13.008,0,0,1-3.319,8.808.912.912,0,1,0,1.347,1.229,14.825,14.825,0,0,0,3.8-10.037C77.938,128.615,72.081,122.229,64.881,122.229Z"
                                                transform="translate(-52.117 -122.229)" fill="#754949" />
                                        </g>
                                    </g>
                                    <g id="Group_6837" data-name="Group 6837" transform="translate(115.018 5.333)">
                                        <circle id="Ellipse_65" data-name="Ellipse 65" cx="4.572" cy="4.572" r="4.572"
                                            transform="translate(15.14 23.659) rotate(-45)" fill="#3f2a2a" />
                                        <g id="Group_6836" data-name="Group 6836">
                                            <path id="Path_6609" data-name="Path 6609"
                                                d="M203.816,110.649c-6.6,0-12.061,5.361-12.932,12.3l1.869-.133c.9-5.859,5.51-10.34,11.063-10.34,6.194,0,11.232,5.569,11.232,12.413a13.008,13.008,0,0,1-3.319,8.808.912.912,0,1,0,1.348,1.229,14.825,14.825,0,0,0,3.8-10.037C216.872,117.035,211.015,110.649,203.816,110.649Z"
                                                transform="translate(-190.884 -110.649)" fill="#754949" />
                                        </g>
                                    </g>
                                    <g id="Group_6839" data-name="Group 6839" transform="translate(195.516)">
                                        <circle id="Ellipse_66" data-name="Ellipse 66" cx="4.572" cy="4.572" r="4.572"
                                            transform="translate(16.779 19.298)" fill="#3f2a2a" />
                                        <g id="Group_6838" data-name="Group 6838">
                                            <path id="Path_6610" data-name="Path 6610"
                                                d="M336.162,101.878c-6.473,0-11.859,5.165-12.88,11.913l1.87-.133c1.035-5.672,5.577-9.957,11.01-9.957,6.193,0,11.232,5.569,11.232,12.414a13,13,0,0,1-3.319,8.808.912.912,0,0,0,1.348,1.229,14.825,14.825,0,0,0,3.8-10.037C349.218,108.265,343.361,101.878,336.162,101.878Z"
                                                transform="translate(-323.282 -101.878)" fill="#754949" />
                                        </g>
                                    </g>
                                    <g id="Group_6847" data-name="Group 6847" transform="translate(29.598 42.741)">
                                        <path id="Path_6611" data-name="Path 6611"
                                            d="M233.615,380.521l.008.047,29.4-2.121-.026-.154Z"
                                            transform="translate(-122.215 -252.973)" fill="none" />
                                        <path id="Path_6612" data-name="Path 6612"
                                            d="M281.945,376.856l.026.154,29.4-2.121-.044-.261Z"
                                            transform="translate(-141.16 -251.536)" fill="none" />
                                        <path id="Path_6613" data-name="Path 6613"
                                            d="M212.562,382.928,225.37,382l-.008-.047Z"
                                            transform="translate(-113.962 -254.41)" fill="none" />
                                        <path id="Path_6614" data-name="Path 6614"
                                            d="M330.275,373.19l.044.261,29.4-2.121-.062-.368Z"
                                            transform="translate(-160.106 -250.099)" fill="none" />
                                        <path id="Path_6615" data-name="Path 6615"
                                            d="M116.072,293.6l-4.2-24.956,32.033-2.312L148.1,291.29Zm-3.486-24.4,3.993,23.752,30.814-2.223L143.4,266.979Z"
                                            transform="translate(-74.493 -209.085)" fill="#ddd" />
                                        <path id="Path_6616" data-name="Path 6616"
                                            d="M122.66,332.79l-4.05-24.09,32.032-2.31,4.049,24.089Zm-3.34-23.531,3.847,22.886,30.815-2.223-3.847-22.885Z"
                                            transform="translate(-77.133 -224.787)" fill="#ddd" />
                                        <path id="Path_6617" data-name="Path 6617"
                                            d="M161.069,250.156l-4.123-24.523,30.719-2.216,4.122,24.522Zm-3.413-23.965,3.92,23.319,29.5-2.129-3.92-23.319Z"
                                            transform="translate(-92.161 -192.262)" fill="#ddd" />
                                        <path id="Path_6618" data-name="Path 6618"
                                            d="M210.592,246.615l-4.123-24.522,30.011-2.166L240.6,244.45Zm-3.413-23.964,3.92,23.319,28.794-2.078-3.92-23.319Z"
                                            transform="translate(-111.574 -190.894)" fill="#ddd" />
                                        <path id="Path_6619" data-name="Path 6619"
                                            d="M109.385,253.824,105.263,229.3,137.3,226.99l4.122,24.522Zm-3.412-23.965,3.92,23.319,30.815-2.224-3.92-23.319Z"
                                            transform="translate(-71.901 -193.662)" fill="#ddd" />
                                        <path id="Path_6620" data-name="Path 6620"
                                            d="M278.84,361.437l-4.17-24.8,30.011-2.165,4.151,24.695-.332.026Zm-3.46-24.246,3.967,23.6,28.776-2.182-3.95-23.493Z"
                                            transform="translate(-138.308 -235.794)" fill="#ddd" />
                                        <path id="Path_6621" data-name="Path 6621"
                                            d="M174.343,329.122l-4.05-24.089,30.719-2.217,4.05,24.089ZM171,305.591l3.847,22.885,29.5-2.129L200.5,303.462Z"
                                            transform="translate(-97.393 -223.386)" fill="#ddd" />
                                        <path id="Path_6622" data-name="Path 6622"
                                            d="M230.5,365.034l-4.187-24.911,30.011-2.166,4.169,24.8-.332.026Zm-3.477-24.353,3.985,23.705,28.775-2.183-3.967-23.6Z"
                                            transform="translate(-119.352 -237.162)" fill="#ddd" />
                                        <path id="Path_6623" data-name="Path 6623"
                                            d="M223.866,325.582l-4.05-24.089,30.012-2.166,4.049,24.089Zm-3.34-23.531,3.847,22.885,28.794-2.078-3.847-22.884Z"
                                            transform="translate(-116.806 -222.019)" fill="#ddd" />
                                        <path id="Path_6624" data-name="Path 6624"
                                            d="M265.637,282.9l-4.2-24.957,30.012-2.166,4.2,24.957Zm-3.485-24.4,3.993,23.752,28.794-2.078-3.993-23.752Z"
                                            transform="translate(-133.123 -204.949)" fill="#ddd" />
                                        <path id="Path_6625" data-name="Path 6625"
                                            d="M217.278,286.393l-4.2-24.957,30.011-2.165,4.2,24.956Zm-3.485-24.4,3.993,23.752,28.794-2.078-3.993-23.752Z"
                                            transform="translate(-114.166 -206.317)" fill="#ddd" />
                                        <path id="Path_6626" data-name="Path 6626"
                                            d="M129.3,372.288l-4.2-24.957,32.032-2.311,4.2,24.956Zm-3.485-24.4,3.993,23.753,30.815-2.224-3.993-23.752Z"
                                            transform="translate(-79.678 -239.93)" fill="#ddd" />
                                        <path id="Path_6627" data-name="Path 6627"
                                            d="M167.755,289.933l-4.2-24.957,30.719-2.216,4.2,24.957Zm-3.485-24.4,3.993,23.753,29.5-2.129-3.992-23.753Z"
                                            transform="translate(-94.753 -207.684)" fill="#ddd" />
                                        <path id="Path_6628" data-name="Path 6628"
                                            d="M327.181,357.841l-4.152-24.7,30.013-2.166,4.133,24.588-.331.026ZM323.739,333.7l3.949,23.491,28.777-2.182-3.931-23.386Z"
                                            transform="translate(-157.265 -234.426)" fill="#ddd" />
                                        <path id="Path_6629" data-name="Path 6629"
                                            d="M272.225,322.093,268.176,298l30.012-2.165,4.049,24.089Zm-3.339-23.531,3.847,22.885,28.793-2.078-3.847-22.885Z"
                                            transform="translate(-135.763 -220.651)" fill="#ddd" />
                                        <path id="Path_6630" data-name="Path 6630"
                                            d="M314,279.414l-4.2-24.957,30.012-2.165,4.195,24.957Zm-3.485-24.4,3.993,23.752L343.3,276.69l-3.993-23.753Z"
                                            transform="translate(-152.08 -203.581)" fill="#ddd" />
                                        <path id="Path_6631" data-name="Path 6631"
                                            d="M307.31,239.637l-4.122-24.523,30.012-2.165,4.122,24.522ZM303.9,215.672l3.92,23.319,28.794-2.078-3.92-23.319Z"
                                            transform="translate(-149.487 -188.158)" fill="#ddd" />
                                        <path id="Path_6632" data-name="Path 6632"
                                            d="M320.585,318.6l-4.049-24.089,30.011-2.165,4.05,24.089Zm-3.339-23.531,3.847,22.885,28.794-2.078-3.847-22.885Z"
                                            transform="translate(-154.72 -219.283)" fill="#ddd" />
                                        <path id="Path_6633" data-name="Path 6633"
                                            d="M258.951,243.126,254.829,218.6l30.012-2.165,4.122,24.523Zm-3.411-23.965,3.92,23.319,28.794-2.078-3.92-23.318Z"
                                            transform="translate(-130.531 -189.526)" fill="#ddd" />
                                        <path id="Path_6634" data-name="Path 6634"
                                            d="M368.945,315.158,364.9,291.069l29.077-2.1,4.041,24.09Zm-3.34-23.531,3.848,22.885L397.3,312.5l-3.839-22.886Z"
                                            transform="translate(-173.677 -217.959)" fill="#ddd" />
                                        <path id="Path_6635" data-name="Path 6635"
                                            d="M70.068,336.578l-3.4-24.136.325-.024,31.863-2.3,4.049,24.09ZM67.365,313l3.225,22.93,31.608-2.281-3.847-22.885Z"
                                            transform="translate(-56.773 -226.249)" fill="#ddd" />
                                        <path id="Path_6636" data-name="Path 6636"
                                            d="M64.544,297.343l-3.518-25.005.325-.024,31.2-2.251,4.2,24.955ZM61.719,272.9l3.348,23.8,30.97-2.235-3.993-23.752Z"
                                            transform="translate(-54.56 -210.547)" fill="#ddd" />
                                        <path id="Path_6637" data-name="Path 6637"
                                            d="M58.937,257.518l-3.456-24.571,30.876-2.228,4.122,24.523Zm-2.763-24.012L59.46,256.87l30.309-2.186-3.92-23.319Z"
                                            transform="translate(-52.386 -195.124)" fill="#ddd" />
                                        <path id="Path_6638" data-name="Path 6638"
                                            d="M75.635,376.123l-3.518-25.005.325-.024,32.5-2.344,4.2,24.957-.333.024ZM72.81,351.677l3.348,23.8,32.27-2.328-3.993-23.753Z"
                                            transform="translate(-58.908 -241.392)" fill="#ddd" />
                                        <path id="Path_6639" data-name="Path 6639"
                                            d="M184.116,384.866l17.291-1.311-17.3,1.248Z"
                                            transform="translate(-102.807 -255.036)" fill="#ddd" />
                                        <path id="Path_6640" data-name="Path 6640"
                                            d="M78.333,391.709l.042.3,32.874-2.493-.03-.177Z"
                                            transform="translate(-61.344 -257.302)" fill="#ddd" />
                                        <g id="Group_6840" data-name="Group 6840" transform="translate(0 13.526)">
                                            <path id="Path_6641" data-name="Path 6641"
                                                d="M80.622,194.955,50.96,197.207l3.095,22,30.276-2.185Z"
                                                transform="translate(-50.614 -194.63)" fill="#ddd" />
                                            <path id="Path_6642" data-name="Path 6642"
                                                d="M53.571,219.321l-3.18-22.6,30.261-2.3,3.811,22.671Zm-2.487-22.045,3.01,21.4,29.659-2.14L80.145,195.07Z"
                                                transform="translate(-50.391 -194.421)" fill="#fff" />
                                        </g>
                                        <path id="Path_6643" data-name="Path 6643"
                                            d="M180.983,368.619l-4.2-24.957,30.719-2.217,4.187,24.909-13.132,1Zm-3.486-24.4,3.993,23.752,17.026-1.228,12.467-.945L207,342.092Z"
                                            transform="translate(-99.938 -238.529)" fill="#ddd" />
                                        <path id="Path_6644" data-name="Path 6644"
                                            d="M132.422,387.875l.03.177,31.4-2.382-.011-.063Z"
                                            transform="translate(-82.547 -255.841)" fill="#ddd" />
                                        <g id="Group_6841" data-name="Group 6841" transform="translate(29.652 11.141)">
                                            <path id="Path_6645" data-name="Path 6645"
                                                d="M134.879,213.217l-3.729-22.185-31.4,2.385,3.71,22.068Z"
                                                transform="translate(-99.39 -190.708)" fill="#ddd" />
                                            <path id="Path_6646" data-name="Path 6646"
                                                d="M102.972,215.6,99.161,192.93l32.013-2.431L135,213.287Zm-3.1-22.112,3.608,21.467,30.815-2.223-3.628-21.582Z"
                                                transform="translate(-99.161 -190.499)" fill="#fff" />
                                        </g>
                                        <g id="Group_6842" data-name="Group 6842" transform="translate(179.3)">
                                            <path id="Path_6647" data-name="Path 6647"
                                                d="M378.166,195.442l-3.813-22.734-28.477,2.162,3.8,22.627Z"
                                                transform="translate(-345.521 -172.384)" fill="#ddd" />
                                            <path id="Path_6648" data-name="Path 6648"
                                                d="M349.2,197.611l-3.9-23.227,29.086-2.209,3.914,23.337ZM346,174.94l3.7,22.026,27.877-2.011-3.712-22.131Z"
                                                transform="translate(-345.292 -172.175)" fill="#fff" />
                                        </g>
                                        <g id="Group_6843" data-name="Group 6843" transform="translate(149.916 2.163)">
                                            <path id="Path_6649" data-name="Path 6649"
                                                d="M330.735,198.892l-3.8-22.627L297.547,178.5l3.785,22.517Z"
                                                transform="translate(-297.192 -175.941)" fill="#ddd" />
                                            <path id="Path_6650" data-name="Path 6650"
                                                d="M300.849,201.128l-3.886-23.118,29.993-2.278,3.905,23.23Zm-3.176-22.562,3.684,21.916,28.794-2.078-3.7-22.024Z"
                                                transform="translate(-296.963 -175.732)" fill="#fff" />
                                        </g>
                                        <path id="Path_6651" data-name="Path 6651"
                                            d="M355.67,236.19l-4.122-24.522,29.1-2.1,4.113,24.524Zm-3.412-23.964,3.92,23.319,27.868-2.011-3.911-23.319Z"
                                            transform="translate(-168.445 -186.833)" fill="#ddd" />
                                        <path id="Path_6652" data-name="Path 6652"
                                            d="M375.523,354.289,371.39,329.7l29.068-2.1,4.106,24.484-.332.026ZM372.1,330.257l3.93,23.384,27.825-2.11-3.9-23.283Z"
                                            transform="translate(-176.223 -233.102)" fill="#ddd" />
                                        <path id="Path_6653" data-name="Path 6653"
                                            d="M362.357,275.968l-4.2-24.957,29.086-2.1,4.186,24.957Zm-3.485-24.4,3.993,23.753,27.859-2.01-3.984-23.753Z"
                                            transform="translate(-171.037 -202.256)" fill="#ddd" />
                                        <g id="Group_6844" data-name="Group 6844" transform="translate(120.531 4.394)">
                                            <path id="Path_6654" data-name="Path 6654"
                                                d="M282.387,202.452,278.6,179.935l-29.384,2.231,3.767,22.407Z"
                                                transform="translate(-248.862 -179.611)" fill="#ddd" />
                                            <path id="Path_6655" data-name="Path 6655"
                                                d="M252.5,204.688l-3.868-23.008,29.993-2.278,3.886,23.12Zm-3.158-22.453,3.666,21.807,28.794-2.078-3.683-21.914Z"
                                                transform="translate(-248.633 -179.402)" fill="#fff" />
                                        </g>
                                        <g id="Group_6845" data-name="Group 6845" transform="translate(61.057 8.856)">
                                            <path id="Path_6656" data-name="Path 6656"
                                                d="M185.236,209.572l-3.748-22.3L151.4,189.559l3.729,22.185Z"
                                                transform="translate(-151.042 -186.95)" fill="#ddd" />
                                            <path id="Path_6657" data-name="Path 6657"
                                                d="M154.643,211.858l-3.83-22.785,30.7-2.332,3.849,22.9Zm-3.121-22.23,3.629,21.584,29.5-2.129-3.647-21.694Z"
                                                transform="translate(-150.813 -186.741)" fill="#fff" />
                                        </g>
                                        <g id="Group_6846" data-name="Group 6846" transform="translate(91.147 6.625)">
                                            <path id="Path_6658" data-name="Path 6658"
                                                d="M234.039,206.012,230.272,183.6l-29.384,2.231,3.748,22.3Z"
                                                transform="translate(-200.533 -183.28)" fill="#ddd" />
                                            <path id="Path_6659" data-name="Path 6659"
                                                d="M204.154,208.247l-3.85-22.9,29.993-2.278,3.868,23.01Zm-3.14-22.343,3.647,21.7,28.794-2.078-3.666-21.8Z"
                                                transform="translate(-200.304 -183.071)" fill="#fff" />
                                        </g>
                                    </g>
                                    <g id="Group_6849" data-name="Group 6849" transform="translate(41.425 62.455)">
                                        <g id="Group_6848" data-name="Group 6848">
                                            <path id="Path_6660" data-name="Path 6660"
                                                d="M76.264,213.485c-.189-.671-.525-.819-2.194-1.3l-.528-.15c-1.941-.6-3.249-1.49-3.622-3.4-.423-2.166.941-3.83,3.266-4.024a6.83,6.83,0,0,1,3.754.831.728.728,0,0,1,.389.812l-.348,1.069a.62.62,0,0,1-.568.435,1.007,1.007,0,0,1-.455-.068l-.022-.015a4.516,4.516,0,0,0-2.237-.536c-.775.064-1.185.522-1.059,1.163.109.555.469.93,2.081,1.411.079.011.322.078,1.237.337a4.051,4.051,0,0,1,3.022,3.075c.447,2.287-1.15,3.936-3.531,4.135a7.128,7.128,0,0,1-3.811-.826.722.722,0,0,1-.389-.813l.386-1.071a.611.611,0,0,1,.548-.434.848.848,0,0,1,.458.085l.019,0a4.638,4.638,0,0,0,2.275.531C75.88,214.661,76.4,214.177,76.264,213.485Z"
                                                transform="translate(-69.843 -204.6)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6851" data-name="Group 6851" transform="translate(69.876 60.114)">
                                        <g id="Group_6850" data-name="Group 6850">
                                            <path id="Path_6661" data-name="Path 6661"
                                                d="M119.66,206.954l.491,6.14a.723.723,0,0,1-.68.744l-1.247.1a.812.812,0,0,1-.589-.162.86.86,0,0,1-.3-.556l-.69-10.79a.767.767,0,0,1,.751-.873l1.531-.128a1.007,1.007,0,0,1,.969.536l3.964,7.205,1.04-7.642a.8.8,0,0,1,.755-.662l1.379-.116a1.008,1.008,0,0,1,1.082.72L131.6,212.03a.716.716,0,0,1-.077.587.656.656,0,0,1-.507.254l-1.3.109a.918.918,0,0,1-.948-.625l-1.908-6.022-.871,6.448a.766.766,0,0,1-.731.677l-1.285.108a1.016,1.016,0,0,1-.966-.518Z"
                                                transform="translate(-116.638 -200.75)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6853" data-name="Group 6853" transform="translate(101.493 57.778)">
                                        <g id="Group_6852" data-name="Group 6852">
                                            <path id="Path_6662" data-name="Path 6662"
                                                d="M177.956,198.738a.626.626,0,0,1-.582.753l-2.437.2,1.749,8.941a.617.617,0,0,1-.583.753l-1.322.111a.788.788,0,0,1-.854-.633l-1.749-8.941-2.437.2a.817.817,0,0,1-.854-.633l-.233-1.2a.617.617,0,0,1,.582-.753l7.634-.638a.8.8,0,0,1,.854.634Z"
                                                transform="translate(-168.639 -196.907)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6855" data-name="Group 6855" transform="translate(128.016 55.319)">
                                        <g id="Group_6854" data-name="Group 6854">
                                            <path id="Path_6663" data-name="Path 6663"
                                                d="M228.242,192.866a.843.843,0,0,1,.618.213.69.69,0,0,1,.213.6l-1.211,11.089a.7.7,0,0,1-.682.638l-1.587.133a.93.93,0,0,1-.868-.508l-3.226-6.475-.648,6.8a.7.7,0,0,1-.682.638l-1.587.133a.937.937,0,0,1-.865-.491l-5.366-10.54a.884.884,0,0,1-.079-.2.623.623,0,0,1,.586-.736l1.3-.109a.931.931,0,0,1,.868.509l3.525,6.925.651-7.275a.712.712,0,0,1,.663-.637l1.3-.109a.933.933,0,0,1,.868.508l3.525,6.926.651-7.275a.712.712,0,0,1,.663-.637Z"
                                                transform="translate(-212.263 -192.864)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6857" data-name="Group 6857" transform="translate(161.005 53.003)">
                                        <g id="Group_6856" data-name="Group 6856">
                                            <path id="Path_6664" data-name="Path 6664"
                                                d="M275.838,190.885a.625.625,0,0,1-.582.753l-2.437.2,1.749,8.94a.617.617,0,0,1-.582.753l-1.323.111a.788.788,0,0,1-.853-.633l-1.75-8.94-2.438.2a.815.815,0,0,1-.853-.633l-.234-1.2a.617.617,0,0,1,.582-.754l7.635-.638a.8.8,0,0,1,.854.634Z"
                                                transform="translate(-266.521 -189.054)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6859" data-name="Group 6859" transform="translate(191.443 50.424)">
                                        <g id="Group_6858" data-name="Group 6858">
                                            <path id="Path_6665" data-name="Path 6665"
                                                d="M323.2,184.815a.8.8,0,0,1,.854.634l.237,1.213a.616.616,0,0,1-.582.753l-4.044.338.458,2.34,2.929-.245a.78.78,0,0,1,.831.617l.227,1.161a.6.6,0,0,1-.567.734l-2.929.244.81,4.141a.6.6,0,0,1-.564.751l-1.341.112a.8.8,0,0,1-.854-.633L316.6,186.441a.945.945,0,0,1,.871-1.147Z"
                                                transform="translate(-316.583 -184.812)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <g id="Group_6861" data-name="Group 6861" transform="translate(221.266 49.098)">
                                        <g id="Group_6860" data-name="Group 6860">
                                            <path id="Path_6666" data-name="Path 6666"
                                                d="M372.055,191.516c-.188-.671-.525-.819-2.193-1.3l-.529-.15c-1.941-.595-3.249-1.489-3.622-3.4-.424-2.165.941-3.83,3.266-4.024a6.832,6.832,0,0,1,3.754.831.728.728,0,0,1,.389.813l-.348,1.068a.62.62,0,0,1-.568.435,1,1,0,0,1-.454-.068l-.022-.015a4.522,4.522,0,0,0-2.236-.536c-.775.064-1.186.522-1.06,1.163.109.555.471.93,2.082,1.411.08.01.323.078,1.238.337a4.054,4.054,0,0,1,3.022,3.075c.447,2.287-1.151,3.936-3.532,4.134a7.11,7.11,0,0,1-3.81-.826.721.721,0,0,1-.39-.812l.385-1.072a.612.612,0,0,1,.549-.433.853.853,0,0,1,.458.085h.019a4.641,4.641,0,0,0,2.274.532C371.67,192.693,372.191,192.209,372.055,191.516Z"
                                                transform="translate(-365.634 -182.631)" fill="#f3feff" />
                                        </g>
                                    </g>
                                    <path id="Path_6667" data-name="Path 6667"
                                        d="M244.964,279.322l-8.058-4.82q2.029-3.9,4.134-7.757c.564-1.03-1.01-1.952-1.575-.921q-2.106,3.849-4.126,7.741l-7.557-4.52a.913.913,0,0,0-.921,1.575l7.636,4.568q-2.066,4.013-4.05,8.067c-.513,1.051,1.06,1.977,1.575.921q1.976-4.048,4.041-8.05l7.979,4.773A.913.913,0,0,0,244.964,279.322Z"
                                        transform="translate(-89.798 -165.968)" fill="#569acc" />
                                    <path id="Path_6668" data-name="Path 6668"
                                        d="M131.525,293.321a15.7,15.7,0,0,1-7.65-1.849c-3.331-1.847-7.21-6.717-5.83-11.053,1.285-4.035,5.578-7.982,9.023-9.94a16.871,16.871,0,0,1,12.79-1.842,12.754,12.754,0,0,1,9.007,8.994c1.026,4.332-.9,8.653-5.3,11.856a19.852,19.852,0,0,1-4.449,2.422l-.071-.18a7.53,7.53,0,0,1-1.828.8A21.882,21.882,0,0,1,131.525,293.321Zm4.288-24.625a17.2,17.2,0,0,0-8.445,2.311c-3.345,1.9-7.508,5.717-8.743,9.6-1.282,4.027,2.4,8.592,5.546,10.337,3.509,1.946,8.088,2.3,12.892,1.006,2.9-.784,6.7-4.849,7.909-7.692a9.51,9.51,0,0,0-4.9-11.921,12.937,12.937,0,0,0-12.659,1.811l-.38-.475a13.556,13.556,0,0,1,13.27-1.9,10.113,10.113,0,0,1,5.229,12.719,17.74,17.74,0,0,1-4.728,5.99A18.911,18.911,0,0,0,143.211,289c4.184-3.052,6.03-7.142,5.063-11.224a12.139,12.139,0,0,0-8.581-8.549A14.23,14.23,0,0,0,135.814,268.7Z"
                                        transform="translate(-47.201 -167.033)" fill="#1b859d" />
                                    <path id="Path_6669" data-name="Path 6669"
                                        d="M371.346,275.647a15.681,15.681,0,0,1-7.649-1.85c-3.332-1.847-7.211-6.717-5.831-11.053,1.285-4.035,5.578-7.982,9.023-9.94a16.876,16.876,0,0,1,12.789-1.842,12.753,12.753,0,0,1,9.008,8.994c1.026,4.331-.9,8.653-5.3,11.856a19.831,19.831,0,0,1-4.45,2.422l-.07-.18a7.567,7.567,0,0,1-1.828.8A21.913,21.913,0,0,1,371.346,275.647Zm4.288-24.626a17.2,17.2,0,0,0-8.444,2.311c-3.345,1.9-7.509,5.717-8.744,9.6-1.282,4.027,2.4,8.592,5.546,10.337,3.511,1.947,8.089,2.3,12.892,1.006,2.9-.784,6.7-4.849,7.909-7.692a9.508,9.508,0,0,0-4.9-11.92,12.941,12.941,0,0,0-12.658,1.811l-.38-.475a13.562,13.562,0,0,1,13.27-1.9,10.112,10.112,0,0,1,5.229,12.72,17.739,17.739,0,0,1-4.729,5.989,18.692,18.692,0,0,0,2.408-1.485c4.184-3.052,6.03-7.142,5.063-11.224a12.14,12.14,0,0,0-8.582-8.549A14.254,14.254,0,0,0,375.634,251.021Z"
                                        transform="translate(-141.211 -160.104)" fill="#1b859d" />
                                    <path id="Path_6670" data-name="Path 6670"
                                        d="M332.424,315.135a15.686,15.686,0,0,1-7.649-1.849c-3.332-1.848-7.211-6.717-5.831-11.053,1.284-4.035,5.577-7.981,9.023-9.941a16.875,16.875,0,0,1,12.789-1.841,12.753,12.753,0,0,1,9.008,8.994c1.026,4.332-.9,8.653-5.3,11.855a19.786,19.786,0,0,1-4.451,2.422.3.3,0,0,1-.3-.047,7.2,7.2,0,0,1-1.6.671A21.86,21.86,0,0,1,332.424,315.135Zm4.288-24.625a17.206,17.206,0,0,0-8.445,2.31c-3.346,1.9-7.509,5.718-8.744,9.6-1.282,4.027,2.4,8.591,5.546,10.337,3.511,1.947,8.089,2.3,12.892,1.006,2.9-.784,6.7-4.85,7.909-7.693a9.508,9.508,0,0,0-4.9-11.921,12.938,12.938,0,0,0-12.658,1.811.3.3,0,1,1-.38-.475,13.564,13.564,0,0,1,13.27-1.9A10.113,10.113,0,0,1,346.43,306.3a17.734,17.734,0,0,1-4.727,5.989,18.742,18.742,0,0,0,2.407-1.485c4.184-3.05,6.03-7.142,5.063-11.224a12.14,12.14,0,0,0-8.582-8.548A14.2,14.2,0,0,0,336.712,290.509Z"
                                        transform="translate(-125.953 -175.583)" fill="#ea8080" />
                                    <path id="Path_6671" data-name="Path 6671"
                                        d="M251.829,365.262a.705.705,0,0,1-.146-.015,1.035,1.035,0,0,1-.44-.243,24.468,24.468,0,0,1-6-7.529,6.758,6.758,0,0,1-.958-4.509,1.425,1.425,0,0,1,.946-1.172,1.561,1.561,0,0,1,1.262.395h0a16.809,16.809,0,0,1,2.795,2.856c.24.287.472.565.7.832.168-2.141.572-5.115,2.54-6.237a1.224,1.224,0,0,1,1.042-.173,1.183,1.183,0,0,1,.572.568,6.059,6.059,0,0,1,.627,2.336c.465,4.452-.838,8.759-2.026,12.014C252.544,364.946,252.207,365.262,251.829,365.262Zm-6.36-12.888a.389.389,0,0,0-.1.012c-.323.078-.461.569-.5.718a6.231,6.231,0,0,0,.9,4.092,23.855,23.855,0,0,0,5.847,7.337.57.57,0,0,0,.18.119c.1.024.261-.182.368-.475,1.165-3.194,2.445-7.415,1.993-11.742a5.53,5.53,0,0,0-.554-2.1.671.671,0,0,0-.263-.3c-.112-.044-.282,0-.519.135-1.916,1.093-2.148,4.456-2.287,6.466a.3.3,0,0,1-.2.266.307.307,0,0,1-.324-.079c-.4-.434-.808-.917-1.2-1.386a16.354,16.354,0,0,0-2.686-2.754h0A1.29,1.29,0,0,0,245.469,352.374Z"
                                        transform="translate(-96.757 -198.91)" fill="#ea8080" />
                                </g>
                                <g id="Group_6868" data-name="Group 6868" transform="translate(146.35 86.593)">
                                    <path id="Path_6672" data-name="Path 6672"
                                        d="M283,205.01c-1.109,4.663-3.348,9.566-1.583,14.022,1.277,3.222,4.483,5.382,7.849,6.209a27.019,27.019,0,0,0,10.332,0,100.756,100.756,0,0,0,14.36-3.193c4.37-1.313,8.973-3.177,11.353-7.072,1.86-3.044,2.022-6.8,1.973-10.367a120.792,120.792,0,0,0-.88-12.988,19.443,19.443,0,0,0-1.488-6.115c-1.863-3.882-5.954-6.276-10.127-7.339-8.383-2.135-16.516.961-23.48,5.551C283.78,188.682,284.9,197.027,283,205.01Z"
                                        transform="translate(-256.408 -156.165)" fill="#dba07d" />
                                    <path id="Path_6673" data-name="Path 6673"
                                        d="M305.414,205.795c.048.06.094.12.147.18a.141.141,0,0,1,.032.131,35.851,35.851,0,0,0,2.847,3.208,1.852,1.852,0,0,0,.554-.081.122.122,0,0,1,.133.032c2.8-.282,5.606-.161,8.344-.917a23.907,23.907,0,0,0,6.559-2.981,52.049,52.049,0,0,0,8.165-6.924.148.148,0,0,1,.066-.109c.07-.047.131-.1.2-.152.7-.7,1.406-1.392,2.11-2.08.58-.7,1.142-1.417,1.758-2.081-.081-.8-.162-1.6-.26-2.392a19.443,19.443,0,0,0-1.488-6.115c-1.863-3.882-5.954-6.276-10.127-7.339a23.025,23.025,0,0,0-9.856-.284,21.538,21.538,0,0,1,.385,3.306C315.313,190.278,310.18,198.462,305.414,205.795Z"
                                        transform="translate(-266.073 -156.169)" fill="#d49876" />
                                    <g id="Group_6863" data-name="Group 6863" transform="translate(0 16.949)">
                                        <path id="Path_6674" data-name="Path 6674"
                                            d="M248.568,265.25l-7.738,9.755a.545.545,0,0,0,.686.818l11.115-6Z"
                                            transform="translate(-240.708 -207.519)" fill="#d1d4e8" />
                                        <path id="Path_6675" data-name="Path 6675"
                                            d="M251.061,226.582a1.477,1.477,0,0,0-.392,1.764,12.679,12.679,0,0,0,1.97,3.2,34.448,34.448,0,0,0,2.721,2.326,1.475,1.475,0,0,0,1.832-.01l68.395-54.716a1.481,1.481,0,0,0,.536-1.384,9.01,9.01,0,0,0-6.4-7.393,1.491,1.491,0,0,0-1.409.269Z"
                                            transform="translate(-244.558 -170.298)" fill="#d1d4e8" />
                                    </g>
                                    <g id="Group_6864" data-name="Group 6864" transform="translate(11.882)">
                                        <path id="Path_6676" data-name="Path 6676"
                                            d="M369.316,167.027a23.037,23.037,0,0,1-9.369.928c-2.731-.328-5.49-1.674-8.083-2.55l-9.45-3.193c-2.512-.849-5.029-1.7-7.611-2.307-1.3-.306-2.622-.551-3.889-.978a28.4,28.4,0,0,1-3.274-1.421L314,150.888c-6.1-2.959-13.381-1.3-19.633.243a82.869,82.869,0,0,0-19.208,7.356c-2.027,1.083-3.4,1.957-4.408,4.092a27.124,27.124,0,0,0-1.66,6.268q-.875,4.28-1.751,8.56c0,2-.888,4.342-1.29,6.307q-.69,3.378-1.382,6.757a35.952,35.952,0,0,1-1.544,5.9c-.78,2.019-1.707,3.976-2.5,5.991-.381.973-.673,2.284.177,2.891a2.189,2.189,0,0,0,1.148.312,13.113,13.113,0,0,0,7.985-2.109c4.206-2.763,7.3-7.719,9.524-12.133a43.572,43.572,0,0,0,4.451-15.118,15.492,15.492,0,0,0,7.1-1.232c2.166-.874,4.224-2,6.406-2.831a2.15,2.15,0,0,1,.751-.181,2.59,2.59,0,0,1,1.376.633c2.9,1.993,7.844,1.063,10.028,4.084a6.291,6.291,0,0,1,.869,1.958,32.782,32.782,0,0,1,.889,9.735,14.7,14.7,0,0,1-1.1,6.386,14.058,14.058,0,0,1-4.5,4.688,20.212,20.212,0,0,1-5.05,2.952,22.251,22.251,0,0,1-5.947,1c-3.5.257-7,.478-10.48.939-2.667.353-6.58.513-8.6,2.5-3.526,3.471-1.016,9.313,2.994,10.98A21.112,21.112,0,0,0,285.631,219l8.493.471c1.448.08,2.924.084,4.365.241a27.838,27.838,0,0,0,2.836.491c5.3.055,10.228-2.437,15.229-3.829,6.071-1.688,12.405-1.909,18.643-2.513,1.528-.148,3.057-.309,4.575-.539a27.345,27.345,0,0,1,3.988-.045,15.454,15.454,0,0,0,8.122-2.4c1.388-.886,2.624-1.992,3.985-2.918a37.262,37.262,0,0,1,6.781-3.373l13.368-5.551c9.873-4.1,19.776-8.2,30-11.291V142.422C395.429,152.839,383.633,162.692,369.316,167.027Z"
                                            transform="translate(-260.25 -142.422)" fill="#ffbf9b" />
                                    </g>
                                    <path id="Path_6677" data-name="Path 6677"
                                        d="M288.991,165.263c4.247-1.215,8.307-2.979,12.424-4.56a39.566,39.566,0,0,1,6.035-1.949,33.008,33.008,0,0,1,5.993-.638c4.249-.1,8.487.374,12.736.323.39,0,.777-.022,1.166-.039l-6.407-3.107c-6.1-2.959-13.381-1.3-19.633.243a82.87,82.87,0,0,0-19.209,7.356,8.844,8.844,0,0,0-4.139,3.586A29.162,29.162,0,0,0,288.991,165.263Z"
                                        transform="translate(-255.31 -146.826)" fill="#ffc8a8" />
                                    <g id="Group_6865" data-name="Group 6865" transform="translate(85.585)">
                                        <path id="Path_6678" data-name="Path 6678"
                                            d="M416.836,167.027a23.041,23.041,0,0,1-9.369.928c-2.731-.328-5.49-1.674-8.083-2.55l-9.45-3.193c-2.512-.849-5.029-1.7-7.611-2.307-.283-.066-.566-.129-.85-.193l.143.122c2.318,1.977,4.509,4.2,7.18,5.7a74.9,74.9,0,0,0,9.873,4.7A37.944,37.944,0,0,0,409.324,173c7.263.531,14.258-2.144,20.952-4.6,7.765-2.854,15.491-5.825,23.261-8.672v-17.3C442.948,152.839,431.152,162.692,416.836,167.027Z"
                                            transform="translate(-381.472 -142.422)" fill="#ffc8a8" />
                                    </g>
                                    <path id="Path_6679" data-name="Path 6679"
                                        d="M283.909,191.077a15.492,15.492,0,0,0,7.1-1.232c2.166-.874,4.224-2,6.406-2.831a2.151,2.151,0,0,1,.751-.181,2.591,2.591,0,0,1,1.376.633c2.9,1.993,7.844,1.063,10.028,4.084a6.292,6.292,0,0,1,.869,1.958,32.784,32.784,0,0,1,.889,9.735c0,.094,0,.19-.006.284,3.909-3.322,7.855-6.6,11.683-10.017q2.028-1.809,4-3.676c1.1-1.046,2.284-1.985,3.408-3,1.038-.942,1.972-2.1,1.556-3.581a3.76,3.76,0,0,0-3.428-2.88,10.921,10.921,0,0,0-3.472,1.127,32.905,32.905,0,0,1-4.773,1.519,35.373,35.373,0,0,1-10.1.888c-3.149-.2-6.171-1.22-9.275-1.706a14.362,14.362,0,0,0-5.146-.026,11.4,11.4,0,0,0-3.984,1.8c-2.108,1.391-4.364,3.2-7.041,2.454-2.1-.588-2.768-2.679-3.847-4.34a11.667,11.667,0,0,0-1.512,4.334c-.33,1.654-.533,3.332-.872,4.984a35.46,35.46,0,0,1-1.711,5.235q-.967,2.573-2.094,5.081a36.4,36.4,0,0,1-4.888,8.528,12.965,12.965,0,0,1-5.721,4.143,11.951,11.951,0,0,1-2.534.547c-.327.761-.65,1.523-.952,2.294-.381.973-.673,2.284.177,2.891a2.189,2.189,0,0,0,1.148.312,13.113,13.113,0,0,0,7.985-2.109c4.206-2.763,7.3-7.719,9.524-12.133A43.572,43.572,0,0,0,283.909,191.077Z"
                                        transform="translate(-248.369 -157.296)" fill="#f0b290" />
                                    <g id="Group_6866" data-name="Group 6866" transform="translate(25.595 31.236)">
                                        <path id="Path_6680" data-name="Path 6680"
                                            d="M406.186,200.993a59.981,59.981,0,0,1-13.586,6.5c-5.974,2.034-11.922,4.284-18.083,5.7a51.73,51.73,0,0,1-9.22,1.3c-1.617.073-3.233.032-4.849.164a39.841,39.841,0,0,0-4.89.717c-6.157,1.285-11.947,3.82-17.735,6.208a148.541,148.541,0,0,1-18.547,6.475,92.9,92.9,0,0,1-17.124,2.783c-4.385.319-15.105,1.333-15.035-5.356a6.649,6.649,0,0,0-2.63,1.482c-3.526,3.472-1.016,9.313,2.994,10.98a21.112,21.112,0,0,0,6.991,1.186l8.493.471c1.448.08,2.924.085,4.365.241a27.671,27.671,0,0,0,2.836.491c5.3.056,10.228-2.437,15.229-3.828,6.071-1.688,12.405-1.909,18.643-2.513,1.528-.148,3.057-.309,4.575-.539a27.348,27.348,0,0,1,3.988-.045,15.454,15.454,0,0,0,8.122-2.4c1.388-.886,2.624-1.992,3.985-2.918a37.262,37.262,0,0,1,6.781-3.373l13.368-5.551c9.873-4.1,19.776-8.2,30-11.291V193.8A52.385,52.385,0,0,1,406.186,200.993Z"
                                            transform="translate(-282.805 -193.797)" fill="#f5b693" />
                                    </g>
                                    <g id="Group_6867" data-name="Group 6867" transform="translate(51.253 16.949)">
                                        <path id="Path_6681" data-name="Path 6681"
                                            d="M355.318,177.763a9.011,9.011,0,0,0-6.4-7.393,1.491,1.491,0,0,0-1.409.269l-22.5,18.716a12.554,12.554,0,0,1,4.141,4.768,26.045,26.045,0,0,1,1.75,4.133l23.885-19.109A1.481,1.481,0,0,0,355.318,177.763Z"
                                            transform="translate(-325.006 -170.298)" fill="#d1d4e8" />
                                    </g>
                                </g>
                                <g id="Group_6920" data-name="Group 6920">
                                    <g id="Group_6919" data-name="Group 6919" clip-path="url(#clip-path)">
                                        <g id="Group_6869" data-name="Group 6869" transform="translate(76.78 51.215)">
                                            <path id="Path_6682" data-name="Path 6682"
                                                d="M126.739,112.552h-.015a.455.455,0,0,1-.441-.469l.212-7.011a.46.46,0,0,1,.47-.441l6.555.2.2-6.555a.454.454,0,0,1,.143-.319.44.44,0,0,1,.327-.123l6.555.2.2-6.555a.456.456,0,0,1,.143-.318.439.439,0,0,1,.326-.123l6.555.2.2-6.555a.455.455,0,0,1,.469-.442l7.011.213a.455.455,0,0,1,.441.469.443.443,0,0,1-.469.442l-6.555-.2-.2,6.555a.459.459,0,0,1-.143.319.416.416,0,0,1-.326.123l-6.555-.2-.2,6.555a.459.459,0,0,1-.143.318.425.425,0,0,1-.327.123l-6.555-.2-.2,6.555a.455.455,0,0,1-.469.441l-6.555-.2-.2,6.555A.456.456,0,0,1,126.739,112.552Z"
                                                transform="translate(-126.283 -84.235)" fill="#569acc" />
                                            <path id="Path_6683" data-name="Path 6683"
                                                d="M135.085,121.421h-.015a.455.455,0,0,1-.441-.47l.213-7.011a.449.449,0,0,1,.469-.442l6.555.2.2-6.555a.456.456,0,0,1,.47-.441l6.555.2.2-6.555a.454.454,0,0,1,.47-.441l6.555.2.2-6.555a.452.452,0,0,1,.469-.442l7.011.213a.456.456,0,1,1-.028.911l-6.555-.2-.2,6.555a.451.451,0,0,1-.469.441l-6.555-.2-.2,6.555a.457.457,0,0,1-.143.319.416.416,0,0,1-.326.123l-6.555-.2-.2,6.555a.448.448,0,0,1-.469.442l-6.555-.2-.2,6.555A.456.456,0,0,1,135.085,121.421Z"
                                                transform="translate(-129.554 -87.71)" fill="#569acc" />
                                            <path id="Path_6684" data-name="Path 6684"
                                                d="M143.432,130.29h-.015a.455.455,0,0,1-.441-.469l.212-7.011a.459.459,0,0,1,.143-.319.449.449,0,0,1,.327-.123l6.555.2.2-6.555a.455.455,0,0,1,.143-.318.435.435,0,0,1,.326-.124l6.555.2.2-6.555a.453.453,0,0,1,.469-.442l6.555.2.2-6.555a.45.45,0,0,1,.469-.441l7.011.212a.456.456,0,0,1,.442.47.445.445,0,0,1-.469.441l-6.555-.2-.2,6.555a.444.444,0,0,1-.469.442l-6.555-.2-.2,6.555a.452.452,0,0,1-.47.442l-6.555-.2-.2,6.556a.459.459,0,0,1-.143.318.429.429,0,0,1-.327.123l-6.555-.2-.2,6.555A.456.456,0,0,1,143.432,130.29Z"
                                                transform="translate(-132.826 -91.187)" fill="#569acc" />
                                        </g>
                                        <g id="Group_6870" data-name="Group 6870"
                                            transform="translate(150.128 228.168)">
                                            <path id="Path_6685" data-name="Path 6685"
                                                d="M247.378,403.6h-.015a.455.455,0,0,1-.441-.469l.213-7.011a.468.468,0,0,1,.469-.443l6.555.2.2-6.555a.457.457,0,0,1,.456-.442h.014l6.555.2.2-6.555a.457.457,0,0,1,.456-.442h.014l6.556.2.2-6.555a.457.457,0,0,1,.456-.443h.013l7.011.213a.456.456,0,0,1,.442.469.445.445,0,0,1-.469.443l-6.555-.2-.2,6.555a.456.456,0,0,1-.456.443h-.013l-6.556-.2-.2,6.555a.456.456,0,0,1-.456.442h-.014l-6.555-.2-.2,6.555a.441.441,0,0,1-.47.443l-6.555-.2-.2,6.555A.456.456,0,0,1,247.378,403.6Z"
                                                transform="translate(-246.922 -375.277)" fill="#f3feff" />
                                            <path id="Path_6686" data-name="Path 6686"
                                                d="M255.724,412.465h-.014a.456.456,0,0,1-.442-.47l.213-7.011a.442.442,0,0,1,.47-.443l6.555.2.2-6.555a.457.457,0,0,1,.143-.318.5.5,0,0,1,.326-.124l6.556.2.2-6.555a.435.435,0,0,1,.469-.443l6.556.2.2-6.555a.456.456,0,0,1,.456-.442h.013l7.011.212a.457.457,0,0,1,.443.47.447.447,0,0,1-.47.442l-6.555-.2-.2,6.555a.457.457,0,0,1-.456.443h-.013l-6.556-.2-.2,6.555a.456.456,0,0,1-.143.318.515.515,0,0,1-.326.124l-6.555-.2-.2,6.555a.456.456,0,0,1-.456.442h-.013l-6.555-.2-.2,6.555A.457.457,0,0,1,255.724,412.465Z"
                                                transform="translate(-250.193 -378.754)" fill="#f3feff" />
                                            <path id="Path_6687" data-name="Path 6687"
                                                d="M264.07,421.333h-.013a.457.457,0,0,1-.443-.47l.213-7.011a.438.438,0,0,1,.469-.442l6.556.2.2-6.555a.456.456,0,0,1,.456-.442h.013l6.555.2.2-6.555a.456.456,0,0,1,.456-.443h.013l6.555.2.2-6.555a.457.457,0,0,1,.456-.442h.014l7.011.212a.456.456,0,0,1-.013.912h-.014l-6.555-.2-.2,6.555a.442.442,0,0,1-.47.443l-6.555-.2-.2,6.555a.454.454,0,0,1-.47.443l-6.555-.2-.2,6.555a.457.457,0,0,1-.456.442h-.013l-6.556-.2-.2,6.555A.456.456,0,0,1,264.07,421.333Z"
                                                transform="translate(-253.465 -382.23)" fill="#f3feff" />
                                        </g>
                                        <g id="Group_6881" data-name="Group 6881" transform="translate(233.803 8.35)">
                                            <circle id="Ellipse_67" data-name="Ellipse 67" cx="18.284" cy="18.284"
                                                r="18.284" transform="translate(0 11.694)" fill="#000" />
                                            <g id="Group_6880" data-name="Group 6880" transform="translate(7.01)">
                                                <g id="Group_6879" data-name="Group 6879">
                                                    <g id="Group_6871" data-name="Group 6871"
                                                        transform="translate(4.692 16.514)">
                                                        <path id="Path_6688" data-name="Path 6688"
                                                            d="M404.913,56l30.742-13.5c0-.534-.037-1.069-.088-1.6L403.791,54.847C404.151,55.247,404.522,55.634,404.913,56Z"
                                                            transform="translate(-403.791 -40.895)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6872" data-name="Group 6872"
                                                        transform="translate(2.133 12.141)">
                                                        <path id="Path_6689" data-name="Path 6689"
                                                            d="M400.348,49.656,433.385,35.15c-.128-.485-.274-.968-.444-1.448L399.583,48.349C399.821,48.8,400.078,49.233,400.348,49.656Z"
                                                            transform="translate(-399.583 -33.702)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6873" data-name="Group 6873"
                                                        transform="translate(13.982 27.092)">
                                                        <path id="Path_6690" data-name="Path 6690"
                                                            d="M421.765,67.653l16.088-7.064a18.3,18.3,0,0,0,1.484-2.295l-20.266,8.9A18.352,18.352,0,0,0,421.765,67.653Z"
                                                            transform="translate(-419.071 -58.294)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6874" data-name="Group 6874"
                                                        transform="translate(8.416 21.399)">
                                                        <path id="Path_6691" data-name="Path 6691"
                                                            d="M411.541,62.093l25.824-11.339a18.266,18.266,0,0,0,.415-1.825L409.916,61.163A18.451,18.451,0,0,0,411.541,62.093Z"
                                                            transform="translate(-409.916 -48.929)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6875" data-name="Group 6875"
                                                        transform="translate(0.556 8.198)">
                                                        <path id="Path_6692" data-name="Path 6692"
                                                            d="M429.966,27.218,396.989,41.7c.123.488.259.973.424,1.457l33.338-14.638C430.507,28.068,430.242,27.639,429.966,27.218Z"
                                                            transform="translate(-396.989 -27.218)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6876" data-name="Group 6876"
                                                        transform="translate(0 4.705)">
                                                        <path id="Path_6693" data-name="Path 6693"
                                                            d="M426.628,21.472,396.075,34.888c0,.537.021,1.075.065,1.615l31.632-13.89C427.405,22.215,427.026,21.833,426.628,21.472Z"
                                                            transform="translate(-396.074 -21.472)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6877" data-name="Group 6877"
                                                        transform="translate(0.317 1.795)">
                                                        <path id="Path_6694" data-name="Path 6694"
                                                            d="M422.522,16.687,397.054,27.87a18.343,18.343,0,0,0-.458,1.844L424.189,17.6A18.3,18.3,0,0,0,422.522,16.687Z"
                                                            transform="translate(-396.596 -16.687)" fill="CCC" />
                                                    </g>
                                                    <g id="Group_6878" data-name="Group 6878"
                                                        transform="translate(2.475)">
                                                        <path id="Path_6695" data-name="Path 6695"
                                                            d="M417.066,13.734l-15.309,6.722a18.245,18.245,0,0,0-1.612,2.351l19.743-8.668A18.215,18.215,0,0,0,417.066,13.734Z"
                                                            transform="translate(-400.145 -13.734)" fill="CCC" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_6891" data-name="Group 6891" transform="translate(21.969 -9.359)">
                                            <g id="Group_6890" data-name="Group 6890">
                                                <g id="Group_6882" data-name="Group 6882"
                                                    transform="translate(4.692 16.514)">
                                                    <path id="Path_6696" data-name="Path 6696"
                                                        d="M44.971,26.871l30.742-13.5c0-.534-.037-1.069-.088-1.6L43.849,25.72C44.209,26.12,44.58,26.507,44.971,26.871Z"
                                                        transform="translate(-43.849 -11.768)" fill="777" />
                                                </g>
                                                <g id="Group_6883" data-name="Group 6883"
                                                    transform="translate(2.133 12.141)">
                                                    <path id="Path_6697" data-name="Path 6697"
                                                        d="M40.406,20.529,73.443,6.023c-.128-.485-.273-.968-.444-1.448L39.641,19.222C39.879,19.673,40.136,20.106,40.406,20.529Z"
                                                        transform="translate(-39.641 -4.575)" fill="777" />
                                                </g>
                                                <g id="Group_6884" data-name="Group 6884"
                                                    transform="translate(13.982 27.092)">
                                                    <path id="Path_6698" data-name="Path 6698"
                                                        d="M61.822,38.526l16.089-7.064A18.331,18.331,0,0,0,79.4,29.167l-20.266,8.9A18.265,18.265,0,0,0,61.822,38.526Z"
                                                        transform="translate(-59.129 -29.167)" fill="777" />
                                                </g>
                                                <g id="Group_6885" data-name="Group 6885"
                                                    transform="translate(8.416 21.399)">
                                                    <path id="Path_6699" data-name="Path 6699"
                                                        d="M51.6,32.966,77.423,21.627a18.4,18.4,0,0,0,.415-1.825L49.974,32.037A18.3,18.3,0,0,0,51.6,32.966Z"
                                                        transform="translate(-49.974 -19.802)" fill="777" />
                                                </g>
                                                <g id="Group_6886" data-name="Group 6886"
                                                    transform="translate(0.556 8.199)">
                                                    <path id="Path_6700" data-name="Path 6700"
                                                        d="M70.024-1.908,37.047,12.572c.123.488.259.974.424,1.457L70.809-.61C70.565-1.059,70.3-1.488,70.024-1.908Z"
                                                        transform="translate(-37.047 1.908)" fill="777" />
                                                </g>
                                                <g id="Group_6887" data-name="Group 6887"
                                                    transform="translate(0 4.705)">
                                                    <path id="Path_6701" data-name="Path 6701"
                                                        d="M66.686-7.655,36.133,5.761c0,.537.021,1.075.064,1.615L67.83-6.514C67.463-6.912,67.084-7.294,66.686-7.655Z"
                                                        transform="translate(-36.132 7.655)" fill="777" />
                                                </g>
                                                <g id="Group_6888" data-name="Group 6888"
                                                    transform="translate(0.317 1.795)">
                                                    <path id="Path_6702" data-name="Path 6702"
                                                        d="M62.58-12.44,37.112-1.257A18.351,18.351,0,0,0,36.654.587L64.247-11.529A18.377,18.377,0,0,0,62.58-12.44Z"
                                                        transform="translate(-36.654 12.44)" fill="777" />
                                                </g>
                                                <g id="Group_6889" data-name="Group 6889" transform="translate(2.475)">
                                                    <path id="Path_6703" data-name="Path 6703"
                                                        d="M57.124-15.393,41.815-8.671A18.248,18.248,0,0,0,40.2-6.32l19.742-8.669A18.2,18.2,0,0,0,57.124-15.393Z"
                                                        transform="translate(-40.203 15.393)" fill="777" />
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_6901" data-name="Group 6901"
                                            transform="translate(259.533 267.786)">
                                            <g id="Group_6900" data-name="Group 6900">
                                                <g id="Group_6892" data-name="Group 6892"
                                                    transform="translate(6.549 23.05)">
                                                    <path id="Path_6704" data-name="Path 6704"
                                                        d="M439.2,499.43l42.91-18.841c0-.745-.051-1.492-.122-2.239l-44.354,19.475C438.138,498.382,438.657,498.922,439.2,499.43Z"
                                                        transform="translate(-437.636 -478.349)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6893" data-name="Group 6893"
                                                    transform="translate(2.978 16.946)">
                                                    <path id="Path_6705" data-name="Path 6705"
                                                        d="M432.83,490.578l46.113-20.248c-.179-.677-.382-1.351-.62-2.021l-46.562,20.445C432.094,489.382,432.453,489.988,432.83,490.578Z"
                                                        transform="translate(-431.762 -468.309)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6894" data-name="Group 6894"
                                                    transform="translate(19.517 37.816)">
                                                    <path id="Path_6706" data-name="Path 6706"
                                                        d="M462.724,515.7l22.456-9.861a25.423,25.423,0,0,0,2.071-3.2l-28.288,12.421A25.56,25.56,0,0,0,462.724,515.7Z"
                                                        transform="translate(-458.964 -502.634)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6895" data-name="Group 6895"
                                                    transform="translate(11.747 29.869)">
                                                    <path id="Path_6707" data-name="Path 6707"
                                                        d="M448.452,507.938,484.5,492.111a25.748,25.748,0,0,0,.579-2.548L446.185,506.64A25.687,25.687,0,0,0,448.452,507.938Z"
                                                        transform="translate(-446.185 -489.563)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6896" data-name="Group 6896"
                                                    transform="translate(0.776 11.444)">
                                                    <path id="Path_6708" data-name="Path 6708"
                                                        d="M474.171,459.259l-46.03,20.211c.171.681.361,1.359.592,2.033l46.534-20.432C474.927,460.445,474.556,459.846,474.171,459.259Z"
                                                        transform="translate(-428.141 -459.259)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6897" data-name="Group 6897"
                                                    transform="translate(0 6.567)">
                                                    <path id="Path_6709" data-name="Path 6709"
                                                        d="M469.511,451.238l-42.646,18.726c0,.749.029,1.5.091,2.253l44.154-19.387C470.6,452.275,470.067,451.741,469.511,451.238Z"
                                                        transform="translate(-426.864 -451.238)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6898" data-name="Group 6898"
                                                    transform="translate(0.443 2.506)">
                                                    <path id="Path_6710" data-name="Path 6710"
                                                        d="M463.781,444.559l-35.549,15.609a25.37,25.37,0,0,0-.639,2.574l38.516-16.911A25.46,25.46,0,0,0,463.781,444.559Z"
                                                        transform="translate(-427.593 -444.559)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6899" data-name="Group 6899" transform="translate(3.455)">
                                                    <path id="Path_6711" data-name="Path 6711"
                                                        d="M456.166,440.437,434.8,449.82a25.552,25.552,0,0,0-2.25,3.281L460.1,441A25.378,25.378,0,0,0,456.166,440.437Z"
                                                        transform="translate(-432.546 -440.437)" fill="#f3feff" />
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_6902" data-name="Group 6902"
                                            transform="translate(146.187 -12.614)">
                                            <path id="Path_6712" data-name="Path 6712"
                                                d="M276.536,12.986c-2.968,0-3.242,4.615-.264,4.615S279.515,12.986,276.536,12.986Z"
                                                transform="translate(-253.661 7.523)" fill="#ffa873" />
                                            <path id="Path_6713" data-name="Path 6713"
                                                d="M287.626,32.393c-2.968,0-3.242,4.615-.264,4.615S290.6,32.393,287.626,32.393Z"
                                                transform="translate(-258.009 -0.084)" fill="#ffa873" />
                                            <path id="Path_6714" data-name="Path 6714"
                                                d="M295.482,15.3c-2.968,0-3.242,4.615-.264,4.615S298.46,15.3,295.482,15.3Z"
                                                transform="translate(-261.088 6.618)" fill="#ffa873" />
                                            <path id="Path_6715" data-name="Path 6715"
                                                d="M320.434,8.827c-2.968,0-3.242,4.615-.264,4.615S323.412,8.827,320.434,8.827Z"
                                                transform="translate(-270.869 9.153)" fill="#ffa873" />
                                            <path id="Path_6716" data-name="Path 6716"
                                                d="M311.192,30.083c-2.968,0-3.242,4.615-.264,4.615S314.171,30.083,311.192,30.083Z"
                                                transform="translate(-267.246 0.821)" fill="#ffa873" />
                                            <path id="Path_6717" data-name="Path 6717"
                                                d="M299.64-6.883c-2.968,0-3.242,4.615-.264,4.615S302.619-6.883,299.64-6.883Z"
                                                transform="translate(-262.718 15.312)" fill="#ffa873" />
                                            <path id="Path_6718" data-name="Path 6718"
                                                d="M269.143-5.035c-2.968,0-3.242,4.615-.264,4.615S272.122-5.035,269.143-5.035Z"
                                                transform="translate(-250.763 14.587)" fill="#ffa873" />
                                            <path id="Path_6719" data-name="Path 6719"
                                                d="M265.909,35.166c-2.968,0-3.242,4.615-.264,4.615S268.887,35.166,265.909,35.166Z"
                                                transform="translate(-249.495 -1.172)" fill="#ffa873" />
                                            <path id="Path_6720" data-name="Path 6720"
                                                d="M252.046,9.751c-2.968,0-3.242,4.615-.264,4.615S255.025,9.751,252.046,9.751Z"
                                                transform="translate(-244.061 8.791)" fill="#ffa873" />
                                            <path id="Path_6721" data-name="Path 6721"
                                                d="M284.392-20.746c-2.968,0-3.242,4.615-.264,4.615S287.37-20.746,284.392-20.746Z"
                                                transform="translate(-256.741 20.746)" fill="#ffa873" />
                                            <path id="Path_6722" data-name="Path 6722"
                                                d="M320.434-14.277c-2.968,0-3.242,4.615-.264,4.615S323.412-14.277,320.434-14.277Z"
                                                transform="translate(-270.869 18.21)" fill="#ffa873" />
                                            <path id="Path_6723" data-name="Path 6723"
                                                d="M331.061,25.462c-2.968,0-3.242,4.615-.264,4.615S334.04,25.462,331.061,25.462Z"
                                                transform="translate(-275.035 2.632)" fill="#ffa873" />
                                            <path id="Path_6724" data-name="Path 6724"
                                                d="M303.337,48.566c-2.968,0-3.242,4.615-.264,4.615S306.315,48.566,303.337,48.566Z"
                                                transform="translate(-264.167 -6.424)" fill="#ffa873" />
                                            <path id="Path_6725" data-name="Path 6725"
                                                d="M242.805,31.469c-2.968,0-3.242,4.615-.264,4.615S245.783,31.469,242.805,31.469Z"
                                                transform="translate(-240.438 0.278)" fill="#ffa873" />
                                        </g>
                                        <g id="Group_6918" data-name="Group 6918" transform="translate(5.912 274.825)">
                                            <g id="Group_6917" data-name="Group 6917">
                                                <g id="Group_6903" data-name="Group 6903"
                                                    transform="translate(16.296 16.296)">
                                                    <path id="Path_6726" data-name="Path 6726"
                                                        d="M38.407,478.818c-2.358,0-2.576,3.667-.21,3.667S40.773,478.818,38.407,478.818Z"
                                                        transform="translate(-36.526 -478.818)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6904" data-name="Group 6904"
                                                    transform="translate(21.654 25.672)">
                                                    <path id="Path_6727" data-name="Path 6727"
                                                        d="M47.219,494.238c-2.358,0-2.576,3.667-.21,3.667S49.585,494.238,47.219,494.238Z"
                                                        transform="translate(-45.338 -494.238)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6905" data-name="Group 6905"
                                                    transform="translate(25.448 17.412)">
                                                    <path id="Path_6728" data-name="Path 6728"
                                                        d="M53.461,480.653c-2.358,0-2.577,3.667-.21,3.667S55.827,480.653,53.461,480.653Z"
                                                        transform="translate(-51.58 -480.653)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6906" data-name="Group 6906"
                                                    transform="translate(37.503 14.287)">
                                                    <path id="Path_6729" data-name="Path 6729"
                                                        d="M73.287,475.513c-2.358,0-2.576,3.667-.21,3.667S75.653,475.513,73.287,475.513Z"
                                                        transform="translate(-71.406 -475.513)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6907" data-name="Group 6907"
                                                    transform="translate(33.038 24.556)">
                                                    <path id="Path_6730" data-name="Path 6730"
                                                        d="M65.944,492.4c-2.358,0-2.576,3.666-.21,3.666S68.31,492.4,65.944,492.4Z"
                                                        transform="translate(-64.063 -492.403)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6908" data-name="Group 6908"
                                                    transform="translate(27.458 6.697)">
                                                    <path id="Path_6731" data-name="Path 6731"
                                                        d="M56.765,463.03c-2.358,0-2.576,3.667-.21,3.667S59.131,463.03,56.765,463.03Z"
                                                        transform="translate(-54.884 -463.03)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6909" data-name="Group 6909"
                                                    transform="translate(12.724 7.59)">
                                                    <path id="Path_6732" data-name="Path 6732"
                                                        d="M32.532,464.5c-2.358,0-2.577,3.667-.21,3.667S34.9,464.5,32.532,464.5Z"
                                                        transform="translate(-30.652 -464.498)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6910" data-name="Group 6910"
                                                    transform="translate(11.162 27.011)">
                                                    <path id="Path_6733" data-name="Path 6733"
                                                        d="M29.962,496.441c-2.358,0-2.577,3.667-.21,3.667S32.329,496.441,29.962,496.441Z"
                                                        transform="translate(-28.082 -496.441)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6911" data-name="Group 6911"
                                                    transform="translate(4.465 14.733)">
                                                    <path id="Path_6734" data-name="Path 6734"
                                                        d="M18.948,476.247c-2.358,0-2.577,3.667-.21,3.667S21.314,476.247,18.948,476.247Z"
                                                        transform="translate(-17.067 -476.247)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6912" data-name="Group 6912" transform="translate(20.091)">
                                                    <path id="Path_6735" data-name="Path 6735"
                                                        d="M44.649,452.015c-2.358,0-2.576,3.667-.21,3.667S47.015,452.015,44.649,452.015Z"
                                                        transform="translate(-42.768 -452.015)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6913" data-name="Group 6913"
                                                    transform="translate(37.503 3.125)">
                                                    <path id="Path_6736" data-name="Path 6736"
                                                        d="M73.287,457.155c-2.358,0-2.576,3.667-.21,3.667S75.653,457.155,73.287,457.155Z"
                                                        transform="translate(-71.406 -457.155)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6914" data-name="Group 6914"
                                                    transform="translate(42.638 22.323)">
                                                    <path id="Path_6737" data-name="Path 6737"
                                                        d="M81.732,488.731c-2.358,0-2.576,3.667-.21,3.667S84.1,488.731,81.732,488.731Z"
                                                        transform="translate(-79.851 -488.731)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6915" data-name="Group 6915"
                                                    transform="translate(29.243 33.485)">
                                                    <path id="Path_6738" data-name="Path 6738"
                                                        d="M59.7,507.089c-2.358,0-2.576,3.667-.21,3.667S62.068,507.089,59.7,507.089Z"
                                                        transform="translate(-57.821 -507.089)" fill="#f3feff" />
                                                </g>
                                                <g id="Group_6916" data-name="Group 6916"
                                                    transform="translate(0 25.225)">
                                                    <path id="Path_6739" data-name="Path 6739"
                                                        d="M11.6,493.5c-2.358,0-2.577,3.667-.21,3.667S13.971,493.5,11.6,493.5Z"
                                                        transform="translate(-9.724 -493.504)" fill="#f3feff" />
                                                </g>
                                            </g>
                                        </g>
                                        <path id="Path_6740" data-name="Path 6740"
                                            d="M181.141,21.938H144.072l18.535-39.283Zm-36.11-.608h35.152L162.607-15.92Z"
                                            transform="translate(-56.476 6.799)" fill="#fff" />
                                        <path id="Path_6741" data-name="Path 6741"
                                            d="M465.922,239.957l17.583-29.282,16.2,24.235Zm17.611-28.147-16.426,27.354,31.557-4.714Z"
                                            transform="translate(-182.641 -82.585)" fill="#fff" />
                                        <path id="Path_6742" data-name="Path 6742"
                                            d="M427.784,127.848l-20.761-20.461,32.064-11.769Zm-19.651-20.221,19.394,19.115,10.559-30.109Z"
                                            transform="translate(-159.553 -37.482)" fill="#fff" />
                                        <path id="Path_6743" data-name="Path 6743"
                                            d="M313.266,487.444l16.763-40.071L350.3,485.79ZM330.093,448.8l-15.9,38,35.117-1.567Z"
                                            transform="translate(-122.8 -175.37)" fill="#c2c8f2" />
                                        <path id="Path_6744" data-name="Path 6744"
                                            d="M492.567,366.248,470.273,328.97l42.948,6.5Zm-21.111-36.484L492.6,365.113l19.585-29.191Z"
                                            transform="translate(-184.347 -128.956)" fill="#c2c8f2" />
                                        <path id="Path_6745" data-name="Path 6745"
                                            d="M121.682,449.538l-7.336-27.3,32.6,5.876Zm-6.5-26.531,6.838,25.447,23.547-19.97Z"
                                            transform="translate(-44.824 -165.517)" fill="#c2c8f2" />
                                        <path id="Path_6746" data-name="Path 6746"
                                            d="M-4.542,95.547-25.488,64.962l42.883-6.9Zm-19.9-30.137,19.862,29,20.8-35.549Z"
                                            transform="translate(9.991 -22.759)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>
                            <p class="description">
                                No Data Available !!
                            </p>
                        </div>

                        @endforelse

                    </div>
                </div>
                @endif
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                @if ($items->where('item', 'section-foure')->count())
                <div class="subsidiaries_sec_content">
                    <div class="subsidiaries__sec">
                        @forelse ($sisInvestors as $sister)
                        <div class="subsidiaries_content">
                            <div class="flg_div">
                                <img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                            </div>
                            <div class="subsidiaries_details">
                                <h5>{{$sister->translate('title', app()->getLocale())}}</h5>
                                <div class="flags_sec">
                                    @foreach ($sister->investorAttributes as $attr)
                                    <div class="flag_icon_titel">
                                        <div class="sub_contennt">
                                            <h6><img src="{{ $item->getFirstMediaUrl('StaticTable') }}">
                                                <p>Since : <span>{{ $attr->since}}</span></p>
                                            </h6>
                                            <h6>
                                                <p>Sharing : <span>{{ $attr->percent}}%</span></p>
                                            </h6>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <a href="{{ $sister->url}}" class="website_link">Website</a>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Partner Section -->
    @endsection