{{-- Hero: image-only slider. Slides = the dashboard's active Slider entries for the Home page;
     with none, the Home page cover image is shown as a single banner. --}}
@php
    $nxSlides = $heroSlides->map(fn ($s) => ['img' => $s->getFirstMediaUrl('image'), 'alt' => $nxText($s->title)])
        ->filter(fn ($s) => $s['img'])->values();
    if ($nxSlides->isEmpty()) {
        $nxCover = $home ? $home->getFirstMediaUrl('icon') : '';
        $nxSlides = collect([['img' => $nxCover ?: asset('content/images/pages/home-page/hero-home-page.webp'), 'alt' => $home->name ?? 'NEN']]);
    }
    $nxMulti = $nxSlides->count() > 1;
@endphp
<section class="nx nx-hero" id="nx-hero" style="--nx-bg:#0e0f12" data-nx-hero @if ($nxMulti) aria-roledescription="carousel" @endif aria-label="{{ $t('NEN highlights', 'أبرز ما في NEN') }}">
    <div class="nx-hero__slides">
        @foreach ($nxSlides as $i => $s)
            <div class="nx-slide{{ $i === 0 ? ' is-active' : '' }}" data-nx-slide role="group" aria-roledescription="slide" aria-label="{{ $i + 1 }} / {{ $nxSlides->count() }}" @if ($i) aria-hidden="true" @endif>
                <div class="nx-slide__media"><img class="nx-slide__img" src="{{ $s['img'] }}" alt="{{ $s['alt'] }}" decoding="async" @if ($i === 0) fetchpriority="high" @endif></div>
            </div>
        @endforeach
    </div>
    @if ($nxMulti)
        <div class="container nx-hero__ui">
            <div class="nx-hero__tabs" role="tablist" aria-label="{{ $t('Choose a slide', 'اختر شريحة') }}">
                @foreach ($nxSlides as $i => $s)
                    <button type="button" role="tab" class="nx-hero__tab{{ $i === 0 ? ' is-active' : '' }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}" aria-label="{{ $t('Slide', 'شريحة') }} {{ $i + 1 }}" data-nx-hero-tab="{{ $i }}"><span class="nx-mono">{{ $nxPad($i + 1) }}</span><i class="nx-hero__bar"></i></button>
                @endforeach
            </div>
            <div class="nx-hero__nav">
                <span class="nx-mono"><b data-nx-hero-count>01</b> / {{ $nxPad($nxSlides->count()) }}</span>
                <button type="button" class="nx-hero__arrow" data-nx-hero-prev aria-label="{{ $t('Previous slide', 'الشريحة السابقة') }}">{!! $nxArrow !!}</button>
                <button type="button" class="nx-hero__arrow" data-nx-hero-next aria-label="{{ $t('Next slide', 'الشريحة التالية') }}">{!! $nxArrow !!}</button>
            </div>
        </div>
    @endif
</section>
