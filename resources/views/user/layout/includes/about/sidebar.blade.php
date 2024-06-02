<div class="aside_div">
  @if(isset($VCpages))
    @foreach ($VCpages as $page)
        <a href="{{route('about.'.$page->slug.'')}}" class="ref_styles active_ref {{ Route::is('about.'.$page->slug.'')? "active_link active": ""}}">
            <div class="img_link">
            <img  class="@if($page->slug == 'identity') Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                alt="" />{{$page->name}}
            </div>
        </a>
    @endforeach

        @elseif (isset($Spages))
            @foreach ($Spages as $page)
                <a href="{{route('education.'.$page->slug.'',['page_id'=>$page->id] )}}" class="ref_styles active_ref {{ Route::is('education.'.$page->slug.'')? "active_link active": ""}}">
                    <div class="img_link">
                    <img  class="@if($loop->first) Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                        alt="" />{{$page->name}}
                    </div>
                    </a>
            @endforeach
            @elseif (isset($Tpages))
            @foreach ($Tpages as $page)
                <a href="{{route('testing.'.$page->slug.'',['page_id'=>$page->id] )}}" class="ref_styles active_ref {{ Route::is('testing.'.$page->slug.'')? "active_link active": ""}}">
                    <div class="img_link">
                    <img  class="@if($loop->first) Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                        alt="" />{{$page->name}}
                    </div>
                    </a>
            @endforeach

        @elseif (isset($projectPages))
            @foreach ($projectPages as $page)
            <div class="flex_asid_menu">
                <a class="ref_styles dropdown_arrow {{ Route::is('projects.'.$page->slug.'')? "active_link active": ""}}" href="#">
                <div class="img_link">
                    <img class="Identity_icon" src="content/images/small_icon/card.png" alt="">{{$page->name}}
                </div>
                <i class="bi bi-chevron-down"></i>
                </a>

                <ul class="aside_menu">
                    @foreach (\App\Models\Project::where('pages_id',$page->id )->get() as $solution)
                    <li><a class="{{ Route::is('projects.'.$page->slug.'') && ($solution->id == Request()->project_id)? "li_active": ""}}" href="{{ route('projects.'.$page->slug.'',['page_id'=>$page->id, 'project_id'=>$solution->id]) }}">{{$solution->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
            @elseif (isset($technologies))
            @foreach ($technologies as $page)
                <a href="{{route('technology.'.$page->slug.'',['page_id'=>$page->id] )}}" class="ref_styles active_ref {{ Route::is('education.'.$page->slug.'')? "active_link active": ""}}">
                    <div class="img_link">
                    <img  class="@if($loop->first) Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                        alt="" />{{$page->name}}
                    </div>
                    </a>
            @endforeach

        @else

            @foreach ($ss as $page)
            <div class="flex_asid_menu">
                <a class="ref_styles dropdown_arrow {{ Route::is('solutions.'.$page->slug.'')? "active_link active": ""}}" href="#">
                <div class="img_link">
                    <img class="Identity_icon" src="content/images/small_icon/card.png" alt="">{{$page->name}}
                </div>
                <i class="bi bi-chevron-down"></i>
                </a>

                <ul class="aside_menu">
                    @foreach (\App\Models\Solution::where('pages_id',$page->id )->get() as $solution)
                    <li><a class="{{ Route::is('solutions.'.$page->slug.'') && ($solution->id == Request()->solution_id)? "li_active": ""}}" href="{{ route('solutions.'.$page->slug.'',['page_id'=>$page->id, 'solution_id'=>$solution->id]) }}">{{$solution->title}}</a></li>
                    @endforeach
                </ul>
            </div>


            @endforeach
        @endif



</div>

