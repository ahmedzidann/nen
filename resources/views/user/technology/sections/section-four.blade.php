   @php
    $section_four = App\Models\TestingTechnologySection::where('design_section_id',4)->where('main_category_id',request()->segment(2))->where('sub_category_id',request()->segment(3))->first();
    @endphp
 
                  @php
                          
                  $items = App\Models\Testing::where('pages_id',request()->page_id)->where('section_id',4)->get();
                   @endphp
<section class="statistics-section py-4">
    <div class="container">
        <div class="row g-4">
        @foreach($items as $row)
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-icon">
                        <img src="{{ $row->getFirstMediaUrl('Testing') }}"
                             alt="icon"
                             style="width:60px;height:60px;object-fit:contain;max-width:100%;display:inline-block;">
                    </div>
                    <h3 class="stat-number" data-count="{{ $row->title }}">0</h3>
                    <p class="stat-label">{!! $row->description !!}</p>
                </div>
            </div>

           @endforeach

        </div>
    </div>
</section>
