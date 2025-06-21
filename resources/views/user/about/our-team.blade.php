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

<!-- ============================================================================= -->
<!-- update/page-nav Ms -->
<!-- <div class="container w-100 overflow-hidden">
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
</div> -->
<!-- ============================================================================= -->

<!-- ============================================================================= -->
<!-- joinus- Ms -->
<!-- <div class="modern-tabs">
    <div class="tabs-header">
        <button class="tab-btn active" data-tab="why-join">Why Join?</button>
        <button class="tab-btn" data-tab="member-benefits">Member Benefits</button>
        <button class="tab-btn" data-tab="requirements">Requirements & Conditions</button>
        <button class="tab-btn" data-tab="steps">Registration Steps</button>
        <button class="tab-btn" data-tab="faq">FAQ</button>
    </div>

    <div class="tabs-body">
        <div id="why-join" class="tab-pane active">
            <h2><span class="icon-titel"><i class="fa-solid fa-question"></i></span> Why join?</h2>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('content/images/؟.jpg') }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">
                >
            </div>
            <p>
                With the multiplicity of training centers and the diversity of their advertising messages, it has become
                difficult to choose a reliable entity that is able to save you the effort and time in searching for your
                development and growth needs with high quality that you trust, with accredited and documented
                certificates, and at the lowest possible cost. Therefore, the “National Education Network” offers you
                membership to facilitate many of the difficulties that you constantly face, including:
            </p>

            <div class="row mt-5 gap-y-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-people-group icon"></i></span>
                        <h3>Work Team</h3>
                        <p class="dec-item">
                            We have a team of professionally experienced staff and carefully selected faculty members to
                            meet the needs and transfer scientific knowledge to our clients. We rely on the largest
                            database of elite trainers with international certifications and licenses from top global
                            companies, allowing you to choose your own trainer and verify their accreditation
                            beforehand.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-check-circle icon"></i></span>
                        <h3>Quality Assurance</h3>
                        <p class="dec-item">
                            We guarantee solutions to routine problems found in training centers through the latest
                            scientific methods in training process management, performance tracking, and evaluation. We
                            follow international systems like G.T.S for training, G.E.S for exams, and M.T.M for global
                            benchmarking.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-graduation-cap icon"></i></span>
                        <h3>Diverse Educational Services</h3>
                        <p class="dec-item">
                            We use the latest global methods in education to make learning content easier and faster to
                            absorb, such as virtual classrooms, distance learning, and interactive education.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-certificate icon"></i></span>
                        <h3>Accredited Certificates</h3>
                        <p class="dec-item">
                            All certificates are internationally recognized through our partners such as Microsoft,
                            Oracle, Cisco, and other global technology leaders.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-wallet icon"></i></span>
                        <h3>Saving Money</h3>
                        <p class="dec-item">
                            Members can save money by getting Elite Membership Cards, collecting reward points, and
                            subscribing to funded programs and scholarships. Discounts of up to 50% are available on
                            training courses and international exams.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-clock icon"></i></span>
                        <h3>Saving Time</h3>
                        <p class="dec-item">
                            Our clients can save time by joining one-day workshops or training remotely using
                            interactive learning, with the ability to take exams worldwide.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-user icon"></i></span>
                        <h3>Personal Student Account</h3>
                        <p class="dec-item">
                            We provide our clients with a free account to access the digital library, manage bookings,
                            submit complaints and suggestions, request technical support, and follow the training
                            process.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-mobile-screen icon"></i></span>
                        <h3>Mobile App</h3>
                        <p class="dec-item">
                            Our clients can stay updated on our latest offers, confirm bookings, and enjoy many features
                            through our i*Connect mobile application.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-globe icon"></i></span>
                        <h3>Geographic Presence</h3>
                        <p class="dec-item">
                            We have over 1,000 trainers and 500 internationally certified training centers across the
                            Middle East, under the direct supervision of the National Education Network.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-file-lines icon"></i></span>
                        <h3>International Exams</h3>
                        <p class="dec-item">
                            We offer more than 80 internationally accredited exam centers across the Middle East. We're
                            also the only entity with a mobile international exam center outside the UK and the USA,
                            ensuring the highest service standards.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-hand-holding-dollar icon"></i></span>
                        <h3>Scholarships & Financial Support</h3>
                        <p class="dec-item">
                            The National Education Network partners with governments and international organizations to
                            provide scholarships and free training programs. You'll be notified via email as soon as you
                            register.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="item-join">
                        <span class="icon-item"><i class="fa-solid fa-briefcase icon"></i></span>
                        <h3>Real Job Opportunities</h3>
                        <p class="dec-item">
                            We help combat unemployment by collaborating with over 13 global job networks and
                            coordinating with international companies to meet market demands. We also offer e-commerce
                            programs to train students in freelancing via the internet.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="member-benefits" class="tab-pane">
            <h2><span class="icon-titel"><i class="fa-solid fa-gift"></i></span> Affiliate Member Benefits
            </h2>

            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('content/images/handshake-close-up-executives.jpg') }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">

                >
            </div>


            <div>
                <div class="box-certificate my-4">
                    <h4>Certificates</h4>
                </div>
                <div class="row gap-y-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">1</span>
                            <p class="dec-item">
                                Members receive an original attendance certificate from the "National Education
                                Network," internationally recognized and attested by the Ministry of Foreign Affairs.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">2</span>
                            <p class="dec-item">
                                Members receive global attendance certificates directly from the original international
                                companies such as Microsoft, Cisco, Oracle, etc.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">3</span>
                            <p class="dec-item">
                                Members receive official international exam certificates directly from the issuing
                                companies like Microsoft, Cisco, Oracle, etc.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">4</span>
                            <p class="dec-item">
                                Possibility of obtaining a certificate from the Arab Union, stamped and certified by the
                                Economic Unity Council of the League of Arab States, and recognized in 22 countries.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">5</span>
                            <p class="dec-item">
                                Option to have the certificate attested by the Knowledge and Human Development Authority
                                (Government of Dubai), recognized across the Gulf Cooperation Council (GCC) countries.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">6</span>
                            <p class="dec-item">
                                Eligibility to obtain a one-year equivalent experience certificate attested by the
                                Ministry of Foreign Affairs upon completing professional diploma training.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="box-certificate my-4">
                    <h4>Quality & Supervision</h4>
                </div>
                <div class="row gap-y-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">1</span>
                            <p class="dec-item">
                                Members receive high-level practical training supervised and managed through an
                                integrated electronic system specially designed to protect students from unofficial
                                training courses.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">2</span>
                            <p class="dec-item">
                                Training is conducted on licensed programs and internationally accredited curricula,
                                selected and prepared according to labor market needs, accompanied by international
                                exams for globally accredited certificates.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">3</span>
                            <p class="dec-item">
                                Members can choose the appropriate internationally accredited trainer anywhere in the
                                world through the International Trainers Network of the "National Education Network,"
                                which includes the largest number of professional trainers in one place.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">4</span>
                            <p class="dec-item">
                                Members can control the location and timing of international exams, even if the center
                                is not accredited as an international exam center, as the "National Education Network"
                                is the only entity in the Middle East licensed for a mobile exam center.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">5</span>
                            <p class="dec-item">
                                Original licenses to operate software programs and applications.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">6</span>
                            <p class="dec-item">
                                Specialized practical training equipment and devices.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">7</span>
                            <p class="dec-item">
                                Technical evaluation of trainers is conducted through the global measurement system
                                "Metrics That Matter."
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">8</span>
                            <p class="dec-item">
                                Members can manage and monitor training via the (I*Connect) system, which provides
                                technical support and performance evaluation services.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="box-certificate my-4">
                    <h4>International Exams</h4>
                </div>
                <div class="row gap-y-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">1</span>
                            <p class="dec-item">
                                Special support for international exams with discounts of up to 50%.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">2</span>
                            <p class="dec-item">
                                Ability to conduct international exams in all cities and countries worldwide.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="box-certificate my-4">
                    <h4>Support & General Benefits</h4>
                </div>
                <div class="row gap-y-4">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">1</span>
                            <p class="dec-item">
                                Members receive free subscriptions to the electronic library and free educational
                                packages, along with a free account for interactive learning programs in the "Teach Me"
                                initiative.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">2</span>
                            <p class="dec-item">
                                Members can join workshops completely free of charge, saving time by testing their
                                abilities before specializing in a certain study field and getting familiar with it to
                                know if it suits them.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">3</span>
                            <p class="dec-item">
                                Members receive a free membership card of the "National Education Network," allowing
                                access to more than 13 job search engines and assisting with immigration and study
                                abroad procedures through cooperation agreements with major specialized offices.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">4</span>
                            <p class="dec-item">
                                Members can save money by upgrading their "National Education Network" membership and
                                obtaining a 50% discount on all training courses and international exams held at all
                                accredited training centers worldwide.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">5</span>
                            <p class="dec-item">
                                Members receive the International Student Identity Card (ISIC) accredited by UNESCO,
                                which grants discounts on travel and accommodation abroad.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">6</span>
                            <p class="dec-item">
                                Members receive a $100 discount card that can be gifted to a friend and used at all
                                accredited centers.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">7</span>
                            <p class="dec-item">
                                Members can apply to join the "Exclusive International Trainers Network" of the
                                "National Education Network" after completing the internationally accredited trainer
                                preparation course from the educational partner, enabling them to train and issue
                                accredited certificates.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="item-join-2">
                            <span class="icon-item static">8</span>
                            <p class="dec-item">
                                Members receive newsletters with the latest news about scholarships, courses, projects,
                                and educational initiatives offered by the "National Education Network" to their
                                registered email.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="requirements" class="tab-pane">

            <h2><span class="icon-titel"><i class="fa-solid fa-clipboard-list icon"></i></span> Registration
                Requirements and Conditions</h2>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('content/images/55.png') }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">

                >
            </div>
            <p>
                With the multiplicity of training centers and the diversity of their advertising messages, it has become
                difficult to choose a reliable entity that is able to save you the effort and time in searching for your
                development and growth needs with high quality that you trust, with accredited and documented
                certificates, and at the lowest possible cost. Therefore, the “National Education Network” offers you
                membership to facilitate many of the difficulties that you constantly face, including:
            </p>
        </div>

        <div id="steps" class="tab-pane">
            <h2><span class="icon-titel"><i class="fa-solid fa-pen-to-square icon"></i></span>Registration and
                Subscription Steps</h2>
            <p>Our streamlined registration and subscription process ensures you join us quickly and effortlessly. Just
                follow these simple steps to get started. We’re glad you’re here — thank you for choosing to be part of
                our community</p>

            <div class="inner-container">
                <div class="processing-block-one">
                    <div class="arrow-shape"
                        style="background-image: url('{{ asset('content/images/shape-12.png') }}'); width: 80px; height: 50px; background-size: contain; background-repeat: no-repeat;">
                    </div>
                    <div class="inner-box-Subscription ">
                        <span class="count-text">01 <br>Step</span>
                        <p>
                            Fill out the registration form through the following website:
                            <a href="www.nen-global.org/reg">www.nen-global.org/reg</a>
                            Note: The student is responsible for the accuracy of the data entered in their personal
                            account on the electronic system, especially their name and ID number.
                        </p>
                    </div>
                </div>
                <div class="processing-block-one">
                    <div class="arrow-shape arrow-shape-2"
                        style="background-image: url('{{ asset('content/images/shape-13.png') }}'); width: 80px; height: 50px; background-size: contain; background-repeat: no-repeat;">
                    </div>
                    <div class=" arrow-shape-3"
                        style="background-image: url('{{ asset('content/images/shape-13.png') }}'); width: 80px; height: 50px; background-size: contain; background-repeat: no-repeat;">
                    </div>
                    <div class="inner-box-Subscription ">
                        <span class="count-text">02 <br>Step</span>
                        <p>The message "You have been successfully registered" will appear, and you will receive an
                            email containing your membership number and username.</p>
                    </div>
                </div>
                <div class="processing-block-one">
                    <div class="inner-box-Subscription ">
                        <span class="count-text">03 <br>Step</span>
                        <p>Log in to the members' system and pay the membership fee through the following link: <a
                                href="www.nen-global.org/members">www.nen-global.org/members</a>
                            Note: Membership is free until December 31, 2017.</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="faq" class="tab-pane">
            <h2><span class="icon-titel"><i class="fas fa-question-circle"></i>
                </span>FAQ </h2>
            <p>
                The Frequently Asked Questions (FAQ) section provides clear and quick answers to the most common
                questions about our services. Here, you’ll find helpful information about how to use our platform,
                payment details, shipping, and our various policies — all without needing to contact support.</p>
            <div class="rounded-4  overflow-hidden my-2"
                style="background-image: url('{{ asset('content/images/4804.jpg') }}'); height: 40vh;width: 100%; background-size: cover; background-repeat: no-repeat;">
            </div>
            <div>
                <div class="faq-container">
                    <div class="faq-item">
                        <div class="faq-question active"><span class="number">01</span>How can I participate in NEN
                            activities and courses?</div>
                        <div class="faq-answer">
                            • Follow us on social media to stay updated with all announcements and events.<br>
                            • Check your email regularly — we send updates about scholarships, courses, and projects
                            directly to your registered email.<br>
                            • Call our hotline to speak with a customer service representative about any course you’d
                            like to join.<br>
                            • Email us at <strong><a href="cc@nen-global.org">cc@nen-global.org</a></strong> and one of
                            our support agents will respond to your inquiries.<br>
                            • Chat with us directly using the live chat service for instant assistance.<br>
                            • Choose your desired course through the website, register on the waiting list, and one of
                            our training advisors will contact you soon. <a href="#">Click here for more</a>.<br>
                            • For more information about international certificates, <a href="#">click here</a>.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question"><span class="number">02</span>How can I recharge my balance?</div>
                        <div class="faq-answer">
                            Any member can recharge their balance through the e-wallet. <a href="#">Click here</a>.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question"><span class="number">03</span>What if I have other inquiries?</div>
                        <div class="faq-answer">
                            • Please send an email to <strong><a href="cc@nen-global.org">cc@nen-global.org</a></strong>
                            and our support team will get back to you shortly.<br>
                            • Or speak directly to one of our customer service agents via live chat.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> -->
