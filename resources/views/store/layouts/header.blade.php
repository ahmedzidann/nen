  @php
      $categories = \App\Models\Product\ProductCategory::all();

  @endphp
  <!--page loader-->
  <div class="loader-wrapper">
      <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
          <div class="spinner-border text-dark" role="status">
              <span class="visually-hidden">Loading...</span>
          </div>
      </div>
  </div>
  <!--end loader-->

  <!--start top header-->
  <header class="top-header">
      <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
          <a class="navbar-brand d-none d-xl-inline" href="{{route('web.store')}}"><img
                  src="{{ asset('store') }}/assets/images/logo.svg" class="logo-img" alt=""></a>
          <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar">
              <i class="bi bi-list"></i>
          </a>
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
              <div class="offcanvas-header">
                  <div class="offcanvas-logo"><img src="{{ asset('store') }}/assets/images/logo.svg" class="logo-img"
                          alt="">
                  </div>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
              </div>
              <div class="offcanvas-body primary-menu">
                  <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('web.store')}}">{{ TranslationHelper::translateWeb(ucfirst('Home')??'') }}</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                            data-bs-toggle="dropdown">
                            {{ TranslationHelper::translateWeb(ucfirst('Categories')??'') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href="{{route('products.index',['category_id'=>$category->id])}}">{{$category->title}}</a></li>
                            @endforeach

                        </ul>

                      <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">{{ TranslationHelper::translateWeb(ucfirst('products')??'') }}</a>
                    </li>
                      <li class="nav-item">
                          <a class="nav-link" href="about-us.html">{{ TranslationHelper::translateWeb(ucfirst('About')??'') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="contact-us.html">{{ TranslationHelper::translateWeb(ucfirst('Contact')??'') }}</a>
                      </li>
                      {{-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                              data-bs-toggle="dropdown">
                              Account
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a></li>
                              <li><a class="dropdown-item" href="account-orders.html">My Orders</a></li>
                              <li><a class="dropdown-item" href="account-profile.html">My Profile</a></li>
                              <li><a class="dropdown-item" href="account-edit-profile.html">Edit Profile</a></li>
                              <li><a class="dropdown-item" href="account-saved-address.html">Addresses</a></li>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                              <li><a class="dropdown-item" href="authentication-login.html">Login</a></li>
                              <li><a class="dropdown-item" href="authentication-register.html">Register</a></li>
                              <li><a class="dropdown-item" href="authentication-reset-password.html">Password</a></li>
                          </ul>
                      </li> --}}
                      {{-- <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                              data-bs-toggle="dropdown">
                              Blog
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                              <li><a class="dropdown-item" href="blog-read.html">Blog Read</a></li>
                          </ul>
                      </li> --}}
                  </ul>
              </div>
          </div>
          <ul class="navbar-nav secondary-menu flex-row">
              <li class="nav-item">
                  <a class="nav-link dark-mode-icon" href="javascript:;">
                      <div class="mode-icon">
                          <i class="bi bi-moon"></i>
                      </div>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="search.html"><i class="bi bi-search"></i></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="wishlist.html"><i class="bi bi-suit-heart"></i></a>
              </li>
              <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                  <a class="nav-link position-relative" href="javascript:;">
                      <div class="cart-badge">8</div>
                      <i class="bi bi-basket2"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="account-dashboard.html"><i class="bi bi-person-circle"></i></a>
              </li>
          </ul>
      </nav>
  </header>
  <!--end top header-->
