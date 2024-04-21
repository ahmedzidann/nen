<div class="about_content">
    <h5>{{ $page->name }}</h5>
    <h2>{{ $projects->title }}</h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach($tabs as $tab)

            <li class="nav-item" role="presentation">
                <button @if($tab['slug']=='about' ) class="nav-link proj_bttn active" @else class="nav-link proj_bttn" @endif id="pills-{{$tab['slug']}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$tab['slug']}}" type="button" role="tab" aria-controls="pills-{{$tab['slug']}}" aria-selected="true">{{ ucfirst($tab['name'][App::getLocale()]) }} </button>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab" tabindex="0">
                <div class="who_us">
                    <div class="who_us_titel">
                        <h5>Who we do for you</h5>
                        <p id="shortDescription" style="white-space: pre-line;">{!! $about->shortDescription !!}</p>
                        <p id="fullDescription" style="white-space: pre-line; display: none;">{!! $about->description !!}</p>
                        <a href="#" id="learnMoreBtn" class="btn_detail">Learn More</a>
                    </div>
                    <div class="whou_us_img">
                        <img  src="{{ asset($about->getFirstMediaUrl('AboutTabs')) }}">
                    </div>
                </div>

                <div class="bg_div" style="background-image: url({{asset('content')}}/images/women.png);">
                    <div class="number_div">

                        <div class="num_img_div">
                            <img src="{{asset('content')}}/images/small_icon/Vector (1).png">
                            <h3>19 +</h3>
                            <p>{{ $about['label1'] }}</p>
                        </div>

                        <div class="num_img_div">
                            <img src="{{asset('content')}}/images/small_icon/Vector.png">
                            <h3>20 +</h3>
                            <p>{{ $about['label2'] }}</p>
                        </div>

                        <div class="num_img_div">
                            <img src="{{asset('content')}}/images/small_icon/people.png">
                            <h3>850 +</h3>
                            <p>{{ $about['label3'] }}</p>
                        </div>

                        <div class="num_img_div">
                            <img src="{{asset('content')}}/images/small_icon/receipt-add.png">
                            <h3>16 +</h3>
                            <p>{{ $about['label4'] }}</p>
                        </div>

                    </div>

                </div>
                <div class="tabs_div2">
                    <ul class="nav nav-pills ul_tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tab_active" id="chalange_btn_tab" data-bs-toggle="pill" data-bs-target="#challang_tab" type="button" role="tab" aria-controls="challang_tab" aria-selected="true">Challenge
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn_tabs" id="solution_btn_tab" data-bs-toggle="pill" data-bs-target="#solution_tab" type="button" role="tab" aria-controls="solution_tab" aria-selected="false">Solution</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn_tabs" id="result_btn_tab" data-bs-toggle="pill" data-bs-target="#result_tab" type="button" role="tab" aria-controls="result_tab" aria-selected="false">Result</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabs">
                        <div class="tab-pane fade show active" id="challang_tab" role="tabpanel" aria-labelledby="chalange_btn_tab" tabindex="0">
                            <div class="who_us">
                                <div class="who_us_titel">
                                    <p>{{ $about['challenge'] }}</p>

                                </div>


                            </div>
                        </div>
                        <div class="tab-pane fade" id="solution_tab" role="tabpanel" aria-labelledby="solution_btn_tab" tabindex="0">{{ $about['solution'] }}</div>
                        <div class="tab-pane fade" id="result_tab" role="tabpanel" aria-labelledby="result_btn_tab" tabindex="0">{{ $about['result'] }}</div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-program" role="tabpanel" aria-labelledby="pills-program-tab" tabindex="0">
                <div class="program_sec">
                    @foreach($programs as $program)
                        
                   
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{ asset($program->getFirstMediaUrl('firstImage')) }}">
                                <h3>{{ $program->title }}</h3>
                                <p class="p_clamp">{!! $program->description !!}</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <a href="">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    </a>
                    <a href="{{ $program->url ?? "" }}" class="card_prgram">
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>
                    </a>

                                </div>
                            </div>
                        </div>

                    {{--  <a href="#" class="card_prgram">
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{asset('content')}}/images/Frame 110.png">
                                <h3>Program Name</h3>
                                <p class="p_clamp">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="card_prgram">
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{asset('content')}}/images/Frame 110 (2).png">
                                <h3>Program Name</h3>
                                <p class="p_clamp">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="card_prgram">
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{asset('content')}}/images/Frame 110 (1).png">
                                <h3>Program Name</h3>
                                <p class="p_clamp">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="card_prgram">
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{asset('content')}}/images/Frame 110.png">
                                <h3>Program Name</h3>
                                <p class="p_clamp">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="card_prgram">
                        <div class="card all_program_card">

                            <div class="programe_content">
                                <img src="{{asset('content')}}/images/Frame 110 (2).png">
                                <h3>Program Name</h3>
                                <p class="p_clamp">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry.</p>
                                <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                                <div class="flex_icons_div">
                                    <p><img src="{{asset('content')}}/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                    <p><img src="{{asset('content')}}/images/small_icon/global.png"><span>Website</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </a>  --}}
                     @endforeach


                </div>

            </div>


            <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab" tabindex="0">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                 @foreach($help as $helpItem)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                               {{$helpItem['title']}}
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{!! $helpItem['description']!!}</div>
                        </div>
                    </div>
                   @endforeach

                </div>
            </div>
            <div class="tab-pane fade" id="pills-arshaef" role="tabpanel" aria-labelledby="pills-arshaef-tab" tabindex="0">

                <div class="document_sec">
                    <div class="document_content">
                        <i class="bi bi-filetype-pdf"></i>
                        <div class="document_titel">
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</h3>
                            <p class="p_clamp">Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s when an......</p>

                        </div>
                        <i class="bi bi-download"></i>
                    </div>
                    <div class="document_content">
                        <i class="bi bi-link-45deg"></i>
                        <div class="document_titel">
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</h3>
                            <p class="p_clamp">Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s when an......</p>

                        </div>
                        <i class="bi bi-box-arrow-up-right"></i>
                    </div>
                    <div class="document_content">
                        <i class="bi bi-filetype-pdf"></i>
                        <div class="document_titel">
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</h3>
                            <p class="p_clamp">Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s when an......</p>

                        </div>
                        <i class="bi bi-download"></i>
                    </div>
                    <div class="document_content">
                        <i class="bi bi-link-45deg"></i>
                        <div class="document_titel">
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</h3>
                            <p class="p_clamp">Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s when an......</p>

                        </div>
                        <i class="bi bi-box-arrow-up-right"></i>
                    </div>
                </div>

                <div class="media_sec">
                    <h2>Media</h2>
                    <div class="media_images">
                        <img src="{{asset('content')}}/images/Frame 1000003486 (1).png">
                        <img src="{{asset('content')}}/images/Frame 1000003485 (1).png">
                        <img src="{{asset('content')}}/images/Frame 1000003486.png">
                        <img src="{{asset('content')}}/images/Frame 1000003487.png">
                        <img src="{{asset('content')}}/images/Frame 1000003485 (1).png">
                        <img src="{{asset('content')}}/images/Frame 1000003484 (1).png">
                        <img src="{{asset('content')}}/images/Frame 1000003486 (1).png">
                        <img src="{{asset('content')}}/images/Frame 1000003487 (2).png">

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-join-us" role="tabpanel" aria-labelledby="pills-join-us-tab" tabindex="0">

                <div class="bg_div bg_join" style="background-image: url({{asset('content')}}/images/girl.jpg);">
                    <div class="join_us_sec">
                        <h3 class="h3_style">Register Steps</h3>
                        <div class="join_us_dives">
                            <div class="join_us_dive">
                                <img src="{{asset('content')}}/images/small_icon/share.png">
                                <p>{{ $joinus['description'] }}</p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="terms_sec">
                    <h2>Terms and Conditions</h2>
                    <div class="flex_jon">
                        <ul class="terms_ul">
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                            </li>
                        </ul>

                        <div class="terms_img">
                            <img src="{{asset('content')}}/images/Frame 1000003508.png" />
                        </div>
                    </div>


                </div>
            </div>

        </div>
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