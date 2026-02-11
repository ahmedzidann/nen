    @php
    $section_three = App\Models\TestingTechnologySection::where('design_section_id',3)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
 
 <section class="features-section py-4">
        <div class="container">
            <div class="text-center mb-5 w-100">
                <h2 class="global-title">{{ $section_three->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{!! $section_three->description !!}</p>
            </div>

                  @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',3)->get();
                   @endphp
                <div class="row g-4">

                 @foreach($items as $row)
<div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
    <div class="feature-card text-center">
        <div class="feature-icon">
            @if($row->hasMedia('Testing'))
                <img src="{{ $row->getFirstMediaUrl('Testing') }}"
                     alt="icon"
                     style="width: 60px; height: 60px; object-fit: contain; display: inline-block;">
            @else
                <i class="bi bi-speedometer2" style="font-size: 60px;"></i>
            @endif
        </div>
        <h4 class="feature-title">{{ $row->title }}</h4>
        <p class="feature-description">{!! $row->description !!}</p>
    </div>
</div>
@endforeach

                
                
            </div>
        </div>
    </section>