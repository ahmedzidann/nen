{{-- Doc Validation: the dashboard's Home Doc Validation: title, description, the steps (their titles) and the button.
     The animated document on the right has one view per step: the step's title, with the step's details (its sub-titles)
     as the rows under it. Hovering, clicking or focusing a step switches the document to that step's view and runs its
     check: scan, the rows ticked one by one, record match 0→100%, then the Verified stamp. The page scrolls normally.
     (The details are not repeated under the steps on the left for now: they show in the document.) --}}
@if ($homeDocValidation)
    @php
        $nxDocItems = $homeDocValidation->items->values();
        $nxDetailsOf = fn ($item) => $item->details->pluck('title')->map(fn ($d) => trim((string) $d))->filter()->values();
    @endphp
    <section class="nx nx-sec nx-doc" id="doc-validation-section" style="--nx-bg:#f5f6f8">
        <div data-nx-verify>
            <div class="container nx-doc__layout">
                <div class="nx-doc__copy">
                    @include('user.home.home._head', ['n' => ++$nxSec->n, 'title' => $nxText($homeDocValidation->title), 'intro' => $nxText($homeDocValidation->description)])
                    @if ($nxDocItems->count())
                        <ol class="nx-steps">
                            @foreach ($nxDocItems as $i => $item)
                                <li class="nx-step{{ $i === 0 ? ' is-active' : '' }}" data-nx-step>
                                    <button type="button" class="nx-step__btn" aria-pressed="{{ $i === 0 ? 'true' : 'false' }}">
                                        <span class="nx-step__num nx-mono">{{ $nxPad($i + 1) }}</span>
                                        <h3>{{ $item->title }}</h3>
                                    </button>
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
                        <div class="nx-cert__head"><img src="{{ asset('content/images/logo.svg') }}" alt="" class="nx-cert__logo"><span class="nx-mono" dir="ltr">{{ $t('NEN', 'نين') }}-2026-04817</span></div>
                        @if ($nxDocItems->count())
                            {{-- one view per step (all stacked in the same spot, the active one shown): its title + its details --}}
                            <div class="nx-cert__views">
                                @foreach ($nxDocItems as $i => $item)
                                    @php $nxDetails = $nxDetailsOf($item); @endphp
                                    <div class="nx-cert__view{{ $i === 0 ? ' is-active' : '' }}" data-nx-view>
                                        <p class="nx-mono nx-cert__kicker">{{ $t('Step', 'الخطوة') }} {{ $nxPad($i + 1) }} / {{ $nxPad($nxDocItems->count()) }}</p>
                                        <p class="nx-cert__name">{{ $item->title }}</p>
                                        @if ($nxDetails->count())
                                            <ol class="nx-vrows">
                                                @foreach ($nxDetails as $k => $nxDetail)
                                                    <li class="nx-vrow" data-nx-row><span class="nx-vrow__n nx-mono">{{ $nxPad($k + 1) }}</span><b>{{ $nxDetail }}</b><i class="nx-tick"></i></li>
                                                @endforeach
                                            </ol>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="nx-cert__foot nx-mono"><span>{{ $t('Record match', 'تطابق السجل') }} <b data-nx-match>100%</b></span><span>{{ $t('SHA-256', 'البصمة') }} · <span data-nx-hash dir="ltr">7039 4481…2158</span></span></div>
                        <div class="nx-cert__scan" data-nx-scan></div>
                        <div class="nx-cert__stamp" data-nx-stamp>{!! $nxIcon($nxIcons['shield']) !!}<span>{{ $t('Verified', 'تم التحقق') }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
