@php
    $section_six = App\Models\TestingTechnologySection::where('design_section_id',6)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp 
 
 <section class="work-timeline-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-100" data-aos="fade-down">
                <h2 class="global-title">{{$section_six->title }}</h2>
                <div class="under-title-vector">
                    <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy" alt="vector">
                </div>
                <p class="text-gray500 mt-3 text-start">{!! $section_six->description !!}</p>
            </div>

            <!-- Decorative Background Circles -->
            <div class="timeline-deco-circles">
                <div class="deco-circle circle-1"></div>
                <div class="deco-circle circle-2"></div>
            </div>

            <div class="timeline-container">
                <!-- Timeline Vertical Line -->
                <div class="timeline-line"></div>

                  @php
                      $x=0 ;     
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',6)->get();
                 
                   @endphp

                <!-- Step 01: Initial Consultation (Right) -->

                    @foreach($items as $row)
                    @php  $x++ ;
                    if($x/2)
                    
                    @endphp
                <div class="timeline-item {{ $x % 2 == 0 ? 'left' : 'right' }}" data-aos="fade-{{ $x % 2 == 0 ? 'left' : 'right' }}" data-aos-delay="100">
                    <div class="timeline-dot">
                        <span class="dot-number">0{{ $x}}</span>
                        <div class="dot-pulse"></div>
                    </div>
                    <div class="timeline-content">
                        <div class="timeline-icon"
             style="width:70px;height:70px;display:flex;align-items:center;justify-content:center;margin:auto;background:#f5f7fa;border-radius:50%;">

            <img src="{{ $row->getFirstMediaUrl('Testing') }}"
                 alt="icon"
                 style="width:45px;height:45px;object-fit:contain;max-width:100%;display:inline-block;">
        </div>

                        <h4 class="timeline-title">{{ $row->title }}</h4>
                        <p class="timeline-desc">{!! $row->description !!}</p>
                        <div class="timeline-features">
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                               {{ $row->first_button }}
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-check"></i>
                               {{ $row->second_button }}
                            </span>
                        </div>
                    </div>
                </div>

                @endforeach

               
               

               
            </div>
        </div>
    </section>