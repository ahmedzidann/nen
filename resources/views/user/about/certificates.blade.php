@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Certificates @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<style>
.global-description p,
span {
    font-size: 1.1rem !important;
}
</style>

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

                {{-- <div class="swiper-slide">
                    @if ($fs)
                    <div class="mt-3">
                        @if ($fs->getFirstMediaUrl('StaticTable'))

                        <img class="w-100 rounded" style="height:25rem;" src="{{$fs->getFirstMediaUrl('StaticTable')}}"
                alt="{{$fs->title}} ">
                @endif
            </div>
            @endif
        </div> --}}

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
                                        <p class="title-card mt-2">{{$item->title}}   ({{  $item->id  }})</p>
                                        <span class="mt-1 mb-2">({{$item->years_text}})</span>
                                    </div>
                                    <div>
                                        <span
                                                class="description {{ strlen($item->description) >= 50 ? "p_clamp_2" : 'p_clamp'}}">
                                                {{ html_entity_decode(strip_tags($item->description)) }}
                                            </span>

                                            @if (strlen($item->description) >= 50)
                                            <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More
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
                                        <img src="{{url('content/images/small_icon/global.png')}}"><span><a target="_blank"
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
                                <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="text">{{ TranslationHelper::translateWeb(ucfirst('See More')??'') }}</div>
                    </button>
                </a>
                @endif
            </div>

 
        </div>
    </div>
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
        button.innerHTML = 'Read More <i class="bi bi-chevron-down"></i>';
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
    var itemsPerPage = 6;

    var items = @json($items->where('item', 'section-two')->values());

    var subItems = items.filter(item => item.childe_pages_id == slug_id);
    var start = page * itemsPerPage;
    var end = start + itemsPerPage;
    var newItems = subItems.slice(start, end);

    newItems.forEach(item => {
        var card = document.createElement('div');
        let staticTableMedia = item.media?.find(m => m.collection_name === 'StaticTable');

        card.className = 'hovering-layers-card h-100 pb-3';
        card.innerHTML = `
        <div id="cert-box" class="card h-100">
            <div class="card_content content">
                <div class="data-content-box">
                    <div class="cert-data">
                        <div class="image-box">
                            <img src="${item.media && item.media.find(i => i.collection_name === 'StaticTable') ? item.media.find(i => i.collection_name === 'StaticTable').original_url : 'eee'}" alt="${item.title?.en ?? ''}">
                        </div>
                        <p class="title-card mt-2">${item.title?.[lang] ?? item.title?.en ?? ''}</p>
                        <span class="mt-1 mb-2">(${item.years_text?.[lang] ?? item.years_text?.en ?? ''})</span>
                    </div>
                     <div>
                        <span class="description ${item.description[lang] && item.description[lang].length >= 50 ? 'p_clamp' : 'p_clamp_2'}">
                            ${htmlspecialchars(stripTags(item.description[lang] ? item.description[lang] : item.description.en))}
                        </span>
                        ${item.description.en.length >= 50 
                            ? '<a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>' 
                            : ''}
                    </div>
                </div>
                <div class="icons-data">
                    <p class="icons-item">
                        ${
                            item.media && item.media.find(i => i.collection_name === 'StaticTable2')
                                ? `<img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a class="ref_coloring" href="${item.media.find(i => i.collection_name === 'StaticTable2').original_url}">Reference</a></span>`
                                : ''
                        }
                    </p>
                    <p class="icons-item">
                        ${
                            item.url
                                ? `<img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" target="_blank" href="${item.url[lang] ?? item.url.en}">Website</a></span>`
                                : ''
                        }
                    </p>
                </div>
            </div>
        </div>
        `;

        container.appendChild(card);
    });

    // Hide "See More" if all items are loaded
    if (end >= subItems.length) {
        const btn = document.querySelector(`#see_more_bttn[data-slug="${slug}"]`);
        if (btn) btn.style.display = 'none';
    }

    // Update the page attribute
    container.setAttribute('data-page', newPage);
}

</script>
@endsection