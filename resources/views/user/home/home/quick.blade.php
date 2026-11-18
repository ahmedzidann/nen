{{-- Quick access: the dashboard's upper Sidebar Resources, as cards overlapping the bottom of the hero. --}}
@if ($upperDidebarResources->count())
    <nav class="nx nx-quick" aria-label="{{ $t('Quick access', 'وصول سريع') }}">
        <div class="container">
            <ul class="nx-quick__grid">
                @foreach ($upperDidebarResources as $resource)
                    @php $nxQTitle = $nxAr ? $resource->title : \Illuminate\Support\Str::title(mb_strtolower((string) $resource->title)); @endphp
                    <li>
                        <a class="nx-quick__card" href="{{ $resource->url ?: '#' }}">
                            <span class="nx-quick__ic">
                                @if ($resource->resource)
                                    <img src="{{ asset('/storage/' . $resource->resource) }}" alt="" loading="lazy">
                                @else
                                    {!! $nxIcon($nxIcons['star']) !!}
                                @endif
                            </span>
                            <span class="nx-quick__txt"><b>{{ $nxQTitle }}</b>@if ($resource->sub_title)<span>{{ $resource->sub_title }}</span>@endif</span>
                            {!! $nxArrow !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
@endif
