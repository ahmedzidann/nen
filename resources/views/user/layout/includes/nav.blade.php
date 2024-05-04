<div class="bg_second_part">
      <div class="container">
        <div class="second_part">
          <ul class="ul_pages">
            @foreach (App\Models\Page::where('parent_id',null)->get() as $page)
            @if ($page->slug=='about' || $page->slug=='education')
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active_link": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)

                    <li class="li_drop_content"><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id]) }}">{{$sub->name}}</a></li>
                    @endforeach


                </ul>
            </li>
            @elseif ( $page->slug=='solutions')
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active_link": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)

                    {{-- <li class="li_drop_content"><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id]) }}">{{$sub->name}}</a></li> --}}
                    <li class="li_drop_content">
                        <a href="#">{{$sub->name}}</a>
                        <i class="bi bi-chevron-right"></i>
                        <ul class="sub_dropdowen">
                            @foreach (\App\Models\Solution::where('pages_id',$sub->id )->get() as $solution)
                            <li><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id, 'solution_id'=>$solution->id]) }}">{{$solution->title}}</a></li>

                            @endforeach

                        </ul>
                    </li>
                    @endforeach


                </ul>
            </li>



            @else
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active_link": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)

                    <li class="li_drop_content"><a href="#">{{$sub->name}}</a></li>
                    @endforeach


                </ul>
              </li>
            @endif

            @endforeach


            {{-- <li class="li_category">
              <a href="#" class="a_ref">Education <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">Testing <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">Solution <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">Technology <span><i class="bi bi-chevron-down"></i></span></a>
            </li> --}}
            {{-- <li class="li_category">
              <a href="#" class="a_ref">DOC Validation <span><i class="bi bi-chevron-down"></i></span></a>
            </li class="li_category">
            <li class="li_category">
              <a href="#" class="a_ref">Join Us <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">Find Us <span><i class="bi bi-chevron-down"></i></span></a>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
