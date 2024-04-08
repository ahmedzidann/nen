@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Identity @endsection
@section('content')

<section class="about_sec">
    <div class="container">
      <div class="about_us_div">
        @include('user.layout.includes.about.sidebar')

        <div class="about_content">
          <div class="about_flex">
            <div class="video_div">
              <img class="video_img" src="{{asset('content/images/women.png')}}" />
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
                        src="https://www.youtube.com/embed/tgbNymZ7vqY?playlist=tgbNymZ7vqY&loop=1">
                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="about_titel_circle_progress">
              <div class="about_titel">
                <h1>who are we</h1>
                <p>
                  Most recently, when we successfully made our IPO
                  transforming into a multi-national corporation listed on
                  stock exchanges, we secured the resources needed to initiate
                  Stage II within which we will be expanding our scope of
                  service & range of solutions further than ever before to get
                  closer to being the organization we dreamt of back in 2008:
                  A socially responsible business organization, powered by the
                  wonders of modern technology...
                </p>

                <a href="#" class="see_more">see more</a>
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

          <div class="bg_div" style="background-image: url({{asset('content/images/imge2.jpeg')}})">
            <div class="explain_div">
              <div class="d-flex align-items-start flex_action">
                <div class="nav flex-column nav-pills our_visions me-3" id="v-pills-tab" role="tablist"
                  aria-orientation="vertical">
                  <button class="nav-link active tab_state w_nav_link" id="v-pills-home-tab" data-bs-toggle="pill"
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
                  </button>
                </div>
                <div class="tab-content tab_horzintal" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
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
                  </div>
                </div>
              </div>
            </div>
          </div>

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
      </div>
      <div></div>
    </div>
  </section>
@endsection
