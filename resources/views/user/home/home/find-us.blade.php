{{-- Find Us: one card per Find Us sub-page (Testing Centers, Certified Trainers, ...). Each card shows HOW MANY of
     that service exist (active Find Us entries); choosing a country recounts for that country. Counts are real. --}}
@if ($findusItems->count() > 0)
    @php
        $nxTypes = $findusItems->values();
        $nxTypeIds = $nxTypes->pluck('id')->all();
        $nxZero = array_fill(0, count($nxTypeIds), 0);
        $nxCounts = [];
        foreach ($networkCountries as $c) { $nxCounts[$c->title] = $nxZero; }
        foreach ($countries as $entry) {
            if (strtolower((string) $entry->status) !== 'active') continue;
            $nxCn = optional(optional($entry->state)->country)->title;
            $nxTi = array_search($entry->page_id, $nxTypeIds);
            if ($nxCn === null || $nxTi === false) continue;
            $nxCounts[$nxCn] = $nxCounts[$nxCn] ?? $nxZero;
            $nxCounts[$nxCn][$nxTi]++;
        }
        $nxTotals = array_map(fn ($i) => array_sum(array_column($nxCounts, $i)), array_keys($nxTypeIds));
        $nxFindData = [
            'names' => $nxTypes->pluck('name'),
            'urls' => $nxTypes->map(fn ($p) => url(app()->getLocale() . '/find-us/' . $p->slug . '?page_id=' . $p->id)),
            'counts' => $nxCounts,
            'totals' => $nxTotals,
            'labels' => [
                'in' => $t('in', 'في'), 'network' => $t('across the NEN network', 'في شبكة نين'), 'all' => $t('Across the NEN network', 'في شبكة نين'),
                'pick' => $t('Pick a service to view the list.', 'اختر خدمة لعرض القائمة.'), 'searching' => $t('Searching the NEN network…', 'جارٍ البحث في شبكة نين…'),
            ],
        ];
        $nxFindFallback = ['building', 'users', 'briefcase', 'award', 'cap', 'doc', 'phone'];
    @endphp
    <section class="nx nx-sec nx-sec--find" id="stats-section" style="--nx-bg:#fff">
        <div class="container">
            @include('user.home.home._head', ['n' => ++$nxSec->n, 'title' => $findusParent->name ?? $t('Find Us', 'اعثر علينا'), 'intro' => $findusParent ? $nxText($findusParent->home_description) : ''])
            <div class="nx-find">
                <div class="nx-find__main">
                    @if (count($nxCounts))
                        <label class="nx-select nx-find__country"><span class="nx-mono">{{ $t('Country', 'الدولة') }}</span>
                            <select data-nx-find-country>
                                <option value="">{{ $t('All countries', 'كل الدول') }}</option>
                                @foreach (array_keys($nxCounts) as $nxCountry)
                                    <option value="{{ $nxCountry }}">{{ $nxCountry }}</option>
                                @endforeach
                            </select>
                        </label>
                    @endif
                    <ul class="nx-find__types" role="radiogroup" aria-label="{{ $t('Service', 'الخدمة') }}">
                        @foreach ($nxTypes as $i => $type)
                            @php $nxFIcon = $nxMedia($type, 'icon'); @endphp
                            <li>
                                <button type="button" role="radio" aria-checked="false" data-nx-find-type="{{ $i }}">
                                    <span class="nx-find__ic{{ $nxFIcon ? ' is-img' : '' }}">@if ($nxFIcon)<img src="{{ $nxFIcon }}" alt="" loading="lazy">@else{!! $nxIcon($nxIcons[$nxFindFallback[$i % count($nxFindFallback)]]) !!}@endif</span>
                                    <b class="nx-find__count" data-nx-find-n data-nx-count="{{ $nxTotals[$i] }}">{{ $nxTotals[$i] }}</b>
                                    <span class="nx-find__label" data-nx-find-label>{{ $type->name }}</span>
                                    {!! $nxArrow !!}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="nx-find__result" data-nx-find-result aria-live="polite">
                    <div class="nx-radar"><i></i><i></i><i></i><b></b></div>
                    <h3 data-nx-find-title>{{ $t('Across the NEN network', 'في شبكة نين') }}</h3>
                    <p data-nx-find-msg>{{ $t('Pick a service to view the list.', 'اختر خدمة لعرض القائمة.') }}</p>
                    <a class="nx-btn nx-btn--primary" href="#" data-nx-find-go hidden><span>{{ $t('View the list', 'عرض القائمة') }}</span>{!! $nxArrow !!}</a>
                </div>
            </div>
        </div>
        <script type="application/json" id="nx-find-data">@json($nxFindData)</script>
    </section>
@endif
