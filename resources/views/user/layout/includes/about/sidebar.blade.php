<div class="aside_div">
    @foreach ($VCpages as $page)
        <a href="{{route('about.'.$page->slug.'')}}" class="ref_styles active_ref active_link active">
            <img  class="@if($page->slug == 'identity') Identity_icon @endif"  src="{{asset($page->getFirstMediaUrl('icon'))}}"
                alt="" />{{$page->name}}
        </a>
    @endforeach
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
