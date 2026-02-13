    @php
    $section_seven = App\Models\TestingTechnologySection::where('design_section_id',7)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp   
   <section class="services-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{ $section_seven->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
            </div>

            <div class="services-grid">
                <!-- Marketing Consultancy -->
                 
                  @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',7)->get();
                   @endphp

                   @foreach($items as $row)
        <div class="service-card" data-aos="fade-up" data-aos-delay="150">
        <div class="service-icon-wrapper" 
         style="width:60px; height:60px; display:flex; align-items:center; justify-content:center;">
        <img src="{{ $row->getFirstMediaUrl('Testing') }}" 
             loading="lazy"
             style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
       </div>
        <div class="service-content">
        <h4 class="service-title">{{ $row->title}}</h4>
        <p class="service-description">
            {!! $row->description !!}
        </p>
       </div>
       </div>
         @endforeach


               

               
              

                <!-- Infographic Videos -->
                

                <!-- Strategic Consulting -->
              

                <!-- Mobile Development -->
               

                <!-- Social Media -->
                

                <!-- SEO -->
                

                <!-- Project Management -->
               

                <!-- Data Verification -->
               
            </div>
        </div>
    </section>