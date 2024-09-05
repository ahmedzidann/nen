@extends('user.layout.master')
@section('parent_page_name')About @endsection
@section('page_name')Partners @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

    <div id="partners-section">
    <div class="texts-data d-flex flex-column align-items-start">
    <h5 class="global-title">
        STRATEGIC PARTNERS
    </h5>
    <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
            </div>
</div>

 <!-- Start Swiper Slider -->
 <div class="award-swiper">
 <div class="tabs-items">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content certificates_h text-start" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php
                    $fs = $items->where('item', 'section-one')
                        ->where('childe_pages_id', $sub->id)
                        ->first();
                @endphp
                <div class="tab-pane fade @if($loop->first) show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                    aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
                    <div class="fs1-1 text-muted pb-3 lh-base text-start">
                        <p>{!! $fs?->description !!}</p>
                    </div>

                    <div class="investors_img">
                        @if ($fs)
                            <img src="{{$fs->getFirstMediaUrl('StaticTable')}}" alt="{{$fs->title}}">
                        @endif
                    </div>

                    <div class="ceryifcates_sec">
                        <div class="texts-data d-flex flex-column align-items-start">
            <h5 class="global-title">
            Our Partners
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" alt="vector">
            </div>
            <p class="fs1-1 text-muted pt-3 lh-base text-start">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>
                        <div class="grid_div_bttn">
                            <div class="grid_div new-card"  id="partners-{{$sub->slug}}" data-page="1">
                                @foreach ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->take(6) as $item)
                                    <div id="cert-box" class="card">
                                        <div class="card_content">
                                            <div class="cert-data">
                                                <div class="image-box">
                                                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                                                </div>
                                                <p class="title-card mt-2">{{$item->title}}</p>
                                                <span class="mt-1">({{$item->years_text}})</span>
                                            </div>
                                            <div>
                                                <span class="description {{ strlen($item->description) >= 200 ? "p_clamp" : ''}}">
                                                    {{ html_entity_decode(strip_tags($item->description)) }}
                                                </span>

                                                @if (strlen($item->description) >= 200)
                                                    <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                                                @endif

                                                <div class="icons-data">
                                                    <p class="icons-item">
                                                        @if ($item->getFirstMediaUrl('StaticTable2'))
                                                            <img src="{{url('content/images/small_icon/archive-book.png')}}">
                                                            <span><a class="ref_coloring" href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        @if ($item->url)
                                                            <img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" href="{{$item->url}}">Website</a></span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->count()>6)
                                <a href="#"  id='see_more_bttn' class="see-more-btn" data-slug="{{$sub->slug}}" onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">
                                    <button class="Btn">
                                    <div class="sign">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </div>
                                    <div class="text">See More</div>
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
    <!-- End Swiper Slider -->

        <div class="tabs_div d-none">
            <ul class="nav nav-pills mb-3 text-start" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content certificates_h text-start" id="pills-tabContent">
                @foreach ($subPartners as $sub)
                @php
                    $fs = $items->where('item', 'section-one')
                        ->where('childe_pages_id', $sub->id)
                        ->first();
                @endphp
                <div class="tab-pane fade @if($loop->first) show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
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
                        <h1>Our Partners</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                        <div class="grid_div_bttn">
                            <div class="grid_div" id="partners-{{$sub->slug}}" data-page="1">
                                @foreach ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->take(6) as $item)
                                    <div class="card card_styles">
                                        <div class="card_content">
                                            <div class="iso_div">
                                                <div class="size_div">
                                                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}">
                                                </div>
                                                <p>{{$item->title}} <span>({{$item->years_text}})</span></p>
                                            </div>
                                            <div class="iso_titels">
                                                <span class="description text-start {{ strlen($item->description) >= 200 ? "p_clamp_2" : ''}}">
                                                    {{ html_entity_decode(strip_tags($item->description)) }}
                                                </span>

                                                @if (strlen($item->description) >= 200)
                                                    <a role='btn' onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>
                                                @endif

                                                <div class="flex_icons_div">
                                                    <p>
                                                        @if ($item->getFirstMediaUrl('StaticTable2'))
                                                            <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a class="ref_coloring" href="{{$item->getFirstMediaUrl('StaticTable2')}}">Reference</a></span>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        @if ($item->url)
                                                            <img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" href="{{$item->url}}">Website</a></span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($items->where('item', 'section-two')->where('childe_pages_id',$sub->id)->count()>6)
                                <a href="#"  id='see_more_bttn' class="see_more_bttn" data-slug="{{$sub->slug}}" onclick="loadMorePartners(event, '{{$sub->slug}}',{{$sub->id}} ,)">See More <span><i class="bi bi-chevron-down"></i></span></a>
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
            return str.replace(/[&<>"']/g, function(m) { return map[m]; });
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

            return str.replace(/[&<>"']/g, function(m) { return map[m]; });
            }

        function loadMorePartners(event, slug, slug_id, lang) {

            event.preventDefault();
            var container = document.getElementById('partners-' + slug);
            var page = parseInt(container.getAttribute('data-page'));
            var newPage = page + 1;

            // Fetching items through a data attribute (ensure items are available globally in the blade)
            var items = @json($items->where('item', 'section-two')->values());
            var subItems = items.filter(item => item.childe_pages_id == slug_id)
            var start = page * 6;
            var end = start + 6;
            var newItems = subItems.slice(start, end);
            console.log();

            // console.log(newItems);

            //.getFirstMediaUrl('StaticTable')
            
            newItems.forEach(item => {
                var card = document.createElement('div');
                card.className = 'card card_styles';
                card.innerHTML = `
                    <div class="card_content">
                        <div class="iso_div">
                            <div class="size_div">
                                <img src="${item.media ?(item.media.filter(i => i.collection_name == 'StaticTable')[0]? item.media.filter(i => i.collection_name == 'StaticTable')[0].original_url : ""):""}">

                            </div>
                            <p>${item.title[lang]?item.title[lang] :item.title.en} <span>(${item.years_text[lang]?item.years_text[lang] : item.years_text.en})</span></p>
                        </div>
                        <div class="iso_titels">
                            <span class="description ${ item.description[lang]?(item.description[lang].length >= 200 ? 'p_clamp_2' : ''):
                                (item.description.en.length >= 200 ? 'p_clamp_2' : '')
                            }">
                                ${htmlspecialchars(stripTags(item.description[lang]?item.description[lang] :item.description.en ))}
                            </span>


                            ${item.description.en.length >= 200 ? '<a role="btn" onclick="toggleDescription(this)" class="read_more">Read More <i class="bi bi-chevron-down"></i></a>' : ''}
                            <div class="flex_icons_div">
                                <p>${item.media ?(item.media.filter(i => i.collection_name == 'StaticTable2')[0]? '<img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a class="ref_coloring" href="' + item.media.filter(i => i.collection_name == 'StaticTable2')[0].original_url + '">Reference</a></span>' : '') :""}</p>
                                <p>${item.url ? '<img src="{{url('content/images/small_icon/global.png')}}"><span><a class="ref_coloring" href="' + item.url[lang] + '">Website</a></span>' : ''}</p>
                            </div>
                        </div>
                    </div>`;
                container.appendChild(card);
            });

            
            if(((subItems.length / 6) - newPage)<0){
                document.getElementById('see_more_bttn').style.display = 'none';
            }

            container.setAttribute('data-page', newPage);
        }
    </script>
@endsection
