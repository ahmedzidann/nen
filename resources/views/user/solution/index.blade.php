@extends('user.layout.master')
@section('parent_page_name')Solution @endsection
@section('page_name')Solution @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <div class="text-start">
        <!-- <p class="global-description">
            Solution
        </p> -->
        <h5 class="global-title">
            {{$solution->title}}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>

    </div>

    <div class="tabs-items mt-md-5 mt-3">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($tabs as $tab)
            @if($tab->slug !='about_section_2')
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn {{$loop->first ? "active":"" }}" id="pills-tab-{{$tab->id}}"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$tab->id}}" type="button" role="tab"
                    aria-controls="pills-{{$tab->id}}" aria-selected="false" tabindex="-1">{{$tab->name}} </button>
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
            <div class="tab-pane fade  {{$loop->first ? 'active show':'' }}" id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->id}}-tab" tabindex="0">
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
                    <p style="color: #000;" class="description {{ strlen($item->description)>= 200 ? 'p_clamp_2':''}}">
                        {{ strip_tags($item->description) }}</p>
                    @if (strlen($item->description)>= 200)
                    <button class="show_bttn" onclick="toggleDescription(this)">Show More <i
                            class="bi bi-chevron-down"></i></button>
                    @endif
                    @php
                    $bcount = $item->files->count() > $item->links->count()? $item->files->count():
                    $item->links->count();
                    // $scount = $item->files->count() > $item->links->count()? $item->links->count():
                    $item->files->count();
                    @endphp
                    @foreach (range(0, $bcount-1) as $i)
                    <div class="flex_icons_div">
                        @if (isset($item->files[$i]))
                        <p><img src="{{url('content/images/small_icon/archive-book.png')}}"><a
                                href="{{  url('storage/education/' . $item->files[$i]->file)  }} "
                                download>Reference</a></p>
                        @endif
                        @if (isset($item->links[$i]))

                        <p><img src="{{url('content/images/small_icon/global.png')}}"><a
                                href="{{$item->links[$i]->reference}}">Website</a></p>
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
            <div class="flex_about_div customize-texts-align d-flex justify-content-center align-items-center">
                <div class="about_des_div">
                    <h3 class="decorated-title">
                        {{$item->title}}
                        <!-- <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector"> -->
                    </h3>
                    <!-- <span
                        class="description text-start before-vertical-line {{ strlen($item->description) >= 300 ? "p_clamp_2" : ''}}">
                        {{ html_entity_decode(strip_tags($item->description)) }}
                    </span> -->

                    <p class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($item->description) >= 300 ?'p_clamp_2' : ''}}"
                        style="align-items: justify !important;">
                        {{ html_entity_decode(strip_tags($item->description)) }}
                    </p>

                    @if (strlen($item->description) >= 300)
                    <a role='btn' onclick="toggleDescription(this)" class="mt-3 read_more read_more_btn">
                        Read More
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    @endif


                </div>
                <div class="about_des_div_img">
                    <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                    <div>
                    </div>

                </div>
            </div>
            @else
            <div
                class="flex_about_div next_flex_about customize-texts-align d-flex justify-content-center align-items-center">

                <div class="about_des_div_img">
                    <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                    <div>
                    </div>

                </div>
                <div class="about_des_div">
                    <!-- <h3>{{$item->title}}</h3> -->
                    <h3 class="decorated-title">
                        {{$item->title}}
                        <!-- <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector"> -->
                    </h3>


                    <!-- <span class="description text-start {{ strlen($item->description) >= 200 ? "p_clamp_2" : ''}}">
                    {{ html_entity_decode(strip_tags($item->description)) }}
                </span> -->

                    <p
                        class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($item->description) >= 200 ?'p_clamp_2' : ''}}">
                        {{ html_entity_decode(strip_tags($item->description)) }}
                    </p>

                    @if (strlen($item->description) >= 200)
                    <a role='btn' onclick="toggleDescription(this)" class="mt-3 read_more read_more_btn">Read More <i
                            class="bi bi-chevron-down"></i></a>
                    @endif

                </div>
            </div>
            @endif
            @empty
            @include('user.layout.includes.no-data')
            @endforelse
            @if ($tab->slug =='about' )
            <hr class="custom-hr" />
            <ul class="about-counters mt-0 mb-2 border-0 p-0">
                @foreach ($items->where('tabs_id',11)->take(4) as $key=> $item)
                <li class="mt-3">
                    <!-- <i class="{{$item->icon}}"></i> -->
                    <div class="dts-counters">
                        <h4 class="line-before">
                            {{$item->title}}
                        </h4>
                        <p class="mt-3 pt-0 before-vertical-line ms-3">
                            {{$item->subtitle}}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif



        </div>

    </div>

    @elseif ($tab->slug =='resources')
    <div class="tab-pane fade" id="pills-{{$tab->id}}" role="tabpanel" aria-labelledby="pills-{{$tab->slug}}-tab"
        tabindex="0">
        @forelse ($items->where('tabs_id',$tab->id) as $key=> $item)
        <div id="hovering-top-border-card" class="Resources_sec">
            <div class="resource_img rounded overflow-hidden">
                <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
            </div>

            <div class="resource_content mt-3">
                <h4 class="line-before">{{$item->title}}</h4>
                <div cclass="mt-3 pt-0 before-vertical-line ms-3">
                    {{ strip_tags($item->description) }}
                </div>

                <div class="resources_links">
                    @foreach ($item->files as $file)
                    <a href="{{$file->file}}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="bi bi-book"></i> Reference</a>

                    @endforeach
                    @foreach ($item->links as $link)
                    <a href="{{$link->reference}}"><i class="bi bi-globe-americas"></i> Website</a>

                    @endforeach
                </div>
            </div>

        </div>
        @empty
        <div class="empty_state">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
                <path fill="#e0dfdf"
                    d="M568.90415,220.74547V202.55431a13.07945,13.07945,0,0,0-13.07945-13.07945h-46.166a13.07945,13.07945,0,0,1-13.07946-13.07945V158.20424a13.07945,13.07945,0,0,1,13.07946-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V113.85418a13.07945,13.07945,0,0,0-13.07945-13.07945H169.20918a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h0a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H118.6298a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h19.84658a13.07945,13.07945,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946h-.048A13.07945,13.07945,0,0,0,125.349,291.25453V309.4456a13.07945,13.07945,0,0,0,13.07945,13.07946h2.87139a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19125a13.07945,13.07945,0,0,1-13.07945,13.07945H94.1753a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116A13.07945,13.07945,0,0,0,94.1753,411.22527h423.963a13.07945,13.07945,0,0,0,13.07945-13.07945V379.95466a13.07945,13.07945,0,0,0-13.07945-13.07945H506.79779a13.07945,13.07945,0,0,1-13.07945-13.07945V335.60451a13.07945,13.07945,0,0,1,13.07945-13.07945h26.73986A13.07945,13.07945,0,0,0,546.6171,309.4456V291.25453a13.07945,13.07945,0,0,0-13.07945-13.07945H525.426a13.07945,13.07945,0,0,1-13.07945-13.07946V246.90438A13.07945,13.07945,0,0,1,525.426,233.82492H555.8247A13.07945,13.07945,0,0,0,568.90415,220.74547Z">
                </path>
                <rect width="159.84" height="145.44" x="217.561" y="231.797" fill="#d90505"></rect>
                <rect width="84.96" height="145.44" x="377.401" y="231.797" fill="#990000"></rect>
                <path fill="#000"
                    d="M462.36121,232.15729h-84.96l29.101-39.69379a3,3,0,0,1,2.41944-1.22621h77.52026a3,3,0,0,1,2.41944,4.77378Z">
                </path>
                <path fill="#990000"
                    d="M217.95637,232.15729h84.96l-29.101-39.69379a3,3,0,0,0-2.41944-1.22621H193.87565a3,3,0,0,0-2.41944,4.77378Z">
                </path>
                <path fill="#000"
                    d="M510.29292,285.1577l-47.93164-53.00043h0v57.96h45.66016A3,3,0,0,0,510.29292,285.1577Z">
                </path>
                <rect width="110.853" height="78.366" x="246.893" y="153.791" fill="#ee781d"></rect>
                <path fill="#e0dfdf"
                    d="M299.07973,236.99513h-30.498a3.35392,3.35392,0,0,1-2.90457-5.03088l15.249-26.41208,15.249-26.41208a3.35392,3.35392,0,0,1,5.80915,0l15.249,26.41208,15.249,26.41208a3.35392,3.35392,0,0,1-2.90457,5.03088Z">
                </path>
                <rect width="3.356" height="28.368" x="297.402" y="192.301" fill="#d90505" rx="1.678"></rect>
                <circle cx="299.08" cy="227.235" r="4.014" fill="#d90505" transform="rotate(-84.345 299.08 227.235)">
                </circle>
                <path fill="#ffeaea"
                    d="M325.66717,290.11729H173.75124a3,3,0,0,1-2.27157-4.9596l45.72154-53.0004h159.84l-49.10248,56.91959A3,3,0,0,1,325.66717,290.11729Z">
                </path>
                <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"
                    d="M474.287 338.33442c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 347.07361c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 355.8128c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M111.18347 292.11729c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 300.85648c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 309.59568c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 120.54318c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 129.28237c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 138.02156c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2">
                </path>
                <circle cx="183.705" cy="391.21" r="12.96" fill="#990000"></circle>
                <circle cx="193.109" cy="357.024" r="6.72" fill="#990000"></circle>
                <circle cx="219.723" cy="392.65" r="9.6" fill="#990000"></circle>
                <circle cx="170.969" cy="212.701" r="15.42" fill="#990000"></circle>
                <circle cx="141.504" cy="201.718" r="8.032" fill="#990000"></circle>
                <circle cx="148.882" cy="174.415" r="4.633" fill="#990000"></circle>
                <circle cx="174.529" cy="177.693" r="11.107" fill="#990000"></circle>
                <circle cx="438.988" cy="137.917" r="15.42" fill="#990000"></circle>
                <circle cx="463.523" cy="118.249" r="8.032" fill="#990000"></circle>
                <circle cx="494.205" cy="162.323" r="6.952" fill="#990000"></circle>
                <circle cx="483.183" cy="138.58" r="4.633" fill="#990000"></circle>
                <circle cx="467.22" cy="158.92" r="11.107" fill="#990000"></circle>
            </svg>
            <h3 class="title">No data</h3>
            <p class="description">There have been no data in this section yet</p>
        </div>
        @endforelse
    </div>

    @elseif ($tab->slug =='contacts')

    <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel" aria-labelledby="pills-{{$tab->slug}}-tab"
        tabindex="0">
        <div class="">



            @if ($items->where('tabs_id',$tab->id)->count())
            <div class="service_div">
                <span class="line-before pt-0 mb-2">
                    Call Us
                </span>
                <h4 class="">
                    do you have questions? Do not hesitate to contact us
                </h4>
                <a href="#" class="bttn_service">
                    <img src="{{url('content/images/small_icon/chat.png')}}">
                    <div class="flex_servic_icon">
                        <p>{{$solution->fax}}</p>
                        <h6>{{$solution->email}}</h6>
                    </div>
                </a>
            </div>
            <div id="representatives-table-section" class="mt-md-5 mt-3">
                <hr />
                <h3 class="table-title line-before text-gray500 fs-5 mb-3">
                    Regional Representatives
                </h3>
                <div class="table-container">
                    <div class="table-responsive office-table-container">
                        <table class="table office-table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="table-header-icon">
                                            <i class="bi bi-globe-asia-australia"></i> Country
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="table-header-icon"><i class="bi bi-person"></i> Name</div>
                                    </th>
                                    <th scope="col">
                                        <div class="table-header-icon"><i class="bi bi-telephone"></i> Phone</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items->where('tabs_id',$tab->id) as $key=> $item)
                                <tr>
                                    <td>
                                        <div class="country-info">
                                            <img src="{{$item->getFirstMediaUrl('solutionTabs')}}" loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                alt="Flag of {{$item->subsubtitle}}" class="country-flag">
                                            <span>{{$item->subsubtitle}}</span>
                                        </div>
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->subtitle}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No representatives available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            @include('user.layout.includes.no-data')
            @endif

        </div>
        </a>
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
    // Select the previous sibling (which should be the description) to toggle its class.
    var description = button.previousElementSibling;

    // Check if the description has the 'p_clamp_2' class.
    if (description.classList.contains('p_clamp_2')) {
        // Remove the class to show the full text.
        description.classList.remove('p_clamp_2');
        // Change the button text to 'Show Less'.
        button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
    } else {
        // If the class is not present, add it back to truncate the text.
        description.classList.add('p_clamp_2');
        // Change the button text to 'Show More'.
        button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
    }
}
</script>
@endsection