<!-- ============================================================================= -->

<div id="our-teams-section" class="container w-100 overflow-hidden">
    @if ($fSection = $items->where('item', 'section-one')->first())
    <div class="texts-data d-flex flex-column align-items-start">
        <h5 class="global-title">
            {{ $fSection->title }}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
        <p class="global-description">
            {{ strip_tags($fSection->description) }}
        </p>
    </div>
    <div class="our-teams_img">
        <img src="{{ $fSection->getFirstMediaUrl('OurTeam') }}" loading="lazy"
            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
    </div>
    @endif
    @if ($items->count())
    <div class="our-teams mt-md-5 mt-3">
        <div class="text-start">
            <p class="sub-title">
                Our Teams
            </p>
            <h5 class="global-title">
                Meet our team
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>

        <!-- Start Teams Tabs -->
        <div class="tabs-items mt-md-4 mt-3">
            <!-- Swiper Container -->

            <div>
                <div class="box-btn-slider">
                    <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide">
                        <!-- <i class="fa-solid fa-arrow-left icon-left"></i> -->
                        <i class="fa-solid fa-arrow-left-long icon-left"></i>

                    </div>
                    <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                        <!-- <i class="fa-solid fa-arrow-right icon-right"></i> -->
                        <i class="fa-solid fa-arrow-right-long icon-right"></i>
                    </div>
                </div>
                <div class="swiper-container">
                    <!-- Swiper Wrapper for Tabs -->
                    <div class="swiper-wrapper px-5">
                        @foreach ($managements as $management)
                        <?php $string = str_replace(' ', '-', strtolower($management->translate('title', 'en'))); ?>
                        <div class="swiper-slide nav-item" role="presentation">
                            <button class="nav-link swiper-tab @if ($loop->first) active @endif" id="{{ $string }}-tab"
                                data-bs-toggle="tab" data-bs-target="#{{ $string }}" type="button" role="tab"
                                aria-controls="{{ $string }}" aria-selected="true"
                                data-id="{{ $management->id }}">{{ $management->translate('title', app()->getLocale()) }}</button>
                        </div>
                        @endforeach
                    </div>

                    <!-- Swiper Navigation Buttons -->

                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content mt-3" id="teamTabContent">
                @foreach ($managements as $management)
                <div class="tab-pane fade @if ($loop->first) show active @endif"
                    id="{{ str_replace(' ', '-', strtolower($management->translate('title', 'en'))) }}" role="tabpanel"
                    aria-labelledby="{{ str_replace(' ', '-', strtolower($management->translate('title', 'en'))) }}-tab">
                    <div class="team-list d-flex justify-content-center justify-content-md-start flex-wrap gap-1 mt-3">
                        @foreach ($members as $item)
                        <div class="our-team p-3 rounded-3">
                            <div class="pic shadow-sm">
                                <img src="{{ $item->getFirstMediaUrl('OurTeam') }}" loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                    alt="Team Member">
                                <ul class="social">
                                    @if ($item->facebook != "")
                                    <li><a target="_blank" href="{{ $item->facebook }}" class="bi bi-facebook"></a></li>
                                    @endif
                                    @if ( $item->whatsapp)
                                    <li><a target="_blank" href="https://wa.me/{{ $item->whatsapp }}"
                                            class="bi bi-whatsapp"></a></li>
                                    @endif
                                    @if ($item->instagram)
                                    <li><a target="_blank" href="{{ $item->instagram }}" class="bi bi-instagram"></a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3 class="title">{{ $item->name }}</h3>
                                    <span class="post text-center">{{ $item->jop }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Teams Tabs -->
    </div>

</div>
@endif
</div>



@endsection
@section('websiteScript')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // كود التعامل مع nav-link (لينكات القائمة الجانبية أو العادية)
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.nav-link.active').forEach(activeTab => {
                activeTab.classList.remove('active');
            });
            const managementId = this.getAttribute('data-id');
            this.classList.add('active');

            // بناء رابط URL بطريقة صحيحة
            let url = "{{ route('get-team-members', ['id' => ':id']) }}".replace(':id',
                managementId);

            // طلب AJAX لجلب البيانات
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('teamTabContent').innerHTML = data.data;
                })
                .catch(error => console.error('Error:', error));
        });
    });

    // تهيئة Swiper بعد تحميل الصفحة
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
        }
    });

    // كود التبويبات tabs
    const tabButtons = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-pane");

    tabButtons.forEach(button => {
        button.addEventListener("click", () => {
            // إزالة التفعيل من الكل
            tabButtons.forEach(btn => btn.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            // تفعيل الزر الحالي والمحتوى الخاص به
            button.classList.add("active");
            document.getElementById(button.dataset.tab).classList.add("active");
        });
    });

    // FAQ
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            faqQuestions.forEach(q => {
                if (q !== question) q.classList.remove('active');
            });
            question.classList.toggle('active');
        });
    });
});
</script>
@endsection