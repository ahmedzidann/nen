{{-- Testing: the dashboard's Testing sub-pages as linked cards (icon, title, description), plus the note
     (the Testing page's description, or the old template's default note). --}}
@if ($testingItems->count() > 0)
    <section class="nx nx-sec nx-sec--testing" id="check-section" style="--nx-bg:#fff">
        <div class="container">
            @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $testingParent->name ?? $t('Testing', 'الاختبارات'), 'intro' => $testingParent ? $nxText($testingParent->home_description) : ''])
            <ul class="nx-tcards" data-nx-group>
                @foreach ($testingItems as $i => $item)
                    @php
                        $nxTIcon = $nxMedia($item, 'icon');
                        $nxTText = $nxText($item->home_description ?? $item->description, 150);
                    @endphp
                    <li data-nx-item>
                        <a class="nx-tcard" href="{{ url(app()->getLocale() . '/testing/' . $item->slug . '?page_id=' . $item->id) }}">
                            <span class="nx-tcard__top">
                                <span class="nx-tcard__ic{{ $nxTIcon ? ' is-img' : '' }}">@if ($nxTIcon)<img src="{{ $nxTIcon }}" alt="" loading="lazy">@else{!! $nxIcon($nxIcons['check']) !!}@endif</span>
                                <span class="nx-mono">{{ $nxPad($i + 1) }} / {{ $nxPad($testingItems->count()) }}</span>
                            </span>
                            <b class="nx-tcard__title">{{ $item->name }}</b>
                            @if ($nxTText)<span class="nx-tcard__text">{{ $nxTText }}</span>@endif
                            <span class="nx-tcard__more">{{ $t('Learn more', 'اعرف المزيد') }} {!! $nxArrow !!}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <aside class="nx-note" data-nx-reveal>
                <span class="nx-note__tag nx-mono">{{ $t('Note', 'ملاحظة') }}</span>
                <p>{{ ($testingParent && $nxText($testingParent->description)) ? $nxText($testingParent->description) : $t('In case of technical problems or power cuts, the test will be resumed where it stopped while safely keeping the remaining time, and test takers are not allowed to leave the room unless they have waited for at least 30 minutes. Then the proctor will fill out the status report and then the test taker shall decide whether to resume the test or repeat.', 'في حال حدوث مشكلات تقنية أو انقطاع الكهرباء، يُستأنف الاختبار من حيث توقف مع الحفاظ على الوقت المتبقي، ولا يُسمح للمتقدمين بمغادرة القاعة إلا بعد الانتظار 30 دقيقة على الأقل. بعد ذلك يملأ المراقب تقرير الحالة، ثم يقرر المتقدم استئناف الاختبار أو إعادته.') }}</p>
            </aside>
        </div>
    </section>
@endif
