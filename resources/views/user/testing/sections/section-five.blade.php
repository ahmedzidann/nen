    @php
    $section_five = App\Models\TestingTechnologySection::where('design_section_id',5)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp

<section class="process-cards-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{  $section_five->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{!! $section_five->description !!}</p>
            </div>

                 @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',5)->get();
                   @endphp
            
            <div class="row g-4">
                <!-- Step 01 -->
                 @php $x=1 ; @endphp
                    @foreach($items as $row)
              <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="process-card">
        <div class="process-badge">0{{$x}}</div>

        <div class="process-icon"
             style="width:80px;height:80px;display:flex;align-items:center;justify-content:center;margin:auto;background:#f5f7fa;border-radius:50%;">

            <img src="{{ $row->getFirstMediaUrl('Testing') }}"
                 alt="icon"
                 style="width:60px;height:60px;object-fit:contain;display:inline-block;max-width:100%;">
        </div>

        <h4 class="process-title">{{ $row->title }}</h4>
        <p class="process-description">
           {!! $row->description !!}
        </p>
    </div>
</div>
 @php $x++ ; @endphp
                @endforeach

                <!-- Step 02 -->
               

                <!-- Step 03 -->
                
                <!-- Step 04 -->
                
                <!-- Step 05 -->
              

                <!-- Step 06 -->
                
            </div>
        </div>
    </section>