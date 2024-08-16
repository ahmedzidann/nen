@extends('user.layout.master')
@section('parent_page_name')Solution @endsection
@section('page_name')Solution @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <h5>Solution</h5>
    <h2>{{$solution->title}}</h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($tabs as $tab)
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn {{$loop->first ? "active":"" }}" id="pills-tab-{{$tab->id}}"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$tab->id}}" type="button" role="tab"
                    aria-controls="pills-{{$tab->id}}" aria-selected="false" tabindex="-1">{{$tab->name}} </button>
            </li>
            @endforeach
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">About </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Program</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Help</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">Document</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-join" type="button" role="tab" aria-controls="pills-join" aria-selected="false" tabindex="-1">Join us</button>
            </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($tabs as $tab)
            @if ($tab->slug !='contacts')
            <div class="tab-pane fade  {{$loop->first ? "active show":"" }}" id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->id}}-tab" tabindex="0">
                <div class="flex_about_div">
                    <div class="about_des_div">
                        <h3>Lorem Ipsum is simply dummy text</h3>
                        <div class="lamp_div">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <a href="#" class="learn_more_ref">learn more <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="about_des_div_img">
                        <img src="/media/170/imge2.jpeg">
                        <div>
                        </div>

                    </div>
                </div>

                <div class="flex_about_div next_flex_about">

                    <div class="about_des_div_img">
                        <img src="/media/170/imge2.jpeg">
                        <div>
                        </div>

                    </div>
                    <div class="about_des_div">
                        <h3>Lorem Ipsum is simply dummy text</h3>
                        <div class="lamp_div">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <a href="#" class="learn_more_ref">learn more <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <ul class="about-counters">
                    <li>
                        <i class="bi bi-award"></i>
                        <div class="dts-counters">
                            <h4>
                                +10 <span>years</span></h4>
                            <p>of success</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-emoji-smile"></i>
                        <div class="dts-counters">
                            <h4>98 <span>%</span></h4>
                            <p>Happy customers</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-box"></i>
                        <div class="dts-counters">
                            <h4>+100 <span>more than</span></h4>
                            <p>successful project</p>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-clock-history"></i>
                        <div class="dts-counters">
                            <h4>30 <span>minute</span></h4>
                            <p>Average response time</p>
                        </div>
                    </li>
                </ul>
            </div>
            @else

            <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->slug}}-tab" tabindex="0">
                <!-- <div class="flex_contact_us_sec">
                    <div class="left_part">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label label_action">Your
                                        Name</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Your Name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label label_action">Phone
                                        Number</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Phone Number">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label label_action">Your
                                        Comment</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"
                                        placeholder="Your Comment"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-12 col-sm-12">
                                <button type="button" class="contct_bttn">Send <i class="bi bi-send"></i></button>
                            </div>

                        </div>
                    </div>

                    <div class="right_part">
                        <div class="contact_us_links">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>

                        </div>
                    </div>

                </div> -->
           

                <div class="service_div_tabel_contact_us">

                <div class="service_div">
                <span class="section-title__tagline">call us</span>
                <h2 class="section-title__title">do you have questions? Do not hesitate to contact us</h2>
                <a href="#" class="bttn_service">
                <img src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}">
                <div class="flex_servic_icon">
                <p>Customer Service</p>    
                <h6>cs@nen-global.org</h6>
                </div>
                </a>
                </div>

                <div class="tabel_contact_us">
                <h3 class="txt-center-bold">Regional Representatives
                </h3>
                <div class="table-responsive">
                    <div class="office-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>
                                        <div class="flex_img_country"><i class="bi bi-globe-asia-australia"></i> Country
                                        </div>
                                    </th>
                                    <th> <div class="flex_img_country"><i class="bi bi-person"></i> Name<div></th>
                                    <th> <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-column="Country" class="td-left">
                                        <div class="country_icons"> <span class="office-flag-img"><img
                                                    src="{{asset('content/images/small_icon/Flag_of_Egypt.svg.webp')}}"></span>
                                            Egypt</div>

                                    </td>
                                    <td data-column="Name" class="td-center">mohamed mostafa</td>

                                    <td data-column="Phone">+962 7 9007 5557</td>
                                </tr>
                                <tr>
                                    <td data-column="Country" class="td-left">
                                        <div class="country_icons"> <span class="office-flag-img"><img
                                                    src="{{asset('content/images/small_icon/images.png')}}"></span>
                                                    Saudi </div>
                                    </td>
                                    <td data-column="Name" class="td-center">mohamed mostafa</td>
                                    <td data-column="Phone">+963 944 316 641</td>
                                </tr>
                                <tr>
                                    <td data-column="Country" class="td-left">
                                        <div class="country_icons"> <span class="office-flag-img"><img
                                                    src="{{asset('content/images/small_icon/download.png')}}"></span>
                                            kanda</div>
                                    </td>
                                    <td data-column="Name" class="td-center">mohamed mostafa</td>
                                    <td data-column="Phone">+7 961 607 7887</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                </div>
           

            </div>
            @endif
            @endforeach



        </div>
    </div>


</div>
<script>
    function toggleDescription(button) {
        var description = button.previousElementSibling;
        if (description.classList.contains('p_clamp')) {
            description.classList.remove('p_clamp');
            button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
        } else {
            description.classList.add('p_clamp');
            button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
        }
    }
</script>
@endsection