   @php
    $section_nine = App\Models\TestingTechnologySection::where('design_section_id',9)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
 
 <section class="modern-cards-section py-4">
        <div class="container">
            <div class="text-center mb-5 w-100">
                <h2 class="global-title">{{ $section_nine->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{{ strip_tags($section_nine->description) }}</p>
            </div>
            <div class="row g-4">

                  @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',9)->get();
                   @endphp

                   @foreach($items as $row)
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="100">
    <div class="modern-card">
        <div class="card-icon-wrapper">
            <img src="{{ $row->getFirstMediaUrl('Testing') }}" 
                 alt="{{ $row->title }}" 
                 class="card-icon">
        </div>
        <h4 class="card-title">{{ $row->title }}</h4>
        <p class="card-description">
            {!! $row->description !!}
        </p>
    </div>
</div>


                @endforeach
                
             
              
              
              
            </div>
        </div>
    </section>