@extends('user.layout.master')
@section('parent_page_name', 'Projects')
@section('page_name', ucwords($slug))
@section('websiteStyle')

@endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
    <div class="about_content">
        <h5>{{ $page->name }}</h5>
        <h2>{{ $projects->title }}</h2>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($tabs as $tab)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link proj_bttn {{ $loop->first ? 'active' : '' }}"
                            id="pills-tab-{{ $tab->slug }}" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $tab->slug }}" type="button" role="tab"
                            aria-controls="pills-{{ $tab->slug }}" aria-selected="false"
                            tabindex="-1">{{ $tab->name }} </button>

                        {{-- <button @if ($tab['slug'] == 'about') class="nav-link proj_bttn active" @else class="nav-link proj_bttn" @endif id="pills-{{$tab['slug']}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$tab['slug']}}" type="button" role="tab" aria-controls="pills-{{$tab['slug']}}" aria-selected="true">{{ ucfirst($tab['name'][App::getLocale()]) }} </button> --}}
                    </li>
                @endforeach
            </ul>
            @if (!empty($projects->getAbout))
                @foreach ($projects->getAbout as $about)
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                            aria-labelledby="pills-about-tab" tabindex="0">
                            <div class="who_us">
                                <div class="who_us_titel">
                                    <h5>Who we do for you</h5>
                                    @if (!empty($about->shortDescription))
                                        <p id="shortDescription" style="white-space: pre-line;">{!! $about->shortDescription !!}</p>
                                    @endif
                                    @if (!empty($about->description))
                                        <p id="fullDescription" style="white-space: pre-line; display: none;">
                                            {!! $about->description !!}</p>
                                    @endif
                                    <a href="#" id="learnMoreBtn" class="btn_detail">Learn More</a>
                                </div>
                                <div class="whou_us_img">
                                    <img src="{{ asset($about->getFirstMediaUrl('AboutTabs')) }}">
                                </div>

                            </div>

                            <div class="bg_div" style="background-image: url({{ asset('content') }}/images/women.png);">
                                <div class="number_div">

                                    <div class="num_img_div">
                                        <img src="{{ asset('content') }}/images/small_icon/Vector (1).png">
                                        <h3>19 +</h3>
                                        <p>{{ $about['label1'] }}</p>
                                    </div>

                                    <div class="num_img_div">
                                        <img src="{{ asset('content') }}/images/small_icon/Vector.png">
                                        <h3>20 +</h3>
                                        <p>{{ $about['label2'] }}</p>
                                    </div>

                                    <div class="num_img_div">
                                        <img src="{{ asset('content') }}/images/small_icon/people.png">
                                        <h3>850 +</h3>
                                        <p>{{ $about['label3'] }}</p>
                                    </div>

                                    <div class="num_img_div">
                                        <img src="{{ asset('content') }}/images/small_icon/receipt-add.png">
                                        <h3>16 +</h3>
                                        <p>{{ $about['label4'] }}</p>
                                    </div>

                                </div>

                            </div>
                            <div class="tabs_div2">
                                <ul class="nav nav-pills ul_tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active tab_active" id="chalange_btn_tab"
                                            data-bs-toggle="pill" data-bs-target="#challang_tab" type="button"
                                            role="tab" aria-controls="challang_tab" aria-selected="true">Challenge
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn_tabs" id="solution_btn_tab" data-bs-toggle="pill"
                                            data-bs-target="#solution_tab" type="button" role="tab"
                                            aria-controls="solution_tab" aria-selected="false">Solution</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link btn_tabs" id="result_btn_tab" data-bs-toggle="pill"
                                            data-bs-target="#result_tab" type="button" role="tab"
                                            aria-controls="result_tab" aria-selected="false">Result</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="pills-tabs">
                                    <div class="tab-pane fade show active" id="challang_tab" role="tabpanel"
                                        aria-labelledby="chalange_btn_tab" tabindex="0">
                                        <div class="who_us">
                                            <div class="who_us_titel">
                                                @if (!empty($about['challenge']))
                                                    <p>{{ $about['challenge'] }}</p>
                                                @endif

                                            </div>


                                        </div>
                                    </div>
                                    @if (!empty($about['solution']))
                                        <div class="tab-pane fade" id="solution_tab" role="tabpanel"
                                            aria-labelledby="solution_btn_tab" tabindex="0">{{ $about['solution'] }}
                                        </div>
                                    @endif
                                    @if (!empty($about['result']))
                                        <div class="tab-pane fade" id="result_tab" role="tabpanel"
                                            aria-labelledby="result_btn_tab" tabindex="0">{{ $about['result'] }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-program" role="tabpanel" aria-labelledby="pills-program-tab"
                            tabindex="0">
                            <div class="program_sec">
                                @foreach ($projects->getProgram as $program)
                                    <div class="card all_program_card">

                                        <div class="programe_content">
                                            <img src="{{ asset($program->getFirstMediaUrl('firstImage')) }}">
                                            <h3>{{ $program->title }}</h3>
                                            <p class="p_clamp">{!! $program->description !!}</p>
                                            <button href="#" class="show_bttn">Show More <i
                                                    class="bi bi-chevron-down"></i></button>
                                            <div class="flex_icons_div">
                                                <a
                                                    href="{{ route('admin.tabproject.programTabDownload', $program->id) }}">
                                                    <p><img
                                                            src="{{ asset('content') }}/images/small_icon/archive-book.png"><span>Reference</span>
                                                    </p>
                                                </a>
                                                <a href="https://{{ $program->url }}" class="card_prgram"
                                                    target="_blank">
                                                    <p><img
                                                            src="{{ asset('content') }}/images/small_icon/global.png"><span>Website</span>
                                                    </p>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>


                        <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab"
                            tabindex="0">

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach ($projects->getHelp as $helpItem)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                {{ $helpItem['title'] }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">{!! $helpItem['description'] !!}</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-archive" role="tabpanel"
                            aria-labelledby="pills-archive-tab" tabindex="0">

                            <div class="document_sec">
                                @foreach ($projects->getDocument as $doc)
                                    @if ($doc->type == 'pdf')
                                        <div class="document_content">

                                            <i class="bi bi-filetype-pdf"></i>
                                            <div class="document_titel">
                                                <h3>{{ $doc->title }}</h3>
                                                <p class="p_clamp"> {{ $doc->description }}</p>
                                                ever since the 1500s when an......</p>

                                            </div>
                                            <a href="{{ route('admin.tabproject.archiveDownload', $doc->id) }}"><i
                                                    class="bi bi-download"></i></a>
                                        </div>
                                    @elseif($doc->type == 'url')
                                        <div class="document_content">
                                            <i class="bi bi-link-45deg"></i>
                                            <div class="document_titel">
                                                <h3>{{ $doc->title }}</h3>
                                                <p class="p_clamp">{{ $doc->description }}</p>

                                            </div>
                                            <a href="https://{{ $doc->url }}">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="media_sec">
                                <h2>Media</h2>
                                <div class="media_images">
                                    @foreach ($projects->getDocument as $img)
                                        @if ($img->type == 'image')
                                            <img src="{{ asset($img->getFirstMediaUrl('firstFile')) }}">
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-join-us" role="tabpanel"
                            aria-labelledby="pills-join-us-tab" tabindex="0">

                            <div class="bg_div bg_join"
                                style="background-image: url({{ asset('content') }}/images/girl.jpg);">
                                <div class="join_us_sec">
                                    <h3 class="h3_style">Register Steps</h3>
                                    <div class="join_us_dives">
                                        @foreach ($projects->getJoinus->where('type', 'register') as $joinus)
                                            <div class="join_us_dive">
                                                <img src="{{ asset('content') }}/images/small_icon/share.png">
                                                @if (!empty($joinus['description']))
                                                    <p>{!! $joinus['description'] !!}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>

                            <div class="terms_sec">
                                <h2>Terms and Conditions</h2>
                                <div class="flex_jon">
                                    <ul class="terms_ul">
                                        @foreach ($projects->getJoinus->where('type', 'terms') as $joinus)
                                            @if (!empty($joinus['description']))
                                                <li>
                                                    {!! $joinus['description'] !!}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <div class="terms_img">
                                        @if ($projects->getJoinus->first())
                                            <img src="{{ asset($projects->getJoinus->first()->getFirstMediaUrl('JoinusTerms')) }}">
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>


    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const learnMoreBtn = document.getElementById("learnMoreBtn");
            const shortDescription = document.getElementById("shortDescription");
            const fullDescription = document.getElementById("fullDescription");

            learnMoreBtn.addEventListener("click", function(event) {
                event.preventDefault();
                shortDescription.style.display = "none";
                fullDescription.style.display = "block";
            });
        });
    </script>

@endsection
@section('websiteStyle')
@endsection
