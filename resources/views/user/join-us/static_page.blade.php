@extends('user.layout.master')
@section('parent_page_name')
About
@endsection
@section('page_name')
Our Team
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
 <div class="container w-100 overflow-hidden">
    <h1 class="global-title">
        title Courses
    </h1>
    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';" alt="vector" />
    <p class="my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, possimus amet assumenda,
        obcaecati quo vitae laboriosam similique, voluptatum cumque ipsum odit quam quis minima? Repudiandae rem magnam
        similique eveniet reprehenderit!</p>
    <div class="rounded-4 overflow-hidden" style="height: 50vh;">
        <img src="{{ asset('content/images/graduated.png') }}" />
    </div>
    <div class="row clearfix my-3">
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/mobile-banking.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>Digital Banking</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/internet-banking.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>Digital Banking</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/online-payment.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>borrowing accounts</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/internet-banking.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>Digital Banking</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/mobile-banking.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>Digital Banking</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 service-block">
            <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                data-wow-duration="1500ms"
                style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                    <div class="img-icon">
                        <img src="{{ asset('content/images/online-payment.png') }}" />
                    </div>
                    <div class="shape"></div>
                    <div class="icon-box"><i class="icon-12"></i></div>
                    <h2>borrowing accounts</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis corporis magni
                        possimus! Adipisci odit eos labore vero reprehenderit dolorum a assumenda in, veritatis iusto!
                        Minus voluptatum pariatur sapiente quisquam?</p>
                    <a href="">More</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection