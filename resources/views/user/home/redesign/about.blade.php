{{-- On Platform: the dashboard's Home Video (title, description, button, YouTube video). The video plays in place. --}}
@if ($homeVideo && $homeVideo->is_active)
    @php
        $nxYt = preg_match('~(?:embed/|v=|youtu\.be/|shorts/)([\w-]{11})~', (string) $homeVideo->youtube_url, $nxYm) ? $nxYm[1] : null;
        $nxEmbed = $nxYt ? 'https://www.youtube.com/embed/' . $nxYt : ($homeVideo->youtube_url ?: null);
        $nxVTitle = $nxText($homeVideo->title);
    @endphp
    <section class="nx nx-sec nx-platform" id="about-company-section" style="--nx-bg:#f5f6f8">
        <div class="container nx-split">
            <div>
                @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $nxVTitle, 'intro' => $nxText($homeVideo->description)])
                @if ($homeVideo->button_url)
                    <a class="nx-btn nx-btn--primary" href="{{ $homeVideo->button_url }}" target="_blank" rel="noopener" data-nx-magnetic data-nx-reveal><span>{{ $homeVideo->button_text ? \Illuminate\Support\Str::ucfirst($homeVideo->button_text) : $t('Learn more', 'اعرف المزيد') }}</span>{!! $nxArrow !!}</a>
                @endif
            </div>
            @if ($nxEmbed)
                <figure class="nx-video" data-nx-clip data-nx-video data-embed="{{ $nxEmbed }}" data-title="{{ $nxVTitle }}">
                    @if ($nxYt)
                        <img src="https://i.ytimg.com/vi/{{ $nxYt }}/maxresdefault.jpg" alt="" data-nx-parallax
                            onload="if(this.naturalWidth<=120)this.src='https://i.ytimg.com/vi/{{ $nxYt }}/hqdefault.jpg'">
                    @endif
                    <span class="nx-video__shade"></span>
                    <button type="button" class="nx-video__play" data-nx-play aria-label="{{ $t('Play video', 'تشغيل الفيديو') }}"><i></i></button>
                    <figcaption><span class="nx-mono">NEN · {{ $nxVTitle }}</span><b>{{ $t('Watch the video', 'شاهد الفيديو') }}</b></figcaption>
                </figure>
            @endif
        </div>
    </section>
@endif
