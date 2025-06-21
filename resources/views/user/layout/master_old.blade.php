<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_name')</title>
    <link rel="shortcut icon" href="{{ asset('content/images/logo.svg') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/kursor.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/vendors/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/css/style.css') }}" />
    @yield('websiteStyle')
</head>

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
                                <li><a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL($lang->key) }}"
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
                <div class="second-contact-bg py-5 px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9">
                            <h1 class="text-center">
                                Get in Touch with Us
                            </h1>
                            <p class="fs-5-2 text-center text-muted mt-2">
                                {{ TranslationHelper::translateWeb(ucfirst("We're here to help! Whether you have questions, feedback, or need support, reach out to us, and we'll be happy to assist you.") ?? '') }}

                            </p>
                            <div class="d-flex justify-content-center mt-5">
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
                            <a href="https://www.google.com/maps?q=Riyadh+11433+Kingdom+of+Saudi+Arabia"
                                target="_blank" style="color: inherit; text-decoration: none;">
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
                            <div id="subscribe"
                                class="d-flex flex-column justify-content-center text-white-color mt-2">
                                <h6 class="tag-title">
                                    Subscribe Our Newsletter
                                </h6>
                                <p class="desc fs-5-2 mt-2">
                                    Join our newsletter and be the first to know about new product releases, discounts,
                                    and
                                    useful resources!
                                </p>
                                <div class="input-group rounded-pill overflow-hidden mt-4">
                                    <input type="text" class="form-control border-0"
                                        placeholder="Your email address" aria-label="Email"
                                        aria-describedby="basic-addon-email">
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
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                </svg>
                            </a>
                            <a href="{{ $about->instagram_link }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-instagram" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <a href="{{ $about->facebook_link }}" class="a_link"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $about->twitter_link }}" class="a_link"><i
                                        class="bi bi-twitter"></i></a>
                                <a href="{{ $about->instagram_link }}" class="a_link"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $about->youtube_link }}" class="a_link"><i
                                        class="bi bi-youtube"></i></a>
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


    <script src="{{ asset('content/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/kursor.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/all.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('content/js/vendors/swiper-bundle.min.js') }}"></script>
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
</body>

</html>
