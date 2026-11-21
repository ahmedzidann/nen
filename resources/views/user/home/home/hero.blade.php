{{-- Hero: image-only slider (autoplay with a slow zoom, tabs, arrows). STATIC for now: the approved design's 3 slides
     (NEN's own photos from site.nen-global.org + one Unsplash photo). The dashboard's Slider can't hold several Home
     images yet; once it can, build $nxSlides from it. With one image there is no sliding, tabs, counter or arrows. --}}
@php
    $nxLecture = 'https://images.unsplash.com/photo-1758270704763-22072a90d3b6?auto=format&fit=crop&q=80&w=';
    $nxSlides = collect([
        ['img' => $nxSite . 'site/images/tpi-hero.jpg', 'alt' => $t('Official international exams, close to home.', 'اختبارات دولية رسمية بالقرب منك.')],
        ['img' => $nxLecture . '2400', 'srcset' => collect([900, 1400, 1920, 2400])->map(fn ($w) => $nxLecture . $w . ' ' . $w . 'w')->implode(', '),
            'alt' => $t('One network. Global impact.', 'شبكة واحدة. أثر عالمي.')],
        ['img' => $nxSite . 'site/images/verifiy.jpg', 'alt' => $t('Trusted credentials. Secure systems.', 'شهادات موثوقة. أنظمة آمنة.')],
    ]);
    $nxMulti = $nxSlides->count() > 1;
@endphp
<section class="nx nx-hero" id="nx-hero" style="--nx-bg:#0e0f12" data-nx-hero @if ($nxMulti) aria-roledescription="carousel" @endif aria-label="{{ $t('NEN highlights', 'أبرز ما في NEN') }}">
    <div class="nx-hero__slides">
        @foreach ($nxSlides as $i => $s)
            <div class="nx-slide{{ $i === 0 ? ' is-active' : '' }}" data-nx-slide role="group" aria-roledescription="slide" aria-label="{{ $i + 1 }} / {{ $nxSlides->count() }}" @if ($i) aria-hidden="true" @endif>
                <div class="nx-slide__media"><img class="nx-slide__img" src="{{ $s['img'] }}" @if (!empty($s['srcset'])) srcset="{{ $s['srcset'] }}" sizes="100vw" @endif alt="{{ $s['alt'] }}" decoding="async" @if ($i === 0) fetchpriority="high" @endif></div>
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
