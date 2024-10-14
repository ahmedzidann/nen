@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Certificates @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<!-- New Desgin -->
<div id="certifications-section" class="container">
    <div class="text-start">
        <h5 class="global-title fw-semibold">
            Certifications
        </h5>
        <div class="under-title-vector">
            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                alt="vector">
        </div>
    </div>
    <div class="tabs-items">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($subPartners as $sub)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab"
                    aria-controls="pills-{{$sub->slug}}" aria-selected="true">
                    {{$sub->name}}
                </button>
            </li>
            @endforeach
        </ul>
        <div class="tab-content certificates_h" id="pills-tabContent">
            @foreach ($subPartners as $sub)
            @php
            $fs = $items->where('item', 'section-one')
            ->where('childe_pages_id', $sub->id)
            ->first();
            @endphp
            <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">

                <p class="global-description">
                    {!! $fs?->description !!}
                </p>

                <div class="swiper-slide">
                    @if ($fs)
                    <div class="mt-3">
                        @if ($fs->getFirstMediaUrl('StaticTable'))

                        <img class="w-100 rounded" style="height:25rem;" src="{{$fs->getFirstMediaUrl('StaticTable')}}"
                            alt="{{$fs->title}}">
                        @endif
                    </div>
                    @endif
                </div>

                <div class="certifications_sec mt-md-4 mt-3">
                    <div class="text-start">
                        <h5 class="global-title fw-semibold">
                            Our Certifications
                        </h5>
                        <div class="under-title-vector">
                            <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="vector">
                        </div>
                    </div>

                    <div class="grid_div_bttn">
                        <div class="grid_div new-card" id="partners-{{$sub->slug}}" data-page="1">
                            @foreach ($items->where('item',
                            'section-two')->where('childe_pages_id',$sub->id)->take(6) as $item)
                            <div class="hovering-layers-card h-100 pb-3 {{ $loop->first ? '' : '' }}">
                                <div id="cert-box" class="card h-100">
                                    <div class="card_content content">
                                        <div class="data-content-box">
                                            <div class="cert-data">
                                                <div class="image-box">
                                                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                                                </div>
                                                <p class="title-card mt-2">{{$item->title}}</p>
                                                <span class="mt-1 mb-2">({{$item->years_text}})</span>
                                            </div>
                                            <div>
                                                <span
                                                    class="description {{ strlen($item->description) >= 200 ? "p_clamp" : ''}}">
                                                    {{ html_entity_decode(strip_tags($item->description)) }}
                                                </span>

                                                @if (strlen($item->description) >= 200)
                                                <a role='btn' onclick="toggleDescription(this)" class="read_more">Read
                                                    More
                                                    <i class="bi bi-chevron-down"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="icons-data">
                                            <p class="icons-item">
                                                @if ($item->getFirstMediaUrl('StaticTable2'))
                                                <img src="{{url('content/images/small_icon/archive-book.png')}}">
                                                <span><a class="ref_coloring"
                                                        href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                @endif
                                            </p>
                                            <p class="icons-item">
                                                @if ($item->url)
                                                <img src="{{url('content/images/small_icon/global.png')}}"><span><a
                                                        class="ref_coloring" href="{{$item->url}}">Website</a></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->count()>6)
                        <a href="#" id='see_more_bttn' class="see-more-btn" data-slug="{{$sub->slug}}"
                            onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">
                            <button class="Btn">
                                <div class="sign">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="text">See More</div>
                            </button>
                        </a>
                        @endif
                    </div>

                    @if ($items->where('item', 'section-two')->where('childe_pages_id', $sub->id)->count() > 6)
                    <a href="#" id='see_more_bttn' class="see-more-btn mt-md-4 mt-3" data-slug="{{$sub->slug}}"
                        onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">
                        <button class="Btn">
                            <div class="sign">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="text">See More</div>
                        </button>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Old Desgin (Remove d-none Class to view it again-->
<div class="about_content d-none">
    <h1>CERTIFICATES</h1>
    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($subPartners as $sub)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab"
                    aria-controls="pills-{{$sub->slug}}" aria-selected="true">{{$sub->name}}</button>
            </li>
            @endforeach
            {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link active proj_bttn" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">Strategic</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Technology</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Education</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">Testing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">Business</button>
                </li> --}}
        </ul>
        <div class="tab-content certificates_h" id="pills-tabContent">
            @foreach ($subPartners as $sub)
            @php
            $fs= $items->where('item','section-one')
            ->where('childe_pages_id',$sub->id)->first();

            @endphp
            <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
                <div class="explain_titel">
                    <p>{!! $fs?->description !!}</p>

                </div>

                <div class="swiper-slide">
                    @if ($fs)
                    <img class="certifcate_img" src="{{$fs->getFirstMediaUrl('StaticTable')}}" alt="{{$fs->title}}">
                    @endif
                </div>


                <div class="ceryifcates_sec">
                    <h1>Our CERTIFICATES</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>


                    <div class="grid_div_bttn">
                        <div class="grid_div" id="partners-{{$sub->slug}}" data-page="1">
                            @foreach ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->take(6)
                            as $item)
                            <div class="card card_styles">
                                <div class="card_content">
                                    <div class="iso_div">
                                        <div class="size_div">
                                            <img src="{{$item->getFirstMediaUrl('StaticTable')}}">

                                        </div>

                                        <p>{{$item->title}} <span>({{$item->years_text}})</span></p>
                                    </div>
                                    <div class="iso_titels ">
                                        <span
                                            class="description text-start {{ strlen($item->description)>= 200 ? "p_clamp_2":''}}">
                                            {{ html_entity_decode(strip_tags($item->description)) }}
                                        </span>



                                        @if (strlen($item->description)>= 200)
                                        <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i
                                                class="bi bi-chevron-down"></i></a>
                                        @endif
                                        <div class="flex_icons_div">
                                            <p>
                                                @if ($item->getFirstMediaUrl('StaticTable2'))
                                                <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a
                                                        class="ref_coloring"
                                                        href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                @endif
                                            </p>
                                            <p>
                                                @if ($item->url)
                                                <img src="{{url('content/images/small_icon/global.png')}}"><span><a
                                                        class="ref_coloring" href="{{$item->url}}">Website</a></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach


                        </div>

                    </div>


                    {{-- <a href="#" class="see_more_bttn">See More <span><i class="bi bi-chevron-down"></i></span></a> --}}
                    @if ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->count()>6)
                    <a href="#" class="see_more_bttn" data-slug="{{$sub->slug}}"
                        onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,{{app()->getLocale()}})">See
                        More <span><i class="bi bi-chevron-down"></i></span></a>
                    @endif
                </div>
            </div>
            @endforeach
            {{-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                aria-labelledby="pills-home-tab" tabindex="0">
                <div class="explain_titel">
                    <p>National Education Network sought various accreditations, including strategic,
                        technological, and educational, as well as recognition from prominent global
                        companies specializing in technological, academic, and governmental testing.
                        Many international companies rely on these test centers to conduct skill and
                        quality assessments worldwide, and National Education Network aimed to obtain
                        accreditations from these companies in a legitimate, fair, and organized manner.
                        National Education Network has successfully administered over 100,000
                        international tests across different domains in recent years, emphasizing its
                        experience and expertise in this area.</p>
                    <!-- Swiper -->
                    <div class="swiper mySwiper partners_slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="content/images/man.png"></div>
                            <div class="swiper-slide"><img src="content/images/mens.png"></div>
                            <div class="swiper-slide"><img src="content/images/women.png"></div>
                            <div class="swiper-slide"><img src="content/images/women2.png"></div>
                            <div class="swiper-slide"><img src="content/images/Switch.png"></div>
                            <div class="swiper-slide"><img src="content/images/cup1.png"></div>
                            <div class="swiper-slide"><img src="content/images/man.png"></div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <!-- Swiper JS -->
                </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                    aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="explain_titel">
                        <p>National Education Network sought various accreditations, including strategic,
                            technological, and educational, as well as recognition from prominent global
                            companies specializing in technological, academic, and governmental testing.
                            Many international companies rely on these test centers to conduct skill and
                            quality assessments worldwide, and National Education Network aimed to obtain
                            accreditations from these companies in a legitimate, fair, and organized manner.
                            National Education Network has successfully administered over 100,000
                            international tests across different domains in recent years, emphasizing its
                            experience and expertise in this area.</p>

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                    aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                    aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                    aria-labelledby="pills-disabled-tab" tabindex="0">...</div> --}}

        </div>
    </div>
