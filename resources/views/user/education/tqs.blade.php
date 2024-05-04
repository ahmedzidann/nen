
@extends('user.layout.master')
@section('parent_page_name')Education @endsection
@section('page_name'){{$partner->name}} @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')


<div class="about_content">
    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($subPartners as $sub)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($loop->first) active @endif proj_bttn" id="pills-{{$sub->slug}}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{$sub->slug}}" type="button" role="tab" aria-controls="pills-{{$sub->slug}}"
                        aria-selected="true">{{$sub->name}}</button>
                </li>
            @endforeach

        </ul>

        <div class="tab-content certificates_h" id="pills-tabContent">
        @foreach ($subPartners as $sub)

        <div class="tab-pane fade @if($loop->first)show active @endif" id="pills-{{$sub->slug}}" role="tabpanel"
            aria-labelledby="pills-{{$sub->slug}}-tab" tabindex="0">
            <div class="accordion_dive">
            <div class="accordion accordion_flex" id="accordionExample">
            @foreach ($items->where('pages_id',$sub->id) as $item)
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$item->title}} </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {!! $item->description!!} </div>
                </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>

        @endforeach
        </div>
    </div>
</div>












  </div>

@endsection


