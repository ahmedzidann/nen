@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Identity @endsection
@section('content')

<div class="about_content">
    @if ($fSection =  $items->where('item','section-one')->first())
        <div class="about_flex">
            <div class="video_div">
                <img class="video_img" src="{{$fSection->getFirstMediaUrl('StaticTable')}}" />
                <span class="video_icon" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="bi bi-play-circle"></i></span>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content modal_syles">
                    <div class="modal-header">

                        <a href="#" class="bttn_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></a>
                    </div>
                    <div class="modal-body">
                        <iframe width="700" height="350"
                        src="{{$fSection->getFirstMediaUrl('StaticTable')}}">
                        </iframe>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="about_titel_circle_progress">
                <div class="about_titel">
                <h1>{{$fSection->title}}</h1>
                <p>
                    {{strip_tags($fSection->description)}}
                </p>

                {{-- <a href="#" class="see_more">see more</a> --}}
                </div>

                <div class="three_circles">
                <div class="circle_content">
                    <circle-progress class="progress_1" value="90" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>
                <div class="circle_content">
                    <circle-progress class="progress_1" value="70" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>
                <div class="circle_content">
                    <circle-progress class="progress_1" value="80" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>

                </div>
            </div>
        </div>
    @endif
    @if ($items->where('item','section-two')->count())
    <div class="bg_div" style="background-image: url({{asset('content/images/imge2.jpeg')}})">
        <div class="explain_div">
        <div class="d-flex align-items-start flex_action">
            <div class="nav flex-column nav-pills our_visions me-3" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            @foreach ($items->where('item','section-two') as $item)
                <button class="nav-link tab_state  w_nav_link @if($loop->first)active @else bttn_tab @endif" id="v-pills-section-two-{{$item->id}}-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-section-two-{{$item->id}}" type="button" role="tab" aria-controls="v-pills-section-two-{{$item->id}}"
                aria-selected="true">
                {{$item->title}}
                </button>
            @endforeach
            {{-- <button class="nav-link active tab_state w_nav_link" id="v-pills-home-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                aria-selected="true">
                Our Vision
            </button>
            <button class="nav-link tab_state bttn_tab w_nav_link" id="v-pills-profile-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                aria-selected="false">
                Our Mission
            </button>
            <button class="nav-link tab_state bttn_tab w_nav_link" id="v-pills-messages-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                aria-selected="false">
                Objectives
            </button> --}}
            </div>
            <div class="tab-content tab_horzintal" id="v-pills-tabContent">

                @foreach ($items->where('item','section-two') as $item)
                <div class="tab-pane fade @if($loop->first)show active  @endif" id="v-pills-section-two-{{$item->id}}" role="tabpanel"
                aria-labelledby="v-pills-section-two-{{$item->id}}-tab" tabindex="0">
                <p class="tab_p">
                {{strip_tags($item->description)}}
                </p>
            </div>
            @endforeach
                {{-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                aria-labelledby="v-pills-home-tab" tabindex="0">
                <p class="tab_p">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.
                </p>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="0">
                <p class="tab_p">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.
                </p>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                aria-labelledby="v-pills-messages-tab" tabindex="0">
                <p class="tab_p">
                “Human civilization only through development and
                innovation can exist harmoniously on the planet.” Become a
                global market leader in the fields of Information
                Technology & Educational Solutions; ushering in an era of
                digital transformation & capabilities optimization.

                </p>
            </div> --}}
            </div>
        </div>
        </div>
    </div>
    @endif
    @if ($tSection =  $items->where('item','section-three')->first())
    <div class="objectives_div">
        <div class="objectiv_titling">
          <h1>{{$tSection->title}}</h1>
          <ul class="objectives_ul">
            {!!$tSection->description!!}
          </ul>
        </div>

        <div class="objectives_img">
          <img src="{{$tSection->getFirstMediaUrl('StaticTable')}}">
        </div>
    </div>
    @endif
   <!-- <div class="objectives_div">
    <div class="objectiv_titling">
      <h1>Our Objectives Of Company</h1>
      <ul class="objectives_ul">
        <li>
          Developing highly qualified calibers to keep pace with the
          requirements of the labor market.
        </li>
        <li>
          Providing free educational resources and platforms to
          enabling self-education that would guarantee equal
          opportunities for young people everywhere
        </li>
        <li>
          Expanding the range of our consultation services focusing on
          hyper growth sectors.
        </li>
        <li>
          Promoting benefits of technological solutions for enhancing
          organizational capabilities and competencies with small
          businesses.
        </li>
        <li>
          Leading a strong, comprehensive network of professional,
          socially responsible organizations dedicated to innovation
          and excellence.
        </li>
        <li>
          Preparing a generation of qualified teachers, trainers, and
          lecturers capable of utilizing state-of-the-art
          technological solutions to facilitate education and
          learning.
        </li>
      </ul>
    </div>

    <div class="objectives_img">
      <img src="content/images/Rating.png" />
    </div>
  </div> -->
</div>

@endsection
