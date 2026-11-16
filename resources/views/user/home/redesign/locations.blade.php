{{-- Our Locations: the dotted world map (the same file the old section used as its background) with the dashboard's
     countries in red, the active Find Us centres as cards, and the contact cards from the old template. --}}
@php
    $nxCentres = $countries->filter(fn ($c) => strtolower((string) $c->status) === 'active')->values();
    $nxContacts = [
        ['chat', $t('Chat to sales', 'الدردشة مع المبيعات'), $t('Speak to our friendly team.', 'تحدث مع فريقنا الودود.'), 'sales@nen.com', 'mailto:sales@nen.com'],
        ['mail', $t('Chat to support', 'الدردشة مع الدعم'), $t("We're here to help.", 'نحن هنا للمساعدة.'), 'support@nen.com', 'mailto:support@nen.com'],
        ['pin', $t('Visit us', 'زورنا'), $t('Visit our office HQ.', 'زر مقرنا الرئيسي.'), $t('View on Google Maps', 'عرض على خرائط جوجل'), 'https://goo.gl/maps/'],
        ['phone', $t('Call us', 'اتصل بنا'), $t('Mon-Fri from 8am to 5pm.', 'من الاثنين إلى الجمعة، 8 ص - 5 م.'), '+1 (555) 000-0000', 'tel:+1555000000'],
    ];
@endphp
@if ($networkCountries->count() || $nxCentres->count())
    <section class="nx nx-sec nx-locations" id="join-us-section" style="--nx-bg:#f5f6f8">
        <div class="container">
            @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $t('Our Locations', 'مواقعنا')])
            <div class="nx-map" data-nx-map data-src="https://convenitconsultants.com/wp-content/uploads/2023/12/Map.svg">
                <svg class="nx-map__svg nx-map__dots" viewBox="0 0 858 432" aria-hidden="true"><g data-nx-map-dots></g></svg>
            </div>
            <p class="nx-map__legend"><span><i class="nx-key nx-key--net"></i>{{ $t('Countries in the NEN network', 'دول شبكة NEN') }}</span><span><i class="nx-key"></i>{{ $t('Rest of the world', 'باقي العالم') }}</span></p>
            @if ($nxCentres->count())
                <div class="nx-offices" data-nx-group>
                    @foreach ($nxCentres as $i => $centre)
                        @php $nxCountry = optional(optional($centre->state)->country); @endphp
                        <article class="nx-office" data-nx-item data-nx-tilt>
                            <span class="nx-office__code">@if ($nxCountry->id && ($nxFlag = $nxCountry->getFirstMediaUrl('flag')))<img src="{{ $nxFlag }}" alt="" loading="lazy">@endif</span>
                            <span class="nx-mono">{{ $nxPad($i + 1) }}</span>
                            <h3>{{ $nxCountry->title }}</h3>
                            <p>{{ $centre->name }}@if ($centre->address) · {{ $centre->address }}@endif</p>
                            <i class="nx-glare"></i>
                        </article>
                    @endforeach
                </div>
            @endif
            <div class="nx-contacts" data-nx-group>
                @foreach ($nxContacts as [$ic, $title, $desc, $label, $href])
                    <article class="nx-contact" data-nx-item>{!! $nxIcon($nxIcons[$ic]) !!}<h3>{{ $title }}</h3><p>{{ $desc }}</p><a href="{{ $href }}" class="nx-contact__v" @if (str_starts_with($href, 'http')) target="_blank" rel="noopener" @endif>{{ $label }}</a></article>
                @endforeach
            </div>
        </div>
        <script type="application/json" id="nx-map-data">@json($networkCountries->pluck('title')->values())</script>
    </section>
@endif
