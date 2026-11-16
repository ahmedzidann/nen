{{-- Our Projects: the dashboard's projects marked "show in home" (latest 5). Desktop: pinned gallery with wipes. --}}
@if ($projects->count())
    <section class="nx nx-sec nx-projects" id="projects-section" style="--nx-bg:#fff">
        <div class="nx-pin" data-nx-projects>
            <div class="container nx-projects__layout">
                <div>
                    @include('user.home.redesign._head', ['n' => ++$nxSec->n, 'title' => $t('Our Projects', 'مشاريعنا')])
                    <ol class="nx-proj-list">
                        @foreach ($projects as $i => $project)
                            @php
                                $nxPSlug = optional($project->Page)->slug;
                                $nxPUrl = $nxPSlug && \Illuminate\Support\Facades\Route::has('projects.' . $nxPSlug)
                                    ? route('projects.' . $nxPSlug, ['page_id' => $project->pages_id, 'project_id' => $project->id]) : null;
                                $nxPText = $nxText($project->home_description ?? $project->description, 220);
                            @endphp
                            <li class="nx-proj{{ $i === 0 ? ' is-active' : '' }}" data-nx-proj>
                                <span class="nx-mono">{{ $nxPad($i + 1) }}</span>
                                <h3>{{ $project->title }}</h3>
                                @if ($nxPText)<p>{{ $nxPText }}</p>@endif
                                @if ($nxPUrl)<a href="{{ $nxPUrl }}" class="nx-link">{{ $t('View Project', 'عرض المشروع') }} {!! $nxArrow !!}</a>@endif
                            </li>
                        @endforeach
                    </ol>
                </div>
                <div class="nx-proj-stage" aria-hidden="true">
                    <div class="nx-proj-frames">
                        @foreach ($projects as $i => $project)
                            <figure class="nx-proj-frame" data-nx-frame style="--i:{{ $i }}"><img src="{{ $project->getFirstMediaUrl('Project') ?: asset('content/images/logo.svg') }}" alt="{{ $project->title }}" loading="lazy" decoding="async"></figure>
                        @endforeach
                    </div>
                    <span class="nx-proj-count nx-mono"><b data-nx-proj-idx>01</b> / {{ $nxPad($projects->count()) }}</span>
                </div>
            </div>
        </div>
    </section>
@endif
