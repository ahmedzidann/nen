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
<!-- New Desgin -->
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
                <!-- Swiper Wrapper for Tabs -->
                <div class="swiper-wrapper px-5">
                    @foreach ($subPartners as $sub)
                    <?php $string = str_replace(' ', '-', strtolower($sub->slug)); ?>
                    <div class="swiper-slide nav-item" role="presentation">
                        <button class="nav-link swiper-tab @if ($loop->first) active @endif"
                            id="pills-{{ $sub->slug }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $sub->slug }}" type="button" role="tab"
                            aria-controls="{{ $string }}" aria-selected="true"
                            data-id="{{ $sub->id }}">{{ $sub->slug }}</button>
                    </div>
                    @endforeach
                </div>

                <!-- Swiper Navigation Buttons -->
                <div class="slider-button slider-prev" tabindex="0" role="button" aria-label="Previous slide">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div class="slider-button slider-next" tabindex="0" role="button" aria-label="Next slide">
                    <i class="fa fa-chevron-right"></i>
                </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php
                $fs = $items
                ->where('item', 'section-one')
                ->where('childe_pages_id', $sub->id)
                ->first();

                @endphp

                <div class="tab-pane fade @if ($loop->first) show active @endif" id="pills-{{ $sub->slug }}"
                    role="tabpanel" aria-labelledby="pills-{{ $sub->slug }}-tab" tabindex="0">
                    <div class="explain_titel">
                        <p>{!! $fs?->description !!}</p>
                    </div>

                    <div class="swiper-slide">
                        @if ($fs)
                        <img src="{{ $fs->getFirstMediaUrl('StaticTable') }}" alt="{{ $fs->title }}">
                        @endif
                    </div>
                    <div class="grid_div_bttn">
                        <div class="grid_div new-card" id="partners-{{ $sub->slug }}" data-page="1">
                            @forelse ($items->where('pages_id', $sub->id)->take(6) as $item)
                            <div class="hovering-layers-card h-100 {{ $loop->first ? '' : '' }}">
                                <div id="cert-box" class="card h-100 mb-3">
                                    <div class="card_content content">
                                        <div class="data-content-box">
                                            <div class="cert-data">
                                                <div class="image-box">
                                                    <img src="{{ $item->getFirstMediaUrl('Education') }}" loading="lazy"
                                                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                                        alt="Education">
                                                </div>
                                                <p class="title-card mt-2">{{ $item->title }}</p>
                                            </div>
                                            <div>
                                                <span
                                                    class="description {{ strlen($item->description) >= 200 ? 'p_clamp' : '' }}">
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
                                                @if (isset($item->files[0]) && !empty($item->files[0]))
                                                <img src="{{ url('content/images/small_icon/archive-book.png') }}">
                                                <span><a class="ref_coloring"
                                                        href="{{ $item->getFirstMediaUrl('StaticTable2') }}">Reference</a></span>
                                                @endif
                                            </p>
                                            <p class="icons-item">
                                                @if (array_key_exists(0, $item?->links->toArray()) &&
                                                $item->links[0]->reference)
                                                <img src="{{ url('content/images/small_icon/global.png') }}"><span><a
                                                        class="ref_coloring" href="{{ $item->url }}">Website</a></span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty

                            @include('user.layout.includes.no-data')
                            @endforelse
                        </div>
                        @if ($items->where('pages_id', $sub->id)->count() > 6)
                        <a href="#" id='see_more_bttn' class="see_more_bttn" data-slug="{{ $sub->slug }}"
                            onclick="loadMorePartners(event, '{{ $sub->slug }}',{{ $sub->id }} ,)">See
                            More <span><i class="bi bi-chevron-down"></i></span></a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
    </div>
    </div>
</div>

@endsection
@section('websiteScript')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.nav-link.active').forEach(activeTab => {
                activeTab.classList.remove('active');
            });
            const managementId = this.getAttribute('data-id');
            this.classList.add('active');

            // Dynamically construct the URL
            let url = '{{ route('get-team-members', ['id'=>': id']) }}'.replace(':id',managementId);

            // Make the AJAX request using fetch
            fetch(url)
                .then(response => response.json()) // Parse the JSON data
                .then(data => {
                    document.getElementById('teamTabContent').innerHTML = data.data;
                    // Here, you can use the data to dynamically update the UI
                })
                .catch(error => console.error('Error:', error)); // Log any errors
        });
    });
    // Initialize Swiper after DOM is fully loaded
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        freeMode: true,
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
        // Optional: Enable keyboard control
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        // Optional: Enable mousewheel control
        mousewheel: {
            forceToAxis: true,
        }
    });
});
</script>
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
    var items = @json($items->values()); //'pages_id',$sub->id
    var subItems = items.filter(item => item.pages_id == slug_id)
    console.log(subItems);
    var start = page * 6;
    var end = start + 6;
    var newItems = subItems.slice(start, end);
    // console.log(items);
    // console.log(newItems);

    //.getFirstMediaUrl('StaticTable')
    newItems.forEach(item => {
        var card = document.createElement('div');
        card.className = 'card card_styles';
        card.innerHTML = `
                    <div class="card_content">
                        <div class="iso_div">
                            <div class="size_div">
                                <img src="${item.media ?(item.media.filter(i => i.collection_name == 'Education')[0]? item.media.filter(i => i.collection_name == 'Education')[0].original_url : ""):""}">

                            </div>
                            <p>${item.title[lang]?item.title[lang] :item.title.en} </p>
                        </div>
                        <div class="iso_titels">
                            <span class="description text-start ${ item.description[lang]?(item.description[lang].length >= 200 ? 'p_clamp' : ''):
                                (item.description.en.length >= 200 ? 'p_clamp' : '')
                            }">
                                ${htmlspecialchars(stripTags(item.description[lang]?item.description[lang] :item.description.en ))}
                            </span>


                            ${item.description.en.length >= 200 ? '<a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>' : ''}
                            <div class="flex_icons_div">
                                <p>${item.media ?(item.media.filter(i => i.collection_name == 'StaticTable2')[0]? '<img src="{{ url('content/images/small_icon/archive-book.png') }}"><span><a class="ref_coloring" href="' + item.media.filter(i => i.collection_name == 'StaticTable2')[0].original_url + '">Reference</a></span>' : '') :""}</p>
                                <p>${item.url ? '<img src="{{ url('content/images/small_icon/global.png') }}"><span><a class="ref_coloring" href="' + item.url[lang] + '">Website</a></span>' : ''}</p>
                            </div>
                        </div>
                    </div>`;
        container.appendChild(card);
    });

    if (((subItems.length / 6) - newPage) < 0) {
        document.getElementById('see_more_bttn').style.display = 'none';
    }

    container.setAttribute('data-page', newPage);
}
</script>
@endsection