<div class="bg_second_part">
      <div class="container">
        <div class="second_part py-1">
          <ul class="ul_pages">
            @foreach (App\Models\Page::where('parent_id',null)->get() as $page)
            @if ($page->slug=='home' )
                <!-- <a href="{{ route('web.home') }}" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} </a> -->
              <a href="{{ route('web.home') }}" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">
                <svg 
                  xmlns="http://www.w3.org/2000/svg" 
                  viewBox="0 0 576 512" 
                  fill="white" 
                  width="20" 
                  height="20">
                  <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
              </a>
            @elseif ($page->slug=='about' || $page->slug=='education' || $page->slug=='testing' || $page->slug=='technology' ||  $page->slug=="doc-validation" ||  $page->slug=="find-us")
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)

                    <li class="li_drop_content"><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id]) }}">{{$sub->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            @elseif ( $page->slug=='solutions' )
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
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
            @elseif ( $page->slug=='projects')
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)
                    {{-- <li class="li_drop_content"><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id]) }}">{{$sub->name}}</a></li> --}}
                    <li class="li_drop_content">
                        <a href="#">{{$sub->name}}</a>
                        <i class="bi bi-chevron-right"></i>
                        <ul class="sub_dropdowen">
                            {{-- @dump($page->childe) --}}
                            @foreach (\App\Models\Project::where('pages_id',$sub->id )->get() as $solution)
                            <li><a href="{{ route($page->slug.'.'.$sub->slug.'',['page_id'=>$sub->id, 'project_id'=>$solution->id]) }}">{{$solution->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @elseif ( $page->slug=='join-us')
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)
                    <li class="li_drop_content">
                        <a href="#">{{$sub->name}}</a>
                        <i class="bi bi-chevron-right"></i>
                        <ul class="sub_dropdowen">
                            @foreach (\App\Models\Page::where('parent_id',$sub->id)->get() as $join)
                            <li><a href="#">{{$join->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="li_category">
                <a href="#" class="a_ref {{ Route::is(''.$page->slug.'.*')? "active": ""}}">{{$page->name}} <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    @foreach ($page->childe as $sub)
                    <li class="li_drop_content"><a href="#">{{$sub->name}}</a></li>
                    @endforeach
                </ul>
              </li>
            @endif
            @endforeach
            {{-- <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Education')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Testing')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Solution')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Technology')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li> --}}
            {{-- <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('DOC Validation')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li class="li_category">
            <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Join Us')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li>
            <li class="li_category">
              <a href="#" class="a_ref">{{ TranslationHelper::translateWeb(ucfirst('Find Us')??'') }} <span><i class="bi bi-chevron-down"></i></span></a>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
