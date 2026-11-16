{{-- Join Us: the dashboard's Join Us page and its sub-pages as opening panels. Image = the page's home image,
     or a design default photo. --}}
@if ($joinUs && $joinUs->cards->count())
    @php $nxJoinIcons = ['star', 'cap', 'briefcase', 'building', 'handshake']; $nxJn = $joinUs->cards->count(); @endphp
    <section class="nx nx-sec nx-join" id="join-our-team" style="--nx-bg:#f5f6f8">
        <div class="container">
            @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $joinUs->page->name, 'intro' => $nxText($joinUs->page->description)])
            <div class="nx-plat nx-plat--join is-active" data-nx-join>
                @foreach ($joinUs->cards->values() as $i => $card)
                    @php
                        $nxJText = $nxText($card->description, 160);
                        $nxJUrl = \Illuminate\Support\Facades\Route::has('join-us') ? route('join-us', $card->id) : '#';
                    @endphp
                    <article class="nx-plat__panel{{ $i === 0 ? ' is-open' : '' }}" tabindex="0" data-nx-jpanel>
                        <img class="nx-plat__img" src="{{ $nxMedia($card, 'home_image') ?: $nxPhoto('join', $i) }}" alt="{{ $card->name }}" loading="lazy" decoding="async">
                        <span class="nx-plat__num" aria-hidden="true">{{ $nxPad($i + 1) }}</span>
                        <span class="nx-plat__label"><span class="nx-mono">{{ $nxPad($i + 1) }}</span>{{ $card->name }}</span>
                        <div class="nx-plat__body">
                            {!! $nxIcon($nxIcons[$nxJoinIcons[$i % 5]]) !!}
                            <span class="nx-mono">{{ $joinUs->page->name }} · {{ $nxPad($i + 1) }} / {{ $nxPad($nxJn) }}</span>
                            <h3>{{ $card->name }}</h3>
                            @if ($nxJText)<p>{{ $nxJText }}</p>@endif
                            <a class="nx-btn nx-btn--light" href="{{ $nxJUrl }}" data-nx-magnetic><span>{{ $t('Join now', 'انضم الآن') }}</span>{!! $nxArrow !!}</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
