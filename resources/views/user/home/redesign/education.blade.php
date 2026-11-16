{{-- Our Education: the dashboard's Education sub-pages as auto-advancing tabs. Image = the page's home image,
     or a design default photo. --}}
@if ($educationPages->count())
    @php
        $nxEdu = $educationPages->values()->map(fn ($page, $i) => [
            'title' => $page->name,
            'text' => $nxText($page->home_description ?? $page->description, 300),
            'url' => url(app()->getLocale() . '/education/' . $page->slug . '?page_id=' . $page->id),
            'img' => $nxMedia($page, 'home_image') ?: $nxPhoto('education', $i),
        ]);
        $nxE0 = $nxEdu[0];
    @endphp
    <section class="nx nx-sec nx-dark nx-education" id="education-section" style="--nx-bg:#990000">
        <div class="container">
            @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $t('Our Education', 'التعليم'), 'dark' => true])
            <div class="nx-edu" data-nx-edu>
                <div class="nx-edu__tabs" role="tablist">
                    @foreach ($nxEdu as $i => $e)
                        <button type="button" role="tab" class="nx-edu__tab{{ $i === 0 ? ' is-active' : '' }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}" data-nx-edu-tab="{{ $i }}"><span class="nx-mono">{{ $nxPad($i + 1) }}</span><span>{{ $e['title'] }}</span><i></i></button>
                    @endforeach
                </div>
                <div class="nx-edu__panel">
                    <div class="nx-edu__media">
                        @foreach ($nxEdu as $i => $e)
                            <img class="nx-edu__img{{ $i === 0 ? ' is-active' : '' }}" src="{{ $e['img'] }}" alt="{{ $e['title'] }}" loading="lazy" decoding="async">
                        @endforeach
                        <span class="nx-edu__scan"></span>
                    </div>
                    <div class="nx-edu__copy">
                        <span class="nx-mono" data-nx-edu-num>01 / {{ $nxPad($nxEdu->count()) }}</span>
                        <h3 data-nx-edu-title>{{ $nxE0['title'] }}</h3>
                        <p data-nx-edu-text @if (!$nxE0['text']) hidden @endif>{{ $nxE0['text'] }}</p>
                        <a class="nx-btn nx-btn--light" href="{{ $nxE0['url'] }}" data-nx-edu-link data-nx-magnetic><span>{{ $t('See More', 'عرض المزيد') }}</span>{!! $nxArrow !!}</a>
                    </div>
                </div>
            </div>
        </div>
        <script type="application/json" id="nx-edu-data">@json($nxEdu)</script>
    </section>
@endif
