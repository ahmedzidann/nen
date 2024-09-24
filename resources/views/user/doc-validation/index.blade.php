@extends('user.layout.master')
@section('parent_page_name')Doc VAlidation @endsection
@section('page_name'){{$tech->name}} @endsection
@section('cover_image')
{{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="doc-validation">
    <div id="about-section">
        @if ($item)
        <div class="flex_sec_content row g-5 align-items-center">
            <div class="col-md-7">
                <h3 class="decorated-title">
                    {{$item->title}}
                    <!-- <img src="{{ asset('content/images/dec-vector.svg') }}" loading="lazy"
                        onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                        alt="vector"> -->
                </h3>
                <div class="data">
                    <p
                        class="description lh-base before-vertical-line position-relative mt-3 pt-0 {{ strlen($item->description) >= 400 ?'p_clamp_2' : ''}}">
                        {{ html_entity_decode(strip_tags($item->description)) }}
                    </p>

                    @if (strlen($item->description) >= 400)
                    <a role='btn' onclick="toggleDescription(this)" class="mt-3 read_more read_more_btn">Read More
                        <i class="bi bi-chevron-down"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="about-image-item card border-0 w-100 container-data shadow-sm p-4">
                    <div class="about-image-container h-100">
                        <img src="{{$item->getFirstMediaUrl('DocValidation')}}" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('content/images/not-found/no-image.svg') }}';"
                            alt="about image">
                    </div>
                    <div class="blob"></div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <hr />
    <div class="doc_valdation_div">
        @if ($item)
        <h4 class="line-before fs-2 text-capitalize">
            why choose us
        </h4>
        <div class="p_div">
            @foreach ($item->details as $details)
            <p>
                <i class="bi bi-check2 bi-{{ $loop->index + 1 }}-circle"></i>
                <span class="text-muted">
                    {{ $details->title }}
                </span>
            </p>
            @endforeach
        </div>
        @endif
    </div>
</div>
<script>
function toggleDescription(button) {
    var description = button.previousElementSibling;
    if (description.classList.contains('p_clamp_2')) {
        description.classList.remove('p_clamp_2');
        button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
    } else {
        description.classList.add('p_clamp_2');
        button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
    }
}
</script>
@endsection