<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('page_name')</title>
  <link rel="shortcut icon" href="{{asset('content/images/logo.svg')}}" />
  <link rel="stylesheet" href="{{asset('content/css/vendors/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('content/css/vendors/kursor.css')}}" />
  <link rel="stylesheet" href="{{asset('content/css/vendors/bootstrap-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('content/css/vendors/swiper-bundle.min.css')}}" />
  <link rel="stylesheet" href="{{asset('content/css/style.css')}}" />
  @yield('websiteStyle')
</head>

<body>

  <div class="loader-wrapper">
    <!-- <img src="content/images/small_icon/logo.svg" alt=""> -->
    <div class="loader"></div>
  </div>

  <!--start_header  -->
  <div class="header_section">
    <div class="container">
      <div class="first_part">
        <div class="logo_pro_div">
          <a href="about.html"><img class="logo_pro" src="{{asset('content/images/logo.svg')}}"></a>

          <div class="toggel_header">
            <a href="#" class="btn_menu"><i class="bi bi-list"></i></a>
          </div>
        </div>

        <div class="small_photes_div">
          <a href="#"><img src="{{asset('content/images/small_icon/headphon_icon.svg')}}" /><span>Contact us</span></a>
          <a href="#"><img src="{{asset('content/images/small_icon/wallet_icon.svg')}}" /><span>E-wallet</span></a>
          <a href="#"><img src="{{asset('content/images/small_icon/wallet_icon.svg')}}" /><span>Store</span></a>
          <a href="#"><img src="{{asset('content/images/small_icon/lang_icon.svg')}}" /><a><span>Language</span></a>
            <a href="#"><img src="{{asset('content/images/small_icon/media_icon.svg')}}" /><span>Media Center</span></a>
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
        <h1>{{ strtoupper(trim(\Illuminate\Support\Str::of(trim($__env->yieldContent('page_name')))->stripTags())) }}</h1>
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
  <!-- footer -->

  <section class="footer_sec">
    <div class="bg_footer" style="background-image: url({{asset('content/images/team2.png')}})">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="logo_footer_div">
              <img class="footer_img" src="{{asset('content/images/logo.svg')}}" />
              <p>
               {{$about->translate('text', app()->getLocale())}}
              </p>

              <div class="socail_div">
                <a href="{{$about->facebook_link}}" class="a_link"><i class="bi bi-facebook"></i></a>
                <a href="{{$about->twitter_link}}" class="a_link"><i class="bi bi-twitter"></i></a>
                <a href="{{$about->instagram_link}}" class="a_link"><i class="bi bi-instagram"></i></a>
                <a href="{{$about->youtube_link}}" class="a_link"><i class="bi bi-youtube"></i></a>
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


  <script src="{{asset('content/js/vendors/jquery.min.js')}}"></script>
  <script src="{{asset('content/js/vendors/kursor.min.js')}}"></script>
  <script src="{{asset('content/js/vendors/all.min.js')}}"></script>
  <script src="{{asset('content/js/vendors/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('content/js/vendors/swiper-bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script>
  <script src="{{asset('content/js/scripts.js')}}"></script>
@yield('websiteScript')
</body>

</html>
