{{-- Our Solutions: the dashboard's solutions "show in home", grouped by their page (e.g. Education / Business):
     a segmented toggle per group and expanding image panels. --}}
@if (count($solutions) > 0)
    @php $nxSolGroups = $solutions->values(); @endphp
    <section class="nx nx-sec nx-solutions" id="solutions-section" style="--nx-bg:#fff">
        <div class="container">
            @php
                $nxSeg = '';
                if ($nxSolGroups->count() > 1) {
                    $nxSeg = '<div class="nx-seg" role="tablist" data-nx-seg>';
                    foreach ($nxSolGroups as $gi => $group) {
                        $nxSeg .= '<button type="button" role="tab" aria-selected="' . ($gi === 0 ? 'true' : 'false') . '" data-nx-sol-tab="' . $gi . '">' . e($group->first()->Page->name ?? '') . '</button>';
                    }
                    $nxSeg .= '<i class="nx-seg__pill"></i></div>';
                }
            @endphp
            @include('user.home.redesign._head', [
                'n' => ++$nxSec->n,
                'title' => $t('Our Solutions', 'حلولنا'),
                'intro' => $t("Explore our innovative solutions tailored for the education and business sectors. We're here to support your growth and success.", 'اكتشف حلولنا المبتكرة المصممة لقطاعي التعليم والأعمال. نحن هنا لدعم نموك ونجاحك.'),
                'extra' => $nxSeg,
            ])
            @foreach ($nxSolGroups as $gi => $group)
                @php $nxGPage = $group->first()->Page; @endphp
                <div class="nx-plat nx-plat--logos{{ $gi === 0 ? ' is-active' : '' }}" data-nx-plat="{{ $gi }}">
                    @foreach ($group as $i => $solution)
                        @php $nxSImg = $nxMedia($solution, 'Solution') ?: asset('content/images/logo.svg'); @endphp
                        <article class="nx-plat__panel{{ $i === 0 ? ' is-open' : '' }}" tabindex="0" data-nx-panel>
                            <img class="nx-plat__img" src="{{ $nxSImg }}" alt="{{ $solution->title }}" loading="lazy" decoding="async">
                            <span class="nx-plat__label"><span class="nx-mono">{{ $nxPad($i + 1) }}</span>{{ $solution->title }}</span>
                            <div class="nx-plat__body">
                                <span class="nx-mono">{{ $nxGPage->name ?? '' }} · {{ $nxPad($i + 1) }}</span>
                                <h3>{{ $solution->title }}</h3>
                                @if ($nxSText = $nxText($solution->home_description ?? $solution->description, 160))<p>{{ $nxSText }}</p>@endif
                            </div>
                        </article>
                    @endforeach
                    @if ($nxGPage)
                        <a class="nx-plat__more" href="{{ url(app()->getLocale() . '/solutions/' . $nxGPage->slug . '/' . $nxGPage->id . '?solution_id=' . $group->first()->id) }}">
                            <span class="nx-mono">{{ $nxGPage->name }}</span><b>{{ $t('Show More', 'عرض المزيد') }}</b>{!! $nxArrow !!}
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endif
