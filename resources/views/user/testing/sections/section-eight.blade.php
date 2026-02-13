   
    @php
    $section_eight = App\Models\TestingTechnologySection::where('design_section_id',8)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
   <section class="faq-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title" style="font-size: 1.6rem; font-weight: 700;">{{ $section_eight->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start" style="font-size: 1.1rem;">
                   {{ strip_tags($section_eight->description) }}</p>
            </div>
            <div class="row g-4 align-items-center" >
                <div class="col-lg-7 order-2 order-lg-1" data-aos="fade-right">
                    <div class="faq-container-professional">


                    @php
                          
                    $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',8)->get();
                   @endphp

                      @foreach($items as $row)
                        <div class="faq-item-professional" data-aos="fade-up" data-aos-delay="100">
                            <div class="faq-question-professional" onclick="toggleFaq(this)">
                                <h5> {{ strip_tags( $row->title) }}</h5>
                                <i class="bi bi-plus"></i>
                            </div>
                            <div class="faq-answer-professional">
                                <p>  {{ strip_tags( $row->description) }}</p>
                            </div>
                        </div>
                        @endforeach
                        
                      
                     
                       
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-left">
                    <div class="faq-image-wrapper">
                        <div class="faq-main-image">
                            <img src="{{ asset('storage/setting_testing_technology/'.$section_eight->image_1) }}" 
                                 alt="FAQ" class="img-fluid">
                        </div>
                        <div class="faq-circle-image">
                            <img src="{{ asset('storage/setting_testing_technology/'.$section_eight->image_2) }}" 
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