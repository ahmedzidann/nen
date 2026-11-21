{{-- Our Locations: the dotted world map (the same file the old section used as its background) with the dashboard's
     countries in red. The tabs above it are the dashboard's Contact Us office types (Regional Offices / Authorized
     Offices / Regional Representatives, as on the Contact page): the active tab's offices are pinned on the map with
     tags (placed by nx.js, linked to Cairo) and listed as cards below; a pin and its cards highlight each other.
     The contact cards at the end are from the old template. --}}
@php
    $nxOfficeTypes = collect([
        1 => ['regional-offices', $t('Regional Offices', 'المكاتب الإقليمية'), $t('Regional office', 'مكتب إقليمي')],
        2 => ['authorized-offices', $t('Authorized Offices', 'المكاتب المعتمدة'), $t('Authorized office', 'مكتب معتمد')],
        3 => ['regional-representatives', $t('Regional Representatives', 'الممثلون الإقليميون'), $t('Representative', 'ممثل')],
    ])->filter(fn ($v, $type) => $contactOffices->where('type', $type)->isNotEmpty());
    $nxActiveType = $nxOfficeTypes->keys()->first();
    $nxEn = fn ($m, $field) => $m ? trim((string) $m->getTranslation($field, 'en', true)) : '';
    $nxTime = fn ($v) => $v ? \Illuminate\Support\Carbon::parse($v)->format('H:i') : null;
    $nxContacts = [
        ['chat', $t('Chat to sales', 'الدردشة مع المبيعات'), $t('Speak to our friendly team.', 'تحدث مع فريقنا الودود.'), 'sales@nen.com', 'mailto:sales@nen.com'],
        ['mail', $t('Chat to support', 'الدردشة مع الدعم'), $t("We're here to help.", 'نحن هنا للمساعدة.'), 'support@nen.com', 'mailto:support@nen.com'],
        ['pin', $t('Visit us', 'زورنا'), $t('Visit our office HQ.', 'زر مقرنا الرئيسي.'), $t('View on Google Maps', 'عرض على خرائط جوجل'), 'https://goo.gl/maps/'],
        ['phone', $t('Call us', 'اتصل بنا'), $t('Mon-Fri from 8am to 5pm.', 'من الاثنين إلى الجمعة، 8 ص - 5 م.'), '+1 (555) 000-0000', 'tel:+1555000000'],
    ];
