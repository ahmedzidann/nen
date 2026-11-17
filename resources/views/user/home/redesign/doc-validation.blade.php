{{-- Doc Validation: the dashboard's Home Doc Validation: title, description, then the steps (each item = a title
     with its details listed under it) and the button. The page scrolls normally: hovering or clicking a step plays
     the certificate check on the right to that step (upload → scan → decode → verified). --}}
@if ($homeDocValidation)
    @php $nxDocItems = $homeDocValidation->items->values(); @endphp
    <section class="nx nx-sec nx-doc" id="doc-validation-section" style="--nx-bg:#f5f6f8">
        <div data-nx-verify>
            <div class="container nx-doc__layout">
                <div class="nx-doc__copy">
                    @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $nxText($homeDocValidation->title), 'intro' => $nxText($homeDocValidation->description)])
                    @if ($nxDocItems->count())
                        <ol class="nx-steps">
                            @foreach ($nxDocItems as $i => $item)
                                @php $nxDetails = $item->details->pluck('title')->map(fn ($d) => trim((string) $d))->filter()->values(); @endphp
                                <li class="nx-step{{ $i === 0 ? ' is-active' : '' }}" data-nx-step>
                                    <button type="button" class="nx-step__btn" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                                        <span class="nx-step__num nx-mono">{{ $nxPad($i + 1) }}</span>
                                        <h3>{{ $item->title }}</h3>
                                    </button>
                                    @if ($nxDetails->count())
                                        <ul class="nx-step__list">
                                            @foreach ($nxDetails as $nxDetail)
                                                <li>{{ $nxDetail }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                        <div class="nx-doc__progress"><i data-nx-verify-progress></i></div>
                    @endif
                    @if ($homeDocValidation->button_url)
                        <a class="nx-btn nx-btn--primary nx-doc__btn" href="{{ $homeDocValidation->button_url }}" target="_blank" rel="noopener" data-nx-magnetic><span>{{ $homeDocValidation->button_text ? \Illuminate\Support\Str::ucfirst($homeDocValidation->button_text) : $t('See More', 'عرض المزيد') }}</span>{!! $nxArrow !!}</a>
                    @endif
                </div>
                <div class="nx-doc__stage" aria-hidden="true">
                    <div class="nx-cert" data-nx-doc>
                        <div class="nx-cert__upload" data-nx-upload-row><span class="nx-mono">{{ $t('Uploading · encrypted channel', 'جارٍ الرفع · قناة مشفّرة') }}</span><span class="nx-cert__bar"><i data-nx-upload></i></span></div>
                        <div class="nx-cert__head"><img src="{{ asset('content/images/logo.svg') }}" alt="" class="nx-cert__logo"><span class="nx-mono" dir="ltr">NEN-2026-04817</span></div>
                        <p class="nx-mono nx-cert__kicker">{{ $t('Certificate of achievement', 'شهادة إنجاز') }}</p>
                        <p class="nx-cert__name">{{ $t('Sample Candidate', 'اسم المتقدّم') }}</p>
                        @php $nxMatched = $t('Matched', 'مطابق'); @endphp
                        <dl class="nx-cert__fields">
                            <div class="nx-field" data-nx-field><dt>{{ $t('Exam', 'الاختبار') }}</dt><dd><span data-nx-scramble="TOEFL iBT®" dir="ltr">TOEFL iBT®</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>{{ $t('Score', 'الدرجة') }}</dt><dd><span data-nx-scramble="102 / 120" dir="ltr">102 / 120</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>{{ $t('Issued', 'تاريخ الإصدار') }}</dt><dd><span data-nx-scramble="2026-03-14" dir="ltr">2026-03-14</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>{{ $t('Issuer record', 'سجل جهة الإصدار') }}</dt><dd><span data-nx-scramble="{{ $nxMatched }}">{{ $nxMatched }}</span><i class="nx-tick"></i></dd></div>
                        </dl>
                        <div class="nx-cert__foot nx-mono"><span>{{ $t('Record match', 'تطابق السجل') }} <b data-nx-match>100%</b></span><span dir="ltr">SHA-256 · <span data-nx-hash>7f3a9c4e…e21b</span></span></div>
                        <div class="nx-cert__scan" data-nx-scan></div>
                        <div class="nx-cert__stamp" data-nx-stamp>{!! $nxIcon($nxIcons['shield']) !!}<span>{{ $t('Verified', 'تم التحقق') }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
