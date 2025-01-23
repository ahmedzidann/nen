@extends('user.layout.index_master')
@section('parent_page_name')
Home
@endsection

@section('cover_image')
{{ 'https://cdn.pixabay.com/photo/2023/01/15/16/20/library-7720589_1280.jpg' }}
@endsection

@section('page_name')
Home
@endsection

@section('websiteStyle')

@endsection

@section('content')
<div id="home-page">
    <!-- Start Quick Access Section UI -->
    <div id="quick-access-card" class="position-relative mt-4">
        <div class="container">
            <div class="row g-3">
                <!-- Card 1: Add Brand Profiles -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-blue">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/747/careers.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">Add Brand Profiles</div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: AI Analytics -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-pink">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/747/careers.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Analytics</div>
                            <div class="brand-card-category">Data Science</div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: AI Vision -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-green">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/748/investors.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Vision</div>
                            <div class="brand-card-category">Computer Vision</div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: AI Chatbots -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-yellow">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/747/careers.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Chatbots</div>
                            <div class="brand-card-category">Conversational AI</div>
                        </div>
                    </div>
                </div>

                <!-- Card 5: AI Robotics -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-purple">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/748/investors.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Robotics</div>
                            <div class="brand-card-category">Automation</div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: AI Tools -->
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 px-1">
                    <div class="brand-card light-teal">
                        <div class="brand-card-icon">
                            <img src="https://dev.nendemo2024.xyz/media/750/team.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="icon" style="width: 25px; height: 25px; border-radius: 4px;" />
                        </div>
                        <div class="card-texts">
                            <div class="brand-card-title">AI Tools</div>
                            <div class="brand-card-category">Utilities</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick Access Section UI -->

    <!-- Start Features Section -->
    <section id="features-section" class="section-bundries">
        <div class="container">
            <div class="d-flex justify-content-center flex-column">
                <h2 class="feature-title">FEATURES & ADVANTAGES</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
            </div>
            <p class="mt-2 description">
                NEN | National Education Network for Communication and Information Technology with the main offices
                in [London, Dubai, Cairo, Amman, and Tashkent] established@2008, to offer high-standard professional
                services
                and enterprise solutions to help organizations
                to meet their business needs and identify their goals, in cooperation with worldwide technology leaders
                ...
            </p>
            <div class="features row justify-content-around align-items-center gap-md-2">
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-clock"></i>
                    <span>15</span>
                    <p class="text-center">Years</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-earth-americas"></i>
                    <span>28</span>
                    <p class="text-center">Countries</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-lightbulb"></i>
                    <span>21</span>
                    <p class="text-center">Solutions</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>74</span>
                    <p class="text-center">Projects</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-users"></i>
                    <span>10K+</span>
                    <p class="text-center">Customers</p>
                </div>

                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-rocket"></i>
                    <span>50+</span>
                    <p class="text-center">Innovations</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-award"></i>
                    <span>30+</span>
                    <p class="text-center">Awards</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-user-check"></i>
                    <span>100%</span>
                    <p class="text-center">Satisfaction</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-people-group"></i>
                    <span>5K+</span>
                    <p class="text-center">Partners</p>
                </div>
                <div
                    class="col-6 col-sm-4 col-md-2 feature-item d-flex flex-column align-items-center justify-content-center p-3">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>200+</span>
                    <p class="text-center">Clients</p>
                </div>
            </div>
    </section>
    <!-- End Features Section -->

    <!-- Start About Section -->
    <section id="about-company-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="about-content text-sm-start text-center">
                        <h2 class="title fs-lg text-white-color fw-bold">
                            On <br> Platform
                        </h2>
                        <p class="w-75 mt-2 text-white-color description">
                            NEN | National Education Network for Communication and Information Technology with the main
                            offices in [London, Dubai, Cairo, Amman, and Tashkent] established@2008, to offer
                            high-standard professional services and enterprise solutions to help organizations to meet
                            their business needs and identify their goals, in cooperation with worldwide technology
                            leaders
                        </p>
                        <div class="mt-4">
                            <button class="btn btn-light border justify-content-sm-start justify-content-center">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="position-relative about-img">
                        <!-- <img src="{{ asset('content/images/pages/home-page/hero-home-page.webp') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="about-img" class="w-100 h-100"> -->
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/sQ22pm-xvrE"
                            title="4K 100% Royalty-Free Stock Footage | Technology HUD Element Intro Background | No Copyright Video"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <div class="position-absolute about-layer"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Start Projects Section -->
    <section id="projects-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Our Projects
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <!-- <p class="global-description">description</p> -->
            </div>

            <div class="row justify-content-center w-100 mt-3">
                <div class="col-xl-4 col-lg-4">
                    <div class="row w-100">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="step">
                                <div
                                    class="step-num text-main-color rounded-circle d-flex justify-content-center align-items-center fs-5 fw-bold">
                                    01
                                </div>
                                <div class="step-content text-center">
                                    <div class="image-box">
                                        <img src="https://cdn.pixabay.com/photo/2020/11/10/21/00/boy-5731001_1280.jpg"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="about-img" class="w-100 h-100">
                                    </div>
                                    <h3 class="fs-5 text-main-color fw-bold mt-2">
                                        Labor selection
                                    </h3>
                                    <p class="mb-0 step-description fs-8 m-auto">
                                        Choose the worker you want based on his CV and your requirements
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6 mt-sm-0 mt-3">
                            <div class="step mt-lg-3">
                                <div
                                    class="step-num text-main-color rounded-circle d-flex justify-content-center align-items-center fs-5 fw-bold">
                                    02
                                </div>
                                <div class="step-content text-center">
                                    <div class="image-box">
                                        <img src="https://cdn.pixabay.com/photo/2017/10/14/09/56/journal-2850091_1280.jpg"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="about-img" class="w-100 h-100">
                                    </div>
                                    <h3 class="fs-5 text-main-color fw-bold mt-2">
                                        Pay the fees
                                    </h3>
                                    <p class="mb-0 step-description fs-8 m-auto">
                                        Pay labor fees through one of the contracted payment gateways
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mt-lg-0 mt-3">
                    <div class="step special-step h-100">
                        <div
                            class="step-num text-dark-color rounded-circle d-flex justify-content-center align-items-center fs-5 fw-bold">
                            05
                        </div>
                        <div class="step-content text-center">
                            <h3 class="fs-5 text-dark-color fw-bold mt-2">
                                Receive the labor
                            </h3>
                            <h4 class="fs-3 fw-bold text-main-color mx-xl-5 mx-lg-2 mx-md-3 mx-2">
                                And get a 3-month warranty
                            </h4>
                            <p class="mb-0 step-description m-auto fs-8 mx-4">
                                Receive the worker and get a 3-month guarantee in case there is any problem or
                                negligence on the part of the worker
                            </p>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-light rounded-pill">
                                    Start Recruiting
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mt-lg-0 mt-3">
                    <div class="row w-100">
                        <div class="col-md-12 col-sm-6">
                            <div class="step">
                                <div
                                    class="step-num text-main-color rounded-circle d-flex justify-content-center align-items-center fs-5 fw-bold">
                                    03
                                </div>
                                <div class="step-content text-center">
                                    <div class="scaleX-rtl">
                                        <div class="image-box">
                                            <img src="https://cdn.pixabay.com/photo/2014/10/14/20/14/library-488690_1280.jpg"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="about-img" class="w-100 h-100">
                                        </div>
                                    </div>
                                    <h3 class="fs-5 text-main-color fw-bold mt-2">
                                        Clearing Procedures
                                    </h3>
                                    <p class="mb-0 step-description fs-8 m-auto">
                                        The International Source Recruitment platform helps you clear all worker
                                        procedures
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6 mt-md-3 mt-sm-0 mt-3">
                            <div class="step">
                                <div
                                    class="step-num text-main-color rounded-circle d-flex justify-content-center align-items-center fs-5 fw-bold">
                                    04
                                </div>
                                <div class="step-content text-center">
                                    <div class="image-box">
                                        <img src="https://cdn.pixabay.com/photo/2016/11/29/12/41/desk-1869579_1280.jpg"
                                            loading="lazy"
                                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                            alt="about-img" class="w-100 h-100">
                                    </div>
                                    <h3 class="fs-5 text-main-color fw-bold mt-2">
                                        Worker Arrival
                                    </h3>
                                    <p class="mb-0 step-description fs-8 m-auto">
                                        The architecture chosen by you reaches the territory of the Kingdom
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-md-4 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        Learn More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Projects Section -->

    <!-- Start Education Section -->
    <section id="education-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title text-white-color">
                    Our Education
                </h5>
                <div class="under-title-vector text-white-color">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="global-description text-white-color pt-0 mt-1">
                    Get every thing about AI when reading Article and News
                </p>
            </div>
            <div class="row mt-4 mx-0">
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <div class="clipped-border-card h-100">
                        <div class="clipped-item-card border h-100">
                            <div
                                class="d-flex flex-column justify-content-between gap-4 item-content h-100 position-relative">
                                <div class="item-overlay position-absolute"></div>
                                <div>
                                    <h4 class="text-main-color text-uppercase item-title">
                                        Microsoft
                                    </h4>
                                    <p class="text-black-50 fs-5-2 mt-4 description text-align-justify">
                                        Microsoft Certificates are industry-recognized credentials offered by Microsoft
                                        to
                                        validate an individual's expertise and proficiency in utilizing Microsoft
                                        technologies and services. With a diverse range of certifications available,
                                        professionals can showcase their skills in areas such as cloud computing, data
                                        analysis, software development, and more.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between gap-3 flex-wrap">
                                    <div
                                        class="box-icon d-flex justify-content-center align-items-center arrow-bg mb-0">
                                        <!-- <img src="./images/home/cases/arrow.svg" alt="arrow"> -->
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.667 18.7188H3.66699C2.01014 18.7188 0.666992 17.3757 0.666992 15.7188V3.71875C0.666992 2.0619 2.01014 0.71875 3.66699 0.71875H15.667C17.3239 0.71875 18.667 2.0619 18.667 3.71875V15.7188C18.667 17.3757 17.3239 18.7188 15.667 18.7188ZM14.667 6.13296L10.0812 10.7188H11.667C12.2193 10.7188 12.667 11.1665 12.667 11.7188C12.667 12.271 12.2193 12.7188 11.667 12.7188H7.66699C7.11471 12.7188 6.66699 12.271 6.66699 11.7188V7.71875C6.66699 7.16647 7.11471 6.71875 7.66699 6.71875C8.21929 6.71875 8.66699 7.16647 8.66699 7.71875V9.30455L13.2528 4.71875H11.667C11.1147 4.71875 10.667 4.27103 10.667 3.71875C10.667 3.16646 11.1147 2.71875 11.667 2.71875H15.667C16.2193 2.71875 16.667 3.16647 16.667 3.71875V7.71875C16.667 8.27105 16.2193 8.71875 15.667 8.71875C15.1147 8.71875 14.667 8.27105 14.667 7.71875V6.13296Z"
                                                fill="#fff" />
                                        </svg>
                                    </div>
                                    <a
                                        class="text-main-color d-flex gap-3 align-items-center text-uppercase fs-8 apply-now-btn">
                                        See More
                                        <span>
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" class="scaleX-rtl"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0.292893 1.01164C0.683417 0.621119 1.31658 0.621119 1.70711 1.01164L7.70711 7.01164C8.09763 7.40217 8.09763 8.03533 7.70711 8.42586L1.70711 14.4259C1.31658 14.8164 0.683417 14.8164 0.292893 14.4259C-0.0976311 14.0353 -0.0976311 13.4022 0.292893 13.0116L5.58579 7.71875L0.292893 2.42586C-0.0976311 2.03533 -0.0976311 1.40217 0.292893 1.01164Z"
                                                    fill="#000" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <div class="clipped-border-card h-100">
                        <div class="clipped-item-card border h-100">
                            <div
                                class="d-flex flex-column justify-content-between gap-4 item-content h-100 position-relative">
                                <div class="item-overlay position-absolute"></div>
                                <div>
                                    <h4 class="text-main-color text-uppercase item-title">
                                        Overview
                                    </h4>
                                    <p class="text-black-50 fs-5-2 mt-4 description text-align-justify">
                                        International exams are standardized tests that are administered across
                                        different countries to assess the knowledge and skills of students. These exams
                                        are designed to provide a common benchmark for evaluating students' abilities on
                                        a global scale. They cover various subjects such as mathematics, science,
                                        language proficiency, and social sciences
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between gap-3 flex-wrap">
                                    <div
                                        class="box-icon d-flex justify-content-center align-items-center arrow-bg mb-0">
                                        <!-- <img src="./images/home/cases/arrow.svg" alt="arrow"> -->
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.667 18.7188H3.66699C2.01014 18.7188 0.666992 17.3757 0.666992 15.7188V3.71875C0.666992 2.0619 2.01014 0.71875 3.66699 0.71875H15.667C17.3239 0.71875 18.667 2.0619 18.667 3.71875V15.7188C18.667 17.3757 17.3239 18.7188 15.667 18.7188ZM14.667 6.13296L10.0812 10.7188H11.667C12.2193 10.7188 12.667 11.1665 12.667 11.7188C12.667 12.271 12.2193 12.7188 11.667 12.7188H7.66699C7.11471 12.7188 6.66699 12.271 6.66699 11.7188V7.71875C6.66699 7.16647 7.11471 6.71875 7.66699 6.71875C8.21929 6.71875 8.66699 7.16647 8.66699 7.71875V9.30455L13.2528 4.71875H11.667C11.1147 4.71875 10.667 4.27103 10.667 3.71875C10.667 3.16646 11.1147 2.71875 11.667 2.71875H15.667C16.2193 2.71875 16.667 3.16647 16.667 3.71875V7.71875C16.667 8.27105 16.2193 8.71875 15.667 8.71875C15.1147 8.71875 14.667 8.27105 14.667 7.71875V6.13296Z"
                                                fill="#fff" />
                                        </svg>
                                    </div>
                                    <a
                                        class="text-main-color d-flex gap-3 align-items-center text-uppercase fs-8 apply-now-btn">
                                        See More
                                        <span>
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" class="scaleX-rtl"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0.292893 1.01164C0.683417 0.621119 1.31658 0.621119 1.70711 1.01164L7.70711 7.01164C8.09763 7.40217 8.09763 8.03533 7.70711 8.42586L1.70711 14.4259C1.31658 14.8164 0.683417 14.8164 0.292893 14.4259C-0.0976311 14.0353 -0.0976311 13.4022 0.292893 13.0116L5.58579 7.71875L0.292893 2.42586C-0.0976311 2.03533 -0.0976311 1.40217 0.292893 1.01164Z"
                                                    fill="#000" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <div class="clipped-border-card h-100">
                        <div class="clipped-item-card border h-100">
                            <div
                                class="d-flex flex-column justify-content-between gap-4 item-content h-100 position-relative">
                                <div class="item-overlay position-absolute"></div>
                                <div>
                                    <h4 class="text-main-color text-uppercase item-title">
                                        Tourism
                                    </h4>
                                    <p class="text-black-50 fs-5-2 mt-4 description text-align-justify">
                                        Tourism education plays a crucial role in preparing individuals for a rewarding
                                        and dynamic career in the global travel and hospitality industry. This
                                        specialized form of education equips students with a comprehensive understanding
                                        of various aspects related to tourism, including travel management, hospitality
                                        services, cultural appreciation, sustainable practices, and destination
                                        marketing
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between gap-3 flex-wrap">
                                    <div
                                        class="box-icon d-flex justify-content-center align-items-center arrow-bg mb-0">
                                        <!-- <img src="./images/home/cases/arrow.svg" alt="arrow"> -->
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.667 18.7188H3.66699C2.01014 18.7188 0.666992 17.3757 0.666992 15.7188V3.71875C0.666992 2.0619 2.01014 0.71875 3.66699 0.71875H15.667C17.3239 0.71875 18.667 2.0619 18.667 3.71875V15.7188C18.667 17.3757 17.3239 18.7188 15.667 18.7188ZM14.667 6.13296L10.0812 10.7188H11.667C12.2193 10.7188 12.667 11.1665 12.667 11.7188C12.667 12.271 12.2193 12.7188 11.667 12.7188H7.66699C7.11471 12.7188 6.66699 12.271 6.66699 11.7188V7.71875C6.66699 7.16647 7.11471 6.71875 7.66699 6.71875C8.21929 6.71875 8.66699 7.16647 8.66699 7.71875V9.30455L13.2528 4.71875H11.667C11.1147 4.71875 10.667 4.27103 10.667 3.71875C10.667 3.16646 11.1147 2.71875 11.667 2.71875H15.667C16.2193 2.71875 16.667 3.16647 16.667 3.71875V7.71875C16.667 8.27105 16.2193 8.71875 15.667 8.71875C15.1147 8.71875 14.667 8.27105 14.667 7.71875V6.13296Z"
                                                fill="#fff" />
                                        </svg>
                                    </div>
                                    <a
                                        class="text-main-color d-flex gap-3 align-items-center text-uppercase fs-8 apply-now-btn">
                                        See More
                                        <span>
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" class="scaleX-rtl"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0.292893 1.01164C0.683417 0.621119 1.31658 0.621119 1.70711 1.01164L7.70711 7.01164C8.09763 7.40217 8.09763 8.03533 7.70711 8.42586L1.70711 14.4259C1.31658 14.8164 0.683417 14.8164 0.292893 14.4259C-0.0976311 14.0353 -0.0976311 13.4022 0.292893 13.0116L5.58579 7.71875L0.292893 2.42586C-0.0976311 2.03533 -0.0976311 1.40217 0.292893 1.01164Z"
                                                    fill="#000" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-md-4 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        See More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Education Section -->

    <!-- Start Testing Section -->
    <section id="testing-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Our Testing
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="vector">
                </div>
            </div>

            <div class="row mt-md-4 mt-3">
                <div class="col-md-6 mb-md-0 mb-3">
                    <div class="position-relative h-100 d-flex align-items-center testing-content">
                        <div class="layer layer-one position-absolute"></div>
                        <div class="layer layer-two position-absolute"></div>
                        <div class="testing-img d-flex justify-content-center align-items-center h-100">
                            <img src="https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="solar" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-md-start text-center">
                        <span class="subheading">
                            Solar energy stocks
                        </span>
                        <h2 class="fs-1 mt-2 testing-title">
                            Security & Quality
                        </h2>
                        <div class="title-bg m-md-0 m-auto"></div>
                        <div class="mt-3 testing-description text-align-justify">
                            Testing software plays a crucial role in enhancing security and ensuring quality in the
                            assessment process. With robust security features, such as encryption, access controls,
                            and anti-cheating measures, test software protects the integrity of tests and prevents
                            unauthorized access to test content. It significantly reduces the risk of cheating and
                            impersonation, creating a fair and trustworthy testing environment. By automating the
                            grading process, the software eliminates human errors and biases, ensuring consistent
                            and accurate results. This promotes a standardized evaluation system, providing learners
                            with a reliable assessment of their knowledge and skills. Moreover, test software's
                            ability to generate instant feedback allows educators to identify learning gaps
                            promptly, enabling timely interventions and tailored support for individual students.
                            Overall, the implementation of test software enhances the security and quality of
                            assessments, leading to more reliable outcomes and a more efficient evaluation process.
                        </div>
                        <div class="d-flex justify-content-md-start justify-content-center mt-4">
                            <span class="button-border w-content">
                                <a class="btn btn-solid-main navbar-button">
                                    Learn More
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-md-5 mt-3">
                <div class="col-md-6  mb-md-0 mb-3">
                    <div class="text-md-start text-center">
                        <h2 class="fs-1 mt-2 testing-title">
                            Test Development
                        </h2>
                        <div class="title-bg m-md-0 m-auto"></div>
                        <div class="mt-3 testing-description text-align-justify">
                            An End-to-End Examination Management System is a comprehensive and integrated solution that
                            covers the entire lifecycle of the examination process, from test creation to result
                            generation. It automates and streamlines various tasks involved in conducting exams, making
                            the process more efficient, secure, and user-friendly. The key components and
                            functionalities of such a system typically include:

                            Test Creation:
                            The system allows educators and administrators to create various types of exams, including
                            multiple-choice, essay-based, and skill-based assessments. It may include question banks and
                            the ability to randomize questions to reduce cheating.
                        </div>
                        <div class="d-flex justify-content-md-start justify-content-center mt-4">
                            <span class="button-border w-content">
                                <a class="btn btn-solid-main navbar-button">
                                    Learn More
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative h-100 d-flex align-items-center testing-content">
                        <div class="layer layer-one position-absolute"></div>
                        <div class="layer layer-two position-absolute"></div>
                        <div class="testing-img d-flex justify-content-center align-items-center h-100">
                            <img src="https://wakeb-tech-site.vercel.app/images/useCases/cases/wind.webp" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="solar" class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-md-5 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        See More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Testing Section -->

    <!-- Start Solutions Section -->
    <section id="solutions-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Our Solutions
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="description text-align-justify mt-1">
                    Explore our innovative solutions tailored for the education and business sectors. We're here to
                    support your growth and success.
                </p>
            </div>
            <div class="row g-3 mt-md-4 mt-3">
                <!-- Education Column -->
                <div class="col-md-6 mt-3">
                    <h3 class="type-title">
                        Empowering Education
                    </h3>
                    <div class="duties-items-content pt-3">
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/1.svg') }}"
                                    alt="Student Engagement" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Enhanced Student Engagement</h4>
                                <p class="duties-item-description text-align-justify">
                                    Leverage cutting-edge technology to create engaging and interactive learning
                                    experiences for students across all levels.
                                </p>
                            </div>
                        </div>
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/2.svg') }}"
                                    alt="Remote Learning" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Seamless Remote Learning</h4>
                                <p class="duties-item-description text-align-justify">
                                    Enable remote learning with robust platforms designed to ensure continuity and
                                    flexibility for educators and learners.
                                </p>
                            </div>
                        </div>
                        <!-- Additional Item 1 -->
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/5.svg') }}"
                                    alt="Teacher Training" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Comprehensive Teacher Training</h4>
                                <p class="duties-item-description text-align-justify">
                                    Provide educators with the training and resources needed to deliver impactful and
                                    effective lessons.
                                </p>
                            </div>
                        </div>
                        <!-- Additional Item 2 -->
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/6.svg') }}"
                                    alt="Digital Tools for Schools" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Digital Tools for Schools</h4>
                                <p class="duties-item-description text-align-justify">
                                    Equip schools with innovative digital tools to manage operations and enhance the
                                    overall learning experience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Column -->
                <div class="col-md-6 mt-3">
                    <h3 class="type-title">
                        Driving Business Excellence
                    </h3>
                    <div class="duties-items-content pt-3">
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/3.svg') }}"
                                    alt="Business Solutions" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Tailored Business Solutions</h4>
                                <p class="duties-item-description text-align-justify">
                                    Implement custom business strategies designed to optimize operations and improve
                                    productivity.
                                </p>
                            </div>
                        </div>
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/4.svg') }}"
                                    alt="Automation Services" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Automation for Efficiency</h4>
                                <p class="duties-item-description text-align-justify">
                                    Streamline your workflows and increase efficiency with our cutting-edge automation
                                    services.
                                </p>
                            </div>
                        </div>
                        <!-- Additional Item 1 -->
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/2.svg') }}"
                                    alt="Market Insights" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Actionable Market Insights</h4>
                                <p class="duties-item-description text-align-justify">
                                    Gain valuable market insights to stay ahead of the competition and make data-driven
                                    decisions.
                                </p>
                            </div>
                        </div>
                        <!-- Additional Item 2 -->
                        <div
                            class="duties-item-card d-flex gap-md-4 gap-3 align-items-sm-start align-items-center flex-sm-row flex-column text-sm-start text-center">
                            <div class="duties-item-img">
                                <img src="{{ asset('content/images/pages/home-page/services/4.svg') }}"
                                    alt="Team Collaboration" class="w-100 h-100">
                            </div>
                            <div class="duties-items-details">
                                <h4 class="duties-item-title text-align-justify">Enhanced Team Collaboration</h4>
                                <p class="duties-item-description text-align-justify">
                                    Foster better communication and collaboration within your teams using advanced
                                    business tools.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-md-5 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        See More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Solutions Section -->


    <!-- Start Technology Section -->
    <section id="technology-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="subheading">Category</div>
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Our Technology
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="global-description pt-0 mt-1">
                    Get every thing about AI when reading Article and News
                </p>
            </div>
            <div class="articles row d-flex flex-nowrap overflow-hidden mt-4 mx-0">
                <div class=" col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/pages/home-page/hero-home-page.webp') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/about.jpg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/doc_team.jpg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/pages/home-page/hero-home-page.webp') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/about.jpg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-lg-4 mb-lg-0 mb-4">
                    <article>
                        <div class="article-img w-100 mb-3">
                            <img src="{{ asset('content/images/doc_team.jpg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="article-img" class="w-100 h-100 shadow-sm">
                        </div>
                        <div class="d-flex justify-content-between flex-column gap-3 text-md-start text-center">
                            <div>
                                <h5 class="fs-5-2 lh-sm text-main-color text-align-justify">
                                    NEN Technology in Marketing and Advertising
                                </h5>
                                <p
                                    class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter article-description text-align-justify mb-0">
                                    Welcome to our AI Image Generation website, where creativity meets
                                    technology!
                                    Harnessing the power of artificial intelligence, we bring you a world of
                                    limitless possibilities for image creation and transformation.
                                </p>
                            </div>
                            <a href="./blog-details.html"
                                class="d-flex align-items-center justify-content-center justify-content-md-start gap-4">
                                <span
                                    class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                            fill="#000" />
                                    </svg>
                                </span>
                                <span class="text-main-color">Read more</span>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="scroll-btns d-flex align-items-center justify-content-center gap-2 mt-4">
                <button class="scroll-left" id="prev" aria-label="Scroll Left" title="Scroll Left">
                    <span class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                fill="#000" />
                        </svg>
                    </span>
                </button>
                <button class="scroll-right" id="next" aria-label="Scroll Right" title="Scroll Right">
                    <span class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                fill="#000" />
                        </svg> </button>
            </div>
            <div class="d-flex justify-content-center mt-md-4 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        See More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Technology Section -->

    <!-- Start Doc Validation Section -->
    <section id="doc-validation-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Our Doc Validation
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="global-description pt-0 mt-1">
                    Get every thing about AI when reading Article and News
                </p>
            </div>
        </div>
        <div id="item-list" class=" py-md-5 py-3 mt-md-4 mt-3">
            <div class="container mx-auto">
                <div class="row g-3 mx-0">
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative doc-validation-card mb-md-4 mb-5">
                            <img alt="" class="doc-icon"
                                src="{{ asset('content/images/pages/home-page/doc-validation/1.svg') }}">
                            <h4 class="mt-3 mb-3 title text-white-color position-relative">
                                Create a business profile
                            </h4>
                            <div class="d-flex flex-column fs-6 lh-base mb-0 gap-3">
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Employees.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Providers.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Available Services.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Service Locations.
                                </li>
                            </div>
                            <div class="number position-absolute"> 1 </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative doc-validation-card mb-md-4 mb-5">
                            <img alt="" class="doc-icon"
                                src="{{ asset('content/images/pages/home-page/doc-validation/1.svg') }}">
                            <h4 class="mt-3 mb-3 title position-relative text-white-color">
                                Create a business profile
                            </h4>
                            <div class="d-flex flex-column fs-6 lh-base mb-0 gap-3">
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Employees.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Providers.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Available Services.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Service Locations.
                                </li>
                            </div>
                            <div class="number position-absolute"> 2 </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative doc-validation-card mb-md-4 mb-5">
                            <img alt="" class="doc-icon"
                                src="{{ asset('content/images/pages/home-page/doc-validation/1.svg') }}">
                            <h4 class="mt-3 mb-3 title position-relative text-white-color">
                                Create a business profile
                            </h4>
                            <div class="d-flex flex-column fs-6 lh-base mb-0 gap-3">
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Employees.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Providers.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Available Services.
                                </li>
                                <li class="d-flex align-items-baseline gap-2 text-item">
                                    <i class="bi bi-circle-fill circle"></i>
                                    Add Service Locations.
                                </li>
                            </div>
                            <div class="number position-absolute"> 3 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto">
            <div class="d-flex justify-content-center mt-md-4 mt-3">
                <button class="btn btn-solid-main">
                    <span>
                        See More
                    </span>
                    <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- End Doc Validation Section -->

    <!-- Start Join Us Section -->
    <section id="join-us-section" class="section-bundries">
        <div class="container mx-auto">
            <p class="text-main-color mb-0">
                Join Us
            </p>
            <h1>
                Join us with our team
            </h1>
            <p>
                We have the team and know-how to help you scale 10x faster.
            </p>

            <!-- World Map -->
            <div class="world-map">
                <div class="map-dot usa"></div>
                <div class="map-dot europe"></div>
                <div class="map-dot asia"></div>
                <div class="map-dot australia"></div>
            </div>

            <!-- Contact Cards -->
            <div class="container mt-5">
                <div class="row gy-4 justify-content-center">
                    <!-- Chat to Sales -->
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-card text-center">
                            <i class="bi bi-chat"></i>
                            <h5>Chat to sales</h5>
                            <p>Speak to our friendly team.</p>
                            <a href="mailto:sales@untitledui.com" class="email-link">
                                sales@untitledui.com
                            </a>
                        </div>
                    </div>

                    <!-- Chat to Support -->
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-card text-center">
                            <i class="bi bi-chat-left-dots"></i>
                            <h5>Chat to support</h5>
                            <p>We're here to help.</p>
                            <a href="mailto:support@untitledui.com" class="email-link">
                                support@untitledui.com
                            </a>
                        </div>
                    </div>

                    <!-- Visit Us -->
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-card text-center">
                            <i class="bi bi-geo-alt"></i>
                            <h5>Visit us</h5>
                            <p>Visit our office HQ.</p>
                            <a href="https://goo.gl/maps/" class="map-link" target="_blank">
                                View on Google Maps
                            </a>
                        </div>
                    </div>

                    <!-- Call Us -->
                    <div class="col-md-3 col-sm-6">
                        <div class="contact-card text-center">
                            <i class="bi bi-telephone"></i>
                            <h5>Call us</h5>
                            <p>Mon-Fri from 8am to 5pm.</p>
                            <a href="tel:+1555000000" class="phone-link">
                                +1 (555) 000-0000
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Join Us Section -->

    <!-- Start Find Us Section -->
    <section id="find-us-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <button class="btn btn-solid-main w-auto">SEE OPEN POSITIONS</button>
            </div>

            <!-- Locations Section -->
            <div class="row location-section justify-content-center">
                <!-- Egypt -->
                <div class="col-md-3 col-sm-6">
                    <div class="location-item border-0">
                        <h5 class="country-name">EGYPT</h5>
                        <p class="country-location">22 Tahrir Square, Downtown,<br> Cairo 11511</p>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Egypt.svg" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            class="country-flag shadow-sm" alt="Egypt Flag">
                    </div>
                </div>

                <!-- Saudi Arabia -->
                <div class="col-md-3 col-sm-6">
                    <div class="location-item">
                        <h5 class="country-name">SAUDI ARABIA</h5>
                        <p class="country-location">Riyadh Street, King Fahd District,<br> Riyadh 12211</p>
                        <img src="https://cdn.britannica.com/79/5779-050-46C999AF/Flag-Saudi-Arabia.jpg" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            class="country-flag shadow-sm" alt="Saudi Arabia Flag">
                    </div>
                </div>

                <!-- UAE -->
                <div class="col-md-3 col-sm-6">
                    <div class="location-item">
                        <h5 class="country-name">UAE</h5>
                        <p class="country-location">Sheikh Zayed Rd, 7th Floor,<br> Dubai 00000</p>
                        <img src="https://cdn.britannica.com/82/5782-050-8A763A9A/Flag-United-Arab-Emirates.jpg"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            class="country-flag shadow-sm" alt="UAE Flag">
                    </div>
                </div>

                <!-- Kuwait -->
                <div class="col-md-3 col-sm-6">
                    <div class="location-item">
                        <h5 class="country-name">KUWAIT</h5>
                        <p class="country-location">Al-Rai Industrial Area, Block 3,<br> Kuwait City 13071</p>
                        <img src="https://flagsireland.com/cdn/shop/files/KuwaitFlag.png?v=1705069776" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            class="country-flag shadow-sm" alt="Kuwait Flag">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Find Us Section -->

    <!-- Start Stats Section -->
    <section id="stats-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="subheading">Our Statistics</div>
            <div class="texts-data d-flex flex-column">
                <h5 class="global-title">
                    Your Ultimate Choice To Be Certified
                </h5>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
                <p class="description text-align-justify">
                    NEN | National Education Network for Communication and Information Technology with the main offices
                    in [London, Dubai, Cairo, Amman, and Tashkent] established@2008, to offer high-standard professional
                    services and enterprise solutions to help organizations to meet their business needs and identify
                    their goals, in cooperation with worldwide technology leaders.
                </p>
            </div>
            <div class="row justify-content-center w-100 mt-3 g-3">
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count">15</span>
                            <span class="count-tag">#</span>
                        </p>
                        <p class="label-text">
                            Years
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/748/investors.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count-tag">$</span>
                            <span class="count">1.5–2</span>
                            <span class="count-tag">M</span>
                        </p>
                        <p class="label-text">
                            Reduced Expenses
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/750/team.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count">28</span>
                            <span class="count-tag">#</span>
                        </p>
                        <p class="label-text">
                            Countries
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/748/investors.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count">21</span>
                            <span class="count-tag">#</span>
                        </p>
                        <p class="label-text">
                            Solutions
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/750/team.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count">74</span>
                            <span class="count-tag">#</span>
                        </p>
                        <p class="label-text">
                            Projects
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/748/investors.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="stats-card p-md-4 p-3">
                        <p class="counter-text">
                            <span class="count">10K</span>
                            <span class="count-tag">+</span>
                        </p>
                        <p class="label-text">
                            Customers
                        </p>
                        <div class="image-box">
                            <img src="https://dev.nendemo2024.xyz/media/750/team.svg" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about-img" class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Stats Section -->

    <!-- Start Contact Section -->
    <!-- <section id="contact-us-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="texts-data d-flex flex-column">
                        <h5 class="global-title">
                            Contact Us
                        </h5>
                        <div class="under-title-vector">
                            <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                        </div>
                        <p class="global-description pt-0 mt-1">
                            If you have any questions, suggestions, or complaints, feel free to contact us.
                        </p>
                    </div>

                    <form id="contactForm" class="contact-form mt-md-4 mt-3">
                        <fieldset>
                            <label>Reason for Contact</label>
                            <div class="radio-group mt-2">
                                <label>
                                    <input type="radio" name="contactReason" value="inquiry" required>
                                    Inquiry
                                </label>
                                <label>
                                    <input type="radio" name="contactReason" value="complaint" required>
                                    Complaint
                                </label>
                                <label>
                                    <input type="radio" name="contactReason" value="suggestion" required>
                                    Suggestion
                                </label>
                                <div class="error-message" data-error="contactReason"></div>
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" required minlength="3">
                            <div class="error-message" data-error="fullName"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required>
                            <div class="error-message" data-error="email"></div>
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" required>
                            <div class="error-message" data-error="phoneNumber"></div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" required minlength="3"></textarea>
                            <div class="error-message" data-error="message"></div>
                        </div>

                        <button type="submit" class="btn btn-solid-main">Send</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="contact-image rounded h-100">
                        <img src="https://media.voltron.alhurra.com/Drupal/01live-126/styles/sourced/s3/2019-12/47FA9734-FD85-4ED5-A492-290A0218B61B.jpg?itok=1UzdSy4o"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="about-img" class="rounded">
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Contact Section -->
    <!-- Start Join our Team -->
    <section id="join-our-team" class="section-bundries">
        <div class="container mx-auto">
            <div class="texts-data align-items-center">
                <p class="text-main-color mb-0">
                    Join Us
                </p>
                <h1>
                    Join us with our team
                </h1>
                <p>
                    We have the team and know-how to help you scale 10x faster.
                </p>

            </div>
            <div class="row justify-content-center align-items-center mt-5 gap-4">

                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <p>Hello</p>
                    <div class="cover">
                        <img class="w-100 h-100"
                            src="http://127.0.0.1:8000/content/images/pages/home-page/hero-home-page.webp" alt="">
                    </div>
                </div>
                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <p>Hello</p>
                    <div class="cover">
                        <img class="w-100 h-100" src="http://127.0.0.1:8000/content/images/doc_team.jpg" alt="">
                    </div>
                </div>
                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <p>Hello</p>
                    <div class="cover">
                        <img class="w-100 h-100" src="http://127.0.0.1:8000/content/images/about.jpg" alt="">
                    </div>
                </div>
                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <p>Hello</p>
                    <div class="cover">
                        <img class="w-100 h-100"
                            src="https://www.globalfocusmagazine.com/wp-content/uploads/2020/02/Engaging_with_technology-1536x1024.jpg"
                            alt="">
                    </div>
                </div>
                <div class="book col-lg-2 col-md-4 col-sm-6">
                    <p>Hello</p>
                    <div class="cover">
                        <img class="w-100 h-100"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4aZpkugDl106LnBdxudqbifCp7-x4UWIQ7dIV-AWwIv0VfXeVGJJb226s5fMi7LweoFg&usqp=CAU"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Join our Team -->
    <!-- Start Check -->
    <section id="check-section" class="section-bundries">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="global-title">Check-In Regulations</h2>
                    <div class="under-title-vector">
                        <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="fs-6-1 ls-1 text-black-50 mt-2 fw-lighter mb-0">The
                        test proctor is authorized to end the test, hide test results,
                        or
                        block the candidates account if the test taker failed to apply the following instructions.</p>
                </div>
            </div>
            <div class="row g-4 mt-3">
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-handshake card-icon"></i>
                                <h5 class="card-title">Cooperations</h5>
                            </div>
                            <p class="card-text">Cooperating with the proctor during the inspection process.</p>
                        </div>
                        <i class="fa-solid fa-handshake card-icon"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-id-card card-icon"></i>
                                <h5 class="card-title">Identification</h5>
                            </div>

                            <p class="card-text">Bring the original Valid National ID or Passport.</p>
                        </div>
                        <i class="fa-solid fa-id-card card-icon"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center"><i class="fa-solid fa-camera card-icon"></i>
                                <h5 class="card-title">Facial Recognition</h5>
                            </div>

                            <p class="card-text">Sitting properly in front of the camera or wearing stuff that may hide
                                his/her face.</p>
                        </div>
                        <i class="fa-solid fa-camera card-icon"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center"><i class="fa-solid fa-phone card-icon"></i>
                                <h5 class="card-title">Violations</h5>
                            </div>
                            <p class="card-text">Using banned stuff such as test preparation material, mobile phones.
                            </p>
                        </div>
                        <i class="fa-solid fa-phone card-icon"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center"><i class="fa-solid fa-utensils card-icon"></i>
                                <h5 class="card-title">Manners</h5>
                            </div>
                            <p class="card-text">Eating, drinking, or side-talking during the test, or leaving the room
                                before ending.</p>
                        </div>
                        <i class="fa-solid fa-utensils card-icon"></i>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-12 h-100">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex gap-2 align-items-center"> <i
                                    class="fa-solid fa-user-secret card-icon"></i>
                                <h5 class="card-title">Deception</h5>
                            </div>
                            <p class="card-text">All attempts of copying questions or answers are prohibited.</p>
                        </div>
                        <i class="fa-solid fa-user-secret card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="mt-4 note">
                <h6 class="mb-2">
                    <i class="fa-solid fa-pen-to-square card-icon"></i>
                    note
                </h6>
                <p>In case of technical problems or power cuts, the test will be resumed where it stopped while safely
                    keeping the remaining time, and test takers are not allowed to leave the room unless they have
                    waited for at least 30 minutes. Then the proctor will fill out the status report and then the test
                    taker shall decide whether to resume the test or repeat</p>
            </div>
        </div>
    </section>
    <!-- End Check -->
    <!-- Start Blogs -->
    <section id="blogs-section" class="section-bundries">
        <div class="container mx-auto">
            <div>
                <h2 class="global-title">Our Blogs</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
                </div>
            </div>
            <div class="blogs d-flex align-item-center flex-nowrap gap-2 overflow-hidden px-2 mt-4">
                <div class="card border-0 col-12 col-md-6 col-lg-4">
                    <a href="#" class="text-black text-decoration-none">
                        <div class="img-container">
                            <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                src="https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp "
                                alt="A fashionista's guide to wanderlust">

                        </div>
                        <div class="card-body d-flex flex-column  justify-content-between">
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div
                                        class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                        <span class="Publication-date d-flex gap-2 align-items-center">
                                            <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35"
                                                data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                    </path>
                                                    <path
                                                        d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                    </path>
                                                    <path
                                                        d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                    </path>
                                                    <path
                                                        d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            20 Jan 2024 </span>
                                        <span class="read-time d-flex gap-2 align-items-center">
                                            <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            8 minutes ago </span>
                                    </div>
                                    <h4 class="card-title text-truncate fs-3 mb-1">A fashionista's guide to wanderlust
                                    </h4>
                                    <div class="description">
                                        <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                            Explore the intersection of fashion and travel as we dive into the wardrobes
                                            of globetrotters.
                                        </p>
                                    </div>
                                </div>

                                <div class="profile justify-content-between d-flex align-items-center gap-2">
                                    <div class="name d-flex gap-2">
                                        <svg width="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Lifestyle
                                    </div>
                                    <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card border-0 col-12 col-md-6 col-lg-4">
                    <a href="#" class="text-black text-decoration-none">
                        <div class="img-container">
                            <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                src="https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp "
                                alt="A fashionista's guide to wanderlust">

                        </div>
                        <div class="card-body d-flex flex-column  justify-content-between">
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div
                                        class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                        <span class="Publication-date d-flex gap-2 align-items-center">
                                            <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35"
                                                data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                    </path>
                                                    <path
                                                        d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                    </path>
                                                    <path
                                                        d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                    </path>
                                                    <path
                                                        d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            20 Jan 2024 </span>
                                        <span class="read-time d-flex gap-2 align-items-center">
                                            <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            8 minutes ago </span>
                                    </div>
                                    <h4 class="card-title text-truncate fs-3 mb-1">A fashionista's guide to wanderlust
                                    </h4>
                                    <div class="description">
                                        <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                            Explore the intersection of fashion and travel as we dive into the wardrobes
                                            of globetrotters.
                                        </p>
                                    </div>
                                </div>

                                <div class="profile justify-content-between d-flex align-items-center gap-2">
                                    <div class="name d-flex gap-2">
                                        <svg width="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Lifestyle
                                    </div>
                                    <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card border-0 col-12 col-md-6 col-lg-4">
                    <a href="#" class="text-black text-decoration-none">
                        <div class="img-container">
                            <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                src="http://127.0.0.1:8000/content/images/pages/home-page/hero-home-page.webp "
                                alt="A fashionista's guide to wanderlust">

                        </div>
                        <div class="card-body d-flex flex-column  justify-content-between">
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div
                                        class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                        <span class="Publication-date d-flex gap-2 align-items-center">
                                            <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35"
                                                data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                    </path>
                                                    <path
                                                        d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                    </path>
                                                    <path
                                                        d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                    </path>
                                                    <path
                                                        d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            20 Jan 2024 </span>
                                        <span class="read-time d-flex gap-2 align-items-center">
                                            <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            8 minutes ago </span>
                                    </div>
                                    <h4 class="card-title text-truncate fs-3 mb-1">A fashionista's guide to wanderlust
                                    </h4>
                                    <div class="description">
                                        <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                            Explore the intersection of fashion and travel as we dive into the wardrobes
                                            of globetrotters.
                                        </p>
                                    </div>
                                </div>

                                <div class="profile justify-content-between d-flex align-items-center gap-2">
                                    <div class="name d-flex gap-2">
                                        <svg width="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Lifestyle
                                    </div>
                                    <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card border-0 col-12 col-md-6 col-lg-4">
                    <a href="#" class="text-black text-decoration-none">
                        <div class="img-container">
                            <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                src="https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp "
                                alt="A fashionista's guide to wanderlust">

                        </div>
                        <div class="card-body d-flex flex-column  justify-content-between">
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div
                                        class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                        <span class="Publication-date d-flex gap-2 align-items-center">
                                            <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35"
                                                data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                    </path>
                                                    <path
                                                        d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                    </path>
                                                    <path
                                                        d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                    </path>
                                                    <path
                                                        d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            20 Jan 2024 </span>
                                        <span class="read-time d-flex gap-2 align-items-center">
                                            <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            8 minutes ago </span>
                                    </div>
                                    <h4 class="card-title text-truncate fs-3 mb-1">A fashionista's guide to wanderlust
                                    </h4>
                                    <div class="description">
                                        <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                            Explore the intersection of fashion and travel as we dive into the wardrobes
                                            of globetrotters.
                                        </p>
                                    </div>
                                </div>

                                <div class="profile justify-content-between d-flex align-items-center gap-2">
                                    <div class="name d-flex gap-2">
                                        <svg width="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Lifestyle
                                    </div>
                                    <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card border-0 col-12 col-md-6 col-lg-4">
                    <a href="#" class="text-black text-decoration-none">
                        <div class="img-container">
                            <img class="card-img w-100 h-100 object-fit-cover rounded-2"
                                src="https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp "
                                alt="A fashionista's guide to wanderlust">

                        </div>
                        <div class="card-body d-flex flex-column  justify-content-between">
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <div
                                        class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                                        <span class="Publication-date d-flex gap-2 align-items-center">
                                            <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35"
                                                data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z">
                                                    </path>
                                                    <path
                                                        d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z">
                                                    </path>
                                                    <path
                                                        d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z">
                                                    </path>
                                                    <path
                                                        d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            20 Jan 2024 </span>
                                        <span class="read-time d-flex gap-2 align-items-center">
                                            <svg fill="#000000" width="18" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                                xml:space="preserve">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g>
                                                        <g>
                                                            <polygon
                                                                points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 ">
                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            8 minutes ago </span>
                                    </div>
                                    <h4 class="card-title text-truncate fs-3 mb-1">A fashionista's guide to wanderlust
                                    </h4>
                                    <div class="description">
                                        <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                                            Explore the intersection of fashion and travel as we dive into the wardrobes
                                            of globetrotters.
                                        </p>
                                    </div>
                                </div>

                                <div class="profile justify-content-between d-flex align-items-center gap-2">
                                    <div class="name d-flex gap-2">
                                        <svg width="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Lifestyle
                                    </div>
                                    <svg width="20" class="go" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="scroll-btns d-flex align-items-center justify-content-center gap-2 mt-4">
                <button class="scroll-left" id="prevBlog" aria-label="Scroll Left" title="Scroll Left">
                    <span class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                fill="#000" />
                        </svg>
                    </span>
                </button>
                <button class="scroll-right" id="nextBlog" aria-label="Scroll Right" title="Scroll Right">
                    <span class="arrow-icon rounded-circle d-flex justify-content-center align-items-center scaleX-rtl">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.6309 6.33869C12.5833 6.21599 12.5119 6.10379 12.4209 6.00869L7.42094 1.00869C7.32774 0.915449 7.21704 0.841489 7.09514 0.791029C6.97334 0.740569 6.84284 0.7146 6.71094 0.7146C6.44464 0.7146 6.18924 0.820389 6.00094 1.00869C5.90774 1.10193 5.83374 1.21262 5.78324 1.33444C5.73284 1.45627 5.70684 1.58683 5.70684 1.71869C5.70684 1.98499 5.81264 2.24039 6.00094 2.42869L9.30094 5.71869H1.71094C1.44572 5.71869 1.19137 5.82409 1.00383 6.01159C0.816298 6.19909 0.710938 6.45349 0.710938 6.71869C0.710938 6.98389 0.816298 7.23829 1.00383 7.42579C1.19137 7.61329 1.44572 7.71869 1.71094 7.71869H9.30094L6.00094 11.0087C5.90724 11.1017 5.83284 11.2123 5.78204 11.3341C5.73124 11.456 5.70514 11.5867 5.70514 11.7187C5.70514 11.8507 5.73124 11.9814 5.78204 12.1033C5.83284 12.2251 5.90724 12.3357 6.00094 12.4287C6.09394 12.5224 6.20454 12.5968 6.32634 12.6476C6.44824 12.6984 6.57894 12.7245 6.71094 12.7245C6.84294 12.7245 6.97364 12.6984 7.09554 12.6476C7.21734 12.5968 7.32794 12.5224 7.42094 12.4287L12.4209 7.42869C12.5119 7.33359 12.5833 7.22149 12.6309 7.09869C12.7309 6.85519 12.7309 6.58219 12.6309 6.33869Z"
                                fill="#000" />
                        </svg> </button>
            </div>
            <button class="btn btn-solid-main m-auto mt-4">
                See More
                <i class="bi bi-arrow-right scaleX-rtl fs-8"></i>
            </button>
        </div>
</div>
</section>
<!-- End Blogs -->

</div>
<script>
const articlesWrapper = document.querySelector('.articles');
const articles = document.querySelectorAll('.articles article');
const nextButton = document.getElementById('next');
const prevButton = document.getElementById('prev');
const articleWidth = articles[0].clientWidth;

nextButton.addEventListener('click', () => {
    articlesWrapper.scrollBy({
        left: articleWidth,
        behavior: 'smooth',
    });
});

prevButton.addEventListener('click', () => {
    articlesWrapper.scrollBy({
        left: -articleWidth,
        behavior: 'smooth',
    });
});
const blogContainer = document.querySelector('.blogs');
const prevBlog = document.getElementById('prevBlog');
const nextBlog = document.getElementById('nextBlog');

const scrollAmount = 300;

prevBlog.addEventListener('click', () => {
    blogContainer.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
    });
});

nextBlog.addEventListener('click', () => {
    blogContainer.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
});
</script>
@endsection

@section('websiteScript')

@endsection