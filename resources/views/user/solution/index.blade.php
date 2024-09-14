@extends('user.layout.master')
@section('parent_page_name')Solution @endsection
@section('page_name')Solution @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <div class="text-start">
        <p class="global-description">
            Solution
        </p>
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
                        <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
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
                        <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="vector">
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
            <div style="display: flex; justify-content: center;">
                <p class="alert alert-danger no-data" role="alert" style="color:#999;">There is No Data Available</p>
            </div>
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
        <div style="display: flex; justify-content: center;">
            <p style="color:#999;">There is No Data Available</p>
        </div>
        @endforelse
    </div>

    @elseif ($tab->slug =='contacts')

    <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel" aria-labelledby="pills-{{$tab->slug}}-tab"
        tabindex="0">
        <div class="">

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

            @if ($items->where('tabs_id',$tab->id)->count())
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