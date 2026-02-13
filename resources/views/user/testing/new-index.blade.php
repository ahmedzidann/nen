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
    @php

    $sections = App\Models\TestingTechnologySection::query()
    ->join('sections_design', 'sections_design.id', '=', 'testing_technology_sections.design_section_id')
    ->where('testing_technology_sections.main_category_id', request()->segment(2))
    ->where('testing_technology_sections.sub_category_id', request()->segment(3))
    ->orderBy('testing_technology_sections.sort')
    ->select(
        'testing_technology_sections.*',
        'sections_design.title as section_title',
    )
    ->get();

    @endphp

    @foreach ( $sections as  $section)


  
        @include('user.testing.sections.' .$section->section_title)
    @endforeach
    
       
    <!-- Section: Company Info with Image -->
   

    <!-- Section 2: Features with Icons -->
 

    <!-- Section 3: Statistics -->
 



    <!-- Section: Process / Work Process Cards -->
    
    <!-- Section: Website Design with Images -->
  

    <!-- Section: How We Work Timeline -->
   
    <!-- Section: Services -->
 

    
 


    <!-- Section 6: Modern Cards -->
   

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
