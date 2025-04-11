@extends('store.master')
@section('content')
    <!--start page content-->
    <div class="page-content">

        <!--start carousel-->
        <section class="slider-section">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($storeSliders as $key => $slider)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="@if($loop->first)  active @endif"
                        aria-current="true"></button>
                        @endforeach
                    <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></button> -->
                </div>
                <div class="carousel-inner">
                    @foreach ($storeSliders as $slider)
                    <div class="carousel-item @if($loop->first)  active @endif bg-primary">
                        <div class="row d-flex align-items-center padding_slide">
                            <div class="col d-none d-lg-flex justify-content-center">
                                <div class="">
                                    <!-- <h3 class="h3 fw-light text-white fw-bold">New Arrival</h3> -->
                                    <h1 class="h1 text-white fw-bold">{{$slider->title}}</h1>
                                    <p class="text-white fw-bold">{{$slider->mini_desc}}</p>
                                    <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage') }}/{{$slider->image}}"
                                    class="img-fluid img_w" alt="...">
                            </div>
                        </div>
                    </div>
                    @endforeach


                    {{-- <div class="carousel-item bg-red">
                        <div class="row d-flex align-items-center padding_slide">
                            <div class="col d-none d-lg-flex justify-content-center">
                                <div class="">
                                    <!-- <h3 class="h3 fw-light text-white fw-bold">Latest Trending</h3> -->
                                    <h1 class="h1 text-white fw-bold">Business Management in the Modern Era</h1>
                                    <p class="text-white fw-bold">Strategies for Success and Sustainable Growth</p>
                                    <div class=""> <a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/acca_accredited_programme_tcm18-356350.png"
                                    class="img-fluid img_w" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item bg-purple">
                        <div class="row d-flex align-items-center padding_slide">
                            <div class="col d-none d-lg-flex justify-content-center">
                                <div class="">
                                    <!-- <h3 class="h3 fw-light text-white fw-bold">New Trending</h3> -->
                                    <h1 class="h1 text-white fw-bold">Mastering E-Marketing Your Path to Digital Success
                                    </h1>
                                    <p class="text-white fw-bold">Comprehensive E-Marketing Courses to Boost Your Skills
                                        and Grow Your Business</p>
                                    <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="{{ asset('store') }}/assets/images/222.png" class="img-fluid img_w"
                                    alt="...">
                            </div>
                        </div>
                    </div> --}}
                    <!-- <div class="carousel-item bg-yellow">
                <div class="row d-flex align-items-center">
                  <div class="col d-none d-lg-flex justify-content-center">
                    <div class="">
                      <h3 class="h3 fw-light text-dark fw-bold">Latest Trending</h3>
                      <h1 class="h1 text-dark fw-bold">Electronics Items</h1>
                      <p class="text-dark fw-bold"><i>Last call for upto 45%</i></p>
                      <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <img src="{{ asset('store') }}/assets/images/sliders/s_4.webp" class="img-fluid img_w" alt="...">
                  </div>
                </div>
              </div> -->
                    <!-- <div class="carousel-item bg-green">
                <div class="row d-flex align-items-center">
                  <div class="col d-none d-lg-flex justify-content-center">
                    <div class="">
                      <h3 class="h3 fw-light text-white fw-bold">Super Deals</h3>
                      <h1 class="h1 text-white fw-bold">Home Furniture</h1>
                      <p class="text-white fw-bold"><i>Last call for upto 24%</i></p>
                      <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <img src="{{ asset('store') }}/assets/images/sliders/s_5.webp" class="img-fluid img_w" alt="...">
                  </div>
                </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
    </section>
    <!--end carousel-->


    <!--start cartegory slider-->
    <section class="cartegory-slider section-padding bg-section-2">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">Top Categories</h3>
                <p class="mb-0 text-capitalize">Select your favorite categories and purchase</p>
            </div>
            <div class="cartegory-box">
                @foreach ($productCategories as $productCategory)
                    <a href="#">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage') . '/' . $productCategory->main_image }}"
                                        class="card-img-top rounded-0" alt="...">
                                </div>
                                <div class="text-center">
                                    <h5 class="mb-1 cartegory-name mt-3 fw-bold">{{$productCategory->title}}</h5>
                                    <!-- <h6 class="mb-0 product-number fw-bold">856 Products</h6> -->
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{-- <a href="shop-grid-type-4.html">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/basic programming/1.jpg"
                                    class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">basic programming</h5>
                                <!-- <h6 class="mb-0 product-number fw-bold">169 Products</h6> -->
                            </div>
                        </div>
                    </div>
                </a>
                <a href="shop-grid-type-4.html">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/business administration/1.jpg"
                                    class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">business administration</h5>
                                <!-- <h6 class="mb-0 product-number fw-bold">589 Products</h6> -->
                            </div>
                        </div>
                    </div>
                </a>
                <a href="shop-grid-type-4.html">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/courses on computer networks/1.jpg"
                                    class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">Computer networks</h5>
                                <!-- <h6 class="mb-0 product-number fw-bold">278 Products</h6> -->
                            </div>
                        </div>
                    </div>
                </a>
                <a href="shop-grid-type-4.html">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/accountaing_images/2.jpg"
                                    class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">Account Course</h5>
                                <!-- <h6 class="mb-0 product-number fw-bold">985 Products</h6> -->
                            </div>
                        </div>
                    </div>
                </a>
                <a href="shop-grid-type-4.html">
                    <div class="card">
                        <div class="card-body">
                            <div class="overflow-hidden">
                                <img src="{{ asset('store') }}/assets/images/ecommerce_imges/basic programming/5.jpg"
                                    class="card-img-top rounded-0" alt="...">
                            </div>
                            <div class="text-center">
                                <h5 class="mb-1 cartegory-name mt-3 fw-bold">basic programming</h5>
                                <!-- <h6 class="mb-0 product-number fw-bold">489 Products</h6> -->
                            </div>
                        </div>
                    </div>
                </a> --}}

            </div>
        </div>
    </section>
    <!--end cartegory slider-->

    <!--start Featured Products slider-->
    <section class="section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">OUR COURSES</h3>
                <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
            </div>
            <div class="product-thumbs">
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/1.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Programming courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/2.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Electronic commerce</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/3.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Artificial Intelligence Courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/4.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">English courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/5.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Graphic design courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/6.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">E-marketing courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/7.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Canva courses</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div
                            class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                            <a href="javascript:;"><i class="bi bi-heart"></i></a>
                            <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                    class="bi bi-zoom-in"></i></a>
                        </div>
                        <a href="product-details.html">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/9.jpeg" class="card-img-top"
                                alt="...">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="product-info text-center">
                            <h6 class="mb-1 fw-bold product-name">Motion graphics course</h6>
                            <div class="ratings mb-1 h6">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="mb-0 h6 fw-bold product-price">$49</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end Featured Products slider-->


    <!--start tabular product-->
    <section class="product-tab-section section-padding bg-light">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">The best sections</h3>
                <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
            </div>
            <div class="row">
                <div class="col-auto mx-auto">
                    <div class="product-tab-menu table-responsive">
                        <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">

                            @foreach ($productCategories->where('show_in_main',1) as $productCategory)
                            <li class="nav-item " role="presentation">
                                <button class="nav-link @if($loop->first)  active @endif " data-bs-toggle="pill" data-bs-target="#Category-{{$productCategory->id}}"
                                    type="button">
                                    {{$productCategory->title}}
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="tab-content tabular-product">
                @foreach ($productCategories->where('show_in_main',1) as $productCategory)
                <div class="tab-pane fade show  @if($loop->first)  active @endif" id="Category-{{$productCategory->id}}">
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
                        @foreach ($productCategory->products as $product)
                        <div class="col">
                            <div class="card">
                                <div class="position-relative overflow-hidden">
                                    <div
                                        class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                        {{-- <a href="javascript:;"><i class="bi bi-heart"></i></a> --}}
                                        {{-- <a href="javascript:;"><i class="bi bi-basket3"></i></a> --}}
                                        <a href="javascript:;" class="add-to-cart"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-image="{{ asset('storage') . '/' . $product->main_image }}">
                                            <i class="bi bi-basket3"></i>
                                        </a>

                                        {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i
                                                class="bi bi-zoom-in"></i></a> --}}
                                                <a href="javascript:;"
                                                    class="quick-view-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#QuickViewModal"
                                                    data-name="{{ $product->name }}"
                                                    data-price="{{ $product->price }}"
                                                    data-image="{{ asset('storage/' . $product->main_image) }}"
                                                    data-images="{{ json_encode($product->images->pluck('image')) }}">
                                                    <i class="bi bi-zoom-in"></i>
                                                </a>
                                    </div>
                                    <a href="product-details.html">
                                        <img src="{{ asset('storage') }}/{{$product->main_image}}"
                                            class="card-img-top" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="product-info text-center">
                                        <h6 class="mb-1 fw-bold product-name">{{$product->name}}</h6>
                                        <div class="ratings mb-1 h6">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </div>
                                        <p class="mb-0 h6 fw-bold product-price">${{$product->price}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--end tabular product-->


    <!--start features-->
    <section class="product-thumb-slider section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">What We Offer!</h3>
                <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 g-4">
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-primary">
                                <i class="bi bi-truck"></i>
                            </div>
                            <h5 class="fw-bold">Free Delivery</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-danger">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <h5 class="fw-bold">Secure Payment</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-success">
                                <i class="bi bi-minecart-loaded"></i>
                            </div>
                            <h5 class="fw-bold">Free Returns</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card depth border-0 rounded-0 border-bottom border-warning border-3 w-100">
                        <div class="card-body text-center">
                            <div class="h1 fw-bold my-2 text-warning">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5 class="fw-bold">24/7 Support</h5>
                            <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain
                                of itself.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end features-->


    <!--start special product-->
    <section class="section-padding bg-section-2">
        <div class="container">
            <div class="card border-0 rounded-0 p-3 depth">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('store') }}/assets/images/222.png" class="img-fluid rounded-0"
                            alt="...">
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body">
                            <h3 class="fw-bold">New Features of Trending Products</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent px-0">Contrary to popular belief, Lorem
                                    Ipsum is not simply
                                    random text.</li>
                                <li class="list-group-item bg-transparent px-0">All the Lorem Ipsum generators on the
                                    Internet tend.
                                </li>
                                <li class="list-group-item bg-transparent px-0">There are many variations of passages
                                    of Lorem Ipsum
                                    available.</li>
                                <li class="list-group-item bg-transparent px-0">There are many variations of passages
                                    available.</li>
                            </ul>
                            <div class="buttons mt-4 d-flex flex-column flex-lg-row gap-3">
                                <a href="javascript:;" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Buy Now</a>
                                <a href="javascript:;" class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start special product-->


    <!--start Brands-->
    <section class="section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 h3 fw-bold">Shop By Brands</h3>
                <p class="mb-0 text-capitalize">Select your favorite brands and purchase</p>
            </div>
            <div class="brands">
                <div class="row row-cols-2 row-cols-lg-5 g-4">
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/01.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/02.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/03.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/04.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/05.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/06.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/07.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/08.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/09.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border rounded brand-box">
                            <div class="d-flex align-items-center">
                                <a href="javascript:;">
                                    <img src="{{ asset('store') }}/assets/images/brands/10.webp" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end Brands-->

    <!--subscribe banner-->
    <section class="product-thumb-slider subscribe-banner p-5">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <div class="text-center">
                    <h3 class="mb-0 fw-bold text-white">Get Latest Update by <br> Subscribe Our Newslater</h3>
                    <div class="mt-3">
                        <input type="text" class="form-control form-control-lg bubscribe-control rounded-0 px-5 py-3"
                            placeholder="Enter your email">
                    </div>
                    <div class="mt-3 d-grid">
                        <button type="button"
                            class="btn btn-lg btn-ecomm bubscribe-button px-5 py-3">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--subscribe banner-->


    <!--start blog-->
    <section class="section-padding">
        <div class="container">
            <div class="text-center pb-3">
                <h3 class="mb-0 fw-bold">Latest Blog</h3>
                <p class="mb-0 text-capitalize">Check our latest news</p>
            </div>
            <div class="blog-cards">
                <div class="row row-cols-1 row-cols-lg-3 g-4">
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/blog1.jpeg"
                                class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                        <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-date">
                                        <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                                <p class="mb-0">Some quick example text to build on the card title and make.</p>
                                <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/blog2.jpeg"
                                class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                        <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-date">
                                        <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                                <p class="mb-0">Some quick example text to build on the card title and make.</p>
                                <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('store') }}/assets/images/ecommerce_imges/blog3.jpeg"
                                class="card-img-top rounded-0" alt="...">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-4">
                                    <div class="posted-by">
                                        <p class="mb-0"><i class="bi bi-person me-2"></i>Virendra</p>
                                    </div>
                                    <div class="posted-date">
                                        <p class="mb-0"><i class="bi bi-calendar me-2"></i>15 Aug, 2022</p>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold mt-3">Blog title here</h5>
                                <p class="mb-0">Some quick example text to build on the card title and make.</p>
                                <a href="blog-read.html" class="btn btn-outline-dark btn-ecomm mt-3">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end blog-->
    </div>
    <!--end page content-->
@endsection
