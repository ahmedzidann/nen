<!DOCTYPE html>
<html lang="en">

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

    <link rel="shortcut icon" href="{{ asset('content/images/logo.svg') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/kursor.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap-icons.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('content/css/vendors/swiper-bundle.min.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('content/css/style.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    @yield('websiteStyle')
</head>

<style>
/* Style for Swiper Navigation */
.slider-button {
    margin-top: 15px;
    /* Space between content and arrows */
    text-align: center;
}

/* Center navigation arrows on small screens (991px and below) */
@media (max-width: 991px) {
    .slider-button {
        position: static;
        display: flex;
        justify-content: center;
        gap: 10px;
    }
}
</style>

<body>

    <!-- <div class="loader-wrapper">
        <div class="loader"></div>
    </div> -->

    <!-- Start Loader -->
    <div class="loader-wrapper">
        <div class="custom-loader"></div>

        <!-- Other Loader -->
        <!-- <div class="new-loader">
            <div class="loader-bar bar-1"></div>
            <div class="loader-bar bar-2"></div>
            <div class="loader-bar bar-3"></div>
            <div class="loader-bar bar-4"></div>
        </div> -->
    </div>
    <!-- End Loader -->

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
                    <a href="#"><img
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
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Russian</a></li>
                        </ul>
                    </div>
                    <!-- End Dropdown Languages button -->

                    <a href="{{ route('blogs.index') }}" target="__blank" mg
                        src="{{ asset('content/images/small_icon/media_icon.svg') }}" />
                    <span>News Center</span>
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
            <div class="titel_about_content">
                <h1>{{ strtoupper(trim(\Illuminate\Support\Str::of(trim($__env->yieldContent('page_name')))->stripTags())) }}
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">@yield('parent_page_name')</a></li>
                    <li class="breadcrumb-item">
                        <a href="#">@yield('page_name')</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- section_who_us -->


    <section class="about_sec">
        <div class="container">
            <div class="about_us_div">
                @include('user.layout.includes.about.sidebar')
                @yield('content')
            </div>
        </div>
    </section>

    <!-- Start Contact Us Section -->
    <section id="contact-us" class="pt-3 mt-md-5 mt-3">
        <div class="container">
            <div class="global-card p-0">
                <div class="second-contact-bg py-4 px-4">
                    <div id="quick-access">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-1">
                            <h5 class="global-title mb-0 text-dark">
                                Quick Access
                            </h5>
                            <div class="under-title-vector">
                                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="vector">
                            </div>
                        </div>
                        <!--Start Swiper Container -->
                        <div class="tabs-items mt-md-4 mt-3">
                            <div class="swiper-container">
                                <!-- Swiper Wrapper for Tabs -->
                                <div class="swiper-wrapper px-5">
                                    <!-- Static Card 1 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            style="transform: scale(0.9);">
                                                            <path
                                                                d="M8.60623 24.8485C8.91734 24.6845 9.25734 24.5245 9.62623 24.3725C9.31461 24.7906 8.98089 25.1951 8.62623 25.5845C8.00401 26.2585 7.51957 26.6165 7.21512 26.7285C7.18985 26.7381 7.16386 26.7461 7.13734 26.7525C7.11516 26.7248 7.09583 26.6953 7.07957 26.6645C6.95512 26.4445 6.95957 26.2325 7.16845 25.9445C7.40401 25.6145 7.87734 25.2365 8.60623 24.8485ZM14.0618 21.5545C13.7973 21.6045 13.5351 21.6545 13.2707 21.7105C13.6624 21.0198 14.0329 20.3195 14.3818 19.6105C14.7331 20.1963 15.1112 20.7688 15.5151 21.3265C15.0329 21.3905 14.5462 21.4665 14.0618 21.5545ZM19.6729 23.4325C19.3277 23.1819 19.0046 22.9078 18.7062 22.6125C19.2129 22.6225 19.6707 22.6565 20.0662 22.7205C20.7707 22.8345 21.1018 23.0145 21.2173 23.1385C21.2538 23.1731 21.2744 23.2188 21.2751 23.2665C21.2673 23.4076 21.2216 23.5448 21.1418 23.6665C21.097 23.7639 21.025 23.8493 20.9329 23.9145C20.887 23.9398 20.833 23.9504 20.7796 23.9445C20.5796 23.9385 20.2062 23.8125 19.6729 23.4325ZM14.7285 13.9405C14.6396 14.4285 14.4885 14.9885 14.284 15.5985C14.2087 15.3701 14.1427 15.1393 14.0862 14.9065C13.9173 14.2005 13.8929 13.6465 13.984 13.2625C14.0685 12.9085 14.2285 12.7665 14.4196 12.6965C14.5221 12.6558 14.6306 12.6289 14.7418 12.6165C14.7707 12.6765 14.804 12.8005 14.8129 13.0125C14.824 13.2565 14.7973 13.5665 14.7285 13.9425V13.9405Z"
                                                                fill="#DA0016" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.22179 0.000488281H16.984C17.5733 0.000601556 18.1385 0.21139 18.5551 0.586488L26.7929 8.00049C27.2097 8.37547 27.4439 8.8841 27.444 9.41449V28.0005C27.444 29.0614 26.9758 30.0788 26.1423 30.8289C25.3088 31.5791 24.1783 32.0005 22.9996 32.0005H5.22179C4.04305 32.0005 2.91259 31.5791 2.07909 30.8289C1.2456 30.0788 0.777344 29.0614 0.777344 28.0005V4.00049C0.777344 2.93962 1.2456 1.92221 2.07909 1.17206C2.91259 0.421916 4.04305 0.000488281 5.22179 0.000488281ZM17.444 3.00049V7.00049C17.444 7.53092 17.6781 8.03963 18.0949 8.4147C18.5116 8.78977 19.0769 9.00049 19.6662 9.00049H24.1107L17.444 3.00049ZM5.58845 27.3365C5.78845 27.6965 6.09957 28.0225 6.56179 28.1745C7.02179 28.3245 7.47734 28.2545 7.85068 28.1145C8.55734 27.8545 9.26179 27.2425 9.90846 26.5425C10.6485 25.7405 11.4262 24.6885 12.1773 23.5225C13.6274 23.1357 15.1123 22.864 16.6151 22.7105C17.2818 23.4765 17.9707 24.1365 18.6373 24.6105C19.2596 25.0505 19.9773 25.4165 20.7129 25.4445C21.1136 25.4623 21.5102 25.3657 21.8462 25.1685C22.1907 24.9665 22.4462 24.6745 22.6329 24.3365C22.8329 23.9745 22.9551 23.5965 22.9396 23.2105C22.9255 22.8299 22.7689 22.4648 22.4951 22.1745C21.9929 21.6345 21.1707 21.3745 20.3618 21.2445C19.3806 21.1077 18.385 21.0741 17.3951 21.1445C16.5592 20.081 15.8304 18.9525 15.2173 17.7725C15.7729 16.4525 16.1885 15.2045 16.3729 14.1845C16.4529 13.7485 16.4951 13.3325 16.4796 12.9565C16.4768 12.5833 16.3803 12.2154 16.1973 11.8805C16.0919 11.6956 15.9421 11.5342 15.7588 11.408C15.5754 11.2817 15.3631 11.1938 15.1373 11.1505C14.6885 11.0645 14.2262 11.1505 13.8018 11.3045C12.964 11.6045 12.5218 12.2445 12.3551 12.9505C12.1929 13.6305 12.2662 14.4225 12.4573 15.2225C12.6529 16.0345 12.9862 16.9185 13.4129 17.8125C12.7304 19.3401 11.9422 20.8277 11.0529 22.2665C9.90766 22.5908 8.80374 23.0232 7.75957 23.5565C6.93734 23.9965 6.20623 24.5165 5.76623 25.1305C5.29957 25.7825 5.15512 26.5585 5.58845 27.3365Z"
                                                                fill="#DA0016" />
                                                        </svg>
                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 2 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 3 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 4 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 5 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 7 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Static Card 8 -->
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide nav-item" role="presentation">
                                        <div class="documents-sections mb-1 mt-2 h-100">
                                            <div id="hovering-top-border-card" class="document-content">
                                                <div
                                                    class="d-flex flex-column gap-2 p-3 justify-content-between align-items-center">
                                                    <div
                                                        class="top-content d-flex flex-column gap-2 justify-content-center align-items-center pt-2">
                                                        <svg width="56" height="64" viewBox="0 0 28 32" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect width="28" height="32" rx="4" fill="#007BFF"
                                                                style="transform: scale(0.9);" />
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

                                                        <p class="description fs-6 text-muted lh-base mt-0 pt-0 text-center"
                                                            style="width: 5rem; word-break: break-all; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                            title
                                                            title
                                                            title
                                                            title
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Swiper Navigation Buttons -->
                                <div class="slider-button slider-prev" tabindex="0" role="button"
                                    aria-label="Previous slide">
                                    <i class="fa fa-chevron-left"></i>
                                </div>
                                <div class="slider-button slider-next" tabindex="0" role="button"
                                    aria-label="Next slide">
                                    <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                        <!--End Swiper Container -->
                    </div>
                    <hr />
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9">
                            <h4 class="text-center">
                                Get in Touch with Us
                            </h4>
                            <p class="fs-5-2 text-center text-muted mt-2">
                                We're here to help! Whether you have questions, feedback, or need support, reach out to
                                us, and we'll be happy to assist you.
                            </p>
                            <div class="d-flex justify-content-center mt-3">
                                <a class="btn btn-solid-main fs-5-2" data-tooltip="contact channel"
                                    href="./contact-us.html">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Section -->

    <!-- Start Footer Section -->
    <footer id="footer" class="home-footer">
        <div class="footer-second-bg">
            <div class="container">
                <div class="pt-md-5 pt-3 pb-md-4 pb-3">
                    <!-- <div class="d-flex justify-content-center">
                        <div class="image-box d-flex justify-content-center">
                            <img src="https://taba-educational-program.vercel.app/images/logo/white-logo.png"
                                class="logo" alt="white-logo">
                        </div>
                    </div> -->
                    <div class="mt-4 text-white-color fs1-1">
                        <p class="text-center">
                            <a href="https://www.google.com/maps?q=Riyadh+11433+Kingdom+of+Saudi+Arabia" target="_blank"
                                style="color: inherit; text-decoration: none;">
                                <i class="bi bi-geo-alt-fill"></i> S. B. 10076 Riyadh 11433 Kingdom of Saudi Arabia
                            </a>
                        </p>
                        <p class="mt-2 text-center">
                            <a href="mailto:info@nen.com" style="color: inherit; text-decoration: none;">
                                <i class="bi bi-envelope-fill"></i> Email: info@nen.com
                            </a>
                        </p>
                    </div>
                    <hr class="mt-5 hr text-white-color">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        Certifications
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                UKVI SKILLS FOR ENGLISH
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                ITEP INTERNATIONAL
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                ATTANAL AL-ARABI
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                I.C.P.U CERTIFICATE
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                B.SKILLS CERTIFICATE
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        PORTALS
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                FOLLOW METRIC
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                HELP4ME
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                UTEST
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                MICROSOFT V-ACADEMY
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                CISCO V-ACAD
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="tag-title mb-3">
                                        SUBSIDIARIES
                                    </div>
                                    <div class="items d-flex flex-column gap-3">
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                NEN TECHNOLOGY
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                NEN BIO AGRO
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                DATA QUEST
                                            </span>
                                        </a>
                                        <a href="#" class="item d-flex align-items-center gap-1">
                                            <i class="bi bi-arrow-right"></i>
                                            <span>
                                                DAR AL-TANMYA
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="subscribe" class="d-flex flex-column justify-content-center text-white-color mt-2">
                                <h6 class="tag-title">
                                    Subscribe Our Newsletter
                                </h6>
                                <p class="desc fs-5-2 mt-2">
                                    Join our newsletter and be the first to know about new product releases, discounts,
                                    and
                                    useful resources!
                                </p>
                                <div class="input-group rounded-pill overflow-hidden mt-4">
                                    <input type="text" class="form-control border-0" placeholder="Your email address"
                                        aria-label="Email" aria-describedby="basic-addon-email">
                                    <span class="input-group-text border-0" id="basic-addon-email">
                                        <a
                                            class="join-btn text-white-color border-0 bg-main-color d-flex justify-content-center align-items-center rounded-circle">
                                            <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5 hr text-white-color">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-4 gap-3">
                        <p class="text-white-color text-gray-light fs1-1">
                            Copyright © 2008 - 2024 NEN | National Education Network
                        </p>
                        <div class="d-flex align-items-center gap-md-3 gap-2">
                            <a href="{{ $about->facebook_link }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                </svg>
                            </a>
                            <a href="{{ $about->twitter_link }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                </svg>
                            </a>
                            <a href="{{ $about->instagram_link }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M16.5 7.5l0 .01" />
                                </svg>
                            </a>
                            <a href="{{ $about->youtube_link }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                    <path d="M10 9l5 3l-5 3z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    <!--Footer -->
    <section class="footer_sec d-none">
        <div class="bg_footer" style="background-image: url({{ asset('content/images/team2.png') }})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="logo_footer_div">
                            <img class="footer_img" src="{{ asset('content/images/logo.svg') }}" />
                            <p id="about-text">
                                {{ \Illuminate\Support\Str::limit($about->translate('text', app()->getLocale()), 100) }}
                                <span id="dots">...</span>
                                <span id="more"
                                    style="display: none;">{{ substr($about->translate('text', app()->getLocale()), 100) }}</span>
                                <button id="read-more-btn" onclick="toggleReadMore()">Read More</button>
                            </p>

                            <div class="socail_div">
                                <a href="{{ $about->facebook_link }}" class="a_link"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $about->twitter_link }}" class="a_link"><i class="bi bi-twitter"></i></a>
                                <a href="{{ $about->instagram_link }}" class="a_link"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $about->youtube_link }}" class="a_link"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="footer_content">
                            <h4>COMPANY</h4>
                            <a href="#">About</a>
                            <a href="#">Features</a>
                            <a href="#">Works</a>
                            <a href="#">Career</a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="footer_content">
                            <h4>Help</h4>
                            <a href="#">Customer Support</a>
                            <a href="#">Delivery Details</a>
                            <a href="#">Terms & Conditions</a>
                            <a href="#">Privacy Policy</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer_content">
                            <h4>Newsletter</h4>
                            <div class="input_btn">
                                <input type="text" placeholder="Enter your Email addres" />
                                <button class="subscribe_btn">Subscribe Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <li class="mobile_li"><a href="#" class="mobile_link">Home</a></li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">About<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>
                            <a href="#" class="insted_mobile_link">test 1<i class="bi bi-chevron-down"></i></a>
                            <ul class="small_ul_menu">
                                <li>test 2</li>
                                <li>test 3</li>
                            </ul>
                        </li>
                        <li>test 4</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Projects<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>
                            <a href="#" class="insted_mobile_link">test 1<i class="bi bi-chevron-down"></i></a>
                            <ul class="small_ul_menu">
                                <li>test 2</li>
                                <li>test 3</li>
                            </ul>
                        </li>
                        <li>test 4</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Education<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Testing<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Solution<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Technology<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">
                        DOC Validation<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Join Us <i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>

                <li class="mobile_li">
                    <a href="#" class="mobile_link">Find Us<i class="bi bi-chevron-down"></i></a>
                    <ul class="sub_mobile_menu">
                        <li>test 1</li>
                        <li>test 2</li>
                    </ul>
                </li>
            </ul>
        </ul>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <script src="{{ asset('content/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/kursor.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/all.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('content/js/vendors/swiper-bundle.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script>
    <script src="{{ asset('content/js/scripts.js') }}"></script>
    <script>
    function toggleReadMore() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("read-more-btn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read More";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read Less";
            moreText.style.display = "inline";
        }
    }
    </script>
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

</body>

</html>