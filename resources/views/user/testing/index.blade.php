
@extends('user.layout.master')
@section('parent_page_name')Testing @endsection
@section('page_name'){{$partner->name}} @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')
    <div class="about_content">
        <h1>{{$partner->name}}</h1>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($subPartners as $sub)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                            aria-selected="true">{{$sub->name}}</button>
                    </li>
                @endforeach

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
                            <img src="{{$fs->getFirstMediaUrl('StaticTable')}}" alt="{{$fs->title}}">
                        @endif
                    </div>


                    <div class="ceryifcates_sec">



                            <div class="grid_div_bttn">
                                <div class="grid_div">
                                    @forelse ($items->where('pages_id',$sub->id) as $item)

                                    <div class="card card_styles">
                                        <div class="card_content">
                                            <div class="iso_div">
                                                <div class="size_div">
                                                    <img src="{{$item->getFirstMediaUrl('StaticTable')}}">

                                                </div>

                                                <p>{{$item->title}}</p>
                                            </div>
                                            <div class="iso_titels "  >
                                                <span class="description {{ strlen($item->description)>= 200 ? "p_clamp":''}}">
                                                {{ html_entity_decode(strip_tags($item->description)) }}
                                                </span>


                                                @if (strlen($item->description)>= 200)
                                                    <a  role='btn' onclick="toggleDescription(this)" class="read_more" >{{ TranslationHelper::translateWeb(ucfirst('Read More')??'') }} <i class="bi bi-chevron-down"></i></a>
                                                @endif
                                                <div class="flex_icons_div">
                                                    <p>
                                                        @if ($item->getFirstMediaUrl('StaticTable2'))
                                                        <img src="{{url('content/images/small_icon/archive-book.png')}}"><span><a
                                                            class="ref_coloring"
                                                            href="{{$item->getFirstMediaUrl('StaticTable2')}}">{{ TranslationHelper::translateWeb(ucfirst('Reference')??'') }}</a></span>
                                                        @endif
                                                    </p>
                                                    <p>
                                                        @if ($item->url)
                                                        <img src="{{url('content/images/small_icon/global.png')}}"><span><a
                                                            class="ref_coloring" href="{{$item->url}}">{{ TranslationHelper::translateWeb(ucfirst('Website')??'') }}</a></span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <div style="display: flex; justify-content: center;">
                                            @include('user.layout.includes.no-data')
                                        </div>
                                    @endforelse


                                </div>

                            </div>




                    </div>
                </div>


                @endforeach
            </div>
        </div>
        </div>
    {{-- </div> --}}
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
            var start = page * 2;
            var end = start + 2;
            var newItems = subItems.slice(start, end);
            console.log(items);
            console.log(newItems);

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
                            <span class="description ${ item.description[lang]?(item.description[lang].length >= 200 ? 'p_clamp' : ''):
                                (item.description.en.length >= 200 ? 'p_clamp' : '')
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
