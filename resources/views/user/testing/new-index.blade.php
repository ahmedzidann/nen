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
    <section class="image-text-section py-4 mt-3">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="section-title mb-3">Innovative Testing Solutions</h2>
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

    <!-- Section: Quality Assurance Approach (Reversed) -->
    <section class="image-text-section py-4">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                    <h2 class="section-title mb-3">Quality Assurance Approach</h2>
                    <div>
                        <p class="section-description mb-4">
                            Our quality assurance approach is built on industry best practices and cutting-edge methodologies. 
                            We focus on delivering comprehensive testing coverage that identifies issues before they impact your users.
                        </p>
                        <p class="section-description mb-4">
                            From initial planning to final delivery, we work closely with your team to ensure every aspect of your software 
                            meets the highest standards of quality, performance, and reliability.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <div class="image-wrapper-unified-small">
                        <img src="{{ asset('content/images/about_img.png') }}" 
                             alt="Quality Assurance" 
                             class="img-fluid rounded-modern">
                        <div class="image-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Features with Icons -->
    <section class="features-section py-4">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="global-title">{{ __('Our Key Features') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3">We offer a wide range of features that make us the best choice</p>
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

    <!-- Section 4: Accordion with Image Change -->
    <section class="accordion-section py-4">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="global-title">{{ __('Our Services') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
            </div>
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="accordion-faq-style" id="servicesAccordion">
                        <div class="accordion-item-faq active" data-image="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop">
                            <div class="accordion-header-faq" onclick="toggleAccordion(this)">
                                <h5 class="accordion-title-faq">{{ __('Automated Testing') }}</h5>
                                <i class="bi bi-chevron-down accordion-arrow-faq"></i>
                            </div>
                            <div class="accordion-body-faq" style="display: block;">
                                <p>We provide advanced automated testing solutions that help accelerate the testing process and ensure accurate results using the latest tools and technologies in automated testing.</p>
                            </div>
                        </div>
                        <div class="accordion-item-faq" data-image="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop">
                            <div class="accordion-header-faq" onclick="toggleAccordion(this)">
                                <h5 class="accordion-title-faq">{{ __('Performance Testing') }}</h5>
                                <i class="bi bi-chevron-down accordion-arrow-faq"></i>
                            </div>
                            <div class="accordion-body-faq">
                                <p>Comprehensive performance testing to ensure your application works efficiently under various conditions and different loads.</p>
                            </div>
                        </div>
                        <div class="accordion-item-faq" data-image="https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&h=600&fit=crop">
                            <div class="accordion-header-faq" onclick="toggleAccordion(this)">
                                <h5 class="accordion-title-faq">{{ __('Security Testing') }}</h5>
                                <i class="bi bi-chevron-down accordion-arrow-faq"></i>
                            </div>
                            <div class="accordion-body-faq">
                                <p>We conduct comprehensive security testing of your applications to detect any potential security vulnerabilities and protect them from threats.</p>
                            </div>
                        </div>
                        <div class="accordion-item-faq" data-image="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800&h=600&fit=crop">
                            <div class="accordion-header-faq" onclick="toggleAccordion(this)">
                                <h5 class="accordion-title-faq">{{ __('Mobile Testing') }}</h5>
                                <i class="bi bi-chevron-down accordion-arrow-faq"></i>
                            </div>
                            <div class="accordion-body-faq">
                                <p>Comprehensive testing for mobile applications across different platforms and devices to ensure an excellent user experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="accordion-image-wrapper-small">
                        <div class="image-container-small rotating-border">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=500&fit=crop" 
                                 alt="Our Services" class="img-fluid">
                        </div>
                        <div class="floating-circle circle-1"></div>
                        <div class="floating-circle circle-2"></div>
                        <div class="floating-circle circle-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: FAQ -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-down">
                <h2 class="global-title" style="font-size: 2.5rem; font-weight: 700;">{{ __('Frequently Asked Questions') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3" style="font-size: 1.1rem;">Answers to the most frequently asked questions about our services</p>
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

    <!-- Section 6: Team Members Cards -->
    <section class="team-section py-4">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="global-title">{{ __('Our Expert Team') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3">A team of experts specialized in testing and quality assurance</p>
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

    <!-- Section 7: Modern Cards -->
    <section class="modern-cards-section py-4">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="global-title">{{ __('Why Choose Us') }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3">We provide the best services with exceptional features</p>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
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
                            <a href="#">{{ __('Learn More') }} <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                
                if (prevBtn && nextBtn) {
                    // Disable/enable buttons based on position
                    prevBtn.disabled = currentPage >= 0;
                    nextBtn.disabled = currentPage <= -totalPages;
                    
                    prevBtn.style.opacity = currentPage >= 0 ? '0.5' : '1';
                    nextBtn.style.opacity = currentPage <= -totalPages ? '0.5' : '1';
                }
            }

            window.changeTeamSlide = function(direction) {
                updateSlidesPerView();
                const totalPages = Math.ceil(totalCards / slidesPerView) - 1;
                
                currentPage -= direction; // Reverse direction for RTL
                
                // Clamp the page
                if (currentPage > 0) {
                    currentPage = 0;
                } else if (currentPage < -totalPages) {
                    currentPage = -totalPages;
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
        });
    </script>
@endsection
