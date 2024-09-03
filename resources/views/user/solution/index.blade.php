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
            @if($tab->slug !='about_section_2')
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn {{$loop->first ? "active":"" }}" id="pills-tab-{{$tab->id}}" data-bs-toggle="pill" data-bs-target="#pills-{{$tab->id}}" type="button" role="tab" aria-controls="pills-{{$tab->id}}" aria-selected="false" tabindex="-1">{{$tab->name}} </button>
                </li>
            @endif
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
            @if ($tab->slug !='contacts' && $tab->slug !='resources' && $tab->slug !='about_section_2')
                <div class="tab-pane fade  {{$loop->first ? "active show":"" }}" id="pills-{{$tab->id}}" role="tabpanel" aria-labelledby="pills-{{$tab->id}}-tab" tabindex="0">
                    <div class="">
                        @php
                            $i =1;
                    @endphp
                    @forelse ($items->where('tabs_id',$tab->id) as $key=> $item)
                        {{-- <a  class="card_prgram">
                            <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                                <h3>{{$item->title}}</h3>
                                <p style="color: #000;" class="description {{ strlen($item->description)>= 200 ? "p_clamp_2":''}}">{{ strip_tags($item->description) }}</p>
                                @if (strlen($item->description)>= 200)
                                <button class="show_bttn" onclick="toggleDescription(this)">Show More <i class="bi bi-chevron-down"></i></button>
                                @endif
                                @php
                                    $bcount = $item->files->count() > $item->links->count()? $item->files->count():  $item->links->count();
                                    // $scount = $item->files->count() > $item->links->count()? $item->links->count():  $item->files->count();
                                @endphp
                                    @foreach (range(0, $bcount-1) as $i)
                                    <div class="flex_icons_div">
                                        @if (isset($item->files[$i]))
                                            <p><img src="{{url('content/images/small_icon/archive-book.png')}}"><a href="{{  url('storage/education/' . $item->files[$i]->file)  }} " download>Reference</a></p>
                                        @endif
                                        @if (isset($item->links[$i]))

                                            <p><img src="{{url('content/images/small_icon/global.png')}}"><a href="{{$item->links[$i]->reference}}">Website</a></p>
                                        @endif


                                    </div>
                                    @endforeach

                            </div>
                            </div>
                        </a> --}}
                        @php
                            $i++;
                        @endphp
                        @if ($i %2 ==0)
                        <div class="flex_about_div">
                            <div class="about_des_div">
                                <h3>{{$item->title}}</h3>
                                {{-- <div class="lamp_div">{{ strip_tags($item->description) }}</div> --}}
                                {{-- <a href="#" class="learn_more_ref">learn more <i class="bi bi-arrow-right"></i></a> --}}
                                <span class="description text-start {{ strlen($item->description) >= 300 ? "p_clamp_2" : ''}}">
                                    {{ html_entity_decode(strip_tags($item->description)) }}
                                </span>

                                @if (strlen($item->description) >= 300)
                                    <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                                @endif


                            </div>
                            <div class="about_des_div_img">
                                <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                                <div>
                                </div>

                            </div>
                        </div>
                        @else
                        <div class="flex_about_div next_flex_about">

                            <div class="about_des_div_img">
                                <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                                <div>
                                </div>

                            </div>
                            <div class="about_des_div">
                                <h3>{{$item->title}}</h3>
                                {{-- <div class="lamp_div">{{ strip_tags($item->description) }}</div>
                                <a href="#" class="learn_more_ref">learn more <i class="bi bi-arrow-right"></i></a> --}}
                                <span class="description {{ strlen($item->description) >= 200 ? "p_clamp_2" : ''}}">
                                    {{ html_entity_decode(strip_tags($item->description)) }}
                                </span>

                                @if (strlen($item->description) >= 200)
                                    <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                                @endif

                            </div>
                        </div>
                        @endif
                        @empty
                        <div style="display: flex; justify-content: center;">
                            <p style="color:#999;">There is No Data Available</p>
                        </div>
                    @endforelse
                    @if ($tab->slug =='about' )
                    <ul class="about-counters">

                        @foreach ($items->where('tabs_id',11)->take(4) as $key=> $item)
                        <li>
                            <i class="{{$item->icon}}"></i>
                            <div class="dts-counters">
                                <h4>
                                    {{$item->title}}</h4>
                                <p>{{$item->subtitle}}</p>
                            </div>
                        </li>
                        @endforeach
                        {{-- <li>
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
                        </li> --}}
                    </ul>
                    @endif



                    </div>

                </div>

            @elseif ($tab->slug =='resources')
            <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->slug}}-tab" tabindex="0">
                @forelse ($items->where('tabs_id',$tab->id) as $key=> $item)
                    <div class="Resources_sec">
                        <div class="resource_img">
                            <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                        </div>

                        <div class="resource_content">
                            <h4>{{$item->title}}</h4>
                            <div class="rersource_disc">
                                {{ strip_tags($item->description) }}
                            </div>

                            <div class="resources_links">
                                @foreach ($item->files as $file)
                                    <a href="{{$file->file}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-book"></i> Reference</a>

                                @endforeach
                                @foreach ($item->links as $link)
                                    <a href="{{$link->reference}}"><i class="bi bi-globe-americas"></i> Website</a>

                                @endforeach
                            </div>
                        </div>

                    </div>
                @empty
                    <div style="display: flex; justify-content: center;">
                        <p style="color:#999;">There is No Data Available</p>
                    </div>
                @endforelse
            </div>

            @elseif ($tab->slug =='contacts')

            <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->slug}}-tab" tabindex="0">
                <div class="service_div_tabel_contact_us">

                    <div class="service_div">
                        <span class="section-title__tagline">call us</span>
                        <h2 class="section-title__title">do you have questions? Do not hesitate to
                            contact us</h2>
                        <a href="#" class="bttn_service">
                            <img src="{{url('content/images/small_icon/chat.png')}}">
                            <div class="flex_servic_icon">
                                <p>{{$solution->fax}}</p>
                                <h6>{{$solution->email}}</h6>
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
                                            <th>
                                                <div class="flex_img_country"><i class="bi bi-person"></i> Name<div>
                                            </div></div></th>
                                            <th>
                                                <div class="flex_img_country"><i class="bi bi-telephone"></i> Phone</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse ($items->where('tabs_id',$tab->id) as $key=> $item)
                                        <tr>
                                            <td data-column="Country" class="td-left">
                                                <div class="country_icons"> <span class="office-flag-img"><img src="{{$item->getFirstMediaUrl('solutionTabs')}}"></span>
                                                    {{$item->subsubtitle}} </div>

                                            </td>
                                            <td data-column="Name" class="td-center">{{$item->title}}
                                            </td>

                                            <td data-column="Phone">{{$item->subtitle}}</td>
                                        </tr>
                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                </div>
                <!--

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
                !-->
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
        if (description.classList.contains('p_clamp_2')) {
            description.classList.remove('p_clamp_2');
            button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
        } else {
            description.classList.add('p_clamp_2');
            button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
        }
    }
    </script>
@endsection
