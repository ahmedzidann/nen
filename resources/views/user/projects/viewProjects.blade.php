@extends('user.layout.master')
@section('parent_page_name', 'Projects')
@section('page_name', ucwords($slug))
@section('websiteStyle')

@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')

<!-- Start Edu 4 Me Section -->
<div id="edu4me-section" class="about_content">
    <div class="container">
        <div class="text-start">
            {{-- <p class="sub-title">
                    {{ $page->name }}
            </p> --}}
            <h5 class="global-title">
                {{ $projects->title }}
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>

        <div class="tabs-items mt-md-4 mt-3">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($tabs as $tab)
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn {{ $loop->first ? 'active' : '' }}"
                        id="pills-tab-{{ $tab->slug }}" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ $tab->slug }}" type="button" role="tab"
                        aria-controls="pills-{{ $tab->slug }}" aria-selected="false"
                        tabindex="-1">{{ $tab->name }}
                    </button>

                    {{-- <button @if ($tab['slug'] == 'about') class="nav-link proj_bttn active" @else class="nav-link proj_bttn" @endif id="pills-{{$tab['slug']}}-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$tab['slug']}}" type="button" role="tab"
                    aria-controls="pills-{{$tab['slug']}}"
                    aria-selected="true">{{ ucfirst($tab['name'][App::getLocale()]) }} </button> --}}
                </li>
                @endforeach
            </ul>

            <hr class="custom-hr">
            <div class="tab-content mt-md-4 mt-3 text-start" id="pills-tabContent">
                <!-- Start About Tab -->

                <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                    aria-labelledby="pills-about-tab" tabindex="0">
                    @if (!empty($projects->getAbout->count()))

                    @foreach ($projects->getAbout as $about)
                    <div class="who-us">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-7 order-md-2">
                                <div class="who-us-titles text-start">
                                    <h5 class="line-before">
                                        {{ TranslationHelper::translateWeb(ucfirst('Who we do for you')??'') }}
                                    </h5>
                                    @if (!empty($about->shortDescription))
                                    <p id="shortDescription"
                                        class="short-description my-4 lh-lg text-muted">
                                        {!! $about->shortDescription !!}
                                    </p>
                                    @endif
                                    @if (!empty($about->description))
                                    <p id="fullDescription"
                                        class="full-description my-4 lh-lg text-muted {{ strlen($about->description) >= 400 ? 'p_clamp_4' : '' }}">
                                        {{ html_entity_decode(strip_tags($about->description)) }}
                                    </p>
                                    @endif

                                    @if (strlen($about->description) >= 400)
                                    <a href="#" onclick="toggleDescription2(this)" id="learnMoreBtn"
                                        class="btn_detail mt-3">
                                        {{ TranslationHelper::translateWeb(ucfirst('Show More')??'') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-5 order-md-1">
                                <div class="image-box">
                                    <img src="{{ asset($about->getFirstMediaUrl('AboutTabs')) }}"
                                        class="img-fluid" loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="AboutTabs">
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($loop->first)
                    @if ($projects->getStatistics->count() > 0)
                    <div id="investors-statisctics-section"
                        class="edu-statisctics mt-md-5 mt-3 px-md-4 px-3 py-md-5 py-4">
                        <div
                            class="statisctic-items d-flex align-items-center justify-content-around gap-3 flex-wrap">

                            @foreach ($projects->getStatistics as $statistic)
                            <div
                                class="statisctic-item d-flex flex-column align-items-center justify-content-center gap-3">
                                <img class="image-icons"
                                    src="{{ $statistic->getFirstMediaUrl('statistics') }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="vector1">
                                <h6
                                    class="title text-secondary-color fs-5 fw-semibold text-uppercase">
                                    {{ $statistic->value }}+
                                </h6>
                                <p class="desc text-white-color fs-3">
                                    {{ $statistic->translate('title') }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif

                    <hr class="custom-hr mt-md-5 mt-4">
                    <div class="second-tabs-items">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active tab_active" id="chalange_btn_tab"
                                    data-bs-toggle="pill" data-bs-target="#challang_tab" type="button"
                                    role="tab" aria-controls="challang_tab" aria-selected="true">
                                    {{ TranslationHelper::translateWeb(ucfirst('Challenge')??'') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn_tabs" id="solution_btn_tab" data-bs-toggle="pill"
                                    data-bs-target="#solution_tab" type="button" role="tab"
                                    aria-controls="solution_tab" aria-selected="false">
                                    {{ TranslationHelper::translateWeb(ucfirst('Solution')??'') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn_tabs" id="result_btn_tab" data-bs-toggle="pill"
                                    data-bs-target="#result_tab" type="button" role="tab"
                                    aria-controls="result_tab" aria-selected="false">
                                    {{ TranslationHelper::translateWeb(ucfirst('Result')??'') }}
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content text-start" id="pills-tabs">
                            <div class="tab-pane fade show active" id="challang_tab" role="tabpanel"
                                aria-labelledby="chalange_btn_tab" tabindex="0">
                                <div class="who_us">
                                    <div class="who_us_titel">
                                        @if (!empty($about['challenge']))
                                        <p class="text-muted my-1">
                                            {{ $about['challenge'] }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if (!empty($about['solution']))
                            <div class="tab-pane fade" id="solution_tab" role="tabpanel"
                                aria-labelledby="solution_btn_tab" tabindex="0">
                                {{ $about['solution'] }}
                            </div>
                            @endif
                            @if (!empty($about['result']))
                            <div class="tab-pane fade" id="result_tab" role="tabpanel"
                                aria-labelledby="result_btn_tab" tabindex="0">
                                {{ $about['result'] }}
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @else
                    @include('user.layout.includes.no-data')

                    @endif
                </div>


                <!-- End About Tab -->

                <!-- Start Programs Tab -->
                <div class="tab-pane fade" id="pills-program" role="tabpanel" aria-labelledby="pills-program-tab"
                    tabindex="0">
                    <div class="all-programs-cards row g-3">
                        @forelse($projects->getProgram as $program)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="program-card {{ $loop->first ? '' : '' }}">
                                <!-- Apply hover-effect class to first item -->
                                <div class="items-card">
                                    <div class="image-box-card">
                                        <img src="{{ asset($program->getFirstMediaUrl('firstImage')) }}"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="vector">
                                    </div>
                                    <h3 class="title mt-3">
                                        {{ $program->title }}
                                    </h3>
                                    <p
                                        class="description {{ strlen($program->description) >= 200 ? 'p_clamp' : '' }}">
                                        {{ html_entity_decode(strip_tags($program->description)) }}
                                    </p>
                                    @if (strlen($program->description) >= 200)
                                    <a onclick="toggleDescription(this)" class="read_more">
                                        {{ TranslationHelper::translateWeb(ucfirst('Show More')??'') }}
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    @endif

                                    <div class="icons-data">
                                        <a
                                            href="{{ route('projects.downloadprogrampdf', $program->id) }}">
                                            <p class="icon-item">
                                                <img src="{{ asset('content') }}/images/small_icon/archive-book.png"
                                                    loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                    alt="archive">
                                                <span>
                                                    {{ TranslationHelper::translateWeb(ucfirst('Reference')??'') }}
                                                </span>
                                            </p>
                                        </a>
                                        <a href="https://{{ $program->url }}" class="card_prgram"
                                            target="_blank">
                                            <p class="icon-item">
                                                <img src="{{ asset('content') }}/images/small_icon/global.png"
                                                    loading="lazy"
                                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                    alt="vector">
                                                <span>
                                                    {{ TranslationHelper::translateWeb(ucfirst('Website')??'') }}
                                                </span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @include('user.layout.includes.no-data')
                        @endforelse


                    </div>
                </div>
                <!-- End Programs Tab -->

                <!-- Start Help Tab -->
                <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab"
                    tabindex="0">
                    <div id="custom-accordion">
                        <div class="accordion accordion-help" id="accordionHelp">
                            @forelse($projects->getHelp as $index => $helpItem)
                            <div class="accordion-item shadow-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#help-collapseOne-{{ $helpItem['id'] }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="help-collapseOne-{{ $helpItem['id'] }}">
                                        {{ $helpItem['title'] }}
                                    </button>
                                </h2>
                                <div id="help-collapseOne-{{ $helpItem['id'] }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="help-headingOne" data-bs-parent="#accordionHelp">
                                    <div class="accordion-body">
                                        {!! $helpItem['description'] !!}
                                    </div>
                                </div>
                            </div>
                            @empty
                            @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- End Help Tab -->

                <!-- Start Join Us Tab -->
                <div class="tab-pane fade" id="pills-join-us" role="tabpanel" aria-labelledby="pills-join-us-tab"
                    tabindex="0">

                    <div class="edu-statisctics rounded-3 overflow-hidden p-4">
                        <h3 class="line-before text-white-color mb-3">
                            Register Steps
                        </h3>
                        <div class="join-steps">
                            <div class="join-step d-flex gap-2 align-items-center mb-3 text-white-color">
                                <img src="{{ asset('content') }}/images/small_icon/share.png" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="share">



                            </div>
                            @foreach ($projects->getJoinus->where('type', 'register') as $joinus)
                            <div class="join-step d-flex gap-2 align-items-center mb-3 text-white-color">
                                <img src="{{ asset('content') }}/images/small_icon/share.png" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="share">
                                @if (!empty($joinus['description']))
                                <p class="">
                                    {!! $joinus['description'] !!}
                                </p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="custom-hr mt-md-5 mt-4">
                    <div class="terms-section">
                        <div class="text-start">
                            <h5 class="global-title fw-semibold">
                                Terms and Conditions
                            </h5>
                            <div class="under-title-vector">
                                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="vector">
                            </div>
                        </div>
                        <div class="flex_jon mt-md-4 mt-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <ul class="terms_ul">
                                        @foreach ($projects->getJoinus->where('type', 'terms') as $joinus)
                                        @if (!empty($joinus['description']))
                                        <li class="mb-2">
                                            <p class="m-0 p-0">
                                                {!! $joinus['description'] !!}
                                            </p>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <div class="terms_img">
                                        @if ($projects->getJoinus->first())
                                        <img src="{{ asset($projects->getJoinus->first()->getFirstMediaUrl('JoinusTerms')) }}"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="vector">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Join Us Tab -->

                <!-- Start Archive Tab -->
                <div class="tab-pane fade" id="pills-archive" role="tabpanel" aria-labelledby="pills-archive-tab"
                    tabindex="0">

                    <div class="documents-sections">
                        <div class="row g-3">
                            @forelse($projects->getDocument as $doc)
                            @if ($doc->type == 'pdf')
                            <div class="col-xl-4 col-md-6 col-12">
                                <div id="hovering-top-border-card" class="document-content">
                                    <div
                                        class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                        <div
                                            class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-3">
                                            <svg width="56" height="64" viewBox="0 0 28 32"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.60623 24.8485C8.91734 24.6845 9.25734 24.5245 9.62623 24.3725C9.31461 24.7906 8.98089 25.1951 8.62623 25.5845C8.00401 26.2585 7.51957 26.6165 7.21512 26.7285C7.18985 26.7381 7.16386 26.7461 7.13734 26.7525C7.11516 26.7248 7.09583 26.6953 7.07957 26.6645C6.95512 26.4445 6.95957 26.2325 7.16845 25.9445C7.40401 25.6145 7.87734 25.2365 8.60623 24.8485ZM14.0618 21.5545C13.7973 21.6045 13.5351 21.6545 13.2707 21.7105C13.6624 21.0198 14.0329 20.3195 14.3818 19.6105C14.7331 20.1963 15.1112 20.7688 15.5151 21.3265C15.0329 21.3905 14.5462 21.4665 14.0618 21.5545ZM19.6729 23.4325C19.3277 23.1819 19.0046 22.9078 18.7062 22.6125C19.2129 22.6225 19.6707 22.6565 20.0662 22.7205C20.7707 22.8345 21.1018 23.0145 21.2173 23.1385C21.2538 23.1731 21.2744 23.2188 21.2751 23.2665C21.2673 23.4076 21.2216 23.5448 21.1418 23.6665C21.097 23.7639 21.025 23.8493 20.9329 23.9145C20.887 23.9398 20.833 23.9504 20.7796 23.9445C20.5796 23.9385 20.2062 23.8125 19.6729 23.4325ZM14.7285 13.9405C14.6396 14.4285 14.4885 14.9885 14.284 15.5985C14.2087 15.3701 14.1427 15.1393 14.0862 14.9065C13.9173 14.2005 13.8929 13.6465 13.984 13.2625C14.0685 12.9085 14.2285 12.7665 14.4196 12.6965C14.5221 12.6558 14.6306 12.6289 14.7418 12.6165C14.7707 12.6765 14.804 12.8005 14.8129 13.0125C14.824 13.2565 14.7973 13.5665 14.7285 13.9425V13.9405Z"
                                                    fill="#DA0016" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.22179 0.000488281H16.984C17.5733 0.000601556 18.1385 0.21139 18.5551 0.586488L26.7929 8.00049C27.2097 8.37547 27.4439 8.8841 27.444 9.41449V28.0005C27.444 29.0614 26.9758 30.0788 26.1423 30.8289C25.3088 31.5791 24.1783 32.0005 22.9996 32.0005H5.22179C4.04305 32.0005 2.91259 31.5791 2.07909 30.8289C1.2456 30.0788 0.777344 29.0614 0.777344 28.0005V4.00049C0.777344 2.93962 1.2456 1.92221 2.07909 1.17206C2.91259 0.421916 4.04305 0.000488281 5.22179 0.000488281ZM17.444 3.00049V7.00049C17.444 7.53092 17.6781 8.03963 18.0949 8.4147C18.5116 8.78977 19.0769 9.00049 19.6662 9.00049H24.1107L17.444 3.00049ZM5.58845 27.3365C5.78845 27.6965 6.09957 28.0225 6.56179 28.1745C7.02179 28.3245 7.47734 28.2545 7.85068 28.1145C8.55734 27.8545 9.26179 27.2425 9.90846 26.5425C10.6485 25.7405 11.4262 24.6885 12.1773 23.5225C13.6274 23.1357 15.1123 22.864 16.6151 22.7105C17.2818 23.4765 17.9707 24.1365 18.6373 24.6105C19.2596 25.0505 19.9773 25.4165 20.7129 25.4445C21.1136 25.4623 21.5102 25.3657 21.8462 25.1685C22.1907 24.9665 22.4462 24.6745 22.6329 24.3365C22.8329 23.9745 22.9551 23.5965 22.9396 23.2105C22.9255 22.8299 22.7689 22.4648 22.4951 22.1745C21.9929 21.6345 21.1707 21.3745 20.3618 21.2445C19.3806 21.1077 18.385 21.0741 17.3951 21.1445C16.5592 20.081 15.8304 18.9525 15.2173 17.7725C15.7729 16.4525 16.1885 15.2045 16.3729 14.1845C16.4529 13.7485 16.4951 13.3325 16.4796 12.9565C16.4768 12.5833 16.3803 12.2154 16.1973 11.8805C16.0919 11.6956 15.9421 11.5342 15.7588 11.408C15.5754 11.2817 15.3631 11.1938 15.1373 11.1505C14.6885 11.0645 14.2262 11.1505 13.8018 11.3045C12.964 11.6045 12.5218 12.2445 12.3551 12.9505C12.1929 13.6305 12.2662 14.4225 12.4573 15.2225C12.6529 16.0345 12.9862 16.9185 13.4129 17.8125C12.7304 19.3401 11.9422 20.8277 11.0529 22.2665C9.90766 22.5908 8.80374 23.0232 7.75957 23.5565C6.93734 23.9965 6.20623 24.5165 5.76623 25.1305C5.29957 25.7825 5.15512 26.5585 5.58845 27.3365Z"
                                                    fill="#DA0016" />
                                            </svg>

                                            <div
                                                class="document-tite text-center d-flex flex-column gap-2 justify-content-center align-items-center">
                                                <h5 class="title fs-4 fw-bold lh-base">
                                                    {{ $doc->title }}
                                                </h5>
                                                <p class="description p_clamp fs-6 text-muted lh-base">
                                                    {{ $doc->description }}
                                                </p>
                                                <p class="description text-danger text-start">
                                                    ever since the 1500s when an......
                                                </p>
                                            </div>
                                        </div>
                                        <div class="buttons-div">
                                            <a class="action-item"
                                                href="{{ route('admin.tabproject.archiveDownload', $doc->id) }}">
                                                <i class="bi bi-download fs-3 text-black"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif($doc->type == 'url')
                            <div class="col-xl-4 col-md-6 col-12">
                                <div id="hovering-top-border-card" class="document-content">
                                    <div
                                        class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                        <div
                                            class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-3">
                                            <svg width="56" height="64" viewBox="0 0 28 32"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="28" height="32" rx="4"
                                                    fill="#007BFF" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9.00003 16.5C9.00003 15.9477 9.44776 15.5 10 15.5H18C18.5523 15.5 19 15.9477 19 16.5C19 17.0523 18.5523 17.5 18 17.5H10C9.44776 17.5 9.00003 17.0523 9.00003 16.5Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.5 12C12.5 11.4477 12.9478 11 13.5 11H18C19.3807 11 20.5 12.1193 20.5 13.5V18C20.5 18.5523 20.0523 19 19.5 19C18.9478 19 18.5 18.5523 18.5 18V13.5C18.5 13.2239 18.2761 13 18 13H13.5C12.9478 13 12.5 12.5523 12.5 12Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.5 13C8.5 12.4477 8.05228 12 7.5 12C6.94772 12 6.5 12.4477 6.5 13V18.5C6.5 19.8807 7.61929 21 9 21H14.5C15.0523 21 15.5 20.5523 15.5 20C15.5 19.4477 15.0523 19 14.5 19H9C8.72386 19 8.5 18.7761 8.5 18.5V13Z"
                                                    fill="white" />
                                            </svg>

                                            <div
                                                class="document-tite text-center d-flex flex-column gap-2 justify-content-center align-items-center">
                                                <h5 class="title fs-4 fw-bold lh-base">
                                                    {{ $doc->title }}
                                                </h5>
                                                <p class="description p_clamp fs-6 text-muted lh-base">
                                                    {{ $doc->description }}
                                                </p>
                                                <p class="description text-white-color">
                                                    empty text
                                                </p>
                                            </div>
                                        </div>
                                        <div class="buttons-div">
                                            <a class="action-item" href="https://{{ $doc->url }}">
                                                <i class="bi bi-box-arrow-up-right  fs-3 text-black"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                    </div>

                    <hr class="custom-hr">
                    @if ($projects->getDocument->count())
                    <div class="media_sec">
                        <h6 class="line-before fs-3">
                            Media
                        </h6>
                        <div class="media-images mt-3">
                            <div class="row g-3">
                                @foreach ($projects->getDocument as $img)
                                @if ($img->type == 'image')
                                <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                    <img class="shadow-sm zoom-on-hover"
                                        src="{{ asset($img->getFirstMediaUrl('firstFile')) }}"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                        alt="media images">
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- End Archive Tab -->
            </div>

        </div>
    </div>
</div>
<!-- End Edu 4 Me Section -->

<!-- Old Desgin (Remove d-none Class to view it again-->
<div class="about_content d-none">
    <h5>{{ $page->name }}</h5>
    <h2>{{ $projects->title }}</h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($tabs as $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn {{ $loop->first ? 'active' : '' }}"
                    id="pills-tab-{{ $tab->slug }}" data-bs-toggle="pill"
                    data-bs-target="#pills-{{ $tab->slug }}" type="button" role="tab"
                    aria-controls="pills-{{ $tab->slug }}" aria-selected="false"
                    tabindex="-1">{{ $tab->name }}
                </button>

            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn {{ $loop->first ? 'active' : '' }}"
                    id="pills-tab-{{ $tab->slug }}" data-bs-toggle="pill"
                    data-bs-target="#pills-{{ $tab->slug }}" type="button" role="tab"
                    aria-controls="pills-{{ $tab->slug }}" aria-selected="false"
                    tabindex="-1">{{ $tab->name }} </button>

                {{-- <button @if ($tab['slug'] == 'about') class="nav-link proj_bttn active" @else class="nav-link proj_bttn" @endif id="pills-{{$tab['slug']}}-tab"
                data-bs-toggle="pill" data-bs-target="#pills-{{$tab['slug']}}" type="button" role="tab"
                aria-controls="pills-{{$tab['slug']}}"
                aria-selected="true">{{ ucfirst($tab['name'][App::getLocale()]) }} </button> --}}
            </li>
            @endforeach
        </ul>
        @if (!empty($projects->getAbout))
        @foreach ($projects->getAbout as $about)
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                aria-labelledby="pills-about-tab" tabindex="0">
                <div class="who_us">
                    <div class="who_us_titel">
                        <h5>Who we do for you</h5>
                        @if (!empty($about->shortDescription))
                        <p id="shortDescription" style="white-space: pre-line;">{!! $about->shortDescription !!}
                        </p>
                        @endif
                        @if (!empty($about->description))
                        <p id="fullDescription" style="white-space: pre-line;"
                            class="text-start {{ strlen($about->description) >= 400 ? 'p_clamp_4' : '' }}">
                            {{ html_entity_decode(strip_tags($about->description)) }}

                        </p>
                        @endif

                        @if (strlen($about->description) >= 400)
                        <div class="pt-5">>
                            <a href="#" onclick="toggleDescription2(this)" id="learnMoreBtn"
                                class="btn_detail">Show
                                More</a>
                        </div>
                    </div @endif
                        <div class="whou_us_img">
                    <img src="{{ asset($about->getFirstMediaUrl('AboutTabs')) }}">
                </div>

            </div>

            <div class="bg_div" style="background-image: url({{ asset('content') }}/images/women.png);">
                <div class="number_div">

                    <div class="num_img_div">
                        <img src="{{ asset('content') }}/images/small_icon/Vector (1).png">
                        <h3>19 +</h3>
                        <p>{{ $about['label1'] }}</p>
                    </div>

                    <div class="num_img_div">
                        <img src="{{ asset('content') }}/images/small_icon/Vector.png">
                        <h3>20 +</h3>
                        <p>{{ $about['label2'] }}</p>
                    </div>

                    <div class="num_img_div">
                        <img src="{{ asset('content') }}/images/small_icon/people.png">
                        <h3>850 +</h3>
                        <p>{{ $about['label3'] }}</p>
                    </div>

                    <div class="num_img_div">
                        <img src="{{ asset('content') }}/images/small_icon/receipt-add.png">
                        <h3>16 +</h3>
                        <p>{{ $about['label4'] }}</p>
                    </div>

                </div>

            </div>
            <div class="tabs_div2">
                <ul class="nav nav-pills ul_tabs mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active tab_active" id="chalange_btn_tab"
                            data-bs-toggle="pill" data-bs-target="#challang_tab" type="button"
                            role="tab" aria-controls="challang_tab" aria-selected="true">Challenge
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn_tabs" id="solution_btn_tab" data-bs-toggle="pill"
                            data-bs-target="#solution_tab" type="button" role="tab"
                            aria-controls="solution_tab" aria-selected="false">Solution</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn_tabs" id="result_btn_tab" data-bs-toggle="pill"
                            data-bs-target="#result_tab" type="button" role="tab"
                            aria-controls="result_tab" aria-selected="false">Result</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabs">
                    <div class="tab-pane fade show active" id="challang_tab" role="tabpanel"
                        aria-labelledby="chalange_btn_tab" tabindex="0">
                        <div class="who_us">
                            <div class="who_us_titel">
                                <h5>Who we do for you</h5>
                                @if (!empty($about->shortDescription))
                                <p id="shortDescription" style="white-space: pre-line;">
                                    {!! $about->shortDescription !!}</p>
                                @endif
                                @if (!empty($about->description))
                                <p id="fullDescription" style="white-space: pre-line; display: none;">
                                    {!! $about->description !!}</p>
                                @endif
                                <a href="#" id="learnMoreBtn" class="btn_detail">Learn More</a>
                            </div>
                            <div class="whou_us_img">
                                <img src="{{ asset($about->getFirstMediaUrl('AboutTabs')) }}">
                            </div>

                        </div>

                        <div class="bg_div"
                            style="background-image: url({{ asset('content') }}/images/women.png);">
                            <div class="number_div">

                                <div class="num_img_div">
                                    <img src="{{ asset('content') }}/images/small_icon/Vector (1).png">
                                    <h3>19 +</h3>
                                    <p>{{ $about['label1'] }}</p>
                                </div>

                                <div class="num_img_div">
                                    <img src="{{ asset('content') }}/images/small_icon/Vector.png">
                                    <h3>20 +</h3>
                                    <p>{{ $about['label2'] }}</p>
                                </div>

                                <div class="num_img_div">
                                    <img src="{{ asset('content') }}/images/small_icon/people.png">
                                    <h3>850 +</h3>
                                    <p>{{ $about['label3'] }}</p>
                                </div>

                                <div class="num_img_div">
                                    <img src="{{ asset('content') }}/images/small_icon/receipt-add.png">
                                    <h3>16 +</h3>
                                    <p>{{ $about['label4'] }}</p>
                                </div>

                            </div>

                        </div>
                        <div class="tabs_div2">
                            <ul class="nav nav-pills ul_tabs mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active tab_active" id="chalange_btn_tab"
                                        data-bs-toggle="pill" data-bs-target="#challang_tab"
                                        type="button" role="tab" aria-controls="challang_tab"
                                        aria-selected="true">Challenge
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn_tabs" id="solution_btn_tab"
                                        data-bs-toggle="pill" data-bs-target="#solution_tab"
                                        type="button" role="tab" aria-controls="solution_tab"
                                        aria-selected="false">Solution</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn_tabs" id="result_btn_tab"
                                        data-bs-toggle="pill" data-bs-target="#result_tab" type="button"
                                        role="tab" aria-controls="result_tab"
                                        aria-selected="false">Result</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabs">
                                <div class="tab-pane fade show active" id="challang_tab" role="tabpanel"
                                    aria-labelledby="chalange_btn_tab" tabindex="0">
                                    <div class="who_us">
                                        <div class="who_us_titel">
                                            @if (!empty($about['challenge']))
                                            <p>{{ $about['challenge'] }}</p>
                                            @endif

                                        </div>


                                    </div>
                                </div>
                                @if (!empty($about['solution']))
                                <div class="tab-pane fade" id="solution_tab" role="tabpanel"
                                    aria-labelledby="solution_btn_tab" tabindex="0">
                                    {{ $about['solution'] }}
                                </div>
                                @endif
                                @if (!empty($about['result']))
                                <div class="tab-pane fade" id="result_tab" role="tabpanel"
                                    aria-labelledby="result_btn_tab" tabindex="0">
                                    {{ $about['result'] }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-program" role="tabpanel"
                        aria-labelledby="pills-program-tab" tabindex="0">
                        <div class="program_sec">
                            @foreach ($projects->getProgram as $program)
                            <div class="card all_program_card">

                                <div class="programe_content">
                                    <img src="{{ asset($program->getFirstMediaUrl('firstImage')) }}">
                                    <h3>{{ $program->title }}</h3>
                                    <p class="p_clamp">{!! $program->description !!}</p>
                                    <button href="#" class="show_bttn">Show More <i
                                            class="bi bi-chevron-down"></i></button>
                                    <div class="flex_icons_div">
                                        <a
                                            href="{{ route('admin.tabproject.programTabDownload', $program->id) }}">
                                            <p><img
                                                    src="{{ asset('content') }}/images/small_icon/archive-book.png"><span>Reference</span>
                                            </p>
                                        </a>
                                        <a href="https://{{ $program->url }}" class="card_prgram"
                                            target="_blank">
                                            <p><img
                                                    src="{{ asset('content') }}/images/small_icon/global.png"><span>Website</span>
                                            </p>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>

                    </div>


                    <div class="tab-pane fade" id="pills-help" role="tabpanel"
                        aria-labelledby="pills-help-tab" tabindex="0">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($projects->getHelp as $helpItem)
                            <div class="accordion-item shadow-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{ $helpItem['title'] }}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">{!! $helpItem['description'] !!}</div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-archive" role="tabpanel"
                        aria-labelledby="pills-archive-tab" tabindex="0">

                        <div class="document_sec">
                            @foreach ($projects->getDocument as $doc)
                            @if ($doc->type == 'pdf')
                            <div class="document_content">

                                <i class="bi bi-filetype-pdf"></i>
                                <div class="document_titel">
                                    <h3>{{ $doc->title }}</h3>
                                    <p class="p_clamp"> {{ $doc->description }}</p>
                                    ever since the 1500s when an......</p>

                                </div>
                                <a
                                    href="{{ route('admin.tabproject.archiveDownload', $doc->id) }}"><i
                                        class="bi bi-download"></i></a>
                            </div>
                            @elseif($doc->type == 'url')
                            <div class="document_content">
                                <i class="bi bi-link-45deg"></i>
                                <div class="document_titel">
                                    <h3>{{ $doc->title }}</h3>
                                    <p class="p_clamp">{{ $doc->description }}</p>

                                </div>
                                <a href="https://{{ $doc->url }}">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>

                        <div class="media_sec">
                            <h2>Media</h2>
                            <div class="media_images">
                                @foreach ($projects->getDocument as $img)
                                @if ($img->type == 'image')
                                <img src="{{ asset($img->getFirstMediaUrl('firstFile')) }}">
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-join-us" role="tabpanel"
                        aria-labelledby="pills-join-us-tab" tabindex="0">

                        <div class="bg_div bg_join"
                            style="background-image: url({{ asset('content') }}/images/girl.jpg);">
                            <div class="join_us_sec">
                                <h3 class="h3_style">Register Steps</h3>
                                <div class="join_us_dives">
                                    @foreach ($projects->getJoinus->where('type', 'register') as $joinus)
                                    <div class="join_us_dive">
                                        <img
                                            src="{{ asset('content') }}/images/small_icon/share.png">
                                        @if (!empty($joinus['description']))
                                        <p>{!! $joinus['description'] !!}</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>

                        <div class="terms_sec">
                            <h2>Terms and Conditions</h2>
                            <div class="flex_jon">
                                <ul class="terms_ul">
                                    @foreach ($projects->getJoinus->where('type', 'terms') as $joinus)
                                    @if (!empty($joinus['description']))
                                    <li>
                                        {!! $joinus['description'] !!}
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>

                                <div class="terms_img">
                                    @if ($projects->getJoinus->first())
                                    <img
                                        src="{{ asset($projects->getJoinus->first()->getFirstMediaUrl('JoinusTerms')) }}">
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                    @if (!empty($about['solution']))
                    <div class="tab-pane fade" id="solution_tab" role="tabpanel"
                        aria-labelledby="solution_btn_tab" tabindex="0">{{ $about['solution'] }}
                    </div>
                    @endif
                    @if (!empty($about['result']))
                    <div class="tab-pane fade" id="result_tab" role="tabpanel"
                        aria-labelledby="result_btn_tab" tabindex="0">{{ $about['result'] }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-program" role="tabpanel"
            aria-labelledby="pills-program-tab" tabindex="0">
            <div class="program_sec">
                @foreach ($projects->getProgram as $program)
                <div class="card all_program_card">

                    <div class="programe_content">
                        <img src="{{ asset($program->getFirstMediaUrl('firstImage')) }}">
                        <h3>{{ $program->title }}</h3>
                        <p
                            class="text-start {{ strlen($program->description) >= 200 ? 'p_clamp' : '' }} ">
                            {{ html_entity_decode(strip_tags($program->description)) }}
                        </p>
                        @if (strlen($program->description) >= 200)
                        {{-- <a  role='btn' onclick="toggleDescription(this)" class="read_more" >Read More <i class="bi bi-chevron-down"></i></a> --}}
                        <button href="#" onclick="toggleDescription(this)"
                            class="show_bttn">Show More <i
                                class="bi bi-chevron-down"></i></button>
                        @endif
                        <div class="flex_icons_div">
                            <a
                                href="{{ route('admin.tabproject.programTabDownload', $program->id) }}">
                                <p><img
                                        src="{{ asset('content') }}/images/small_icon/archive-book.png"><span>Reference</span>
                                </p>
                            </a>
                            <a href="https://{{ $program->url }}" class="card_prgram"
                                target="_blank">
                                <p><img
                                        src="{{ asset('content') }}/images/small_icon/global.png"><span>Website</span>
                                </p>
                            </a>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>


        <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab"
            tabindex="0">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($projects->getHelp as $helpItem)
                <div class="accordion-item shadow-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne-{{ $helpItem['id'] }}"
                            aria-expanded="false"
                            aria-controls="flush-collapseOne-{{ $helpItem['id'] }}">
                            {{ $helpItem['title'] }}
                        </button>
                    </h2>
                    <div id="flush-collapseOne-{{ $helpItem['id'] }}"
                        class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{!! $helpItem['description'] !!}</div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="tab-pane fade" id="pills-archive" role="tabpanel"
            aria-labelledby="pills-archive-tab" tabindex="0">

            <div class="document_sec">
                @foreach ($projects->getDocument as $doc)
                @if ($doc->type == 'pdf')
                <div class="document_content  d-flex justify-content-between">

                    <i class="bi bi-filetype-pdf "></i>
                    <div class="document_titel">
                        <h3>{{ $doc->title }}</h3>
                        <p class="p_clamp"> {{ $doc->description }}</p>
                        <p> ever since the 1500s when an...... </p>

                    </div>
                    <a href="{{ route('admin.tabproject.archiveDownload', $doc->id) }}">
                        <i class="bi bi-download"></i>
                    </a>
                </div>
                @elseif($doc->type == 'url')
                <div class="document_content">
                    <i class="bi bi-link-45deg"></i>
                    <div class="document_titel">
                        <h3>{{ $doc->title }}</h3>
                        <p class="p_clamp">{{ $doc->description }}</p>

                    </div>
                    <a href="https://{{ $doc->url }}">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
                @endif
                @endforeach
            </div>

            <div class="media_sec">
                <h2>Media</h2>
                <div class="media_images">
                    @foreach ($projects->getDocument as $img)
                    @if ($img->type == 'image')
                    <img src="{{ asset($img->getFirstMediaUrl('firstFile')) }}">
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-join-us" role="tabpanel"
            aria-labelledby="pills-join-us-tab" tabindex="0">

            <div class="bg_div bg_join"
                style="background-image: url({{ asset('content') }}/images/girl.jpg);">
                <div class="join_us_sec">
                    <h3 class="h3_style">Register Steps</h3>
                    <div class="join_us_dives">
                        @foreach ($projects->getJoinus as $joinus)
                        <div class="join_us_dive">
                            <img src="{{ asset('content') }}/images/small_icon/share.png">
                            @if (!empty($joinus['description']))
                            <p>{!! $joinus['description'] !!}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>

            <div class="terms_sec">
                <h2>Terms and Conditions</h2>
                <div class="flex_jon">
                    <ul class="terms_ul">
                        @foreach ($projects->getJoinus as $joinus)
                        @if (!empty($joinus['description']))
                        <li>
                            {!! $joinus['sub_description'] !!}
                        </li>
                        @endif
                        @endforeach

                    </ul>

                    <div class="terms_img">
                        @if (isset($joinus) && !empty($joinus->getFirstMediaUrl('JoinusTerms')))
                        <img src="{{ asset($joinus->getFirstMediaUrl('JoinusTerms')) }}">
                        @endif
                    </div>
                </div>


            </div>
        </div>

    </div>
    @endforeach
    @endif
</div>


</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const learnMoreBtn = document.getElementById("learnMoreBtn");
        const shortDescription = document.getElementById("shortDescription");
        const fullDescription = document.getElementById("fullDescription");

        learnMoreBtn.addEventListener("click", function(event) {
            event.preventDefault();
            shortDescription.style.display = "none";
            fullDescription.style.display = "block";
        });
    });

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

    function toggleDescription2(button) {
        var description = button.previousElementSibling;
        if (description.classList.contains('p_clamp_4')) {
            description.classList.remove('p_clamp_4');
            button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
        } else {
            description.classList.add('p_clamp_4');
            button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
        }
    }
</script>

@endsection
@section('websiteStyle')
@endsection