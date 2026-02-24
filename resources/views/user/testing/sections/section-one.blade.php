
 <style>
.section-description ul {
    list-style-type: disc;
    padding-left: 20px;
}

.section-description ol {
    list-style-type: decimal;
    padding-left: 20px;
}
    </style>
@php
    $section_one = App\Models\TestingTechnologySection::where('design_section_id',1)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
    

    <!-- Section 1: Image Right, Text Left -->
    <section class="image-text-section-no-bg py-4 mt-3">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="global-title mb-0">{{  $section_one->title  }}</h2>
                    <div class="under-title-vector mb-4">
                        <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                    </div>
                    <div>
                        <p class="section-description mb-4">
                            {!!  $section_one->description  !!}
                                 </p>
                   
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="image-wrapper-unified-small">
                        <img src="{{ asset('storage/setting_testing_technology/'.$section_one->image_1) }}" 
                             alt="Testing Solutions" 
                             class="img-fluid rounded-modern">
                        <div class="image-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>