<div class="aside_div">
  @if(isset($VCpages))
    @foreach ($VCpages as $page)
        <a href="{{route('about.'.$page->slug.'')}}" class="ref_styles active_ref {{ Route::is('about.'.$page->slug.'')? "active_link active": ""}}">
            <img  class="@if($page->slug == 'identity') Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                alt="" />{{$page->name}}
        </a>
    @endforeach

@elseif (isset($Spages))
    @foreach ($Spages as $page)
        <a href="{{route('education.'.$page->slug.'',['page_id'=>$page->id] )}}" class="ref_styles active_ref {{ Route::is('education.'.$page->slug.'')? "active_link active": ""}}">
            <img  class="@if($page->slug == 'identity') Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                alt="" />{{$page->name}}
        </a>
    @endforeach
{{-- @endif --}}

{{-- @if(isset($solpages)) --}}
@else
@php
    // $solutionPages = App\Models\Page::where('parent_id',Page::where('slug','solutions')->first()->id)
    // ->where('navbar','Active')->get();
@endphp
    @foreach ($ss as $page)
    <div class="flex_asid_menu">
        <a class="ref_styles dropdown_arrow " href="#">
          <div class="img_link">
            <img class="Identity_icon" src="content/images/small_icon/card.png" alt="">{{$page->name}}
          </div>
          <i class="bi bi-chevron-down"></i>
        </a>

        <ul class="aside_menu">
            @foreach (\App\Models\Solution::where('pages_id',$page->id )->get() as $solution)
            <li><a href="{{ route('solutions.'.$page->slug.'',['page_id'=>$page->id, 'solution_id'=>$solution->id]) }}">{{$solution->title}}</a></li>
            @endforeach



        </ul>

      </div>
        {{-- <a href="{{route('solutions.'.$page->slug.'',['page_id'=>$page->id] )}}" class="ref_styles active_ref active_link active">
            <img  class="@if($page->slug == 'identity') Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                alt="" />{{$page->name}}
        </a> --}}

    @endforeach
@endif



    {{-- <a href="{{route('about.identity')}}" class="ref_styles active_ref active_link active">
      <img class="Identity_icon" src="{{asset('content/images/small_icon/card.png')}}"
          alt="" />Identity

    </a>
    <a href="{{route('about.investors')}}" class="ref_styles">
       <img class="Investors_icon"
          src="{{asset('content/images/small_icon/SVGRepo_iconCarrier.png')}}" alt="" />Investors

    </a>
    <a href="{{route('about.achievements')}}" class="ref_styles">
      <img src="{{asset('content/images/small_icon/photoe.png')}}" alt="" />Achievements

    </a>
    <a href="{{route('about.awards')}}" class="ref_styles ">
      <img src="{{asset('content/images/small_icon/cup.png')}}" alt="" />Awards

    </a>
    <a href="{{route('about.certificates')}}" class="ref_styles ">
        <img src="{{asset('content/images/small_icon/SVGRepo_iconCarrier (1).png')}}" alt="" />Certificates
    </a>
    <a href="{{route('about.partners')}}" class="ref_styles">
        <img src="{{asset('content/images/small_icon/shield-tick.png')}}" alt="" />
        Partneres

    </a>
    <a href="{{route('about.clients')}}" class="ref_styles">
        <img src="{{asset('content/images/small_icon/people.png')}}" alt="" />
        Clients

    </a>
    <a href="{{route('about.our-team')}}" class="ref_styles">
        <img src="{{asset('content/images/small_icon/shield-tick.png')}}"
          />
        Our Teams
    </a>

    <a href="{{route('about.careers')}}" class="ref_styles ">

        <img src="{{asset('content/images/small_icon/Slider container.png')}}" alt="" />
        Careers

    </a> --}}
  </div>
