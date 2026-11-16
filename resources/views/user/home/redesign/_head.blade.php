{{-- Section heading: running number + the site's title vector, big masked title, optional intro. --}}
<div class="nx-head">
    <p class="nx-label" data-nx-reveal><span class="nx-label__n">{{ str_pad((string) $n, 2, '0', STR_PAD_LEFT) }}</span><img src="{{ asset('content/images/vector-title.svg') }}" alt="" class="nx-label__v{{ !empty($dark) ? ' is-inverted' : '' }}"></p>
    <h2 class="nx-title" data-nx-split>{{ $title }}</h2>
    @if (!empty($intro))
        <p class="nx-intro" data-nx-reveal>{{ $intro }}</p>
    @endif
    {!! $extra ?? '' !!}
</div>
