@extends('user.layout.master')
@section('parent_page_name')
Technology
@endsection
@section('page_name')
{{ $tech->name }}
@endsection
@section('websiteStyle')
<style>
.p_clamp_2 {
    display: -webkit-box;
    -webkit-line-clamp: 6;
    /* Number of lines you want to show */
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png') }}
@endsection
@section('content')

<div class="technology">
    <div class="container">
        <div class="text-start">
            <!-- <h6 class="fs-5 mb-1 text-muted">Education</h6> -->
            <h5 class="global-title">
                {{ $tech->name }}
            </h5>
            <div class="under-title-vector">
                <img src="{{ asset('content/images/vector-title.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector">
            </div>
        </div>

        @if ($fSection = $items->where('item', 'section-one')->first())
        <div id="about-section">
            <div class="flex_sec_content row g-5">
                <!-- <div class="col-md-7"> -->
                <div class="col-12">
                    {{-- <h3 class="decorated-title" style="text-align: start !important;"> --}}
                    {{-- {{ $fSection->title }} --}}
                    {{-- <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                    onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                    alt="vector"> --}}
                    {{-- </h3> --}}

                    <div class="data">
                        <p class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($fSection->description) >= 300 ? 'p_clamp_2' : '' }}"
                            id="description_text">
                            {{-- {!! $fSection->description !!} --}}
                        </p>

                        @if (strlen($fSection->description) >= 300)
                        <a role='btn' onclick="toggleDescription(this)" class="mt-3 read_more read_more_btn">Read More
                            <i class="bi bi-chevron-down"></i></a>
                        @endif
                    </div>

                </div>
                <!-- <div class="col-md-5">
                    <div class="about-image-item card border-0 w-100 container-data">
                        <div class="about-image-container h-100">
                            <img src="{{ $fSection->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="about image">
                        </div>
                        <div class="blob"></div>
                    </div>
                </div> -->
            </div>
        </div>
        @else
        <div class="empty_state">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
                <path fill="#e0dfdf"
                    d="M568.90415,220.74547V202.55431a13.07945,13.07945,0,0,0-13.07945-13.07945h-46.166a13.07945,13.07945,0,0,1-13.07946-13.07945V158.20424a13.07945,13.07945,0,0,1,13.07946-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V113.85418a13.07945,13.07945,0,0,0-13.07945-13.07945H169.20918a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h0a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H118.6298a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h19.84658a13.07945,13.07945,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946h-.048A13.07945,13.07945,0,0,0,125.349,291.25453V309.4456a13.07945,13.07945,0,0,0,13.07945,13.07946h2.87139a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19125a13.07945,13.07945,0,0,1-13.07945,13.07945H94.1753a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116A13.07945,13.07945,0,0,0,94.1753,411.22527h423.963a13.07945,13.07945,0,0,0,13.07945-13.07945V379.95466a13.07945,13.07945,0,0,0-13.07945-13.07945H506.79779a13.07945,13.07945,0,0,1-13.07945-13.07945V335.60451a13.07945,13.07945,0,0,1,13.07945-13.07945h26.73986A13.07945,13.07945,0,0,0,546.6171,309.4456V291.25453a13.07945,13.07945,0,0,0-13.07945-13.07945H525.426a13.07945,13.07945,0,0,1-13.07945-13.07946V246.90438A13.07945,13.07945,0,0,1,525.426,233.82492H555.8247A13.07945,13.07945,0,0,0,568.90415,220.74547Z">
                </path>
                <rect width="159.84" height="145.44" x="217.561" y="231.797" fill="#d90505"></rect>
                <rect width="84.96" height="145.44" x="377.401" y="231.797" fill="#990000"></rect>
                <path fill="#000"
                    d="M462.36121,232.15729h-84.96l29.101-39.69379a3,3,0,0,1,2.41944-1.22621h77.52026a3,3,0,0,1,2.41944,4.77378Z">
                </path>
                <path fill="#990000"
                    d="M217.95637,232.15729h84.96l-29.101-39.69379a3,3,0,0,0-2.41944-1.22621H193.87565a3,3,0,0,0-2.41944,4.77378Z">
                </path>
                <path fill="#000"
                    d="M510.29292,285.1577l-47.93164-53.00043h0v57.96h45.66016A3,3,0,0,0,510.29292,285.1577Z">
                </path>
                <rect width="110.853" height="78.366" x="246.893" y="153.791" fill="#ee781d"></rect>
                <path fill="#e0dfdf"
                    d="M299.07973,236.99513h-30.498a3.35392,3.35392,0,0,1-2.90457-5.03088l15.249-26.41208,15.249-26.41208a3.35392,3.35392,0,0,1,5.80915,0l15.249,26.41208,15.249,26.41208a3.35392,3.35392,0,0,1-2.90457,5.03088Z">
                </path>
                <rect width="3.356" height="28.368" x="297.402" y="192.301" fill="#d90505" rx="1.678"></rect>
                <circle cx="299.08" cy="227.235" r="4.014" fill="#d90505" transform="rotate(-84.345 299.08 227.235)">
                </circle>
                <path fill="#ffeaea"
                    d="M325.66717,290.11729H173.75124a3,3,0,0,1-2.27157-4.9596l45.72154-53.0004h159.84l-49.10248,56.91959A3,3,0,0,1,325.66717,290.11729Z">
                </path>
                <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"
                    d="M474.287 338.33442c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 347.07361c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 355.8128c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M111.18347 292.11729c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 300.85648c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 309.59568c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 120.54318c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 129.28237c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 138.02156c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2">
                </path>
                <circle cx="183.705" cy="391.21" r="12.96" fill="#990000"></circle>
                <circle cx="193.109" cy="357.024" r="6.72" fill="#990000"></circle>
                <circle cx="219.723" cy="392.65" r="9.6" fill="#990000"></circle>
                <circle cx="170.969" cy="212.701" r="15.42" fill="#990000"></circle>
                <circle cx="141.504" cy="201.718" r="8.032" fill="#990000"></circle>
                <circle cx="148.882" cy="174.415" r="4.633" fill="#990000"></circle>
                <circle cx="174.529" cy="177.693" r="11.107" fill="#990000"></circle>
                <circle cx="438.988" cy="137.917" r="15.42" fill="#990000"></circle>
                <circle cx="463.523" cy="118.249" r="8.032" fill="#990000"></circle>
                <circle cx="494.205" cy="162.323" r="6.952" fill="#990000"></circle>
                <circle cx="483.183" cy="138.58" r="4.633" fill="#990000"></circle>
                <circle cx="467.22" cy="158.92" r="11.107" fill="#990000"></circle>
            </svg>
            <h3 class="title">No data</h3>
            <p class="description">There have been no data in this section yet</p>
        </div>
        @endif

        <hr>

        <div class="counter_sec">
            @forelse ($items->where('item','section-two') as $item)
            <div class="hovering-lighted-card">
                <div class="bg">
                    <div class="counter-item p-3">
                        <div class="image-count d-flex justify-content-center mt-2">
                            <img src="{{ $item->getFirstMediaUrl('StaticTable') }}" loading="lazy"
                                onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                                alt="count image">
                        </div>
                        <h2 class="fs-4 fw-bold">{{ $item->title }}</h2>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                </div>
                <div class="blob"></div>
            </div>
            @empty
            <div class="empty_state">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
                    <path fill="#e0dfdf"
                        d="M568.90415,220.74547V202.55431a13.07945,13.07945,0,0,0-13.07945-13.07945h-46.166a13.07945,13.07945,0,0,1-13.07946-13.07945V158.20424a13.07945,13.07945,0,0,1,13.07946-13.07945h1.45764a13.07945,13.07945,0,0,0,13.07945-13.07945V113.85418a13.07945,13.07945,0,0,0-13.07945-13.07945H169.20918a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h0a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19117a13.07945,13.07945,0,0,1-13.07945,13.07945H118.6298a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116a13.07945,13.07945,0,0,0,13.07945,13.07945h19.84658a13.07945,13.07945,0,0,1,13.07945,13.07946v18.19124a13.07945,13.07945,0,0,1-13.07945,13.07946h-.048A13.07945,13.07945,0,0,0,125.349,291.25453V309.4456a13.07945,13.07945,0,0,0,13.07945,13.07946h2.87139a13.07945,13.07945,0,0,1,13.07945,13.07945v18.19125a13.07945,13.07945,0,0,1-13.07945,13.07945H94.1753a13.07945,13.07945,0,0,0-13.07945,13.07945v18.19116A13.07945,13.07945,0,0,0,94.1753,411.22527h423.963a13.07945,13.07945,0,0,0,13.07945-13.07945V379.95466a13.07945,13.07945,0,0,0-13.07945-13.07945H506.79779a13.07945,13.07945,0,0,1-13.07945-13.07945V335.60451a13.07945,13.07945,0,0,1,13.07945-13.07945h26.73986A13.07945,13.07945,0,0,0,546.6171,309.4456V291.25453a13.07945,13.07945,0,0,0-13.07945-13.07945H525.426a13.07945,13.07945,0,0,1-13.07945-13.07946V246.90438A13.07945,13.07945,0,0,1,525.426,233.82492H555.8247A13.07945,13.07945,0,0,0,568.90415,220.74547Z">
                    </path>
                    <rect width="159.84" height="145.44" x="217.561" y="231.797" fill="#d90505"></rect>
                    <rect width="84.96" height="145.44" x="377.401" y="231.797" fill="#990000"></rect>
                    <path fill="#000"
                        d="M462.36121,232.15729h-84.96l29.101-39.69379a3,3,0,0,1,2.41944-1.22621h77.52026a3,3,0,0,1,2.41944,4.77378Z">
                    </path>
                    <path fill="#990000"
                        d="M217.95637,232.15729h84.96l-29.101-39.69379a3,3,0,0,0-2.41944-1.22621H193.87565a3,3,0,0,0-2.41944,4.77378Z">
                    </path>
                    <path fill="#000"
                        d="M510.29292,285.1577l-47.93164-53.00043h0v57.96h45.66016A3,3,0,0,0,510.29292,285.1577Z">
                    </path>
                    <rect width="110.853" height="78.366" x="246.893" y="153.791" fill="#ee781d"></rect>
                    <path fill="#e0dfdf"
                        d="M299.07973,236.99513h-30.498a3.35392,3.35392,0,0,1-2.90457-5.03088l15.249-26.41208,15.249-26.41208a3.35392,3.35392,0,0,1,5.80915,0l15.249,26.41208,15.249,26.41208a3.35392,3.35392,0,0,1-2.90457,5.03088Z">
                    </path>
                    <rect width="3.356" height="28.368" x="297.402" y="192.301" fill="#d90505" rx="1.678">
                    </rect>
                    <circle cx="299.08" cy="227.235" r="4.014" fill="#d90505"
                        transform="rotate(-84.345 299.08 227.235)"></circle>
                    <path fill="#ffeaea"
                        d="M325.66717,290.11729H173.75124a3,3,0,0,1-2.27157-4.9596l45.72154-53.0004h159.84l-49.10248,56.91959A3,3,0,0,1,325.66717,290.11729Z">
                    </path>
                    <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"
                        d="M474.287 338.33442c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 347.07361c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M474.287 355.8128c3.78968 0 3.78968 2 7.57935 2 3.78847 0 3.78847-2 7.57694-2 3.79107 0 3.79107 2 7.58215 2s3.79107-2 7.58215-2M111.18347 292.11729c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 300.85648c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M111.18347 309.59568c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 120.54318c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 129.28237c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2M279.90529 138.02156c3.78967 0 3.78967 2 7.57934 2 3.78847 0 3.78847-2 7.57694-2 3.79108 0 3.79108 2 7.58215 2s3.79108-2 7.58215-2">
                    </path>
                    <circle cx="183.705" cy="391.21" r="12.96" fill="#990000"></circle>
                    <circle cx="193.109" cy="357.024" r="6.72" fill="#990000"></circle>
                    <circle cx="219.723" cy="392.65" r="9.6" fill="#990000"></circle>
                    <circle cx="170.969" cy="212.701" r="15.42" fill="#990000"></circle>
                    <circle cx="141.504" cy="201.718" r="8.032" fill="#990000"></circle>
                    <circle cx="148.882" cy="174.415" r="4.633" fill="#990000"></circle>
                    <circle cx="174.529" cy="177.693" r="11.107" fill="#990000"></circle>
                    <circle cx="438.988" cy="137.917" r="15.42" fill="#990000"></circle>
                    <circle cx="463.523" cy="118.249" r="8.032" fill="#990000"></circle>
                    <circle cx="494.205" cy="162.323" r="6.952" fill="#990000"></circle>
                    <circle cx="483.183" cy="138.58" r="4.633" fill="#990000"></circle>
                    <circle cx="467.22" cy="158.92" r="11.107" fill="#990000"></circle>
                </svg>
                <h3 class="title">No data</h3>
                <p class="description">There have been no data in this section yet</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Insert the description content from the server into the <p> element
    const content = `{!! htmlspecialchars_decode($fSection->description??'', ENT_QUOTES | ENT_HTML5) !!}`;
    const description = document.getElementById('description_text');
    description.innerHTML = content;

    // Define the toggleDescription function globally so it can be used in the HTML
    window.toggleDescription = function(button) {
        const description = button.previousElementSibling; // Get the previous <p> element

        if (description.classList.contains('p_clamp_2')) {
            description.classList.remove('p_clamp_2');
            button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
        } else {
            description.classList.add('p_clamp_2');
            button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
        }
    };
});
</script>
@endsection