@endphp
@if ($networkCountries->count() || $nxOfficeTypes->count())
    <section class="nx nx-sec nx-locations" id="join-us-section" style="--nx-bg:#f5f6f8">
        <div class="container">
            @include('user.home.home._head', ['n' => ++$nxSec->n, 'title' => $t('Our Locations', 'مواقعنا'),
                'intro' => $nxOfficeTypes->count() ? $t("NEN's regional offices, authorized offices and representatives across its network. Choose a type to see them on the map.", 'المكاتب الإقليمية والمكاتب المعتمدة وممثلو نين عبر شبكتها. اختر النوع لتراهم على الخريطة.') : ''])
            @if ($nxOfficeTypes->count() > 1)
                <ul class="nx-chips" role="tablist" aria-label="{{ $t('Location type', 'نوع الموقع') }}">
                    @foreach ($nxOfficeTypes as $type => [$slug, $label])
                        <li role="presentation"><button type="button" role="tab" class="{{ $type === $nxActiveType ? 'is-active' : '' }}" aria-selected="{{ $type === $nxActiveType ? 'true' : 'false' }}" data-nx-loc-tab="{{ $type }}">{{ $label }}<span class="nx-chips__n">{{ $contactOffices->where('type', $type)->count() }}</span></button></li>
                    @endforeach
                </ul>
            @endif
            <div class="nx-map" data-nx-map data-src="{{ asset('content/home/world-map-dots.json') }}?v={{ $nxVer('content/home/world-map-dots.json') }}">
                <svg class="nx-map__svg nx-map__dots" viewBox="0 0 858 432" aria-hidden="true"><g data-nx-map-dots></g></svg>
                <svg class="nx-map__svg nx-map__routes" viewBox="0 0 858 432" aria-hidden="true"><g data-nx-map-arcs></g></svg>
                <ol class="nx-map__pins" data-nx-map-pins aria-hidden="true"></ol>
            </div>
            <p class="nx-map__legend">
                @if ($nxOfficeTypes->count())<span><i class="nx-key nx-key--office"></i>{{ $t('Offices & representatives', 'المكاتب والممثلون') }}</span>@endif
                <span><i class="nx-key nx-key--net"></i>{{ $t('Countries in the NEN network', 'دول شبكة نين') }}</span><span><i class="nx-key"></i>{{ $t('Rest of the world', 'باقي العالم') }}</span>
            </p>
            @if ($nxOfficeTypes->count())
                <div class="nx-offices" data-nx-group>
                    @foreach ($nxOfficeTypes as $type => [$slug, $label, $nxOne])
                        @foreach ($contactOffices->where('type', $type)->values() as $i => $office)
                            @php
                                $nxCountry = $office->country;
                                $nxFlag = $nxCountry ? $nxCountry->getFirstMediaUrl('flag') : '';
                                $nxWho = trim((string) $office->name);
                                $nxAddr = trim((string) $office->address);
                                $nxPhone = trim(preg_replace('/\s+/', ' ', (string) $office->phone));
                                // the phone field is not translatable: its labels are translated here for the Arabic page
                                if (app()->getLocale() === 'ar') $nxPhone = preg_replace(['/\bLand\s*Line\b/i', '/\bCall\s*Cent(er|re|e)\b/i', '/\bOperation\s*Team\b/i'], ['هاتف أرضي', 'مركز الاتصال', 'فريق العمليات'], $nxPhone);
                                $nxFrom = $nxTime($office->from_at); $nxTo = $nxTime($office->to_at);
                            @endphp
                            <article class="nx-office" data-nx-item data-nx-tilt data-nx-office data-type="{{ $type }}"
                                data-country="{{ $nxEn($nxCountry, 'title') }}" data-address="{{ $nxEn($office, 'address') }}" data-who="{{ $nxWho }}" data-one="{{ $nxOne }}"
                                @if ($office->lat && $office->lng) data-lat="{{ (float) $office->lat }}" data-lng="{{ (float) $office->lng }}" @endif
                                @if ($type !== $nxActiveType) hidden @endif>
                                <span class="nx-office__code">@if ($nxFlag)<img src="{{ $nxFlag }}" alt="" loading="lazy">@endif</span>
                                <span class="nx-mono">{{ $nxPad($i + 1) }}</span>
                                <h3>{{ $nxCountry ? $nxCountry->title : $label }}</h3>
                                @if ($nxWho)<p class="nx-office__who">{{ $nxWho }}</p>@endif
                                @if ($nxAddr)<p>{{ $nxAddr }}</p>@endif
                                @if ($nxPhone || ($nxFrom && $nxTo))
                                    <p class="nx-office__meta">
                                        @if ($nxPhone)<span dir="auto">{{ $nxPhone }}</span>@endif
                                        @if ($nxFrom && $nxTo)<span class="nx-mono" dir="ltr">{{ $nxFrom }} – {{ $nxTo }}</span>@endif
                                    </p>
                                @endif
                                <a href="{{ route('contact-us', ['contact_offices' => $slug]) }}" class="nx-link">{{ $t('Contact now', 'تواصل الآن') }} {!! $nxArrow !!}</a>
                                <i class="nx-glare"></i>
                            </article>
                        @endforeach
                    @endforeach
                </div>
            @endif
            <div class="nx-contacts" data-nx-group>
                @foreach ($nxContacts as [$ic, $title, $desc, $label, $href])
                    <article class="nx-contact" data-nx-item>{!! $nxIcon($nxIcons[$ic]) !!}<h3>{{ $title }}</h3><p>{{ $desc }}</p><a href="{{ $href }}" class="nx-contact__v" @if (str_starts_with($href, 'http')) target="_blank" rel="noopener" @endif>{{ $label }}</a></article>
                @endforeach
            </div>
        </div>
        <script type="application/json" id="nx-map-data">@json($networkCountries->map(fn ($c) => $nxEn($c, 'title'))->values()){{-- English names: the map matches countries by name --}}</script>
    </section>
@endif
