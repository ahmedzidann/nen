@extends('user.layout.master')
@section('parent_page_name')
    Testing
@endsection
@section('page_name')
    {{ $tech->name }}
@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')

    <div class="testing" style="display: none;">
        <div class="container">
            <div class="text-start">
                <!-- <h6 class="fs-5 mb-1 text-muted">Testing</h6> -->
                <h5 class="global-title">
                    {{ $tech->name }}
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="vector">
                </div>
            </div>

            @if ($fSection = $items)
                <div id="about-section">
                    <div class="flex_sec_content row g-5">
                        <!-- <div class="col-md-7"> -->
                        <div class="col-12">
                            {{-- <h3 class="decorated-title">
                                {{ $fSection->title }}
                    <!-- <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="vector"> -->
                    </h3> --}}
                            <div class="data">
                                <p class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($fSection->description) >= 300 ? 'p_clamp_2' : '' }}"
                                    id="description_text">

                                </p>

                                @if (strlen($fSection->description) >= 400)
                                    <a role='btn' onclick="toggleDescription(this)"
                                        class="mt-3 read_more read_more_btn">{{ TranslationHelper::translateWeb(ucfirst('Read More')??'') }}
                                        <i class="bi bi-chevron-down"></i></a>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="col-md-5">
                        <div class="about-image-item card border-0 w-100 container-data">
                            <div class="about-image-container h-100">
                                <img src="{{ $fSection->getFirstMediaUrl('Testing') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="about image">
                            </div>
                            <div class="blob"></div>
                        </div>
                    </div> -->

                    </div>
            @endif
            <hr>
            <div class="counter_sec">
                @if ($items)
                    @foreach ($items->where('item', 'section-two') as $item)
                        <div class="hovering-lighted-card">
                            <div class="bg">
                                <div class="counter-item p-3">
                                    <div class="image-count d-flex justify-content-center mt-2">
                                        <img src="{{ $item->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="count image">
                                    </div>
                                    <h2 class="fs-4 fw-bold">{{ $item->title }}</h2>
                                    <p>{{ $item->subtitle }}</p>
                                </div>
                            </div>
                            <div class="blob"></div>
                        </div>
                    @endforeach
                @else
                    @include('user.layout.includes.no-data')
                @endif
            </div>
        </div>
    </div>
    </div>

    <!-- Section 1: Image Right, Text Left -->
    <section class="image-text-section-no-bg py-4 mt-3">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="global-title mb-0">Innovative Testing Solutions</h2>
                    <div class="under-title-vector mb-4">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                    </div>
                    <div>
                        <p class="section-description mb-4">
                            We provide innovative and advanced testing solutions that help you improve the quality of your products and services. 
                            Through a team of specialized experts, we guarantee the best results and the highest quality standards.
                        </p>
                        <p class="section-description mb-4">
                            We use the latest technologies and tools to ensure comprehensive and effective testing for all aspects of your project.
                            With years of experience in this field, we are your ideal partner for success.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="image-wrapper-unified-small">
                        <img src="{{ asset('content/images/about_img.png') }}" 
                             alt="Testing Solutions" 
                             class="img-fluid rounded-modern">
                        <div class="image-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Company Info with Image -->
    <section class="company-info-section py-0 my-4">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- Left: Image -->
                <div class="col-lg-6">
                    <div class="company-image-wrapper">
                        <img src="{{ asset('content/images/about_img.png') }}" 
                             alt="Company Meeting" 
                             class="img-fluid h-100 w-100 object-fit-cover">
                    </div>
                </div>
                
                <!-- Right: Info Cards -->
                <div class="col-lg-6">
                    <div class="company-info-cards">
                        <!-- History Card -->
                        <div class="info-card active align-items-center" onclick="toggleInfoCard(this)">
                            <div class="info-icon-wrapper">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-title">{{ __('History') }}</h3>
                                <p>
                                    Global for Integrated Business Solutions is an Egyptian company established in June 2019. 
                                    We specialize in managing projects, marketing, advertising, employment, data verification, 
                                    software implementation and development, managing business incubators, supporting entrepreneurship, 
                                    and managing training and testing centers.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Vision Card -->
                        <div class="info-card" onclick="toggleInfoCard(this)">
                            <div class="info-icon-wrapper">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-title">{{ __('Vision') }}</h3>
                                <p>
                                    To be the prime, respected source of business expertise for organizations seeking 
                                    to realize the full potential of their resources and markets.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Mission Card -->
                        <div class="info-card" onclick="toggleInfoCard(this)">
                            <div class="info-icon-wrapper">
                                <i class="bi bi-globe"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-title">{{ __('Mission') }}</h3>
                                <p>
                                    To help business organizations achieve their shareholders' objectives, attract and retain talents, 
                                    leverage their core competencies, develop sustainable competitive advantages, 
                                    and contribute to their economies.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Features with Icons -->
    <section class="features-section py-4">
        <div class="container">
            <div class="text-center mb-5 w-100">
                <h2 class="global-title">{{ __('Our Key Features') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">We offer a wide range of features that make us the best choice</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="feature-title">{{ __('Quality Assurance') }}</h4>
                        <p class="feature-description">Comprehensive quality assurance for all projects</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h4 class="feature-title">{{ __('Fast Performance') }}</h4>
                        <p class="feature-description">Fast and efficient performance in execution</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4 class="feature-title">{{ __('Expert Team') }}</h4>
                        <p class="feature-description">Team of professional experts</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 class="feature-title">{{ __('24/7 Support') }}</h4>
                        <p class="feature-description">24/7 technical support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Statistics -->
    <section class="statistics-section py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <h3 class="stat-number" data-count="500">0</h3>
                        <p class="stat-label">{{ __('Completed Projects') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3 class="stat-number" data-count="350">0</h3>
                        <p class="stat-label">{{ __('Happy Clients') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h3 class="stat-number" data-count="50">0</h3>
                        <p class="stat-label">{{ __('Awards Won') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="stat-number" data-count="98">0</h3>
                        <p class="stat-label">{{ __('Success Rate %') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section: Process / Work Process Cards -->
    <section class="process-cards-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{ __('Our Work Process') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{{ __('Follow our systematic approach to delivering quality results.') }}</p>
            </div>
            
            <div class="row g-4">
                <!-- Step 01 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-card">
                        <div class="process-badge">01</div>
                        <div class="process-icon">
                            <i class="bi bi-clipboard-data"></i>
                        </div>
                        <h4 class="process-title">{{ __('Requirements Analysis') }}</h4>
                        <p class="process-description">
                            {{ __('Understanding your project goals and expectations to create a comprehensive strategy.') }}
                        </p>
                    </div>
                </div>

                <!-- Step 02 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-card">
                        <div class="process-badge">02</div>
                        <div class="process-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <h4 class="process-title">{{ __('Test Planning') }}</h4>
                        <p class="process-description">
                            {{ __('Developing detailed test plans and quality metrics aligned with your objectives.') }}
                        </p>
                    </div>
                </div>

                <!-- Step 03 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-card">
                        <div class="process-badge">03</div>
                        <div class="process-icon">
                            <i class="bi bi-gear"></i>
                        </div>
                        <h4 class="process-title">{{ __('Environment Setup') }}</h4>
                        <p class="process-description">
                            {{ __('Configuring necessary testing environments and tools for accurate execution.') }}
                        </p>
                    </div>
                </div>

                <!-- Step 04 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="process-card">
                        <div class="process-badge">04</div>
                        <div class="process-icon">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <h4 class="process-title">{{ __('Test Execution') }}</h4>
                        <p class="process-description">
                            {{ __('Executing comprehensive testing across all platforms and scenarios.') }}
                        </p>
                    </div>
                </div>

                <!-- Step 05 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="process-card">
                        <div class="process-badge">05</div>
                        <div class="process-icon">
                            <i class="bi bi-bug"></i>
                        </div>
                        <h4 class="process-title">{{ __('Defect Reporting') }}</h4>
                        <p class="process-description">
                            {{ __('Documenting all issues with detailed reproduction steps and evidence.') }}
                        </p>
                    </div>
                </div>

                <!-- Step 06 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="process-card">
                        <div class="process-badge">06</div>
                        <div class="process-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h4 class="process-title">{{ __('Final Delivery') }}</h4>
                        <p class="process-description">
                            {{ __('Providing comprehensive reports with results and quality metrics.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Website Design with Images -->
    <section class="website-design-section py-5">
        <div class="container">
            <div class="row align-items-stretch g-4">
                <!-- Left: Images -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="design-images-wrapper">
                        <div class="main-design-image">
                            <img src="{{ asset('content/images/about_img.png') }}" 
                                 alt="Team Meeting" 
                                 class="img-fluid rounded">
                        </div>
                        <div class="secondary-design-image">
                            <img src="{{ asset('content/images/about_img.png') }}" 
                                 alt="Team Fun" 
                                 class="img-fluid rounded">
                        </div>
                    </div>
                </div>
                
                <!-- Right: Content -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="design-content">
                        <h2 class="global-title">{{ __('Designing Websites That Drive Success') }}</h2>
                        <div class="under-title-vector mb-4">
                            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                        </div>
                        <p class="design-description">
                            We create stunning, user-friendly websites that not only look great but also deliver 
                            measurable results. Our team combines creativity with technical expertise to build 
                            digital experiences that engage your audience and grow your business.
                        </p>
                        
                        <div class="design-features">
                            <div class="design-feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{{ __('Refreshing to get such a personal touch') }}</span>
                            </div>
                            <div class="design-feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{{ __('Making this the first true generator on the Internet') }}</span>
                            </div>
                        </div>
                        
                        <p class="design-description mb-4">
                            Our approach ensures that every project is tailored to your unique needs, delivering 
                            solutions that exceed expectations and provide long-term value for your business.
                        </p>
                        
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="design-support-box">
                                    <h5 class="support-title">{{ __('24/7 Support') }}</h5>
                                    <p class="support-text">
                                        Our dedicated support team is available around the clock to assist you with any 
                                        questions or concerns, ensuring your website runs smoothly at all times.
                                    </p>
                                </div>
                                
                                <a href="#" class="btn-discover">
                                    {{ __('DISCOVER MORE') }}
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                            
                            <div class="col-lg-4 d-flex">
                                <div class="trusted-badge">
                                    <i class="bi bi-people-fill"></i>
                                    <span>{{ __('Trusted by clients') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials-section py-5">
        <div class="container">
            <div class="text-center mb-3 w-100" data-aos="fade-down">
                <h2 class="global-title">{{ __('What Our Clients Say') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">Real feedback from satisfied clients who trust our services</p>
            </div>

            <div class="testimonials-slider-container">
                <div class="row g-4 testimonials-slides" id="testimonialsSlides">
                    <!-- Testimonial 1 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "Outstanding testing services! The team was professional, thorough, and delivered 
                                exceptional results. Our application quality improved significantly."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('John Anderson') }}</h5>
                                    <p class="client-position">{{ __('CEO, TechStart Inc.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "Their attention to detail is remarkable. They found critical issues we had missed 
                                and provided valuable recommendations for improvement."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('Sarah Williams') }}</h5>
                                    <p class="client-position">{{ __('Product Manager, Digital Solutions') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <p class="testimonial-text">
                                "Excellent communication and transparency throughout the entire testing process. 
                                The reports were detailed and easy to understand."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('Michael Chen') }}</h5>
                                    <p class="client-position">{{ __('CTO, Innovation Labs') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "Best testing partner we've ever worked with. They helped us reduce bugs by 80% 
                                and significantly improved our user experience."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('Emma Thompson') }}</h5>
                                    <p class="client-position">{{ __('Founder, StartupHub') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 5 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "Their expertise in automated testing saved us countless hours. The team is 
                                knowledgeable, responsive, and truly committed to quality."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('David Martinez') }}</h5>
                                    <p class="client-position">{{ __('Director, Enterprise Systems') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 6 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="bi bi-quote"></i>
                            </div>
                            <div class="stars-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="testimonial-text">
                                "Highly recommend their services! They provide comprehensive testing coverage 
                                and helped us launch our product with confidence."
                            </p>
                            <div class="client-info">
                                <div class="client-image">
                                    <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=150&h=150&fit=crop&q=85" 
                                         alt="Client" class="img-fluid">
                                </div>
                                <div class="client-details">
                                    <h5 class="client-name">{{ __('Lisa Johnson') }}</h5>
                                    <p class="client-position">{{ __('VP Engineering, CloudTech') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Navigation Arrows -->
                <div class="testimonials-navigation-arrows">
                    <button class="testimonials-nav-btn prev-testimonial-btn" onclick="changeTestimonialSlide(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="testimonials-nav-btn next-testimonial-btn" onclick="changeTestimonialSlide(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: How We Work Timeline -->
    <section class="work-timeline-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{ __('How We Work') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{{ __('Simple and effective steps to ensure the best results') }}</p>
            </div>

            <!-- Decorative Background Circles -->
            <div class="timeline-deco-circles">
                <div class="deco-circle circle-1"></div>
                <div class="deco-circle circle-2"></div>
            </div>

            <div class="timeline-container">
                <!-- Timeline Vertical Line -->
                <div class="timeline-line"></div>

                <!-- Step 01: Initial Consultation (Right) -->
                <div class="timeline-item right" data-aos="fade-right" data-aos-delay="100">
                    <div class="timeline-dot">
                        <span class="dot-number">01</span>
                        <div class="dot-pulse"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4 class="timeline-title">{{ __('Initial Consultation') }}</h4>
                        <p class="timeline-desc">{{ __('Understanding your project requirements and goals.') }}</p>
                        <div class="timeline-features">
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Requirements') }}
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Scope') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Step 02: Strategy Development (Left) -->
                <div class="timeline-item left" data-aos="fade-left" data-aos-delay="200">
                    <div class="timeline-dot">
                        <span class="dot-number">02</span>
                        <div class="dot-pulse"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h4 class="timeline-title">{{ __('Strategy Development') }}</h4>
                        <p class="timeline-desc">{{ __('Developing testing strategy tailored to your needs.') }}</p>
                        <div class="timeline-features">
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Test Plan') }}
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Tools') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Step 03: Testing Execution (Right) -->
                <div class="timeline-item right" data-aos="fade-right" data-aos-delay="300">
                    <div class="timeline-dot">
                        <span class="dot-number">03</span>
                        <div class="dot-pulse"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            <i class="bi bi-gear"></i>
                        </div>
                        <h4 class="timeline-title">{{ __('Testing Execution') }}</h4>
                        <p class="timeline-desc">{{ __('Comprehensive testing across all scenarios.') }}</p>
                        <div class="timeline-features">
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Automation') }}
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Bug Fixing') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Step 04: Reporting & Delivery (Left) -->
                <div class="timeline-item left" data-aos="fade-left" data-aos-delay="400">
                    <div class="timeline-dot">
                        <span class="dot-number">04</span>
                        <div class="dot-pulse"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4 class="timeline-title">{{ __('Reporting & Delivery') }}</h4>
                        <p class="timeline-desc">{{ __('Detailed reports with actionable insights.') }}</p>
                        <div class="timeline-features">
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Reports') }}
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                                {{ __('Support') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Services -->
    <section class="services-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{ __('SERVICES') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
            </div>

            <div class="services-grid">
                <!-- Marketing Consultancy -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Marketing Consultancy') }}</h4>
                        <p class="service-description">
                            Strategic marketing solutions to help your business grow and reach its target audience effectively.
                        </p>
                    </div>
                </div>

                <!-- Digital Marketing -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Digital Marketing') }}</h4>
                        <p class="service-description">
                            Comprehensive digital marketing campaigns to boost your online presence and engagement.
                        </p>
                    </div>
                </div>

                <!-- Brand Building -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-award"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Brand Building') }}</h4>
                        <p class="service-description">
                            Create a strong brand identity that resonates with your customers and stands out in the market.
                        </p>
                    </div>
                </div>

                <!-- Software Development -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="250">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Software Development') }}</h4>
                        <p class="service-description">
                            Custom software solutions tailored to meet your business needs and enhance productivity.
                        </p>
                    </div>
                </div>

                <!-- Graphic Design -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-palette"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Graphic Design') }}</h4>
                        <p class="service-description">
                            Creative and professional graphic design services for all your branding and marketing materials.
                        </p>
                    </div>
                </div>

                <!-- Infographic Videos -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="350">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-camera-video"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Infographic Videos') }}</h4>
                        <p class="service-description">
                            Engaging infographic videos that simplify complex information and capture audience attention.
                        </p>
                    </div>
                </div>

                <!-- Strategic Consulting -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Strategic Consulting') }}</h4>
                        <p class="service-description">
                            Expert consulting services to help you make informed decisions and achieve business goals.
                        </p>
                    </div>
                </div>

                <!-- Mobile Development -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="450">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-phone"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Mobile Development') }}</h4>
                        <p class="service-description">
                            Native and cross-platform mobile applications for iOS and Android devices.
                        </p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-share"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Social Media') }}</h4>
                        <p class="service-description">
                            Social media management and strategy to build your online community and increase engagement.
                        </p>
                    </div>
                </div>

                <!-- SEO -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="550">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('SEO') }}</h4>
                        <p class="service-description">
                            Search engine optimization to improve your website ranking and drive organic traffic.
                        </p>
                    </div>
                </div>

                <!-- Project Management -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-kanban"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Project Management') }}</h4>
                        <p class="service-description">
                            Professional project management services to ensure timely delivery and successful outcomes.
                        </p>
                    </div>
                </div>

                <!-- Data Verification -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="650">
                    <div class="service-icon-wrapper">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">{{ __('Data Verification') }}</h4>
                        <p class="service-description">
                            Accurate data verification and validation services to ensure data integrity and quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: CTA (Call to Action) -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="cta-card" data-aos="zoom-in">
                <div class="row align-items-center g-4">
                    <!-- Left Content -->
                    <div class="col-lg-7">
                        <div class="cta-content">
                            <span class="cta-badge">{{ __('Start Now') }}</span>
                            <h2 class="cta-title">{{ __('Ready to Elevate Your Product Quality?') }}</h2>
                            <p class="cta-description">
                                {{ __('Join hundreds of satisfied clients who trust our testing services. Get started today and experience the difference in quality assurance.') }}
                            </p>
                            <ul class="cta-features">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ __('Free Consultation') }}</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ __('Flexible Pricing') }}</span>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>{{ __('24/7 Support') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-5">
                        <div class="cta-actions">
                            <a href="#contact" class="cta-btn cta-btn-primary">
                                {{ __('Get Started') }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="#contact" class="cta-btn cta-btn-secondary">
                                <i class="bi bi-telephone"></i>
                                {{ __('Contact Us') }}
                            </a>
                            <p class="cta-note">
                                <i class="bi bi-shield-check"></i>
                                {{ __('No credit card required') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: FAQ -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title" style="font-size: 1.6rem; font-weight: 700;">{{ __('Frequently Asked Questions') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start" style="font-size: 1.1rem;">Answers to the most frequently asked questions about our services</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-7 order-2 order-lg-1" data-aos="fade-right">
                    <div class="faq-container-professional">
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="100">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5>{{ __('What testing services do you provide?') }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>We offer a wide range of testing services including automated testing, performance testing, security testing, mobile testing, and many more specialized services.</p>
                            </div>
                        </div>
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="200">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5>{{ __('How long does a typical testing project take?') }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>Project time depends on its size and complexity, but most of our projects take from two weeks to two months. We work closely with our clients to determine a realistic timeline.</p>
                            </div>
                        </div>
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="300">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5>{{ __('Do you provide detailed test reports?') }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>Yes, we provide comprehensive and detailed test reports that include all results, recommendations, and suggested next steps to improve your product quality.</p>
                            </div>
                        </div>
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="400">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5>{{ __('What is your pricing model?') }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>We offer flexible pricing models to suit different client needs, including hourly, project-based, or monthly subscription pricing. Contact us for a customized quote.</p>
                            </div>
                        </div>
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="500">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5>{{ __('Can you work with our existing development team?') }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>Of course! We work collaboratively with internal development teams and integrate seamlessly with current workflows to ensure the best results.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left">
                    <div class="faq-image-wrapper">
                        <div class="faq-main-image">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=900&fit=crop&q=85" 
                                 alt="FAQ" class="img-fluid">
                        </div>
                        <div class="faq-circle-image">
                            <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=250&h=250&fit=crop&q=85" 
                                 alt="Support" class="img-fluid">
                        </div>
                        <div class="faq-shape shape-1"></div>
                        <div class="faq-shape shape-2"></div>
                        <div class="faq-shape shape-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section 6: Modern Cards -->
    <section class="modern-cards-section py-4">
        <div class="container">
            <div class="text-center mb-5 w-100">
                <h2 class="global-title">{{ __('Why Choose Us') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">We provide the best services with exceptional features</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-lightbulb card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Innovation') }}</h4>
                        <p class="card-description">
                            We use the latest technologies and innovative tools to provide advanced and sophisticated testing solutions.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('innovation', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-patch-check card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Reliability') }}</h4>
                        <p class="card-description">
                            We guarantee reliable and accurate results with commitment to deadlines and high standards.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('reliability', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="300">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-graph-up-arrow card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Scalability') }}</h4>
                        <p class="card-description">
                            Our solutions are scalable to fit your growing needs from small to large projects.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('scalability', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="400">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-clock-history card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Time Efficiency') }}</h4>
                        <p class="card-description">
                            We work with high efficiency to deliver projects on time without compromising quality.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('efficiency', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="500">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-shield-lock card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Security First') }}</h4>
                        <p class="card-description">
                            We prioritize security and maintain the confidentiality of your information and data with the highest standards.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('security', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="600">
                    <div class="modern-card">
                        <div class="card-icon-wrapper">
                            <i class="bi bi-chat-dots card-icon"></i>
                        </div>
                        <h4 class="card-title">{{ __('Communication') }}</h4>
                        <p class="card-description">
                            We maintain continuous and clear communication with you throughout the project to ensure your complete satisfaction.
                        </p>
                        <div class="card-footer-link">
                            <a href="#" onclick="openFeatureModal('communication', event)">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Modal Popup -->
    <div class="feature-modal" id="featureModal">
        <div class="feature-modal-overlay" onclick="closeFeatureModal()"></div>
        <div class="feature-modal-content">
            <div class="feature-modal-header">
                <div class="feature-modal-icon" id="modalIcon">
                    <i class="bi bi-lightbulb"></i>
                </div>
                <h3 class="feature-modal-title" id="modalTitle">{{ __('Feature Title') }}</h3>
                <button class="feature-modal-close" onclick="closeFeatureModal()">
                    <i class="bi bi-x"></i>
                </button>
            </div>
            <div class="feature-modal-body" id="modalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="feature-modal-footer">
                <button class="feature-modal-btn" onclick="closeFeatureModal()">
                    {{ __('Got It!') }}
                </button>
            </div>
        </div>
    </div>

        <!-- Section 5: Team Members Cards -->
        <section class="team-section py-4">
        <div class="container">
            <div class="text-center mb-5 w-100">
                <h2 class="global-title">{{ __('Our Expert Team') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">A team of experts specialized in testing and quality assurance</p>
            </div>
            
            <div class="team-slider-container">
                <div class="row g-4 team-slides" id="teamSlides">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Ahmed Hassan') }}</h4>
                            <p class="team-position">{{ __('Senior QA Engineer') }}</p>
                            <p class="team-description">Expert in performance and security testing with 8 years of experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Sara Mohamed') }}</h4>
                            <p class="team-position">{{ __('Automation Specialist') }}</p>
                            <p class="team-description">Specialized in automated testing and CI/CD tools</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Mohamed Ali') }}</h4>
                            <p class="team-position">{{ __('Mobile Testing Expert') }}</p>
                            <p class="team-description">Expert in mobile application testing</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Fatma Ibrahim') }}</h4>
                            <p class="team-position">{{ __('Quality Assurance Lead') }}</p>
                            <p class="team-description">Quality Assurance Team Lead with 10 years of experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Khaled Mahmoud') }}</h4>
                            <p class="team-position">{{ __('Performance Testing Engineer') }}</p>
                            <p class="team-description">Specialized in performance testing and speed optimization</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="600">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Nour Ahmed') }}</h4>
                            <p class="team-position">{{ __('Security Testing Specialist') }}</p>
                            <p class="team-description">Expert in security and penetration testing</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="700">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Omar Said') }}</h4>
                            <p class="team-position">{{ __('Test Manager') }}</p>
                            <p class="team-description">Testing Manager and Strategic Planning</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="800">
                    <div class="team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('content/images/about_img.png') }}" alt="Team Member" class="img-fluid">
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h4 class="team-name">{{ __('Heba Youssef') }}</h4>
                            <p class="team-position">{{ __('API Testing Expert') }}</p>
                            <p class="team-description">Specialized in API and web services testing</p>
                        </div>
                    </div>
                </div>
                </div>
                
                <!-- Team Navigation Arrows -->
                <div class="team-navigation-arrows">
                    <button class="team-nav-btn prev-btn" onclick="changeTeamSlide(-1)">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="team-nav-btn next-btn" onclick="changeTeamSlide(1)">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

        <!-- Section: Client Testimonials -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Insert the description content from the server into the <p> element
            const content =
                @if ($fSection)
                    `{!! htmlspecialchars_decode($fSection->description, ENT_QUOTES | ENT_HTML5) !!}`
                @else
                    ""
                @endif ;
            const description = document.getElementById('description_text');
            description.innerHTML = content;

            // Define the toggleDescription function globally so it can be used in the HTML
            window.toggleDescription = function(button) {
                const description = button.previousElementSibling; // Get the previous <p> element

                if (description.classList.contains('p_clamp_2')) {
                    description.classList.remove('p_clamp_2');
                    button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
                } else {
                    description.classList.add('p_clamp_2');
                    button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
                }
            };

            // FAQ Style Accordion functionality
            window.toggleAccordion = function(header) {
                const item = header.parentElement;
                const body = item.querySelector('.accordion-body-faq');
                const allItems = document.querySelectorAll('.accordion-item-faq');

                // Close all other accordion items
                allItems.forEach(function(accItem) {
                    if (accItem !== item) {
                        accItem.classList.remove('active');
                        accItem.querySelector('.accordion-body-faq').style.maxHeight = '0';
                    }
                });

                // Toggle current item
                if (item.classList.contains('active')) {
                    item.classList.remove('active');
                    body.style.maxHeight = '0';
                } else {
                    item.classList.add('active');
                    body.style.maxHeight = body.scrollHeight + 'px';
                }
            };

            // Professional FAQ functionality
            window.toggleFaq = function(question) {
                const faqItem = question.parentElement;
                const answer = faqItem.querySelector('.faq-answer-professional');
                const icon = question.querySelector('i');
                const allFaqItems = document.querySelectorAll('.faq-item-professional');

                // Toggle current FAQ
                if (faqItem.classList.contains('active')) {
                    faqItem.classList.remove('active');
                    answer.style.maxHeight = '0';
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    // Close all FAQs
                    allFaqItems.forEach(function(item) {
                        item.classList.remove('active');
                        item.querySelector('.faq-answer-professional').style.maxHeight = '0';
                        item.querySelector('i').style.transform = 'rotate(0deg)';
                    });

                    // Open current FAQ
                    faqItem.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    icon.style.transform = 'rotate(45deg)';
                }
            };

            // Counter animation for statistics
            function animateCounter(element) {
                const target = parseInt(element.getAttribute('data-count'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 16);
            }

            // Intersection Observer for counter animation
            const counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            // Observe all stat numbers
            document.querySelectorAll('.stat-number').forEach(function(element) {
                counterObserver.observe(element);
            });

            // Team Slider functionality
            let currentPage = 0;
            let slidesPerView = 4;
            let totalCards = 0;

            function updateSlidesPerView() {
                if (window.innerWidth >= 992) {
                    slidesPerView = 4;
                } else if (window.innerWidth >= 768) {
                    slidesPerView = 2;
                } else {
                    slidesPerView = 1;
                }
            }

            function showTeamSlide() {
                const slidesContainer = document.getElementById('teamSlides');
                if (!slidesContainer) return;
                
                updateSlidesPerView();
                const translateX = currentPage * 100;
                
                slidesContainer.style.transform = `translateX(${translateX}%)`;
                slidesContainer.style.transition = 'transform 0.5s ease';
                
                // Update button states
                updateButtonStates();
            }

            function updateButtonStates() {
                const prevBtn = document.querySelector('.prev-btn');
                const nextBtn = document.querySelector('.next-btn');
                const totalPages = Math.ceil(totalCards / slidesPerView) - 1;
                const isRTL = document.documentElement.dir === 'rtl' || document.body.classList.contains('rtl');
                
                if (prevBtn && nextBtn) {
                    if (isRTL) {
                        // RTL: currentPage goes 0 to positive
                        prevBtn.disabled = currentPage <= 0;
                        nextBtn.disabled = currentPage >= totalPages;
                        
                        prevBtn.style.opacity = currentPage <= 0 ? '0.5' : '1';
                        nextBtn.style.opacity = currentPage >= totalPages ? '0.5' : '1';
                    } else {
                        // LTR: currentPage goes 0 to negative
                        prevBtn.disabled = currentPage >= 0;
                        nextBtn.disabled = currentPage <= -totalPages;
                        
                        prevBtn.style.opacity = currentPage >= 0 ? '0.5' : '1';
                        nextBtn.style.opacity = currentPage <= -totalPages ? '0.5' : '1';
                    }
                }
            }

            window.changeTeamSlide = function(direction) {
                updateSlidesPerView();
                const totalPages = Math.ceil(totalCards / slidesPerView) - 1;
                
                // Check if RTL (Arabic)
                const isRTL = document.documentElement.dir === 'rtl' || document.body.classList.contains('rtl');
                
                if (isRTL) {
                    // In RTL: move opposite direction
                    currentPage += direction;
                    // Clamp the page for RTL
                    if (currentPage < 0) {
                        currentPage = 0;
                    } else if (currentPage > totalPages) {
                        currentPage = totalPages;
                    }
                } else {
                    // In LTR: normal direction
                    currentPage -= direction;
                    // Clamp the page for LTR
                    if (currentPage > 0) {
                        currentPage = 0;
                    } else if (currentPage < -totalPages) {
                        currentPage = -totalPages;
                    }
                }
                
                showTeamSlide();
            };

            // Initialize team slider
            function initTeamSlider() {
                const teamCards = document.querySelectorAll('.team-card');
                totalCards = teamCards.length;
                const slidesContainer = document.getElementById('teamSlides');
                
                if (slidesContainer && teamCards.length > 0) {
                    updateSlidesPerView();
                    currentPage = 0;
                    showTeamSlide();
                }
            }

            // Initialize on page load
            setTimeout(function() {
                initTeamSlider();
            }, 100);

            // Handle window resize
            window.addEventListener('resize', function() {
                initTeamSlider();
            });

            // Open first FAQ item by default
            const firstFaqItem = document.querySelector('.faq-item-professional');
            if (firstFaqItem) {
                const firstQuestion = firstFaqItem.querySelector('.faq-question-professional');
                const firstAnswer = firstFaqItem.querySelector('.faq-answer-professional');
                const firstIcon = firstFaqItem.querySelector('i');
                
                firstFaqItem.classList.add('active');
                firstAnswer.style.maxHeight = firstAnswer.scrollHeight + 'px';
                firstIcon.style.transform = 'rotate(45deg)';
            }

            // Testimonials Slider functionality
            let currentTestimonialPage = 0;
            let testimonialsPerView = 3;
            let totalTestimonials = 0;

            function updateTestimonialsPerView() {
                if (window.innerWidth >= 992) {
                    testimonialsPerView = 3;
                } else if (window.innerWidth >= 768) {
                    testimonialsPerView = 2;
                } else {
                    testimonialsPerView = 1;
                }
            }

            function showTestimonialSlide() {
                const slidesContainer = document.getElementById('testimonialsSlides');
                if (!slidesContainer) return;
                
                updateTestimonialsPerView();
                const translateX = currentTestimonialPage * 100;
                
                slidesContainer.style.transform = `translateX(${translateX}%)`;
                slidesContainer.style.transition = 'transform 0.5s ease';
                
                // Update button states
                updateTestimonialButtonStates();
            }

            function updateTestimonialButtonStates() {
                const prevBtn = document.querySelector('.prev-testimonial-btn');
                const nextBtn = document.querySelector('.next-testimonial-btn');
                const totalPages = Math.ceil(totalTestimonials / testimonialsPerView) - 1;
                const isRTL = document.documentElement.dir === 'rtl' || document.body.classList.contains('rtl');
                
                if (prevBtn && nextBtn) {
                    if (isRTL) {
                        // RTL: currentPage goes 0 to positive
                        prevBtn.disabled = currentTestimonialPage <= 0;
                        nextBtn.disabled = currentTestimonialPage >= totalPages;
                        
                        prevBtn.style.opacity = currentTestimonialPage <= 0 ? '0.5' : '1';
                        nextBtn.style.opacity = currentTestimonialPage >= totalPages ? '0.5' : '1';
                    } else {
                        // LTR: currentPage goes 0 to negative
                        prevBtn.disabled = currentTestimonialPage >= 0;
                        nextBtn.disabled = currentTestimonialPage <= -totalPages;
                        
                        prevBtn.style.opacity = currentTestimonialPage >= 0 ? '0.5' : '1';
                        nextBtn.style.opacity = currentTestimonialPage <= -totalPages ? '0.5' : '1';
                    }
                }
            }

            window.changeTestimonialSlide = function(direction) {
                updateTestimonialsPerView();
                const totalPages = Math.ceil(totalTestimonials / testimonialsPerView) - 1;
                
                // Check if RTL (Arabic)
                const isRTL = document.documentElement.dir === 'rtl' || document.body.classList.contains('rtl');
                
                if (isRTL) {
                    // In RTL: move opposite direction
                    currentTestimonialPage += direction;
                    // Clamp the page for RTL
                    if (currentTestimonialPage < 0) {
                        currentTestimonialPage = 0;
                    } else if (currentTestimonialPage > totalPages) {
                        currentTestimonialPage = totalPages;
                    }
                } else {
                    // In LTR: normal direction
                    currentTestimonialPage -= direction;
                    // Clamp the page for LTR
                    if (currentTestimonialPage > 0) {
                        currentTestimonialPage = 0;
                    } else if (currentTestimonialPage < -totalPages) {
                        currentTestimonialPage = -totalPages;
                    }
                }
                
                showTestimonialSlide();
            };

            // Initialize testimonials slider
            function initTestimonialsSlider() {
                const testimonialCards = document.querySelectorAll('.testimonial-card');
                totalTestimonials = testimonialCards.length;
                const slidesContainer = document.getElementById('testimonialsSlides');
                
                if (slidesContainer && testimonialCards.length > 0) {
                    updateTestimonialsPerView();
                    currentTestimonialPage = 0;
                    showTestimonialSlide();
                }
            }

            // Initialize testimonials slider on page load
            setTimeout(function() {
                initTestimonialsSlider();
            }, 100);

            // Handle window resize for testimonials
            window.addEventListener('resize', function() {
                initTestimonialsSlider();
            });
        });

        // Company Info Card Toggle
        function toggleInfoCard(clickedCard) {
            // If the clicked card is already active, don't change anything
            if (clickedCard.classList.contains('active')) {
                return;
            }
            
            const allCards = document.querySelectorAll('.info-card');
            
            // Remove active class from all cards
            allCards.forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to clicked card
            clickedCard.classList.add('active');
        }

        // Feature Modal Functions
        const featureData = {
            innovation: {
                icon: 'bi-lightbulb',
                title: '{{ __("Innovation") }}',
                sections: [
                    {
                        title: '{{ __("Latest Technologies") }}',
                        icon: 'bi-cpu',
                        content: '{{ __("We leverage cutting-edge technologies and frameworks to deliver innovative testing solutions that stay ahead of the curve.") }}'
                    },
                    {
                        title: '{{ __("Advanced Tools") }}',
                        icon: 'bi-tools',
                        content: '{{ __("Our arsenal includes the most sophisticated testing tools and platforms, ensuring comprehensive coverage and accurate results.") }}'
                    },
                    {
                        title: '{{ __("Continuous Improvement") }}',
                        icon: 'bi-graph-up-arrow',
                        content: '{{ __("We constantly update our methodologies and adopt new innovations to provide you with the best testing experience.") }}'
                    }
                ]
            },
            reliability: {
                icon: 'bi-patch-check',
                title: '{{ __("Reliability") }}',
                sections: [
                    {
                        title: '{{ __("Accurate Results") }}',
                        icon: 'bi-check-circle',
                        content: '{{ __("Our rigorous testing processes ensure precise and reliable results you can trust for critical decisions.") }}'
                    },
                    {
                        title: '{{ __("Deadline Commitment") }}',
                        icon: 'bi-calendar-check',
                        content: '{{ __("We understand the importance of timelines and consistently deliver quality results within agreed schedules.") }}'
                    },
                    {
                        title: '{{ __("High Standards") }}',
                        icon: 'bi-award',
                        content: '{{ __("We maintain the highest industry standards and best practices in all our testing procedures.") }}'
                    }
                ]
            },
            scalability: {
                icon: 'bi-graph-up-arrow',
                title: '{{ __("Scalability") }}',
                sections: [
                    {
                        title: '{{ __("Flexible Solutions") }}',
                        icon: 'bi-sliders',
                        content: '{{ __("Our testing solutions adapt seamlessly to projects of any size, from startups to enterprise applications.") }}'
                    },
                    {
                        title: '{{ __("Growth Support") }}',
                        icon: 'bi-arrow-up-right',
                        content: '{{ __("As your project grows, our testing infrastructure scales accordingly without compromising quality or performance.") }}'
                    },
                    {
                        title: '{{ __("Resource Optimization") }}',
                        icon: 'bi-pie-chart',
                        content: '{{ __("We efficiently allocate resources based on your project needs, ensuring optimal coverage at every stage.") }}'
                    }
                ]
            },
            efficiency: {
                icon: 'bi-clock-history',
                title: '{{ __("Time Efficiency") }}',
                sections: [
                    {
                        title: '{{ __("Fast Execution") }}',
                        icon: 'bi-lightning',
                        content: '{{ __("Our streamlined processes and automation capabilities enable rapid test execution without sacrificing thoroughness.") }}'
                    },
                    {
                        title: '{{ __("Parallel Testing") }}',
                        icon: 'bi-diagram-3',
                        content: '{{ __("We run multiple tests simultaneously to significantly reduce overall testing time and accelerate delivery.") }}'
                    },
                    {
                        title: '{{ __("Quick Turnaround") }}',
                        icon: 'bi-stopwatch',
                        content: '{{ __("From test planning to final reports, we maintain efficient workflows that respect your project timelines.") }}'
                    }
                ]
            },
            security: {
                icon: 'bi-shield-lock',
                title: '{{ __("Security First") }}',
                sections: [
                    {
                        title: '{{ __("Data Protection") }}',
                        icon: 'bi-lock',
                        content: '{{ __("We implement robust security measures to protect your sensitive data and intellectual property throughout the testing process.") }}'
                    },
                    {
                        title: '{{ __("Confidentiality") }}',
                        icon: 'bi-eye-slash',
                        content: '{{ __("All project information is treated with strict confidentiality, with NDAs and secure access controls in place.") }}'
                    },
                    {
                        title: '{{ __("Compliance") }}',
                        icon: 'bi-shield-check',
                        content: '{{ __("We adhere to industry security standards and regulatory requirements to ensure your project meets all compliance needs.") }}'
                    }
                ]
            },
            communication: {
                icon: 'bi-chat-dots',
                title: '{{ __("Communication") }}',
                sections: [
                    {
                        title: '{{ __("Regular Updates") }}',
                        icon: 'bi-bell',
                        content: '{{ __("We provide frequent progress updates and maintain transparent communication throughout the testing lifecycle.") }}'
                    },
                    {
                        title: '{{ __("Responsive Support") }}',
                        icon: 'bi-headset',
                        content: '{{ __("Our team is always available to address your questions and concerns promptly and professionally.") }}'
                    },
                    {
                        title: '{{ __("Collaborative Approach") }}',
                        icon: 'bi-people',
                        content: '{{ __("We work closely with your team, fostering collaboration and ensuring alignment with your project goals.") }}'
                    }
                ]
            }
        };

        function openFeatureModal(feature, event) {
            event.preventDefault();
            const modal = document.getElementById('featureModal');
            const modalIcon = document.getElementById('modalIcon');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');

            const data = featureData[feature];
            if (!data) return;

            // Update icon
            modalIcon.querySelector('i').className = `bi ${data.icon}`;

            // Update title
            modalTitle.textContent = data.title;

            // Update body content
            let bodyHTML = '';
            data.sections.forEach(section => {
                bodyHTML += `
                    <div class="feature-detail-section">
                        <h5><i class="bi ${section.icon}"></i> ${section.title}</h5>
                        <p>${section.content}</p>
                    </div>
                `;
            });
            modalBody.innerHTML = bodyHTML;

            // Show modal
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeFeatureModal() {
            const modal = document.getElementById('featureModal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeFeatureModal();
            }
        });
    </script>
@endsection
