@extends('user.layout.index_master')
@section('parent_page_name')
    Home
@endsection

@section('cover_image')
    {{ $home->getFirstMediaUrl('icon') ?: asset('content/images/logo.svg') }}
@endsection

@section('page_name')
    Home
@endsection

@section('websiteStyle')
    <link rel="stylesheet" href="{{ asset('content/styles/pages/home-page/home-index-style.css') }}" />
@endsection

@section('content')
    <!-- Start Quick Navigation Bar -->
    <div id="banner-quick-access">
        @foreach ($upperDidebarResources as $resource)
            <div class="nav-item">
                <!-- <i class="bi bi-telephone-fill"></i> -->
                <div class="nav-item-icon">
                    <img src="{{ $resource->resource ? asset('/storage/' . $resource->resource) : asset('content/images/logo.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;" alt="icon"
                        style="width: 25px; height: 25px; border-radius: 4px;" />
                </div>
                <span>{{ $resource->title }}</span>
            </div>
        @endforeach
    </div>
    <!-- End Quick Navigation Bar -->

    <div id="home-page">
        <!-- Start Quick Access Section UI -->
        {{-- <div id="quick-access-card" class="position-relative mt-4">
            <div class="container">
                <div class="row g-3">
                    @foreach ($lowerDidebarResources as $resource)
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                            <div class="brand-card light-blue">
                                <div class="brand-card-icon">
                                    <img src="{{ $resource->resource ? asset('/storage/' . $resource->resource) : asset('content/images/logo.svg') }}" loading="lazy"
                                        onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                        alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                                </div>
                                <div class="card-texts">
                                    <div class="brand-card-title">{{ $resource->title }}</div>
                                    <div class="brand-card-category">{{ $resource->sub_title ?? '' }}</div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div> --}}
        <!-- End Quick Access Section UI -->

        <!-- Start Features Section -->
        <section id="features-section" class="section-bundries">
            <div class="container">
                <div class="d-flex justify-content-center flex-column">
                    <h2 class="feature-title">FEATURES & ADVANTAGES</h2>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                </div>
                <p class="mt-2 description">
                    {!! $feature->description ?? '' !!}
                </p>
                <div class="features row g-3">
                    @foreach ($feature->files->take(8) as $file)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="feature-item feature-card d-flex flex-column text-start p-3">
                            {{-- <i class="fa-solid fa-clock"></i> --}}
                            <div class="feature-icon">
                                <img src="{{ $file->image ? asset('/storage/' . $file->image) : asset('content/images/logo.svg') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;" class="img-fluid"
                                    style="max-width: 40px; height: auto;">
                            </div>
                            <div class="feature-value">{{ $file->title }}</div>
                            <div class="feature-label">{{ $file->sub_title }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Features Section -->

        <!-- Start About Section -->
        @if($homeVideo)
        <section id="about-company-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="about-content text-sm-start text-center">
                            <h2 class="title fs-lg text-white-color fw-bold">
                                {!! $homeVideo->title ?? '' !!}
                            </h2>
                            <p class="w-75 mt-2 text-white-color description">
                                {!! $homeVideo->description ?? '' !!}
                            </p>
                            @if($homeVideo->button_url)
                            <div class="mt-4">
                                <button class="btn btn-light border justify-content-sm-start justify-content-center"
                                    onclick="window.open('{{ $homeVideo->button_url }}', '_blank')">
                                    {{ $homeVideo->button_text ?? 'Learn More' }}
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative about-img">
                            <iframe id="videoFrame" width="100%" height="100%"
                                src="{{ $homeVideo->youtube_url }}"
                                title="{{ $homeVideo->title ?? 'Video' }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <div class="position-absolute about-layer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- End About Section -->

        <!-- Start Projects Section -->
        <section id="projects-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="texts-data d-flex flex-column">
                    <h5 class="global-title">
                        Our Projects
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    <!-- <p class="global-description">description</p> -->
                </div>

                {{-- home.blade.php --}}
                <div class="row justify-content-center w-100 mt-3">
                    @foreach ($projects as $key => $project)
                        @if ($key <= 1)
                            {{-- First column (2 projects) --}}
                            @if ($key == 0)
                                <div class="col-xl-4 col-lg-4">
                                    <div class="row w-100">
                            @endif
                            <div class="col-lg-12 col-md-6 col-sm-6 @if ($key > 0) mt-sm-0 mt-3 @endif">
                                <div class="step @if ($key > 0) mt-lg-3 @endif">
                                    <div class="step-content text-center">
                                        <div class="image-box">
                                            <img src="{{ $project->getFirstMediaUrl('Project') ?: asset('content/images/logo.svg') }}" loading="lazy"
                                                onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                                alt="{{ $project->title }}" class="w-100 h-100">
                                        </div>
                                        <h3 class="fs-5 text-main-color fw-bold mt-2">
                                            {{ $project->title }}
                                        </h3>
                                        <p class="mb-0 step-description fs-8 m-auto">
                                            {{ Illuminate\Support\Str::limit(strip_tags($project->home_description ?? $project->description ?? ''), 140) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if ($key == 1)
                </div>
            </div>
            @endif
        @elseif($key == 2)
            {{-- Middle column (1 project) --}}
            <div class="col-xl-4 col-lg-4 col-md-6 mt-lg-0 mt-3">
                <div class="step special-step h-100">
                    <div class="step-content text-center">
                        <div class="image-box">
                            <img src="{{ $project->getFirstMediaUrl('Project') ?: asset('content/images/logo.svg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                alt="{{ $project->title }}" class="w-100 h-100">
                        </div>
                        <h3 class="fs-5 text-white-color fw-bold mt-2">
                            {{ $project->title }}
                        </h3>
                        <p class="mb-0 step-description m-auto fs-8 mx-4 text-white-color">
                            {{ Illuminate\Support\Str::limit(strip_tags($project->home_description ?? $project->description ?? ''), 220) }}
                        </p>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ url('/projects/education?page_id=20&project_id=5') }}"
                                class="btn btn-light rounded-pill">
                                View Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Last column (2 projects) --}}
            @if ($key == 3)
                <div class="col-xl-4 col-lg-4 col-md-6 mt-lg-0 mt-3">
                    <div class="row w-100">
            @endif
            <div class="col-md-12 col-sm-6 @if ($key > 3) mt-md-3 mt-sm-0 mt-3 @endif">
                <div class="step">
                    <div class="step-content text-center">
                        <div class="@if ($key == 3) scaleX-rtl @endif">
                            <div class="image-box">
                                <img src="{{ $project->getFirstMediaUrl('Project') ?: asset('content/images/logo.svg') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                    alt="{{ $project->title }}" class="w-100 h-100">
                            </div>
                        </div>
                        <h3 class="fs-5 text-main-color fw-bold mt-2">
                            {{ $project->title }}
                        </h3>
                        <p class="mb-0 step-description fs-8 m-auto">
                            {{ Illuminate\Support\Str::limit(strip_tags($project->home_description ?? $project->description ?? ''), 140) }}
                        </p>
                    </div>
                </div>
            </div>
            @if ($key == 4)
    </div>
    </div>
    @endif
    @endif
    @endforeach
    </div>

    <div class="d-flex justify-content-center mt-md-4 mt-3">
        <button class="btn btn-solid-main" onclick="window.open('https://www.google.com', '_blank')">
            <span>
                Learn More
            </span>
            <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
        </button>
    </div>
    </div>
    </section>
    <!-- End Projects Section -->
    @if ($educationPages->count() > 0)
        <!-- Start Education Section -->
        <section id="education-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="texts-data d-flex flex-column">
                    <h5 class="global-title text-white-color">
                        Our Education
                    </h5>
                    <div class="under-title-vector text-white-color">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    <p class="global-description text-white-color pt-0 mt-1">
                        Get every thing about AI when reading Article and News
                    </p>
                </div>
                <div class="row mt-4 mx-0">
                    @foreach ($educationPages as $education)
                    @php
                        $eduMedia = $education->getFirstMedia('home_image');
                        $eduImgUrl = $eduMedia
                            ? request()->getSchemeAndHttpHost() . '/storage/' . $eduMedia->id . '/' . $eduMedia->file_name
                            : asset('content/images/logo.svg');
                    @endphp
                        <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                            <div class="clipped-border-card h-100">
                                <div class="clipped-item-card border h-100">
                                    <div
                                        class="d-flex flex-column justify-content-between gap-4 item-content h-100 position-relative">
                                        <div class="item-overlay position-absolute"></div>
                                        <img src="{{ $eduImgUrl }}" alt="{{ $education->name }}"
                                            class="position-absolute w-100 h-100 object-fit-cover top-0 start-0"
                                            style="z-index:0; opacity:0.15;"
                                            onerror="this.style.display='none'">
                                        <div>
                                            <h4 class="text-main-color text-uppercase item-title">
                                                {{ $education->name }}
                                            </h4>
                                            <p class="text-black-50 fs-5-2 mt-4 description text-align-justify">
                                                {{ Illuminate\Support\Str::limit(strip_tags($education->home_description ?? $education->description ?? ''), 300) }}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between gap-3 flex-wrap z-2">
                                            <div
                                                class="box-icon d-flex justify-content-center align-items-center arrow-bg mb-0">
                                                <!-- <img src="./images/home/cases/arrow.svg" alt="arrow"> -->
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15.667 18.7188H3.66699C2.01014 18.7188 0.666992 17.3757 0.666992 15.7188V3.71875C0.666992 2.0619 2.01014 0.71875 3.66699 0.71875H15.667C17.3239 0.71875 18.667 2.0619 18.667 3.71875V15.7188C18.667 17.3757 17.3239 18.7188 15.667 18.7188ZM14.667 6.13296L10.0812 10.7188H11.667C12.2193 10.7188 12.667 11.1665 12.667 11.7188C12.667 12.271 12.2193 12.7188 11.667 12.7188H7.66699C7.11471 12.7188 6.66699 12.271 6.66699 11.7188V7.71875C6.66699 7.16647 7.11471 6.71875 7.66699 6.71875C8.21929 6.71875 8.66699 7.16647 8.66699 7.71875V9.30455L13.2528 4.71875H11.667C11.1147 4.71875 10.667 4.27103 10.667 3.71875C10.667 3.16646 11.1147 2.71875 11.667 2.71875H15.667C16.2193 2.71875 16.667 3.16647 16.667 3.71875V7.71875C16.667 8.27105 16.2193 8.71875 15.667 8.71875C15.1147 8.71875 14.667 8.27105 14.667 7.71875V6.13296Z"
                                                        fill="#fff" />
                                                </svg>
                                            </div>
                                            <a href="{{ url(app()->getLocale() . '/education/' . $education->slug . '?page_id=' . $education->id) }}"
                                                class="text-main-color d-flex gap-3 align-items-center text-uppercase fs-8 apply-now-btn">
                                                See More
                                                <span>
                                                    <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                                                        class="scaleX-rtl" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0.292893 1.01164C0.683417 0.621119 1.31658 0.621119 1.70711 1.01164L7.70711 7.01164C8.09763 7.40217 8.09763 8.03533 7.70711 8.42586L1.70711 14.4259C1.31658 14.8164 0.683417 14.8164 0.292893 14.4259C-0.0976311 14.0353 -0.0976311 13.4022 0.292893 13.0116L5.58579 7.71875L0.292893 2.42586C-0.0976311 2.03533 -0.0976311 1.40217 0.292893 1.01164Z"
                                                            fill="#000" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="d-flex justify-content-center mt-md-4 mt-3">
                    <button class="btn btn-solid-main"onclick="window.open('https://www.google.com', '_blank')">
                        <span>
                            See More
                        </span>
                        <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                    </button>
                </div> --}}
            </div>
        </section>
        <!-- End Education Section -->
    @endif

    @if (count($solutions) > 0)
        <!-- Start Solutions Section -->
        <section id="solutions-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="texts-data d-flex flex-column">
                    <h5 class="global-title">
                        Our Solutions
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    <p class="description text-align-justify mt-1">
                        Explore our innovative solutions tailored for the education and business sectors. We're here to
                        support your growth and success.
                    </p>
                </div>

                <div class="row g-3 mt-md-4 mt-3">
                    @foreach ($solutions as $pageId => $group)
                        <div class="col-md-6 mt-3">
                            <h3 class="type-title">{{ $group->first()->Page->name ?? '' }}</h3>
                            <div class="duties-items-content pt-3">
                                @foreach ($group as $solution)
                                @php
                                    $solMedia = $solution->getFirstMedia('Solution');
                                    $solImgUrl = $solMedia
                                        ? request()->getSchemeAndHttpHost() . '/storage/' . $solMedia->id . '/' . $solMedia->file_name
                                        : asset('content/images/logo.svg');
                                @endphp
                                    <div class="duties-item-card">
                                        <div class="duties-item-img">
                                            <img src="{{ $solImgUrl }}" loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/logo.svg') }}';"
                                                alt="{{ $solution->title }}">
                                        </div>
                                        <div class="duties-items-details">
                                            <h4 class="duties-item-title">
                                                {{ $solution->title }}
                                            </h4>
                                            <p class="duties-item-description">
                                                {{ Illuminate\Support\Str::limit(strip_tags($solution->home_description ?? $solution->description ?? ''), 120) }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($group->first()->Page)
                            <div class="duties-show-more-wrap">
                                <a href="{{ url(app()->getLocale() . '/solutions/' . $group->first()->Page->slug . '/' . $group->first()->Page->id . '?solution_id=' . $group->first()->id) }}"
                                    class="duties-show-more-btn">
                                    <span class="duties-show-more-icon">
                                        <svg class="duties-show-more-arrow" width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"
                                                fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <span class="duties-show-more-label">{{ app()->getLocale() == 'ar' ? 'عرض المزيد' : 'Show More' }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Solutions Section -->
    @endif

    @if ($techItems->count() > 0)
        <!-- Start Technology Section -->
        <section id="technology-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="texts-data d-flex flex-column">
                    <h5 class="global-title">
                        {{ $techParent->name ?? 'Our Technology' }}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    @if($techParent && $techParent->home_description)
                    <p class="global-description pt-0 mt-1">
                        {{ $techParent->home_description }}
                    </p>
                    @endif
                </div>
                <div class="articles row d-flex flex-nowrap overflow-hidden mt-4 mx-0">
                    @foreach ($techItems as $techItem)
                    @php
                        $techMedia = $techItem->getFirstMedia('home_image');
                        $techImgUrl = $techMedia
                            ? request()->getSchemeAndHttpHost() . '/storage/' . $techMedia->id . '/' . $techMedia->file_name
                            : asset('content/images/logo.svg');
                    @endphp
                        <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                            <article>
                                <div class="article-img w-100 mb-3">
                                    <img src="{{ $techImgUrl }}" loading="lazy"
                                        class="w-100 h-100 shadow-sm"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/logo.svg') }}';"
                                        alt="{{ $techItem->name }}">
                                </div>
                                <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                                    <div>
                                        <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                            {{ $techItem->name }}
                                        </h5>
                                        <p class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                            {{ Illuminate\Support\Str::limit(strip_tags($techItem->home_description ?? $techItem->description ?? ''), 300) }}
                                        </p>
                                    </div>
                                    <a href="{{ url(app()->getLocale() . '/technology/' . $techItem->slug . '?page_id=' . $techItem->id) }}"
                                        class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                        <span class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z" fill="#000" />
                                            </svg>
                                        </span>
                                        <span class="text-main-color">{{ app()->getLocale() == 'ar' ? 'اقرأ المزيد' : 'Read more' }}</span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="scroll-btns d-flex align-items-center justify-content-center gap-2 mt-4">
                    <button class="scroll-left" id="prev" aria-label="Scroll Left" title="Scroll Left">
                        <span class="arrow-icon scroll rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z" fill="#000" />
                            </svg>
                        </span>
                    </button>
                    <button class="scroll-right" id="next" aria-label="Scroll Right" title="Scroll Right">
                        <span class="arrow-icon scroll rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z" fill="#000" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </section>
        <!-- End Technology Section -->
    @endif

    <!-- Start Check -->
    @if($testingItems->count() > 0)
    <section id="check-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="global-title">{{ $testingParent->name ?? 'Testing' }}</h2>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                </div>
                @if($testingParent && $testingParent->home_description)
                <div>
                    <p>{{ $testingParent->home_description }}</p>
                </div>
                @endif
            </div>
            <div class="row g-4 mt-3">
                @foreach($testingItems as $testItem)
                @php
                    $testIcon = $testItem->getFirstMedia('icon');
                    $testIconUrl = $testIcon
                        ? request()->getSchemeAndHttpHost() . '/storage/' . $testIcon->id . '/' . $testIcon->file_name
                        : asset('content/images/not-found/no-image.svg');
                @endphp
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <a href="{{ url(app()->getLocale() . '/testing/' . $testItem->slug . '?page_id=' . $testItem->id) }}"
                        class="text-decoration-none">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 align-items-center">
                                    <img src="{{ $testIconUrl }}" alt="{{ $testItem->name }}"
                                        class="card-icon" style="width:22px;height:22px;object-fit:contain;"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}'">
                                    <h5 class="card-title">{{ $testItem->name }}</h5>
                                </div>
                                <p class="card-text">
                                    {{ Illuminate\Support\Str::limit(strip_tags($testItem->home_description ?? $testItem->description ?? ''), 120) }}
                                </p>
                            </div>
                            <img src="{{ $testIconUrl }}" alt="" class="card-icon"
                                style="width:60px;height:60px;object-fit:contain;opacity:0.15;"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}'">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="mt-4 note">
                <h6 class="mb-2">
                    <i class="fa-solid fa-pen-to-square card-icon"></i>
                    {{ app()->getLocale() == 'ar' ? 'ملاحظة' : 'Note' }}
                </h6>
                <p>
                    @if($testingParent && $testingParent->description)
                        {{ $testingParent->description }}
                    @else
                        In case of technical problems or power cuts, the test will be resumed where it stopped while safely keeping the remaining time, and test takers are not allowed to leave the room unless they have waited for at least 30 minutes. Then the proctor will fill out the status report and then the test taker shall decide whether to resume the test or repeat.
                    @endif
                </p>
            </div>
        </div>
    </section>
    @endif
    <!-- End Check -->

    <!-- Start Doc Validation Section -->
    @if($homeDocValidation)
    <section id="doc-validation-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    {{ $homeDocValidation->title ?? '' }}
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="global-description pt-0 mt-1">
                    {{ $homeDocValidation->description ?? '' }}
                </p>
            </div>
        </div>
        <div id="item-list" class="py-md-5 py-3 mt-md-4 mt-3">
            <div class="container mx-auto">
                <div class="row g-3 mx-0">
                    @foreach($homeDocValidation->items as $idx => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative doc-validation-card mb-md-4 mb-5">
                            <div class="doc-icon-wrap">
                                <img alt="{{ $item->title }}" class="doc-icon"
                                    src="{{ $item->image ? asset('/storage/' . $item->image) : asset('content/images/pages/home-page/doc-validation/1.svg') }}"
                                    onerror="this.src='{{ asset('content/images/pages/home-page/doc-validation/1.svg') }}'">
                            </div>
                            <h4 class="mt-3 mb-3 title text-white-color position-relative">
                                {{ $item->title }}
                            </h4>
                            <div class="d-flex flex-column fs-6 lh-base mb-0 gap-3">
                                @foreach($item->details as $detail)
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    {{ $detail->title }}
                                </li>
                                @endforeach
                            </div>
                            <div class="number position-absolute"> {{ $idx + 1 }} </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        @if($homeDocValidation->button_url)
        <div class="container mx-auto">
            <div class="d-flex justify-content-center mt-md-4 mt-3">
                <button class="btn btn-solid-main" onclick="window.open('{{ $homeDocValidation->button_url }}', '_blank')">
                    <span>{{ $homeDocValidation->button_text ?? 'See More' }}</span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
        @endif
    </section>
    @endif
    <!-- End Doc Validation Section -->

    @if ($findusItems->count() > 0)
        <!-- Start Stats Section -->
        <section id="stats-section" class="section-bundries">
            <div class="container mx-auto">
                <div class="texts-data d-flex flex-column">
                    <h5 class="global-title">
                        {{ $findusParent->name ?? 'Find Us' }}
                    </h5>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                    @if($findusParent && $findusParent->home_description)
                    <p class="description text-align-justify">
                        {{ $findusParent->home_description }}
                    </p>
                    @endif
                </div>
                <div class="row justify-content-start w-100 mt-3 g-3">
                    @foreach ($findusItems as $index => $findusItem)
                    @php
                        $findusImg = $findusItem->getFirstMedia('home_image');
                        $findusImgUrl = $findusImg
                            ? request()->getSchemeAndHttpHost() . '/storage/' . $findusImg->id . '/' . $findusImg->file_name
                            : asset('content/images/not-found/no-image.svg');
                    @endphp
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ url(app()->getLocale() . '/find-us/' . $findusItem->slug . '?page_id=' . $findusItem->id) }}"
                                class="text-decoration-none">
                                <div class="stats-card p-md-4 p-3">
                                    <p class="counter-text">
                                        <span class="count">{{ $index + 1 }}</span>
                                    </p>
                                    <p class="label-text">
                                        {{ $findusItem->name }}
                                    </p>
                                    <div class="image-box">
                                        <img src="{{ $findusImgUrl }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="{{ $findusItem->name }}" class="w-100 h-100">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Stats Section -->
    @endif

    <!-- Start Find Us Map Section -->
    @if(count($countries) > 0)
    <section id="join-us-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column mb-4">
                <h5 class="global-title">{{ app()->getLocale() == 'ar' ? 'مواقعنا' : 'Our Locations' }}</h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
            </div>

            @if($findusItems->count() > 0)
            @php
                $mapColors = ['#990000','#c0392b','#e63946','#a93226','#d4722f','#e8a838','#7a1010','#b5451b'];
                $colorMap = [];
                foreach($findusItems as $i => $fi) {
                    $colorMap[$fi->id] = $mapColors[$i % count($mapColors)];
                }
            @endphp
            <div class="d-flex flex-wrap gap-3 mb-4">
                @foreach($findusItems as $i => $fi)
                <div class="d-flex align-items-center gap-2">
                    <span style="width:14px;height:14px;border-radius:50%;background:{{ $mapColors[$i % count($mapColors)] }};display:inline-block;"></span>
                    <span style="font-size:13px;font-weight:600;">{{ $fi->name }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        {{-- World Map --}}
        <div class="world-map">
            @foreach($countries->filter(function($c){ return $c->lat && $c->lng; }) as $loc)
            @php
                $dotLeft = round((floatval($loc->lng) + 180) / 360 * 100, 2);
                $dotTop  = round((90 - floatval($loc->lat)) / 180 * 100, 2);
                $dotColor = (isset($colorMap) && isset($colorMap[$loc->page_id])) ? $colorMap[$loc->page_id] : '#990000';
            @endphp
            <div class="map-dot dynamic-dot" style="left:{{ $dotLeft }}%;top:{{ $dotTop }}%;background-color:{{ $dotColor }};">
                <div class="dot-popup">
                    <strong>{{ $loc->name }}</strong>
                    @if($loc->address)<span>{{ $loc->address }}</span>@endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- Contact Cards --}}
        <div class="container mt-5">
            <div class="row gy-4 justify-content-center">
                <div class="col-md-3 col-sm-6">
                    <div class="contact-card text-center">
                        <i class="bi bi-chat"></i>
                        <h5>{{ app()->getLocale() == 'ar' ? 'الدردشة مع المبيعات' : 'Chat to sales' }}</h5>
                        <p>{{ app()->getLocale() == 'ar' ? 'تحدث مع فريقنا الودود.' : 'Speak to our friendly team.' }}</p>
                        <a href="mailto:sales@nen.com" class="email-link">sales@nen.com</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-card text-center">
                        <i class="bi bi-chat-left-dots"></i>
                        <h5>{{ app()->getLocale() == 'ar' ? 'الدردشة مع الدعم' : 'Chat to support' }}</h5>
                        <p>{{ app()->getLocale() == 'ar' ? 'نحن هنا للمساعدة.' : 'We\'re here to help.' }}</p>
                        <a href="mailto:support@nen.com" class="email-link">support@nen.com</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-card text-center">
                        <i class="bi bi-geo-alt"></i>
                        <h5>{{ app()->getLocale() == 'ar' ? 'زورنا' : 'Visit us' }}</h5>
                        <p>{{ app()->getLocale() == 'ar' ? 'زر مقرنا الرئيسي.' : 'Visit our office HQ.' }}</p>
                        <a href="https://goo.gl/maps/" class="map-link" target="_blank">{{ app()->getLocale() == 'ar' ? 'عرض على خرائط جوجل' : 'View on Google Maps' }}</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-card text-center">
                        <i class="bi bi-telephone"></i>
                        <h5>{{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Call us' }}</h5>
                        <p>{{ app()->getLocale() == 'ar' ? 'من الاثنين إلى الجمعة، 8 ص - 5 م.' : 'Mon-Fri from 8am to 5pm.' }}</p>
                        <a href="tel:+1555000000" class="phone-link">+1 (555) 000-0000</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End Find Us Map Section -->
    <hr>
    @if (count($countries) > 0)
        <!-- Start Find Us Section -->
        <section id="find-us-section" class="section-bundries">
            <div class="container mx-auto">

                <!-- Locations Section -->
                <div class="row location-section justify-content-center">
                    @foreach ($countries as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="location-item border-0">
                                <h5 class="country-name">{{ $item->state->country->name }}</h5>
                                <p class="country-location">{{ $item->address }}</p>
                                <div class="country-flag-wrap">
                                    <img src="{{ $item->state->country->getFirstMediaUrl('flag') ?: asset('content/images/logo.svg') }}" loading="lazy"
                                        onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                        class="country-flag shadow-sm" alt="{{ $item->state->country->name }} Flag">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="row justify-content-center">
                <button class="btn btn-solid-main w-auto">CONTACT NOW</button>
            </div>
        </section>
        <!-- End Find Us Section -->
    @endif
    <!-- Start Contact Section -->
    <!-- <section id="contact-us-section" class="section-bundries">
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="texts-data d-flex flex-column">
                                        <h5 class="global-title">
                                            Contact Us
                                        </h5>
                                        <div class="under-title-vector">
                                            <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                                        </div>
                                        <p class="global-description pt-0 mt-1">
                                            If you have any questions, suggestions, or complaints, feel free to contact us.
                                        </p>
                                    </div>

                                    <form id="contactForm" class="contact-form mt-md-4 mt-3">
                                        <fieldset>
                                            <label>Reason for Contact</label>
                                            <div class="radio-group mt-2">
                                                <label>
                                                    <input type="radio" name="contactReason" value="inquiry" required>
                                                    Inquiry
                                                </label>
                                                <label>
                                                    <input type="radio" name="contactReason" value="complaint" required>
                                                    Complaint
                                                </label>
                                                <label>
                                                    <input type="radio" name="contactReason" value="suggestion" required>
                                                    Suggestion
                                                </label>
                                                <div class="error-message" data-error="contactReason"></div>
                                            </div>
                                        </fieldset>

                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" id="fullName" name="fullName" required minlength="3">
                                            <div class="error-message" data-error="fullName"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" required>
                                            <div class="error-message" data-error="email"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="phoneNumber">Phone Number</label>
                                            <input type="tel" id="phoneNumber" name="phoneNumber" required>
                                            <div class="error-message" data-error="phoneNumber"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" name="message" required minlength="3"></textarea>
                                            <div class="error-message" data-error="message"></div>
                                        </div>

                                        <button type="submit" class="btn btn-solid-main">Send</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-image rounded h-100">
                                        <img src="https://media.voltron.alhurra.com/Drupal/01live-126/styles/sourced/s3/2019-12/47FA9734-FD85-4ED5-A492-290A0218B61B.jpg?itok=1UzdSy4o"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="about-img" class="rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
    <!-- End Contact Section -->
    <!-- Start Join our Team -->
    @if($joinUs)
    <section id="join-our-team" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data align-items-center">
                <h1>
                    {{ $joinUs->page->name }}
                </h1>
                <p>
                    {{ $joinUs->page->description }}
                </p>
            </div>
            <div class="row justify-content-center align-items-center mt-5 gap-4">
                @foreach($joinUs->cards as $card)
                @php
                    $cardMedia = $card->getFirstMedia('home_image');
                    $cardImgUrl = $cardMedia
                        ? request()->getSchemeAndHttpHost() . '/storage/' . $cardMedia->id . '/' . $cardMedia->file_name
                        : asset('content/images/pages/home-page/hero-home-page.webp');
                @endphp
                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <div class="content">
                        <p>{{ $card->name }}</p>
                        <p>{{ $card->description }}</p>
                    </div>
                    <div class="cover">
                        <img class="w-100 h-100"
                            src="{{ $cardImgUrl }}"
                            alt="{{ $card->name }}"
                            onerror="this.src='{{ asset('content/images/pages/home-page/hero-home-page.webp') }}'">
                        <p>{{ $card->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- End Join our Team -->
    @if (count($blogs) > 0)
        <!-- Start Blogs -->
        <section id="blogs-section" class="section-bundries">
            <div class="container mx-auto">
                <div>
                    <h2 class="global-title">Our Blogs</h2>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                </div>
                <div class="blogs d-flex align-item-center flex-nowrap gap-2 overflow-hidden px-2 mt-4">
                    @foreach ($blogs as $blog)
                        <div class="card border-0 col-12 col-md-6 col-lg-4">
                            <a href="#" class="text-black text-decoration-none">
                                <div class="img-container">
                                    <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                        src="{{ $blog->banner ? asset('/storage/' . $blog->banner) : asset('content/images/logo.svg') }}"
                                        onerror="this.onerror=null;this.src=`{{ asset('content/images/logo.svg') }}`;"
                                        alt="A fashionista's guide to wanderlust">

                                </div>
                                <div class="card-body d-flex flex-column  justify-content-between">
                                    <div class="d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <div
                                                class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                                <span class="Publication-date d-flex gap-2 align-items-center">
                                                    <svg class="no-rotate" fill="#000000" width="18"
                                                        viewBox="0 0 35 35" data-name="Layer 2"
                                                        id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                            </path>
                                                            <path
                                                                d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                            </path>
                                                            <path
                                                                d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                            </path>
                                                            <path
                                                                d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    {{ $blog->created_at->format('j F Y') }} </span>
                                                <span class="read-time d-flex gap-2 align-items-center">
                                                    <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                        xml:space="preserve">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                            <g>
                                                                <g>
                                                                    <polygon
                                                                        points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                                    </polygon>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    {{ $blog->created_at->diffForHumans() }} </span>
                                            </div>
                                            <h4 class="card-title text-truncate fs-3 mb-1">{{ $blog->title }}
                                            </h4>
                                            <div class="description">
                                                {{-- <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                                    {!! Illuminate\Support\Str::limit($blog->content, 1000, '...') !!}
                                                </p> --}}
                                            </div>
                                        </div>

                                        <div class="profile justify-content-between d-flex align-items-center gap-2">
                                            <div class="name d-flex gap-2">
                                                <svg width="15" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                Lifestyle
                                            </div>
                                            <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                        fill="#000000"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="scroll-btns d-flex align-items-center justify-content-center gap-2 mt-4">
                    <button class="scroll-left" id="prevBlog" aria-label="Scroll Left" title="Scroll Left">
                        <span
                            class="arrow-icon scroll rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                    fill="#000" />
                            </svg>
                        </span>
                    </button>
                    <button class="scroll-right" id="nextBlog" aria-label="Scroll Right" title="Scroll Right">
                        <span
                            class="arrow-icon scroll rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                    fill="#000" />
                            </svg> </button>
                </div>
                <button class="btn btn-solid-main m-auto mt-4"
                    onclick="window.location.href='{{ route('blogs.index') }}'">
                    See More
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </section>
        <!-- End Blogs -->
    @endif

    <script>
        // articles carousel
        const articlesWrapper = document.querySelector('.articles');
        const articles = document.querySelectorAll('.articles article');
        const nextButton = document.getElementById('next');
        const prevButton = document.getElementById('prev');
        const articleWidth = articles[0].clientWidth;

        nextButton.addEventListener('click', () => {
            articlesWrapper.scrollBy({
                left: articleWidth,
                behavior: 'smooth',
            });
        });

        prevButton.addEventListener('click', () => {
            articlesWrapper.scrollBy({
                left: -articleWidth,
                behavior: 'smooth',
            });
        });

        // Blogs carousel

        const blogContainer = document.querySelector('.blogs');
        const prevBlog = document.getElementById('prevBlog');
        const nextBlog = document.getElementById('nextBlog');

        const scrollAmount = 300;

        prevBlog.addEventListener('click', () => {
            blogContainer.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        nextBlog.addEventListener('click', () => {
            blogContainer.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>
@endsection

@section('websiteScript')
@endsection
