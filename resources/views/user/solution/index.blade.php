@extends('user.layout.master')
@section('parent_page_name')Solution @endsection
@section('page_name')Solution @endsection
@section('cover_image')
    {{ isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')}}
@endsection
@section('content')

<div class="about_content">
    <h5>Solution</h5>
    <h2>{{$solution->title}}</h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($tabs as $tab)
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn {{$loop->first ? "active":"" }}" id="pills-tab-{{$tab->id}}" data-bs-toggle="pill" data-bs-target="#pills-{{$tab->id}}" type="button" role="tab" aria-controls="pills-{{$tab->id}}" aria-selected="false" tabindex="-1">{{$tab->name}} </button>
                </li>
            @endforeach
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">About </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Program</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" tabindex="-1">Help</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" tabindex="-1">Document</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-join" type="button" role="tab" aria-controls="pills-join" aria-selected="false" tabindex="-1">Join us</button>
            </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($tabs as $tab)
            @if ($tab->slug !='contacts')
            <div class="tab-pane fade  {{$loop->first ? "active show":"" }}" id="pills-{{$tab->id}}" role="tabpanel" aria-labelledby="pills-{{$tab->id}}-tab" tabindex="0">
                <div class="program_sec">
                   @forelse ($items->where('tabs_id',$tab->id) as $item)
                   <a  class="card_prgram">
                    <div class="card all_program_card">

                        <div class="programe_content">
                            <img src="{{$item->getFirstMediaUrl('solutionTabs')}}">
                            <h3>{{$item->title}}</h3>
                            <p style="color: #000;" class="description {{ strlen($item->description)>= 200 ? "p_clamp":''}}">{{ strip_tags($item->description) }}</p>
                            @if (strlen($item->description)>= 200)
                            <button class="show_bttn" onclick="toggleDescription(this)">Show More <i class="bi bi-chevron-down"></i></button>
                            @endif
                            @php
                                $bcount = $item->files->count() > $item->links->count()? $item->files->count():  $item->links->count();
                                // $scount = $item->files->count() > $item->links->count()? $item->links->count():  $item->files->count();
                            @endphp
                                @foreach (range(0, $bcount-1) as $i)
                                <div class="flex_icons_div">
                                    @if (isset($item->files[$i]))
                                        <p><img src="{{url('content/images/small_icon/archive-book.png')}}"><a href="{{  url('storage/education/' . $item->files[$i]->file)  }} " download>Reference</a></p>
                                    @endif
                                    @if (isset($item->links[$i]))

                                        <p><img src="{{url('content/images/small_icon/global.png')}}"><a href="{{$item->links[$i]->reference}}">Website</a></p>
                                    @endif


                                </div>
                                @endforeach

                        </div>
                    </div>
                    </a>
                    @empty
                    <div style="display: flex; justify-content: center;">
                        <p style="color:#999;">There is No Data Available</p>
                    </div>
                   @endforelse



                </div>

            </div>



            @else

            <div class="tab-pane fade " id="pills-{{$tab->id}}" role="tabpanel"
                aria-labelledby="pills-{{$tab->slug}}-tab" tabindex="0">
                <div class="flex_contact_us_sec">
                    <div class="left_part">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label label_action">Your Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label label_action">Phone Number</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label label_action">Your Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Your Comment"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12">
                        <button type="button" class="contct_bttn">Send <i class="bi bi-send"></i></button>
                        </div>

                        </div>
                    </div>

                    <div class="right_part">
                    <div class="contact_us_links">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>

                    </div>
                    </div>

                </div>
            </div>
            @endif
        @endforeach



        </div>
    </div>


</div>
<script>

    function toggleDescription(button) {
        var description = button.previousElementSibling;
        if (description.classList.contains('p_clamp')) {
            description.classList.remove('p_clamp');
            button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
        } else {
            description.classList.add('p_clamp');
            button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
        }
    }
    </script>
@endsection
