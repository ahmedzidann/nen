<!DOCTYPE html>
<html lang="en">

<!-- css-Ms -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_name')</title>

    <!-- amCharts 4 Core -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <!-- amCharts 4 Maps -->
    <script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
    <!-- amCharts 4 Geodata (World Map) -->
    <script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <!-- amCharts 4 Animated Theme -->
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('content/images/logo.svg') }}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/kursor.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap-icons.css') }}" />

    <!-- Your Custom Styles -->
    <link rel="stylesheet" href="{{ asset('content/styles/global-rules.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/styles/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/styles/variables.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/styles/pages/home-page/home-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/styles/pages/home-page/home-page-rtl.css') }}" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    @yield('websiteStyle')
</head>


<body>
      @php
use App\Models\Makeme;
$marques = Makeme::all();
  @endphp
    <div class="marquee">
        <div class="marquee-content">
           <ul class="ul-marquee">
            @foreach($marques as $row)
             <li>
               👋   {{ strip_tags($row->translate('description', app()->getLocale()))  }}
            </li> 
            @endforeach     
           </ul>
        </div>
    </div>

    <!--start_header  -->
    <div class="header_section">
        <div class="container">
            <div class="first_part py-1">
                <div class="logo_pro_div">
                    <a href="about.html"><img class="logo_pro" src="{{ asset('content/images/logo.svg') }}"></a>

                    <div class="toggel_header">
                        <a href="#" class="btn_menu"><i class="bi bi-list"></i></a>
                    </div>
                </div>

                <div class="small_photes_div">
                    <a href="{{ route('contact-us') }}">
                        <img src="{{ asset('content/images/small_icon/headphon_icon.svg') }}" />
                        <span>
                            Contact us
                        </span>
                    </a>
                    <a href="#"><img
                            src="{{ asset('content/images/small_icon/wallet_icon.svg') }}" /><span>E-wallet</span></a>
                    <a href="{{ route('web.store') }}"><img
                            src="{{ asset('content/images/small_icon/wallet_icon.svg') }}" /><span>Store</span></a>

                    <!-- Start Dropdown Languages button -->
                    <div class="dropdown">
                        <button style="background-color: transparent; outline: none !important;border: none !important;"
                            class="btn btn-transparent dropdown-toggle d-flex justify-content-center align-items-center gap-1"
                            type="button" id="dropdownMenuLangs" data-bs-toggle="dropdown" aria-expanded="false">
                            <a href="#"><img src="{{ asset('content/images/small_icon/lang_icon.svg') }}"
                                    alt="Language Icon" /></a>
                            <span>Language</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLangs">
                            @foreach (App\Models\TranslationKey::get() as $lang)
                            <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($lang->key) }}"
                                    name="{{ $lang->name }}">{{ $lang->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Dropdown Languages button -->

                    <a href="{{ route('blogs.index') }}" target="__blank" mg
                        src="{{ asset('content/images/small_icon/media_icon.svg') }}">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 640 512"
                                fill="#000" 
                                width="28" 
                                height="28"
                            >
                                <path d="M180.5 74.3C80.8 74.3 0 155.6 0 256S80.8 437.7 180.5 437.7 361 356.4 361 256 280.2 74.3 180.5 74.3zm288.3 10.6c-49.8 0-90.2 76.6-90.2 171.1s40.4 171.1 90.3 171.1 90.3-76.6 90.3-171.1H559C559 161.5 518.6 84.9 468.8 84.9zm139.5 17.8c-17.5 0-31.7 68.6-31.7 153.3s14.2 153.3 31.7 153.3S640 340.6 640 256C640 171.4 625.8 102.7 608.3 102.7z"/>
                            </svg>
                        </span>
                        <span>Media Center</span>
                    </a>
                </div>
            </div>
        </div>

        @include('user.layout.includes.nav')
    </div>

    <!-- hero_img -->
    <div class="section_photoe">
        <div class="title_img">
            <img class="img_team" src="@yield('cover_image') " />
        </div>
    </div>
    <!-- section_who_us -->

    <section class="content-ui">
        @yield('content')
    </section>

    <!-- Start Contact Us Section -->
    <section id="contact-us" class="pt-3 mt-md-5 mt-3">
        <div class="container">
            <div class="global-card p-0">
                <div class="second-contact-bg py-4 px-4">
                    <div id="quick-access">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Section -->

    <!-- Start Footer Section -->
    <footer id="footer" class="home-footer">
        <!-- Start Float Quick Access -->
        <div class="float-quick-access p-2">
            <div class="d-flex flex-column gap-3">
                <!-- Chat Icon -->
                <a href="https://example.com/chat" target="_blank">
                    <svg width="24px" height="24px" viewBox="0 0 0.96 0.96" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <path cx="16" cy="16" r="16" fill="#1C98F7"
                                d="M0.96 0.48A0.48 0.48 0 0 1 0.48 0.96A0.48 0.48 0 0 1 0 0.48A0.48 0.48 0 0 1 0.96 0.48z" />
                            <path fill="#FFF"
                                d="M0.488 0.7a0.345 0.345 0 0 0 0.063 -0.01 0.171 0.171 0 0 0 0.078 0.005 0.03 0.03 0 0 1 0.003 0c0.009 0 0.022 0.005 0.039 0.017v-0.019a0.018 0.018 0 0 1 0.009 -0.016q0.012 -0.007 0.022 -0.015c0.026 -0.022 0.041 -0.051 0.041 -0.082q0 -0.016 -0.005 -0.03 0.012 -0.022 0.019 -0.046A0.138 0.138 0 0 1 0.78 0.579c0 0.042 -0.02 0.081 -0.054 0.11a0.18 0.18 0 0 1 -0.018 0.013v0.044c0 0.015 -0.017 0.024 -0.03 0.015a0.45 0.45 0 0 0 -0.036 -0.024 0.09 0.09 0 0 0 -0.011 -0.006q-0.015 0.002 -0.031 0.002c-0.042 0 -0.081 -0.013 -0.112 -0.034zm-0.224 -0.088C0.211 0.567 0.18 0.505 0.18 0.439c0 -0.135 0.128 -0.244 0.284 -0.244s0.284 0.108 0.284 0.244c0 0.135 -0.128 0.244 -0.284 0.244q-0.026 0 -0.052 -0.004c-0.007 0.002 -0.037 0.019 -0.079 0.05 -0.015 0.011 -0.037 0 -0.037 -0.018v-0.075a0.27 0.27 0 0 1 -0.031 -0.023m0.148 0.02q0.002 0 0.004 0c0.015 0.003 0.031 0.004 0.047 0.004 0.132 0 0.237 -0.089 0.237 -0.198 0 -0.108 -0.105 -0.198 -0.237 -0.198 -0.132 0 -0.237 0.089 -0.237 0.198 0 0.052 0.025 0.102 0.068 0.139 0.011 0.009 0.023 0.018 0.036 0.025 0.007 0.004 0.012 0.012 0.012 0.02v0.043c0.033 -0.022 0.056 -0.033 0.071 -0.033m-0.07 -0.147c-0.021 0 -0.037 -0.017 -0.037 -0.037 0 -0.02 0.017 -0.037 0.037 -0.037s0.037 0.016 0.037 0.037 -0.017 0.037 -0.037 0.037m0.121 0c-0.021 0 -0.037 -0.017 -0.037 -0.037 0 -0.02 0.017 -0.037 0.037 -0.037s0.037 0.016 0.037 0.037 -0.017 0.037 -0.037 0.037m0.121 0c-0.021 0 -0.037 -0.017 -0.037 -0.037 0 -0.02 0.017 -0.037 0.037 -0.037s0.037 0.016 0.037 0.037 -0.017 0.037 -0.037 0.037" />
                        </g>
                    </svg>
                </a>
                <!-- Telegram Icon -->
                <a href="https://example.com/telegram" target="_blank" class="text-decoration-none"
                    aria-label="Telegram">
                    <i class="bi bi-telegram text-primary fs-4"></i>
                </a>
                <!-- WhatsApp Icon -->
                <a href="https://example.com/whatsapp" target="_blank" class="text-decoration-none"
                    aria-label="WhatsApp">
                    <i class="bi bi-whatsapp text-success fs-4"></i>
                </a>
            </div>
        </div>
        <!-- End Float Quick Access -->

        <div class="footer-second-bg">
            <div class="container">
                <div class="py-3">
                    <div class="row g-3 pt-3">
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        Certifications
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        {{-- @if (array_key_exists(1, $footerData)) --}}
                                        @foreach ($footerData[1] as $certificate)
                                            <a href="{{ $certificate->url }}"
                                                class="item d-flex align-items-center gap-1" target="__blank">
                                                <!-- <i class="bi bi-arrow-right"></i> -->
                                                <span>&gt;</span>
                                                <span>
                                                    {{ $certificate->title }}
                                                </span>
                                            </a>
                                        @endforeach
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        {{ TranslationHelper::translateWeb(ucfirst('PORTALS') ?? '') }}
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        {{-- @if (array_key_exists(2, $footerData)) --}}
                                        @foreach ($footerData[2] as $portal)
                                            <a href="{{ $portal->url }}"
                                                class="item d-flex align-items-center gap-1" target="__blank">
                                                <!-- <i class="bi bi-arrow-right"></i> -->
                                                <span>&gt;</span>
                                                <span>
                                                    {{ $portal->title }}
                                                </span>
                                            </a>
                                        @endforeach
                                        {{-- @endif --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        {{ TranslationHelper::translateWeb(ucfirst('SUBSIDIARIES') ?? '') }}
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        {{-- @if (array_key_exists(3, $footerData)) --}}
                                        @foreach ($footerData[3] as $subsidiaries)
                                            <a href="{{ $subsidiaries->url }}"
                                                class="item d-flex align-items-center gap-1" target="__blank">
                                                <!-- <i class="bi bi-arrow-right"></i> -->
                                                <span>&gt;</span>
                                                <span>
                                                    {{ $subsidiaries->title }}
                                                </span>
                                            </a>
                                        @endforeach
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="subscribe"
                                class="d-flex flex-column justify-content-center text-white-color mt-2">
                                <h6 class="tag-title">
                                    {{ TranslationHelper::translateWeb(ucfirst('Get in Touch with Us') ?? '') }}
                                </h6>
                                <div class="d-flex align-items-center gap-md-3 gap-2 mt-md-4 mt-3">
                                    <!-- Facebook -->
                                    <a href="{{ $about->facebook_link }}" class="text-white">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <!-- Twitter -->
                                    <a href="{{ $about->twitter_link }}" class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-x" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                        </svg>
                                    </a>
                                    <!-- Instagram -->
                                    <a href="{{ $about->instagram_link }}" class="text-white">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <!-- YouTube -->
                                    <a href="{{ $about->youtube_link }}" class="text-white">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                    <!-- VK -->
                                    <a href="{{ $about->vk_link }}" class="text-white">
                                        <svg fill="#ffffff" width="26px" height="26px" viewBox="0 0 0.78 0.78"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.762 0.188a0.279 0.279 0 0 1 -0.035 0.073l0.001 -0.001q-0.022 0.036 -0.052 0.084 -0.026 0.038 -0.028 0.039a0.042 0.042 0 0 0 -0.009 0.02l0 0a0.029 0.029 0 0 0 0.009 0.017l0.013 0.014q0.104 0.107 0.117 0.148a0.029 0.029 0 0 1 -0.004 0.027l0 0a0.032 0.032 0 0 1 -0.025 0.009h0c-0.011 0 -0.021 -0.004 -0.029 -0.01l0 0a0.228 0.228 0 0 1 -0.031 -0.031l0 0q-0.022 -0.025 -0.04 -0.043 -0.058 -0.055 -0.085 -0.055l-0.002 0a0.026 0.026 0 0 0 -0.014 0.004l0 0a0.025 0.025 0 0 0 -0.005 0.019v0a0.422 0.422 0 0 0 -0.001 0.046v-0.001q0.001 0.002 0.001 0.005a0.025 0.025 0 0 1 -0.009 0.02l0 0a0.104 0.104 0 0 1 -0.053 0.009l0 0a0.27 0.27 0 0 1 -0.139 -0.041l0.001 0.001A0.387 0.387 0 0 1 0.136 0.465l-0.001 -0.001a0.858 0.858 0 0 1 -0.08 -0.13l-0.002 -0.005A0.813 0.813 0 0 1 0.012 0.238l-0.002 -0.006a0.218 0.218 0 0 1 -0.01 -0.05l0 -0.001q0 -0.025 0.029 -0.025h0.085q0.001 0 0.003 0c0.008 0 0.016 0.003 0.021 0.007l0 0c0.007 0.007 0.011 0.016 0.014 0.026l0 0a0.826 0.826 0 0 0 0.052 0.117l-0.002 -0.004a0.474 0.474 0 0 0 0.053 0.084l-0.001 -0.001q0.026 0.032 0.041 0.032l0.001 0a0.013 0.013 0 0 0 0.011 -0.007l0 0a0.059 0.059 0 0 0 0.004 -0.026v0a0.104 0.104 0 0 0 -0.01 -0.041l0 0.001a0.098 0.098 0 0 0 -0.015 -0.023l0 0a0.036 0.036 0 0 1 -0.01 -0.02l0 0c0 -0.006 0.003 -0.01 0.007 -0.014l0 0a0.022 0.022 0 0 1 0.015 -0.006h0.135a0.021 0.021 0 0 1 0.018 0.007l0 0a0.044 0.044 0 0 1 0.005 0.025v0a0.033 0.033 0 0 0 0.004 0.019l0 0a0.013 0.013 0 0 0 0.011 0.006h0a0.031 0.031 0 0 0 0.015 -0.005l0 0q0.013 -0.009 0.023 -0.021l0 0a0.507 0.507 0 0 0 0.054 -0.073l0.001 -0.002c0.011 -0.019 0.023 -0.041 0.034 -0.065l0.002 -0.005 0.014 -0.029a0.036 0.036 0 0 1 0.036 -0.025h0q0.035 0 0.026 0.032z" />
                                        </svg>
                                    </a>
                                    <!-- Telegram -->
                                    <a href="{{ $about->telegram_link }}" class="text-white">
                                        <i class="bi bi-telegram"></i>
                                    </a>
                                    <!-- Email -->
                                    <a href="mailto:{{ $about->email }}" class="text-white">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                </div>
                                <div class="input-group border-0 overflow-hidden mt-2">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Your email address" aria-label="Email"
                                        aria-describedby="basic-addon-email">
                                    <span class="input-group-text border-0" id="basic-addon-email">
                                        <a
                                            class="join-btn text-white-color border-0 bg-main-color d-flex justify-content-center align-items-center rounded-circle">
                                            <i class="bi bi-arrow-right scaleX-rtl fs-5"></i>
                                        </a>
                                    </span>
                                </div>
                                <div class="iso-content mt-md-3 mt-2">
                                    <div class="d-flex align-items-center gap-md-4 gap-3 flex-wrap">
                                       @if(isset($about->image_1)&& !empty($about->image_1))
                                        <div class="image-box d-flex justify-content-center">
                                            <img src="{{ asset('storage/footer_iso/' . $about->image_1) }}"  
                                                class="logo" alt="ISO 9001">
                                        </div>
                                    @endif

                                      @if(isset($about->image_2)&& !empty($about->image_2))
                                        <div class="image-box d-flex justify-content-center">
                                            <img src="{{ asset('storage/footer_iso/' . $about->image_2) }}"  
                                                class="logo" alt="ISO 14001">
                                        </div>
                                         @endif
                                         @if(isset($about->image_3)&& !empty($about->image_3))
                                        <div class="image-box d-flex justify-content-center">
                                            <img src="{{ asset('storage/footer_iso/' . $about->image_3) }}"  
                                                class="logo" alt="ISO 45001">
                                        </div>
                                         @endif

                                         @if(isset($about->image_4)&& !empty($about->image_4))
                                        <div class="image-box d-flex justify-content-center">
                                            <img src="{{ asset('storage/footer_iso/' . $about->image_4) }}"  
                                                class="logo" alt="ISO 27001">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr text-white-color">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-4 gap-3">
                        <p class="text-white-color text-gray-light fs1-1">
                            {{ TranslationHelper::translateWeb(ucfirst('Copyright © 2008 - 2024 NEN | National Education Network') ?? '') }}
                        </p>
                        <div class="d-flex align-items-center gap-md-3 gap-2">
                            <a href="{{ $about->terms }}">
                                <p class="text-white-color">
                                    Terms
                                </p>
                            </a>
                            <a href="{{ $about->privacy }}">
                                <p class="text-white-color">
                                    Policy
                                </p>
                            </a>
                            <a href="{{ $about->gdpr }}">
                                <p class="text-white-color">
                                    GDpr
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- Scroll top bar -->
    <button id="scroll__top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- responsive_mobil_menue -->
    <nav class="header__menu--navigation">
        <div class="menu-backdrop"></div>

        <ul class="header__menu--wrapper d-flex">
            <div class="btn_close">
                <i class="bi bi-x-circle"></i>
            </div>
            <ul class="mobile_ul">
                <li class="mobile_li"><a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Home') ?? '') }}</a></li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('About') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>
                            <a href="#"
                                class="insted_mobile_link">{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}<i
                                    class="bi bi-chevron-down"></i></a>
                            <ul class="small_ul_menu">
                                <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                                <li>{{ TranslationHelper::translateWeb(ucfirst('test 3') ?? '') }}</li>
                            </ul>
                        </li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 4') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Projects') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>
                            <a href="#"
                                class="insted_mobile_link">{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}<i
                                    class="bi bi-chevron-down"></i></a>
                            <ul class="small_ul_menu">
                                <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                                <li>{{ TranslationHelper::translateWeb(ucfirst('test 3') ?? '') }}</li>
                            </ul>
                        </li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 4') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Education') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Testing') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Solution') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Technology') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">
                        {{ TranslationHelper::translateWeb(ucfirst('DOC Validation') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Join Us') ?? '') }} <i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#"
                        class="mobile_link">{{ TranslationHelper::translateWeb(ucfirst('Find Us') ?? '') }}<i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 1') ?? '') }}</li>
                        <li>{{ TranslationHelper::translateWeb(ucfirst('test 2') ?? '') }}</li>
                    </ul>
                </li>
            </ul>
        </ul>
    </nav>



    <!-- Start Scripts -->
    <script src="{{ asset('content/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/kursor.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/all.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('content/js/pages/home-page.js') }}"></script>
    <script src="{{ asset('content/js/scripts.js') }}"></script>

    <!-- End Scripts -->


    <!-- Start Document UI Scripts Logic -->
    @yield('websiteScript')
    @section('websiteScript')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Swiper after DOM is fully loaded
                const swiper = new Swiper('.swiper-container', {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    freeMode: true,
                    navigation: {
                        nextEl: '.slider-next',
                        prevEl: '.slider-prev',
                    },
                    keyboard: {
                        enabled: true,
                        onlyInViewport: true,
                    },
                    mousewheel: {
                        forceToAxis: true,
                    },
                    // Responsive breakpoints for Swiper
                    breakpoints: {
                        1200: {
                            slidesPerView: 4, // Large desktops
                            spaceBetween: 30,
                        },
                        992: {
                            slidesPerView: 3, // Medium desktops
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2, // Tablets
                            spaceBetween: 15,
                        },
                        576: {
                            slidesPerView: 1, // Small screens
                            spaceBetween: 10,
                        },
                    },
                });
            });
        </script>
    @endsection
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var currentUrl = window.location.href;

            var urlParts = currentUrl.split('/');

            if (urlParts.length > 3) {
                let url = "{{ route('resources-data.get') }}";
                var lang = urlParts[3];
                var keysAfterLang = urlParts.slice(4);
                var keysAfterLang = urlParts.slice(4);
                keysAfterLang = keysAfterLang.map(part => part.split('?')[0]);
                let params = new URLSearchParams({
                    main_category: keysAfterLang[0],
                    sub_category: keysAfterLang[1],
                });
                let urlWithParams = `${url}?${params.toString()}`;

                fetch(urlWithParams, {
                        method: 'GET'
                    })
                    .then(response => {
                        return response.json();
                    })
                    .then(data => {
                        console.log('data:', data);
                        if (data.status === 'success' && data.data) {
                            document.getElementById('quick-access').innerHTML += data.data;
                            document.getElementById('line').style.display = 'block';
                        } else {
                            document.getElementById('contact-us').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });

            }

        });

        function handleLanguage(buttons) {
            if (typeof window !== 'undefined') {
                localStorage.setItem('lang', localStorage.getItem('lang') || 'en');
                document.querySelectorAll(buttons).forEach(btn => {
                    btn.addEventListener('click', () => {
                        let langCode;
                        langCode = btn.getAttribute('name') === 'english' ? 'en' :
                            btn.getAttribute('name') === 'arabic' ? 'ar' :
                            'ru'; // Default to Russian if the button is neither 'english' nor 'arabic'
                        if (window.localStorage.getItem('lang') !== langCode) {
                            window.localStorage.setItem('lang', langCode);
                            window.location.reload();
                        }
                    });
                });
            }
            initializePageLanguage()
        }

        function initializePageLanguage() {
            if (typeof window === 'undefined') return;

            const lang = localStorage.getItem('lang') || 'en';
            console.log(lang)
            document.body.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');

            if (lang === 'ar') {
                document.body.classList.add('rtl'); // Add RTL class for Arabic language
                document.body.style.direction = 'rtl';
                document.body.style.textAlign = 'right';
            } else {
                document.body.classList.remove('rtl'); // Remove RTL class for other languages
            }

            if (lang === 'ar') {
                document.querySelectorAll('.swiper-btn').forEach((btn, index) => {
                    btn.classList.replace(index === 0 ? 'back-btn' : 'next-btn', index === 0 ? 'next-btn' :
                        'back-btn');
                });
            }
        }

        // Call the function after the page is loaded and the DOM is available
        handleLanguage('.dropdown-menu .dropdown-item');
    </script>
    <!-- End Document UI Scripts Logic -->
</body>

</html>
