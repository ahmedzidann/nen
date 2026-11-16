{{-- Technology: the dashboard's Technology sub-pages as a list + orbit (desktop) that stay in sync. --}}
@if ($techItems->count() > 0)
    @php
        $nxTech = $techItems->values()->map(fn ($page) => [
            'title' => $page->name,
            'text' => $nxText($page->home_description ?? $page->description, 260),
            'url' => url(app()->getLocale() . '/technology/' . $page->slug . '?page_id=' . $page->id),
        ]);
        $nxT0 = $nxTech[0];
    @endphp
    <section class="nx nx-sec nx-tech" id="technology-section" style="--nx-bg:#f8f8f8">
        <div class="container nx-tech__layout">
            <div>
                @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $techParent->name ?? $t('Technology', 'التكنولوجيا'), 'intro' => $techParent ? $nxText($techParent->home_description) : ''])
                <ol class="nx-tech__list">
                    @foreach ($nxTech as $i => $item)
                        <li><button type="button" class="{{ $i === 0 ? 'is-active' : '' }}" data-nx-tech="{{ $i }}"><span class="nx-mono">{{ $nxPad($i + 1) }}</span>{{ $item['title'] }}{!! $nxArrow !!}</button></li>
                    @endforeach
                </ol>
            </div>
            <div class="nx-orbit" data-nx-orbit>
                <span class="nx-orbit__ring"></span><span class="nx-orbit__ring nx-orbit__ring--2"></span>
                <div class="nx-orbit__core">
                    <span class="nx-mono">NEN {{ $techParent->name ?? 'Technology' }}</span>
                    <strong data-nx-tech-title>{{ $nxT0['title'] }}</strong>
                    <p data-nx-tech-text @if (!$nxT0['text']) hidden @endif>{{ $nxT0['text'] }}</p>
                    <a class="nx-link" href="{{ $nxT0['url'] }}" data-nx-tech-link>{{ $t('Read more', 'اقرأ المزيد') }} {!! $nxArrow !!}</a>
                </div>
                <ul class="nx-orbit__nodes" data-nx-orbit-nodes>
                    @foreach ($nxTech as $i => $item)
                        <li class="nx-orbit__node{{ $i === 0 ? ' is-active' : '' }}" style="--a:{{ round(360 / $nxTech->count() * $i, 2) }}deg" data-nx-node="{{ $i }}"><button type="button"><span>{{ $item['title'] }}</span></button></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <script type="application/json" id="nx-tech-data">@json($nxTech)</script>
    </section>
@endif
