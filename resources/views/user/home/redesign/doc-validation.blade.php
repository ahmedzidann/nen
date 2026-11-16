{{-- Doc Validation: the dashboard's Home Doc Validation (title, description, steps = items with their details,
     button). Desktop: pinned scroll story; the certificate on the right is an illustration of the check. --}}
@if ($homeDocValidation)
    @php $nxDocItems = $homeDocValidation->items->values(); @endphp
    <section class="nx nx-sec nx-doc" id="doc-validation-section" style="--nx-bg:#f5f6f8">
        <div class="nx-pin" data-nx-verify>
            <div class="container nx-doc__layout">
                <div class="nx-doc__copy">
                    @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $nxText($homeDocValidation->title), 'intro' => $nxText($homeDocValidation->description)])
                    @if ($nxDocItems->count())
                        <ol class="nx-steps">
                            @foreach ($nxDocItems as $i => $item)
                                <li class="nx-step{{ $i === 0 ? ' is-active' : '' }}">
                                    <span class="nx-mono">{{ $nxPad($i + 1) }}</span>
                                    <div>
                                        <h3>{{ $item->title }}</h3>
                                        @if ($item->details->count())<p>{{ $item->details->pluck('title')->map(fn ($d) => rtrim(trim((string) $d), '.'))->filter()->implode(' · ') }}</p>@endif
                                    </div>
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
                        <div class="nx-cert__upload" data-nx-upload-row><span class="nx-mono">Uploading · encrypted channel</span><span class="nx-cert__bar"><i data-nx-upload></i></span></div>
                        <div class="nx-cert__head"><img src="{{ asset('content/images/logo.svg') }}" alt="" class="nx-cert__logo"><span class="nx-mono">NEN-2026-04817</span></div>
                        <p class="nx-mono nx-cert__kicker">Certificate of achievement</p>
                        <p class="nx-cert__name">Sample Candidate</p>
                        <dl class="nx-cert__fields">
                            <div class="nx-field" data-nx-field><dt>Exam</dt><dd><span data-nx-scramble="TOEFL iBT®">TOEFL iBT®</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>Score</dt><dd><span data-nx-scramble="102 / 120">102 / 120</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>Issued</dt><dd><span data-nx-scramble="2026-03-14">2026-03-14</span><i class="nx-tick"></i></dd></div>
                            <div class="nx-field" data-nx-field><dt>Issuer record</dt><dd><span data-nx-scramble="Matched">Matched</span><i class="nx-tick"></i></dd></div>
                        </dl>
                        <div class="nx-cert__foot nx-mono"><span>Record match <b data-nx-match>100%</b></span><span>SHA-256 · <span data-nx-hash>7f3a9c4e…e21b</span></span></div>
                        <div class="nx-cert__scan" data-nx-scan></div>
                        <div class="nx-cert__stamp" data-nx-stamp>{!! $nxIcon($nxIcons['shield']) !!}<span>Verified</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
