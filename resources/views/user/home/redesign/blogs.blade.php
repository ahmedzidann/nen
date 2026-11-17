{{-- Our Blogs: the dashboard's blogs marked "show in home" (latest 6). --}}
@if (count($blogs) > 0)
    <section class="nx nx-sec nx-blogs" id="blogs-section" style="--nx-bg:#fff">
        <div class="container">
            @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $t('Our Blogs', 'المدونة')])
            <div class="nx-blog-grid" data-nx-group>
                @foreach ($blogs as $blog)
                    @php $nxCat = optional($blog->categories->first())->title; @endphp
                    <article class="nx-blog" data-nx-item>
                        <a href="{{ route('blogs.details', $blog) }}" class="nx-blog__link">
                            <div class="nx-blog__img">
                                <img src="{{ $blog->banner ? asset('/storage/' . $blog->banner) : asset('content/images/logo.svg') }}" alt="{{ $blog->title }}" loading="lazy" decoding="async">
                                @if ($nxCat)<span class="nx-blog__cat">{{ $nxCat }}</span>@endif
                            </div>
                            <p class="nx-mono nx-blog__meta">{{ optional($blog->published_at ? \Illuminate\Support\Carbon::parse($blog->published_at) : $blog->created_at)->translatedFormat('j F Y') }} · {{ optional($blog->created_at)->diffForHumans() }}</p>
                            <h3>{{ $blog->title }}</h3>
                            <span class="nx-link">{{ $t('Read article', 'اقرأ المقال') }} {!! $nxArrow !!}</span>
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="nx-foot"><a class="nx-btn nx-btn--primary" href="{{ route('blogs.index') }}" data-nx-magnetic><span>{{ $t('See More', 'عرض المزيد') }}</span>{!! $nxArrow !!}</a></div>
        </div>
    </section>
@endif
