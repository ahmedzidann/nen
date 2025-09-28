@extends('user.layout.master')
@section('parent_page_name')
Education
@endsection
@section('page_name')
{{ $partner->name }}
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')
<div id="certifications-section">
    <div class="text-start">
        <h5 class="global-title fw-semibold">
            {{ $partner->name }}
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
        <p class="global-description">
            {!! $partner->educationDescription?->getTranslation('description', app()->getLocale()) !!}
        </p>
    </div>
    @if ($partner->educationDescription?->image)
    <div class="banner-image-container rounded">
        <img src="{{ asset('storage') . '/' . $partner->educationDescription?->image }}" loading="lazy"
            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';">
    </div>
    @endif
    <div class="container-fluid">
        <div class="tabs-items">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <div class="swiper-container">
                    <div class="swiper-wrapper px-5">
                        @foreach ($subPartners as $sub)
                        <?php $string = str_replace(' ', '-', strtolower($sub->slug)); ?>
                        <div class="swiper-slide nav-item" role="presentation">
                            <button class="nav-link swiper-tab @if ($loop->first) active @endif"
                                id="pills-{{ $sub->slug }}-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-{{ $sub->slug }}" type="button" role="tab"
                                aria-controls="{{ $string }}" aria-selected="true"
                                data-id="{{ $sub->id }}" data-slug="{{ $sub->slug }}">{{ $sub->slug }}</button>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <div class="slider-button slider-prev" tabindex="0" role="button"
                            aria-label="Previous slide">
                            <i class="fa fa-chevron-left"></i>
                        </div>
                        <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php
                $fs = $items
                ->where('item', 'section-one')
                ->where('childe_pages_id', $sub->id)
                ->first();
                @endphp

                <div class="tab-pane fade @if ($loop->first) show active @endif"
                    id="pills-{{ $sub->slug }}" role="tabpanel"
                    aria-labelledby="pills-{{ $sub->slug }}-tab" tabindex="0">

                    <!-------------------------------------------- start description---------------------------------------->
                    @php
                    $des= DB::table('education_descriptions')->where('sub_page_id',$sub->id)->first();
                    @endphp
                    @if(isset( $des) && !empty($des))
                    <div id="dummy-highlight-section" class="dummy-highlight-section">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <div class="dummy-description">
                                    <p id="dummy-text" class="dummy-text">
                                        @php
                                        $desc = json_decode($des->description, true);
                                        @endphp

                                        {!! $desc[app()->getLocale()] ?? '' !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img id="dummy-image"
                                    src="{{ asset('storage') . '/' . $des->image }}"
                                    alt="Dummy Image" class="dummy-image img-fluid rounded">
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-------------------------------------------- end description---------------------------------------->
                    <div class="grid_div_bttn">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="partners-{{ $sub->slug }}"
                            data-page="1">
                            @forelse ($items->where('pages_id', $sub->id)->take(12) as $item)

                            <div class="col">
                                <div class="card h-100 new-card-style">
                                    <img src="{{ $item->getFirstMediaUrl('Education') }}" class="card-img-top"
                                        alt="{{ $item->title }}">
                                    <div class="d-flex w-100 justify-content-between mb-2 small-details px-3">
                                        <div class="d-flex align-items-center">

                                            <span>price : {{ $item->price ?? '0.0' }}</span><i class="bi bi-currency-dollar mx-1"></i>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-clock mx-1"></i>
                                            <span>Hours: {{ $item->hours ?? '0.0' }}</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-book mx-1 text-muted"></i>
                                            <a href="#" class="material" target="_blank">Material</a>
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="card-body">
                                        <!-- <h6 class="card-subtitle mb-2 text-muted"><i
                                                            class="bi bi-patch-check-fill"></i>
                                                        International testing
                                                        <a href="#" target="_blank">
                                                            <svg width="14" class="mx-2 mb-1" viewBox="0 0 18 18"
                                                                xmlns="http://www.w3.org/2000/svg" mirror-in-rtl="true"
                                                                fill="#000000">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path fill="#494c4e"
                                                                        d="M12.1.6a.944.944 0 0 0 .2 1.04l1.352 1.353L10.28 6.37a.956.956 0 0 0 1.35 1.35l3.382-3.38 1.352 1.352a.944.944 0 0 0 1.04.2.958.958 0 0 0 .596-.875V.96a.964.964 0 0 0-.96-.96h-4.057a.958.958 0 0 0-.883.6z">
                                                                    </path>
                                                                    <path fill="#494c4e"
                                                                        d="M14 11v5a2.006 2.006 0 0 1-2 2H2a2.006 2.006 0 0 1-2-2V6a2.006 2.006 0 0 1 2-2h5a1 1 0 0 1 0 2H2v10h10v-5a1 1 0 0 1 2 0z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    </h6> -->
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                        <p class="card-text description p_clamp" style="color: #495057 !important;s ">
                                            {{ html_entity_decode(strip_tags($item->description)) }}
                                        </p>
                                    </div>
                                    <div class="card-footer d-flex flex-column align-items-start bg-white">
                                        <div class="mb-2 small-details" @if (!$item->material_link) style="display:none;" @endif>
                                            <i class="bi bi-book me-2"></i>
                                            <a href="{{ $item->material_link }}" class="ref_coloring"
                                                target="_blank">Material2</a>
                                        </div>
                                        <div style="background:white; width:100%">
                                            <div class="card-buttons-container">
                                                <a href="#" class="btn custom-btn btn-solid"
                                                    data-bs-toggle="modal" data-bs-target="#itemDetailsModal"
                                                    data-item-id="{{ $item->id }}">
                                                    <svg width="16" viewBox="0 -4 20 20" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        fill="#fff">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <title>view_simple [#815]</title>
                                                            <desc>Created with Sketch.</desc>
                                                            <defs> </defs>
                                                            <g id="Page-1" stroke="none" stroke-width="1"
                                                                fill="none" fill-rule="evenodd">
                                                                <g id="Dribbble-Light-Preview"
                                                                    transform="translate(-260.000000, -4563.000000)"
                                                                    fill="#fff">
                                                                    <g id="icons"
                                                                        transform="translate(56.000000, 160.000000)">
                                                                        <path
                                                                            d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403"
                                                                            id="view_simple-[#815]">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    View
                                                </a>
                                                <a href="#" data-item-id="{{ $item->id }}" id="registerbutton" class="btn custom-btn btn-outline"
                                                    data-bs-toggle="modal" data-bs-target="#registerModal">
                                                    <svg fill="#990000" width="16" version="1.1" id="Capa_1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        viewBox="0 0 310 310" xml:space="preserve">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path
                                                                d="M300.606,159.727l-45.333-45.333c-5.857-5.858-15.355-5.858-21.213,0L225,123.454V15c0-8.284-6.716-15-15-15H20 C11.716,0,5,6.716,5,15v240.002c0,8.284,6.716,15,15,15h85V295c0,8.284,6.716,15,15,15h45.333c3.979,0,7.794-1.581,10.607-4.394 l124.667-124.667C306.465,175.081,306.465,165.585,300.606,159.727z M35,30h160v123.454l-85.606,85.605 c-0.302,0.301-0.581,0.619-0.854,0.942H35V30z M159.12,280H135v-24.121l109.667-109.666l24.12,24.12L159.12,280z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    Register
                                                </a>
                                            </div>
                                            <div class="card-buttons-container">
                                                <a href="{{ asset('storage/education/' . ($item['files']->first()->file ?? '#')) }}"
                                                    class="btn custom-btn btn-solid" target="_blank">
                                                    <svg viewBox="0 0 24 24" width="16"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        stroke="#fff">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.105 4.561l-3.43 3.427-1.134-1.12 2.07-2.08h-4.8a2.4 2.4 0 1 0 0 4.8h.89v1.6h-.88a4 4 0 0 1 0-7.991h4.8L6.54 1.13 7.675 0l3.43 3.432v1.13zM16.62 24h-9.6l-.8-.8V10.412l.8-.8h9.6l.8.8V23.2l-.8.8zm-8.8-1.6h8V11.212h-8V22.4zm5.6-20.798h9.6l.8.8v12.786l-.8.8h-4v-1.6h3.2V3.2h-8v4.787h-1.6V2.401l.8-.8zm.8 11.186h-4.8v1.6h4.8v-1.6zm-4.8 3.2h4.8v1.6h-4.8v-1.6zm4.8 3.2h-4.8v1.6h4.8v-1.6zm1.6-14.4h4.8v1.6h-4.8v-1.6zm4.8 6.4h-1.6v1.6h1.6v-1.6zm-3.338-3.176v-.024h3.338v1.6h-1.762l-1.576-1.576z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    Reference
                                                </a>
                                                <a href="{{$item['links']->first()->reference ?? '#' }}" class="btn custom-btn btn-outline"
                                                    target="_blank">
                                                    <svg viewBox="0 0 192 192" width="16"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        stroke="#990000">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <circle cx="96" cy="96" r="74"
                                                                stroke="#990000" stroke-width="12"></circle>
                                                            <ellipse cx="96" cy="96" stroke="#990000"
                                                                stroke-width="12" rx="30" ry="74"></ellipse>
                                                            <path stroke="#990000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="12"
                                                                d="M28 72h136M28 120h136"></path>
                                                        </g>
                                                    </svg>
                                                    Website
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                        @if ($items->where('pages_id', $sub->id)->count() >12)
                        <a href="#" id='see_more_bttn' class="see_more_bttn"
                            data-slug="{{ $sub->slug }}"
                            onclick="loadMorePartners(event, '{{ $sub->slug }}', {{ $sub->id }})">See
                            More <span><i class="bi bi-chevron-down"></i></span></a>
                        @endif
                    </div>
                    @php
                     $faqs = App\Models\Education::where('pages_id',$sub->id)->where('type','faqs')->get() ;
                    
                    @endphp
                 @if($faqs && $faqs->isNotEmpty())
                      
                 
                <hr class="my-5">
                    <h2 class="global-title fw-semibold text-center mb-4">FAQs</h2>
                    <div class="accordion accordion-flush faq-custom-style"
                        id="faqAccordion-{{ $sub->slug }}">
                         @foreach ($faqs as $faq)
                             
                         
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne-{{ $faq->id  }}">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{ $faq->id  }}"
                                    aria-expanded="false" aria-controls="flush-collapseOne-{{ $sub->slug }}">
                                    {!! $faq->getTranslation('title', app()->getLocale()) !!}
                                </button>
                            </h2>
                            <div id="flush-collapseOne-{{ $faq->id  }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne-{{ $sub->slug }}"
                                data-bs-parent="#faqAccordion-{{ $sub->slug }}">
                                <div class="accordion-body">
                               
                                    {!! $faq->getTranslation('description', app()->getLocale()) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                     @endif
                    
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</div>
{{-- Dynamic Modal Structure --}}
<div class="modal fade" id="itemDetailsModal" tabindex="-1" aria-labelledby="itemDetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-custom-width">
        <div class="modal-content modal-custom-style">
            <div class="modal-header">
                <h5 class="modal-title fw-500" id="itemDetailsModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modal-item-image" src="" alt="Item Image" class="img-fluid w-100 modal-image-top">
                <div class="p-4 py-2 modal-content-area">
                    <div class="d-flex flex-wrap align-items-center mt-2 justify-content-between modal-details">
                        <div class="d-flex align-items-center mb-2 me-3">
                            <i class="bi bi-currency-dollar me-2 text-muted"></i>
                            <span id="modal-item-price"></span>
                        </div>
                        <div class="d-flex align-items-center mb-2 me-3">
                            <i class="bi bi-clock me-2 text-muted"></i>
                            <span id="modal-item-hours"></span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-book me-2 text-muted"></i>
                            <a href="#" id="modal-item-material-link" class="ref_coloring text-decoration-none"
                                target="_blank">Material</a>
                        </div>
                    </div>
                    <div id="modal-description-scrollable">
                        <p id="modal-item-description"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-start">
                <div class="d-flex align-items-center justify-content-between w-100">

                    <div class="card-buttons-container mb-2 w-auto">
                        <a href="#" id="modal-register" class="btn custom-btn btn-outline"
                            data-bs-toggle="modal" data-bs-target="#registerModal">
                            <svg fill="#990000" width="16" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 310 310" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M300.606,159.727l-45.333-45.333c-5.857-5.858-15.355-5.858-21.213,0L225,123.454V15c0-8.284-6.716-15-15-15H20 C11.716,0,5,6.716,5,15v240.002c0,8.284,6.716,15,15,15h85V295c0,8.284,6.716,15,15,15h45.333c3.979,0,7.794-1.581,10.607-4.394 l124.667-124.667C306.465,175.081,306.465,165.585,300.606,159.727z M35,30h160v123.454l-85.606,85.605 c-0.302,0.301-0.581,0.619-0.854,0.942H35V30z M159.12,280H135v-24.121l109.667-109.666l24.12,24.12L159.12,280z">
                                    </path>
                                </g>
                            </svg>
                            Register
                        </a>
                        <a href="#" id="modal-reference" class="btn custom-btn btn-solid" target="_blank">
                            <svg viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="#fff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.105 4.561l-3.43 3.427-1.134-1.12 2.07-2.08h-4.8a2.4 2.4 0 1 0 0 4.8h.89v1.6h-.88a4 4 0 0 1 0-7.991h4.8L6.54 1.13 7.675 0l3.43 3.432v1.13zM16.62 24h-9.6l-.8-.8V10.412l.8-.8h9.6l.8.8V23.2l-.8.8zm-8.8-1.6h8V11.212h-8V22.4zm5.6-20.798h9.6l.8.8v12.786l-.8.8h-4v-1.6h3.2V3.2h-8v4.787h-1.6V2.401l.8-.8zm.8 11.186h-4.8v1.6h4.8v-1.6zm-4.8 3.2h4.8v1.6h-4.8v-1.6zm4.8 3.2h-4.8v1.6h4.8v-1.6zm1.6-14.4h4.8v1.6h-4.8v-1.6zm4.8 6.4h-1.6v1.6h1.6v-1.6zm-3.338-3.176v-.024h3.338v1.6h-1.762l-1.576-1.576z">
                                    </path>
                                </g>
                            </svg>
                            Reference
                        </a>
                        <a href="#" id="modal-website" class="btn custom-btn btn-outline" target="_blank">
                            <svg viewBox="0 0 192 192" width="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                stroke="#990000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="96" cy="96" r="74" stroke="#990000" stroke-width="12">
                                    </circle>
                                    <ellipse cx="96" cy="96" stroke="#990000" stroke-width="12" rx="30"
                                        ry="74"></ellipse>
                                    <path stroke="#990000" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="12" d="M28 72h136M28 120h136"></path>
                                </g>
                            </svg>
                            Website
                        </a>
                    </div>
                    <button type="button" class="btn custom-btn btn-dark" style="flex:initial !important" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- New Modal for Registrations --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-custom-width">
        <div class="modal-content modal-custom-style">
            <div class="modal-header">
                <h5 class="modal-title fw-500" id="registerModalLabel">Registrations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="p-4 py-2 modal-content-area">
                    <div class="row" id="registrations-container">
                    </div>
                </div>
            </div>
            <div class="modal-footer align-items-end">
                <button type="button" class="btn custom-btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('websiteScript')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            freeMode: true,
            navigation: {
                nextEl: '.slider-next',
                prevEl: '.slider-prev',
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            mousewheel: {
                forceToAxis: true,
            }
        });
        const allItems = @json($items);

        const tabs = document.querySelectorAll('.swiper-tab');
        const updateDummyContent = (slug) => {

        };
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const slug = this.getAttribute('data-slug');
                updateDummyContent(slug);
            });
        });
        // Set initial content on page load
        const firstActiveTab = document.querySelector('.swiper-tab.active');
        if (firstActiveTab) {
            updateDummyContent(firstActiveTab.getAttribute('data-slug'));
        }
        // "View Details" Modal Handling viewbutton
        const itemDetailsModal = document.getElementById('itemDetailsModal');
        itemDetailsModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const itemId = button.getAttribute('data-item-id');

            const item = allItems.find(i => i.id == itemId);
            if (item) {
                const modalTitle = itemDetailsModal.querySelector('#itemDetailsModalLabel');
                const modalImage = itemDetailsModal.querySelector('#modal-item-image');
                const modalDescription = itemDetailsModal.querySelector('#modal-item-description');

                const modalPrice = itemDetailsModal.querySelector('#modal-item-price');
                const modalHours = itemDetailsModal.querySelector('#modal-item-hours');
                const modalMaterialLink = itemDetailsModal.querySelector('#modal-item-material-link');
                const modalRegisterBtn = itemDetailsModal.querySelector('#modal-register');
                const modalReferenceBtn = itemDetailsModal.querySelector('#modal-reference');


                const modalWebsiteBtn = itemDetailsModal.querySelector('#modal-website');
                const lang = '{{ app()->getLocale() }}';
                const title = item.title[lang] || item.title.en;
                const description = item.description[lang] || item.description.en;
                modalTitle.textContent = title;
                modalImage.src = item.media.find(m => m.collection_name === 'Education')?.original_url ||
                    'https://via.placeholder.com/1200x400.png?text=No+Image+Available';
                modalDescription.innerHTML = description || 'No detailed description is available.';
                modalPrice.textContent = item.price ? `Price: ${item.price}` : 'Price: 0.0';
                modalHours.textContent = item.hours ? `Hours: ${item.hours}` : 'Hours: 0.0';
                if (item.material_link) {
                    modalMaterialLink.href = item.material_link;
                    modalMaterialLink.parentElement.style.display = 'flex';
                } else {
                    modalMaterialLink.parentElement.style.display = 'none';
                }
                if (item.register_link) {
                    modalRegisterBtn.href = item.register_link;
                     modalRegisterBtn.setAttribute('data-item-id', item.id);
                     modalRegisterBtn.setAttribute('id', 'registerbutton');
                     modalRegisterBtn.style.display = 'none';
                }else{
                      modalRegisterBtn.setAttribute('data-item-id', item.id);
                     modalRegisterBtn.setAttribute('id', 'registerbutton');
                     modalRegisterBtn.style.display = 'block';
                }
                const storageBase = "{{ asset('storage/education') }}/";
                if (item.files[0].file) {
                    modalReferenceBtn.href = storageBase + item.files[0].file; // ✅ dot notation
                    modalReferenceBtn.style.display = 'block';
                }
                if (item.links[0].reference) {
                    modalWebsiteBtn.href = item.links[0].reference;
                    modalWebsiteBtn.style.display = 'block';
                }
            }
        });

        // "Registrations" Modal Handling
        const registerModal = document.getElementById('registerModal');
        const registrationsContainer = document.getElementById('registrations-container');
        registerModal.addEventListener('show.bs.modal', function(event) {
            const triggerButton = event.relatedTarget;
            const itemId2 = triggerButton.getAttribute('data-item-id');
            console.log("Clicked Item ID:", itemId2);
           const lang = '{{ app()->getLocale() }}';

            registrationsContainer.innerHTML = '';

            const item = allItems.find(i => i.id == itemId2);

            if (item && item.country_register) {
                item.country_register.forEach(reg => {
                   
                    const cardHtml = `
               <div class="col-12 mb-2">
                <div class="card new-card-style"> <div class="card-body d-flex align-items-center py-1">
                 <div class="d-flex align-items-center flex-grow-1">
                  <img src="${reg.flag_url}" class="me-3" style="width: 60px; height: 60px; object-fit: contain;" alt="${reg.id}">
                   <div> <h6 class="card-title mb-0 fw-400" style="font-size:16px">${reg.title[lang]}</h6>
                    </div> </div> <div class="ms-auto">
                     <a href="${reg.pivot.url}" class="btn btn-link p-0" target="_blank" title="Download">
                      <svg width="24" height="24" fill="#1C274C" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" 
                      enable-background="new 0 0 52 52" xml:space="preserve"> <g id="SVGRepo_bgCarrier" stroke-width="0"></g> 
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g> <g id="SVGRepo_iconCarrier">
                       <g> <path d="M48.7,2H29.6C28.8,2,28,2.5,28,3.3v3C28,7.1,28.7,8,29.6,8h7.9c0.9,0,1.4,1,0.7,1.6l-17,17 c-0.6,0.6-0.6,1.5,0,2.1l2.1,2.1c0.6,0.6,1.5,0.6,2.1,0l17-17c0.6-0.6,1.6-0.2,1.6,0.7v7.9c0,0.8,0.8,1.7,1.6,1.7h2.9 c0.8,0,1.5-0.9,1.5-1.7v-19C50,2.5,49.5,2,48.7,2z"></path> <path d="M36.3,25.5L32.9,29c-0.6,0.6-0.9,1.3-0.9,2.1v11.4c0,0.8-0.7,1.5-1.5,1.5h-21C8.7,44,8,43.3,8,42.5v-21 C8,20.7,8.7,20,9.5,20H21c0.8,0,1.6-0.3,2.1-0.9l3.4-3.4c0.6-0.6,0.2-1.7-0.7-1.7H6c-2.2,0-4,1.8-4,4v28c0,2.2,1.8,4,4,4h28 c2.2,0,4-1.8,4-4V26.2C38,25.3,36.9,24.9,36.3,25.5z"></path> </g> </g> </svg> </a> </div> </div> </div> </div> ;
            `;
                    registrationsContainer.insertAdjacentHTML('beforeend', cardHtml);
                });
            } else {
                registrationsContainer.innerHTML = `<p class="text-muted">No registrations found.</p>`;
            }
        });

        // Load More Partners Functionality
        window.loadMorePartners = function(event, slug, slug_id, lang = '{{ app()->getLocale() }}') {
            event.preventDefault();
            var container = document.getElementById('partners-' + slug);
            var page = parseInt(container.getAttribute('data-page'));
            var newPage = page + 1;
            var items = @json($items->values());
            var subItems = items.filter(item => item.pages_id == slug_id);
            var start = page * 6;
            var end = start + 6;
            var newItems = subItems.slice(start, end);
            newItems.forEach(item => {
                const cardHtml = `
                        <div class="col">
                            <div class="card h-100 new-card-style">
                                <img src="${item.media.filter(i => i.collection_name === 'Education')[0]?.original_url || '{{ asset('content/images/not-found/no-image.svg') }}'}" class="card-img-top" alt="${item.title[lang] || item.title.en}">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-patch-check-fill"></i> International Testing</h6>
                                    <h5 class="card-title" >${item.title[lang] || item.title.en}</h5>
                                    <p class="card-text description p_clamp">
                                        ${item.description[lang] ? stripTags(item.description[lang]) : stripTags(item.description.en)}
                                    </p>
                                </div>
                                <div class="card-footer d-flex flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between mb-2 small-details">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-currency-dollar me-2"></i>
                                            <span>Price: ${item.price ?? 'N/A'}</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-clock me-2"></i>
                                            <span>Hours: ${item.hours ?? 'N/A'}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 small-details" ${!item.material_link ? 'style="display:none;"' : ''}>
                                        <i class="bi bi-book me-2"></i>
                                        <a href="${item.material_link}" class="ref_coloring" target="_blank">Material</a>
                                    </div>
                                    <div class="card-buttons-container">
                                        <a href="#" class="btn custom-btn btn-solid" data-bs-toggle="modal" data-bs-target="#itemDetailsModal" data-item-id="${item.id}">View Details</a>
                                        <a href="#" class="btn custom-btn btn-outline" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                                    </div>
                                    <div class="card-buttons-container">
                                        <a href="${item.media.filter(i => i.collection_name === 'StaticTable2')[0]?.original_url || '#'}" class="btn custom-btn btn-solid" target="_blank">Reference</a>
                                        <a href="${item.url || '#'}" class="btn custom-btn btn-outline" target="_blank">Website</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                container.insertAdjacentHTML('beforeend', cardHtml);
            });
            if (newPage * 6 >= subItems.length) {
                document.getElementById('see_more_bttn').style.display = 'none';
            }
            container.setAttribute('data-page', newPage);
        };

        function stripTags(html) {
            return html.replace(/<\/?[^>]+(>|$)/g, "");
        }
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection