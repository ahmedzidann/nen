{{-- Features & Advantages: the dashboard's description + figures (value, label) as a photo bento with a cursor spotlight. --}}
@if ($feature && $feature->files->count())
    @php
        $nxFigs = $feature->files->take(8)->values();
        $nxFigIcons = ['years', 'globe', 'bulb', 'building', 'users', 'spark', 'award', 'check'];
        $nxLead = $nxText($feature->description);
    @endphp
    <section class="nx nx-sec nx-features" id="features-section" style="--nx-bg:#fff">
        <div class="container">
            <div class="nx-fhead">
                @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $t('Features & Advantages', 'المميزات والمزايا')])
                @if ($nxLead)
                    <p class="nx-lead" data-nx-scrub>{{ $nxLead }}</p>
                @endif
            </div>
            <div class="nx-bento" data-nx-spotlight data-nx-group>
                @foreach ($nxFigs as $i => $fig)
                    @php
                        $nxVal = trim((string) $fig->title);
                        $nxNum = preg_match('/^(\d+)(.*)$/u', $nxVal, $nxM) ? $nxM : null;
                        $nxMod = $i === 0 ? ' nx-card--feature' : ($i === $nxFigs->count() - 1 && $i > 0 ? ' nx-card--wide' : '');
                    @endphp
                    <article class="nx-card{{ $nxMod }}" data-nx-item>
                        <div class="nx-card__media"><img src="{{ $nxPhoto('features', $i) }}" alt="" loading="lazy" decoding="async"></div>
                        <div class="nx-card__top">{!! $nxIcon($nxIcons[$nxFigIcons[$i % 8]]) !!}<span class="nx-mono">{{ $nxPad($i + 1) }} / {{ $nxPad($nxFigs->count()) }}</span></div>
                        <div class="nx-card__body">
                            <b class="nx-card__num" @if ($nxNum) data-nx-count="{{ $nxNum[1] }}" data-nx-suffix="{{ $nxNum[2] }}" @endif>{{ $nxVal }}</b>
                            <h3 class="nx-card__title">{{ \Illuminate\Support\Str::ucfirst((string) $fig->sub_title) }}</h3>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
