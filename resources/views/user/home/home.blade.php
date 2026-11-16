@extends('user.layout.index_master')
@section('parent_page_name')
    Home
@endsection

@section('cover_image')
    {{ $home->getFirstMediaUrl('icon') ?: asset('content/images/logo.svg') }}
@endsection

@section('page_name')
    Home
@endsection

@php
    /*
     | NEN homepage redesign (motion design system, scoped under .nx).
     | Every text comes from the dashboard. Where an image is missing in the dashboard, a design default photo
     | is used (like the old template's hero-home-page.webp fallback). Sections without dashboard content are hidden.
     | Exception: NEN Group (redesign/nen-group.blade.php) is static until the dashboard has a source for it.
     | Sections: resources/views/user/home/redesign/*.blade.php · styles/scripts: public/content/redesign/
     */
    $nxAr = app()->getLocale() === 'ar';
    $t = fn ($en, $ar) => $nxAr ? $ar : $en;
    $nxPad = fn ($n) => str_pad((string) $n, 2, '0', STR_PAD_LEFT);
    $nxText = fn ($html, $limit = null) => ($s = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $html), ENT_QUOTES, 'UTF-8')))) && $limit ? \Illuminate\Support\Str::limit($s, $limit) : $s;
    $nxMedia = fn ($model, $collection) => optional($model->getFirstMedia($collection))->getUrl();
    $nxSec = (object) ['n' => 0]; // running section number above each title (an object, so included partials share it)
    $nxIcon = fn ($d) => '<svg class="nx-ic" viewBox="0 0 24 24" aria-hidden="true">' . $d . '</svg>';
    $nxArrow = '<svg class="nx-ic nx-arrow" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
    $nxIcons = [
        'years' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18"/>',
        'bulb' => '<path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2.1h5c0-.9.4-1.6 1-2.1A6 6 0 0 0 12 3z"/>',
        'building' => '<rect x="4" y="3" width="16" height="18" rx="1.5"/><path d="M9 7h1M14 7h1M9 11h1M14 11h1M9 15h1M14 15h1M10 21v-3h4v3"/>',
        'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c.8-3.5 3.4-5.5 6.5-5.5s5.7 2 6.5 5.5"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14.6c1.8.8 3 2.7 3.5 5.4"/>',
        'spark' => '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5L18 18M6 18l2.5-2.5M15.5 8.5L18 6"/>',
        'award' => '<circle cx="12" cy="9" r="6"/><path d="M8.5 14l-1.5 7 5-3 5 3-1.5-7"/>',
        'check' => '<circle cx="12" cy="12" r="9"/><path d="M8 12.5l3 3 5-6"/>',
        'shield' => '<path d="M12 3l7 3v5c0 4.5-3 8.3-7 10-4-1.7-7-5.5-7-10V6l7-3z"/><path d="M9 12l2 2 4-4"/>',
        'cap' => '<path d="M2 9l10-5 10 5-10 5-10-5z"/><path d="M6 11v5c3 2.5 9 2.5 12 0v-5"/>',
        'pin' => '<path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/>',
        'chat' => '<path d="M4 5h16v11H8l-4 4z"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>',
        'phone' => '<path d="M5 3h4l2 5-2.5 1.5a11 11 0 0 0 6 6L16 13l5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 5a2 2 0 0 1 2-2z"/>',
        'star' => '<path d="M12 3l2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1L3.2 9.5l6.1-.9z"/>',
        'briefcase' => '<rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V5h6v2M3 12h18"/>',
        'handshake' => '<path d="M3 11l4-4 4 2 3-2 7 5-6 6-4-3-2 2-6-6z"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/><path d="M8 14h3v3H8z"/>',
        'doc' => '<path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/><path d="M14 3v6h6"/><path d="M9 15l2 2 4-4"/>',
    ];
    // design default photos (NEN's own photos from site.nen-global.org), used only when the dashboard has no image
    $nxSite = 'https://site.nen-global.org/';
    $nxPhotos = [
        'features' => ['site/images/vide.jpg', 'uploads/events/file_6a8f187f0eb28.jpeg', 'site/images/joins/working-1.jpg', 'site/images/joins/working-3.jpg', 'site/images/partners-join.jpg', 'site/images/join-teachers.jpg', 'uploads/blogs/file_6ac2b1b2e5493.jpg', 'site/images/verifiy.jpg'],
        'education' => ['images/partners/edu-2.jpg', 'images/partners/strategic-photo.jpg', 'images/partners/edu-1.jpg', 'images/partners/edu-3.jpg', 'images/partners/edu-4.jpg', 'images/partners/join.jpg', 'images/partners/strategic.jpg', 'images/partners/tech-screen.jpg'],
        'join' => ['site/images/joins/working-4.jpg', 'images/partners/edu-1.jpg', 'site/images/joins/working-2.jpg', 'uploads/blogs/file_6ac2b22856479.jpg', 'site/images/partners-bg.jpg'],
    ];
    $nxPhoto = fn ($set, $i) => $nxSite . $nxPhotos[$set][$i % count($nxPhotos[$set])];
    $nxVer = fn ($p) => @filemtime(public_path($p)) ?: 1;
@endphp

@section('websiteStyle')
    {{-- home-index-style.css styled the old homepage sections (all replaced below), so it is no longer loaded here --}}
    <!-- NEN redesign layer -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=JetBrains+Mono:wght@400;500&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lenis@1.3.27/dist/lenis.css">
    <link rel="stylesheet" href="{{ asset('content/redesign/nx.css') }}?v={{ $nxVer('content/redesign/nx.css') }}">
@endsection

@section('hero')
    @include('user.home.redesign.hero')
@endsection

@section('content')
    @include('user.home.redesign.quick')

    <div id="home-page">
        <div id="nx-root">
            @include('user.home.redesign.features')
            @include('user.home.redesign.about')
            @include('user.home.redesign.nen-group') {{-- static content (no dashboard table yet) --}}
            @include('user.home.redesign.projects')
            @include('user.home.redesign.education')
            @include('user.home.redesign.solutions')
            @include('user.home.redesign.technology')
            @include('user.home.redesign.testing')
            @include('user.home.redesign.doc-validation')
            @include('user.home.redesign.find-us')
            @include('user.home.redesign.locations')
            @include('user.home.redesign.join')
            @include('user.home.redesign.blogs')
        </div>
    </div>
@endsection

@section('websiteScript')
    <!-- NEN redesign motion layer -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrambleTextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.3.27/dist/lenis.min.js"></script>
    <script src="{{ asset('content/redesign/nx.js') }}?v={{ $nxVer('content/redesign/nx.js') }}"></script>
@endsection
