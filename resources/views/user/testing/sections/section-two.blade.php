
 @php
    $section_two = App\Models\TestingTechnologySection::where('design_section_id',2)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
<section class="company-info-section py-0 my-4">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- Left: Image -->
                <div class="col-lg-6">
                    <div class="company-image-wrapper">
                       @if(!empty($section_two->image_1))
                     <img src="{{ asset('storage/setting_testing_technology/'.$section_two->image_1) }}">
                             alt="Company Meeting" 
                             class="img-fluid h-100 w-100 object-fit-cover">
                               @endif
                    </div>
                </div>
                
                <!-- Right: Info Cards -->
                <div class="col-lg-6">
                    <div class="company-info-cards">
                        <!-- History Card -->

                        @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',2)->get();
              @endphp
                 
  
                @foreach($items as $row )
                
<div class="info-card active align-items-center" onclick="toggleInfoCard(this)">
    
   <div class="info-icon-wrapper">
       @if($row->hasMedia('Testing'))
    <img src="{{ $row->getFirstMediaUrl('Testing') }}"
         alt="icon"
         style="width:50px; height:50px; object-fit:cover;">
@endif

    </div>

    <div class="info-content">
        <h3 class="info-title">{{ $row->title }}</h3>
        <p>
           
            {!! $row->description !!}
        </p>
    </div>

</div>
@endforeach

                        
                       
                    </div>
                </div>
            </div>
        </div>
    </section>