</div>

<script>
function toggleDescription(button) {
    var description = button.previousElementSibling;
    if (description.classList.contains('p_clamp_2')) {
        description.classList.remove('p_clamp_2');
        button.innerHTML = 'Read More <i class="bi bi-chevron-up"></i>';
    } else {
        description.classList.add('p_clamp_2');
        button.innerHTML = 'Show Less <i class="bi bi-chevron-down"></i>';
    }
}

function htmlspecialchars(str) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return str.replace(/[&<>"']/g, function(m) {
        return map[m];
    });
}

function stripTags(input) {
    // Use a regular expression to match HTML tags and replace them with an empty string
    return input.replace(/<\/?[^>]+(>|$)/g, "");
}



function escapeHTML(str) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return str.replace(/[&<>"']/g, function(m) {
        return map[m];
    });
}

function loadMorePartners(event, slug, slug_id, lang) {

    event.preventDefault();
    var container = document.getElementById('partners-' + slug);
    var page = parseInt(container.getAttribute('data-page'));
    var newPage = page + 1;

    // Fetching items through a data attribute (ensure items are available globally in the blade)
    var items = @json($items->where('item', 'section-two')->values());
    var subItems = items.filter(item => item.childe_pages_id == slug_id);
    var start = page * 2;
    var end = start + 2;
    var newItems = subItems.slice(start, end);
    console.log(items);
    console.log(newItems);

    // Creating new cards for each new item
    newItems.forEach(item => {
        var card = document.createElement('div');
        card.className = 'card';
        card.id = 'cert-box';
        card.innerHTML = `
        <div class="card_content">
            <div class="data-content-box">
                <div class="cert-data">
                    <div class="image-box">
                        <img src="${item.media ? (item.media.filter(i => i.collection_name == 'StaticTable')[0] ? item.media.filter(i => i.collection_name == 'StaticTable')[0].original_url : '') : ''}">
                    </div>
                    <p class="title-card mt-2">${item.title[lang] ? item.title[lang] : item.title.en}</p>
                    <span class="mt-1">(${item.years_text[lang] ? item.years_text[lang] : item.years_text.en})</span>
                </div>
                <div>
                    <span class="description ${item.description[lang] && item.description[lang].length >= 200 ? 'p_clamp' : 'p_clamp_2'}">
                        ${htmlspecialchars(stripTags(item.description[lang] ? item.description[lang] : item.description.en))}
                    </span>
                    ${item.description.en.length >= 200 ? '<a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>' : ''}
                </div>
            </div>
            <div class="icons-data">
                <p class="icons-item">
                    ${item.media && item.media.filter(i => i.collection_name == 'StaticTable2')[0] ? '<img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a class="ref_coloring" href="' + item.media.filter(i => i.collection_name == 'StaticTable2')[0].original_url + '">Reference</a></span>' : ''}
                </p>
                <p>
                    ${item.url ? '<img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" href="' + item.url[lang] + '">Website</a></span>' : ''}
                </p>
            </div>
        </div>
    `;

        // Append the new card to the container
        container.appendChild(card);
    });

    // Hide the "See More" button if there are no more items to load
    if (((subItems.length / 6) - newPage) < 0) {
        document.getElementById('see_more_bttn').style.display = 'none';
    }

    // Update the page attribute for the next load
    container.setAttribute('data-page', newPage);
}
</script>
@endsection