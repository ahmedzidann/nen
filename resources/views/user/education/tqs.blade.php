@extends('user.layout.master')
@section('parent_page_name')Education @endsection
@section('page_name'){{$partner->name}} @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <div class="tabs-items">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($subPartners as $sub)
            <li class="nav-item" role="presentation">
                <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab"
                    aria-controls="pills-{{$sub->slug}}" aria-selected="true">{{$sub->name}}</button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content certificates_h" id="pills-tabContent">
            @foreach ($subPartners as $sub)
            <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
                aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
                <div id="custom-accordion">
                    <div class="accordion accordion_flex" id="accordionExample">
                        @forelse ($items->where('pages_id', $sub->id) as $index => $item)
                        <div class="accordion-item shadow-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $item->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="description">
                                        {!! $item->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="empty_state">
                            <svg style="width: 50%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 512" id="empty-box">
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
                                <path fill="none" stroke="#990000" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="3"
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
            @endforeach
        </div>
    </div>
</div>

@endsection